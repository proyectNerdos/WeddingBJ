<?php

namespace Modules\Productos\Http\Services\Admin\Product;


//use product
use Modules\Productos\Entities\Product;

use DataTables;

class ProductSearchService
{
    public function search($searchParameters)
    {
        $query = Product::with([ 'category', 'brand', 'supplier', 'tax', 'Image']);
        return DataTables::of($query);
        /*--------------COLUMNAS VIRTUALES----------------- */
        // ->addColumn('category_name', function ($query) {
        //     return $query->category ? $query->category->name : 'N/A';
        // })


        /*--------------ORDENAMIENTO----------------- */
        // ->orderColumn('category_name', function ($query, $order) {
        //     $query->join('cf_categories', 'cf_cash_flows.category_id', '=', 'cf_categories.id')
        //           ->orderBy('cf_categories.name', $order);
        // });


    }
}



