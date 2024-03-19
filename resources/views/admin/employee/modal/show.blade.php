<div class="modal fade" id="show" role="dialog" aria-labelledby="showEmployeeLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles del Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Aquí se mostrarán los detalles del empleado --}}
                <div class="form-group">
                    <label>Nombre:</label>
                    <p id="name_show" class="form-control"></p>
                </div>
                <div class="form-group">
                    <label>Apellido:</label>
                    <p id="lastname_show" class="form-control"></p>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <p id="email_show" class="form-control"></p>
                </div>
                <div class="form-group">
                    <label>Teléfono:</label>
                    <p id="phone_show" class="form-control"></p>
                </div>
                <div class="form-group">
                    <label>Dirección:</label>
                    <p id="address_show" class="form-control"></p>
                </div>
                {{-- Agrega aquí más campos para mostrar otros detalles del empleado si es necesario --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
