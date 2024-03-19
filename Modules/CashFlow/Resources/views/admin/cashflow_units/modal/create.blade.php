<div class="modal fade" id="create"  role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear Item</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


            <form action="{{ route('admin.cashflow.units.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>


                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>


                     <select class="form-control" id="category_id" name="category_id">
                        <option value="">Seleccione un tipo de unidad</option>
                        @foreach($CashFlowUnitCategories as $key => $UnitCategory)
                            <option value="{{ $UnitCategory->id }}" data-type-name="{{ $UnitCategory->name }}">
                                {{ $UnitCategory->name }}
                            </option>
                        @endforeach
                    </select>

                    <br>

                   @include('cashflow::admin.cashflow_units.forms.land')

                   @include('cashflow::admin.cashflow_units.forms.vehicle')


                    {{-- Agrega aquí más campos si es necesario --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Crear</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </form>
                </div>



        </div>
    </div>
</div>



@section('mis-scripts')
@parent
<script>
    $(document).ready(function() {
        $('#category_id').on('change', function() {
            $('.unit-form').hide(); // Oculta todos los formularios
            let selectedType = $('#category_id option:selected').data('type-name'); // Obtiene el nombre descriptivo
            $(`#form_${selectedType}`).show(); // Muestra el formulario correspondiente
        });
    });
    </script>
@stop
