<div class="modal fade" id="show" role="dialog" aria-labelledby="showCategoryLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detalles del Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nombre:</label>
                    <input type="text" id="name_show" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Descripción:</label>
                    <input type="text" id="description_show" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>Atributos:</label>
                    <div id="attributes_show"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

