<?php

Route::get('/', 'WebsiteController@index');
Route::get('services/{option_id}/{slug}', 'OptionsController@index');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Menu
    Route::delete('menus/destroy', 'MenuController@massDestroy')->name('menus.massDestroy');
    Route::resource('menus', 'MenuController');

    // Hero
    Route::delete('heroes/destroy', 'HeroController@massDestroy')->name('heroes.massDestroy');
    Route::post('heroes/media', 'HeroController@storeMedia')->name('heroes.storeMedia');
    Route::post('heroes/ckmedia', 'HeroController@storeCKEditorImages')->name('heroes.storeCKEditorImages');
    Route::resource('heroes', 'HeroController');

    // Brand
    Route::delete('brands/destroy', 'BrandController@massDestroy')->name('brands.massDestroy');
    Route::post('brands/media', 'BrandController@storeMedia')->name('brands.storeMedia');
    Route::post('brands/ckmedia', 'BrandController@storeCKEditorImages')->name('brands.storeCKEditorImages');
    Route::resource('brands', 'BrandController');

    // Services
    Route::delete('services/destroy', 'ServicesController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServicesController');

    // Cta
    Route::delete('cta/destroy', 'CtaController@massDestroy')->name('cta.massDestroy');
    Route::post('cta/media', 'CtaController@storeMedia')->name('cta.storeMedia');
    Route::post('cta/ckmedia', 'CtaController@storeCKEditorImages')->name('cta.storeCKEditorImages');
    Route::resource('cta', 'CtaController');

    // Option
    Route::delete('options/destroy', 'OptionController@massDestroy')->name('options.massDestroy');
    Route::post('options/media', 'OptionController@storeMedia')->name('options.storeMedia');
    Route::post('options/ckmedia', 'OptionController@storeCKEditorImages')->name('options.storeCKEditorImages');
    Route::resource('options', 'OptionController');

    // Contact
    Route::delete('contacts/destroy', 'ContactController@massDestroy')->name('contacts.massDestroy');
    Route::resource('contacts', 'ContactController');

    // Lang
    Route::delete('langs/destroy', 'LangController@massDestroy')->name('langs.massDestroy');
    Route::resource('langs', 'LangController');

    // Slide
    Route::delete('slides/destroy', 'SlideController@massDestroy')->name('slides.massDestroy');
    Route::post('slides/media', 'SlideController@storeMedia')->name('slides.storeMedia');
    Route::post('slides/ckmedia', 'SlideController@storeCKEditorImages')->name('slides.storeCKEditorImages');
    Route::resource('slides', 'SlideController');

    // About
    Route::delete('abouts/destroy', 'AboutController@massDestroy')->name('abouts.massDestroy');
    Route::post('abouts/media', 'AboutController@storeMedia')->name('abouts.storeMedia');
    Route::post('abouts/ckmedia', 'AboutController@storeCKEditorImages')->name('abouts.storeCKEditorImages');
    Route::resource('abouts', 'AboutController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
