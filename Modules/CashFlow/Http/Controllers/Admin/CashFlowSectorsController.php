<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowSector;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use DataTables;

class CashFlowSectorsController extends AdminBaseController
{


    public function index()
    {
        return view('cashflow::admin.cashflow_sectors.index');
    }

    public function indexDatatable(Request $request)
    {
       $list = CashFlowSector::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }

    // public function create()
    // {
    //     return view('cashflow_sectors.create');
    // }


    public function store(Request $request)
    {
        $data = $request->all();
        $CashFlowSector = CashFlowSector::create($data);
        Alert::success('Mensaje existoso', 'Sector Creado');
        return redirect()->route('admin.cashflow.sectors.index');
    }


    public function show(Request $request,$uuid)
    {
        $CashFlowSector = CashFlowSector::where('uuid', $uuid)->first();
        return response()->json($CashFlowSector);
    }


    public function edit(Request $request,$uuid)
    {
        if (!$request->ajax()) {
            abort(403);
        }

        $CashFlowSector = CashFlowSector::where('uuid', $uuid)->first();
        return response()->json($CashFlowSector);
    }




    public function update(Request $request)
    {
        $data = $request->all();
        $CashFlowSector = CashFlowSector::where('uuid', $data['uuid'])->first();
        $CashFlowSector->update($data);
        Alert::success('Mensaje existoso', 'Sector Actualizado');
        return redirect()->route('admin.cashflow.sectors.index');
    }

    /**
     * Remove the specified cash flow category from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $CashFlowSector = CashFlowSector::where('uuid', $uuid)->first();
        $cashflows = $CashFlowSector->cashflow->first();
        if($cashflows){
            Alert::error('Error', 'No se puede eliminar este sector, ya que tiene registros asociados');
            return redirect()->route('admin.cashflow.sectors.index');
        }
        $CashFlowSector->delete();

        Alert::success('Mensaje existoso', 'Sector Eliminado');
        return redirect()->route('admin.cashflow.sectors.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $CashFlowSectors = CashFlowSector::whereIn('uuid', $uuidsArray)->get();
        foreach ($CashFlowSectors as $CashFlowSector) {

                $cashflows = $CashFlowSector->cashflow->first();
                if($cashflows){
                    Alert::error('Error', 'No se puede eliminar , hay registros que contienen este sector asociado');
                    return redirect()->route('admin.cashflow.sectors.index');
                }

                //eliminar las subcategorias
                $subSectors = $CashFlowSector->subsectors;
                foreach ($subSectors as $subSector) {
                    $subSector->delete();
                }
                $CashFlowSector->delete();
        }

        Alert::success('Mensaje existoso', 'Sectores Eliminados');
        return redirect()->route('admin.cashflow.sectors.index');

    }


    //getSubSectors
    public function getSubSectors(Request $request,$uuid)
    {
        $CashFlowSector = CashFlowSector::where('uuid', $uuid)->first();
        $subSectors = $CashFlowSector->subsectors;
        return response()->json($subSectors);
    }


}
