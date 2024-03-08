<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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

Route::middleware("after_login")->group(function(){
    Route::get("/users/register", [UserController::class, "register"])->name("register.page");
    Route::post("/users/register", [UserController::class, "create"])->name("register.action");

    Route::get("/login", [UserController::class, "login"])->name("login.page");
    Route::post("/login", [UserController::class, "loginAction"])->name("login.action");
});


Route::get("/logout", [UserController::class, "logout"])->name("user.logout");

Route::middleware("auth")->group(function(){
    Route::get("/main", [TodoController::class, "main"])->name("main.page");

    Route::get("/todo/create", [TodoController::class, "createPage"])->name("todo.create.page");
    Route::post("/todo/create", [TodoController::class, "create"])->name("create.todo");
    Route::get("/todo/{id}/detail", [TodoController::class, "detail"])->name("todo.detail");

    Route::get("/todo/{id}/check", [TodoController::class, "check"])->name("todo.check");

    Route::get("/todo/{id}/delete", [TodoController::class, "delete"])->name("todo.delete");
    Route::get("/todo/{id}/undo", [TodoController::class, "undo"])->name("todo.undo");


    Route::get("/profile", [UserController::class, "profile"])->name("profile.page");
    Route::get("/profile/update", [UserController::class, "updateProfilePage"])->name("update.profile.page");
    Route::post("/profile/update", [UserController::class, "updateUserAction"])->name("update.profile.action");
});