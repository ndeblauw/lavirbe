<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class SiteLayoutMeta extends Component
{
    public string $title;

    public string $description;

    public string $type;

    public string $canonical;

    public ?string $image;

    public ?string $imageAlt;

    public ?string $author;

    public ?string $publishedAt;

    public ?string $modifiedAt;

    public ?int $readingTime;

    public array $keywords;

    public bool $noindex;

    public function __construct(
        string $title,
        ?string $description = null,
        string $type = 'website',
        ?string $canonical = null,
        ?string $image = null,
        ?string $imageAlt = null,
        ?string $author = null,
        ?string $publishedAt = null,
        ?string $modifiedAt = null,
        ?int $readingTime = null,
        array $keywords = [],
        bool $noindex = false,
    ) {
        $this->title = $title;
        $this->description = $description ?? config('seo.defaults.description', '');
        $this->type = $type === 'article' ? 'article' : 'website';
        $this->canonical = $canonical ?? url()->current();
        $this->image = $image ?? (config('seo.defaults.og_image') ? url(config('seo.defaults.og_image')) : null);
        $this->imageAlt = $imageAlt ?? $title;
        $this->author = $author;
        $this->publishedAt = $publishedAt;
        $this->modifiedAt = $modifiedAt;
        $this->readingTime = $readingTime;
        $this->keywords = $keywords;
        $this->noindex = $noindex;
    }

    public function robotsContent(): string
    {
        if ($this->noindex) {
            return 'noindex, follow';
        }

        return 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
    }

    public function fullTitle(): string
    {
        $appName = config('app.name', 'LAVIR');

        if (Str::lower($this->title) === Str::lower($appName) || $this->title === '') {
            return $appName;
        }

        return $this->title.' - '.$appName;
    }

    public function render(): View|Closure|string
    {
        return view('components.site-layout-meta');
    }
}
