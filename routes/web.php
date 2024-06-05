<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\Plan\PlanController;
use App\Http\Controllers\Admin\Team\TeamController;
use App\Http\Controllers\home\homecontroller;
use App\Http\Controllers\UserAuth\AuthController;
use App\Http\Controllers\UserAuth\RegisterController;
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

Route::get('/register' , [AuthController::class , 'register_form'])->name('register_form');
Route::get('/login' , [AuthController::class , 'login_form'])->name('login_form');
Route::post('/register' , [AuthController::class , 'register']);
Route::post('/login' , [AuthController::class , 'login']);

Route::group(['prefix' => '/' , 'middleware' => 'auth'], function(){
    Route::get('/' , [homecontroller::class , 'home'])->name('home');
    Route::get('/logout' , [AuthController::class , 'logout'])->name('logout');
});


Route::get('/admin' , [AdminController::class , 'index'])->name('admin.home');
Route::get('/admin/login' , [AdminAuthController::class , 'login_form'])->name('admin.login');
Route::post('/admin/login' , [AdminAuthController::class , 'login']);
Route::get('/admin/register' , [AdminAuthController::class , 'register_form'])->name('admin_register');
Route::post('/admin/register' , [AdminAuthController::class , 'register']);
Route::post('/admin/logout' , [AdminAuthController::class , 'logout'])->name('admin.logout');

//team Routes

Route::get('admin/team_form' , [TeamController::class , 'team_form'])->name('team.form');
Route::post('admin/team_post' , [TeamController::class , 'insert_team'])->name('insert.team');
Route::get('admin/team.data' , [TeamController::class , 'team_list'])->name('team.data');
Route::get('admin/team.edit/{id}' , [TeamController::class , 'update_form'])->name('team.edit');
Route::put('admin/team.update' , [TeamController::class , 'update_team'])->name('team.update');
Route::delete('admin/team.delete' , [TeamController::class , 'delete_team'])->name('team.delete');

//plans Routes

Route::get('admin/plan.form' , [PlanController::class , 'plan_form'])->name('plan.form');
Route::post('admin/post.plan' , [PlanController::class , 'post_plan'])->name('plan.post');
Route::get('admin/plan.data' , [PlanController::class , 'plan_data'])->name('plan.data');
Route::get('admin/planedit.form/{id}' , [PlanController::class , 'edit_form'])->name('editplan.form');
Route::put('admin/plan.edit' , [PlanController::class , 'plan_edit'])->name('plan.edit');
Route::delete('admin/plan.delete' , [PlanController::class , 'delete_plan'])->name('plan.delete');