<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Plan\PlanController;
use App\Http\Controllers\Admin\Team\TeamController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\UserAuth\AuthController;
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

// User Authentication Routes
Route::get('/register', [AuthController::class, 'register_form'])->name('register_form');
Route::get('/login', [AuthController::class, 'login_form'])->name('login_form');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });
// Route::get('/' , [HomeController::class , 'team_data']);

// Admin Authentication Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/login', [AdminAuthController::class, 'login_form'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::get('/register', [AdminAuthController::class, 'register_form'])->name('admin_register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // Team Routes
    Route::prefix('team')->group(function () {
        Route::get('/form', [TeamController::class, 'team_form'])->name('team.form');
        Route::post('/post', [TeamController::class, 'insert_team'])->name('insert.team');
        Route::get('/data', [TeamController::class, 'team_list'])->name('team.data');
        Route::get('/edit/{id}', [TeamController::class, 'update_form'])->name('team.edit');
        Route::put('/update', [TeamController::class, 'update_team'])->name('team.update');
        Route::delete('/delete', [TeamController::class, 'delete_team'])->name('team.delete');
    });

    // Plan Routes
    Route::prefix('plan')->group(function () {
        Route::get('/form', [PlanController::class, 'plan_form'])->name('plan.form');
        Route::post('/post', [PlanController::class, 'post_plan'])->name('plan.post');
        Route::get('/data', [PlanController::class, 'plan_data'])->name('plan.data');
        Route::get('/edit/form/{id}', [PlanController::class, 'edit_form'])->name('editplan.form');
        Route::put('/edit', [PlanController::class, 'plan_edit'])->name('plan.edit');
        Route::delete('/delete', [PlanController::class, 'delete_plan'])->name('plan.delete');
    });

    // Contact Routes
    Route::prefix('contact')->group(function () {
        Route::get('/data', [ContactController::class, 'contact_data'])->name('contact.data');
        Route::delete('/delete', [ContactController::class, 'delete_contact'])->name('contact.delete');
        Route::get('/user/{user_id}', [ContactController::class, 'user_data'])->name('user.data');
    });
});

// User Contact Route
Route::post('/user/contact', [ContactController::class, 'post_contact'])->name('post.contact');
