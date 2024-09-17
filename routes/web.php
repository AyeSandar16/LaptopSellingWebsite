<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\UserMiddleware;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/product', [HomeController::class, 'product'])->name('home.product_page');



Route::get('/register',[AuthController::class,'registration'])->name('auth.registration');
Route::get('/login',[AuthController::class,'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::post('/post_register',[UserController::class,'store'])->name('store');
Route::any('/post_login',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::get('/users/index', [UserController::class, 'index'])->name('index');
Route::post('/users', [UserController::class, 'store'])->name('store');

Route::post('/users', [UserController::class, 'destroy'])->name('users.destroy');
Route::post('/users', [UserController::class, 'update'])->name('users.update');

Route::group(['middleware' => ['admin']], function () {

    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/brands', BrandController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/banners', BannerController::class);
    Route::resource('/orders', OrderController::class);
    Route::resource('/contacts', MessageController::class);

    Route::get('/dashboard', [AuthController::class, 'index'])->name('admin');

    Route::get('/admin-profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/admin-profile/{id}', [AuthController::class, 'profileUpdate'])->name('profile-update');

    Route::get('admin-change-password', [AuthController::class, 'changePassword'])->name('change.password.form');
    Route::post('admin-change-password', [AuthController::class, 'changPasswordStore'])->name('admin.change.password');

    // Route::get('/order/{id}/details', [OrderController::class, 'showOrderDetails'])->name('countOrder.index');
  // Route to view order details
Route::get('orders/{id}', [OrderController::class, 'showOrderDetails'])->name('countOrderProduct');

// routes/web.php
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('settings', [AuthController::class, 'settings'])->name('settings');
    Route::post('setting/update', [AuthController::class, 'settingsUpdate'])->name('settings.update');
    Route::get('message', [MessageController::class, 'index'])->name('messages.index');
    Route::get('message/{id}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('message/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');


 });

Route::group(['middleware' => ['user']],function(){
    Route::resource('/carts', CartController::class);
    Route::resource('/wishlists', WishlistController::class);
    Route::resource('/userdashboard', HomeController::class);

    Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('cart-delete/{id}', [CartController::class, 'cartDelete'])->name('cart-delete');
    Route::post('cart-update', [CartController::class, 'cartUpdate'])->name('cart-update');

    Route::post('/wishlist/{id}', [WishlistController::class, 'wishlist'])->name('add-to-wishlist');
    Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlist');
    Route::get('wishlist-delete/{id}', [WishlistController::class, 'wishlistDelete'])->name('wishlist-delete');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('user');
    Route::get('/profile', [HomeController::class, 'profile'])->name('user-profile');
    Route::post('/profile/{id}', [HomeController::class, 'profileUpdate'])->name('user-profile-update');

    Route::get('/order', [HomeController::class, 'orderIndex'])->name('user.order.index');
    Route::get('/order/show/{id}', [HomeController::class, 'orderShow'])->name('user.order.show');
    Route::get('change-password', [HomeController::class, 'changePassword'])->name('user.change.password.form');
    Route::post('change-password', [HomeController::class, 'changPasswordStore'])->name('change.password');


});

Route::get('product-detail/{id}', [FrontendController::class, 'productDetail'])->name('product-detail');
Route::get('product-cat/{id}', [FrontendController::class, 'productCat'])->name('product-cat');
// Route::post('product/search', [FrontendController::class, 'productSearch'])->name('product.search');
Route::match(['get', 'post'], 'product/search', [FrontendController::class, 'productSearch'])->name('product.search');

Route::post('cart/order', [OrderController::class, 'store'])->name('cart.order');
Route::post('/contact/message', [MessageController::class, 'store'])->name('contact.store');

