<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GstBillController;
use App\Http\Controllers\VendorInvoiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AIInsightController;

Route::get('/generate-ai-insight', [AIInsightController::class, 'generateInsight'])->name('ai.insight');


// Party Routes
Route::get('/add-party', [PartyController::class, 'addParty'])->name('add-party');
// Party Routes for save date in database
Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');

Route::get('/manage-parties', [PartyController::class, 'manageParties'])->name('manage-parties');
Route::get('/edit-party/{id}', [PartyController::class, 'editParty'])->name('edit-party');
Route::put('/update-party/{id}', [PartyController::class, 'updateParty'])->name('update-party');


// GST Bill Routes
Route::get('/add-gst-bill', [GstBillController::class, 'addGstBill'])->name('add-gst-bill');
Route::get('/manage-gst-bills', [GstBillController::class, 'manageGstBills'])->name('manage-gst-bills');
Route::get('/print-gst-bill/{party_id}', [GstBillController::class, 'printGstBill'])->name('print-gst-bill');
Route::post('/create-gst-bill', [GstBillController::class, 'createGstBill'])->name('create-gst-bill');

// Resource Controller Routes
Route::resource('/vendor-invoice', VendorInvoiceController::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/user-profile', UserController::class);


Route::get('/{any}', function () {
    return response()->view('errors.page-not-found', [], 404);
})->where('any', '.*');


