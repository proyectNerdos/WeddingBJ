<div class="modal fade" id="edit" role="dialog" aria-labelledby="editCategoryLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Cliente / Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            {{-- Este formulario debería apuntar a la ruta de actualización de categorías en tu aplicación Laravel --}}
            {{-- El método del formulario debe ser POST, pero Laravel utilizará el campo _method para tratarlo como una solicitud PUT/PATCH --}}
            <form id="editCategoryForm" action="{{ route('admin.client.update', ['cashFlowCategory' => '__id__']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- uuid hidden --}}
                <input type="hidden" name="uuid" id="uuid_edit" value="">

                <div class="modal-body">
                    {{-- Campo para el nombre del cliente --}}
                    <div class="form-group">
                        <label for="name">Nombre / Empresa</label>
                        <input type="text" class="form-control" id="company_edit" name="name">
                    </div>

                    {{-- Campo para el apellido del cliente --}}
                    {{-- <div class="form-group">
                        <label for="lastname">Empresa</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div> --}}
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

