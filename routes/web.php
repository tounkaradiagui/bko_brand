<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
//     return view('welcome');
// });
Route::group(['middleware' => ['auth', 'isChecked']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();

Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{category_slug}', 'products');
    Route::get('/collections/{category_slug}/{product_slug}', 'productView');
    Route::get('/nouveaux-arrives', 'newArrivals');
    Route::get('/produits-populaire', 'featuredProducts');

    Route::get('/rechercher', 'ClientSideSearchProduct');

});


Route::middleware(['auth'])->group(function(){
    Route::get('wishlist', [App\Http\Controllers\Frontend\WishlistController::class, 'index']);
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'show']);

    Route::get('/update/status/{user_id}/{status_code}', [App\Http\Controllers\Admin\UserController::class, 'updateStatus'])->name('users.status');
    Route::get('monProfil', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('monProfil', [App\Http\Controllers\Frontend\UserController::class, 'UpdateUserdetails']);
    Route::get('my-password', [App\Http\Controllers\Frontend\UserController::class, 'getPassword']);
    Route::post('my-password', [App\Http\Controllers\Frontend\UserController::class, 'UpdatePassword']);
});

Route::get('thank-you', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index' ]);

    Route::get('settings', [App\Http\Controllers\Admin\SettingController::class, 'index' ]);
    // Route::post('settings', [App\Http\Controllers\Admin\SettingController::class, 'store' ]);

    // route groupe
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::get('/category/create', 'create');
        Route::post('/category', 'store');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'index');
        Route::get('/products/create', 'create');
        Route::post('/products', 'store');
        Route::get('/products/{products}/edit', 'edit');
        Route::put('/products/{product}', 'update');
        Route::get('/product-image/{product_image_id}/delete', 'destroyImage');
        Route::get('/products/{product_id}/delete', 'destroy');
        Route::post('/product-color/{prod_color_id}', 'updateProductColorQuantity');
        Route::get('/product-color/{product_color_id}/delete', 'deleteProductColorQuantity');

    });

    Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function () {
        Route::get('/colors', 'index');
        Route::get('/colors/create', 'create');
        Route::post('/colors/create', 'store');
        Route::get('/colors/{color}/edit', 'edit');
        Route::put('/colors/{color_id}', 'update');
        Route::get('/colors/{color_id}/delete', 'destroy');


    });

    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function () {
        Route::get('/sliders', 'index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create', 'store');
        Route::get('/sliders/{slider}/edit', 'edit');
        Route::put('sliders/{slider}', 'update');
        Route::get('/sliders/{slider}/delete', 'destroy');


    });

    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function () {
        Route::get('/orders', 'index');
        Route::get('/orders/{orderId}', 'show');
        Route::put('/orders/{orderId}', 'updateOrderStatus');
        Route::get('/invoice/{orderId}', 'ViewInvoice');
        Route::get('/invoice/{orderId}/generate', 'generateInvoice');
        Route::get('/invoice/{orderId}/mail', 'mailInvoice');

    });

    Route::controller(App\Http\Controllers\Admin\UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create');
        Route::post('/users', 'store');
        Route::get('/users/{userId}/edit', 'edit');
        Route::put('/users/{userId}', 'update');
        Route::get('/users/{userId}/delete', 'destroy');

    });

    Route::controller(App\Http\Controllers\Admin\Navbar\MessageController::class)->group(function () {
        Route::get('/messages', 'index')->name('message.index');
        Route::get('/messages/{id}', 'showMessage')->name('showMessage.index');


    });


});

Route::prefix('facebook')->name('facebook.')->group(function (){
    Route::get('auth', [App\Http\Controllers\FacebookController::class, 'loginUsingFacebook' ])->name('login');
    Route::get('callback', [App\Http\Controllers\FacebookController::class, 'callbackFromFacebook' ])->name('callback');

});

Route::controller(App\Http\Controllers\Frontend\ContactController::class)->group(function () {
    Route::get('/contact', 'index');
});

Route::controller(App\Http\Controllers\Frontend\AboutController::class)->group(function () {
    Route::get('/a-propos-de-nous', 'index')->name('about');
});

