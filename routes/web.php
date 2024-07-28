<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Frontend\HomepageController;
use App\Http\Controllers\Frontend\PropertyController;




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

Route::get('/',[HomepageController::class, 'index'])->name('home');
Route::get('/about',[AboutController::class, 'index'])->name('about');
Route::get('/property',[PropertyController::class, 'index'])->name('property');
Route::get('/property/{property:slug}', [PropertyController::class, 'show'])->name('property.show');
Route::get('/contact',[ContactController::class, 'index'])->name('contact');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('sliders', SliderController::class)->except('show');
    Route::resource('testimonials', TestimonialController::class)->except('show');
    Route::resource('agents', AgentController::class)->except('show');
    Route::resource('properties',App\Http\Controllers\Admin\PropertyController::class)->except('show');


});
