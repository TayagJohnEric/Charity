<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
})->name('landing.page');


Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/view-donors', [AdminController::class, 'viewDonors'])->name('admin.viewDonors');
Route::get('/admin/manage-campaigns', [AdminController::class, 'manageCampaigns'])->name('admin.manageCampaigns');
Route::get('/admin/donation-history', [AdminController::class, 'donationHistory'])->name('admin.donationHistory');
Route::get('/admin/generate-report', [AdminController::class, 'generateReport'])->name('admin.generateReport');
Route::get('/admin/add-donor', [AdminController::class, 'addDonor'])->name('admin.addDonor');
Route::get('/admin/add-campaign', [AdminController::class, 'addCampaign'])->name('admin.addCampaign');
Route::get('/admin/filter-donations', [AdminController::class, 'filterDonations'])->name('admin.filterDonations');
Route::get('/admin/export-donations', [AdminController::class, 'exportDonations'])->name('admin.exportDonations');




Route::post('/donors', [DonorController::class, 'store'])->name('donors.store');
Route::get('/donors/{donor}', [DonorController::class, 'view'])->name('donors.view');
Route::get('/donors/{donor}/edit', [DonorController::class, 'edit'])->name('donors.edit');
Route::put('/donors/{id}', [DonorController::class, 'update'])->name('donors.update');
Route::delete('/donors/{donor}', [DonorController::class, 'destroy'])->name('donors.destroy');


Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
Route::get('/campaigns/{campaign}', [CampaignController::class, 'view'])->name('campaign.view');
Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaign.destroy');

Route::get('/donations/create', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations', [DonationController::class, 'store'])->name('donations.store');