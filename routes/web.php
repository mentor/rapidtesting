<?php

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('webhook/created', 'WebhookController@created')->withoutMiddleware(VerifyCsrfToken::class);
Route::post('webhook/status', 'WebhookController@status')->withoutMiddleware(VerifyCsrfToken::class);
Route::post('webhook/change', 'WebhookController@change')->withoutMiddleware(VerifyCsrfToken::class);

Route::get('verify/{code_ref}', 'VerifyController@verify')->name('verify');
Route::post('verify/{code_ref}', 'VerifyController@verify');

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes(['register' => false]);

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
    Route::get('users/impersonate/{user}', 'UsersController@impersonate')->name('users.impersonate');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Centre
    Route::delete('centres/destroy', 'CentreController@massDestroy')->name('centres.massDestroy');
    Route::post('centres/parse-csv-import', 'CentreController@parseCsvImport')->name('centres.parseCsvImport');
    Route::post('centres/process-csv-import', 'CentreController@processCsvImport')->name('centres.processCsvImport');
    Route::resource('centres', 'CentreController');

    // Test
    Route::delete('tests/destroy', 'TestController@massDestroy')->name('tests.massDestroy');
    Route::post('tests/parse-csv-import', 'TestController@parseCsvImport')->name('tests.parseCsvImport');
    Route::post('tests/process-csv-import', 'TestController@processCsvImport')->name('tests.processCsvImport');
    Route::resource('tests', 'TestController');

    // Service
    Route::delete('services/destroy', 'ServiceController@massDestroy')->name('services.massDestroy');
    Route::resource('services', 'ServiceController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('tests/email/{code_ref}', 'TestController@email')->name('tests.email');
    Route::get('tests/pdf/{code_ref}', 'TestController@pdf')->name('tests.pdf');
    Route::get('tests/{test}/presence/{presence}', 'TestController@presence')->name('tests.presence');

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
