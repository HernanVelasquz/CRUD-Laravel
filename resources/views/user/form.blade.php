<h1>{{$modo}} Usuario</h1>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="form-group">
    <label for="Usuario">Usuario: </label>
    <input type="text" class="form-control" name="usuario" value="{{ isset($datosUser->usuario)?$datosUser->usuario:old('usuario') }}" placeholder="Usuario">
    <br>
</div>

<div class="form-group">
    <label for="Nombre">Nombre: </label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($datosUser->nombre)?$datosUser->nombre:old('nombre') }}" placeholder="Nombre">
    <br>
</div>

<div class="form-group">
    <label for="Apellido">Apellido: </label>
    <input type="text" class="form-control" name="apellido" value="{{ isset($datosUser-> apellido)?$datosUser->apellido:old('apellido') }}" placeholder="Apellido">
    <br>
</div>

<div class="form-group">
    <label for="TipoDocumento">Tipo de Documento</label>
    <input type="text" class="form-control" name="tipiId" value="{{ isset($datosUser->tipiId)?$datosUser->tipiId:old('tipiId') }}" placeholder="Tipo de Documento">
    <br>
</div>
<div class="form-group">
    <label for="NumeroDocumento">Numero de Documento</label>
    <input type="text" class="form-control" name="nId" value="{{ isset($datosUser->nId)?$datosUser->nId:old('nId') }}" placeholder="Numero Documento">
    <br>
</div>

<div class="form-group">
    <label for="FechaNacimiento:"> Fecha de Nacimiento: </label>
    <input type="text" class="form-control" name="FechaNacimiento" value="{{ isset($datosUser->FechaNacimiento)?$datosUser->FechaNacimiento:old('FechaNacimiento') }}" placeholder="YYYY-MM-DD">
    <br>
</div>
<div class="form-group">
    <label for="Password">Password: </label>
    @if(isset($datosUser->password))
    <input type="password" class="form-control" name="password" value="$datosUser->password:old('password')" placeholder="Password">
    @else
    <input type="password" class="form-control" name="password" placeholder="Password">
    @endif
    <br>
</div>
<input type="submit" class="btn btn-primary" value="{{ $modo }} Datos">
<a href="{{ url('user/')}}" class="btn btn-danger">Regresar</a>
<br>