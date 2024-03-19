<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>


<style>
    .table.dataTable.fixedHeader-floating, table.dataTable.fixedHeader-locked {
        background-color: #8f8c8c;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .div.dataTables_processing {
        position: absolute;
        top: 1%;
        left: 50%;
        width: 200px;
        margin-left: -100px;
        margin-top: -26px;
        text-align: center;
        padding: 2px;
    }

    div.dataTables_wrapper div.dataTables_processing {
    top: 0%;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 0 !important;
    }


</style>

<script>

var table;
var baseUrlShow = "{{ route('admin.cashflow.units.categories.show', ['cashFlowUnitCategory' => 'tempId']) }}";
var baseUrlEdit = "{{ route('admin.cashflow.units.categories.edit', ['cashFlowUnitCategory' => 'tempId']) }}";
var baseUrlDelete = "{{ route('admin.cashflow.units.categories.destroy', ['cashFlowUnitCategory' => 'tempId']) }}";
var getSubCategoriesUrl = "{{ route('admin.cashflow.units.categories.getSubCategories', ['cashFlowUnitCategory' => ':tempId']) }}";
var csrfToken = '{{ csrf_token() }}';



function activartabla() {
     // PERMISMOS
    //  var canDeleteCustomer = @can('customer_delete') true @else false @endcan;
    var canDeleteCustomer = true;
    var canEditCustomer = true;

    //con esto no nos muestra el alert al no enviar datos por ajax
    $.fn.dataTable.ext.errMode = 'throw';
    $('#datatable').DataTable().destroy();
    table = $('#datatable').DataTable({

        /*============================OPTIONS============================*/
        serverSide: true,
        processing: true,
        pagingType: "full_numbers",
        dom: "<'row'<'col-sm-12 col-md-6'lB><'col-sm-12 col-md-6'fp>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-12 col-md-6'i><'col-sm-12 col-md-6'p>>",
        buttons: [
            {
                text: '<span><i class="far fa-check-square"></i></span>', // Ícono de 'Seleccionar todos'
                titleAttr: 'Seleccionar todos',
                className: 'btn  btn-primary', // Clases para el estilo del botón
                action: function (e, dt, node, config) {
                    seleccionarTodosLosCheckbox(true);
                    $('#datatable-select-all').prop('checked', true).trigger('change');
                }
            },
            {
                text: '<i class="far fa-square"></i>', // Para 'Deseleccionar todos', usa el ícono de cuadrado
                titleAttr: 'Deseleccionar todos',
                className: 'btn  btn-primary',
                action: function (e, dt, node, config) {
                    seleccionarTodosLosCheckbox(false);
                    $('#datatable-select-all').prop('checked', false).trigger('change');
                }
            },
            {
                extend: 'copy',
                text: '<i class="fa fa-copy"></i>',
                titleAttr: 'Copy to clipboard',
                className: 'btn  btn-primary'
            },
            {
                extend: 'csv',
                text: '<i class="fa fa-file-csv"></i>',
                titleAttr: 'Download as CSV',
                className: 'btn  btn-primary'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel"></i>',
                titleAttr: 'Download as Excel',
                className: 'btn  btn-primary'
            },
            {
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf"></i>',
                titleAttr: 'Download as PDF',
                className: 'btn  btn-primary'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print table',
                className: 'btn  btn-primary'
            },
            @permission('cashflow-unit-subcategory-delete')
            {
                text: '<i class="fa fa-trash"></i>',
                titleAttr: 'Eliminar seleccionados',
                className: 'btn  btn-danger',
                action: function ( e, dt, node, config ) {
                    if (canDeleteCustomer) {
                        ModalMassDelete();
                    } else {
                        alert('No tienes permiso para eliminar registros.');
                    }
                }
            }
            @endpermission
        ],

        lengthMenu: [10, 25, 50, 100,200,500],
        pageLength: 50,
        order: [[ 1, "desc" ]],//ordenamiento por columna 0
        searching: true,
        fixedHeader: true,
        deferRender: true,
        responsive: true,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            //"loadingRecords": "Cargando...",
            "processing": "Cargando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        /*============================OPTIONS============================*/

        /*============================AJAX============================*/
        ajax: "{{ route('admin.cashflow.units.categories.indexDatatable') }}",
        /*============================AJAX============================*/

        /*============================COLUMNS============================*/
        columns: [
            {
                data: 'uuid',
                name: 'check',
                orderable: false,
                searchable: false,
                defaultContent: '', // Contenido por defecto (casilla de verificación)
                render: function(data, type, row) {
                    @permission('cashflow-unit-subcategory-delete')
                    return `<input type="checkbox" class="dt-checkboxes" value="${data}">`; // El checkbox con el valor del ID
                    @endpermission
                },
                title: '<input type="checkbox" name="select_all" value="1" id="datatable-select-all">', // Checkbox en el encabezado para seleccionar/deseleccionar todos
            },
            //name
            {
                data: 'name',
                name: 'name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            // description
            // {
            //     data: 'description',
            //     name: 'description',
            //     visible: true,
            //     searchable: true,
            //     orderable: true,
            //     render: function(data, type, row) {
            //         var html = '<span>' + data + '</span>';
            //         return html;
            //     }
            // },
            //action
            {
                data: 'uuid',
                name: 'action',
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    var showUrl = baseUrlShow.replace('tempId', data);
                    var editUrl = baseUrlEdit.replace('tempId', data);
                    var deleteUrl = baseUrlDelete.replace('tempId', data);
                    var buttons = '';

                    @permission('cashflow-unit-subcategory-create')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Agregar Subcategoría">
                        <button type="button" class="btn btn-success" onclick="ModalCreateSubCategory('${data}')">
                            <i class="fas fa-plus"></i>
                        </button>
                    </span>`;
                    @endpermission

                    @permission('cashflow-unit-category-view')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Ver">
                        <button type="button" class="btn btn-primary" onclick="ModalShow('${data}')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </span> `;
                    @endpermission

                    @permission('cashflow-unit-category-edit')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Editar">
                        <button type="button" class="btn btn-info" onclick="ModalEdit('${data}')">
                            <i class="fas fa-edit"></i>
                        </button>
                    </span> `;
                    @endpermission

                    @permission('cashflow-unit-category-delete')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Eliminar">
                        <button type="button" class="btn btn-danger" onclick="ModalDelete('${data}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </span>`;
                    @endpermission

                    @permission('cashflow-unit-subcategory-view')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Detalles">
                        <button type="button" class="btn btn-secondary details-control">
                            <i class="fa fa-chevron-down"></i>
                        </button>
                    </span> `;
                    @endpermission

                    return buttons;
                }
            },


        ],
        /*============================COLUMNS============================*/
        initComplete: function() {
            // Elimina la clase 'dt-button' de todos los botones en el contenedor de DataTables
            $('.dt-buttons .btn').removeClass('dt-button');
        }

    });

}
activartabla();


//scroll to top function
function scrollToTop() {
    (function smoothscroll() {
        var currentScroll = document.documentElement.scrollTop || document.body.scrollTop;
        if (currentScroll > 0) {
            window.requestAnimationFrame(smoothscroll);
            window.scrollTo(0, currentScroll - (currentScroll / 5));
        }
    })();
}

function initEventHandlers() {
    // Inicializa los manejadores de eventos para el checkbox "Seleccionar todos"
    $('#datatable-select-all').on('click', toggleSelectAll);

    // Inicializa los manejadores de eventos para los checkboxes individuales de cada fila
    $('#datatable tbody').on('change', 'input[type="checkbox"]', handleRowCheckboxChange);
}

function toggleSelectAll() {
    var checked = this.checked;
    seleccionarTodosLosCheckbox(checked);
    actualizarSelectAllCheckboxState();
}

function handleRowCheckboxChange() {
    actualizarSelectAllCheckboxState();
}

function seleccionarTodosLosCheckbox(checked) {
    var rows = table.rows({ 'search': 'applied' }).nodes();
    $('input[type="checkbox"]', rows).prop('checked', checked);
}

function actualizarSelectAllCheckboxState() {
    var allChecked = table.rows({ 'search': 'applied' }).nodes().length === $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).length;
    var selectAllCheckbox = $('#datatable-select-all').get(0);
    selectAllCheckbox.checked = allChecked;
    selectAllCheckbox.indeterminate = !allChecked && $('input[type="checkbox"]:checked', table.rows({ 'search': 'applied' }).nodes()).length > 0;
}


$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();

    $('#datatable').on( 'page.dt',   function () { scrollToTop();
        } ).dataTable();

    // Inicializa la tabla y los manejadores de eventos
    initEventHandlers();
});

/*===================================MODALES===============================*/

function ModalDelete(data) {
    // Muestra el modal de confirmación de eliminación
    $('#delete').modal('show');
    //asignamos en el input hiiden data.id
    $('#uuid_delete').val(data);
}


function ModalMassDelete() {
    var uuids = $('input.dt-checkboxes:checkbox:checked').map(function() {
        return this.value;
    }).get();

    if (uuids.length > 0) {
        // Actualiza el valor del campo oculto con los IDs
        $('#uuids_delete').val(uuids.join(','));
        // Muestra el modal de confirmación
        $('#massDelete').modal('show');
    } else {
        alert("No hay registros seleccionados.");
    }
}



function ModalEdit(uuid) {
    var url = baseUrlEdit.replace('tempId', uuid);
    $.get(url, function(data) {
        //guardamos el uuid en mi input hidden
        $('#uuid_edit').val(data.uuid);
        //asignamos los valores a los inputs
        $('#name_edit').val(data.name);
        $('#description_edit').val(data.description);
    });
    $('#edit').modal('show');
}


function ModalShow(uuid) {
    // Actualiza los elementos del modal con la información de la categoría
    var url = baseUrlShow.replace('tempId', uuid);
    $.get(url, function(data) {
        //asignamos los valores a los inputs
        $('#name_show').text(data.name);
        $('#description_show').text(data.description);
    });

    // Muestra el modal
    $('#show').modal('show');
}





/*=========================================================SUBCATEGORIAS====================================*/
// Asegúrate de que este código se ejecuta después de que la DataTable principal está inicializada
// Función para manejar el evento de clic en la columna de control de detalles
$('#datatable').on('click', '.details-control', function() {
    var tr = $(this).closest('tr');
    var row = table.row(tr);
    var uuid = row.data().uuid;

    if (row.child.isShown()) {
        $(`#subcategorias-datatable-${uuid}`).DataTable().destroy();
        row.child.hide();
        tr.removeClass('shown');
    } else {
        var url = getSubCategoriesUrl.replace(':tempId', uuid);
        $.get(url, function(subcategorias) {
            var childRowId = `subcategorias-datatable-${uuid}`;
            row.child(`<div><table class="table subcategorias-datatable" id="${childRowId}"></table></div>`).show();
            tr.addClass('shown');
            initializeSubcategoriesDataTable(childRowId, subcategorias);
        });
    }
});

// Función para inicializar DataTables para subcategorías
function initializeSubcategoriesDataTable(tableId, subcategoriasData) {
    $(`#${tableId}`).DataTable({
        data: subcategoriasData,
        columns: [
            {
                title: 'Nombre',
                data: 'name',
                name: 'name',
                visible: true,
                searchable: false,
                orderable: false ,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            {
                title: 'Descripción',
                data: 'description',
                name: 'description',
                visible: true,
                searchable: false,
                orderable: false ,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            {
                data: null,
                orderable: false,
                render: function(data, type, row) {
                    var buttons = '';

                    @permission('cashflow-unit-subcategory-edit')
                    buttons += `<button type="button" class="btn btn-info" onclick="ModalEditSubCategory('${data.uuid}')">Editar</button>`;
                    @endpermission

                    @permission('cashflow-unit-subcategory-delete')
                    buttons += `<button type="button" class="btn btn-danger" onclick="ModalDeleteSubCategory('${data.uuid}')">Eliminar</button>`;
                    @endpermission

                    return buttons;
                }
            }
        ],
        paging: false,
        searching: false,
        info: false,
        order: [],//ordenamiento por columna 0
        destroy: true // Esto es importante para reinicializar la tabla
    });
}

// Funciones para acciones de subcategorías
function ModalCreateSubCategory(uuid) {
    //asignamos el uuid de la categoria padre
    $('#uuid_category').val(uuid);
    //abrimos modal subcategoria
    $('#createSubcategory').modal('show');
}

function ModalEditSubCategory(uuid) {
    // Actualiza los elementos del modal con la información de la categoría

    var baseUrlEditSubcategory = "{{ route('admin.cashflow.units.subcategories.edit', ['cashFlowUnitSubCategory' => 'tempId']) }}";
    var url = baseUrlEditSubcategory.replace('tempId', uuid);
    url = url.replace('tempId', uuid);
    $.get(url, function(data) {
        //guardamos el uuid en mi input hidden
        $('#uuid_edit_subcategory').val(data.uuid);
        //asignamos los valores a los inputs
        $('#name_edit_subcategory').val(data.name);
        $('#description_edit_subcategory').val(data.description);
    });

    // Muestra el modal
    $('#editSubcategory').modal('show');
}

function ModalDeleteSubCategory(uuid) {
   //asignamos el uuid de la subcategoria
    $('#uuid_delete_subcategory').val(uuid);

    //abrimos modal subcategoria
    $('#deleteSubcategory').modal('show');
}
</script>
