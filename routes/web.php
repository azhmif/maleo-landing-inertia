<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WhyUsController;

use App\Http\Controllers\MemberAreaController;
use App\Http\Controllers\UploadFileController;


use App\Models\Profile;

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
    $data = Profile::all()->first();
    $portofolio = Portofolio::all();
    $faq = FAQ::all();

    // dd($portofolio);
    return view('welcome', ['data' => $data, 'portofolio' => $portofolio, 'faq' => $faq]);
});
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::post('kontak', [WelcomeController::class, 'kontak'])->name('kontak');

Route::get('company-profile', [WelcomeController::class, 'companyProfile'])->name('company-profile');
Route::get('member-area', [WelcomeController::class, 'memberArea'])->name('member-area');
Route::post('member-area/join', [WelcomeController::class, 'memberAreaStore'])->name('member-area.join');


Route::post('dropzone/store/{folder}', [UploadFileController::class, 'dropzoneStore'])->name('dropzone.store');
Route::post('dropzone/store-multiple/{folder}', [UploadFileController::class, 'dropzoneStoreMultiple'])->name('dropzone.store');
Route::get('img/{folder}/{file}/hapus', [UploadFileController::class, 'deleteFile'])->name('dropzone.hapus');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data = Profile::all()->first();
    // dd($data);die;
    return Inertia\Inertia::render('Dashboard', ['data' => $data]);
})->name('dashboard');


Route::group(['prefix' => 'admin-panel'], function () use ($router) {

    Route::group(['prefix' => 'portofolio'], function () use ($router) {
        Route::get('', [PortofolioController::class, 'index'])->name('portofolio');
        Route::post('create', [PortofolioController::class, 'store'])->name('portofolio.create');
        Route::delete('delete', [PortofolioController::class, 'destroy'])->name('portofolio.delete');
        Route::patch('update', [PortofolioController::class, 'update'])->name('portofolio.update');
    });
    Route::group(['prefix' => 'faq'], function () use ($router) {
        Route::get('', [FAQController::class, 'index'])->name('faq');
        Route::post('create', [FAQController::class, 'store'])->name('faq.create');
        Route::delete('delete', [FAQController::class, 'destroy'])->name('faq.create');
        Route::patch('update', [FAQController::class, 'update'])->name('faq.update');
    });
    Route::group(['prefix' => 'kenapa-kami'], function () use ($router) {
        Route::get('', [WhyUsController::class, 'index'])->name('kenapa-kami');
        Route::post('create', [WhyUsController::class, 'store'])->name('kenapa-kami.create');
        Route::delete('delete', [WhyUsController::class, 'destroy'])->name('kenapa-kami.create');
        Route::patch('update', [WhyUsController::class, 'update'])->name('kenapa-kami.update');
    });

    Route::group(['prefix' => 'kontak'], function () use ($router) {
        Route::get('', [WhyUsController::class, 'indexKontak'])->name('kontak-panel');
      
    });
    Route::group(['prefix' => 'member-area'], function () use ($router) {
        Route::get('', [MemberAreaController::class, 'index'])->name('admin.member-area');
      
    });
});
