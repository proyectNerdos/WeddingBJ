<?php

namespace Modules\CashFlow\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//MODELS
use App\Models\User;
use Modules\CashFlow\Entities\CashFlow;
use Modules\CashFlow\Entities\CashFlowUnit;
use Modules\CashFlow\Entities\CashFlowSector;
use Modules\CashFlow\Entities\CashFlowCategory;
use Modules\CashFlow\Entities\CashFlowSubSector;
use Modules\CashFlow\Entities\CashFlowSubCategory;
use Modules\CashFlow\Entities\CashFlowUnitCategory;
use Modules\CashFlow\Entities\CashFlowUnitSubCategory;
use Modules\CashFlow\Entities\CashFlowDetail;
use Modules\Productos\Entities\Product;
use Modules\Productos\Entities\ProductUnitsOfMeasure;
use Modules\ServiceModule\Entities\Service;
use App\Models\Client;
use App\Models\Employee;

//SERVICES
use Modules\CashFlow\Http\Services\Admin\CashFlow\CashFlowSearchService;
use Modules\CashFlow\Http\Services\Admin\CashFlow\CashFlowReport;
//CONTROLLERS
use App\Http\Controllers\AdminBaseController;
//LIBRARIES
Use Alert;
use Auth;
use DataTables;
use Carbon\Carbon;

class CashFlowController extends AdminBaseController
{

    protected $cashFlowSearchService;
    protected $cashFlowReport;

    public function __construct(CashFlowSearchService $cashFlowSearchService,CashFlowReport $cashFlowReport)
    {
        parent::__construct();
        $this->cashFlowSearchService = $cashFlowSearchService;
        $this->cashFlowReport = $cashFlowReport;
    }

    public function index()
    {

        // manejo de permisos
        $user = auth()->user();
        if (!$user || !$user->hasPermission('cashflow-view')) {
            flash('No tienes permiso para ver esta página')->error()->important();
            return redirect()->back();
        }

        //mandamos las categorias con load a subcategorias
        $cashFlowCategories = CashFlowCategory::with('subcategories')->get();
        $cashFlowUnitCategories = CashFlowUnitCategory::with('subcategories')->get();
        $cashFlowSectors = CashFlowSector::with('subsectors')->get();
        $cashFlowUnits = CashFlowUnit::with('category')->get();
        $employees = Employee::all();
        $clients = Client::all()->sortBy('name');
        $products = Product::with('unitsOfMeasure')->get();
        $unitsOfMeasures =  ProductUnitsOfMeasure::pluck('name', 'id');
        $services = Service::all();
        return view('cashflow::admin.cashflow.index',compact('cashFlowCategories','cashFlowUnitCategories','cashFlowSectors','cashFlowUnits','employees','products','unitsOfMeasures','clients','services'));
    }

    public function indexDatatable(Request $request)
    {
        // Parámetros de búsqueda vacíos para la carga inicial
        $searchParameters = [];
        $query = $this->cashFlowSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->cashFlowSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function searchDatatable(Request $request)
    {
        $searchParameters = $request->all();
        $query = $this->cashFlowSearchService->buildQueryFromParameters($searchParameters);
        $dataTable = $this->cashFlowSearchService->buildDatatable($query);
        return $dataTable->make(true);
    }

    public function searchReport(Request $request)
    {
        //llamamos a la session de los parametros de busqueda
        $searchParameters = session('searchParameters');
        $query = $this->cashFlowSearchService->buildQueryFromParameters($searchParameters);
        $report = $this->cashFlowReport->report($query);
        return response()->json($report);
    }

    public function store(Request $request)
    {
        $data = $request->all();



        //a $data['amount'] sacarle el $ y convertirlo a float
        $amount = str_replace('$', '', $data['amount']);
        $amount = str_replace(',', '', $amount);
        $floatAmount = (float) $amount;


        //amount usd
        $amount_usd = str_replace('USD', '', $data['amount_usd']);
        $amount_usd = str_replace(',', '', $amount_usd);
        $floatAmount_usd = (float) $amount_usd;

         // Subtotal
        $subtotal = str_replace('$', '', $data['subtotal_number']);
        $subtotal = str_replace(',', '', $subtotal);
        $floatSubtotal = (float) $subtotal;


        // IVA
        $iva = str_replace('$', '', $data['iva_number']);
        $iva = str_replace(',', '', $iva);
        $floatIva = (float) $iva;


        // Percepcion
        $percepcion = str_replace('$', '', $data['percepcion_number']);
        $percepcion = str_replace(',', '', $percepcion);
        $floatPercepcion = (float) $percepcion;




        $json = [
            'hectareas' => $request->input('hectareas', ''),
            'machine' => $request->input('machine', ''),
            'tractor' => $request->input('tractor', ''),
            'implement' => $request->input('implement', ''),
            'crop_id' => $request->input('crop_id', ''),
        ];
        $json = json_encode($json);


        // Guardar en la tabla CashFlow
        $cashFlow = new CashFlow();
        $cashFlow->type = $data['type'];
        $cashFlow->amount = $floatAmount;
        $cashFlow->amount_usd = $floatAmount_usd;
        $cashFlow->date = $data['date'];
        $cashFlow->remittance_number = $data['remittance_number'];
        $cashFlow->invoice_number = $data['invoice_number'];

        $cashFlow->client_id = isset($data['client_id']) ? Client::where('id', $data['client_id'])->value('id') : null;
        $cashFlow->client_name = isset($data['client_id']) ? Client::where('id', $data['client_id'])->value('name') : null;

        $cashFlow->category_id = isset($data['category_id']) ? CashFlowCategory::where('uuid', $data['category_id'])->value('id') : null;
        $cashFlow->subcategory_id = isset($data['subcategory_id']) ? CashFlowSubCategory::where('uuid', $data['subcategory_id'])->value('id') : null;

        $cashFlow->sector_id = isset($data['sector_id']) ? CashFlowSector::where('uuid', $data['sector_id'])->value('id') : null;
        $cashFlow->subsector_id = isset($data['subsector_id']) ? CashFlowSubSector::where('uuid', $data['subsector_id'])->value('id') : null;

        $cashFlow->unit_category_id = isset($data['unit_category_id']) ? CashFlowUnitCategory::where('uuid', $data['unit_category_id'])->value('id') : null;
        $cashFlow->unit_id = isset($data['unit_id']) ? CashFlowUnit::where('uuid', $data['unit_id'])->value('id') : null;
        $cashFlow->unit_subcategory_id = isset($data['units_subcategory_id']) ? CashFlowUnitSubCategory::where('uuid', $data['units_subcategory_id'])->value('id') : null;

        $cashFlow->employee_id = isset($data['employee_id']) ? Employee::where('uuid', $data['employee_id'])->value('id') : null;
        $cashFlow->employee_sec1_id = isset($data['employee_sec1_id']) ? Employee::where('uuid', $data['employee_sec1_id'])->value('id') : null;
        $cashFlow->employee_sec2_id = isset($data['employee_sec2_id']) ? Employee::where('uuid', $data['employee_sec2_id'])->value('id') : null;


        $cashFlow->operator_hours = $request->input('operator_hours') ? $request->input('operator_hours') : null;
        $cashFlow->helper1_hours = $request->input('helper1_hours') ? $request->input('helper1_hours') : null;
        $cashFlow->helper2_hours = $request->input('helper2_hours') ? $request->input('helper2_hours') : null;

        //guardar imput IVA, PERCEPCION Y SUBTOTAL con data y como array
        $cashFlow->subtotal_number = $floatSubtotal;
        $cashFlow->iva_number = $floatIva;
        $cashFlow->percepcion_number = $floatPercepcion;


        //agregamos json en mi columna service_details
        $cashFlow->service_details = $json;


        $cashFlow->detail = $data['details'];
        $cashFlow->save();



        //guardamos las relacion con los productos , recorre el array de productos y iremos guaradndo en CashFlowDetail
        if (isset($data['product_id'])) {
            $productQuantities = request('product_quantity');
            $measurementUnits = request('measurement_unit');
            $consumedQuantities = request('consumed_quantity');
            $consumedMeasurementUnits = request('consumed_measurement_unit');
            $productIds = request('product_id');

            for ($i = 0; $i < count($productIds); $i++) {
                $cashFlowDetail = new CashFlowDetail();
                $cashFlowDetail->cash_flow_id = $cashFlow->id;
                $cashFlowDetail->user_id = Auth::user()->id;
                $cashFlowDetail->product_id = $productIds[$i];
                $cashFlowDetail->product_quantity = $productQuantities[$i];
                $cashFlowDetail->measurement_unit_id = $measurementUnits[$i];
                $cashFlowDetail->consumed_quantity = $consumedQuantities[$i];
                $cashFlowDetail->consumed_measurement_unit_id = $consumedMeasurementUnits[$i];
                $cashFlowDetail->save();
            }
        }


        //guardamos los service en CashFlowDetail
        if (isset($data['service_ids'])) {
            $serviceIds = request('service_ids');
            for ($i = 0; $i < count($serviceIds); $i++) {
                $cashFlowDetail = new CashFlowDetail();
                $cashFlowDetail->cash_flow_id = $cashFlow->id;
                $cashFlowDetail->user_id = Auth::user()->id;
                $cashFlowDetail->service_id = $serviceIds[$i];
                $cashFlowDetail->save();
            }
        }


        Alert::success('Mensaje existoso', 'Registro Creado');
        return redirect()->route('admin.cashflow.index');
    }

    public function show(Request $request, $uuid)
    {
        $cashFlow = CashFlow::with(['client','category', 'subcategory', 'sector', 'subsector', 'unitCategory', 'unitSubcategory', 'unit','employee','employeeSec1','employeeSec2','details','details.product','details.service','details.measurementUnit','details.consumedMeasurementUnit'])
                            ->where('uuid', $uuid)->firstOrFail();
        return response()->json($cashFlow);
    }

    public function edit(Request $request, $uuid)
    {
        $cashFlow = CashFlow::with(['client','category', 'subcategory', 'sector', 'subsector', 'unitCategory', 'unitSubcategory', 'unit','employee','employeeSec1','employeeSec2','details','details.product','details.service','details.measurementUnit','details.consumedMeasurementUnit'])
        ->where('uuid', $uuid)->firstOrFail(); // Asegúrate de que el flujo de efectivo existe
        $cashFlowCategories = CashFlowCategory::all(); // Lista de todas las categorías
        $cashFlowSectors = CashFlowSector::all(); // Lista de todos los sectores
        $cashFlowUnitCategories = CashFlowUnitCategory::all(); // Lista de todas las categorías de unidad
        $employees = Employee::all();
        $clients = Client::all();
        $products = Product::all();
        $unitsOfMeasures =  ProductUnitsOfMeasure::pluck('name', 'id');
        $services = Service::all();
        $clients = Client::all();

        // Puedes agregar más datos según sea necesario
        // Por ejemplo, si las subcategorías dependen de la categoría seleccionada,
        // podrías necesitar cargarlas también si el flujo de efectivo tiene una categoría seleccionada.

        // Retornar la vista con todos los datos compactados
        return view('cashflow::admin.cashflow.edit', compact(
            'cashFlow',
            'cashFlowCategories',
            'cashFlowSectors',
            'cashFlowUnitCategories',
            'employees',
            'clients',
            'products',
            'unitsOfMeasures',
            'services',
            'clients'
            // Agrega aquí cualquier otro dato que necesites
        ));
    }

    public function update(Request $request, $uuid)
    {
        $data = $request->all();

        //Obtener la instancia de CashFlow usando UUID
        $cashFlow = CashFlow::where('uuid', $uuid)->firstOrFail();

        //Preparar el monto

        $amount = str_replace('$', '', $data['amount']);
        $amount = str_replace(',', '', $amount);
        $floatAmount = (float) $amount;

        //amount usd
        $amount_usd = str_replace('USD', '', $data['amount_usd']);
        $amount_usd = str_replace(',', '', $amount_usd);
        $floatAmount_usd = (float) $amount_usd;

        $json = [
            'hectareas' => $request->input('hectareas', ''),
            'machine' => $request->input('machine', ''),
            'tractor' => $request->input('tractor', ''),
            'implement' => $request->input('implement', ''),
            'crop_id' => $request->input('crop_id', ''),
        ];
        $json = json_encode($json);


        //Actualizar los atributos de CashFlow
        $cashFlow->type = $data['type'];
        $cashFlow->amount = $floatAmount;
        $cashFlow->amount_usd = $floatAmount_usd;
        $cashFlow->date = $data['date']; // Asegúrate de que la fecha esté en el formato correcto
        $cashFlow->remittance_number = $data['remittance_number'];
        $cashFlow->invoice_number = $data['invoice_number'];

        //Actualizar los atributos de CashFlow Subtotal, IVA y Percepcion
        $cashFlow->subtotal_number = $data['subtotal'];
        $cashFlow->iva_number = $data['iva'];
        $cashFlow->percepcion_number = $data['percepcion'];

        // Actualizar los atributos de CashFlow Subtotal, IVA y Percepcion
if (isset($data['subtotal'])) {
    $subtotal = str_replace('$', '', $data['subtotal']);
    $subtotal = str_replace(',', '', $subtotal);
    $cashFlow->subtotal_number = (float) $subtotal;
}

if (isset($data['iva'])) {
    $iva = str_replace('$', '', $data['iva']);
    $iva = str_replace(',', '', $iva);
    $cashFlow->iva_number = (float) $iva;
}

if (isset($data['percepcion'])) {
    $percepcion = str_replace('$', '', $data['percepcion']);
    $percepcion = str_replace(',', '', $percepcion);
    $cashFlow->percepcion_number = (float) $percepcion;
}

$cashFlow->save();

        //Actualizar Cliente

        $cashFlow->client_id = $data['client_id'];
        $cashFlow->client_name = Client::where('id', $data['client_id'])->value('name');

        //Actualizar relaciones
        $cashFlow->category_id = isset($data['category_id']) ? CashFlowCategory::where('uuid', $data['category_id'])->value('id') : null;
        $cashFlow->subcategory_id = isset($data['subcategory_id']) ? CashFlowSubCategory::where('uuid', $data['subcategory_id'])->value('id') : null;
        $cashFlow->sector_id = isset($data['sector_id']) ? CashFlowSector::where('uuid', $data['sector_id'])->value('id') : null;
        $cashFlow->subsector_id = isset($data['subsector_id']) ? CashFlowSubSector::where('uuid', $data['subsector_id'])->value('id') : null;
        $cashFlow->unit_category_id = isset($data['unit_category_id']) ? CashFlowUnitCategory::where('uuid', $data['unit_category_id'])->value('id') : null;
        $cashFlow->unit_id = isset($data['unit_id']) ? CashFlowUnit::where('uuid', $data['unit_id'])->value('id') : null;
        $cashFlow->unit_subcategory_id = isset($data['units_subcategory_id']) ? CashFlowUnitSubCategory::where('uuid', $data['units_subcategory_id'])->value('id') : null;

        //employee y horas
        $cashFlow->employee_id = isset($data['employee_id']) ? Employee::where('uuid', $data['employee_id'])->value('id') : null;
        $cashFlow->operator_hours = isset($data['operator_hours']) ? $data['operator_hours'] : null;
        $cashFlow->employee_sec1_id = isset($data['employee_sec1_id']) ? Employee::where('uuid', $data['employee_sec1_id'])->value('id') : null;
        $cashFlow->helper1_hours = isset($data['helper1_hours']) ? $data['helper1_hours'] : null;
        $cashFlow->employee_sec2_id = isset($data['employee_sec2_id']) ? Employee::where('uuid', $data['employee_sec2_id'])->value('id') : null;
        $cashFlow->helper2_hours = isset($data['helper2_hours']) ? $data['helper2_hours'] : null;

        //agregamos json en mi columna service_details
        $cashFlow->service_details = $json;
        $cashFlow->detail = $data['details'];
        $cashFlow->save();


        //cargamos los productos
        if (isset($data['product_id'])) {
            $productQuantities = request('product_quantity');
            $measurementUnits = request('measurement_unit');
            $consumedQuantities = request('consumed_quantity');
            $consumedMeasurementUnits = request('consumed_measurement_unit');
            $productIds = request('product_id');

            //eliminamos todos los productos relacionados
            CashFlowDetail::where('cash_flow_id', $cashFlow->id)
              ->whereNotNull('product_id')
              ->delete();

            for ($i = 0; $i < count($productIds); $i++) {
                $cashFlowDetail = new CashFlowDetail();
                $cashFlowDetail->cash_flow_id = $cashFlow->id;
                $cashFlowDetail->user_id = Auth::user()->id;
                $cashFlowDetail->product_id = $productIds[$i];
                $cashFlowDetail->product_quantity = $productQuantities[$i];
                $cashFlowDetail->measurement_unit_id = $measurementUnits[$i];
                $cashFlowDetail->consumed_quantity = $consumedQuantities[$i];
                $cashFlowDetail->consumed_measurement_unit_id = $consumedMeasurementUnits[$i];
                $cashFlowDetail->save();
            }
        }

        //cargamos los servicios
        //eliminamos todos los servicios relacionados
        CashFlowDetail::where('cash_flow_id', $cashFlow->id)
              ->whereNotNull('service_id')
              ->delete();
        if (isset($data['service_ids'])) {
            $serviceIds = request('service_ids');
            for ($i = 0; $i < count($serviceIds); $i++) {
                $cashFlowDetail = new CashFlowDetail();
                $cashFlowDetail->cash_flow_id = $cashFlow->id;
                $cashFlowDetail->user_id = Auth::user()->id;
                $cashFlowDetail->service_id = $serviceIds[$i];
                $cashFlowDetail->save();
            }
        }

        Alert::success('Mensaje exitoso', 'Flujo de Efectivo Actualizado');
        return redirect()->route('admin.cashflow.index');
    }

    public function destroy(Request $request)
    {
        $request = $request->all();
        $uuid = $request['uuid'];

        $CashFlow = CashFlow::where('uuid', $uuid)->first();
        $CashFlow->delete();

        Alert::success('Mensaje existoso', 'Flujo de Efectivo Eliminado');
        return redirect()->route('admin.cashflow.index');
    }

    public function massDestroy(Request $request)
    {
        $request = $request->all();
        $uuidsString = $request['uuids'][0];
        $uuidsArray = explode(',', $uuidsString);

        $CashFlow = CashFlow::whereIn('uuid', $uuidsArray)->get();
        foreach ($CashFlow as $item) {
                //eliminar las subcategorias
                $item->delete();
        }

        Alert::success('Mensaje existoso', 'Flujos de Efectivo Eliminados');
        return redirect()->route('admin.cashflow.index');

    }

    public function getSubCategories(Request $request,$uuid)
    {
        $cashFlowCategory = CashFlowCategory::where('uuid', $uuid)->first();
        $subCategories = $cashFlowCategory->subcategories;
        return response()->json($subCategories);
    }




}
