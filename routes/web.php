<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\cms\BlogsController;
use App\Http\Controllers\cms\FaqsController;
use App\Http\Controllers\cms\PrivacyController;
use App\Http\Controllers\cms\Refundcontroller;
use App\Http\Controllers\cms\SliderController;
use App\Http\Controllers\cms\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubsubController;
use App\Http\Controllers\TermConditionController;
use App\Http\Controllers\User_managementControler;
use App\Http\Controllers\VendorControler;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
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

Route::get('/', [LoginController::class, 'home']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/delete', [Dashboard::class, 'delete']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [Dashboard::class, 'dashboard']);

    Route::prefix('distributor/')->group(function () {
        Route::get('/', [DistributorController::class, 'index']);
        Route::get('get_distributor', [ DistributorController::class,'get_distributor', ]);
        Route::post('add', [DistributorController::class, 'add']);
        Route::post('edit', [DistributorController::class, 'edit']);
        Route::post('update', [DistributorController::class, 'update']);
    });

    Route::prefix('vendor/')->group(function () {
        Route::get('', [VendorControler::class, 'index']);
        Route::get('get_vendor', [VendorControler::class, 'get_vendor']);
        Route::post('add', [VendorControler::class, 'add']);
        Route::post('edit', [VendorControler::class, 'edit']);
        Route::post('update', [VendorControler::class, 'update']);
    });

    Route::prefix('category/')->group(function () {
        Route::get('', [CategoryController::class, 'index']);
        Route::get('get_cat', [CategoryController::class, 'get_cat']);
        Route::post('add', [CategoryController::class, 'add']);
        Route::post('edit', [CategoryController::class, 'edit']);
        Route::post('update', [CategoryController::class, 'update']);
    });

    Route::prefix('sub_category/')->group(function () {
        Route::get('get_sub', [SubcategoryController::class, 'get_sub']);
        Route::post('sub_cat_add', [ SubcategoryController::class,'sub_cat_add',]);
        Route::post('edit', [SubcategoryController::class, 'edit']);
        Route::post('update', [SubcategoryController::class, 'update']);
    });
    Route::prefix('sub_sub_category/')->group(function () {
        Route::get('get_sub_subcat', [SubsubController::class,'get_sub_subcat',]);
        Route::post('sub_cat_add', [SubsubController::class, 'sub_cat_add']);
        Route::post('edit', [SubsubController::class, 'edit']);
        Route::post('update', [SubsubController::class, 'update']);
    });
    Route::prefix('brand/')->group(function () {
        Route::get('', [BrandController::class, 'index']);
        Route::get('get_brand', [BrandController::class, 'get_brand']);
        Route::post('add', [BrandController::class, 'add']);
        Route::post('edit', [BrandController::class, 'edit']);
        Route::post('update', [BrandController::class, 'update ']);
    });
    Route::prefix('setting/')->group(function () {
        Route::get('', [SettingController::class, 'index']);
        Route::post('update', [SettingController::class, 'update']);
        Route::get('resetpassword', [SettingController::class,'resetpassword',]);
        Route::post('changepassword', [ SettingController::class,'changepassword',]);
    });
    Route::prefix('cms/about/')->group(function () {
        Route::get('', [AboutController::class, 'index']);
        Route::post('update', [AboutController::class, 'update']);
    });
    Route::prefix('cms/term/')->group(function () {
        Route::get('', [TermConditionController::class, 'index']);
        Route::post('update', [TermConditionController::class, 'update']);
    });
    Route::prefix('cms/privacy/')->group(function () {
        Route::get('', [PrivacyController::class, 'index']);
        Route::post('update', [PrivacyController::class, 'update']);
    });
    Route::prefix('cms/refund/')->group(function () {
        Route::get('', [Refundcontroller::class, 'index']);
        Route::post('update', [Refundcontroller::class, 'update']);
    });
    Route::prefix('cms/FAQs/')->group(function () {
        Route::get('', [FaqsController::class, 'index']);
        Route::post('update', [FaqsController::class, 'update']);
    });
    Route::prefix('cms/blogs/')->group(function () {
        Route::get('', [BlogsController::class, 'index']);
        Route::post('add', [BlogsController::class, 'add']);
        Route::get('get_blog', [BlogsController::class, 'get_blog']);
        Route::post('edit', [BlogsController::class, 'edit']);
        Route::post('update', [BlogsController::class, 'update']);
    });

    Route::prefix('cms/sliders/')->group(function () {
        Route::get('', [SliderController::class, 'index']);
        Route::post('add', [SliderController::class, 'add']);
        Route::get('get_slider', [SliderController::class, 'get_slider']);
        Route::post('edit', [SliderController::class, 'edit']);
        Route::post('update', [SliderController::class, 'update']);
    });

    Route::prefix('cms/testimonial/')->group(function () {
        Route::get('', [TestimonialController::class, 'index']);
        Route::post('add', [TestimonialController::class, 'add']);
        Route::get('get_testimonial', [TestimonialController::class,'get_testimonial',]);
        Route::post('edit', [TestimonialController::class, 'edit']);
        Route::post('update', [TestimonialController::class, 'update']);
    });
    Route::prefix('user_management')->group(function () {
        Route::get('', [User_managementControler::class, 'index']);
        Route::post('staffadd', [User_managementControler::class, 'staffadd']);
        Route::get('get_user', [User_managementControler::class, 'get_user']);
        Route::post('edit', [User_managementControler::class, 'edit']);
    });

    Route::prefix('offer')->group(function () {
        Route::get('', [OfferController::class, 'index']);
        Route::get('flat/', [OfferController::class, 'flat']);
        Route::get('percentage/', [OfferController::class, 'percentage']);
        Route::post('percentdata/', [OfferController::class, 'percentdata']);
    });
});

Route::get('/logout', function () {
    Cookie::queue('login_email', '', time() + 60 * 60 * 24 * 100);
    Cookie::queue('login_pass', '', time() + 60 * 60 * 24 * 100);
    session()->flush();
    return redirect('/');
});

Route::get('/404', function () {
    return view('errors/404');
});
Route::get('/403', function () {
    return view('errors/403');
});
Route::get('/500', function () {
    return view('errors/500');
});
