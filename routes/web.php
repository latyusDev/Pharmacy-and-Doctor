<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDestroyController;
use App\Http\Controllers\Admin\AdminUpdateController;
use App\Http\Controllers\Pharmacy\PharmacyAuthController;
use App\Http\Controllers\Pharmacy\PharmacyController;
use App\Http\Controllers\Pharmacy\PharmacyReadController;
use App\Http\Controllers\User\UserAuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/',function(){
    return redirect()->route('user.login');
});

Route::group(['prefix'=>'pharmacy','as'=>'pharmacy.','controller'=>PharmacyReadController::class],
function(){
    Route::get('/register','register');
    Route::get('/login','login')->name('login');
    Route::get('/welcome','index')->name('welcome');
    Route::get('/welcome/{drug}','show');
});

Route::resource('pharmacy',PharmacyController::class)->parameters([
    'pharmacy'=>'drug'
]);

// Pharmacy authentication
Route::group(['prefix'=>'pharmacy','controller'=>PharmacyAuthController::class],
function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

// User authentication
Route::group(['prefix'=>'user','controller'=>UserAuthController::class],
function(){

    Route::post('/register','register');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::group(['prefix'=>'user','as'=>'user.','middleware'=>['auth','userStatus'],
'controller'=>UserController::class],function(){

    Route::withoutMiddleware(['auth','userStatus'])->group(function(){
        Route::get('/register','register');
        Route::get('/login','login')->name('login');
    });
    Route::get('/search','search');
    Route::get('/{drug}/buy','buy');
    Route::get('/index','index')->name('index');
    Route::post('/{drug}/order','order');
});


// Admin authentication
Route::group(['prefix'=>'admin','controller'=>AdminAuthController::class],
function(){
    Route::post('/register','register');
    Route::post('/login','login');
    Route::post('/logout','logout');
});

Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'admin']
,function(){
    Route::controller(AdminController::class)->group(function(){
        // user
        Route::get('/users','userIndex');
        // pharmacy
        Route::get('/index','index')->name('index');
        Route::get('/pharmacies','pharmacyIndex');
        //admin
        Route::withoutMiddleware('admin')->group(function(){
            Route::get('/login','login')->name('login');
            Route::get('/register','register');
        });
    });
    // update user && pharmacy records
    Route::controller(AdminUpdateController::class)->group(function(){
        Route::patch('/users/ban/{user}','banUser');
        Route::patch('/users/release/{user}','releaseUser');
        Route::patch('/pharmacies/ban/{pharmacy}','banPharmacy');
        Route::patch('/pharmacies/release/{pharmacy}','releasePharmacy');
    });
    // delete user && pharmacy records
    Route::controller(AdminDestroyController::class)->group(function(){
        Route::delete('/pharmacies/destroy/{pharmacy}','destroyPharmacy');
        Route::delete('/users/destroy/{user}','destroyUser');
    });
});
