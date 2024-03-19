<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use Illuminate\Support\Str as Str;


use jeremykenedy\LaravelRoles\Models\Role;
use jeremykenedy\LaravelRoles\Models\Permission;

//request
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;



use App\Models\User;

use Illuminate\Support\Facades\Redirect;
use Auth;
Use Alert;
use DataTables;

// Traits
use App\Traits\Imagen;

//AdminBaseController
use App\Http\Controllers\AdminBaseController;

class UserController extends AdminBaseController
{
    use Imagen;

    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {

        return view('admin.user.user.index');
    }


    public function listUserDatatable(Request $request)
    {

       $list = User::where('email','!=',"superadmin@sharkestudio.com")->orderBy('created_at','desc')->get();

       return Datatables::of($list)->make(true);
    }


    public function passwordGenerate(Request $request)
    {
       $password = str_random(5);
       return response($password);

    }


    public function store(UserStoreRequest $request)
    {


        $data['confirmation_code'] = str_random(25);
        $data['password'] = $request['password'];

        $user = new User;
        $user->name =   $request['name'];
        $user->lastname =   $request['lastname'];
        $user->password =   bcrypt($request['password']);
        $user->re_password =   bcrypt($request['password_confirmation']);
        $user->lote =   $request['lote'];
        $user->email =   $request['email'];
        $user->confirmation_code =   $data['confirmation_code'];
        $user->save();

        //  $this->ImagenCreate($request, $user);

        //  $data['email'] = $user->email;
        //  $data['nombre'] = $user->nombre;
        //  $data['apellido'] = $user->apellido;

        // // Send confirmation code
        // Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
        //     $message->to($data['email'], $data['nombre'],$data['apellido'])
        //     ->subject('Por favor confirma tu correo.');
        // });

            Alert::success('Mensaje existoso', 'Usuario Creado');
            return redirect()->route('user');


    }




   public function edit(Request $request,$user)
    {
      if ($request->ajax()) {
            //datos de facturacion
          //  $facturacion = $usuario->facturacion->first();
            //mandamos los roles del usuario
            $user = User::where("uuid","=",$user)->first();
            //roles del usuario
            $userRoles = $user->getRoles();
            // all roles
            $roles = Role::all();
            return response([$user,$roles,$userRoles]);

       }
    }




    public function update(UserUpdateRequest $request)
    {


        $user=User::where('uuid','=',$request['uuid_user'])->first();

        // if(!empty($request['password'])){
        // $user->password=bcrypt($request['password']);
        // $user->re_password=$request['password_confirmation'];
        // }

        $email = User::where('email','=',$request['email'])->first();

        //strtolower trae todo en minusculas
        // if($email == null or  $user->uuid == $email->uuid){
        //     $user->email = $request['email'];
        // }else{
        //     Alert::error('Ups!!', 'El email ya se encuenta registrado');
        //     return redirect()->route('user');
        // }


        $user->name =$request['name'];
        $user->lastname =$request['lastname'];
        $user->lote =   $request['lote'];

        //$this->ImagenUpdate($request, $user);

       $user->save();


        //le manda un mensaje al usuario
       Alert::success('Mensaje existoso', 'Modificadooo');
       return redirect()->route('user');

    }


    public function destroy(Request $request)
    {
        $user=User::where('uuid','=',$request['uuid_user'])->first();
        $user->delete();
        //le manda un mensaje al usuario
        Alert::success('Mensaje existoso', 'Eliminado');
        return redirect()->route('user');
    }






/*-------------------------ASIGNACIONES DE ROLES A USUARIOS ------------------------*/

public function userAssingRol(Request $request,$uuid,$rol){


    if ($request->ajax()) {
        $user=User::where('uuid','=',$uuid)->first();
        $role = Role::where('id','=',$rol)->first();
        $user->attachRole($role);

        //refrescamos la busqueda del user
        $user=User::where('uuid','=',$uuid)->first();
        $rolesasignados=$user->getRoles();
        return response ([$rolesasignados]);
    }
}


public function useDeleteRol(Request $request,$uuid,$rol){

    if ($request->ajax()) {
        $user=User::where('uuid','=',$uuid)->first();
        $role = Role::where('id','=',$rol)->first();
        $user->detachRole($role);

        //refrescamos la busqueda del user
        $user=User::where('uuid','=',$uuid)->first();
        $rolesasignados=$user->getRoles();
        return response ([$rolesasignados]);
    }
}





}
