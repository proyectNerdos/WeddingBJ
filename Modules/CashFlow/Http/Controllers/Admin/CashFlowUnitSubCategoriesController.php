<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowUnitCategory;
use Modules\CashFlow\Entities\CashFlowUnitSubCategory;
use Illuminate\Http\Request;
use Exception;

use Auth;
Use Alert;
use DataTables;

use App\Http\Controllers\AdminBaseController;

class CashFlowUnitSubCategoriesController extends AdminBaseController
{


    public function indexDatatable(Request $request)
    {
       $list = CashFlowUnitSubCategory::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        //capturamos el id de la Sector padre
        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $data['uuid_category'])->first();

        $CashFlowUnitSubCategory = new CashFlowUnitSubCategory();
        $CashFlowUnitSubCategory->name = $data['name'];
        $CashFlowUnitSubCategory->description = $data['description'];
        $CashFlowUnitSubCategory->unit_category_id = $CashFlowUnitCategory->id;
        $CashFlowUnitSubCategory->save();

        Alert::success('Mensaje existoso', 'SubCategoria Creada');
        return redirect()->route('admin.cashflow.units.categories.index');
    }

    public function show(Request $request,$uuid)
    {
        $CashFlowUnitSubCategory = CashFlowUnitSubCategory::where('uuid', $uuid)->first();
        return response()->json($CashFlowUnitSubCategory);
    }


    public function edit(Request $request,$uuid)
    {

        if (!$request->ajax()) {
            abort(403);
        }

        $CashFlowUnitSubCategory = CashFlowUnitSubCategory::where('uuid', $uuid)->first();
        return response()->json($CashFlowUnitSubCategory);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $CashFlowUnitSubCategory = CashFlowUnitSubCategory::where('uuid', $data['uuid'])->first();
        $CashFlowUnitSubCategory->update($data);
        Alert::success('Mensaje existoso', 'SubCategoria Actualizada');
        return redirect()->route('admin.cashflow.units.categories.index');
    }


    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $CashFlowUnitSubCategory = CashFlowUnitSubCategory::where('uuid', $uuid)->first();

        $cashflows = $CashFlowUnitSubCategory->cashflow->first();
        if($cashflows){
            Alert::error('Error', 'No se puede eliminar el registro, tiene movimientos asociados');
            return redirect()->route('admin.cashflow.units.categories.index');
        }

        $CashFlowUnitSubCategory->delete();

        Alert::success('Mensaje existoso', 'SubCategoria Eliminada');
        return redirect()->route('admin.cashflow.units.categories.index');
    }


}
