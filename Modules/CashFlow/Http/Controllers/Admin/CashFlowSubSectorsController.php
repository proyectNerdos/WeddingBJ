<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowSubSector;
use Modules\CashFlow\Entities\CashFlowSector;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use DataTables;

class CashFlowSubSectorsController extends AdminBaseController
{


    public function indexDatatable(Request $request)
    {
       $list = CashFlowSubSector::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        //capturamos el id de la Sector padre
        $CashFlowSector = CashFlowSector::where('uuid', $data['uuid_sector'])->first();

        $CashFlowSubSector = new CashFlowSubSector();
        $CashFlowSubSector->name = $data['name'];
        $CashFlowSubSector->description = $data['description'];
        $CashFlowSubSector->sector_id = $CashFlowSector->id;
        $CashFlowSubSector->save();

        Alert::success('Mensaje existoso', 'SubSector Creado');
        return redirect()->route('admin.cashflow.sectors.index');
    }

    public function show(Request $request,$uuid)
    {
        $CashFlowSubSector = CashFlowSubSector::where('uuid', $uuid)->first();
        return response()->json($CashFlowSubSector);
    }


    public function edit(Request $request,$uuid)
    {

        if (!$request->ajax()) {
            abort(403);
        }

        $CashFlowSubSector = CashFlowSubSector::where('uuid', $uuid)->first();
        return response()->json($CashFlowSubSector);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $CashFlowSubSector = CashFlowSubSector::where('uuid', $data['uuid'])->first();
        $CashFlowSubSector->update($data);
        Alert::success('Mensaje existoso', 'SubSector Actualizado');
        return redirect()->route('admin.cashflow.sectors.index');
    }


    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $CashFlowSubSector = CashFlowSubSector::where('uuid', $uuid)->first();
        $CashFlowSubSector->delete();

        Alert::success('Mensaje existoso', 'SubSector Eliminado');
        return redirect()->route('admin.cashflow.sectors.index');
    }




}
