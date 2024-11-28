<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AdminController;





Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/help', function () {
    return view('help');
})->name('help');

Route::get('/greetings', function () {
    return view('greetings');
})->name('greetings');

Route::middleware('auth')->prefix('guest')->group(function () {
    Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('guest.dashboard');
    Route::get('/message-form', [GuestController::class, 'showMessageForm'])->name('guest.messageForm');
    Route::post('/send-message', [GuestController::class, 'sendMessage'])->name('guest.sendMessage');
    Route::get('/kirim_pesan', [GuestController::class, 'kirim_pesan'])->name('guest.kirim_pesan');
    Route::get('/thank-you', [GuestController::class, 'thankYou'])->name('guest.thankYou');
    Route::get('/messages', [GuestController::class, 'viewMessage'])->name('guest.viewMessage');
    Route::get('/daftarpesan', [GuestController::class, 'daftarpesan'])->name('admin.daftarpesan');
    Route::put('/update/{id}', [GuestController::class, 'update'])->name('guest.update');
    Route::get('/edit-message', [GuestController::class, 'editMessage'])->name('guest.editMessage');
    Route::patch('/update-message', [GuestController::class, 'updateMessage'])->name('guest.updateMessage');
    Route::delete('/destroy/{id_messages}', [GuestController::class, 'destroy'])->name('guest.delete');

});

// Admin routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/pesan_masuk', [AdminController::class, 'pesan_masuk'])->name('admin.pesan_masuk');
    // web.php (routes)
Route::post('/jawab', [AdminController::class, 'jawab'])->name('admin.jawab');
Route::get('/lihat-file/{id}', [AdminController::class, 'lihatfile'])->name('admin.lihatfile');

});


// Authentication routes
Route::post('/login-admin', [AuthController::class, 'login'])->name('login');
Route::post('/login-user', [AuthController::class, 'loginUser'])->name('auth.loginUser');
Route::get('/login-user', [AuthController::class, 'loginUser'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('guest.register');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('guest.handleRegister');
// Route untuk memilih jenis login
Route::get('/choose-login', function () {
    return view('choose_login');
})->name('chooseLogin');

// Route untuk menangani aksi pemilihan login
Route::post('/choose-login', [AuthController::class, 'chooseLogin'])->name('handleChooseLogin');

// Login Form Routes
Route::get('/login-guest', function () {
    return view('guest_login');
})->name('guest.login');

Route::get('/login-admin', function () {
    return view('admin_login');
})->name('admin.login');

// Menangani login sebagai Guest
Route::post('/guest-login', [AuthController::class, 'guestLogin'])->name('guest.handleLogin');

// Menangani login sebagai Admin
Route::post('/admin-login', [AuthController::class, 'adminLogin'])->name('admin.handleLogin');

// Route untuk dashboard guest setelah login
Route::get('/guest/dashboard', [GuestController::class, 'dashboard'])->name('guest.dashboard');

// Route untuk mengirim pesan
Route::post('/guest/send-message', [GuestController::class, 'sendMessage'])->name('guest.sendMessage');

Route::post('guest/thank-you', [GuestController::class, 'thankYou'])->name('guest.thankYou');

Route::get('/guest/view-message', [GuestController::class, 'viewMessage'])->name('guest.viewMessage');

Route::get('guest/edit-message/{message}', [GuestController::class, 'editMessage'])->name('guest.editMessage');
Route::put('guest/edit-message/{message}', [GuestController::class, 'updateMessage'])->name('guest.updateMessage');

Route::delete('guest/delete-message/{message}', [GuestController::class, 'deleteMessage'])->name('guest.deleteMessage');

// Route untuk Admin Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

// Route untuk melihat daftar pesan
Route::get('/admin/messages', [AdminController::class, 'dashboard'])->name('admin.messages');

// Route untuk detail pesan
Route::get('/admin/messages/{message}', [AdminController::class, 'showMessage'])->name('admin.messageDetail');

// Route untuk membalas pesan
Route::post('/admin/messages/{message}/reply', [AdminController::class, 'replyMessage'])->name('admin.replyMessage');
