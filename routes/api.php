<?php

use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\DetailsAboutController;
use App\Http\Controllers\Api\MainAboutController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->group(function (){
    Route::get('sections',\App\Http\Controllers\Api\SectionController::class);
    Route::get('categories',\App\Http\Controllers\Api\CategoryController::class);
    Route::get('categories/{id}/contents',[\App\Http\Controllers\Api\ContentController::class,'show']);
    Route::get('sections/{id}/contents',[\App\Http\Controllers\Api\ContentController::class,'showBySection']);
    Route::get('contents',[\App\Http\Controllers\Api\ContentController::class,'index']);
    Route::get('settings',\App\Http\Controllers\Api\SettingController::class);
    Route::get('shared_backgrounds/{id}',[\App\Http\Controllers\Web\Admin\SharedBackgroundsController::class,'show']);
    Route::post('notifications_token/store',[\App\Http\Controllers\Api\NotificationController::class,'storeToken']);
    Route::get('notifications',[\App\Http\Controllers\Api\NotificationController::class,'getNotifications']);
});


Route::controller(ClientsController::class)->group(function () {
    Route::get('/clients', 'index');
    Route::get('/clients/{id}', 'show');
    Route::post('/insert/clients', 'store');
    Route::post('/edit/clients/{id}', 'update');
    Route::post('/del/clients/{id}', 'destroy');
});

Route::controller(TeamController::class)->group(function () {
    Route::get('/team', 'index');
    Route::get('/team/{id}', 'show');
    Route::post('/insert/team', 'store');
    Route::post('/edit/team/{id}', 'update');
    Route::post('/del/team/{id}', 'destroy');
});

Route::controller(ContactUsController::class)->group(function () {
    Route::get('/contact', 'index');
    Route::get('/contact/{id}', 'show');
    Route::post('/insert/contact', 'store');
    Route::post('/edit/contact/{id}', 'update');
    Route::post('/del/contact/{id}', 'destroy');
});

Route::controller(MainAboutController::class)->group(function () {
    Route::get('/main', 'index');
    Route::get('/main/{id}', 'show');
    Route::post('/insert/main', 'store');
    Route::post('/edit/main/{id}', 'update');
    Route::post('/del/main/{id}', 'destroy');
});


Route::controller(DetailsAboutController::class)->group(function () {
    Route::get('/details', 'index');
    Route::get('/details/{id}', 'show');
    Route::post('/insert/details', 'store');
    Route::post('/edit/details/{id}', 'update');
    Route::post('/del/details/{id}', 'destroy');
});
