<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminAsetController;
use App\Http\Controllers\Admin\AdminKategoriasetController;
use App\Http\Controllers\Admin\AdminAkunController;
use App\Http\Controllers\Admin\AdminBidangController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminPermohonanController;
use App\Http\Controllers\Admin\AdminPemegangasetController;
use App\Http\Controllers\Admin\AdminLaporanController;

use App\Http\Controllers\Kabid\KabidController;
use App\Http\Controllers\Kabid\KabidAsetController;
use App\Http\Controllers\Kabid\KabidPermohonanController;
use App\Http\Controllers\Kabid\KabidProfilController;
use App\Http\Controllers\Kabid\KabidLaporanController;

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


Route::get('base', function () {
    return view('template.base');
});



Route::controller(LandingController::class)->group(function () {
    Route::get('/', 'index');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('logout', 'logout');
    Route::post('login', 'loginProses');

    Route::get('login-kabid', 'loginKabid');
    Route::post('login-kabid', 'loginProsesKabid');
});


// admin/beranda
// amdin/master-data/pegawai
Route::middleware('auth:admin')->prefix('x')->group(function(){
    Route::controller(KabidController::class)->group(function () {
        Route::get('beranda', 'beranda');
    });

    Route::controller(KabidAsetController::class)->group(function () {
        Route::get('aset', 'index');
        Route::get('aset/{asetDetail}/detail', 'show');
        Route::post('aset/{asetDetail}/create-pemegang', 'createUnit');
        Route::put('aset/{id}/update-pemegang', 'updateUnit');
        Route::get('aset-rusak', 'asetRusak');
        Route::get('aset-hilang', 'asetHilang');
        Route::get('download', 'downloadQr');
    });
    
    Route::controller(KabidPermohonanController::class)->group(function () {
        Route::get('permohonan-aset-baru', 'index');
        Route::get('permohonan-aset-baru/create', 'create');
        Route::post('permohonan-aset-baru/create', 'store');
    });

    Route::controller(KabidProfilController::class)->group(function () {
        Route::get('profil', 'index');
        Route::get('profil/{admin}/edit', 'edit');
        Route::put('profil/{admin}/edit', 'update');
        Route::put('profil/ganti-password', 'updatePassword');
    });

    Route::controller(KabidLaporanController::class)->group(function () {
        Route::get('laporan-aset/{tahun}', 'index');
    });
});


Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('beranda', 'beranda');
    });

    Route::controller(AdminAsetController::class)->group(function () {
        Route::get('aset', 'index');
        Route::get('aset-rusak', 'asetRusak');
        Route::get('aset-hilang', 'asetHilang');
        Route::get('aset/create', 'create');
        Route::post('aset/create', 'store');
        Route::get('aset/{aset}/detail', 'show');
        Route::get('aset/{aset}/edit', 'edit');
        Route::get('aset/{aset}/delete', 'destroy');
        Route::post('aset/{aset}/edit', 'update');
    });

    Route::controller(AdminAkunController::class)->group(function () {
        Route::get('data-pemegang-akun', 'index');
        Route::post('data-pemegang-akun/create', 'store');
        Route::get('data-pemegang-akun/{admin}/delete', 'destroy');
    });

    Route::controller(AdminBidangController::class)->group(function () {
        Route::get('bidang', 'index');
        Route::post('bidang/create', 'store');
        Route::get('bidang/{bidang}/delete', 'destroy');
        Route::put('bidang/{bidang}/edit', 'update');
    });

     Route::controller(AdminKategoriasetController::class)->group(function () {
        Route::get('kategori-aset', 'index');
        Route::get('kategori-aset/{kategori}/delete', 'destroy');
        Route::post('kategori-aset/create', 'store');
        Route::put('kategori-aset/{kategori}/edit', 'update');
    });


    Route::controller(AdminProfilController::class)->group(function () {
        Route::get('profil', 'index');
        Route::get('profil/{admin}/edit', 'edit');
        Route::put('profil/{admin}/edit', 'update');
        Route::put('profil/ganti-password', 'updatePassword');
    });

    Route::controller(AdminPermohonanController::class)->group(function () {
        Route::get('permohonan-aset-baru', 'index');
        Route::get('permohonan-aset-baru/{permohonan}/terima', 'terima');
        Route::get('permohonan-aset-baru/{permohonan}/tolak', 'tolak');
    });

    Route::controller(AdminPemegangasetController::class)->group(function () {
        Route::get('pemegang-aset', 'index');
    });
    Route::controller(AdminLaporanController::class)->group(function () {
        Route::get('laporan-aset/{tahun}', 'index');
        Route::get('laporan-aset/{tahun}/cetak', 'cetak');
        Route::get('laporan-aset/{tahun}/{bidang}', 'laporanBidang');
    });


});
