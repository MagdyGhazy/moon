<?php

use App\Http\Controllers\Api\AdminFeedController;
use App\Http\Controllers\Api\appbcontroller;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientsController;
use App\Http\Controllers\Api\ContactUsController;
use App\Http\Controllers\Api\DetailsAboutController;
use App\Http\Controllers\Api\MainAboutController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserFeedController;
use App\Http\Controllers\Api\webcontroller;
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



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::middleware(['jwt.verify'])->group(function () {


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

    Route::controller(webcontroller::class)->group(function () {
        Route::get('/webpro', 'index');
        Route::get('/webpro/{id}', 'show');
        Route::post('/insert/webpro', 'store');
        Route::post('/edit/webpro/{id}', 'update');
        Route::post('/del/webpro/{id}', 'destroy');
    });
    Route::controller(appbcontroller::class)->group(function () {
        Route::get('/Apppro', 'index');
        Route::get('/Apppro/{id}', 'show');
        Route::post('/insert/Apppro', 'store');
        Route::post('/edit/Apppro/{id}', 'update');
        Route::post('/del/Apppro/{id}', 'destroy');
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

    Route::controller(UserFeedController::class)->group(function () {
        Route::get('/userfeed', 'index');
        Route::get('/userfeed/{id}', 'show');
        Route::post('/insert/userfeed', 'store');
        Route::post('/edit/userfeed/{id}', 'update');
        Route::post('/del/userfeed/{id}', 'destroy');
    });

    Route::controller(AdminFeedController::class)->group(function () {
        Route::get('/adminfeed', 'index');
        Route::get('/adminfeed/{id}', 'show');
        Route::post('/insert/adminfeed', 'store');
        Route::post('/edit/adminfeed/{id}', 'update');
        Route::post('/del/adminfeed/{id}', 'destroy');
    });

});
