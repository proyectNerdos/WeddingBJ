<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;

// use jeremykenedy\LaravelRoles\Models\Role;
// use jeremykenedy\LaravelRoles\Models\Permission;
use jeremykenedy\LaravelRoles\Traits\RolesAndPermissionsHelpersTrait;

//request
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

//models
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

use Uuid;
use Auth;
use Illuminate\Support\Facades\Redirect;
Use Alert;
use Yajra\DataTables\Facades\DataTables;
use Route;

// Traits
use App\Traits\Imagen;

//AdminBaseController
use App\Http\Controllers\AdminBaseController;

class UserRolesController extends AdminBaseController
{
    use RolesAndPermissionsHelpersTrait;

    public function __construct()
    {
        parent::__construct();
    }



    /*-------------------------ROLES------------------------*/

    public function index(Request $request){
        return view("admin.user.roles.index");
    }

    public function listRolesDatatable(Request $request)
    {           
       $list = Role::all();
       return Datatables::of($list)->make(true);
    }



    public function store(Request $request){
       $rol = new Role;
       $rol->uuid = (string) Uuid::generate(4);
       $rol->name=$request['name'];
       $rol->slug=Str::slug($request['name']);
       $rol->description=$request['description'];
       $rol->save();
       Alert::success('Mensaje existoso', 'Rol Creado');
       return redirect()->route('user.roles');
       
    }



   public function edit(Request $request,$uuid)
   {       
         $Permissions = Permission::all();
         $roles = Role::where("uuid","=",$uuid)->first();
         $rolesPermissions = collect();
         $newCollection = collect();

         
         foreach ($roles->permissions()->get() as $rolPermission){
                  $rolPermission->active = "yes";
                  $rolesPermissions->push($rolPermission);
         }

         foreach ($roles->permissions()->get() as $rolPermission){
            foreach ($Permissions as $key => $Permission){
               if ($rolPermission->slug == $Permission->slug){
                  $Permissions->pull( $key );
               }
            }
         }

         $Permissions = $rolesPermissions->concat($Permissions);
         $Permissions = $Permissions->sortBy('id')->groupBy('module');
        


        return view("admin.user.roles.edit",compact('roles','Permissions'));
   }



    public function update(Request $request,$uuid){
         $role = Role::where('uuid','=',$uuid)->first();
         $role->name = $request['name'];
         $role->slug = Str::slug($request['name']);
         $role->description = $request['description'];
         $role->save();

         //asignamos los permisos al rol
         $this->assignPermissionToRole($request,$role);

        Alert::success('Mensaje existoso', 'Rol Modificado');
        return redirect()->route('user.roles');
    }


    public function destroy(Request $request)
    {
        $role = Role::where('uuid','=',$request['uuid_roles'])->first();
        $users = User::all();
       //eliminamos las relaciones roles user
        foreach ($users as $key => $user) {
           $user->detachRole($role->id);
        }
        //eliminamos las relaciones roles permisos

        //eliminamos el rol
        $role->delete();
        Alert::success('Mensaje existoso', 'Rol Eliminado');
        return redirect::back();
    }





    

/*-------------------------ASIGNACIONES DE PERMISOS A ROLES ------------------------*/

public function rolPermiso(Request $request,$idrol){
    //si es una peticion ajax
    $todosLosPermisos = permission::all();

    foreach ($todosLosPermisos as $key => $permiso) {
    $ModuloPermisos[$permiso->name] = permission::where('name','=',$permiso->name)->get();
    }

    $role = Role::find($idrol);
    
    return view("admin.usuario.roles.asignar-permisos-a-roles",compact('todosLosPermisos','role','ModuloPermisos'));
}


   public function assignPermissionToRole($request,$role){
       //eliminamos todos los permisos de ese rol  
       $role->detachAllPermissions();
      //asignamos de nuevo los permisos al rol
         $permissions = Permission::all();
         foreach ($permissions as $key => $permission) {
            $slug = $permission->slug; // productos-create
            if(isset($request[$slug]) and $request[$slug] == "on"){
               //asignamos el permiso al rol
               $role->attachPermission($permission->id);
               //creamos el uuid para ese permiso
            }
         }    
   }


public function rolAsignarAllPermiso(Request $request){
            
             $rolid = $request['idrol'];
             $Permisos = Permission::all();
             foreach ($Permisos as $Permiso) {
                $rol=Role::find($rolid);
                $rol->assignPermission($Permiso->id);
                $rol->save();
             }
             
             return redirect::back();
            
}


public function rolQuitarPermiso(Request $request,$idrole,$idper){ 

            $role = Role::find($idrole);
            $role->revokePermission($idper);
            $role->save();
            return "ok";
        
}


}
