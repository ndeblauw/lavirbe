<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| WordPress → Laravel Redirects
|--------------------------------------------------------------------------
| Migrating from WordPress (lavir.be) to this Laravel app changed URL
| structures. These 301 redirects preserve SEO ranking and inbound links.
|
| Trailing slashes are handled by StripTrailingSlash middleware, so all
| routes here are registered without trailing slashes.
|
| Route order matters: explicit redirects must come before catch-alls.
*/

// ============================================================
// Static pages
// ============================================================
Route::redirect('/linkedin-ailan', 'https://be.linkedin.com/in/ailan-iriks-bickx', 302);
Route::redirect('/instagram-lavir', 'https://www.instagram.com/lavir_vzw_coaching/', 302);

Route::redirect('/kennisbank', '/articles', 301);
Route::redirect('/blog', '/articles', 301);
Route::redirect('/gratis-statutenscan', '/articles/gratis-scan-van-jouw-statuten', 301);

// Kennisbank pagination → articles index with page query param
Route::get('/kennisbank/page/{page}', fn ($page) => redirect()->route('articles.index', ['page' => $page], 301))
    ->whereNumber('page');

// ============================================================
// Author archives → articles index (no author pages in new site)
// ============================================================
Route::redirect('/author/adminailan', '/articles', 301);
Route::get('/author/adminailan/page/{page}', fn ($page) => redirect()->route('articles.index', ['page' => $page], 301))
    ->whereNumber('page');

// ============================================================
// Categories
// ============================================================
$categorySlugMap = [
    'bestuur' => 'bestuur',
    'financiele_werking' => 'financiele-werking',
    'fundraising' => 'fundraising',
    'verplichtingen' => 'vzw-verplichtingen',
];

foreach ($categorySlugMap as $oldSlug => $newSlug) {
    Route::redirect("/category/{$oldSlug}", "/categories/{$newSlug}", 301);
}

// Category pagination
Route::get('/category/{slug}/page/{page}', function ($slug, $page) use ($categorySlugMap) {
    $newSlug = $categorySlugMap[$slug] ?? $slug;

    return redirect()->route('categories.show', ['category' => $newSlug, 'page' => $page], 301);
})->whereNumber('page');

// ============================================================
// Tags (all slugs match between WordPress and Laravel)
// ============================================================
Route::redirect('/tag/{slug}', '/tags/{slug}', 301);

// Tag pagination
Route::get('/tag/{slug}/page/{page}', fn ($slug, $page) => redirect()->route('tags.show', ['tag' => $slug, 'page' => $page], 301))
    ->whereNumber('page');

// ============================================================
// Articles with different slugs (WordPress slug ≠ Laravel slug)
// Must be registered BEFORE the date-based catch-all below.
// ============================================================
$articleRedirects = [
    '/2023/11/04/meer_giften_krijgen' => '/articles/meer-giften-krijgen-5-tips-voor-een-giftenwerking',
    '/2023/12/20/extra_regels_wijzigen_statuten' => '/articles/nieuwe-regels-voor-wijzigen-van-statuten',
    '/2024/01/29/justban_bestuursverbod' => '/articles/justban-bestuursverbod-raadplegen',
    '/2024/03/02/patrimoniumtaks-vernieuwd' => '/articles/patrimoniumtaks-voor-vzws-is-vernieuwd-voordelen-en-nadelen',
    '/2024/04/27/dubbele_boekhouding_kasboekhouding' => '/articles/dubbele-boekhouding-of-kasboekhouding',
    '/2024/10/06/begroting-3-tips' => '/articles/drie-tips-voor-een-begroting',
    '/2025/05/01/goed_bestuur_basis' => '/articles/tips-voor-goed-bestuur-de-basis',
];

foreach ($articleRedirects as $oldPath => $newPath) {
    Route::redirect($oldPath, $newPath, 301);
}

// ============================================================
// Date-based article catch-all
// Matches WordPress permalink format /YYYY/MM/DD/{slug}
// For articles where the WordPress slug matches the Laravel slug.
// ============================================================
Route::redirect('/{year}/{month}/{day}/{slug}', '/articles/{slug}', 301)
    ->where([
        'year' => '[0-9]{4}',
        'month' => '[0-9]{2}',
        'day' => '[0-9]{2}',
    ]);
