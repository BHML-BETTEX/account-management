<?php

use App\Http\Controllers\AccuntingController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\VendorController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/master', [HomeController::class, 'master'])->name('master');


//AccountingController
Route::get('/acc_type', [AccuntingController::class, 'acc_type'])->name('acc_type');
Route::post('/acc_type/store', [AccuntingController::class, 'acc_type_store'])->name('acc_type_store');
Route::get('/acc_type/delete/{id}', [AccuntingController::class, 'acc_type_delete'])->name('acc_type_delete');
Route::get('/acc_type/edit/{id}', [AccuntingController::class, 'acc_type_edit'])->name('acc_type_edit');
Route::put('/acc_type/update/{id}', [AccuntingController::class, 'acc_type_update'])->name('acc_type_update');

//Account Control
Route::get('/acc_control', [AccuntingController::class, 'acc_control'])->name('acc_control');
Route::post('/acc_control/store', [AccuntingController::class, 'acc_control_store'])->name('acc_control_store');
Route::get('/acc_control/delete/{controlcode}', [AccuntingController::class, 'acc_control_delete'])->name('acc_control_delete');

//Main Head
Route::get('/main_head', [AccuntingController::class, 'main_head'])->name('main_head');
Route::post('/main_head/store', [AccuntingController::class, 'main_head_store'])->name('main_head_store');
Route::get('/main_head/delete/{mainhead_id}', [AccuntingController::class, 'main_head_delete'])->name('main_head_delete');

//Account Category
Route::get('/acc_category', [AccuntingController::class, 'acc_category'])->name('acc_category');
Route::post('/acc_category/store', [AccuntingController::class, 'acc_category_store'])->name('acc_category_store');
Route::get('/acc_category/delete/{id}', [AccuntingController::class, 'acc_category_delete'])->name('acc_category_delete');
Route::get('/acc_category/edit/{id}', [AccuntingController::class, 'acc_category_edit'])->name('acc_category_edit');
Route::post('/acc_category/update', [AccuntingController::class, 'acc_category_update'])->name('acc_category_update');

//Customer
Route::get('/customer', [CustomerController::class, 'customer_list'])->name('customer_list');
Route::get('/add_customer', [CustomerController::class, 'add_customer'])->name('add_customer');
Route::post('/customer/store', [CustomerController::class, 'customer_store'])->name('customer_store');
Route::get('/customer/delete/{id}', [CustomerController::class, 'customer_delete'])->name('customer_delete');
Route::get('/customer/edit/{id}', [CustomerController::class, 'customer_edit'])->name('customer_edit');
Route::post('/customer/update', [CustomerController::class, 'customer_update'])->name('customer_update');



//Vendor
Route::get('/vendor', [VendorController::class, 'vendor_list'])->name('vendor_list');
Route::post('/vendor/store', [VendorController::class, 'vendor_store'])->name('vendor_store');
Route::get('/vendor/delete/{id}', [VendorController::class, 'vendor_delete'])->name('vendor_delete');
Route::post('/vendor/update', [VendorController::class, 'vendor_update'])->name('vendor_update');





//Chart of Account
Route::get('/chart_of_account', [AccuntingController::class, 'chart_of_account'])->name('chart_of_account');
Route::post('/chart_of_account/store', [AccuntingController::class, 'chart_of_account_store'])->name('chart_of_account_store');
Route::post('/chart-of-account/update', [AccuntingController::class, 'chart_of_account_update'])->name('chart_of_account_update');

//General journal
Route::get('/general_journal', [AccuntingController::class, 'general_journal'])->name('general_journal');
Route::get('/add_general_journal', [AccuntingController::class, 'add_general_journal'])->name('add_general_journal');
Route::post('/general_journal/store', [AccuntingController::class, 'general_journal_store'])->name('general_journal_store');

//Adjustmanet Journal
Route::get('/adjustment_journal', [AccuntingController::class, 'adjustment_journal'])->name('adjustment_journal');

//unposted Journal
Route::get('/unposted_journal', [AccuntingController::class, 'unposted_journal'])->name('unposted_journal');

//others payment Entry
Route::get('/others_payment', [AccuntingController::class, 'others_payment'])->name('others_payment');

//Credit Note 
Route::get('/credit_note', [AccuntingController::class, 'credit_note'])->name('credit_note');



//Settings Controller

//autopostingControl
Route::get('/posting_control', [SettingsController::class, 'posting_control'])->name('posting_control');
Route::get('/add/posting_control', [SettingsController::class, 'add_posting_control'])->name('add_posting_control');
Route::post('/posting_control/store', [SettingsController::class, 'posting_control_store'])->name('posting_control_store');

//Reports 
Route::get('/generalladger/reports', [ReportsController::class, 'generalladger'])->name('generalladger');
Route::get('/cashbook/reports', [ReportsController::class, 'cashbook'])->name('cashbook');
Route::get('/bankbook/reports', [ReportsController::class, 'bankbook'])->name('bankbook');
Route::get('/profit&loss/reports', [ReportsController::class, 'profit_loss'])->name('profit_loss');
Route::get('/balance_sheet/reports', [ReportsController::class, 'balance_sheet'])->name('balance_sheet');







