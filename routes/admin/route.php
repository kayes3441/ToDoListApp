<?php

use App\Enums\ViewPath\Admin\TaskEnum;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaskController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () { return redirect()->route('login');});

Route::group(['prefix' => 'login'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('', [LoginController::class, 'login']);
});


Route::group(['prefix'=>'admin','as'=>'admin.',],function (){
    Route::group(['middleware'=>'admin',],function (){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard.index');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');

        Route::controller(TaskController::class)->prefix('task')->name('task.')->group(function (){
            Route::group(['middleware'=>['module:task']], function () {
                Route::get(TaskEnum::INDEX[URI],'index')->name('index');
                Route::post(TaskEnum::INDEX[URI],'add');
                Route::get(TaskEnum::LIST[URI].'/'.'{status}','getList')->name('list');
                Route::get(TaskEnum::UPDATE[URI].'/'.'{id}','getUpdateView')->name('update');
                Route::post(TaskEnum::UPDATE[URI].'/'.'{id}','update');
                Route::get(TaskEnum::DELETE[URI].'/'.'{id}','delete')->name('delete');
            });
        });

    });

});
