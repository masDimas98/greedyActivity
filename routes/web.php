<?php

use App\Livewire\Greedy\Ready;
use Illuminate\Support\Facades\Route;

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/', 'HomeController@index')->middleware(['auth', 'verified', 'superadmin'])->name('dashboard');

Route::view('master/bagian', 'master.bagian')->middleware(['auth'])->name('master.bagian');
Route::view('master/sertifikat', 'master.sertifikat')->middleware(['auth'])->name('master.sertifikat');
Route::view('master/pegawai', 'master.pegawai')->middleware(['auth'])->name('master.pegawai');
Route::view('master/event', 'master.event')->middleware(['auth'])->name('master.event');

Route::view('greedy/event', 'greedy.event')->middleware(['auth'])->name('greedy.event');
Route::get('/generate-pdf/{id}', [Ready::class, 'testPDF'])->name('generate.pdf');

require __DIR__ . '/auth.php';
