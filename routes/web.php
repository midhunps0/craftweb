<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\LayoutBuilderController;
use App\Http\Controllers\PageTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebPageController;
use App\Models\PageTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Modules\Ynotz\AccessControl\Http\Controllers\PermissionsController;
use Modules\Ynotz\AccessControl\Http\Controllers\RolesController;
use Modules\Ynotz\AccessControl\Http\Controllers\UsersController;
use Modules\Ynotz\AccessControl\Models\Permission;
use Modules\Ynotz\AccessControl\Models\Role;
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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
Route::get('/', [WebPageController::class, 'home'])->name('home');
Route::get('/ea/icons', [IconsController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'manage'], function () {
    Route::get('dashboard', [config('easyadmin.dashboard_controller'), config('easyadmin.dashboard_method')])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/get-rendered-preview', [LayoutBuilderController::class, 'getPreview'])->name('layoutbuilder.preview');

    RouteHelper::getEasyRoutes('PageTemplate');
    RouteHelper::getEasyRoutes('WebPage');
    RouteHelper::getEasyRoutes('Article');
    RouteHelper::getEasyRoutes('Review');
    RouteHelper::getEasyRoutes('VideoTestimonial');
    RouteHelper::getEasyRoutes('Doctor');
    RouteHelper::getEasyRoutes('News');
    RouteHelper::getEasyRoutes('HilightFeature');

    RouteHelper::getEasyRoutes(modelName: Role::class, controller: RolesController::class);
    RouteHelper::getEasyRoutes(modelName: Permission::class, controller: PermissionsController::class);
    RouteHelper::getEasyRoutes(modelName: User::class, controller: UsersController::class);
    Route::get('/roles-permissions', [RolesController::class, 'rolesPermissions'])->name('roles.permissions');
    Route::post('/roles/permission-update', [RolesController::class, 'permissionUpdate'])->name('roles.update_permissions');

    Route::get('/template-get', [PageTemplateController::class, 'getTemplateInputsForm'])->name('template.get');
});



require __DIR__.'/auth.php';

Route::group(['middleware' => ['ynotz.translation']], function () {
    Route::get('/our-blogs', [WebPageController::class, 'blog'])->name('blog');
    Route::get('/our-doctors', [WebPageController::class, 'doctors'])->name('doctors');
    Route::get('/patient-videos', [WebPageController::class, 'patientVideos'])->name('videotestimonials');
    Route::get('/patient-testimonials', [WebPageController::class, 'patientReviews'])->name('patientreviews');
    Route::get('/our-blogs/{locale}', [WebPageController::class, 'blog'])->name('blog.ar');
    Route::get('/our-doctors/{locale}', [WebPageController::class, 'doctors'])->name('doctors.ar');
    Route::get('/patient-videos/{locale}', [WebPageController::class, 'patientVideos'])->name('videotestimonials.ar');
    Route::get('/patient-testimonials/{locale}', [WebPageController::class, 'patientReviews'])->name('patientreviews.ar');
    Route::get('/{slug}', [WebPageController::class, 'quickShow'])->name('webpages.view');
    Route::get('/articles/{slug}', [ArticleController::class, 'quickShow'])->name('articles.view');
    Route::get('/pages/{locale}/{slug}', [WebPageController::class, 'show'])->name('webpages.guest.show');
    Route::get('/articles/{locale}/{slug}', [ArticleController::class, 'show'])->name('articles.guest.show');
    Route::get('/doctors/{locale}/{slug}', [DoctorController::class, 'show'])->name('doctors.guest.show');
});

