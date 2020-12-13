<?php

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

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'cache clear';
});
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'config:cache';
});
Route::get('/view-cache', function() {
    $exitCode = Artisan::call('view:cache');
    return 'view:cache';
});
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'view:clear';
});

Route::get('/checkout', function () {
    return view('frontend.Pages.checkout');
});
//
//Route::get('/order-add', function () {
//    return view('frontend.pages.order-add');
//});
Route::get('/order-edit/single/{slug}', 'Frontend\MenuController@order_edit_single')->name('order.edit.single');
Route::get('/order/edit/{type}/{slug}', 'Frontend\MenuController@order_edit_type')->name('order.edit.type');
Route::get('/order-edit/{slug}', 'Frontend\MenuController@order_edit')->name('order.edit');
Route::post('/order/add/cart', 'Frontend\MenuController@order_add_cart')->name('order.add.cart');
Route::post('/order/add/cart/double', 'Frontend\MenuController@order_add_cart_double')->name('order.add.cart.double');
Route::post('/order/edit/cart', 'Frontend\MenuController@order_edit_cart')->name('order.edit.cart');
Route::get('/order/place/checkout', 'Frontend\OrderController@order_place' )->name('order.place.checkout');
Route::post('/order/checkout', 'Frontend\OrderController@order_checkout' )->name('order.checkout');
Route::post('/order/checkout/add', 'Frontend\OrderController@checkout_add' )->name('order.checkout.add');
Route::get('/remove/cart/{id}', 'Frontend\MenuController@cartRemove')->name('cart.remove');
Route::get('/order/edit/{cartid}', 'Frontend\MenuController@menu_edit')->name('menu.edit');
Route::get('/update/cart/{id}', 'Frontend\MenuController@quantityUpdate')->name('cart.qty.update');
Route::post('/coupon/apply', 'Frontend\OrderController@couponApply' )->name('coupon.apply');

Route::get('/single-page', function () {
    return view('frontend.pages.singleFood');
});
/*Route::get('/sub-burger-category/{id}', function () {
    return view('frontend.pages.subBurgerCategory');
});*/
//Route::get('/sub-category/{id}', 'Frontend\MenuController@subCategory');
Route::get('/sub-category/{id}', 'Frontend\MenuController@subCategory');
Route::get('/category-page/{id}', 'Frontend\MenuController@subCategory');
//Route::get('/category-and-sub-category-page/{category_id}/{sub_category_id}', 'Frontend\MenuController@subCategoryProduct' );

Route::get('/', 'Frontend\IndexController@Index' )->name('index');
Route::post('/shop/location/near/list', 'Frontend\IndexController@nearestShp' )->name('service.vendor.near.list');
Route::post('/shop/location/near/search', 'Frontend\IndexController@nearestShpSearch' )->name('service.vendor.near.search');
Route::get('/about', 'Frontend\AboutController@Index' )->name('about');
Route::get('/faq', 'Frontend\IndexController@Faq' )->name('faq');
Route::get('/menu/front', 'Frontend\IndexController@menuFront' )->name('menu.front');
Route::get('/rewards', 'Frontend\IndexController@rewards' )->name('rewards');
Route::get('/menu/list','Frontend\MenuController@menuList' )->name('menu_list');
Route::get('/menu', 'Frontend\MenuController@menu' )->name('menu');
Route::get('/franchise', 'Frontend\IndexController@franchise' )->name('franchise');
Route::post('/franchise-store', 'Frontend\IndexController@franchiseStore' )->name('franchise.store');
Route::get('/career', 'Frontend\IndexController@career' )->name('career');
Route::get('/career-detail/{id}', 'Frontend\IndexController@careerDetail')->name('career.detail');
//Route::get('/food-list', 'Frontend\MenuController@foodList' )->name('foodList');
Route::get('/sub-category-food-list/{category_id}/{sub_category_id}', 'Frontend\MenuController@subCategoryfoodList' )->name('foodList');
Route::get('/category-food-list/{category_id}', 'Frontend\MenuController@categoryfoodList' )->name('foodList');
Route::get('/order-menu', 'Frontend\MenuController@orderMenu' )->name('orderMenu');
Route::get('/location/{id}', 'Frontend\LocationController@location' )->name('location');
Route::get('/cart/one', 'Frontend\CartController@cartOne' )->name('cart-one');
Route::get('/cart/two', 'Frontend\CartController@cartTwo' )->name('cart-two');
Route::get('/cart/three', 'Frontend\CartController@cartThree' )->name('cart-three');
Route::get('/map', 'Frontend\MapController@map' )->name('map');

Route::post('/shop/location/picked-or-delivered', 'Frontend\IndexController@pickedOrDelivered')->name('picked.or.delivered');

Route::post('/email/club', 'Frontend\IndexController@emailClub' )->name('email.club');

Route::get('registration','Frontend\RegistrationController@userRegForm')->name('users.reg.form');
Route::post('registration/store','Frontend\RegistrationController@UserStore')->name('users.reg.store');

Route::get('/contact', 'Frontend\IndexController@contact' )->name('contact');
Route::post('/contact-store', 'Frontend\IndexController@contactStore' )->name('contact.store');

//users dashboard routs
Route::get('/users/dashboard','Frontend\Users\DashboardController@userDashboard')->name('user.dashboard');
Route::post('/profile/update-profile', 'Frontend\Users\DashboardController@updateProfile')->name('update.profile');
Route::post ('change-password-update','Frontend\Users\DashboardController@changedPasswordUpdated')->name('password.change_password_update');





//super admin route group..
Route::group(['middleware'=>['auth','admin']], function (){
    Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin',], function (){
        Route::resource('category', 'CategoryController');
        Route::resource('subcategory', 'SubCategoryController');
        Route::resource('shopLocation','ShopLocationController');
        Route::resource('sidecategory','SideCategoryController');
        Route::resource('ingredient','IngredientController');
        Route::resource('product','ProductController');
        Route::resource('productsidecategoryingredient','ProductSideCategoryIngredientController');
        Route::resource('coupon','CouponController');
        Route::resource('setting','SettingController');
        Route::resource('career','CareerController');

    });
    Route::post('shopLocation/update-address/{id}','Admin\ShopLocationController@updateAddress')->name('update.address');
    Route::get('admin/dashboard','Admin\DashboardController@index')->name('admin.dashboard');

    Route::get('sub-category-list','Admin\ProductController@subCategoryList');

    Route::get('ingredient-list','Admin\ProductSideCategoryIngredientController@IngredientList');

    Route::get('admin/order-list','Admin\OrderController@orderList')->name('admin.order.list');
    Route::get('admin/order-details/{id}','Admin\OrderController@orderDetails')->name('admin.order.details');
    Route::get('admin/order-transaction-list','Admin\OrderController@orderTransactionList')->name('admin.order.transaction.list');
    Route::get('admin/email-club-list','Admin\EmailClubController@index')->name('admin.email.club.list');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
