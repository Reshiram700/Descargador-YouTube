@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Tu contenido actual de la vista index -->

        <!-- Agregar botón "Agregar producto" -->
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar producto</a>
    </div>
@endsection