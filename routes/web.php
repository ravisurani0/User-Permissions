<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionTableController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermetions;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\UserPermetions;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {

    // All User 
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    // If User Has Permission
    Route::resource('user', UsersController::class);
    Route::resource('employee', EmployeeController::class);
    // Route::get('remove_employee/{employee}', [EmployeeController::class,'destroy'])->name('remove_employee');
    Route::resource('products', ProductsController::class);
    Route::resource('stores', StoresController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permission-table', PermissionTableController::class);

    // If User Has Permission
    Route::get('/user-permeations', [UserPermetions::class, 'index'])->name('user-permeations.index');
    Route::get('/user-permeations/{id}', [UserPermetions::class, 'show'])->name('user-permeations.show');
    Route::put('/user-permeations/{id}', [UserPermetions::class, 'update'])->name('user-permeations.update');


    Route::get('/role-permeations', [RolePermetions::class, 'index'])->name('role-permeations.index');
    Route::get('/role-permeations/{id}', [RolePermetions::class, 'show'])->name('role-permeations.show');
    Route::put('/role-permeations/{id}', [RolePermetions::class, 'update'])->name('role-permeations.update');

    Route::get('/user-role', [RolePermetions::class, 'userRoleindex'])->name('user-role.index');

    Route::get('activity-logs/{userId?}', [ActivityLogController::class, 'index'])->name('activity-logs.index');

    Route::get('/page-not-found', function () {
        return view('pageNotFound');
    })->name('page-not-found');

    Route::get('/unauthorized', function () {
        return view('unauthorized');
    })->name('unauthorized');
});
