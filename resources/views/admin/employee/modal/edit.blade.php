<div class="modal fade" id="edit" role="dialog" aria-labelledby="editCategoryLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            {{-- Este formulario debería apuntar a la ruta de actualización de categorías en tu aplicación Laravel --}}
            {{-- El método del formulario debe ser POST, pero Laravel utilizará el campo _method para tratarlo como una solicitud PUT/PATCH --}}
            <form id="editCategoryForm" action="{{ route('admin.employee.update', ['cashFlowCategory' => '__id__']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- uuid hidden --}}
                <input type="hidden" name="uuid" id="uuid_edit" value="">

                <div class="modal-body">

                    {{-- Nuevo campo: Nombre --}}
                    <div class="form-group">
                        <label for="edit_name">Nombre</label>
                        <input type="text" class="form-control" id="name_edit" name="name">
                    </div>

                    {{-- Nuevo campo: Apellido --}}
                    <div class="form-group">
                        <label for="edit_lastname">Apellido</label>
                        <input type="text" class="form-control" id="lastname_edit" name="lastname">
                    </div>

                    {{-- Nuevo campo: Email --}}
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="email_edit" name="email">
                    </div>

                    {{-- Nuevo campo: Teléfono --}}
                    <div class="form-group">
                        <label for="edit_telefono">Teléfono</label>
                        <input type="text" class="form-control" id="phone_edit" name="phone">
                    </div>

                    {{-- Nuevo campo: Dirección --}}
                    <div class="form-group">
                        <label for="edit_direccion">Dirección</label>
                        <input type="text" class="form-control" id="address_edit" name="address">
                    </div>

                    {{-- Agrega aquí más campos si es necesario --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Guardar Cambios</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

