<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowUnitCategory;
use Modules\CashFlow\Entities\CashFlowUnitSubCategory;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use DataTables;

class CashFlowUnitCategoriesController extends AdminBaseController
{


    public function index()
    {
        return view('cashflow::admin.cashflow_units_categories.index');
    }

    public function indexDatatable(Request $request)
    {
       $list = CashFlowUnitCategory::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }



    public function store(Request $request)
    {
        $data = $request->all();
        $CashFlowUnitCategory = CashFlowUnitCategory::create($data);
        Alert::success('Mensaje existoso', 'Categoria Creada');
        return redirect()->route('admin.cashflow.units.categories.index');
    }


    public function show(Request $request,$uuid)
    {
        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $uuid)->first();
        return response()->json($CashFlowUnitCategory);
    }


    public function edit(Request $request,$uuid)
    {
        if (!$request->ajax()) {
            abort(403);
        }

        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $uuid)->first();
        return response()->json($CashFlowUnitCategory);
    }




    public function update(Request $request)
    {
        $data = $request->all();
        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $data['uuid'])->first();

        //validamos que sea inmutable con isPredefined()
        $redirect = $this->isPredefined($CashFlowUnitCategory);
        if ($redirect) {
            return redirect()->route('admin.cashflow.units.categories.index');
        }

        $CashFlowUnitCategory->update($data);
        Alert::success('Mensaje existoso', 'Categoria Actualizada');
        return redirect()->route('admin.cashflow.units.categories.index');
    }



    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $uuid)->first();

        //validamos que sea inmutable con isPredefined()
        $redirect = $this->isPredefined($CashFlowUnitCategory);
        if ($redirect) {
            return redirect()->route('admin.cashflow.units.categories.index');
        }

        $cashflows = $CashFlowUnitCategory->cashflow->first();
        if($cashflows){
            Alert::error('Error', 'No se puede eliminar el registro, tiene movimientos asociados');
            return redirect()->route('admin.cashflow.units.categories.index');
        }

        $CashFlowUnitCategory->delete();

        Alert::success('Mensaje existoso', 'Categoria Eliminada');
        return redirect()->route('admin.cashflow.units.categories.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $CashFlowUnitCategories = CashFlowUnitCategory::whereIn('uuid', $uuidsArray)->get();



        foreach ($CashFlowUnitCategories as $UnitCategory) {

                 //validamos que sea inmutable con isPredefined()
                $redirect = $this->isPredefined($UnitCategory);
                if ($redirect) {
                    return redirect()->route('admin.cashflow.units.categories.index');
                }

                $cashflows = $UnitCategory->cashflow->first();
                if($cashflows){
                    Alert::error('Error', 'No se puede eliminar el registro, tiene movimientos asociados');
                    return redirect()->route('admin.cashflow.units.categories.index');
                }

                //eliminar las subcategorias
                $subCategories = $UnitCategory->subcategories;
                foreach ($subCategories as $subCategory) {
                    $subCategory->delete();
                }
                $UnitCategory->delete();
        }

        Alert::success('Mensaje existoso', 'Categorias Eliminadas');
        return redirect()->route('admin.cashflow.units.categories.index');

    }


    //getUnits
    public function getUnits(Request $request,$uuid)
    {

        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $uuid)->first();
        $units = $CashFlowUnitCategory->units;
        return response()->json($units);
    }

    //getSubCategories
    public function getSubCategories(Request $request,$uuid)
    {
        $CashFlowUnitCategory = CashFlowUnitCategory::where('uuid', $uuid)->first();
        $subCategories = $CashFlowUnitCategory->subcategories;
        return response()->json($subCategories);
    }



    function isPredefined($CashFlowUnitCategory)
    {
        if($CashFlowUnitCategory->is_predefined == 1){
            Alert::error('Error', 'esta es una categoria por defecto del sistema , no se puede modificar');
            return true;
        }
        return false;
    }

}
