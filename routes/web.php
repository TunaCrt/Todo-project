<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.layout.app');
});

//Task routeları start
Route::get('panel/tasks/create',[TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('panel/tasks/add',[TaskController::class,'addTask'])->name('panel.addTask');
//task routeları end

//Task kategori start
Route::get('panel/categories/index',[categoryController::class,'index'])->name('panel.categoryIndex');
Route::get('panel/categories/create',[categoryController::class,'create'])->name('panel.categoryCreatePage');
Route::Post('panel/categories/addCategory',[categoryController::class,'store'])->name('panel.categoryAdd');

Route::get('panel/categories/update/{id}',[categoryController::class,'update'])->name('panel.categoryUpdatePage');
Route::post('panel/categories/updatePost',[categoryController::class,'updateCategory'])->name('panel.updateCategory');

Route::get('panel/categories/delete/{id}',[categoryController::class,'destroy'])->name('panel.categoryDelete');
//Task kategori end
