<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('is_admin', true)->firstOrFail();
        $seedDir = storage_path('seeds/articles');
        $files = glob($seedDir.DIRECTORY_SEPARATOR.'*.md');

        foreach ($files as $filePath) {
            $filename = basename($filePath);
            if ($filename === 'content-index.md') {
                continue;
            }

            $file = new \SplFileInfo($filePath);

            $content = file_get_contents($file->getRealPath());

            // Strip UTF-8 BOM
            if (substr($content, 0, 3) === "\xEF\xBB\xBF") {
                $content = substr($content, 3);
            }

            // Parse YAML front matter
            $firstDelim = strpos($content, '---');
            $secondDelim = strpos($content, '---', $firstDelim + 3);
            $yaml = substr($content, $firstDelim + 3, $secondDelim - $firstDelim - 3);

            $data = $this->parseYaml($yaml);

            $title = $data['title'] ?? $file->getFilename();
            $date = $data['date'] ?? null;
            $categoryNames = $data['categories'] ?? [];
            $tagNames = $data['tags'] ?? [];

            // Extract content after ## Content heading
            $body = substr($content, $secondDelim + 3);
            $body = preg_replace('/^## Content\s*/m', '', $body);
            // Strip anything after a subsequent ## heading (like ## Comments)
            $body = preg_replace('/\n## .*/s', '', $body);
            $body = trim($body);

            // Convert markdown to HTML
            $body = Str::markdown($body);

            // Find/create category (first one only)
            $category = null;
            if (! empty($categoryNames)) {
                $category = Category::firstOrCreate(
                    ['name' => trim($categoryNames[0])],
                    ['name' => trim($categoryNames[0])],
                );
            }

            // Find/create tags
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tagName = trim($tagName);
                if (empty($tagName)) {
                    continue;
                }

                $tag = Tag::firstOrCreate(
                    ['title' => $tagName],
                    ['title' => $tagName, 'slug' => Str::slug($tagName)],
                );
                $tagIds[] = $tag->id;
            }

            // Create article
            $slug = Str::slug($title);
            $article = Article::create([
                'title' => $title,
                'content' => $body,
                'slug' => $slug,
                'author_id' => $admin->id,
                'category_id' => $category?->id,
                'published_at' => $date ? date('Y-m-d H:i:s', strtotime($date)) : null,
            ]);

            // Attach tags
            if (! empty($tagIds)) {
                $article->tags()->attach($tagIds);
            }

            // Attach local image as media
            $this->attachImage($article, $slug, $seedDir);

            $this->command?->info("Seeded article: {$title}");
        }
    }

    private function attachImage(Article $article, string $slug, string $seedDir): void
    {
        $extensions = ['png', 'jpg', 'jpeg', 'webp', 'gif'];

        foreach ($extensions as $ext) {
            $imagePath = $seedDir.DIRECTORY_SEPARATOR.$slug.'.'.$ext;

            if (file_exists($imagePath)) {
                try {
                    $article->addMedia($imagePath)
                        ->preservingOriginal()
                        ->toMediaCollection('image');

                    $this->command?->info("  Image attached: {$slug}.{$ext}");

                    return;
                } catch (\Exception $e) {
                    $this->command?->warn("  Could not attach image {$slug}.{$ext}: {$e->getMessage()}");
                }
            }
        }
    }

    private function parseYaml(string $yaml): array
    {
        $data = [];

        foreach (explode("\n", $yaml) as $line) {
            $line = trim($line);
            if (empty($line)) {
                continue;
            }

            // Match key: value or key: [array]
            if (preg_match('/^(\w+):\s*\[(.*)\]/s', $line, $m)) {
                $key = $m[1];
                $items = explode(',', $m[2]);
                $data[$key] = array_map(fn ($i) => trim($i, '" '), $items);
            } elseif (preg_match('/^(\w+):\s*"(.+)"/s', $line, $m)) {
                $data[$m[1]] = $m[2];
            } elseif (preg_match('/^(\w+):\s*(.+)$/s', $line, $m)) {
                $data[$m[1]] = trim($m[2]);
            }
        }

        return $data;
    }
}
