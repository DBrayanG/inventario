@extends('adminlte::page')

@section('title', 'El Buen Agricultor')

@section('content_header')
<h1>USUARIOS</h1>
@stop

@section('content')
<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-body">
            @livewire("usuarios.index")
        </div>
    </div>

</div>

@stop