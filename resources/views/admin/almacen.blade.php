@extends('adminlte::page')

@section('title', 'El Buen Agricultor')

@section('content_header')
<h1>ALMACEN</h1>
@stop

@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-body">
            @livewire("estadisticas.linea-tiempo")
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            @livewire("almacen.index")
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            @livewire("puntos-re-orden.index")
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-body">
            @livewire("estantes.index")
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            @livewire("categorias.index")
        </div>
    </div>
</div>

@stop