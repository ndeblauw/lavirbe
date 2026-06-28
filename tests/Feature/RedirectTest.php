<?php

use App\Models\Article;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

// ============================================================
// Trailing slash middleware
// Tested via kernel->handle() because the test framework's
// prepareUrlForRequest() strips trailing slashes before routing.
// ============================================================
test('trailing slash redirects to non-slash with 301', function () {
    $response = app(Kernel::class)->handle(Request::create('/aanbod/', 'GET'));

    expect($response->getStatusCode())->toBe(301)
        ->and($response->headers->get('Location'))->toEndWith('/aanbod');
});

test('root path is not affected by trailing slash middleware', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('trailing slash redirect preserves query string', function () {
    $response = app(Kernel::class)->handle(Request::create('/articles/?search=test', 'GET'));

    expect($response->getStatusCode())->toBe(301)
        ->and($response->headers->get('Location'))->toEndWith('/articles?search=test');
});

// ============================================================
// Static page redirects
// ============================================================
test('kennisbank redirects to articles', function () {
    $response = $this->get('/kennisbank');

    $response->assertStatus(301)
        ->assertRedirect('/articles');
});

test('blog redirects to articles', function () {
    $response = $this->get('/blog');

    $response->assertStatus(301)
        ->assertRedirect('/articles');
});

test('gratis-statutenscan redirects to statuten article', function () {
    Article::factory()->create(['slug' => 'gratis-scan-van-jouw-statuten', 'published_at' => now()]);

    $response = $this->get('/gratis-statutenscan');

    $response->assertStatus(301)
        ->assertRedirect('/articles/gratis-scan-van-jouw-statuten');
});

// ============================================================
// Kennisbank pagination
// ============================================================
test('kennisbank page 2 redirects to articles page 2', function () {
    $response = $this->get('/kennisbank/page/2');

    $response->assertStatus(301)
        ->assertRedirect('/articles?page=2');
});

// ============================================================
// Author redirects
// ============================================================
test('author adminailan redirects to articles', function () {
    $response = $this->get('/author/adminailan');

    $response->assertStatus(301)
        ->assertRedirect('/articles');
});

test('author adminailan page 2 redirects to articles page 2', function () {
    $response = $this->get('/author/adminailan/page/2');

    $response->assertStatus(301)
        ->assertRedirect('/articles?page=2');
});

// ============================================================
// Category redirects
// ============================================================
test('category bestuur redirects to categories bestuur', function () {
    $response = $this->get('/category/bestuur');

    $response->assertStatus(301)
        ->assertRedirect('/categories/bestuur');
});

test('category financiele_werking redirects to categories financiele-werking', function () {
    $response = $this->get('/category/financiele_werking');

    $response->assertStatus(301)
        ->assertRedirect('/categories/financiele-werking');
});

test('category verplichtingen redirects to categories vzw-verplichtingen', function () {
    $response = $this->get('/category/verplichtingen');

    $response->assertStatus(301)
        ->assertRedirect('/categories/vzw-verplichtingen');
});

// ============================================================
// Tag redirects
// ============================================================
test('tag slug redirects to tags slug', function () {
    $response = $this->get('/tag/begroting');

    $response->assertStatus(301)
        ->assertRedirect('/tags/begroting');
});

// ============================================================
// Article redirects — slug mismatches (explicit)
// ============================================================
test('article meer_giften_krijgen redirects to new slug', function () {
    $response = $this->get('/2023/11/04/meer_giften_krijgen');

    $response->assertStatus(301)
        ->assertRedirect('/articles/meer-giften-krijgen-5-tips-voor-een-giftenwerking');
});

test('article extra_regels_wijzigen_statuten redirects to new slug', function () {
    $response = $this->get('/2023/12/20/extra_regels_wijzigen_statuten');

    $response->assertStatus(301)
        ->assertRedirect('/articles/nieuwe-regels-voor-wijzigen-van-statuten');
});

test('article justban_bestuursverbod redirects to new slug', function () {
    $response = $this->get('/2024/01/29/justban_bestuursverbod');

    $response->assertStatus(301)
        ->assertRedirect('/articles/justban-bestuursverbod-raadplegen');
});

test('article begroting-3-tips redirects to new slug', function () {
    $response = $this->get('/2024/10/06/begroting-3-tips');

    $response->assertStatus(301)
        ->assertRedirect('/articles/drie-tips-voor-een-begroting');
});

test('article goed_bestuur_basis redirects to new slug', function () {
    $response = $this->get('/2025/05/01/goed_bestuur_basis');

    $response->assertStatus(301)
        ->assertRedirect('/articles/tips-voor-goed-bestuur-de-basis');
});

// ============================================================
// Article redirects — matching slugs (date-based catch-all)
// ============================================================
test('date-based article url with matching slug redirects to articles', function () {
    $response = $this->get('/2025/07/15/transparantie-bij-vzws');

    $response->assertStatus(301)
        ->assertRedirect('/articles/transparantie-bij-vzws');
});

test('date-based article url with trailing slash strips slash via middleware', function () {
    $response = app(Kernel::class)->handle(Request::create('/2025/07/15/transparantie-bij-vzws/', 'GET'));

    expect($response->getStatusCode())->toBe(301)
        ->and($response->headers->get('Location'))->toEndWith('/2025/07/15/transparantie-bij-vzws');
});

test('date-based catch-all does not match non-numeric year', function () {
    $response = $this->get('/abcd/07/15/some-slug');

    $response->assertStatus(404);
});

// ============================================================
// Existing routes still work (no interference from redirects)
// ============================================================
test('existing aanbod route still works', function () {
    $response = $this->get('/aanbod');

    $response->assertStatus(200);
});

test('existing articles route still works', function () {
    $response = $this->get('/articles');

    $response->assertStatus(200);
});
