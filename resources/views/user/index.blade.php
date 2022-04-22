@extends('layouts.app')

@section('content')
<div class="container">

  <!-- <div class="alert alert-success alert-dismissible" role="alert"> -->
    @if(Session::has('mensaje'))
    {{Session::get('mensaje')}}
    @endif

    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> -->

  <a href="{{url('user/create')}}" class="btn btn-success">Crear Usuario</a>
  <table class="table">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Tipo Id</th>
        <th># Id</th>
        <th>Fecha Nacimiento</th>
      </tr>
    </thead>
    <tbody>
      @foreach( $users as $user )
      <tr>
        <td> {{ $user->id }}</td>
        <td> {{ $user->nombre }}</td>
        <td> {{ $user->apellido }}</td>
        <td> {{ $user->tipiId }}</td>
        <td> {{ $user->nId}}</td>
        <td> {{ $user->FechaNacimiento }}</td>
        <td>
          <a href="{{ url('/user/'.$user->id.'/edit')}}" class="btn btn-primary">Editar</a> |
          <form action="{{ url('/user/'.$user->id) }}" class="d-inline" method="post">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('Desea Borrar el registro?')" class="btn btn-danger" value="Borrar">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection