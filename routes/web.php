<?php

use Illuminate\Support\Facades\Route;

Route::get('/beranda', function () {
    return view('index', ['title' => 'Beranda']);
})->name('beranda')->middleware('auth.login');




// login
Route::get("/login", "AuthController@viewLogin")
    ->name("view_login");
Route::post("/login", "AuthController@submitLogin")
    ->name("submit_login");
// login




// logout user
Route::get("/logout", "AuthController@logout")->name("logout");
// logout user


Route::prefix("admin")->middleware(["admin.login"])->group(function () {

    // tambah opd
    Route::get("/opd/tambah", "AuthController@viewBuatOpd")->name("admin.view_buatopd");
    Route::post("/opd/tambah", "AuthController@submitBuatOpd")->name("admin.submit_buatopd");
    // tambah opd

    // list admin
    Route::get('/list', 'AuthController@list_admin')->name('list.admin');

    // register user untuk opd
    Route::get("/register", "AuthController@viewRegister")->name("admin.register");
    Route::post("/register", "AuthController@submitRegister")->name("admin.submit_register");
    // register user untuk opd



});
