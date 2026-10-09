<?php

test('drukwerk subdomain returns the home page', function () {
    $response = $this->get(route('drukwerk.index'));

    $response->assertOk()
        ->assertSee('LAVIR Drukwerk', false)
        ->assertSee('Producten in de kijker', false)
        ->assertSee('Vul hier een vrijblijvende offerte aanvraag in', false);
});

test('drukwerk home page loads assets from trusted sources', function () {
    $response = $this->get(route('drukwerk.index'));

    $response->assertOk()
        ->assertSee('/img/drukwerk/products/tapijt.png', false)
        ->assertSee('https://popup.print.com/widget.js?id=588', false)
        ->assertSee('https://fonts.bunny.net', false);
});

test('drukwerk images are present in the public directory', function () {
    expect(public_path('img/drukwerk/products/tapijt.png'))->toBeFile()
        ->and(public_path('img/drukwerk/photos/foto-lissa.jpg'))->toBeFile();
});
