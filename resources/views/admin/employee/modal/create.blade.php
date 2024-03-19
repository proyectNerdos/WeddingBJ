<div class="modal fade" id="create" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Crear Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>

            {{-- Asegúrate de cambiar 'employee.store' a la ruta correcta que maneja la creación de empleados --}}
            <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    {{-- Campo para el nombre del empleado --}}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    {{-- Campo para el apellido del empleado --}}
                    <div class="form-group">
                        <label for="lastname">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>

                    {{-- Campo para el correo electrónico del empleado --}}
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" >
                    </div>

                    {{-- Campo para el teléfono del empleado --}}
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="phone" >
                    </div>

                    {{-- Campo para la dirección del empleado --}}
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="address" >
                    </div>

                    {{-- Agrega aquí más campos si es necesario --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-right">Crear</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

