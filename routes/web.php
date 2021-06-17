<?php

use App\Http\Controllers\CampaignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategroyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TopdealController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-vendor',function(){
    return view('admin.loginFrom');
});

Route::post('login',[UserController::class,'login']);

//register
Route::get('/register-vendor',function()
{
    return view("admin.registerFrom");
});
Route::post('register',[UserController::class,'register']);
Route::get('otp-form',function(){
    return view("admin.otpForm");
});
Route::post('checkOtp',[UserController::class,'checkOtp']);

//lost pass
Route::get('lost-pass-form',function(){
    return view("admin.lostPassForm");
});
Route::post('request-reset-pass',[UserController::class,"requestResetPass"]);

Route::get('/otp-form-pass',function(){
    return view('admin.otpFormPass');
});
Route::post('/check-otp-pass',[UserController::class,'checkOtpPass']);

//bank details
Route::get('/show-bank-details',[UserController::class,'showBankDetails']);
Route::get('update-bank-info-form/{id}',[UserController::class,'updateBankInfoForm']);
Route::post('update-bank-info',[UserController::class,'updateBankInfo']);
//business details
Route::get('/show-business-details',[UserController::class,'showBusinessDetails']);
Route::get('update-business-info-form/{id}',[UserController::class,'updateBusinessInfoForm']);
Route::post('/update-business-info',[UserController::class,'updateBusinessInfo']);



Route::get('/logout',[UserController::class,'logout']);
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

//Order Route
Route::get('/orders',[OrderController::class,'index']);
Route::get('/order-details/{invoice}',[OrderController::class,'getOrderDetails']);
Route::post('/update-order-status',[OrderController::class,'updateOrderStatus']);
//print-memo
Route::post('/print',[OrderController::class,'printMemo']);

// Product Route
Route::get('/add-product',[ProductController::class,'addProductFrom']);
Route::post('upload-product-info',[ProductController::class,'uploadProductInfo']);
Route::get('/products-list',[ProductController::class,'products']);
Route::get('/edit-product/{id}',[ProductController::class,'editProduct']);
Route::post('/edit-product-info',[ProductController::class,'edit']);

//Shop Enlist
Route::get('/enlist-form/{id}',[ProductController::class,'enlistForm']);
Route::post('/enlist-product',[ProductController::class,'enlistProduct']);
Route::get('/list-enlisted-product',[ProductController::class,'listEnlistedProduct']);
Route::get('/remove-enlist/{id}',[ProductController::class,'removeEnlist']);

// top deal
Route::get('/topdeal-list',[TopdealController::class,'index']);
Route::get('/remove-topdeal/{id}',[TopdealController::class,'removeTopDeal']);
Route::get('/show-products',[TopdealController::class,'showProduct']);
Route::get('/topdeal-form/{xitemid}',[TopdealController::class,'topdealForm']);
Route::post('/add-topdeal',[TopdealController::class,'addTopdeal']);


Route::get('/category',[CategroyController::class,'index']);
Route::get('/category-form',[CategroyController::class,'categoryForm']);
Route::post('/create-category',[CategroyController::class,'createCategory']);
Route::get('/category-update-form/{id}',[CategroyController::class,'updateForm']);
Route::post('update-category',[CategroyController::class,'updateCategory']);
Route::get('/category-list',function(){
    return view('admin.categoryList');
});

//shop
Route::get('/show-shop-list',[ShopController::class,'index']);
Route::get('/shop-details/{id}',[ShopController::class,'shopDetails']);
Route::get('/update-shop-status/{zactive}/{id}',[ShopController::class,'updateShopStatus']);

//campaign-form
Route::get('campaign-list',[CampaignController::class,'index']);
Route::get('/campaign-form',function()
{
    return view('admin.campaignForm');
});
Route::post('create-campaign',[CampaignController::class,'createCampaign']);

//seller campaign
Route::get('show-campaign-seller',[CampaignController::class,'showCampaignsSeller']);
Route::get('campaign-reg/{campaign_id}',[CampaignController::class,'campaignReg']);
Route::get('save-reg-campaign/{campaign_id}',[CampaignController::class,'saveRegCampaign']);
Route::get('campaign-product-list/{campaign_id}',[CampaignController::class,'campaignProductList']);
Route::get('products-for-campaign/{campaign_id}',[CampaignController::class,'productsForCampaign']);
Route::get('campaign-product-form/{campaign_id}/{xitemid}',[CampaignController::class,'campaignProductForm']);

Route::post('add-product-to-campaign',[CampaignController::class,'addProductToCampaign']);












