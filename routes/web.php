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
use App\Http\Controllers\MapsController;
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

// Route::get('/', function () {
//     
// });
Route::get('/', [GuestController::class, 'index']);
Route::get('/about', [GuestController::class, 'about']);
Route::get('/structure', [GuestController::class, 'structure']);

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

    Route::get('/dashboard/maps', [MapsController::class, 'index']);
    Route::post('/dashboard/updateMap', [MapsController::class, 'updateMap']);
    Route::post('/dashboard/updateAlamat', [MapsController::class, 'updateAlamat']);
    Route::post('/dashboard/updateTelp', [MapsController::class, 'updateTelp']);
    Route::post('/dashboard/updateEmail', [MapsController::class, 'updateEmail']);

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
    Route::post('/dashboard/updateSambutan', [HomepageController::class, 'updateSambutan']);
    Route::post('/dashboard/updateNIPCamat', [HomepageController::class, 'updateNIP']);
    Route::post('/dashboard/addMisi', [HomepageController::class, 'addMisi']);

    Route::resource('/dashboard/publikasi', PublishController::class)->only(['index', 'show', 'update']);
});
