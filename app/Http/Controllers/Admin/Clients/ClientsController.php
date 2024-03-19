<?php


namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowCategory;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use App\Models\Client;
use DataTables;

class ClientsController extends AdminBaseController
{


    public function index()
    {
        // $Client=Client::all();
        // dd($Client);
        return view('admin.client.index');
    }

    public function indexDatatable(Request $request)
    {

       $list = Client::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $client = Client::create($data);
        Alert::success('Mensaje existoso', 'Cliente / Proveedor Creado');
        return redirect()->route('admin.client.index');
    }


    public function show(Request $request,$uuid)
    {
        $client = Client::where('uuid', $uuid)->first();
        return response()->json($client);
    }


    public function edit(Request $request,$uuid)
    {
        if (!$request->ajax()) {
            abort(403);
        }

        $client = Client::where('uuid', $uuid)->first();
        return response()->json($client);
    }




    public function update(Request $request)
    {

        $data = $request->all();
        $client = Client::where('uuid', $data['uuid'])->first();

        $client->update($data);
        Alert::success('Mensaje existoso', 'Cliente / Proveedor Actualizado');
        return redirect()->route('admin.client.index');
    }


    public function destroy(Request $request)
    {

        $request = $request->all();
        $uuid = $request['uuid'];

        $client = Client::where('uuid', $uuid)->first();
        $cashflows = $client->cashflow->first();
        if($cashflows){
            Alert::error('Error', 'No se puede eliminar el registro, tiene movimientos asociados');
            return redirect()->route('admin.client.index');
        }

        $client->delete();

        Alert::success('Mensaje existoso', 'Cliente / Proveedor Eliminado');
        return redirect()->route('admin.client.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $client = Client::whereIn('uuid', $uuidsArray)->get();
        foreach ($client as $client) {
            $cashflows = $client->cashflow->first();
            if($cashflows){
                Alert::error('Error', 'No se puede eliminar el registro, tiene movimientos asociados');
                return redirect()->route('admin.client.index');
            }
            $client->delete();
        }

        Alert::success('Mensaje existoso', 'Clientes / Proveedores Eliminados');
        return redirect()->route('admin.client.index');

    }


}
