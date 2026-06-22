<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\AttendanceController;

// บังคับว่าต้อง Login ก่อนถึงจะเข้าหน้าระบบเช็คชื่อได้
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('attendance', AttendanceController::class);
});

Route::get('/setup-db', function () {
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'AttendanceSeeder', '--force' => true]);
    return 'ยินดีด้วย! สร้างตารางและฐานข้อมูลสำเร็จแล้ว 🎉';
});

require __DIR__.'/auth.php';
