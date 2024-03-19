<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use Auth;
use DataTables;
use Carbon\Carbon;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CashFlow\Entities\CashFlow;
use Modules\CashFlow\Entities\CashFlowUnit;
use Illuminate\Contracts\Support\Renderable;
use Modules\CashFlow\Entities\CashFlowSector;
use Modules\CashFlow\Entities\CashFlowCategory;
use Modules\CashFlow\Entities\CashFlowSubSector;
use Modules\CashFlow\Entities\CashFlowSubCategory;
use Modules\CashFlow\Entities\CashFlowUnitCategory;
use Modules\CashFlow\Entities\CashFlowUnitSubCategory;

use App\Http\Controllers\AdminBaseController;

Use Alert;

class CashFlowReportsController extends AdminBaseController
{


    public function index() {

        $totalIngresos = CashFlow::where('type', 'income')->sum('amount');
        $totalEgresos = CashFlow::where('type', 'expense')->sum('amount');
        $gananciasTotales = $totalIngresos - $totalEgresos;


       //return view
         return view('cashflow::admin.reports.index', compact('totalIngresos', 'totalEgresos', 'gananciasTotales'));
    }



}
