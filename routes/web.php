<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ReportController;

use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/product',[ProductController::class,'index'])->name('product');
// Route::post('/product',[ProductController::class,'store'])->name('product-create');
// Route::get('/product/all', [ProductController::class,'productList'])->name('get-all-product');
// Route::post('/modify-product', [ProductController::class,'update'])->name('modify-product');
// Route::get('/delete-product/{id}', [ProductController::class,'destroy'])->name('delete-product');

// Route::get('/sale',[SaleController::class,'index'])->name('sale');
// Route::post('/store-sale',[SaleController::class,'store'])->name('store-sale'); 

// Route::get('/report',[ReportController::class,'index'])->name('report'); 
// Route::post('/get-report',[ReportController::class,'store'])->name('get-report');

Route::get('/', function () {
    return redirect('/student');
});

Route::resource('/student',App\Http\Controllers\StudentController::class)->names('student.data');
Route::get('/student-all',[App\Http\Controllers\StudentController::class,"getAllStudent"])->name('student.all');
Route::post('/student-info',[App\Http\Controllers\StudentController::class,"addStudentInfo"])->name('student.info');

