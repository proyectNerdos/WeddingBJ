{{-- Extiende la plantilla base --}}
@extends('layouts.theme-admin.volgh.index')

@section('title-module')
    <div>
        <h1 class="page-title">Flujo de Efectivo</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{!! URL::to('/') !!}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{!! URL::to('/cashflow') !!}">Flujo de Efectivo</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            @include('flash::message')
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Editar Flujo de Efectivo</h4>
                </div>
                <div class="card-body">
                    {{-- Asegúrate de usar la instancia correcta de cashFlow y el método de actualización adecuado --}}
                    <form action="{{ route('admin.cashflow.update', $cashFlow->uuid) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Asegúrate de rellenar el formulario con los datos del cashFlow --}}
                        {{-- Ejemplo: --}}
                        <div class="row">

                            {{-- CARD DATOS --}}
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">DATOS</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                                  {{-- Tipo --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="type">Tipo</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-align-justify"></i>
                                                                    </span>
                                                                </div>
                                                                <select class="form-control select2" id="type" name="type">
                                                                    <option value="">Seleccione un Tipo</option>
                                                                    <option value="income" {{ $cashFlow->type == 'income' ? 'selected' : '' }}>Ingreso</option>
                                                                    <option value="expense" {{ $cashFlow->type == 'expense' ? 'selected' : '' }}>Egreso</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Monto --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="amount">Monto</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-dollar-sign"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="amount" name="amount" value="{{ $cashFlow->amount }}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Monto USD --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="amount_usd">Monto(USD)</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-dollar-sign"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="amount_usd" name="amount_usd"  value="{{ $cashFlow->amount_usd }}" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Fecha --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="date">Fecha</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                            <i class="fas fa-calendar-alt"></i>
                                                                        </span>
                                                                </div>
                                                                <input type="text" class="form-control datetimepicker" id="date" name="date" value="{{ $cashFlow->date }}" required autocomplete="off">
                                                            </div>

                                                        </div>
                                                    </div>

                                                    {{-- N° Remito --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="remittance">N° de Remito / N° de Orden de Trabajo</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-file-invoice"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="remittance_number" name="remittance_number" value="{{ $cashFlow->remittance_number }}" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- N° Factura --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="remito">N° Factura</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-file-invoice"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="invoice_number" name="invoice_number" value="{{ $cashFlow->invoice_number }}" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Subtotal --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">

                                                            <label for="subtotal">Subtotal</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">
                                                                        <i class="fas fa-dollar-sign"></i>
                                                                    </span>
                                                                </div>
                                                                <input type="text" class="form-control" id="subtotal_number" name="subtotal" value="{{ $cashFlow->subtotal_number}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                        {{-- IVA --}}
                                                        <div class="col-md-4">
                                                            <div class="form-group">

                                                                <label for="iva">IVA</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-dollar-sign"></i>
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="iva_number" name="iva" value="{{ $cashFlow->iva_number}}" >
                                                                </div>
                                                            </div>
                                                        </div>

                                                            {{-- Percepcion --}}
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="percepcion">Percepcion</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-dollar-sign"></i>
                                                                            </span>
                                                                        </div>
                                                                        <input type="text" class="form-control" id="percepcion_number" name="percepcion" value="{{ $cashFlow->percepcion_number}}" >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                    {{-- Cliente --}}
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="client_id">Cliente</label>
                                                            <select class="form-control select2" id="client_id" name="client_id">
                                                                <option value="">Seleccione una Opcion</option>
                                                                @foreach ($clients as $client)
                                                                    <option value="{{ $client->id }}" {{ $client->id == $cashFlow->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
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

                                                {{-- centro de gastos --}}
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="category">Seleccione la Empresa y el Área
                                                        </label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-align-justify"></i>
                                                                </span>
                                                            </div>
                                                            <select class="form-control select2" id="category" name="category_id" required>
                                                                <option value="">Seleccione una opcion</option>
                                                                {{-- Asegúrate de seleccionar la categoría actual --}}
                                                                @foreach ($cashFlowCategories as $category)
                                                                    <option value="{{ $category->uuid }}" {{ $category->id == $cashFlow->category_id ? 'selected' : '' }}>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>



                                                {{-- Subcategorías --}}
                                                {{-- <div class="col-md-6">
                                                    <div class="form-group" id="subcategoriesContainer" style="display: none;">
                                                        <label for="subcategory">Subcategoría</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-align-justify"></i>
                                                                </span>
                                                            </div>
                                                            <select class="form-control select2" id="subcategory" name="subcategory_id">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="sector">Área</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fas fa-align-justify"></i>
                                                                </span>
                                                            </div>
                                                            <select class="form-control select2" id="sector" name="sector_id" required>
                                                                <option value="">Seleccione una Opcion</option>
                                                                {{-- Asegúrate de seleccionar el sector actual --}}
                                                                @foreach ($cashFlowSectors as $sector)
                                                                    <option value="{{ $sector->uuid }}" {{ $sector->id == $cashFlow->sector_id ? 'selected' : '' }}>
                                                                        {{ $sector->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- CARD SECTORES --}}
                            {{-- <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">SECTORES</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sector">Área</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-align-justify"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="sector" name="sector_id" required>
                                                            <option value="">Seleccione un Sector</option>
                                                            @foreach ($cashFlowSectors as $sector)
                                                                <option value="{{ $sector->uuid }}" {{ $sector->id == $cashFlow->sector_id ? 'selected' : '' }}>
                                                                    {{ $sector->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group" id="subsectorsContainer" style="display: none;">
                                                    <label for="subsector">Subsector</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-align-justify"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="subsector" name="subsector_id">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- CARD CATEGORIAS & ITEMS --}}
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Selección de Categorías:</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                             {{-- Categorías de Unidad --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="unitCategory">Categoría</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-align-justify"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="unitCategory" name="unit_category_id" required>
                                                            <option value="">Seleccione una Opcion</option>
                                                            {{-- Asegúrate de seleccionar la categoría de unidad actual --}}
                                                            @foreach ($cashFlowUnitCategories as $unitCategory)
                                                                <option value="{{ $unitCategory->uuid }}" data-id="{{ $unitCategory->id }}" {{ $unitCategory->id == $cashFlow->unit_category_id ? 'selected' : '' }}>
                                                                    {{ $unitCategory->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Subcategorías de Unidad --}}
                                            <div class="col-md-6">
                                                <div class="form-group" id="unitsSubcategoriesContainer" style="display: none;">
                                                    <label for="UnitsSubcategory">Subcategoría</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                                        </div>
                                                        <select class="form-control select2" id="UnitsSubcategory" name="units_subcategory_id">
                                                            {{-- Las opciones se llenarán dinámicamente con JavaScript --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- item --}}
                                            <div class="col-md-12">
                                                <div class="form-group" id="unitsContainer" style="display: none;">
                                                    <label for="unit">Item</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-align-justify"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="unit" name="unit_id">
                                                            {{-- Las opciones se llenarán dinámicamente con JavaScript --}}
                                                        </select>
                                                    </div>
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
                                                            <input type="text" class="form-control" id="hectareas" name="hectareas" placeholder="Ingrese la hectarea trabajada" value="{{ json_decode($cashFlow->service_details)->hectareas }}">
                                                        </div>
                                                    </div>

                                                    {{-- servicios --}}
                                                    <div class="form-group">
                                                        <label for="service">Servicios</label>
                                                        <div class="d-flex align-items-center">
                                                            <span class="input-group-text">
                                                            <i class="fas fa-leaf"></i>
                                                            </span>
                                                            <select class="form-control select2 custom-select2-width multiple" id="service_id" name="service_ids[]"  data-placeholder="Seleccione un Servicio" multiple style="width: 100%">
                                                                <option></option> <!-- Opción vacía para el placeholder -->
                                                                @if($services->isEmpty())
                                                                    <option disabled>No hay servicios disponibles</option>
                                                                @else
                                                                    @foreach ($services as $service)
                                                                        <option value="{{ $service->id }}" {{ in_array($service->id, $cashFlow->details->pluck('service.id')->toArray()) ? 'selected' : '' }}>{{ $service->name }}</option>
                                                                    @endforeach
                                                                @endif
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
                                                            <input type="text" class="form-control" id="machine" name="machine" placeholder="Ingrese la maquina que se uso" value="{{ json_decode($cashFlow->service_details)->machine }}">
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
                                                            <input type="text" class="form-control" id="tractor" name="tractor" placeholder="Ingrese el tractor" value="{{ json_decode($cashFlow->service_details)->tractor }}">
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
                                                            <input type="text" class="form-control" id="implement" name="implement" placeholder="Ingrese el Implemento" value="{{ json_decode($cashFlow->service_details)->implement }}">
                                                        </div>
                                                    </div>

                                                    @php
                                                        $cropIds = data_get(json_decode($cashFlow->service_details, true), 'crop_id', []);
                                                        if (is_array($cropIds)) {
                                                            $cropIds = array_map('intval', $cropIds);
                                                        }
                                                    @endphp

                                                    {{-- select de cultivos --}}
                                                    <div class="form-group">
                                                        <label for="crop">Cultivos</label>
                                                        <div class="d-flex align-items-center">
                                                            <span class="input-group-text">
                                                            <i class="fas fa-leaf"></i>
                                                            </span>
                                                            <select class="form-control select2 custom-select2-width" id="crop" name="crop_id[]" multiple data-placeholder="Seleccione un Cultivo" style="width: 100%">
                                                                <option></option>
                                                                @if(is_array($cropIds))
                                                                    @foreach (\Modules\CashFlow\Entities\CashFlow::CROPS as $id => $crop)
                                                                    @if (is_array($cropIds))
                                                                        <option value="{{ $id }}" {{ in_array($id, $cropIds) ? 'selected' : '' }}>{{ $crop }}</option>
                                                                    @else
                                                                        <option value="{{ $id }}">{{ $crop }}</option>
                                                                    @endif
                                                                    @endforeach
                                                                @else
                                                                    @foreach (\Modules\CashFlow\Entities\CashFlow::CROPS as $id => $crop)
                                                                        <option value="{{ $id }}">{{ $crop }}</option>
                                                                    @endforeach
                                                                @endif


                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- <label for="unit">Atributos</label> --}}
                                                    <div id="unitAttributes">

                                                    </div>

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

                                            {{-- Select de Operarios --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="employee">Operario</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="employee" name="employee_id">
                                                            <option value="">Seleccione una opcion</option>
                                                            {{-- Recorre la lista de empleados y muestra cada opción --}}
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->uuid }}" {{ $employee->id == $cashFlow->employee_id ? 'selected' : '' }}>
                                                                    {{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Select de Ayudante uno --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="employee">Ayudante uno</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="employee_sec1" name="employee_sec1_id">
                                                            <option value="">Seleccione una opcion</option>
                                                            {{-- Recorre la lista de empleados y muestra cada opción --}}
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->uuid }}" {{ $employee->id == $cashFlow->employee_sec1_id ? 'selected' : '' }}>
                                                                    {{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Select de Ayudante dos --}}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="employee">Ayudante dos</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fas fa-user"></i>
                                                            </span>
                                                        </div>
                                                        <select class="form-control select2" id="employee_sec2" name="employee_sec2_id">
                                                            <option value="">Seleccione una opcion</option>
                                                            {{-- Recorre la lista de empleados y muestra cada opción --}}
                                                            @foreach ($employees as $employee)
                                                                <option value="{{ $employee->uuid }}" {{ $employee->id == $cashFlow->employee_sec2_id ? 'selected' : '' }}>
                                                                    {{ $employee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                                                    <input type="number" class="form-control" id="operator_hours" name="operator_hours" placeholder="Horas trabajadas por el Operario" pattern="\d*" value="{{ $cashFlow->operator_hours }}">
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
                                                    <input type="number" class="form-control" id="helper1_hours" name="helper1_hours" placeholder="Horas trabajadas por el Ayudante uno" pattern="\d*" value="{{ $cashFlow->helper1_hours }}">
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
                                                    <input type="number" class="form-control" id="helper2_hours" name="helper2_hours" placeholder="Horas trabajadas por el Ayudante dos" pattern="\d*" value="{{ $cashFlow->helper2_hours }}">
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
                                                    <textarea class="form-control" id="details" name="details">{{ $cashFlow->detail }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('admin.cashflow.index') }}" class="btn btn-danger">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




@section('mis-scripts')


{{-- include datetimepicker --}}
@include('cashflow::admin.cashflow.js.datepicker')
{{-- include inputmask --}}
@include('cashflow::admin.cashflow.js.inputmask')
{{-- include select2 --}}
@include('cashflow::admin.cashflow.js.select2')

{{-- edit de productos --}}
<script>

    var products = @json($products);
    $(document).ready(function() {
        $('.select2').select2();

        // Para cada detalle del producto
        @foreach($cashFlow->details as $detail)
         // Verifica si el producto existe
         @if($detail->product)
            // Crea una nueva fila
            var row = $('<tr>');

            // Agrega decimales a la cantidad y al consumo
            row.append('<td class="col-md-3"><input type="text" name="product_description[]" class="form-control" value="{{ $detail->product->description }}" readonly></td>');
            row.append('<td><div class="d-flex"><div class="col-md-4 p-0"><input type="text" name="product_quantity[]" class="form-control" value="{{ $detail->product_quantity }}"></div> <select name="measurement_unit[]" class="form-control select2">@foreach($unitsOfMeasures as $key => $value)<option value="{{ $key }}" {{ $detail->measurement_unit_id == $key ? 'selected' : '' }}>{{ $value }}</option>@endforeach</select></div></td>');
            row.append('<td><div class="d-flex"><div class="col-md-4 p-0"><input type="text" name="consumed_quantity[]" class="form-control" value="{{ $detail->consumed_quantity }}"></div> <select name="consumed_measurement_unit[]" class="form-control select2">@foreach($unitsOfMeasures as $key => $value)<option value="{{ $key }}" {{ $detail->consumed_measurement_unit_id == $key ? 'selected' : '' }}>{{ $value }}</option>@endforeach</select></div></td>');



            row.find('.select2').select2();

            // Agrega un botón de eliminar a la fila
            var deleteButton = $('<button type="button" class="btn btn-danger">Eliminar</button>');
            row.append($('<td>').append(deleteButton));

            // Agrega un campo oculto con el id del producto
            row.append('<input type="hidden" name="product_id[]" value="{{ $detail->product->id }}">');

            // Agrega la fila a la tabla
            $('#products-table tbody').append(row);
            @endif
        @endforeach



        // Adjunta el evento click al botón de agregar
        $('#add-product').click(function() {
            // Obtén el producto seleccionado
            var productId = $('#product').val();
            var product = products.find(function(product) {
                return product.id == productId;
            });

            // Crea una nueva fila
            var row = $('<tr>');

            // Agrega las celdas a la fila

            row.append('<td class="col-md-3"><input type="text" name="product_description[]" class="form-control" value="' + product.description + '" readonly></td>');
            row.append('<td><div class="d-flex"><div class="col-md-4 p-0"><input type="text" name="product_quantity[]" class="form-control quantity" required></div> <select name="measurement_unit[]" class="form-control select2">@foreach($unitsOfMeasures as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select></div></td>');
            row.append('<td><div class="d-flex"><div class="col-md-4 p-0"><input type="text" name="consumed_quantity[]" class="form-control quantity" required></div> <select name="consumed_measurement_unit[]" class="form-control select2">@foreach($unitsOfMeasures as $key => $value)<option value="{{ $key }}">{{ $value }}</option>@endforeach</select></div></td>');

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

            // Inicializa el plugin Select2
            row.find('.select2').select2();
        });

        // Adjunta el evento click a los botones de eliminar
        $(document).on('click', '.btn-danger', function() {
            $(this).closest('tr').remove();
        });
    });
</script>

{{-- select anidados --}}
<script>
    $(document).ready(function() {
        // Inicializar Select2 para todos los select
        $('.select2').select2();

        // Funciones para cargar los datos
        function loadSubcategories(categoryId, selectedSubcategoryId = null) {

            var url = "{{ route('admin.cashflow.categories.getSubCategories', ['cashFlowCategory' => ':id']) }}".replace(':id', categoryId);
            $('#subcategory').empty();

            $.ajax({
                url: url,
                type: 'GET',
                success: function(subcategories) {

                    if (subcategories.length > 0) {
                        $('#subcategoriesContainer').show();
                        var subcategorySelect = $('#subcategory').empty();
                        subcategorySelect.append('<option value="">Seleccione una Subcategoría</option>');
                        subcategories.forEach(function(subcategory) {
                            var isSelected = subcategory.id == selectedSubcategoryId;
                            subcategorySelect.append(new Option(subcategory.name, subcategory.uuid, false, isSelected));
                        });
                        //cargamos el select2
                        subcategorySelect.select2();

                        // Asegurarte de que Select2 se actualice después de modificar las opciones
                        subcategorySelect.trigger('change');
                    } else {
                        $('#subcategoriesContainer').hide();
                    }
                }
            });
        }

        function loadSubsectors(sectorId, selectedSubsectorId = null) {
            var url = "{{ route('admin.cashflow.sectors.getSubSectors', ['cashFlowSector' => ':id']) }}".replace(':id', sectorId);
            $('#subsector').empty();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(subsectors) {
                    if (subsectors.length > 0) {
                        $('#subsectorsContainer').show();
                        var subsectorSelect = $('#subsector').empty();
                        subsectorSelect.append('<option value="">Seleccione un Subsector</option>');
                        subsectors.forEach(function(subsector) {
                            var isSelected = subsector.id == selectedSubsectorId;
                            subsectorSelect.append(new Option(subsector.name, subsector.uuid, false, isSelected));
                        });
                        //cargamos el select2
                        subsectorSelect.select2();
                    } else {
                        $('#subsectorsContainer').hide();
                    }
                }
            });
        }

        function loadUnitSubcategories(unitCategoryId, selectedUnitSubcategoryId = null) {
            var url = "{{ route('admin.cashflow.units.categories.getSubCategories', ['cashFlowUnitCategory' => ':id']) }}".replace(':id', unitCategoryId);
            $('#UnitsSubcategory').empty();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(unitSubcategories) {
                    if (unitSubcategories.length > 0) {
                        $('#unitsSubcategoriesContainer').show();
                        var unitSubcategorySelect = $('#UnitsSubcategory').empty();
                        unitSubcategorySelect.append('<option value="">Seleccione una Subcategoría de Unidad</option>');
                        unitSubcategories.forEach(function(unitSubcategory) {
                            var isSelected = unitSubcategory.id == selectedUnitSubcategoryId;
                            unitSubcategorySelect.append(new Option(unitSubcategory.name, unitSubcategory.uuid, false, isSelected));
                        });
                        unitSubcategorySelect.select2();
                    } else {
                        $('#unitsSubcategoriesContainer').hide();
                    }
                }
            });
        }

        function loadUnits(unitCategoryId, selectedUnitId = null) {
            var url = "{{ route('admin.cashflow.units.categories.getUnits', ['cashFlowUnitCategory' => ':id']) }}".replace(':id', unitCategoryId);
            $('#unit').empty();
            $.ajax({
                url: url,
                type: 'GET',
                success: function(units) {
                    if (units.length > 0) {
                        $('#unitsContainer').show();
                        var unitSelect = $('#unit').empty();
                        unitSelect.append('<option value="">Seleccione una Unidad</option>');
                        units.forEach(function(unit) {
                            var isSelected = unit.id == selectedUnitId;
                            unitSelect.append(new Option(unit.name, unit.uuid, false, isSelected));
                        });
                        unitSelect.select2();
                    } else {
                        $('#unitsContainer').hide();
                    }
                }
            });
        }

        // Cargar subcategorías si hay una categoría seleccionada
        var selectedCategoryId = $('#category').val();
        if(selectedCategoryId) {
            loadSubcategories(selectedCategoryId, '{{ $cashFlow->subcategory_id ?? null }}');
        }

        // Cargar subsectores si hay un sector seleccionado
        var selectedSectorId = $('#sector').val();
        if(selectedSectorId) {
            loadSubsectors(selectedSectorId, '{{ $cashFlow->subsector_id ?? null }}');
        }

        // Cargar subcategorías y unidades de la categoría de unidad seleccionada
        var selectedUnitCategoryId = $('#unitCategory').val();
        if(selectedUnitCategoryId) {
            loadUnitSubcategories(selectedUnitCategoryId, '{{ $cashFlow->unit_subcategory_id ?? null }}');
            loadUnits(selectedUnitCategoryId, '{{ $cashFlow->unit_id ?? null }}');
        }

        // Cargar unidades si hay una categoría de unidad seleccionada
        // Similar a los ejemplos anteriores...

        // Evento change para el select de categorías
        $('#category').on('change', function() {
            var categoryId = $(this).val();
            loadSubcategories(categoryId);
        });

        // Evento change para el select de sectores
        $('#sector').on('change', function() {
            var sectorId = $(this).val();
            loadSubsectors(sectorId);
        });

        // Evento change para el select de categorías de unidad
        $('#unitCategory').on('change', function() {
            var unitCategoryId = $(this).val();
            loadUnitSubcategories(unitCategoryId);
            loadUnits(unitCategoryId);
        });

    });
</script>

{{-- validacion de montos --}}
<script>
    $(document).ready(function() {
            // Verifica los valores iniciales de los campos
            if ($('#amount').val() !== '') {
                $('#amount_usd').removeAttr('required');
            }
            if ($('#amount_usd').val() !== '') {
                $('#amount').removeAttr('required');
            }

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
</script>


{{-- si la Unit Category es "Tierra" , despliega los campos --}}
<script>

    $('#unitCategory, #unit').change(function() {
        var selectedCategory = $('#unitCategory').find('option:selected').data('id'); // Obtener el ID de la categoría seleccionada
        var unit = $('#unit').val(); // Obtener la subcategoría seleccionada
        if (selectedCategory == 2 && unit) {
            $('#attributesContainer').show(); // Mostrar el contenedor de atributos si la categoría es 'uuid-de-tierra' y se ha seleccionado una subcategoría
        } else {
            $('#attributesContainer').hide(); // Ocultar el contenedor de atributos en otros casos
        }
    });

    var cashFlow = @json($cashFlow);
    var unitCategoryId = cashFlow.unit_category ? cashFlow.unit_category.id : null;
    if (unitCategoryId == 2) {
        var details = cashFlow.service_details;
        $('#attributesContainer').show();
    } else {
        $('#attributesContainer').hide();
    }
</script>


@endsection
