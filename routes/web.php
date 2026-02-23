<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;



Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Group Route prefix admin
Route::prefix('admin')->group(function () {
    //Group Route middleware role admin
    Route::group(['middleware' => ['auth','role:admin']], function () {
         //Group Route yang hanya bisa diakses oleh role admin ketika login
        Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.dashboard');
        Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('supplier', App\Http\Controllers\Admin\SupplierController::class);
        Route::resource('product', App\Http\Controllers\Admin\ProductController::class);


    });
});

//Group Route prefix viewer
Route::prefix('viewer')->group(function () {
    //Group Route middleware role viewer
    Route::group(['middleware' => ['auth','role:viewer']], function () {
            //Group Route yang hanya bisa diakses oleh role viewer ketika login
            Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'viewer'])->name('viewer.dashboard');
            Route::resource('catalogue', App\Http\Controllers\ViewerController::class)
            ->only(['index','show']
            );
    });
});