@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Form Design <small>different form elements</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
            <ul class="dropdown-menu" role="menu">

            </ul>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" action="/kids" method="post" data-parsley-validate class="form-horizontal form-label-left">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre completo <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
              @if ($errors->has('name'))
                  <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Relación</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="relationship" class="form-control col-md-7 col-xs-12">
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Maestro">Maestro</option>
                <option value="Encargado">Encargado</option>
                <option value="Otro">Otro</option>
              </select>

              @if ($errors->has('relationship'))
                  <span class="help-block">
                      <strong>{{ $errors->first('relationship') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cédula <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="identification" required="required" class="form-control col-md-7 col-xs-12" data-inputmask="'mask': '9999 9999 9999 9999'">
              @if ($errors->has('identification'))
                  <span class="help-block">
                      <strong>{{ $errors->first('identification') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Edad</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input required  id="age" class="form-control col-md-7 col-xs-12" type="number" name="age" >
              @if ($errors->has('age'))
                  <span class="help-block">
                      <strong>{{ $errors->first('age') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="gender" class="form-control col-md-7 col-xs-12"  >
                <option value="Male">Masculino</option>
                <option value="Female">Femenino</option>

              </select>

              @if ($errors->has('gender'))
                  <span class="help-block">
                      <strong>{{ $errors->first('gender') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Etnia</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="ethnicity" class="form-control col-md-7 col-xs-12"  >
                <option value="Afrocostarricense">Afro costarricense</option>
                <option value="Asiático">Asiático</option>
                <option value="Blanco">Blanco</option>
              </select>

              @if ($errors->has('ethnicity'))
                  <span class="help-block">
                      <strong>{{ $errors->first('ethnicity') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tratamientos de índole física </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea required="required" class="form-control" name="treatments_physical" maxlength="500" minlength="10"></textarea>
                @if ($errors->has('treatments_physical'))
                    <span class="help-block">
                        <strong>{{ $errors->first('treatments_physical') }}</strong>
                    </span>
                @endif
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Cuadros de enfermedades presentados en los últimos 6 meses </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea  required class="form-control" name="illness" maxlength="500" minlength="10"></textarea>
              @if ($errors->has('illness'))
                  <span class="help-block">
                      <strong>{{ $errors->first('illness') }}</strong>
                  </span>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Medicamento de los últimos 6 meses</label>
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre del medicamento</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="name2" name="name2" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date" id="date" name="date" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Duración</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="duration" class="form-control col-md-7 col-xs-12" type="number" name="duration" min="0">

            </div>
          </div>


          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Medicinas recetadas </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <textarea id="medicinas" name="medicines" class="form-control" required ></textarea>
              @if ($errors->has('medicines'))
                  <span class="help-block">
                      <strong>{{ $errors->first('medicines') }}</strong>
                  </span>
              @endif
            </div>
          </div>


          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button class="btn btn-primary" type="button">Cancelar</button>
              <button type="submit" class="btn btn-success">Enviar</button>
              <button type="button" id="addMed" class="btn btn-success">Agregar Medicina</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection
