<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomOrderController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\CustomOrderController as AdminCustomOrderController;
use App\Http\Controllers\Admin\OccasionController as AdminOccasionController;
use App\Http\Controllers\Admin\LookbookController as AdminLookbookController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\SubscriberController as AdminSubscriberController;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Frontend Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products & Categories
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/category/{category:slug}', [ProductController::class, 'byCategory'])->name('category.show');
Route::post('/products/{product:slug}/review', [ProductController::class, 'storeReview'])->name('products.review');

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{key}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{key}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');

// Checkout
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::post('/checkout/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::get('/order/success/{order}', [OrderController::class, 'success'])->name('order.success');

// Custom Orders
Route::get('/custom-orders', [CustomOrderController::class, 'index'])->name('custom-orders');
Route::post('/custom-orders', [CustomOrderController::class, 'store'])->name('custom-orders.store');

// Static Pages
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Newsletter Subscription
Route::post('/subscribe', function (Request $request) {
    $request->validate(['email' => 'required|email']);
    Subscriber::firstOrCreate(['email' => $request->email]);
    
    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success' => true,
            'message' => 'Alhamdulillah! Aap Islamic Crafts Family mein shamil ho gaye hain. 10% OFF voucher has been reserved for you! 💛',
        ]);
    }
    
    return back()->with('success', 'Alhamdulillah! Aap Islamic Crafts family mein subscribe ho gaye hain! 💛');
})->name('subscribe');

/*
|--------------------------------------------------------------------------
| Admin Portal Routes
|--------------------------------------------------------------------------
*/

// Admin Authentication
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Protected Admin Panel
Route::prefix('admin')->name('admin.')->middleware(['admin'])->group(function () {
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Products Management
    Route::resource('products', AdminProductController::class);
    Route::post('/products/{product}/toggle-featured', [AdminProductController::class, 'toggleFeatured'])->name('products.toggle-featured');
    Route::post('/products/{product}/toggle-active', [AdminProductController::class, 'toggleActive'])->name('products.toggle-active');
    Route::post('/products/{product}/images/{image}/make-primary', [AdminProductController::class, 'makePrimaryImage'])->name('products.images.make-primary');
    Route::delete('/products/{product}/images/{image}', [AdminProductController::class, 'deleteImage'])->name('products.images.destroy');

    // Categories Management
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

    // Orders Management
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/export', [AdminOrderController::class, 'export'])->name('orders.export');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::delete('/orders/{order}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');

    // Custom Order Requests
    Route::get('/custom-orders', [AdminCustomOrderController::class, 'index'])->name('custom-orders.index');
    Route::get('/custom-orders/{customOrder}', [AdminCustomOrderController::class, 'show'])->name('custom-orders.show');
    Route::patch('/custom-orders/{customOrder}/status', [AdminCustomOrderController::class, 'updateStatus'])->name('custom-orders.update-status');
    Route::delete('/custom-orders/{customOrder}', [AdminCustomOrderController::class, 'destroy'])->name('custom-orders.destroy');

    // Reviews Management
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews/{review}/toggle-approve', [AdminReviewController::class, 'toggleApprove'])->name('reviews.toggle-approve');
    Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

    // Subscribers
    Route::get('/subscribers', [AdminSubscriberController::class, 'index'])->name('subscribers.index');
    Route::get('/subscribers/export', [AdminSubscriberController::class, 'export'])->name('subscribers.export');
    Route::delete('/subscribers/{subscriber}', [AdminSubscriberController::class, 'destroy'])->name('subscribers.destroy');

    // Shop by Occasion Management
    Route::get('/occasions', [AdminOccasionController::class, 'index'])->name('occasions.index');
    Route::post('/occasions', [AdminOccasionController::class, 'store'])->name('occasions.store');
    Route::put('/occasions/{occasion}', [AdminOccasionController::class, 'update'])->name('occasions.update');
    Route::post('/occasions/{occasion}/toggle-active', [AdminOccasionController::class, 'toggleActive'])->name('occasions.toggle-active');
    Route::delete('/occasions/{occasion}', [AdminOccasionController::class, 'destroy'])->name('occasions.destroy');

    // Studio Lookbook Management ("Crafted in Our Studio, Loved in Your Homes")
    Route::get('/lookbook', [AdminLookbookController::class, 'index'])->name('lookbook.index');
    Route::post('/lookbook', [AdminLookbookController::class, 'store'])->name('lookbook.store');
    Route::put('/lookbook/{lookbookItem}', [AdminLookbookController::class, 'update'])->name('lookbook.update');
    Route::post('/lookbook/{lookbookItem}/toggle-active', [AdminLookbookController::class, 'toggleActive'])->name('lookbook.toggle-active');
    Route::delete('/lookbook/{lookbookItem}', [AdminLookbookController::class, 'destroy'])->name('lookbook.destroy');
});
