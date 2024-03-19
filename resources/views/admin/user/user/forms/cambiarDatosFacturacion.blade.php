<div class="row">
       <div class="col-md-12">
<div class="card card-outline-info">
      <div class="card-header">
          <h4 class="m-b-0 text-white">Cambiar Datos de Facturacion</h4>
      </div>
      <div class="card-body">
      
<div class="row">
        

        <div class="form-group col-xs-12 col-sm-12 col-md-3">
            <div class="input-group input-icon right ">
                <span class="input-group-addon"><i class="fas fa-file-alt"></i></span>
                 <select name="clase_fiscal" id="clase_fiscal" class="form-control" onchange="ClaseFiscal()" >
                       <option value="consumidor-final">Consumidor Final</option>
                       <option value="monotributista">Monotributista</option>
                       <option value="responsable-inscripto">Responsable Inscripto</option>
                </select>
            </div>
        </div>





 
        <div class="form-group col-xs-12 col-sm-12 col-md-3" id="tipo_documento_select_box">
            <div class="input-group input-icon right ">
                <span class="input-group-addon"><i class="fas fa-file-alt"></i></span>
                 <select name="tipo_documento_select" id="tipo_documento_select" class="form-control" onchange="ClaseFiscal()">
                       <option value="">Seleccione una opcion</option>
                       <option value="DNI">DNI</option>
                       <option value="CUIT">CUIT</option>
                </select>
            </div>
        </div>


      <div class="form-group col-xs-12 col-sm-12 col-md-2" id="tipo_documento_box">
        <input type="text" name="tipo_documento" id="tipo_documento" class="form-control"  readonly value="" placeholder="DNI/CUIT">
      </div>




      <div class="form-group col-xs-12 col-sm-12 col-md-4" id="documento_box">
            <div class="input-group input-icon right ">
            <span class="input-group-addon"><i class="fa fa-credit-card font-blue"></i></span>
                  <input class="form-control " type="text" id="dni" name="numero_documento"  placeholder="INGRESE EL DNI" >
                  <input class="form-control " type="text" id="cuit" name="numero_documento"  placeholder="INGRESE EL CUIT" >
            </div>
        </div>

 

      <div class="form-group col-xs-12 col-sm-12 col-md-12" id="direccion_facturacion_box">
                <div class="input-group">
                  <div class="input-group-addon"><i class="mdi mdi-map-marker"></i></div>
                  <input type="text" name="direccion_facturacion" class="form-control"  placeholder="Direccion de Facturacion"  id="direccion_facturacion" 
                  @if (!empty($facturacion))
                     value="{{ $facturacion->direccion_facturacion}}"
                  @else
                    value=""
                  @endif>
                </div>
            </div>


            </div>
    </div>
    </div>
    </div>
  </div>