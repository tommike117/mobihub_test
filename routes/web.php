<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminPostComponent;
use App\Http\Livewire\Admin\Post\PostCreateComponent;
use App\Http\Livewire\Admin\Post\PostShowComponent;
use App\Http\Livewire\Admin\Post\EditPostComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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
Route::get('/', HomeComponent::class);

Route::get('/shop', ShopComponent::class)->name('product-shop');

Route::get('/cart', CartComponent::class)->name('product-cart');

Route::get('/checkout', CheckoutComponent::class);

Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product-category');

//put ? after a parameter that may not always be present in the URI.
Route::get('/product/{slug?}', DetailsComponent::class)->name('product-details');

Route::get('/search', SearchComponent::class)->name('product-search');

//Displaying Posts
Route::get('/post/{slug}', PostShowComponent::class)->name('post-show');






// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

//For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function() {

    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('dashboard');
    Route::get('/admin/dashboard/categories', AdminCategoryComponent::class)->name('dashboard-categories');
    Route::get('/admin/dashboard/posts', AdminPostComponent::class)->name('dashboard-posts');
    Route::get('/admin/dashboard/post/create', PostCreateComponent::class)->name('dashboard-posts-create');
    Route::get('/admin/dashboard/post/edit/{post}', EditPostComponent::class)->name('dashboard-posts-edit');
});

//For User
Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user-dashboard');
});
