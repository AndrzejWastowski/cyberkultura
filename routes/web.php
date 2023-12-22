<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use \App\Http\Controllers\Page\StartController;
use \App\Http\Controllers\Page\ProductsController;
use \App\Http\Controllers\Page\ProductsCategoryController;
use \App\Http\Controllers\Page\HomeController;
use \App\Http\Controllers\Page\ContactController;
use \App\Http\Controllers\Page\OfferController;
use \App\Http\Controllers\Page\InstagramController;
use \App\Http\Controllers\Page\CartController;
use \App\Http\Controllers\Page\PageController;
use \App\Http\Controllers\Page\SitemapController;
use \App\Http\Controllers\Page\NewsController;
use \App\Http\Controllers\Page\FaqController;

use \App\Http\Controllers\Page\GoogleSocialiteController;


use App\Http\Controllers\Panel\PanelNewsController;
use App\Http\Controllers\Panel\PanelPageController;
use App\Http\Controllers\Panel\PanelGalleryController;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\PanelFileController;
use App\Http\Controllers\Panel\PanelFaqController;
use App\Http\Controllers\Panel\PanelStatisticsController;
use App\Http\Controllers\Panel\PanelUserController;
use App\Http\Controllers\Panel\PanelContactController;
use App\Http\Controllers\Panel\PanelOfferController;
use App\Http\Controllers\Panel\PanelHelpController;

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


Route::get('/',     [StartController::class, 'start'])->name('page.start');


Route::get('/greeting/{locale}', function (string $locale) {
    if (! in_array($locale, ['pl', 'en'])) {
        abort(400);
    }

    App::setLocale($locale);

    // ...
});



Route::get('/home',     [HomeController::class, 'index'])->name('page.home');

Route::get('/kontakt',  [ContactController::class, 'index'])->name('page.contact');
Route::get('/o_firmie',  [PageController::class, 'index'])->name('page.about');
Route::get('/oferta',   [OfferController::class, 'index'])->name('page.offer');
Route::get('/oferta/{offer}/{name}',   [OfferController::class, 'show'])->name('page.offer.show');
Route::get('/oferta/{offer}/{name}/{subcat}',   [OfferController::class, 'show'])->name('page.offer.show.detail');
Route::get('/faq',   [FaqController::class, 'show'])->name('page.faq');
//Route::get('/instagram-photos', [InstagramController::class, 'getInstagramPhotos'])->name('page.instagram_subpage');
//Route::get('/instagrams', [InstagramController::class, 'getInstagramPhotos'])->name('page.instagram_subpage');
Route::get('/instagram', [InstagramController::class,'show'])->name('page.instagram_cyberkultura');

Route::get('/news',   [NewsController::class, 'lists'])->name('page.news');
Route::get('/news/lists',   [NewsController::class, 'lists'])->name('page.news.lists');
Route::get('/news/{news}',   [NewsController::class, 'show'])->name('page.news.show');


Route::get('/pd/{pages}/', [PageController::class, 'show'])->name('page.subpage');
Route::get('/pd/{pages}/', [PageController::class, 'show'])->name('page.pages');
Route::get('/pd/lista', [PageController::class, 'lists'])->name('page.subpage.list');


Route::get('/sitemap', [SitemapController::class, 'sitemap'])->name('404');


#część odpowiedzialna za obsługę sklepu
#wyswietlanie produyktów litami, kategoriami i detalicznie
//Route::get('/produktfff/{product}', [ProductsController::class, 'show'])->name('products.index');
Route::get('/produkt/show/{product}', [ProductsController::class, 'show'])->name('page.products.show');
Route::get('/produkty/{category}/{name}/', [ProductsController::class, 'category'])->name('page.products.category');
Route::get('/produkty/{category}/{name}/lista', [ProductsController::class, 'lists'])->name('page.products.lists');


#obsługa koszyka

Route::get('/cart', [CartController::class, 'index'])->name('page.cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('page.cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('page.cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('page.cart.remove');

//Route::get('/users',    [UsersController::class,'index'])->name('page.users.index');

//Route::get('/products/{id}', [\App\Http\Controllers\ProductsController::class, 'show'])->name('produkt_id');
//Route::get('/produkty/{category}', [\App\Http\Controllers\ProductsController::class, 'list'])->name('produkty_kategorie');
//Route::get('/products/lists/{lang}', [\App\Http\Controllers\ProductController::class, 'lists']);

Route::post('/produkty', [ProductsController::class, 'store'])->name('page.products.store');

Route::get('/produkty/{product}/edit', [ProductsController::class, 'edit'])->name('page.products.edit');
Route::get('/produkty/create', [ProductsController::class, 'create'])->name('page.products.create');
Route::get('/produkty/{product}/delete', [ProductsController::class, 'delete'])->name('page.products.delete');
Route::delete('/produkty/{product}', [ProductsController::class, 'destroy'])->name('page.products.destroy');
Route::put('/produkty/{product}', [ProductsController::class, 'update'])->name('page.products.update');

Route::get('products_categories', [ProductsCategoryController::class, 'index'])->name('page.productsCategories.index');
Route::get('/products_categories/create', [ProductsCategoryController::class,'create'])->name('page.productsCategories.create');
Route::post('/products_categories', [ProductsCategoryController::class,'store'])->name('page.productsCategories.store');
Route::get('/products_categories/{id}/edit', [ProductsCategoryController::class,'edit'])->name('page.productsCategories.edit');
Route::put('/products_categories/{id}', [ProductsCategoryController::class,'update'])->name('page.productsCategories.update');
Route::delete('/products_categories/{id}', [ProductsCategoryController::class,'destroy'])->name('page.productsCategories.destroy');




//trasy dla podstron w panelu administracyjnym
Auth::routes();
Route::get('/home', [PanelController::class,'index'])->name('home');

Route::get('/panel', [PanelController::class,'index'])->name('panel.start');

Route::get('/panel/pages/create', [PanelPageController::class,'create'])->name('panel.pages.create');
Route::post('/panel/pages/page', [PanelPageController::class,'store'])->name('panel.pages.store');
Route::get('/panel/pages/edit/{page}', [PanelPageController::class,'edit'])->name('panel.pages.edit');
Route::put('/panel/pages/{page}',[PanelPageController::class,'update'])->name('panel.pages.update');
Route::delete('/panel/pages/{page}', [PanelPageController::class,'destroy'])->name('panel.pages.destroy');


Route::get('/panel/gallery/list/{category?}', [PanelGalleryController::class,'list'])->name('panel.gallery.list');
Route::get('/panel/gallery/add', [PanelGalleryController::class,'add'])->name('panel.gallery.add');
Route::post('/panel/gallery/add', [PanelGalleryController::class, 'store'])->name('panel.gallery.store');
Route::delete('/panel/gallery/destroy/{photo}', [PanelGalleryController::class, 'destroy'])->name('panel.gallery.destroy');

Route::get('/panel/files/add',  [PanelFileController::class,'add'])->name('panel.files.add');
Route::post('/panel/files/create',  [PanelFileController::class,'create'])->name('panel.files.create');
Route::get('/panel/files/edit/{file}',  [PanelFileController::class,'edit'])->name('panel.files.edit');
Route::post('/panel/files/edit/{file}',  [PanelFileController::class,'update'])->name('panel.files.update');
Route::delete('/panel/files/destroy/{file}',  [PanelFileController::class,'destroy'])->name('panel.files.destroy');
Route::get('panel/files',  [PanelFileController::class,'list'])->name('panel.files.list');

// Route::get('/gallery_add', [GalleryController::class, 'form'])->name('gallery.form');
// Route::post('/gallery_add', [GalleryController::class, 'store'])->name('gallery.store');

Route::get('/panel/gallery/category_list', [PanelGalleryController::class,'category_list'])->name('panel.gallery.category_list');
Route::get('/panel/gallery/category_add/',[PanelGalleryController::class,'category_add'])->name('panel.gallery.category_add');
Route::post('/panel/gallery/category_create/',[PanelGalleryController::class,'category_create'])->name('panel.gallery.category_create');

Route::get('/panel/gallery/category_edit/{category}', [PanelGalleryController::class,'category_edit'])->name('panel.gallery.category_edit');
Route::put('/panel/gallery/category_update/{category}', [PanelGalleryController::class,'category_update'])->name('panel.gallery.category_update');
Route::delete('/panel/gallery/category_destroy/{category}', [PanelGalleryController::class, 'destroy'])->name('panel.gallery.category_destroy');

Route::get('/panel/news/list', [PanelNewsController::class,'list'])->name('panel.news.list');
Route::get('/panel/news/add', [PanelNewsController::class,'add'])->name('panel.news.add');
Route::post('/panel/news/create',[PanelNewsController::class,'create'])->name('panel.news.create');
Route::get('/panel/news/edit/{news}/{bookmark?}', [PanelNewsController::class,'edit'])->name('panel.news.edit');
Route::put('/panel/news/update/{news}',[PanelNewsController::class,'update'])->name('panel.news.update');
Route::delete('/panel/news/destroy/{news}', [PanelNewsController::class,'destroy'])->name('panel.news.destroy');
Route::post('/panel/news/upload-photos', [PanelNewsController::class,'uploadPhotos'])->name('panel.news.upload_photos');
Route::delete('/panel/news/destroy-photos/{photo}', [PanelNewsController::class,'destroyPhotos'])->name('panel.news.destroy_photos');
Route::put('/panel/news/edit-photos', [PanelNewsController::class,'editPhotos'])->name('panel.news.edit_photos');
Route::post('/panel/news/change-order-photos/{photo}', [PanelNewsController::class,'changeOrderPhoto'])->name('panel.news.changeOrderPhoto');


Route::get('/panel/offers/list', [PanelOfferController::class,'list'])->name('panel.offers.list');
Route::get('/panel/offers/add', [PanelOfferController::class,'add'])->name('panel.offers.add');
Route::post('/panel/offers/create',[PanelOfferController::class,'create'])->name('panel.offers.create');
Route::get('/panel/offers/edit/{offer}/{bookmark?}', [PanelOfferController::class,'edit'])->name('panel.offers.edit');
Route::put('/panel/offers/update/{offer}',[PanelOfferController::class,'update'])->name('panel.offers.update');
Route::delete('/panel/offers/destroy/{offers}', [PanelOfferController::class,'destroy'])->name('panel.offers.destroy');
Route::post('/panel/offers/upload-photos', [PanelOfferController::class,'uploadPhotos'])->name('panel.offers.upload_photos');
Route::delete('/panel/offers/destroy-photos/{photo}', [PanelOfferController::class,'destroyPhotos'])->name('panel.offers.destroy_photos');
Route::put('/panel/offers/edit-photos', [PanelOfferController::class,'editPhotos'])->name('panel.offers.edit_photos');
Route::post('/panel/offers/change-order-photos/{photo}', [PanelOfferController::class,'changeOrderPhoto'])->name('panel.offers.changeOrderPhoto');


Route::get('/panel/dashboard', [PanelController::class,'dashboard'])->name('panel.dashboard');

Route::get('/panel/statistics', [PanelStatisticsController::class,'show'])->name('panel.statistics');
Route::get('/panel/faq', [PanelFaqController::class,'show'])->name('panel.faq');
Route::get('/panel/help', [PanelHelpController::class,'show'])->name('panel.help');


Route::get('/panel/contact', [PanelContactController::class,'list'])->name('panel.contact');
Route::put('/panel/contact/update',[PanelContactController::class,'update'])->name('panel.contact.update');


Route::get('/panel/user/show', [PanelUserController::class,'edit'])->name('panel.user.show');
Route::get('/panel/user/main_profile', [PanelUserController::class,'mainprofile'])->name('panel.user.main_profile');

Route::get('/panel/user/list', [PanelUserController::class,'list'])->name('panel.user.list');
Route::get('/panel/user/add', [PanelUserController::class,'add'])->name('panel.user.add');
Route::post('/panel/user/create', [PanelUserController::class,'create'])->name('panel.user.create');
Route::get('/panel/user/edit/{user}', [PanelUserController::class,'edit'])->name('panel.user.edit');
Route::put('/panel/user/edit/{user}', [PanelUserController::class,'update'])->name('panel.user.update');
Route::delete('/panel/user/destroy/{user}', [PanelUserController::class, 'destroy'])->name('panel.user.destroy');


Route::get('/panel/products/create', [PanelPageController::class,'create'])->name('panel.products.add');
Route::get('/panel/products/list', [PanelPageController::class,'create'])->name('panel.products.list');
Route::get('/panel/products/update', [PanelPageController::class,'create'])->name('panel.products.update');
Route::get('/panel/products/edit', [PanelPageController::class,'create'])->name('panel.products.edit');

//dodatkowe niepotrzebne
Route::get('/panel/pages/create', [PanelPageController::class,'create'])->name('panel.calendary.add');
Route::get('/panel/pages/create', [PanelPageController::class,'create'])->name('panel.calendary.list');
Route::get('/panel/pages/create', [PanelPageController::class,'create'])->name('panel.calendary.update');
Route::get('/panel/pages/create', [PanelPageController::class,'create'])->name('panel.calendary.edit');

    /**
    * User Routes
    */
    Route::group(['prefix' => 'users'], function() {
        Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
        Route::get('/create', 'App\Http\Controllers\UsersController@create')->name('users.create');
        Route::post('/create', 'App\Http\Controllers\UsersController@store')->name('users.store');
        Route::get('/{user}/show', 'App\Http\Controllers\UsersController@show')->name('users.show');
        Route::get('/{user}/edit', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
        Route::patch('/{user}/update', 'App\Http\Controllers\UsersController@update')->name('users.update');
        Route::delete('/{user}/delete', 'App\Http\Controllers\UsersController@destroy')->name('users.destroy');
});