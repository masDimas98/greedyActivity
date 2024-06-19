<?php

use App\Livewire\Greedy\Activities;
use App\Livewire\Master\Bagian;
use App\Livewire\Master\Event;
use App\Livewire\Master\Pegawai;
use App\Livewire\Master\Sertifikat;
use Illuminate\Support\Facades\Route;

use Livewire\Volt\Volt;


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('/', 'HomeController@index')->middleware(['auth', 'verified', 'superadmin'])->name('dashboard');

Route::view('master/bagian', 'master.bagian')->middleware(['auth'])->name('master.bagian');
Route::view('master/sertifikat', 'master.sertifikat')->middleware(['auth'])->name('master.sertifikat');
Route::view('master/pegawai', 'master.pegawai')->middleware(['auth'])->name('master.pegawai');
Route::view('master/event', 'master.event')->middleware(['auth'])->name('master.event');

Route::view('greedy/event', 'greedy.event')->middleware(['auth'])->name('greedy.event');

require __DIR__ . '/auth.php';
