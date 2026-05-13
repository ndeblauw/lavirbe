<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('author', 'category')->get();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:10'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'published_at' => ['nullable', 'date'],
            'image' => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->put('articles', $request->image);
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'author_id' => auth()->id(),
            'published_at' => $request->published_at,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'content' => ['required', 'string', 'min:10'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'published_at' => ['nullable', 'date'],
            'image' => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,webp'],
        ]);

        $imagePath = $article->image_path;
        if ($request->hasFile('image')) {
            if ($article->image_path) {
                Storage::disk('public')->delete($article->image_path);
            }
            $imagePath = Storage::disk('public')->put('articles', $request->image);
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin.articles.index');
    }

    public function destroy(Article $article)
    {
        if ($article->image_path) {
            Storage::disk('public')->delete($article->image_path);
        }

        $article->delete();

        return redirect()->route('admin.articles.index');
    }
}
