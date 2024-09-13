<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Menu
    Route::apiResource('menus', 'MenuApiController');

    // Hero
    Route::post('heroes/media', 'HeroApiController@storeMedia')->name('heroes.storeMedia');
    Route::apiResource('heroes', 'HeroApiController');

    // Brand
    Route::post('brands/media', 'BrandApiController@storeMedia')->name('brands.storeMedia');
    Route::apiResource('brands', 'BrandApiController');

    // Services
    Route::apiResource('services', 'ServicesApiController');

    // Cta
    Route::post('cta/media', 'CtaApiController@storeMedia')->name('cta.storeMedia');
    Route::apiResource('cta', 'CtaApiController');

    // Option
    Route::post('options/media', 'OptionApiController@storeMedia')->name('options.storeMedia');
    Route::apiResource('options', 'OptionApiController');

    // Contact
    Route::apiResource('contacts', 'ContactApiController');

    // Slide
    Route::post('slides/media', 'SlideApiController@storeMedia')->name('slides.storeMedia');
    Route::apiResource('slides', 'SlideApiController');

    // About
    Route::post('abouts/media', 'AboutApiController@storeMedia')->name('abouts.storeMedia');
    Route::apiResource('abouts', 'AboutApiController');
});
