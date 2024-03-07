<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gt_manager\AdminProfile\AdminController;
use App\Http\Controllers\Gt_manager\carsSystem\CarBrandController;
use App\Http\Controllers\Gt_manager\AdminProfile\AdminProfileController;
use App\Http\Controllers\Gt_manager\carsSystem\CarBrandModelsController;


Route::middleware('admin')->group(function(){

    Route::get('manager', [AdminController::class, 'IndexPage'])
            ->name('index-page');

        // Admin user //
    Route::get('manager/profile', [AdminProfileController::class, 'AdminProfile'])
            ->name('admin-profile');
    Route::post('manager/profile/update', [AdminProfileController::class, 'AdminUpdateData'])
            ->name('admin-profile-update');
    Route::get('manager/admin-change-password', [AdminProfileController::class, 'AdminChangePassword'])
            ->name('admin-change-password');
    Route::post('manager/admin-change-password-update', [AdminProfileController::class, 'AdminPasswordUpdate'])
            ->name('admin-password-update');

        // Car Brands //
    Route::get('manager/stock-car-brands', [CarBrandController::class, 'AllCarBrands'])
            ->name('show-all-car-brands');
    Route::post('manager/store-car-brand', [CarBrandController::class, 'StoreCarBrand'])
            ->name('store-car-brand');
    Route::post('manager/update-car-brand', [CarBrandController::class, 'UpdateCarBrand'])
            ->name('update-car-brand');
    Route::delete('manager/delete-car-brand/{id}', [CarBrandController::class, 'DeleteCarBrand'])
            ->name('delete.brand');

        // Cars Models //
    Route::get('manager/brand-models/{id}', [CarBrandModelsController::class, 'AllBrandModels'])
            ->name('brand-models');
    Route::post('manager/{id}/store-brand-model', [CarBrandModelsController::class, 'StoreBrandModel'])
            ->name('store-brand-model');


    // Route::get('manager/brand-model/{id}', [CarBrandModelsController::class, 'UpdateBrandModel'])
    //         ->name('update-brand-model');
    // Route::get('manager/brand-model/{id}', [CarBrandModelsController::class, 'DeleteBrandModel'])
    //         ->name('delete-brand-model');

        // Stock Cars //
    Route::get('manager/all-stock-cars', [CarBrandModelsController::class, 'AllStockCars'])
            ->name('all-stock-cars');

































    Route::get('logout', [AdminController::class, 'logout'])
            ->name('admin-logout');

}); // END OF Guest Routes
