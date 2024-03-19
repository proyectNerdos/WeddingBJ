<?php

use Modules\CashFlow\Http\Controllers\Admin\CashFlowSectorsController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowSubSectorsController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowCategoriesController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowSubCategoriesController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowUnitsController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowUnitDetailsController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowUnitCategoriesController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowUnitSubCategoriesController;
use Modules\CashFlow\Http\Controllers\Admin\CashFlowReportsController;
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


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::group(['prefix' => 'cashflow-sectors',], function () {
        Route::get('/', [CashFlowSectorsController::class, 'index'])->name('cashflow.sectors.index');
        Route::get('/list', [CashFlowSectorsController::class, 'indexDatatable'])->name('cashflow.sectors.indexDatatable');
        Route::get('/create', [CashFlowSectorsController::class, 'create'])->name('cashflow.sectors.create');
        Route::get('/show/{cashFlowSector}', [CashFlowSectorsController::class, 'show'])->name('cashflow.sectors.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowSector}', [CashFlowSectorsController::class, 'edit'])->name('cashflow.sectors.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowSectorsController::class, 'store'])->name('cashflow.sectors.store');
        Route::put('/update', [CashFlowSectorsController::class, 'update'])->name('cashflow.sectors.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowSectorsController::class, 'destroy'])->name('cashflow.sectors.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowSectorsController::class, 'massDestroy'])->name('cashflow.sectors.massDestroy')->where('id', '[0-9]+');

        //funciones relacionadas
        //ruta para traer las subsectores relacionadas a un sector
        Route::get('/getSubSectors/{cashFlowSector}', [CashFlowSectorsController::class, 'getSubSectors'])->name('cashflow.sectors.getSubSectors')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'cashflow-subsectors',], function () {
        Route::get('/', [CashFlowSubSectorsController::class, 'index'])->name('cashflow.subsector.index');
        Route::get('/create', [CashFlowSubSectorsController::class, 'create'])->name('cashflow.subsector.create');
        Route::get('/show/{cashFlowSubSector}', [CashFlowSubSectorsController::class, 'show'])->name('cashflow.subsector.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowSubSector}', [CashFlowSubSectorsController::class, 'edit'])->name('cashflow.subsector.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowSubSectorsController::class, 'store'])->name('cashflow.subsector.store');
        Route::put('update', [CashFlowSubSectorsController::class, 'update'])->name('cashflow.subsector.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowSubSectorsController::class, 'destroy'])->name('cashflow.subsector.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowSubSectorsController::class, 'massDestroy'])->name('cashflow.subsector.massDestroy')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'cashflow-categories',], function () {
        Route::get('/', [CashFlowCategoriesController::class, 'index'])->name('cashflow.categories.index');
        Route::get('/list', [CashFlowCategoriesController::class, 'indexDatatable'])->name('cashflow.categories.indexDatatable');
        Route::get('/create', [CashFlowCategoriesController::class, 'create'])->name('cashflow.categories.create');
        Route::get('/show/{cashFlowCategory}', [CashFlowCategoriesController::class, 'show'])->name('cashflow.categories.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowCategory}', [CashFlowCategoriesController::class, 'edit'])->name('cashflow.categories.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowCategoriesController::class, 'store'])->name('cashflow.categories.store');
        Route::put('/update', [CashFlowCategoriesController::class, 'update'])->name('cashflow.categories.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowCategoriesController::class, 'destroy'])->name('cashflow.categories.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowCategoriesController::class, 'massDestroy'])->name('cashflow.categories.massDestroy')->where('id', '[0-9]+');

        //funciones relacionadas
        //ruta para traer las subcategorias relacionadas a una categoria
        Route::get('/getSubCategories/{cashFlowCategory}', [CashFlowCategoriesController::class, 'getSubCategories'])->name('cashflow.categories.getSubCategories')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'cashflow-subcategories',], function () {
        Route::get('/', [CashFlowSubCategoriesController::class, 'index'])->name('cashflow.subcategories.index');
        Route::get('/list', [CashFlowSubCategoriesController::class, 'indexDatatable'])->name('cashflow.subcategories.indexDatatable');
        Route::get('/create', [CashFlowSubCategoriesController::class, 'create'])->name('cashflow.subcategories.create');
        Route::get('/show/{cashFlowSubCategory}', [CashFlowSubCategoriesController::class, 'show'])->name('cashflow.subcategories.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowSubCategory}', [CashFlowSubCategoriesController::class, 'edit'])->name('cashflow.subcategories.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowSubCategoriesController::class, 'store'])->name('cashflow.subcategories.store');
        Route::put('/update', [CashFlowSubCategoriesController::class, 'update'])->name('cashflow.subcategories.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowSubCategoriesController::class, 'destroy'])->name('cashflow.subcategories.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowSubCategoriesController::class, 'massDestroy'])->name('cashflow.subcategories.massDestroy')->where('id', '[0-9]+');

        // Si necesitas rutas adicionales para funciones específicas de subcategorías, puedes añadirlas aquí.
    });

    Route::group(['prefix' => 'cashflow-units',], function () {
        Route::get('/', [CashFlowUnitsController::class, 'index'])->name('cashflow.units.index');
        Route::get('/list', [CashFlowUnitsController::class, 'indexDatatable'])->name('cashflow.units.indexDatatable');
        Route::get('/create', [CashFlowUnitsController::class, 'create'])->name('cashflow.units.create');
        Route::get('/show/{cashFlowUnit}', [CashFlowUnitsController::class, 'show'])->name('cashflow.units.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowUnit}', [CashFlowUnitsController::class, 'edit'])->name('cashflow.units.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowUnitsController::class, 'store'])->name('cashflow.units.store');
        Route::put('/update', [CashFlowUnitsController::class, 'update'])->name('cashflow.units.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowUnitsController::class, 'destroy'])->name('cashflow.units.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowUnitsController::class, 'massDestroy'])->name('cashflow.units.massDestroy')->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'cashflow-unit-categories',], function () {
        Route::get('/', [CashFlowUnitCategoriesController::class, 'index'])->name('cashflow.units.categories.index');
        Route::get('/list', [CashFlowUnitCategoriesController::class, 'indexDatatable'])->name('cashflow.units.categories.indexDatatable');
        Route::get('/create', [CashFlowUnitCategoriesController::class, 'create'])->name('cashflow.units.categories.create');
        Route::get('/show/{cashFlowUnitCategory}', [CashFlowUnitCategoriesController::class, 'show'])->name('cashflow.units.categories.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowUnitCategory}', [CashFlowUnitCategoriesController::class, 'edit'])->name('cashflow.units.categories.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowUnitCategoriesController::class, 'store'])->name('cashflow.units.categories.store');
        Route::put('/update', [CashFlowUnitCategoriesController::class, 'update'])->name('cashflow.units.categories.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowUnitCategoriesController::class, 'destroy'])->name('cashflow.units.categories.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowUnitCategoriesController::class, 'massDestroy'])->name('cashflow.units.categories.massDestroy')->where('id', '[0-9]+');
        //funciones relacionadas
        //ruta para traer las subcategorias relacionadas a una categoria
        Route::get('/getSubCategories/{cashFlowUnitCategory}', [CashFlowUnitCategoriesController::class, 'getSubCategories'])->name('cashflow.units.categories.getSubCategories')->where('id', '[0-9]+');

        //get units
        Route::get('/getUnits/{cashFlowUnitCategory}', [CashFlowUnitCategoriesController::class, 'getUnits'])->name('cashflow.units.categories.getUnits')->where('id', '[0-9]+');

    });

    Route::group(['prefix' => 'cashflow-unit-subcategories',], function () {
        Route::get('/', [CashFlowUnitSubCategoriesController::class, 'index'])->name('cashflow.units.subcategories.index');
        Route::get('/create', [CashFlowUnitSubCategoriesController::class, 'create'])->name('cashflow.units.subcategories.create');
        Route::get('/show/{cashFlowUnitSubCategory}', [CashFlowUnitSubCategoriesController::class, 'show'])->name('cashflow.units.subcategories.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlowUnitSubCategory}', [CashFlowUnitSubCategoriesController::class, 'edit'])->name('cashflow.units.subcategories.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowUnitSubCategoriesController::class, 'store'])->name('cashflow.units.subcategories.store');
        Route::put('/update', [CashFlowUnitSubCategoriesController::class, 'update'])->name('cashflow.units.subcategories.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowUnitSubCategoriesController::class, 'destroy'])->name('cashflow.units.subcategories.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowUnitSubCategoriesController::class, 'massDestroy'])->name('cashflow.units.subcategories.massDestroy')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'cashflow',], function () {
        Route::get('/', [CashFlowController::class, 'index'])->name('cashflow.index');
        Route::get('/list', [CashFlowController::class, 'indexDatatable'])->name('cashflow.indexDatatable');
        Route::get('/list-search', [CashFlowController::class, 'searchDatatable'])->name('cashflow.searchDatatable');
        Route::get('/create', [CashFlowController::class, 'create'])->name('cashflow.create');
        Route::get('/show/{cashFlow}', [CashFlowController::class, 'show'])->name('cashflow.show')->where('id', '[0-9]+');
        Route::get('/edit/{cashFlow}', [CashFlowController::class, 'edit'])->name('cashflow.edit')->where('id', '[0-9]+');
        Route::post('/store', [CashFlowController::class, 'store'])->name('cashflow.store');
        Route::put('/update/{cashFlow}', [CashFlowController::class, 'update'])->name('cashflow.update')->where('id', '[0-9]+');
        Route::delete('/destroy', [CashFlowController::class, 'destroy'])->name('cashflow.destroy')->where('id', '[0-9]+');
        Route::delete('/massDestroy', [CashFlowController::class, 'massDestroy'])->name('cashflow.massDestroy')->where('id', '[0-9]+');
        //report
        Route::get('/search-report', [CashFlowController::class, 'searchReport'])->name('cashflow.search.report');
    });

    Route::group(['prefix' => 'cashflow-reports',], function () {
        Route::get('/', [CashFlowReportsController::class, 'index'])->name('cashflow.reports.index');
    });


});
