<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

    return view('welcome',['data'=>$data]);
});

Route::get('maleo-profile', [ProfileController::class,'index'])->name('maleo-profile');
Route::patch('maleo-profile/update/{id}', [ProfileController::class,'update'])->name('maleo-profile-update');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $data = Profile::all()->first();
    // dd($data);die;
    return Inertia\Inertia::render('Dashboard', ['data' => $data]);
})->name('dashboard');
