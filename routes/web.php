<?php



// use App\Http\Livewire\Admin\AdminDashboardComponent;

// use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;



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



// Route::get('/shop',ShopController::class);

// Route::get('/cart',CartController::class);






        Route::get('/dashboard',function(){
            return view('dashboard');
            
        })->name('dashboard');

        Route::get('/pages',function(){
            return view('admin.pages');

        })->name('pages');


        Route::get('/category',function(){
            return view('category.index');

        })->name('category');


        Route::get('/product',function(){
            return view('product');

        })->name('product');

        
    


    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::resource('/', 'HomeController');


    Route::get('add-to-cart/{id}','ProductController@addtocart');
    
    Route::get('/cart','ProductController@cart');

     //for User or Customer
    Route::middleware([ 'auth:sanctum' ,  'verified', ]) ->group(function() {
        Route::get('/user/dashboard',App\Http\Livewire\User::class)->name('user.dashboard');
        });


      

        //for Admin
        Route::middleware([ 'auth:sanctum' ,  'verified','authadmin' ]) ->group(function() {
            Route::get('/admin/dashboard',AdminDashboardComponent::class,)->name('admin.dashboard');
        });
   