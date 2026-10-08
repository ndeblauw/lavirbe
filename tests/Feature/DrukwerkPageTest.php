<?php

test('drukwerk subdomain returns the static home page', function () {
    $response = $this->get(route('drukwerk.index'));

    $response->assertOk()
        ->assertSee('LAVIR Drukwerk', false)
        ->assertSee('Producten in de kijker', false);
});

test('drukwerk home page references locally hosted assets', function () {
    $response = $this->get(route('drukwerk.index'));

    $response->assertOk()
        ->assertSee('/img/drukwerk/products/tapijt.png', false)
        ->assertSee('/css/drukwerk/style.min.css', false)
        ->assertSee('/js/drukwerk/custom.js', false)
        ->assertSee('/fonts/drukwerk/Poppins-Bold.woff2', false);
});

test('drukwerk assets are present in the public directory', function () {
    expect(public_path('img/drukwerk/products/tapijt.png'))->toBeFile()
        ->and(public_path('css/drukwerk/style.min.css'))->toBeFile()
        ->and(public_path('js/drukwerk/custom.js'))->toBeFile()
        ->and(public_path('fonts/drukwerk/Poppins-Bold.woff2'))->toBeFile();
});
