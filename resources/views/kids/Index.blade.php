@extends('layouts.app')

@section('content')
<table class="table table-hover">
  <thead>
    <tr>

      <th>Nombre</th>
      <th>Cedula</th>
      <th>Age</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($kids as $kid)
               <tr>
                  <td>{{$kid->name}}</td>
                  <td>{{$kid->identification}}</td>
                  <td>{{$kid->age}}</td>
                  <td>
                <a href="/kids/{{$kid->id}}/history">
                  <button type="button" class="btn btn-info">Antecedentes</button>
                </a>
                    <button type="button" class="btn btn-primary">Editar</button>
                  </td>

            </tr>
            @endforeach
  </tbody>
</table>
@endsection
