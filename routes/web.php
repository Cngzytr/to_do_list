<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('App\Http\Controllers')->prefix('')->group(function () {
    
    require __DIR__.'/auth.php';

    Route::group(['prefix' => '/'], function () {
        Route::get('', 'ToDoListController@index')->middleware(['auth'])->name('todo.index');
        Route::post('save', 'ToDoListController@save')->middleware('auth')->name('todo.save');
        Route::post('edit', 'ToDoListController@edit')->middleware('auth')->name('todo.edit');
        Route::get('active/{id}', 'ToDoListController@active')->middleware('auth')->name('todo.active');
        Route::get('delete/{id}', 'ToDoListController@delete')->middleware('auth')->name('todo.delete');
        Route::get('logs', 'ToDoListController@logs')->middleware('auth')->name('todo.logs');
    });

});



