<?php
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductSearchController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [MedicineController::class, 'index'])->name('home');
Route::get('/allMedicines', [ProductSearchController::class, 'index'])->name('medicine.index');
Route::get('/medproduct/{id}', [MedicineController::class, 'show'])->name('medicine.show');

Route::group(['prefix' => 'admin'], function () {

    //Authenticated Middleware
    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
    
    // Route for profile update
    Route::get('profile/edit', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/update', [AdminProfileController::class, 'update'])->name('profile.update');

    // Route for category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
    
    
    // Route for brand
    Route::get('/brand', [brandController::class, 'index'])->name('brand.index');
    Route::get('/brand/create', [brandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [brandController::class, 'store'])->name('brand.store');
    Route::get('/brand/{brand}/edit', [brandController::class, 'edit'])->name('brand.edit');
    Route::put('/brand/{brand}', [brandController::class, 'update'])->name('brand.update');
    Route::delete('/brand/{brand}', [brandController::class, 'destroy'])->name('brand.destroy');

    // Route for product
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    //Guest Middleware
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::get('/order', [OrderController::class, 'viewOrders'])->name('vieworders');
});

Route::group(['prefix' => 'account'], function () {

    //Authenticated Middleware
    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        
        // Route for profile update
        Route::get('profile/edit', [UserProfileController::class, 'edit'])->name('userprofile.edit');
        Route::put('profile/update', [UserProfileController::class, 'update'])->name('userprofile.update');
        
        // Route for cart
        Route::get('cart', [CartController::class, 'listcart'])->name('cartproducts');
        Route::get('cart/{cart}', [CartController::class, 'addToCart'])->name('addtocart');
        Route::put('/cart/{id}', [CartController::class, 'updatecardproducts'])->name('cartupdate');
        Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cartdestroy');
        
        // Route for checkout
        Route::post('/checkout', [OrderController::class, 'checkout'])->name('cartcheckout');
        
        // Route for order
        Route::get('/order', [OrderController::class, 'UserOrders'])->name('order.view');
    });

    //Guest Middleware
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });
});

route::get('createpaypal',[PaypalController::class,'createpaypal'])->name('createpaypal');

route::post('processPaypal',[PaypalController::class,'processPaypal'])->name('processPaypal');

route::get('processSuccess',[PaypalController::class,'processSuccess'])->name('processSuccess');

route::get('processCancel',[PaypalController::class,'processCancel'])->name('processCancel');

