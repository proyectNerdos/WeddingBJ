@permission('cashflow-access')



@permission('cashflow-access')
<li>
    <a class="side-menu__item" href="{{ route('admin.cashflow.index') }}">
    <i class="fas fa-box side-menu__icon ti-panel"></i>
    <span class="side-menu__label">Caja</span></a>
</li>
@endpermission




<li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="#">
        <i class="fas fa-cog side-menu__icon ti-panel"></i>
        <span class="side-menu__label">Configuracion de Caja</span>
        <i class="angle fa fa-angle-right"></i>
    </a>
    <ul class="slide-menu">

        @permission('cashflow-category-access')
        <li><a href="{!! route('admin.cashflow.categories.index') !!}" class="slide-item"> Empresa</a></li>
        @endpermission

        @permission('cashflow-sector-access')
        <li><a href="{!! route('admin.cashflow.sectors.index') !!}" class="slide-item"> Área de Empresa</a></li>
        @endpermission

        @permission('cashflow-unit-access')
        <li><a href="{!! route('admin.cashflow.units.index') !!}" class="slide-item"> Vehículos/Fincas</a></li>
        @endpermission

        @permission('cashflow-unit-category-access')
        <li><a href="{!! route('admin.cashflow.units.categories.index') !!}" class="slide-item"> Categorias/Subcategorías </a></li>
        @endpermission

        @permission('client-access')
        <li><a href="{!! route('admin.client.index') !!}" class="slide-item"> Clientes / Proveedores </a></li>
        @endpermission

        @permission('employee-access')
        <li><a href="{!! route('admin.employee.index') !!}" class="slide-item"> Empleados </a></li>
        @endpermission

        @permission('product-access')
        <li><a href="{!! route('admin.product.index') !!}" class="slide-item"> Productos </a></li>
        @endpermission

    </ul>
</li>

@endpermission
