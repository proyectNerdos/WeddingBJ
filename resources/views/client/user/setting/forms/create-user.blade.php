<div class="card card-outline-info">
  <div class="card-header">
    <h4 class="m-b-0 text-white">Avatar</h4>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <img src="storage/users/avatar-default.svg" class="mx-auto d-block" height="150" width="150">
      </div>


      <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <input type="file" class="dropify" data-height="200" name="image">
      </div>

    </div>
  </div>
</div>




<div class="card card-outline-info">
  <div class="card-header">
    <h4 class="m-b-0 text-white">Datos del Usuario</h4>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group input-icon right ">
          <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
          <input type="text" name="name" class="form-control" placeholder="ingrese el nombre" required="">
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group input-icon right ">
          <span class="input-group-addon"><i class="mdi mdi-account-box color-white"></i></span>
          <input type="text" name="lastname" class="form-control" placeholder="ingrese el apellido" required="">
        </div>
      </div>
      {{--
      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group input-icon right ">
          <span class="input-group-addon"><i class="fa fa-credit-card font-blue"></i></span>
          <input type="text" name="dni" class="form-control dni" placeholder="ingrese el DNI">
        </div>
      </div>
      --}}

      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group input-icon right">
          <span class="input-group-addon"><i class="mdi mdi-email color-white"></i></span>
          <input type="text" name="email" class="form-control email" placeholder="Ingrese un email" required=""
            aria-required="true" data-msg-required="Please enter your email address."
            data-msg-email="Please enter a valid email address.">
        </div>
      </div>

      {{--
      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group">
          <div class="input-group-addon"><i class="mdi mdi-code-brackets"></i></div>
          <input type="text" name="cp" class="form-control" placeholder="Ingrese un Codigo postal">
        </div>
      </div>



      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group input-icon right">
          <span class="input-group-addon"><i class="fas fa-phone font-blue"></i></span>
          <input type="text" name="telefono" class="form-control telefono" placeholder="Ingrese un telefono">
        </div>
      </div>

      <div class="form-group col-xs-12 col-sm-12 col-md-4">
        <div class="input-group input-icon right">
          <span class="input-group-addon"><i class="fas fa-map-marker font-blue"></i></span>
          <input type="text" name="direccion" class="form-control" placeholder="Ingrese una direccion">
        </div>
      </div>
      --}}



      {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <div class="input-group">
          <div class="input-group-addon"><i class="mdi mdi-google-maps"></i></div>

          <select name="pais" class="form-control countries" id="countryId">
            <option value="">Select Country</option>
          </select>
          <select name="provincia" class="form-control states" id="stateId">
            <option value="">Select State</option>
          </select>
          <select name="ciudad" class="form-control cities" id="cityId">
            <option value="">Select City</option>
          </select>


        </div>
      </div> --}}



    </div>
  </div>
</div>






<div class="card card-outline-info">
  <div class="card-header">
    <h4 class="m-b-0 text-white">Generar Password</h4>
  </div>
  <div class="card-body">
    <div class="row">

      {{-- <div class="form-group col-xs-12 col-sm-12 col-md-12">
        <div class="input-group">

          <input type="checkbox" name="auto_generate_password" checked data-toggle="toggle" data-onstyle="success"
            data-offstyle="danger" id="password-generate" value="on">

        </div>
      </div> --}}





      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right" id="icon-password">
          <span class="input-group-addon"><i class="fa fa-key color-white"></i></span>
          <input type="password" name="password" class="form-control" placeholder="ingrese el password" id="password"
            required="">
        </div>
      </div>



      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right" id="icon-re-password">
          <span class="input-group-addon"><i class="fa fa-key color-white"></i></span>
          <input type="password" name="password_confirmation" class="form-control" placeholder="Re-ingrese el password"
            id="re-password" required="">
        </div>
      </div>



      <div class="form-group col-xs-12 col-sm-12 col-md-6">
        <div class="input-group input-icon right" id="icon-password">
          <button type="button" class="btn btn-button btn-primary" onclick="PasswordGenerate();">Generar
            Password</button>
          <input type="text" disabled="" class="form-control" id="label-password">
        </div>
      </div>


    </div>
  </div>
</div>