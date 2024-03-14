<?php

use App\Http\Controllers\PageTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebPageController;
use App\Models\PageTemplate;
use Illuminate\Support\Facades\Route;
use Modules\Ynotz\EasyAdmin\Services\RouteHelper;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'manage'], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    RouteHelper::getEasyRoutes('PageTemplate');
    RouteHelper::getEasyRoutes('WebPage');

    Route::get('/template-get', [PageTemplateController::class, 'getTemplateInputsForm'])->name('template.get');
});


require __DIR__.'/auth.php';

Route::get('/{slug}', [WebPageController::class, 'show'])->name('webpages.guest.show');
