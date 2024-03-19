<div class="modal fade" id="show" role="dialog" aria-labelledby="showClientLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles del Cliente / Proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Campo para el nombre del cliente --}}
                <div class="form-group">
                    <label for="name">Nombre / Empresa</label>
                    <input type="text" class="form-control" id="company_show" name="company" readonly>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
