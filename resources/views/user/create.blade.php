@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ url('/user')}}" method="post">
        @csrf
        @include('user.form',['modo'=>'Crear'])
    </form>
</div>
@endsection