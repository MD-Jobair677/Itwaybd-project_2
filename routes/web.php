<?php

use App\Http\Controllers\Categorie\CategorieController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[CategorieController::class,'index'])->name('categorie.add');

Route::prefix('/categorie')->controller(CategorieController::class)->name('categorie.')->group(function(){

    Route::post('/add','storeCategorie')->name('store');
    Route::get('/show','showCategorie')->name('show');
    Route::get('/edite/{id}','editeCategory')->name('edite');
    Route::put('/update/{id}','updateCategory')->name('Update');
    Route::delete('/delete/{id}','deleteCategory')->name('delete');



});