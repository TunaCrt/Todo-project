<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('panel.layout.app');
});  */
Route::get('/', function () {
    return view('welcome');
});

//Task routeları start
Route::get('panel/tasks/index',[TaskController::class,'index'])->name('panel.IndexTaskPage');

Route::get('panel/tasks/create',[TaskController::class,'createPage'])->name('panel.CreateTaskPage');
Route::post('panel/tasks/add',[TaskController::class,'addTask'])->name('panel.addTask');

Route::get('panel/tasks/update/{id}',[TaskController::class,'update'])->name('panel.taskUpdatePage');
Route::post('panel/tasks/updatePost',[TaskController::class,'updateTask'])->name('panel.updateTask');

Route::get('panel/tasks/delete/{id}',[TaskController::class,'destroy'])->name('panel.TaskDelete');


//task routeları end

//Task kategori start
Route::get('panel/categories/index',[categoryController::class,'index'])->name('panel.categoryIndex');

Route::get('panel/categories/create',[categoryController::class,'create'])->name('panel.categoryCreatePage');
Route::Post('panel/categories/addCategory',[categoryController::class,'store'])->name('panel.categoryAdd');

Route::get('panel/categories/update/{id}',[categoryController::class,'update'])->name('panel.categoryUpdatePage');
Route::post('panel/categories/updatePost',[categoryController::class,'updateCategory'])->name('panel.updateCategory');

Route::get('panel/categories/delete/{id}',[categoryController::class,'destroy'])->name('panel.categoryDelete');
//Task kategori end

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
