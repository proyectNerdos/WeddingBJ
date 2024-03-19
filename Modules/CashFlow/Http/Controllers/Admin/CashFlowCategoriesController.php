<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowCategory;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use DataTables;

class CashFlowCategoriesController extends AdminBaseController
{


    public function index()
    {
        return view('cashflow::admin.cashflow_categories.index');
    }

    public function indexDatatable(Request $request)
    {
       $list = CashFlowCategory::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        $cashFlowCategory = CashFlowCategory::create($data);
        Alert::success('Mensaje existoso', 'Categoria Creada');
        return redirect()->route('admin.cashflow.categories.index');
    }


    public function show(Request $request,$uuid)
    {
        $cashFlowCategory = CashFlowCategory::where('uuid', $uuid)->first();
        return response()->json($cashFlowCategory);
    }


    public function edit(Request $request,$uuid)
    {
        if (!$request->ajax()) {
            abort(403);
        }

        $cashFlowCategory = CashFlowCategory::where('uuid', $uuid)->first();
        return response()->json($cashFlowCategory);
    }




    public function update(Request $request)
    {
        $data = $request->all();
        $cashFlowCategory = CashFlowCategory::where('uuid', $data['uuid'])->first();
        $cashFlowCategory->update($data);
        Alert::success('Mensaje existoso', 'Categoria Actualizada');
        return redirect()->route('admin.cashflow.categories.index');
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

        $cashFlowCategory = CashFlowCategory::where('uuid', $uuid)->first();
        $cashflows = $cashFlowCategory->cashflow->first();
        if($cashflows){
            Alert::error('Error', 'No se puede eliminar la categoria, tiene movimientos asociados.');
            return redirect()->route('admin.cashflow.categories.index');
        }

        $cashFlowCategory->delete();

        Alert::success('Mensaje existoso', 'Categoria Eliminada');
        return redirect()->route('admin.cashflow.categories.index');
    }


    public function massDestroy(Request $request)
    {
        $request = $request->all();

        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $CashFlowCategories = CashFlowCategory::whereIn('uuid', $uuidsArray)->get();
        foreach ($CashFlowCategories as $CashFlowCategory) {

                $cashflows = $CashFlowCategory->cashflow->first();
                if($cashflows){
                    Alert::error('Error', 'No se puede eliminar la categoria, tiene movimientos asociados.');
                    return redirect()->route('admin.cashflow.categories.index');
                }
                //eliminar las subcategorias
                $subCategories = $CashFlowCategory->subcategories;
                foreach ($subCategories as $subCategory) {
                    $subCategory->delete();
                }
                $CashFlowCategory->delete();
        }

        Alert::success('Mensaje existoso', 'Categorias Eliminadas');
        return redirect()->route('admin.cashflow.categories.index');

    }


    //getSubCategories
    public function getSubCategories(Request $request,$uuid)
    {
        $cashFlowCategory = CashFlowCategory::where('uuid', $uuid)->first();
        $subCategories = $cashFlowCategory->subcategories;
        return response()->json($subCategories);
    }


}
