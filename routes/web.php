<?php

use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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



Route::get('/', [DashboardController::class , 'index'])->name('home');


Route::middleware('guest')->group(function(){
    //Route::view('/', 'recipe')->name('recipe');
    Route::get('/fullRecipes', [DashboardController::class , 'showAllRecipes'])->name('showAllRecipes');
    Route::get('/register', [AuthController::class,'showRegister'])->name('show.register');
    Route::get('/login', [AuthController::class,'showLogin'])->name('show.login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class,'login'])->name('login');
});


Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::get('/home', [DashboardController::class , 'index'])->name('dashboard');
    Route::get('/fullRecipes-user', [DashboardController::class , 'showAllRecipes'])->name('showAllRecipes.auth');
    Route::get('/user-profile-recipes/{id}', [DashboardController::class , 'showUserProfile'])->name('showUserProfile');
    Route::get('/user-recipes',[RecipeController::class, 'index'])->name('recipes.index');
    Route::get('/userCreatePost-recipes',[RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/userStorePost-recipes',[RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/userSelectPost-recipes/{id}',[RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/userEditPost-recipes/{id}',[RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/userUpdatePost-recipes/{id}',[RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/userDeletePost-recipes/{id}',[RecipeController::class, 'destroy'])->name('recipes.delete');
});

