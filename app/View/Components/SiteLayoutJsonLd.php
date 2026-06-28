<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayoutJsonLd extends Component
{
    public string $title;

    public string $description;

    public string $type;

    public string $url;

    public ?string $image;

    public ?string $imageAlt;

    public ?string $author;

    public ?string $publishedAt;

    public ?string $modifiedAt;

    public ?int $readingTime;

    public array $keywords;

    public ?string $articleSection;

    public array $breadcrumbs;

    public function __construct(
        string $title,
        ?string $description = null,
        string $type = 'website',
        ?string $url = null,
        ?string $image = null,
        ?string $imageAlt = null,
        ?string $author = null,
        ?string $publishedAt = null,
        ?string $modifiedAt = null,
        ?int $readingTime = null,
        array $keywords = [],
        ?string $articleSection = null,
        array $breadcrumbs = [],
    ) {
        $this->title = $title;
        $this->description = $description ?? config('seo.defaults.description', '');
        $this->type = $type === 'article' ? 'article' : 'website';
        $this->url = $url ?? url()->current();
        $this->image = $image ?? (config('seo.defaults.og_image') ? url(config('seo.defaults.og_image')) : null);
        $this->imageAlt = $imageAlt ?? $title;
        $this->author = $author;
        $this->publishedAt = $publishedAt;
        $this->modifiedAt = $modifiedAt;
        $this->readingTime = $readingTime;
        $this->keywords = $keywords;
        $this->articleSection = $articleSection;
        $this->breadcrumbs = $breadcrumbs;
    }

    public function graph(): array
    {
        $org = config('seo.organization', []);
        $graph = [];

        $graph[] = $this->organizationNode($org);
        $graph[] = $this->webSiteNode($org);
        $graph[] = $this->webPageNode();

        if ($this->type === 'article') {
            $graph[] = $this->articleNode($org);
            if ($this->author) {
                $graph[] = $this->personNode();
            }
        }

        if (! empty($this->breadcrumbs)) {
            $graph[] = $this->breadcrumbNode();
        }

        if ($this->image) {
            $graph[] = $this->imageNode();
        }

        return $graph;
    }

    public function render(): View|Closure|string
    {
        return view('components.site-layout-json-ld');
    }

    private function organizationNode(array $org): array
    {
        $logo = $org['logo'] ?? null;
        $logoUrl = $logo ? url($logo) : null;

        $node = [
            '@type' => 'Organization',
            '@id' => url('/#organization'),
            'name' => $org['name'] ?? config('app.name', 'LAVIR'),
            'url' => $org['url'] ?? url('/'),
        ];

        if ($logoUrl) {
            $node['logo'] = [
                '@type' => 'ImageObject',
                'inLanguage' => $this->locale(),
                '@id' => url('/#/schema/logo/image/'),
                'url' => $logoUrl,
                'contentUrl' => $logoUrl,
                'caption' => $org['name'] ?? config('app.name', 'LAVIR'),
            ];
            $node['image'] = ['@id' => url('/#/schema/logo/image/')];
        }

        if (! empty($org['same_as'])) {
            $node['sameAs'] = $org['same_as'];
        }

        return $node;
    }

    private function webSiteNode(array $org): array
    {
        return [
            '@type' => 'WebSite',
            '@id' => url('/#website'),
            'url' => $org['url'] ?? url('/'),
            'name' => $org['name'] ?? config('app.name', 'LAVIR'),
            'description' => config('seo.defaults.description', ''),
            'publisher' => ['@id' => url('/#organization')],
            'potentialAction' => [
                [
                    '@type' => 'SearchAction',
                    'target' => [
                        '@type' => 'EntryPoint',
                        'urlTemplate' => route('articles.index').'?search={search_term_string}',
                    ],
                    'query-input' => 'required name=search_term_string',
                ],
            ],
            'inLanguage' => $this->locale(),
        ];
    }

    private function webPageNode(): array
    {
        $node = [
            '@type' => 'WebPage',
            '@id' => $this->url.'#webpage',
            'url' => $this->url,
            'name' => $this->title,
            'isPartOf' => ['@id' => url('/#website')],
            'about' => ['@id' => url('/#organization')],
            'description' => $this->description,
            'inLanguage' => $this->locale(),
            'potentialAction' => [
                [
                    '@type' => 'ReadAction',
                    'target' => [$this->url],
                ],
            ],
        ];

        if ($this->image) {
            $node['primaryImageOfPage'] = ['@id' => $this->url.'#primaryimage'];
            $node['image'] = ['@id' => $this->url.'#primaryimage'];
        }

        if ($this->publishedAt) {
            $node['datePublished'] = $this->publishedAt;
        }

        if ($this->modifiedAt) {
            $node['dateModified'] = $this->modifiedAt;
        }

        return $node;
    }

    private function articleNode(array $org): array
    {
        $node = [
            '@type' => 'Article',
            '@id' => $this->url.'#article',
            'isPartOf' => ['@id' => $this->url.'#webpage'],
            'headline' => $this->title,
            'mainEntityOfPage' => ['@id' => $this->url.'#webpage'],
            'publisher' => ['@id' => url('/#organization')],
            'inLanguage' => $this->locale(),
        ];

        if ($this->author) {
            $node['author'] = ['@id' => $this->url.'#author'];
        }

        if ($this->publishedAt) {
            $node['datePublished'] = $this->publishedAt;
        }

        if ($this->modifiedAt) {
            $node['dateModified'] = $this->modifiedAt;
        }

        if ($this->image) {
            $node['image'] = ['@id' => $this->url.'#primaryimage'];
            $node['thumbnailUrl'] = $this->image;
        }

        if (! empty($this->keywords)) {
            $node['keywords'] = $this->keywords;
        }

        if ($this->articleSection) {
            $node['articleSection'] = [$this->articleSection];
        }

        return $node;
    }

    private function personNode(): array
    {
        return [
            '@type' => 'Person',
            '@id' => $this->url.'#author',
            'name' => $this->author,
            'url' => $this->url,
        ];
    }

    private function imageNode(): array
    {
        return [
            '@type' => 'ImageObject',
            'inLanguage' => $this->locale(),
            '@id' => $this->url.'#primaryimage',
            'url' => $this->image,
            'contentUrl' => $this->image,
            'caption' => $this->imageAlt,
        ];
    }

    private function breadcrumbNode(): array
    {
        $items = [];
        $position = 1;
        foreach ($this->breadcrumbs as $crumb) {
            $item = [
                '@type' => 'ListItem',
                'position' => $position,
                'name' => $crumb['label'],
            ];

            if (! empty($crumb['url'])) {
                $item['item'] = $crumb['url'];
            }

            $items[] = $item;
            $position++;
        }

        return [
            '@type' => 'BreadcrumbList',
            '@id' => $this->url.'#breadcrumb',
            'itemListElement' => $items,
        ];
    }

    private function locale(): string
    {
        return str_replace('-', '_', config('app.locale', 'nl'));
    }
}
