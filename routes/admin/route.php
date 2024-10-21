<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () { return redirect()->route('login');});

Route::group(['prefix' => 'login'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('', [LoginController::class, 'login']);
});


Route::group(['namespace' => 'Admin','prefix'=>'admin','as'=>'admin.',],function (){
    Route::group(['middleware'=>'admin',],function (){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');

//        Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function (){
//            Route::group(['middleware'=>['module:category']], function () {
//                Route::get('/','index')->name('index');
//                Route::post('/store','store')->name('store');
//                Route::get('/edit','edit')->name('edit');
//                Route::post('/update/{id}','update')->name('update');
//                Route::post('/status-update','status_update')->name('status_update');
//                Route::get('/delete','delete')->name('delete');
//                Route::get('/status-update','status_update')->name('status-update');
//            });
//
//        });

    });

});
