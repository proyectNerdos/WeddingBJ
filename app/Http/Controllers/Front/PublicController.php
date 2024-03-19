<?php

namespace App\Http\Controllers\Front;

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

class PublicController extends AdminBaseController
{
    use Imagen;

    public function __construct()
    {
        parent::__construct();
    }



    public function index()
    {

        return view('website.hermed.home');
    }


}



