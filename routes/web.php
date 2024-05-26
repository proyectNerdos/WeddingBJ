<?php
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRolesController;
use App\Http\Controllers\User\UserPermissionsController;
use App\Http\Controllers\User\UserSettingController;



//auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

//admin
use App\Http\Controllers\Admin\ComandosController;
use Illuminate\Support\Facades\Broadcast;

//Webcontent
use App\Http\Controllers\CashFlowSectorsController;
use App\Http\Controllers\CashFlowSubSectorsController;
use App\Http\Controllers\CashFlowCategoriesController;
use App\Http\Controllers\CashFlowSubCategoriesController;
use App\Http\Controllers\CashFlowsController;
use App\Http\Controllers\CashFlowUnitsController;
use App\Http\Controllers\CashFlowUnitDetailsController;
use App\Http\Controllers\CashFlowUnitCategoriesController;

//use clienteController
use App\Http\Controllers\Admin\Clients\ClientsController;


//use EmployeesController
use App\Http\Controllers\Admin\Employees\EmployeesController;
use App\Http\Controllers\ProductBrandsController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductCategorySubsController;
use App\Http\Controllers\ProductComboProductsController;
use App\Http\Controllers\ProductCombosController;
use App\Http\Controllers\ProductDollarsController;
use App\Http\Controllers\ProductImagesController;
use App\Http\Controllers\ProductOffersController;
use App\Http\Controllers\ProductProductTagsController;
use App\Http\Controllers\ProductReviewsController;
use App\Http\Controllers\ProductSettingsController;
use App\Http\Controllers\ProductSuppliersController;
use App\Http\Controllers\ProductTagsController;
use App\Http\Controllers\ProductTaxesController;
use App\Http\Controllers\ProductUnitsOfMeasuresController;
use App\Http\Controllers\ProductsController;

use Laravel\Socialite\Facades\Socialite;
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

//use publicController
use App\Http\Controllers\Front\PublicController;


Route::get('/', function () {
    return view('webcontent::website.casamiento.layouts.index');
})->name('home');


//nueva urll para cargar imagen por qr de los invitados
Route::get('qr', [PublicController::class, 'qr'])->name('qr');


Route::get('/galeria', [GalleryController::class, 'index'])->name('galeria');

// Route::get('/galeria', 'GalleryController@index')->name('galeria');

// Route::get('/galeria', function () {
//     return view('webcontent::website.casamiento.layouts.gallery');
// })->name('galeria');


Route::post('/upload', 'App\Http\Controllers\ImageUploadController@store');


Route::post('/asistencia', [App\Http\Controllers\AsistenciaController::class, 'store']);


Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();

    // $user->token
});

Route::get('/playground', function () {
    $data = ['message' => 'hello'];
    Broadcast::channel('public', function () use ($data) {
        event(new \App\Events\playgroundEvent($data));
    });
    return "ok new";
});





//routa para los comandos
Route::get('comandos', [ComandosController::class, 'index'])->name('comandos');
Route::get('comandos-work', [ComandosController::class, 'work'])->name('comandos.work');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




// Route::group(['middleware' => ['role:admin']], function () {
//     Route::get('test/create', [UserController::class, 'create']);
// });








//group auth
Route::group(['middleware' => ['auth']], function () {



    /*-----------------------------------usuarios --------------------------------------------------*/
    /*==============================USUARIOS===================================*/
    Route::get('user', [UserController::class, 'index'])->name('user')->middleware('permission:user-view');
    Route::get('user-list-datatable', [UserController::class, 'listUserDatatable'])->middleware('permission:user-view');
    Route::get('user-password-generate', [UserController::class, 'passwordGenerate'])->name('user.password.generate')->middleware('permission:user-view');
    Route::get('user-create', [UserController::class, 'create'])->name('user.create')->middleware('permission:user-create');
    Route::get('user-edit/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:user-create');
    Route::post('user-store', [UserController::class, 'store'])->name('user.store')->middleware('permission:user-create');
    Route::put('user-update', [UserController::class, 'update'])->name('user.update')->middleware('permission:user-edit');
    Route::delete('user-destroy', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:user-delete');


    Route::post('usuario-destroy-selected','User\UserController@destroySelected')
    ->name('usuario.destroy.selected')
    ->middleware('permission:user-delete');

    //ASIGNACIONES DE ROLES A USUARIOS
    Route::get('user-assign-rol/{user}/{rol}', [UserController::class, 'userAssingRol'])->name('user.assign.rol');
    Route::get('user-delete-rol/{user}/{rol}', [UserController::class, 'useDeleteRol'])->name('user.delete.rol');
    /*==============================USUARIOS===================================*/




    /*==============================ROLES===================================*/

    Route::get('user-roles', [UserRolesController::class, 'index'])->name('user.roles');
    Route::get('user-roles-list-datatable', [UserRolesController::class, 'listRolesDatatable']);
    Route::get('user-roles-edit/{uuid}', [UserRolesController::class, 'edit'])->name('user.roles.edit');
    Route::post('user-roles-store', [UserRolesController::class, 'store'])->name('user.roles.store');
    Route::put('user-roles-update/{uuid}', [UserRolesController::class, 'update'])->name('user.roles.update');
    Route::delete('user-roles-destroy', [UserRolesController::class, 'destroy'])->name('user.roles.destroy');

    //asigna un permiso a un rol
    Route::get('usuario-rol-permiso/{idrol}', 'Usuario\UsuariosRolesController@rolPermiso')
    ->name('usuario.permisos.asignar.permiso.rol')
    ->middleware('permission:usuario-roles-editar');

    Route::get('usuario-rol-asignar-permiso/', 'Usuario\UsuariosRolesController@rolAsignarPermiso')
    ->name('usuario.rol.asignar.permiso')
    ->middleware('permission:usuario-roles-editar');

    Route::get('usuario-rol-asignar-all-permiso/', 'Usuario\UsuariosRolesController@rolAsignarAllPermiso')
    ->name('usuario.rol.asignar.all.permiso')
    ->middleware('permission:usuario-roles-editar');

    Route::get('usuario-rol-quitar-permiso/{idrol}/{idper}', 'Usuario\UsuariosRolesController@rolQuitarPermiso')
    ->name('usuario.rol.quitar.permiso')
    ->middleware('permission:usuario-roles-editar');
    /*==============================ROLES===================================*/




    /*==============================PERMISOS===================================*/
    Route::get('user-permissions', [UserPermissionsController::class, 'index'])->name('user.permissions');
    Route::get('user-permissions-list-datatable', [UserPermissionsController::class, 'listPermissionsDatatable']);
    Route::post('user-permissions-store', [UserPermissionsController::class, 'store'])->name('user.permissions.store');
    Route::put('user-permissions-update', [UserPermissionsController::class, 'update'])->name('user.permissions.update');
    Route::delete('user-permissions-destroy', [UserPermissionsController::class, 'destroy'])->name('user.permissions.destroy');
    /*==============================PERMISOS===================================*/
    /*-----------------------------------Usuarios ------------------------------------------------*/






    /*==============================Setting Perfil USUARIOS===================================*/
    Route::get('user-setting', [UserSettingController::class, 'index'])->name('user.setting.index');
    // Route::get('user-list-datatable', [UserController::class, 'listUserDatatable']);
    // Route::get('user-password-generate', [UserController::class, 'passwordGenerate'])->name('user.password.generate');
    Route::get('user-create', [UserSettingController::class, 'create'])->name('user.setting.create');
    //cambio de password
    Route::put('user-change-password/{user}', [UserSettingController::class, 'changePassword'])->name('user.setting.change.password');
    //cambio de foto
    Route::put('user-change-photo', [UserSettingController::class, 'changePhoto'])->name('user.setting.change.photo');
    //eliminar foto
    Route::delete('user-delete-photo', [UserSettingController::class, 'deletePhoto'])->name('user.setting.delete.photo');
    //cambiar info
    Route::put('user-change-info/{user}', [UserSettingController::class, 'changeInfo'])->name('user.setting.change.info');

    Route::get('user-perfil-edit/{user}', [UserSettingController::class, 'edit'])->name('user.setting.edit');
    Route::post('user-perfil-store', [UserSettingController::class, 'store'])->name('user.setting.store');
    Route::put('user-perfil-update', [UserSettingController::class, 'update'])->name('user.setting.update');
    Route::delete('user-perfil-destroy', [UserSettingController::class, 'destroy'])->name('user.setting.destroy');
    /*==============================Setting Perfil USUARIOS===================================*/


    //empleados
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
        Route::group(['prefix' => 'employees'], function () {
            Route::get('/', [EmployeesController::class, 'index'])->name('employee.index');
            Route::get('/list', [EmployeesController::class, 'indexDatatable'])->name('employee.indexDatatable');
            Route::get('/create', [EmployeesController::class, 'create'])->name('employee.create');
            Route::get('/show/{employee}', [EmployeesController::class, 'show'])->name('employee.show')->where('id', '[0-9]+');
            Route::get('/edit/{employee}', [EmployeesController::class, 'edit'])->name('employee.edit')->where('id', '[0-9]+');
            Route::post('/store', [EmployeesController::class, 'store'])->name('employee.store');
            Route::put('/update', [EmployeesController::class, 'update'])->name('employee.update')->where('id', '[0-9]+');
            Route::delete('/destroy', [EmployeesController::class, 'destroy'])->name('employee.destroy')->where('id', '[0-9]+');
            Route::delete('/massDestroy', [EmployeesController::class, 'massDestroy'])->name('employee.massDestroy')->where('id', '[0-9]+');
        });
    });

     //clientes
     Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
        Route::group(['prefix' => 'client'], function () {
            Route::get('/', [ClientsController::class, 'index'])->name('client.index');
            Route::get('/list', [ClientsController::class, 'indexDatatable'])->name('client.indexDatatable');
            Route::get('/create', [ClientsController::class, 'create'])->name('client.create');
            Route::get('/show/{client}', [ClientsController::class, 'show'])->name('client.show')->where('id', '[0-9]+');
            Route::get('/edit/{client}', [ClientsController::class, 'edit'])->name('client.edit')->where('id', '[0-9]+');
            Route::post('/store', [ClientsController::class, 'store'])->name('client.store');
            Route::put('/update', [ClientsController::class, 'update'])->name('client.update')->where('id', '[0-9]+');
            Route::delete('/destroy', [ClientsController::class, 'destroy'])->name('client.destroy')->where('id', '[0-9]+');
            Route::delete('/massDestroy', [ClientsController::class, 'massDestroy'])->name('client.massDestroy')->where('id', '[0-9]+');
        });
    });


});


