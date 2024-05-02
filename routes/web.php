<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.layout.app');
});


//
Route::get('panel/categories/index',[categoryController::class,'index'])->name('panel.categoryindex');
//

//Task routeları start
Route::get('panel/tasks/create',[TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('panel/tasks/add',[TaskController::class,'addTask'])->name('panel.addTask');


//task routeları end
