<?php
// ----------------------------------------------------🔱🙏HAR HAR MAHADEV🔱🙏----------------------------------------------------
use App\Http\Controllers\ApiMasterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PropertyListing;
use App\Models\Blog;
use App\Models\Master;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



