<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\CashFlow\Entities\CashFlowSubCategory;
use Modules\CashFlow\Entities\CashFlowCategory;
use Illuminate\Http\Request;
use Exception;

use App\Http\Controllers\AdminBaseController;

use Auth;
Use Alert;
use DataTables;

class CashFlowSubCategoriesController extends AdminBaseController
{

    // public function index()
    // {
    //     return view('cashflow::admin.cashflow_categories.index');
    // }

    public function indexDatatable(Request $request)
    {
       $list = CashFlowSubCategory::orderBy('created_at','desc')->get();
       return Datatables::of($list)->make(true);
    }

    // public function create()
    // {
    //     return view('cashflow_categories.create');
    // }


    public function store(Request $request)
    {
        $data = $request->all();
        //capturamos el id de la categoria padre
        $cashFlowCategory = CashFlowCategory::where('uuid', $data['uuid_category'])->first();

        $cashFlowSubCategory = new CashFlowSubCategory();
        $cashFlowSubCategory->name = $data['name'];
        $cashFlowSubCategory->description = $data['description'];
        $cashFlowSubCategory->category_id = $cashFlowCategory->id;
        $cashFlowSubCategory->save();

        Alert::success('Mensaje existoso', 'Categoria Creada');
        return redirect()->route('admin.cashflow.categories.index');
    }


    public function show(Request $request,$uuid)
    {
        $CashFlowSubCategory = CashFlowSubCategory::where('uuid', $uuid)->first();
        return response()->json($CashFlowSubCategory);
    }


    public function edit(Request $request,$uuid)
    {

        if (!$request->ajax()) {
            abort(403);
        }

        $CashFlowSubCategory = CashFlowSubCategory::where('uuid', $uuid)->first();
        return response()->json($CashFlowSubCategory);
    }




    public function update(Request $request)
    {
        $data = $request->all();
        $CashFlowSubCategory = CashFlowSubCategory::where('uuid', $data['uuid'])->first();
        $CashFlowSubCategory->update($data);
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

        $CashFlowSubCategory = CashFlowSubCategory::where('uuid', $uuid)->first();
        $CashFlowSubCategory->delete();

        Alert::success('Mensaje existoso', 'Categoria Eliminada');
        return redirect()->route('admin.cashflow.categories.index');
    }


    // public function massDestroy(Request $request)
    // {
    //     $request = $request->all();

    //     $uuidsString = $request['uuids'][0];
    //     $uuidsArray = explode(',', $uuidsString);

    //     $CashFlowCategories = CashFlowSubCategory::whereIn('uuid', $uuidsArray)->get();
    //     foreach ($CashFlowCategories as $CashFlowCategory) {
    //             $CashFlowCategory->delete();
    //     }

    //     Alert::success('Mensaje existoso', 'Categorias Eliminadas');
    //     return redirect()->route('admin.cashflow.categories.index');

    // }


    // //getSubCategories
    // public function getSubCategories(Request $request,$uuid)
    // {
    //     $cashFlowCategory = CashFlowSubCategory::where('uuid', $uuid)->first();
    //     $subCategories = $cashFlowCategory->subcategories;
    //     return response()->json($subCategories);
    // }

}
