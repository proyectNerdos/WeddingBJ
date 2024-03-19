

<div class="modal fade" id="create" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear Flujo de Efectivo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('admin.cashflow.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        {{-- CARD DATOS --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">DATOS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Columna para el Tipo -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="type">Tipo</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-align-justify"></i> <!-- Ícono de FontAwesome -->
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="type" name="type" required>
                                                        <option value="">Seleccione un Tipo</option>
                                                        <option value="income">Ingreso</option>
                                                        <option value="expense">Egreso</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Columna para el Monto -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="amount">Total (Pesos - $)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                <i class="fas fa-dollar-sign"></i>
                                                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="amount" name="amount">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="amount_usd">Total (Dolares - USD)</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                <i class="fas fa-dollar-sign"></i> <!-- Ícono de FontAwesome -->
                                                            </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="amount_usd" name="amount_usd">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Columna para la Fecha -->



                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <div class="input-group">
                                                    <div class="input-group-append"> <!-- Cambiado a append para que esté a la derecha -->
                                                        <span class="input-group-text" id="basic-addon2">
                                                            <i class="fas fa-calendar-alt"></i> <!-- Icono de calendario -->
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control datetimepicker" placeholder="DD/MM/YYYY" id="date" name="date" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="remittance">N° de Remito / N° de Orden de Trabajo</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="remittance_number" name="remittance_number" placeholder="Ingrese el numero de remito">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="remito">N° de Factura</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="Ingrese el numero de factura">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subtotal">Subtotal</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </span>
                                                    </div>
                                                    <input type="float" class="form-control" id="subtotal_number" name="subtotal_number" placeholder="Ingrese Subtotal">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="iva">IVA</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </span>
                                                    </div>
                                                    <input type="float" class="form-control" id="iva_number" name="iva_number" placeholder="Ingrese IVA">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="percepcion">Percepción</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-file-invoice"></i>
                                                        </span>
                                                    </div>
                                                    <input type="float" class="form-control" id="percepcion_number" name="percepcion_number" placeholder="Ingrese la Percepción">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="client_id">Cliente / Proveedor</label>
                                            <select class="form-control select2" id="client_id" name="client_id">
                                                <option value="">Seleccione una Opcion</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD CENTRO DE GASTOS --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Empresa / Sociedad</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-12 col-md-6">
                                            <div class="input-group mb-3">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="category">Seleccione la Empresa y el Área</label>
                                            <select class="form-control select2" id="category" name="category_id" required>
                                                <option value="">Seleccione una Opcion</option>
                                                @foreach ($cashFlowCategories as $category)
                                                    <option value="{{ $category->uuid }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>




                                        </div>




                                        <div class="col-xs-12 col-sm-12 col-12 col-md-6"  id="subcategoriesContainer" style="display: none;">
                                            <div class="input-group mb-3">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="category">SubCategoria</label>
                                            <select class="form-control select2" id="subcategory" name="subcategory_id">
                                                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-12 col-md-6">
                                            <div class="input-group ">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="sector">Área</label>
                                            <select class="form-control select2" id="sector" name="sector_id">
                                                <option value="">Seleccione una Opcion</option>
                                                @foreach ($cashFlowSectors as $sector)
                                                    <option value="{{ $sector->uuid }}">{{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                         <!-- Subsectores -->
                                        <div class="col-xs-12 col-sm-12 col-12 col-md-6" id="subsectorsContainer" style="display: none;">
                                            <div class="input-group ">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="sector">Subsector</label>
                                            <select class="form-control select2" id="subsector" name="subsector_id">
                                                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                                            </select>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD CATEGORIAS & ITEMS --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Selección de Categorías:</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                         <!-- Columna para Categorías de Unidad -->
                                         <div class="col-xs-12 col-sm-12 col-12 col-md-6">
                                            <div class="input-group ">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="unitCategory">Categoría</label>
                                            <select class="form-control select2" id="unitCategory" name="unit_category_id" required>
                                                <option value="">Seleccione una Opcion</option>
                                                @foreach ($cashFlowUnitCategories as $unitCategory)
                                                    <option value="{{ $unitCategory->uuid }}" data-id="{{ $unitCategory->id }}">{{ $unitCategory->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                         <!-- Columna para Units Subcategorías -->
                                        <div class="col-xs-12 col-sm-12 col-12 col-md-6" id="unitsSubcategoriesContainer" style="display: none;">
                                            <div class="input-group ">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="UnitsSubcategory">Subcategoría</label>
                                            <select class="form-control select2" id="UnitsSubcategory" name="units_subcategory_id">
                                                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                                            </select>
                                            </div>
                                        </div>

                                          <!-- Columna para Units -->
                                         <div class="col-xs-12 col-sm-12 col-12 col-md-6" id="unitsContainer" style="display: none;">
                                            <div class="input-group ">
                                            {{-- <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fa fa-search"></i>
                                                </span>
                                            </div> --}}
                                            <label for="unit">Item</label>
                                            <select class="form-control select2" id="unit" name="unit_id">

                                                <!-- Las opciones se llenarán dinámicamente con JavaScript -->
                                            </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-12 col-md-12" >

                                            <div class="" id="attributesContainer" style="display: none;" >

                                                {{-- hectareas --}}
                                                <div class="form-group">
                                                    <label for="Hectareas">Hectareas</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-map"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Ingrese la hectarea trabajada">
                                                    </div>
                                                </div>

                                                {{-- servicios --}}
                                                <div class="form-group">
                                                    <label for="service">Servicios</label>
                                                    <div class="d-flex align-items-center">
                                                        <span class="input-group-text">
                                                        <i class="fas fa-leaf"></i>
                                                        </span>
                                                        <select class="form-control select2 custom-select2-width" id="service_id" name="service_ids[]" multiple>
                                                            <option value="">Seleccione un Servicio</option>
                                                            @foreach ($services as $service)
                                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Maquina --}}
                                                <div class="form-group">
                                                    <label for="machine">Maquina</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-cogs"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" id="machine" name="machine" placeholder="Ingrese la maquina que se uso">
                                                    </div>
                                                </div>

                                                {{-- Tractor --}}
                                                <div class="form-group">
                                                    <label for="Tractor">Tractor</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-tractor"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" id="tractor" name="tractor" placeholder="Ingrese el tractor">
                                                    </div>
                                                </div>

                                                {{-- Implementos --}}
                                                <div class="form-group">
                                                    <label for="Implement">Implemento</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-tools"></i>
                                                            </span>
                                                        </div>
                                                        <input type="text" class="form-control" id="implement" name="implement" placeholder="Ingrese el Implemento">
                                                    </div>
                                                </div>


                                                {{-- select de cultivos --}}
                                                <div class="form-group">
                                                    <label for="crop">Cultivos</label>
                                                    <div class="d-flex align-items-center">
                                                        <span class="input-group-text">
                                                        <i class="fas fa-leaf"></i>
                                                        </span>
                                                        <select class="form-control select2 custom-select2-width" id="crop" name="crop_id[]" multiple>
                                                            <option value="">Seleccione un Cultivo</option>
                                                            @foreach (\Modules\CashFlow\Entities\CashFlow::CROPS as $id => $crop)
                                                                <option value="{{ $id }}">{{ $crop }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- <label for="unit">Atributos</label>
                                                <div id="unitAttributes">

                                                </div> --}}

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD OPERARIOS --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Selección de Operarios / Ayudantes / Horas</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                         <!-- Operario -->
                                        <div class="col-xs-12 col-sm-12 col-12 col-md-4" >
                                            <div class="input-group ">
                                            <label for="employee">Operario</label>
                                            <select class="form-control select2" id="employee" name="employee_id">
                                                <option value="">Seleccione el Operario</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->uuid }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <!-- Ayudante uno -->
                                        <div class="col-xs-12 col-sm-12 col-12 col-md-4" >
                                            <div class="input-group ">
                                            <label for="employee">Ayudante uno</label>
                                            <select class="form-control select2" id="employee_sec1" name="employee_sec1_id">
                                                <option value="">Ayudante uno</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->uuid }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                          <!-- Ayudante dos -->
                                          <div class="col-xs-12 col-sm-12 col-12 col-md-4" >
                                            <div class="input-group ">
                                            <label for="employee">Ayudante dos</label>
                                            <select class="form-control select2" id="employee_sec2" name="employee_sec2_id">
                                                <option value="">Seleccione el Ayudante dos</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->uuid }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>

                                       <!-- Horas trabajadas del operario -->
                                       <div class="col-xs-12 col-sm-12 col-12 col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" id="operator_hours" name="operator_hours" placeholder="Horas trabajadas por el Operario" pattern="\d*">
                                            </div>
                                        </div>
                                        <!-- Horas trabajadas del ayudante uno -->
                                        <div class="col-xs-12 col-sm-12 col-12 col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" id="helper1_hours" name="helper1_hours" placeholder="Horas trabajadas por el Ayudante uno" pattern="\d*">
                                            </div>
                                        </div>

                                        <!-- Horas trabajadas del ayudante dos -->
                                        <div class="col-xs-12 col-sm-12 col-12 col-md-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="number" class="form-control" id="helper2_hours" name="helper2_hours" placeholder="Horas trabajadas por el Ayudante dos" pattern="\d*">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD PRODUCTOS --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">PRODUCTOS</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <label for="product">Producto</label>
                                                <div style="display: flex; align-items: center;">
                                                    <select id="product" name="product" class="form-control select2" style="flex-grow: 1;">
                                                        <!-- Aquí debes agregar tus productos como opciones -->
                                                        <option value="">Seleccione un producto</option>
                                                        <!-- Supongamos que tus productos tienen un id y un nombre -->
                                                        @foreach ($products as $product)
                                                            <option value="{{ $product->id }}">{{ $product->description }}</option>
                                                        @endforeach
                                                    </select>
                                                        <button id="add-product" type="button" class="btn btn-primary" style="margin-left: 10px;">
                                                            <i class="fa fa-plus"></i> Agregar
                                                        </button>
                                                    </div>
                                            </div>
                                            <!-- Aquí es donde se agregarán los productos -->
                                            <table id="products-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Producto</th>
                                                        <th>Cantidad</th>
                                                        <th>Consumido</th>
                                                        <th>Acciones</th> <!-- Esta es la nueva celda para el botón de eliminar -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Las filas de los productos se agregarán aquí -->
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD DETALLES --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">DETALLES</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" id="details" name="details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>{{-- END ROW --}}


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right" id="buttonCrear">Crear</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Alerta para confirmar la operación de guardar o cancelar para seguir editando el formulario --}}

<script>
    document.getElementById('buttonCrear').addEventListener('click', function(event) {
    var result = confirm('¿Desea guardar la operación o cancelar para seguir editando el formulario?');

    if (result) {
        // El usuario presionó "Aceptar", puedes continuar con la operación de guardar.
    } else {
        // El usuario presionó "Cancelar", puedes continuar con la edición del formulario.
        event.preventDefault();
    }
});
</script>

@section('mis-scripts')
@parent
{{-- carga de los productos en la tabla --}}
<script>
    var products = @json($products);
    $(document).ready(function() {
        $('.select2').select2();

        $('#add-product').click(function() {
            // Obtén el producto seleccionado
            var productId = $('#product').val();
            var product = products.find(function(product) {
                return product.id == productId;
            });

            // Crea una nueva fila
            var row = $('<tr>');

            // Agrega las celdas a la fila
            row.append('<td class="col-md-3">' + product.description + '</td>');

            //Decimales en productos
            row.append('<td><div class="d-flex"><div class="col-md-4 p-0"><input type="number" name="product_quantity[]" class="form-control" step="0.01" required></div> <select name="measurement_unit[]" class="form-control select2">@foreach($unitsOfMeasures as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select></div></td>');
            row.append('<td><div class="d-flex"><div class="col-md-4 p-0"><input type="number" name="consumed_quantity[]" class="form-control" step="0.01"></div> <select name="consumed_measurement_unit[]" class="form-control select2">@foreach($unitsOfMeasures as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select></div></td>');

            //SE QUITÓ EL CAMPO REQUERIDO PARA EL CONSUMIDO PARA LAS OPERACIONES DE COMPRAS DE PRODUCTOS

            row.find('.select2').select2();

            // Agrega un botón de eliminar a la fila
            var deleteButton = $('<button type="button" class="btn btn-danger">Eliminar</button>');
            deleteButton.click(function() {
                row.remove();
            });
            row.append($('<td>').append(deleteButton));

            // Agrega un campo oculto con el id del producto
            row.append('<input type="hidden" name="product_id[]" value="' + product.id + '">');

            // Agrega la fila a la tabla
            $('#products-table tbody').append(row);
        });


    });
</script>

{{-- select de la Empresa y el Área --}}
<script>
    var getSubCategoriesUrl = "{{ route('admin.cashflow.categories.getSubCategories', ['cashFlowCategory' => ':id']) }}";
    var getSubSectorsUrl = "{{ route('admin.cashflow.sectors.getSubSectors', ['cashFlowSector' => ':id']) }}";

    var getUnitsSubCategoriesUrl = "{{ route('admin.cashflow.units.categories.getSubCategories', ['cashFlowUnitCategory' => ':id']) }}";
    var getUnitsUrl = "{{ route('admin.cashflow.units.categories.getUnits', ['cashFlowUnitCategory' => ':id']) }}";


    $(document).ready(function() {
    // Lógica para SubCategories
    $('#category').on('change', function() {
        var categoryId = $(this).val();
        $('#subcategory').empty();
        if (categoryId) {
            var url = getSubCategoriesUrl.replace(':id', categoryId);
            // Realizar solicitud AJAX para obtener subcategorías
            $.ajax({
                url: url,
                type: 'GET',
                success: function(subcategories) {
                    // si existen subcategorias , mostramos el select subcategoriesContainer
                    if (subcategories.length > 0) {
                        $('#subcategoriesContainer').show();
                        $('#subcategory').append('<option value="">Seleccione una Subcategoría</option>');
                        $.each(subcategories, function(index, subcategory) {
                            $('#subcategory').append('<option value="' + subcategory.uuid + '">' + subcategory.name + '</option>');
                        });

                    } else {
                        $('#subcategoriesContainer').hide();
                    }
                }
            });
        } else {
            $('#subcategoriesContainer').hide();
        }
    });

    // Lógica para Subsectores
    $('#sector').on('change', function() {
        var sectorId = $(this).val();
        $('#subsector').empty();
        if (sectorId) {
            var url = getSubSectorsUrl.replace(':id', sectorId);
            $.ajax({
                url: url,
                type: 'GET',
                success: function(subsectors) {
                    // si existen subsectores , mostramos el select subsectorsContainer
                    if (subsectors.length > 0) {
                        $('#subsectorsContainer').show();
                        $('#subsector').append('<option value="">Seleccione un Subsector</option>');
                        $.each(subsectors, function(index, subsector) {
                            $('#subsector').append('<option value="' + subsector.uuid + '">' + subsector.name + '</option>');
                        });
                    } else {
                        $('#subsectorsContainer').hide();
                    }
                }
            });


        } else {
            $('#subsectorsContainer').hide();
        }
    });



    });
</script>

{{-- select de las categorias de unidad  y detalles de "TERRENO"--}}
<script>
    $(document).ready(function() {

        var units = [];
        var unitCategories = @json($cashFlowUnitCategories);

        // Lógica para cargar UnitsSubcategorías y Units basadas en la Unitscategoría de unidad seleccionada
        $('#unitCategory').on('change', function() {
            var unitCategoryId = $(this).val();
            $('#UnitsSubcategory, #unit').empty();

            if (unitCategoryId) {
                // Ruta para obtener subcategorías
                var UnitSubcategoriesUrl = getUnitsSubCategoriesUrl.replace(':id', unitCategoryId);
                // Ruta para obtener unidades
                var unitsUrl = getUnitsUrl.replace(':id', unitCategoryId);

                // Solicitud AJAX para Units subcategorías
                $.ajax({
                    url: UnitSubcategoriesUrl,
                    type: 'GET',
                    success: function(subcategories) {

                        if (subcategories.length > 0) {
                            $('#unitsSubcategoriesContainer').show();
                            subcategories.forEach(function(subcategory) {
                                $('#UnitsSubcategory').append('<option value="' + subcategory.uuid + '">' + subcategory.name + '</option>');
                            });
                        } else {
                            $('#unitsSubcategoriesContainer').hide();
                        }
                    }
                });

                // Solicitud AJAX para unidades
                $.ajax({
                    url: unitsUrl,
                    type: 'GET',
                    success: function(data) {
                        units = data;
                        if (units.length > 0) {
                            $('#unitsContainer').show();
                            $('#unit').empty();
                            $('#unit').append('<option value="" selected>Seleccione una opción</option>');
                            units.forEach(function(unit) {
                                $('#unit').append('<option value="' + unit.uuid + '">' + unit.name + '</option>');
                            });
                        } else {
                            $('#unitsContainer').hide();
                        }
                    }
                });
            } else {
                $('#unitsSubcategoriesContainer, #unitsContainer').hide();
            }
        });

        // carga de los atributos de la unidad seleccionada
        $('#unit').change(function() {
            var unitId = $(this).val();
            var selectedUnit = units.find(function(unit) {
                return unit.uuid === unitId;
            });
            var attributesContainer = $('#unitAttributes');
            attributesContainer.empty();  // Limpia el contenedor del alerta
            if (selectedUnit.attributes) {
                var attributes = JSON.parse(selectedUnit.attributes);  // Parsea los atributos a un objeto
                var attributesText = '';
                Object.keys(attributes).forEach(function(key) {
                    var value = attributes[key];
                    if (value !== null) {  // Verifica si el atributo tiene un valor no nulo
                        attributesText += key + ': ' + value + '\n';
                    }
                });
                // Crea un alerta de Bootstrap y lo agrega al contenedor
                var textarea = $('<textarea class="form-control" style="height: 100px; readonly"></textarea>').val(attributesText);
                attributesContainer.append(textarea);
            }
        });

    });




    $('#unitCategory, #unit').change(function() {
        var selectedCategory = $('#unitCategory').find('option:selected').data('id'); // Obtener el ID de la categoría seleccionada
        var unit = $('#unit').val(); // Obtener la subcategoría seleccionada
        console.log("unit",unit);
        console.log("category",selectedCategory);

        if (selectedCategory == 2 && unit ) {
            $('#attributesContainer').show(); // Mostrar el contenedor de atributos si la categoría es 'uuid-de-tierra' y se ha seleccionado una subcategoría
            console.log("show");
        } else {
            console.log("hide");
            $('#attributesContainer').hide(); // Ocultar el contenedor de atributos en otros casos
        }
    });
</script>






{{-- SM 20240130 Se comento para que se pueda cargar un movimiento sin valor --}}
{{-- <script>
    $(document).ready(function() {
        // Cuando se cambia el valor del campo "amount"
        $('#amount').on('input', function() {
            if ($(this).val() !== '') {
                // Si el campo "amount" tiene un valor, quita el atributo "required" del campo "amount_usd"
                // y limpia el campo "amount_usd"
                $('#amount_usd').removeAttr('required').val('');
            } else if ($('#amount_usd').val() === '') {
                // Si ambos campos están vacíos, añade el atributo "required" a ambos
                $('#amount_usd').attr('required', true);
            }
        });

        // Cuando se cambia el valor del campo "amount_usd"
        $('#amount_usd').on('input', function() {
            if ($(this).val() !== '') {
                // Si el campo "amount_usd" tiene un valor, quita el atributo "required" del campo "amount"
                // y limpia el campo "amount"
                $('#amount').removeAttr('required').val('');
            } else if ($('#amount').val() === '') {
                // Si ambos campos están vacíos, añade el atributo "required" a ambos
                $('#amount').attr('required', true);
            }
        });
    });
</script> --}}

@stop
