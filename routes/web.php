<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestimoniController;

// Halaman utama
Route::get('/', function () {
    $testimoni = \App\Models\Testimoni::where('aktif', true)->latest()->get();
    return view('pages.home', compact('testimoni'));
});

// Login
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login', function () {
    $credentials = request()->validate([
        'email'    => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended('/admin/testimoni');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
})->name('admin.login.post');

Route::post('/admin/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/admin/login');
})->name('admin.logout');

// Route admin (protected)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('testimoni', TestimoniController::class)->except(['show']);
});