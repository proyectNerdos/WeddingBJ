<div class="modal fade" id="edit" role="dialog" aria-labelledby="editCategoryLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            {{-- Este formulario debería apuntar a la ruta de actualización de categorías en tu aplicación Laravel --}}
            {{-- El método del formulario debe ser POST, pero Laravel utilizará el campo _method para tratarlo como una solicitud PUT/PATCH --}}
            <form id="editCategoryForm" action="{{ route('admin.cashflow.units.update', ['cashFlowUnit' => '__id__']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- uuid hiiden --}}
                <input type="hidden" name="uuid" id="uuid_edit" value="">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="edit_name">Nombre</label>
                        <input type="text" class="form-control" id="name_edit" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_description">Descripción</label>
                        <textarea class="form-control" id="description_edit" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id_edit">Tipo de Unidad</label>
                        <select class="form-control" id="category_id_edit" name="category_id_edit">
                            <option value="">Seleccione un tipo de unidad</option>
                            <!-- Las opciones de categoría se añadirán aquí dinámicamente -->
                        </select>
                    </div>

                    <div id="attributes_container"></div>

                    @include('cashflow::admin.cashflow_units.forms.landEdit')

                   @include('cashflow::admin.cashflow_units.forms.vehicleEdit')

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('mis-scripts')
@parent
<script>
$(document).ready(function() {
    $('#category_id_edit').on('change', function() {
        $('.unit-form').hide(); // Oculta todos los formularios
        let selectedType = $('#category_id_edit option:selected').data('type-name'); // Obtiene el nombre descriptivo
        //quierlo ocultar los input de attributes_container le agregue la class attribute-input a todos estos input
        $('.attribute-input').hide();

        $(`.form_edit_${selectedType}`).show(); // Muestra el formulario correspondiente
    });
});
    </script>
@stop
