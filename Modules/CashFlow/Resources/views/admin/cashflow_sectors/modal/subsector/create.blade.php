<div class="modal fade" id="createSubsector"  role="dialog" aria-labelledby="confirmDelete">
 <div class="modal-dialog modal-xl" role="document">
     <div class="modal-content">
         <div class="modal-header">
         	<h4 class="modal-title">Crear SubSector </h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>


            {{-- Asegúrate de cambiar 'category.store' a la ruta correcta que maneja la creación de categorías --}}
            <form action="{{ route('admin.cashflow.subsector.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    {{-- uuid hiiden --}}
                    <input type="hidden" name="uuid_sector" id="uuid_sector" value="">
                    {{-- uuid hiiden --}}


                <div class="modal-body">
                    {{-- Campo para el nombre de la categoría --}}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    {{-- Campo para la descripción de la categoría --}}
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

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


