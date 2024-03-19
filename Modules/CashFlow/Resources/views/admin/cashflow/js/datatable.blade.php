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
var baseUrlShow = "{{ route('admin.cashflow.show', ['cashFlow' => 'tempId']) }}";
var baseUrlEdit = "{{ route('admin.cashflow.edit', ['cashFlow' => 'tempId']) }}";
var baseUrlDelete = "{{ route('admin.cashflow.destroy', ['cashFlow' => 'tempId']) }}";
{{--  var getSubSectorsUrl = "{{ route('admin.cashflow.sectors.getSubSectors', ['cashFlow' => ':tempId']) }}";--}}
var getSubSectorsUrl = null;
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


            @permission('cashflow-delete')
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
        order: [[ 2, "desc" ]],//ordenamiento por columna 0
        searching: false,
        fixedHeader: true,
        deferRender: true,
        responsive: false,
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
        ajax: "{{ route('admin.cashflow.indexDatatable') }}",
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

                    @permission('cashflow-delete')
                    return `<input type="checkbox" class="dt-checkboxes" value="${data}">`; // El checkbox con el valor del ID
                    @endpermission

                },
                title: '<input type="checkbox" name="select_all" value="1" id="datatable-select-all">', // Checkbox en el encabezado para seleccionar/deseleccionar todos
            },
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


                    @permission('cashflow-view')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Ver">
                        <button type="button" class="btn btn-primary" onclick="ModalShow('${data}')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </span> `;
                    @endpermission

                    @permission('cashflow-edit')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Editar">
                        <button type="button" class="btn btn-info" onclick="redirectToEdit('${data}')">
                            <i class="fas fa-edit"></i>
                        </button>
                    </span> `;
                    @endpermission

                    @permission('cashflow-delete')
                    buttons += `
                    <span data-placement="top" data-toggle="tooltip" title="Eliminar">
                        <button type="button" class="btn btn-danger" onclick="ModalDelete('${data}')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </span>`;
                    @endpermission


                    return buttons;
                }
            },
            //fecha
            {
                data: 'date',
                name: 'date',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
            //Tipo
            {
                data: 'type',
                name: 'type',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    //si es income que diga INGRESO
                    if (data == 'income') {
                        var html = '<span class="badge badge-success">INGRESO</span>';
                    } else {
                        var html = '<span class="badge badge-danger">EGRESO</span>';
                    }
                    return html;
                }
            },
            //Cliente
            {
                data: 'client_name',
                name: 'client_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    if (data) {
                        var html = '<span>' + data + '</span>';
                    } else {
                        var html = '<span>N/A</span>';
                    }
                    return html;
                }
            },
            //N° Remito
            {
                data: 'remittance_number',
                name: 'remittance_number',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    if (data) {
                        var html = '<span>' + data + '</span>';
                    } else {
                        var html = '<span>N/A</span>';
                    }
                    return html;
                }
            },
            //N° Factura
            {
                data: 'invoice_number',
                name: 'invoice_number',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    if (data) {
                        var html = '<span>' + data + '</span>';
                    } else {
                        var html = '<span>N/A</span>';
                    }
                    return html;
                }
            },

            //categoria (centro de gastos)
            {
                data: 'category_name',
                name: 'category_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    if (data) {
                        var html = '<span>' + data + '</span>';
                    } else {
                        var html = '<span>N/A</span>';
                    }
                    return html;
                }
            },
            //amount
            {
                data: 'amount',
                name: 'amount',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var formattedAmount = parseFloat(data).toLocaleString('es-ES', { minimumFractionDigits: 2 });
                    var html = '<span>$' + formattedAmount + '</span>';
                    return html;
                }
            },
            //amount usd
            {
                data: 'amount_usd',
                name: 'amount_usd',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var formattedAmount = parseFloat(data).toLocaleString('es-ES', { minimumFractionDigits: 2 });
                    var html = '<span>$' + formattedAmount + '</span>';
                    return html;
                }
            },
            //sector
            {
                data: 'sector_name',
                name: 'sector_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    if (data) {
                        var html = '<span>' + data + '</span>';
                    } else {
                        var html = '<span>N/A</span>';
                    }
                    return html;
                }
            },
            //item (unit)
            {
                data: 'item_name',
                name: 'item_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    if (data) {
                        var html = '<span>' + data + '</span>';
                    } else {
                        var html = '<span>N/A</span>';
                    }
                    return html;
                }
            },
            //item category and subcategory
            {
                data: 'item_category', // No estamos vinculando esta columna a un campo de datos específico
                name: 'item_category', // Este nombre se utilizará para la ordenación y la búsqueda
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    // Combinamos los datos de 'item_category' y 'item_category_subcategory' en una sola cadena
                    return row.item_category + ' - ' + row.item_category_subcategory;
                }
            },
            // Empleado (employee)
            {
                data: 'employee_name',
                name: 'employee_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = data ? '<span>' + data + ' (' + row.operator_hours + ' horas)</span>' : '<span>N/A</span>';
                    return html;
                }
            },
            // Ayudante uno (employee_sec1)
            {
                data: 'employee_sec1_name',
                name: 'employee_sec1_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = data ? '<span>' + data + ' (' + row.helper1_hours + ' horas)</span>' : '<span>N/A</span>';
                    return html;
                }
            },
            // Ayudante dos (employee_sec2)
            {
                data: 'employee_sec2_name',
                name: 'employee_sec2_name',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = data ? '<span>' + data + ' (' + row.helper2_hours + ' horas)</span>' : '<span>N/A</span>';
                    return html;
                }
            },
            // description
            {
                data: 'detail',
                name: 'detail',
                visible: true,
                searchable: true,
                orderable: true,
                render: function(data, type, row) {
                    var html = '<span>' + data + '</span>';
                    return html;
                }
            },
        ],
        /*============================COLUMNS============================*/
        initComplete: function() {
            // Elimina la clase 'dt-button' de todos los botones en el contenedor de DataTables
            $('.dt-buttons .btn').removeClass('dt-button');
        }

    });

    // Aquí añades un evento 'draw' para que se ejecute loadReportData después de cada redibujo de la tabla
    table.on('draw', function() {
        loadReportData();
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

/*========================================MODALES==========================================*/

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



// function ModalEdit(uuid) {
//     var url = baseUrlEdit.replace('tempId', uuid);
//     $.get(url, function(data) {
//         //guardamos el uuid en mi input hidden
//         $('#uuid_edit').val(data.uuid);
//         //asignamos los valores a los inputs
//         $('#name_edit').val(data.name);
//         $('#description_edit').val(data.description);
//     });
//     $('#edit').modal('show');
// }


function ModalShow(uuid) {
    var url = baseUrlShow.replace('tempId', uuid);
    $.get(url, function(data) {
        // Asignar los valores a los campos del modal
        $('#showType').val(data.type === 'income' ? 'Ingreso' : 'Egreso');
        $('#showAmount').val(data.amount);
        $('#showAmountUsd').val(data.amount_usd);
        $('#showDate').val(data.date); // Formatear según sea necesario
        $('#showRemittanceNumber').val(data.remittance_number);
        $('#showInvoiceNumber').val(data.invoice_number);
        $('#showSubtotal').val(data.subtotal_number);
        $('#showIva').val(data.iva_number);
        $('#showPercepcion').val(data.percepcion_number);

        // Información de clientes
        $('#showClient').val(data.client ? data.client.name : 'N/A');

        // Información de categorías, subcategorías, etc.
        $('#showCategory').val(data.category ? data.category.name : 'N/A');
        $('#showSubcategory').val(data.subcategory ? data.subcategory.name : 'N/A');
        $('#showSector').val(data.sector ? data.sector.name : 'N/A');
        $('#showSubsector').val(data.subsector ? data.subsector.name : 'N/A');
        $('#showUnitCategory').val(data.unit_category ? data.unit_category.name : 'N/A');
        $('#showUnitsSubcategory').val(data.unit_subcategory ? data.unit_subcategory.name : 'N/A');
        $('#showUnit').val(data.unit ? data.unit.name : 'N/A');

        //Empleados y Horas
        $('#showEmployee').val(data.employee ? data.employee.name : 'N/A');
        $('#showOperatorHours').val(data.operator_hours ? data.operator_hours : 'N/A');
        $('#showHelper1Hours').val(data.helper1_hours ? data.helper1_hours : 'N/A');
        $('#showEmployeeSec1').val(data.employee_sec1 ? data.employee_sec1.name : 'N/A');
        $('#showHelper2Hours').val(data.helper2_hours ? data.helper2_hours : 'N/A');
        $('#showEmployeeSec2').val(data.employee_sec2 ? data.employee_sec2.name : 'N/A');


        var productTableBody = $('#productTable tbody');
        productTableBody.empty(); // Limpiar la tabla existente
        data.details.forEach(function(detail) {
            if(detail.product){
                var row = '<tr>' +
                '<td>' + detail.product.description + '</td>' +
                '<td>' + detail.product_quantity + ' ' + detail.measurement_unit.name + '</td>' +
                '<td>' + detail.consumed_quantity + ' ' + detail.consumed_measurement_unit.name + '</td>' +
                '</tr>';
            productTableBody.append(row);
            }
        });


        $('#showDetails').val(data.detail);


        // Mostramos los datos si unitCategory es "TIERRA"
        if (data.unit_category.id == 2) {
            var details = JSON.parse(data.service_details);
            $('#showHectareas').val(details.hectareas ? details.hectareas : 'N/A');
            $('#showMachine').val(details.machine ? details.machine : 'N/A');
            $('#showTractor').val(details.tractor ? details.tractor : 'N/A');
            $('#showImplement').val(details.implement ? details.implement : 'N/A');

            var cropIds = details.crop_id; // Asumiendo que 'crop_id' es un array de IDs de los cultivos
            if(cropIds){
                $('#showCrop').next('.select2').show();
                $('#showCrop').val(cropIds).trigger('change'); // Seleccionar los cultivos
                $('#showCrop').prop('disabled', true);
                $('#noCrop').hide();
            }else{
                $('#showCrop').next('.select2').hide(); // Ocultar el select si no hay cultivos
                $('#noCrop').show(); // Mostrar el campo de entrada 'input' si no hay cultivos
            }

            //service
            if(data.details){
                var serviceIds = [];
                data.details.forEach(function(detail) {
                    if(detail.service){
                        serviceIds.push(detail.service.id); // Añadir el ID del servicio al array
                    }
                });
                if (serviceIds.length > 0) {
                    $('#showService').val(serviceIds).trigger('change'); // Seleccionar todos los servicios
                    $('#showService').prop('disabled', true);
                    $('#showService').next('.select2').show();
                    $('#noServices').hide();
                } else {
                    $('#showService').next('.select2').hide(); // Ocultar el select si no hay servicios
                    $('#noServices').show(); // Mostrar el campo de entrada 'input' si no hay servicios
                }
            }

            $('#attributesContainer_show').show();
        } else {
            $('#attributesContainer_show').hide();
        }

        // Muestra el modal
        $('#showCashFlowModal').modal('show');
    });
}



function redirectToEdit(uuid) {
    var url = baseUrlEdit.replace('tempId', uuid);
    window.location.href = url;
}
/*========================================MODALES==========================================*/



function loadReportData() {
    console.log("Cargando datos del reporte...");
    // Realizar solicitud AJAX
    $.ajax({
        url: "{{ route('admin.cashflow.search.report') }}", // Asegúrate de que esta ruta esté definida y sea correcta en tu backend
        method: 'GET',
        success: function(response) {
            // Actualiza tus tarjetas con la respuesta
            $('#totalIngresos').text(response.totalIngresos.toLocaleString('es-ES', { minimumFractionDigits: 2 }));
            $('#totalEgresos').text(response.totalEgresos.toLocaleString('es-ES', { minimumFractionDigits: 2 }));
            $('#gananciasTotales').text(response.gananciasTotales.toLocaleString('es-ES', { minimumFractionDigits: 2 }));

            // Actualiza tus tarjetas en USD con la respuesta
            $('#totalIngresosUsd').text(response.totalIngresosUsd.toLocaleString('es-ES', { minimumFractionDigits: 2 }));
            $('#totalEgresosUsd').text(response.totalEgresosUsd.toLocaleString('es-ES', { minimumFractionDigits: 2 }));
            $('#gananciasTotalesUsd').text(response.gananciasTotalesUsd.toLocaleString('es-ES', { minimumFractionDigits: 2 }));

        },
        error: function(error) {
            console.error("Hubo un error en la solicitud", error);
            // Manejar errores aquí (mostrar mensaje al usuario, etc.)
        }
    });
}







</script>
