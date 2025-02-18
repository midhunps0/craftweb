<?php

use App\Http\Controllers\AirpayController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\IconsController;
use App\Http\Controllers\LayoutBuilderController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageTemplateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebPageController;
use App\Models\PageTemplate;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Modules\Ynotz\AccessControl\Http\Controllers\PermissionsController;
use Modules\Ynotz\AccessControl\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use Modules\Ynotz\AccessControl\Models\Permission;
use Modules\Ynotz\AccessControl\Models\Role;
use Modules\Ynotz\AppSettings\Http\Controllers\AppSettingsController;
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
Route::get('/home', [WebPageController::class, 'home']);
Route::get('/kochi', function () {
    return view('home-kochi');
})->name('kochi.home');
Route::get('/ar', [WebPageController::class, 'homeAr'])->name('home.ar');

Route::get('/team-member/{slug}', [DoctorController::class, 'redirect']);
Route::get('/correct-urls', [CorrectionController::class, 'correctTranslationUrls']);
// Route::get('{locale}/contact-us', [WebPageController::class, 'contact'])->name('contact');
// Route::get('/ar/contact-us', [WebPageController::class, 'contactAr'])->name('contact.ar');

Route::get('/{locale}/data/home/reviews', [WebPageController::class, 'homeReviews'])->name('home.reviews');
Route::get('/{locale}/data/home/videos', [WebPageController::class, 'homeVideos'])->name('home.videos');
Route::get('/{locale}/data/home/features', [WebPageController::class, 'homeFeatures'])->name('home.features');
Route::get('/{locale}/data/home/news', [WebPageController::class, 'homeNews'])->name('home.news');
Route::get('/{locale}/data/home/doctors', [WebPageController::class, 'homeDoctors'])->name('home.doctors');
Route::get('/{locale}/data/home/articles', [WebPageController::class, 'homeArticles'])->name('home.articles');

// Route::get('/consequatur-molestias-debitis', [ArticleController::class, 'old'])->name('articles.old');

Route::get('/ea/icons', [IconsController::class, 'index'])->name('eaicons');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::get('/{locale}/booking', function () {
//     return 'kkdsas';
// })->name('booking');
Route::get('/{locale}/booking', [BookingController::class, 'bookingPage'])->name('booking');
Route::get('/booking/specialties', [BookingController::class, 'specialties'])->name('booking.specialties');
Route::get('/booking/doctors', [BookingController::class, 'doctors'])->name('booking.doctors');
Route::get('/booking/dates', [BookingController::class, 'dates'])->name('booking.dates');
Route::get('/booking/slots', [BookingController::class, 'slots'])->name('booking.slots');
Route::get('/booking/submit', [BookingController::class, 'submit'])->name('booking.submit');

Route::get('/payment-form', [AirpayController::class, 'transactionForm'])->name('payment.airpay.form');
Route::post('/responsefromairpay.php', [AirpayController::class, 'airpayResponse'])->name('payment.airpay.response');
Route::post('/notify', [AirpayController::class, 'airpayNotification'])->name('payment.airpay.notify');
// Route::get('/responsefromairpay.php', function() {
//     return view('airpay.response', ['success' => false]);
// })->name('payment.airpay.response-dummy');


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
    RouteHelper::getEasyRoutes(
        modelName:'AppSetting',
        controller: AppSettingsController::class
    );

    RouteHelper::getEasyRoutes(modelName: Role::class, controller: RolesController::class);
    RouteHelper::getEasyRoutes(modelName: Permission::class, controller: PermissionsController::class);
    RouteHelper::getEasyRoutes(modelName: User::class, controller: UsersController::class);
    Route::get('/roles-permissions', [RolesController::class, 'rolesPermissions'])->name('roles.permissions');
    Route::post('/roles/permission-update', [RolesController::class, 'permissionUpdate'])->name('roles.update_permissions');

    Route::get('/template-get', [PageTemplateController::class, 'getTemplateInputsForm'])->name('template.get');

});



require __DIR__.'/auth.php';

Route::group(['middleware' => ['ynotz.translation']], function () {
    // Route::get('/our-blogs', [WebPageController::class, 'blog'])->name('blog');
    // Route::get('/our-doctors', [WebPageController::class, 'doctors'])->name('doctors');
    // Route::get('/patient-videos', [WebPageController::class, 'patientVideos'])->name('videotestimonials');
    // Route::get('/patient-testimonials', [WebPageController::class, 'patientReviews'])->name('patientreviews');
    Route::get('/{locale}/news', [WebPageController::class, 'news'])->name('news.loc');
    Route::get('/{locale}/our-blogs', [WebPageController::class, 'blog'])->name('blog.loc');
    Route::get('/{locale}/our-doctors', [WebPageController::class, 'doctors'])->name('doctors.loc');
    Route::get('/{locale}/patient-videos', [WebPageController::class, 'patientVideos'])->name('videotestimonials.loc');
    Route::get('/{locale}/patient-testimonials', [WebPageController::class, 'patientReviews'])->name('patientreviews.loc');
    Route::get('/{slug}', [WebPageController::class, 'quickShow'])->name('webpages.view');
    // Route::get('/articles/{slug}', [ArticleController::class, 'quickShow'])->name('articles.view');
    Route::get('/{locale}/pages/{slug}', [WebPageController::class, 'show'])->name('webpages.guest.show');
    Route::get('/{locale}/articles/{slug}', [ArticleController::class, 'show'])->name('articles.guest.show');
    Route::get('/{locale}/doctors/{slug}', [DoctorController::class, 'show'])->name('doctors.guest.show');
});
Route::post('contact-mail', [MailController::class, 'contactMail'])->name('mail.contact');

Route::get('/clear-cache', function () {
    if(request()->pass != 'Craft@1234*'){
        return 'Unauthorised Action!';
    }
    Artisan::call('cache:clear');
    return 'Cache cleared.';
})->name('cache.clear');

Route::get('/{locale}', [WebPageController::class, 'notFound'])->middleware('web');
Route::get('/{locale}/{page}', [WebPageController::class, 'notFound'])->middleware('web');
Route::fallback([WebPageController::class, 'notFound']);

