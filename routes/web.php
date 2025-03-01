<?php
// ----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GoogleAuthentication;
use App\Http\Controllers\UserViews;
use App\Http\Controllers\WebsiteStores;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminViews;
use App\Http\Controllers\WebsiteViews;
use App\Http\Controllers\AdminStores;


Route::get('/', function () {
    return view('auth.login');
});



Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
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
    Route::get('/addproperty', [AdminViews::class, 'addproperty'])->name('admin.addproperty');
    Route::post('/insertlisting', [AdminStores::class, 'insertlisting'])->name('admin.insertlisting');
    Route::get('/editproperty/{id}', [AdminViews::class, 'editproperty'])->name('admin.editproperty');
    Route::post('/updatelisting', [AdminStores::class, 'updatelisting'])->name('admin.updatelisting');
    Route::get('/allproperties', [AdminViews::class, 'allproperties'])->name('admin.allproperties');
    Route::get('/deletelisting/{id}', [AdminStores::class, 'deletelisting'])->name('admin.deletelisting');
    Route::get('/viewproperty/{id}', [AdminViews::class, 'viewproperty'])->name('admin.viewproperty');
    Route::get('/leadslist', [AdminViews::class, 'leadslist'])->name('admin.leadslist');
    Route::post('/insertfollowup', [AdminStores::class, 'insertfollowup'])->name('admin.insertfollowup');
    Route::get('/deletelead/{id}', [AdminStores::class, 'deletelead'])->name('admin.deletelead');
    Route::post('/updatelead', [AdminStores::class, 'updatelead'])->name('admin.updatelead');
    Route::get('/leadstatusfilter/{status}', [AdminViews::class, 'leadstatusfilter'])->name('admin.leadstatusfilter');
    Route::post('/datefilterleads', [AdminViews::class, 'datefilterleads'])->name('admin.datefilterleads');
    Route::get('/leadslistkaban', [AdminViews::class, 'leadslistkaban'])->name('admin.leadslistkaban');
    Route::post('/updateLeadStatusKanban', [AdminViews::class, 'updateLeadStatusKanban'])->name('admin.updateLeadStatusKanban');
    Route::get('/addblog', [AdminViews::class, 'addblog'])->name('admin.addblog');
    Route::get('/blogslist', [AdminViews::class, 'blogslist'])->name('admin.blogslist');
    Route::post('/submitblog', [AdminStores::class, 'submitblog'])->name('admin.submitblog');
    Route::get('/editblog/{id}', [AdminViews::class, 'editblog'])->name('admin.editblog');
    Route::post('/updateblog', [AdminStores::class, 'updateblog'])->name('admin.updateblog');
    Route::get('/deleteblog/{id}', [AdminStores::class, 'deleteblog'])->name('admin.deleteblog');
    Route::get('/all-customers', [AdminViews::class, 'allcustomers'])->name('admin.allcustomers');
    Route::get('/all-agents', [AdminViews::class, 'allagents'])->name('admin.allagents');
    Route::post('/updateadminlistingstatus', [AdminStores::class, 'updateadminlistingstatus'])->name('admin.updateadminlistingstatus');
    Route::get('/all-notifications', [AdminViews::class, 'notifications'])->name('admin.notifications');
    Route::post('/insertnotification', [AdminStores::class, 'insertnotification'])->name('admin.insertnotification');
    Route::get('/deletenortification/{id}', [AdminStores::class, 'deletenortification'])->name('admin.deletenortification');
    Route::post('/udpatenortification', [AdminStores::class, 'udpatenortification'])->name('admin.udpatenortification');
    Route::get('/investpagesettings', [AdminViews::class, 'investpagesettings'])->name('admin.investpagesettings');
    Route::post('/submitinvestpagesettings', [AdminStores::class, 'submitinvestpagesettings'])->name('admin.submitinvestpagesettings');
    Route::get('/all-projects', [AdminViews::class, 'projects'])->name('admin.projects');
    Route::get('/addproject', [AdminViews::class, 'addproject'])->name('admin.addproject');
    Route::post('/submitproject', [AdminStores::class, 'submitproject'])->name('admin.submitproject');
    Route::get('/editproject/{id}', [AdminViews::class, 'editproject'])->name('admin.editproject');
    Route::post('/updateproject', [AdminStores::class, 'updateproject'])->name('admin.updateproject');

});


//User Panel Routes
Route::prefix('user')->middleware('customer.auth')->group(function () {
    Route::controller(UserViews::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('user.dashboard');
        Route::get('/myprofile', 'myprofile')->name('user.myprofile');
        Route::get('/logoutuserpanel', 'logoutuserpanel')->name('user.logoutuserpanel');
        Route::post('/updateuserprofile', 'updateuserprofile')->name('user.updateuserprofile');
        Route::get('/mylistings', 'mylistings')->name('user.mylistings');
        Route::get('/addlisting', 'addlisting')->name('user.addlisting');
        Route::post('/insertuserlisting', 'insertuserlisting')->name('user.insertuserlisting');
        Route::get('/viewlisting/{id}', 'viewlisting')->name('user.viewlisting');
        Route::get('/editlisting/{id}', 'editlisting')->name('user.editlisting');
        Route::post('/updateuserlisting', 'updateuserlisting')->name('user.updateuserlisting');
        Route::get('/deletelisting/{id}', 'deletelisting')->name('user.deletelisting');
        Route::post('/updateaduserlistingstatus', 'updateaduserlistingstatus')->name('user.updateaduserlistingstatus');
        Route::get('/notifications', 'notifications')->name('user.notifications');
    });
});



