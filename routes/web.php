<?php

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


Auth::routes();


Route::redirect('/', '/hy');

Route::group(['prefix' => '{locale?}', 'where' => ['locale' => '[a-zA-Z]{2}']], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('about/{slug}', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
    Route::get('contact/{slug}', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('send-email', [App\Http\Controllers\ContactController::class, 'sendMessage'])->name('send.email');
    Route::get('/projects/{id}/{slug}', [App\Http\Controllers\ProductController::class, 'getProducts'])->name('products');
    Route::get('/project/{id}/{slug}', [App\Http\Controllers\ProductController::class, 'getProduct'])->name('product');
    Route::get('/menus/{id}/{slug}', [App\Http\Controllers\MenuController::class, 'getMenus'])->name('menus');
    Route::get('partners', [App\Http\Controllers\PartnerController::class, 'index'])->name('partners');
    Route::get('lawyer/{slug}', [App\Http\Controllers\LawyerController::class, 'index'])->name('lawyer');

});
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');;

Route::group(['prefix' => 'adminka', 'middleware' => 'auth', 'namespace' => 'App\Http\Controllers\Admin', 'as' => 'admin.'], function () {

    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('index');
    Route::get('/default-data', [\App\Http\Controllers\Admin\DefaultDataController::class, 'getData'])->name('default.data');
    Route::post('/default-data-update', [\App\Http\Controllers\Admin\DefaultDataController::class, 'dataUpdate'])->name('default.data.update');

    Route::get('about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about');
    Route::post('/about-update', [\App\Http\Controllers\Admin\AboutController::class, 'aboutUpdate'])->name('about.update');

    Route::post('/about/remove-image', [\App\Http\Controllers\Admin\AboutController::class, 'removeImage'])->name('about.removeImage');
    Route::post('/about/set-main-image', [\App\Http\Controllers\Admin\AboutController::class, 'setMainImage'])->name('about.setMainImage');

    Route::get('lawyer', [\App\Http\Controllers\Admin\LawyerController::class, 'index'])->name('lawyer');
    Route::post('/lawyer-update', [\App\Http\Controllers\Admin\LawyerController::class, 'lawyerUpdate'])->name('lawyer.update');

    Route::post('/lawyer/remove-image', [\App\Http\Controllers\Admin\LawyerController::class, 'removeImage'])->name('lawyer.removeImage');
    Route::post('/lawyer/set-main-image', [\App\Http\Controllers\Admin\LawyerController::class, 'setMainImage'])->name('lawyer.setMainImage');


    Route::get('slider', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('slider');
    Route::get('slider-edit/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider-update', [\App\Http\Controllers\Admin\SliderController::class, 'update'])->name('slider.update');
    Route::get('slider-create', [\App\Http\Controllers\Admin\SliderController::class, 'create'])->name('slider.create');
    Route::post('slider-store', [\App\Http\Controllers\Admin\SliderController::class, 'store'])->name('slider.store');
    Route::delete('slider-destroy/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'destroy'])->name('slider.destroy');

    Route::post('/product/remove-image', [\App\Http\Controllers\Admin\ProductController::class, 'removeImage'])->name('product.removeImage');
    Route::post('/product/set-main-image', [\App\Http\Controllers\Admin\ProductController::class, 'setMainImage'])->name('product.setMainImage');

    Route::resource('/partners', 'PartnerController');
    Route::resource('/teams', 'TeamController');
    Route::resource('/menus', 'MenuController');
    Route::resource('/products', 'ProductController');

                                                            //    SEO
    Route::get('home-seo-edit', [\App\Http\Controllers\Admin\HomeController::class, 'edit'])->name('home.seo.edit');
    Route::post('/home-seo-update', [\App\Http\Controllers\Admin\HomeController::class, 'homeUpdate'])->name('home.seo.update');

    Route::get('contact-seo-edit', [\App\Http\Controllers\Admin\ContactController::class, 'edit'])->name('contact.seo.edit');
    Route::post('/contact-seo-update', [\App\Http\Controllers\Admin\ContactController::class, 'contactUpdate'])->name('contact.seo.update');
});

Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('event:clear'); // Մաքրում է event cache-ը
    Artisan::call('optimize:clear'); // Մաքրում է բոլոր cache-երը (հավասար է վերոնշյալներին)

    return "Cache and configuration cleared!";
});
