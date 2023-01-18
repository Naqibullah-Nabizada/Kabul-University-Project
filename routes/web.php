<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResearcherController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// !Pages

Route::get('/', [UserController::class, 'index'])->name('index');
Route::post('/', [UserController::class, 'login'])->name('login.store');
Route::get('/register', [UserController::class, 'registerCreate'])->name('register.create');
Route::post('/register', [UserController::class, 'registerStore'])->name('register.store');

Route::middleware('auth')->group(function () {
    Route::get('/update-profile', [UserController::class, 'edit'])->name('update.profile.edit');
    Route::put('/update-profile', [UserController::class, 'update'])->name('update.profile.store');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/researcher', ResearcherController::class);
    Route::resource('/position', PositionController::class);
    Route::resource('/faculty', FacultyController::class);
    Route::resource('/department', DepartmentController::class);
    Route::get('/get-departments/{faculty}', [ResearcherController::class, 'getDepartment'])->name('getDepartment');
    Route::get('/search', [ResearcherController::class, 'search'])->name('search');
});
