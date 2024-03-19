<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowUnit;
use Modules\CashFlow\Entities\CashFlowCategory;
use Modules\CashFlow\Entities\CashFlowUnitCategory;
use Illuminate\Http\Request;
use Exception;

use Auth;
Use Alert;
use DataTables;

use App\Http\Controllers\AdminBaseController;

class CashFlowUnitsController extends AdminBaseController
{

    public function index()
    {
        //mandamos unit categories con id 1 y 2
        $CashFlowUnitCategories = CashFlowUnitCategory::whereIn('id', [1,2])->get();
        return view('cashflow::admin.cashflow_units.index',compact('CashFlowUnitCategories'));
    }

    public function indexDatatable(Request $request)
    {
       $list = CashFlowUnit::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }


    public function store(Request $request)
    {

        $request = $request->all();

        // Crear un nuevo objeto Unit
        $unit = new CashFlowUnit();
        $unit->name = $request['name'];
        $unit->description = $request['description'];

        //cargamos la categoria
        $categoryId = (int)$request['category_id'];
        $unit->category_id = $categoryId;

        // Convertir atributos a JSON para almacenarlos en la base de datos
        $unit->attributes = json_encode($request['attributes']);

        // Guardar el objeto Unit
        $unit->save();

        Alert::success('Mensaje existoso', 'Categoria Creada');
        return redirect()->route('admin.cashflow.units.index');
    }


    public function show(Request $request,$uuid)
    {
        $CashFlowUnit = CashFlowUnit::where('uuid', $uuid)->first();
        return response()->json($CashFlowUnit);
    }


    public function edit(Request $request,$uuid)
    {
        if (!$request->ajax()) {
            abort(403);
        }
        $CashFlowUnitCategories = CashFlowUnitCategory::whereIn('id', [1,2])->get();
        $CashFlowUnit = CashFlowUnit::where('uuid', $uuid)->first();
        return response()->json(['unit' => $CashFlowUnit, 'categories' => $CashFlowUnitCategories]);
    }




    public function update(Request $request)
    {
        $data = $request->all();

        // Convertir el array 'attributes' a una cadena JSON
        if (isset($data['attributes'])) {
            $data['attributes'] = json_encode($data['attributes']);
        }

        $unit = CashFlowUnit::where('uuid', $data['uuid'])->first();
        $unit->category_id = (int)$request['category_id_edit'];
        $unit->update($data);
        Alert::success('Mensaje existoso', 'Categoria Actualizada');
        return redirect()->route('admin.cashflow.units.index');
    }


    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $CashFlowUnit = CashFlowUnit::where('uuid', $uuid)->first();
        $cashflows = $CashFlowUnit->cashflows->first();
        if($cashflows){
            Alert::error('Error', 'No se puede eliminar la Unidad, tiene movimientos asociados.');
            return redirect()->route('admin.cashflow.units.index');
        }

        $CashFlowUnit->delete();

        Alert::success('Mensaje existoso', 'Categoria Eliminada');
        return redirect()->route('admin.cashflow.units.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $CashFlowUnits = CashFlowUnit::whereIn('uuid', $uuidsArray)->get();
        foreach ($CashFlowUnits as $CashFlowUnit) {

                $cashflows = $CashFlowUnit->cashflows->first();
                if($cashflows){
                    Alert::error('Error', 'No se puede eliminar la Unidad, tiene movimientos asociados.');
                    return redirect()->route('admin.cashflow.units.index');
                }

                $CashFlowUnit->delete();
        }

        Alert::success('Mensaje existoso', 'Categorias Eliminadas');
        return redirect()->route('admin.cashflow.units.index');

    }


}
