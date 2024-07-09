<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomepageController;
use App\Models\Gambar;
use App\Models\Homepage;
use App\Models\Visi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $fotoCamat = Homepage::where('kategori', 'leader')->first();
    $fotoPengurus = Homepage::where('kategori', 'jajaran')->first();
    $tahun = Homepage::where('kategori', 'sejakTahun')->first();
    $camat = Homepage::where('kategori', 'namaCamat')->first();
    $desa = Homepage::where('kategori', 'jmlDesa')->first();
    $penduduk = Homepage::where('kategori', 'jmlPenduduk')->first();
    $slider = Gambar::all();
    $visi = Homepage::where('kategori', 'visi')->first();
    $misi = Homepage::where('kategori', 'misi')->get();
    return view('Guest.Index', [
        'title' => 'Beranda',
        'posts' => Post::query()->where('is_published', true)->latest()->limit(10)->get(),
        'visi' => $visi ?? '',
        'misi' => $misi ?? '',
        'tahun' => $tahun->value ?? '',
        'desa' => $desa->value ?? '',
        'penduduk' => $penduduk->value ?? '',
        'camat' => $camat->value ?? '',
        'fotoCamat' => $fotoCamat->value ?? '',
        'fotoPengurus' => $fotoPengurus->value ?? '',
    ], compact('slider'));
});
Route::get('/about', function () {
    $visi = Homepage::where('kategori', 'visi')->first();
    $misi = Homepage::where('kategori', 'misi')->get();
    return view('Guest.About', [
        'title' => 'Tentang Kami',
        'visi' => $visi,
        'misi' => $misi
    ]);
});
Route::get('/structure', function () {
    return view('Guest.Structure', [
        'title' => 'Struktur Organisasi'
    ]);
});

// Route::get('/prestasi-sekolah', [GuestController::class, 'index']);
Route::get('/kegiatan', [GuestController::class, 'index1']);
Route::get('/pengumuman', [GuestController::class, 'index2']);
Route::get('/berita', [GuestController::class, 'index3']);
Route::get('/sambutan', [GuestController::class, 'index4']);

Route::get('/informasi/{post:slug}', [GuestController::class, 'show']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::get('/daftar', [RegistrationController::class, 'index']);
    Route::post('/daftar', [RegistrationController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('Dashboard.Pages.Index', [
            'title' => 'Dashboard',
        ]);
    });

    Route::get('/dashboard/informasi/checkSlug', [PostController::class, 'checkSlug']);
    Route::resource('/dashboard/informasi', PostController::class);

    Route::resource('/dashboard/profil', ProfileController::class)->only(['edit', 'update']);

    Route::post('/dashboard/logout', [LoginController::class, 'logout']);
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard/kategori/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/kategori', CategoryController::class)->except('show');

    Route::resource('/dashboard/pengguna', UserController::class)->only(['index', 'edit', 'update']);

    Route::resource('/dashboard/slider', SliderController::class)->only(['index', 'edit', 'update']);
    Route::get('/dashboard/slider/create', [SliderController::class, 'create']);
    Route::post('/dashboard/slider/upload', [SliderController::class, 'upload']);
    Route::get('/dashboard/slider/update/{id}', [SliderController::class, 'update']);
    Route::post('/dashboard/slider/update', [SliderController::class, 'uploadUpdate']);
    Route::get('/dashboard/slider/delete/{id}', [SliderController::class, 'delete']);

    Route::get('/dashboard/homepage', [HomepageController::class, 'show']);
    Route::get('/dashboard/deleteVisi', [HomepageController::class, 'deleteVisi']);
    Route::get('/dashboard/deleteMisi/{id}', [HomepageController::class, 'deleteMisi']);
    Route::post('/dashboard/updateVisi', [HomepageController::class, 'updateVisi']);
    Route::post('/dashboard/updateData', [HomepageController::class, 'updateData']);
    Route::post('/dashboard/updateNamaCamat', [HomepageController::class, 'updateNamaCamat']);
    Route::post('/dashboard/updateFotoCamat', [HomepageController::class, 'updateFotoCamat']);
    Route::post('/dashboard/updateFotoPengurus', [HomepageController::class, 'updateFotoPengurus']);
    Route::post('/dashboard/updateMisi/{id}', [HomepageController::class, 'updateMisi']);
    Route::post('/dashboard/addMisi', [HomepageController::class, 'addMisi']);

    Route::resource('/dashboard/publikasi', PublishController::class)->only(['index', 'show', 'update']);
});
