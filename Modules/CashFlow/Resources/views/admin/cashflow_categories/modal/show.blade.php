<div class="modal fade" id="show" role="dialog" aria-labelledby="showCategoryLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles de del Centro de Gasto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- Aquí se mostrarán los detalles de la categoría --}}
                <div class="form-group">
                    <label>Nombre:</label>
                    <p id="name_show" class="form-control-plaintext"></p>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <p id="description_show" class="form-control-plaintext"></p>
                </div>
                {{-- Agrega aquí más campos para mostrar otros detalles si es necesario --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

