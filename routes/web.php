<?php
// ----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GoogleAuthentication;
use App\Http\Controllers\UserViews;
use App\Http\Controllers\ExcelProductSheet;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\WebsiteStores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminViews;
use App\Http\Controllers\WebsiteViews;
use App\Http\Controllers\AdminStores;


Route::get('admin/login', function () {
    return view('auth.login');
});



Route::post('/logout', function () {
    Auth::logout();
    return redirect('admin/login');
})->name('logout');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('admin/dashboard', [AdminViews::class, 'admindashboard'])->name('admin.admindashboard');
});


//Admin Panel Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/master', [AdminViews::class, 'master'])->name('admin.master');
    Route::post('/createmaster', [AdminStores::class, 'createmaster'])->name('admin.createmaster');
    Route::get('/deletemaster/{id}', [AdminStores::class, 'deletemaster'])->name('admin.deletemaster');
    Route::post('/updatemaster', [AdminStores::class, 'updatemaster'])->name('admin.updatemaster');
    Route::get('/companyprofile', [AdminViews::class, 'companyprofile'])->name('admin.companyprofile');
    Route::post('/addcompanydetails', [AdminStores::class, 'addcompanydetails'])->name('admin.addcompanydetails');
    Route::post('/updateregistercompany', [AdminStores::class, 'updateregistercompany'])->name('admin.updateregistercompany');
    Route::get('/myprofile', [AdminViews::class, 'myprofile'])->name('admin.myprofile');
    Route::post('/updatemyprofile', [AdminStores::class, 'updatemyprofile'])->name('admin.updatemyprofile');
    Route::get('/allusers', [AdminViews::class, 'allusers'])->name('admin.allusers');
    Route::post('/updateUserStatus', [AdminStores::class, 'updateUserStatus'])->name('admin.updateUserStatus');
    Route::get('/media', [AdminViews::class, 'media'])->name('admin.media');
    Route::post('/insertMedia', [AdminStores::class, 'insertMedia'])->name('admin.insertMedia');
    Route::get('/showMediaGallery', [AdminStores::class, 'showMediaGallery'])->name('admin.showMediaGallery');
    Route::get('/removegalleryitem', [AdminStores::class, 'removegalleryitem'])->name('admin.removegalleryitem');
    Route::get('/addProduct', [AdminViews::class, 'addProduct'])->name('admin.addProduct');
    Route::post('/insertProduct', [AdminStores::class, 'insertProduct'])->name('admin.insertProduct');
    Route::get('/allproducts', [AdminViews::class, 'allproducts'])->name('admin.allproducts');
    Route::get('/deleteProduct', [AdminStores::class, 'deleteProduct'])->name('admin.deleteProduct');
    Route::get('/editproduct/{id}', [AdminViews::class, 'editproduct'])->name('admin.editproduct');
    Route::get('/filterbycategory/{category}', [AdminStores::class, 'filterbycategory'])->name('admin.filterbycategory');
    Route::get('/filterbystatus/{status}', [AdminStores::class, 'filterbystatus'])->name('admin.filterbystatus');
    Route::get('/addblog', [AdminViews::class, 'addblog'])->name('admin.addblog');
    Route::get('/blogslist', [AdminViews::class, 'blogslist'])->name('admin.blogslist');
    Route::post('/submitblog', [AdminStores::class, 'submitblog'])->name('admin.submitblog');
    Route::get('/editblog/{id}', [AdminViews::class, 'editblog'])->name('admin.editblog');
    Route::post('/updateblog', [AdminStores::class, 'updateblog'])->name('admin.updateblog');
    Route::get('/deleteblog/{id}', [AdminStores::class, 'deleteblog'])->name('admin.deleteblog');
    Route::get('/website-settings', [AdminViews::class, 'websitesettings'])->name('admin.websitesettings');
    Route::post('/submitWebsiteSettings', [AdminStores::class, 'submitWebsiteSettings'])->name('admin.submitWebsiteSettings');
    Route::get('editWebsiteSettings', [AdminViews::class, 'editWebsiteSettings'])->name('admin.editWebsiteSettings');
    Route::post('/delete-slider-image', [AdminStores::class, 'deleteSliderImage'])->name('delete.slider.image');
    Route::post('updateWebsiteSettings', [AdminStores::class, 'updateWebsiteSettings'])->name('admin.updateWebsiteSettings');
    Route::post('/deleteoffer-slider-image', [AdminStores::class, 'deleteOfferSliderImage'])->name('deleteoffer.slider.image');
    Route::get('/policypages', [AdminViews::class, 'policypages'])->name('admin.policypages');
    Route::post('/policypagesinsert', [AdminStores::class, 'policypagesinsert'])->name('admin.policypagesinsert');
    Route::post('/policypagesgetdata', [AdminStores::class, 'policypagesgetdata'])->name('admin.policypagesgetdata');
    Route::get('/orders', [AdminViews::class, 'orders'])->name('admin.orders');
    Route::get('/editorder/{id}', [AdminViews::class, 'editorder'])->name('admin.editorder');
    Route::post('/updateOrderStatus/{id}', [AdminStores::class, 'updateOrderStatus'])->name('admin.updateOrderStatus');
    Route::get('/orderinvoice/{id}', [AdminViews::class, 'orderinvoice'])->name('admin.orderinvoice');
});


//User Panel Authentication Routes
Route::get('user/login', [UserViews::class, 'userloginpage'])->name('user.userloginpage');
Route::get('user/registration', [UserViews::class, 'userregistration'])->name('user.userregistration');
Route::post('register-user', [UserViews::class, 'registeruser'])->name('user.registeruser');
Route::post('loginuser', [UserViews::class, 'loginuser'])->name('user.loginuser');


//User Panel Routes
Route::prefix('user')->middleware('customer.auth')->group(function () {
    Route::controller(UserViews::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/myprofile', 'myprofile')->name('user.myprofile');
        Route::get('/logoutuserpanel', 'logoutuserpanel')->name('user.logoutuserpanel');
        Route::post('/updateuserprofile', 'updateuserprofile')->name('user.updateuserprofile');
        Route::post('/updatepassword', 'updatepassword')->name('user.updatepassword');
    });
});


//Excel Routes
Route::get('/import-excel', [ExcelProductSheet::class, 'index'])->name('import.excel');
Route::post('/import-excel', [ExcelProductSheet::class, 'import']);


//Website Routes
Route::name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'homepage'])->name('homepage');
    Route::get('/about-us', [WebsiteController::class, 'aboutpage'])->name('aboutpage');
    Route::get('/contact-us', [WebsiteController::class, 'contactpage'])->name('contactpage');
    Route::get('/blog-details/{id}', [WebsiteController::class, 'blogdetails'])->name('blogdetails');
    Route::get('/policies', [WebsiteController::class, 'policies'])->name('policies');
    Route::get('/product-details/{id}', [WebsiteController::class, 'productdetails'])->name('productdetails');
    Route::get('/shop', [WebsiteController::class, 'shop'])->name('shop');
    Route::post('/shopcategoryfilter', [WebsiteController::class, 'shopcategoryfilter'])->name('shopcategoryfilter');
    Route::post('/sortByPriceFilter', [WebsiteController::class, 'sortByPriceFilter'])->name('sortByPriceFilter');
    Route::get('/blogs', [WebsiteController::class, 'blogs'])->name('blogs');
    Route::post('/giveProductReview', [WebsiteController::class, 'giveProductReview'])->name('giveProductReview');
    Route::post('/addtoCart', [WebsiteController::class, 'addtoCart'])->name('addtocart');
    Route::get('/mycart', [WebsiteController::class, 'mycart'])->name('mycart');
    Route::post('/removeFromCart', [WebsiteController::class, 'removeFromCart'])->name('removeFromCart');
    Route::post('/updateQuantity', [WebsiteController::class, 'updateQuantity'])->name('updateQuantity');
    Route::get('/checkout', [WebsiteController::class, 'checkout'])->name('checkout');
    Route::post('/completeCheckout', [WebsiteController::class, 'completeCheckout'])->name('completeCheckout');
    Route::get('/confirm-order', [WebsiteController::class, 'confirmorder'])->name('confirmorder');
});



