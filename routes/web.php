<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StundentWithExtracurricullarController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/post-login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'editProfile'])->name('edit.profile');
    Route::put('/update-profile', [DashboardController::class, 'updateProfile'])->name('update.profile');

    Route::resource('students',StudentController::class)->names([
        'index' => 'students.index',
        'create' => 'students.create',     
        'store' => 'students.store',       
        'edit' => 'students.edit',         
        'update' => 'students.update',     
        'destroy' => 'students.destroy',
    ]);

    Route::resource('extracurricular-activities', ExtracurricularController::class)->names([
        'index' => 'extracurricular-activities.index',
        'create' => 'extracurricular-activities.create',
        'store' => 'extracurricular-activities.store',
        'show' => 'extracurricular-activities.show',
        'edit' => 'extracurricular-activities.edit',
        'update' => 'extracurricular-activities.update',
        'destroy' => 'extracurricular-activities.destroy',
    ]);

    
    Route::resource('enrollment-activities', StundentWithExtracurricullarController::class)->names([
        'index' => 'enrollment-activities.index',
        'create' => 'enrollment-activities.create',
        'store' => 'enrollment-activities.store',
        'show' => 'enrollment-activities.show',
        'edit' => 'enrollment-activities.edit',
        'update' => 'enrollment-activities.update',
        'destroy' => 'enrollment-activities.destroy',
    ]);

});
