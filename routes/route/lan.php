<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\client\productController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\sizeSelectionController;
use App\Http\Controllers\ratingController;
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
//cart
Route::get('/cart',[CartController::class,'Cart'])->name('cart');
Route::post('/cart/add/{id}',[CartController::class,'AddToCart'])->name('cart.add');
Route::get('/cart/remove/{id}',[CartController::class,'RemoveCart'])->name('cart.remove');
// update cart
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
//addcart
Route::get('/payment',[CartController::class,'Payment'])->name('payment');
Route::get('/order',[CartController::class,'Order']);
Route::get('/information',[CartController::class,'Order_Information']);
Route::get('/search',[productController::class,'Search']);
Route::get('/product/{categoryId}', [productController::class, 'showProducts'])->name('product.showProducts');
Route::get('/product/{categoryId}/{subcategoryId}', [productController::class, 'showProducts'])->name('product.showProduct');

// sp yeu thích
Route::post('/favorites/add/{id}', [HomeController::class, 'addFavorite'])->name('add.favorite');
//binh luan

// ... existing routes ...

//size selection
Route::get('/size-selection', [sizeSelectionController::class, 'sizeSelection'])->name('size.selection');
// lich su mua hang
Route::get('/purchase-history', [CartController::class, 'PurchaseHistory'])->name('purchase.history');
// thanh toan thanh cong
Route::get('/order-successfully', [CartController::class, 'Order_Successfully'])->name('order.successfully');
// san pham yeu thich
Route::get('/favorite-product', [HomeController::class, 'favoriteProduct'])->name('favorite.product');
// xoa bình luận
Route::delete('/comment/{id}', [CommentController::class, 'deleteComment'])->name('delete.comment');
//rating
Route::post('/detail/{id}', [ratingController::class, 'store'])->name('rating.store');
//get rating
Route::get('/detail/{id}', [ratingController::class, 'getRating'])->name('get.rating');
//xoa rating
Route::delete('/detail/{id}', [ratingController::class, 'deleteRating'])->name('delete.rating');

//title rating
Route::get('/detail/{id}', [ratingController::class, 'titleRating'])->name('title.rating');
