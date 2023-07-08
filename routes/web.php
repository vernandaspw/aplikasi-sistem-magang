<?php

use App\Http\Livewire\BagianPage;
use App\Http\Livewire\ChatPage;
use App\Http\Livewire\DaftarMagang;
use App\Http\Livewire\DashboardPage;
use App\Http\Livewire\DataAdminPage;
use App\Http\Livewire\DataKegiatanPage;
use App\Http\Livewire\DataKehadiranPage;
use App\Http\Livewire\DataKehadiranPembimbingPage;
use App\Http\Livewire\DataMagangPage;
use App\Http\Livewire\DataPembimbingPage;
use App\Http\Livewire\DataPesertaPage;
use App\Http\Livewire\HomePage;
use App\Http\Livewire\LoginPage;
use App\Http\Livewire\PesertaDaftarPage;
use App\Http\Livewire\PosisiPage;
use App\Http\Livewire\ProfilPage;
use App\Http\Livewire\SettingPage;
use App\Http\Livewire\UbahPasswordPage;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['noAuth'])->group(function () {
    Route::get('/', HomePage::class);
    Route::get('login', LoginPage::class)->name('login');

    Route::get('daftar', PesertaDaftarPage::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('setting', SettingPage::class);
    Route::get('profil', ProfilPage::class);
    Route::get('ubah-password', UbahPasswordPage::class);

    Route::get('dashboard', DashboardPage::class);

    Route::get('data-admin', DataAdminPage::class);
    Route::get('data-pembimbing', DataPembimbingPage::class);
    Route::get('data-peserta', DataPesertaPage::class);

    Route::get('data-posisi', PosisiPage::class);
    Route::get('data-bagian', BagianPage::class);

    Route::get('daftar-magang', DaftarMagang::class);

    Route::get('data-magang', DataMagangPage::class);
    Route::get('data-kehadiran', DataKehadiranPage::class);
    Route::get('data-kehadiran-pembimbing', DataKehadiranPembimbingPage::class);
    // Route::get('data-kegiatan', DataKegiatanPage::class);

    Route::get('data-penilaian/{datamagangid}', DataKegiatanPage::class);

    Route::get('chat', ChatPage::class);
});








