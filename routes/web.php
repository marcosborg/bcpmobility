<?php

Route::get('/', 'WebsiteController@index');

Route::get('services/{option_id}/{slug}', 'OptionsController@index');

Route::get('cms/{content_page_id}/{slug}', 'WebsiteController@cms');

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

    // Car Brand
    Route::delete('car-brands/destroy', 'CarBrandController@massDestroy')->name('car-brands.massDestroy');
    Route::resource('car-brands', 'CarBrandController');

    // Car Model
    Route::delete('car-models/destroy', 'CarModelController@massDestroy')->name('car-models.massDestroy');
    Route::resource('car-models', 'CarModelController');

    // Car Item
    Route::delete('car-items/destroy', 'CarItemController@massDestroy')->name('car-items.massDestroy');
    Route::post('car-items/media', 'CarItemController@storeMedia')->name('car-items.storeMedia');
    Route::post('car-items/ckmedia', 'CarItemController@storeCKEditorImages')->name('car-items.storeCKEditorImages');
    Route::resource('car-items', 'CarItemController');

    // Driver
    Route::delete('drivers/destroy', 'DriverController@massDestroy')->name('drivers.massDestroy');
    Route::post('drivers/media', 'DriverController@storeMedia')->name('drivers.storeMedia');
    Route::post('drivers/ckmedia', 'DriverController@storeCKEditorImages')->name('drivers.storeCKEditorImages');
    Route::resource('drivers', 'DriverController');

    // Year
    Route::delete('years/destroy', 'YearController@massDestroy')->name('years.massDestroy');
    Route::resource('years', 'YearController');

    // Month
    Route::delete('months/destroy', 'MonthController@massDestroy')->name('months.massDestroy');
    Route::resource('months', 'MonthController');

    // Week
    Route::delete('weeks/destroy', 'WeekController@massDestroy')->name('weeks.massDestroy');
    Route::resource('weeks', 'WeekController');

    // Carmanagement
    Route::delete('carmanagements/destroy', 'CarmanagementController@massDestroy')->name('carmanagements.massDestroy');
    Route::resource('carmanagements', 'CarmanagementController');

    // Damage
    Route::delete('damages/destroy', 'DamageController@massDestroy')->name('damages.massDestroy');
    Route::post('damages/media', 'DamageController@storeMedia')->name('damages.storeMedia');
    Route::post('damages/ckmedia', 'DamageController@storeCKEditorImages')->name('damages.storeCKEditorImages');
    Route::resource('damages', 'DamageController');

    // Content Category
    Route::delete('content-categories/destroy', 'ContentCategoryController@massDestroy')->name('content-categories.massDestroy');
    Route::resource('content-categories', 'ContentCategoryController');

    // Content Tag
    Route::delete('content-tags/destroy', 'ContentTagController@massDestroy')->name('content-tags.massDestroy');
    Route::resource('content-tags', 'ContentTagController');

    // Content Page
    Route::delete('content-pages/destroy', 'ContentPageController@massDestroy')->name('content-pages.massDestroy');
    Route::post('content-pages/media', 'ContentPageController@storeMedia')->name('content-pages.storeMedia');
    Route::post('content-pages/ckmedia', 'ContentPageController@storeCKEditorImages')->name('content-pages.storeCKEditorImages');
    Route::resource('content-pages', 'ContentPageController');

    // Vehicle Expenses
    Route::delete('vehicle-expenses/destroy', 'VehicleExpensesController@massDestroy')->name('vehicle-expenses.massDestroy');
    Route::post('vehicle-expenses/media', 'VehicleExpensesController@storeMedia')->name('vehicle-expenses.storeMedia');
    Route::post('vehicle-expenses/ckmedia', 'VehicleExpensesController@storeCKEditorImages')->name('vehicle-expenses.storeCKEditorImages');
    Route::resource('vehicle-expenses', 'VehicleExpensesController');

    // Vehicle Documents
    Route::delete('vehicle-documents/destroy', 'VehicleDocumentsController@massDestroy')->name('vehicle-documents.massDestroy');
    Route::post('vehicle-documents/media', 'VehicleDocumentsController@storeMedia')->name('vehicle-documents.storeMedia');
    Route::post('vehicle-documents/ckmedia', 'VehicleDocumentsController@storeCKEditorImages')->name('vehicle-documents.storeCKEditorImages');
    Route::resource('vehicle-documents', 'VehicleDocumentsController');

    // Season
    Route::delete('seasons/destroy', 'SeasonController@massDestroy')->name('seasons.massDestroy');
    Route::resource('seasons', 'SeasonController');

    // Parking Ticket
    Route::delete('parking-tickets/destroy', 'ParkingTicketController@massDestroy')->name('parking-tickets.massDestroy');
    Route::post('parking-tickets/media', 'ParkingTicketController@storeMedia')->name('parking-tickets.storeMedia');
    Route::post('parking-tickets/ckmedia', 'ParkingTicketController@storeCKEditorImages')->name('parking-tickets.storeCKEditorImages');
    Route::resource('parking-tickets', 'ParkingTicketController');

    // Vehicle Maintenance
    Route::delete('vehicle-maintenances/destroy', 'VehicleMaintenanceController@massDestroy')->name('vehicle-maintenances.massDestroy');
    Route::post('vehicle-maintenances/media', 'VehicleMaintenanceController@storeMedia')->name('vehicle-maintenances.storeMedia');
    Route::post('vehicle-maintenances/ckmedia', 'VehicleMaintenanceController@storeCKEditorImages')->name('vehicle-maintenances.storeCKEditorImages');
    Route::resource('vehicle-maintenances', 'VehicleMaintenanceController');

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
