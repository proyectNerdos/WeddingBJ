<div class="modal fade" id="showCashFlowModal" tabindex="-1" role="dialog" aria-labelledby="showCashFlowModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showCashFlowModalLabel">Detalles del Flujo de Efectivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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

                                    {{-- tipo --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Tipo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-align-justify"></i> <!-- Ícono de FontAwesome -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showType" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- amount --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Monto($)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            <i class="fas fa-dollar-sign"></i> <!-- Ícono de FontAwesome -->
                                                        </span>
                                                </div>
                                                <input type="text" class="form-control" id="showAmount" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- amount usd --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Monto(USD)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                            <i class="fas fa-dollar-sign"></i> <!-- Ícono de FontAwesome -->
                                                        </span>
                                                </div>
                                                <input type="text" class="form-control" id="showAmountUsd" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- fecha --}}
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showDate" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Remito --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>N° Remito</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-file-invoice"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showRemittanceNumber" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- factura --}}
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>N° Factura</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-file-invoice"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showInvoiceNumber" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Subtotal --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Subtotal($)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showSubtotal" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- factura --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>IVA($)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showIva" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- factura --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Percepción($)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showPercepcion" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Cliente --}}
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Cliente</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showClient" readonly>
                                            </div>
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
                                <h5 class="card-title">CENTRO DE GASTOS</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Categoría</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-align-justify"></i> <!-- Ícono de FontAwesome -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showCategory" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subcategoría</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-list-ul"></i> <!-- Ícono de FontAwesome -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showSubcategory" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD SECTOR Y SUBSECTOR --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">SECTORES</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Sectores -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sector</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-industry"></i> <!-- Ícono para Sector -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showSector" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Subsectores -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subsector</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-cogs"></i> <!-- Ícono para Subsector -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showSubsector" readonly>
                                            </div>
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
                                <h5 class="card-title">CATEGORIAS & ITEMS</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Categorías de Unidad -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Categoría</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-layer-group"></i> <!-- Ícono para Categoría de Unidad -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showUnitCategory" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Subcategorías de Unidad -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subcategoría</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-th-list"></i> <!-- Ícono para Subcategoría de Unidad -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showUnitsSubcategory" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Unidades -->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Item</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-cube"></i> <!-- Ícono para Unidad -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showUnit" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                    <div class="" id="attributesContainer_show" style="display: none;" >

                                        {{-- hectareas --}}
                                        <div class="form-group">
                                            <label for="Hectareas">Hectareas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-map"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showHectareas"  readonly>
                                            </div>
                                        </div>

                                        {{-- servicios --}}
                                        <div class="form-group">
                                            <label for="service">Servicios</label>
                                            <div class="d-flex align-items-center">
                                                <span class="input-group-text">
                                                <i class="fas fa-leaf"></i>
                                                </span>
                                                <select class="form-control select2 custom-select2-width" id="showService" multiple readonly>
                                                    <option value="">Seleccione un Servicio</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control" id="noServices" value="No hay servicios" readonly style="display: none;">
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
                                                <input type="text" class="form-control" id="showMachine" readonly>
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
                                                <input type="text" class="form-control" id="showTractor" readonly>
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
                                                <input type="text" class="form-control" id="showImplement" readonly>
                                            </div>
                                        </div>


                                        {{-- select de cultivos --}}
                                        <div class="form-group">
                                            <label for="crop">Cultivos</label>
                                            <div class="d-flex align-items-center">
                                                <span class="input-group-text">
                                                <i class="fas fa-leaf"></i>
                                                </span>
                                                <select class="form-control select2 custom-select2-width" id="showCrop" multiple>
                                                    <option value="">Seleccione un Cultivo</option>
                                                    @foreach (\Modules\CashFlow\Entities\CashFlow::CROPS as $id => $crop)
                                                        <option value="{{ $id }}">{{ $crop }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="text" class="form-control" id="noCrop" value="No hay Cultivos" readonly style="display: none;">
                                            </div>
                                        </div>

                                        <label for="unit">Atributos</label>
                                        <div id="unitAttributes">

                                        </div>

                                    </div>



                            </div>
                        </div>
                    </div>

                    {{-- CARD OPERARIOS --}}
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">OPERARIOS</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                     <!-- Operario -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Operario</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i> <!-- Ícono para Empleado -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showEmployee" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ayudante Uno -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ayudante uno</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i> <!-- Ícono para Empleado -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showEmployeeSec1" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Ayudante dos -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ayudante dos</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-user"></i> <!-- Ícono para Empleado -->
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showEmployeeSec2" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Horas trabajadas del operario --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Horas trabajadas del operario</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showOperatorHours"  readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Horas trabajadas del ayudante uno --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Horas trabajadas del ayudante uno</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showHelper1Hours"  readonly>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Horas trabajadas del ayudante dos --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Horas trabajadas del ayudante dos</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-clock"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="showHelper2Hours" readonly>
                                            </div>
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
                                <table class="table table-bordered table-striped table-hover" id="productTable">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Consumido</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    </tbody>
                                </table>
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
                                            <label>Detalles</label>
                                            <textarea class="form-control" id="showDetails" rows="3" readonly ></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
