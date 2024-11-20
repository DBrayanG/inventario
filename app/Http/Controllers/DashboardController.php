<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     

    public function blog()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('home');
    }

    public function productos()
    {
        return view('admin.productos');
    }

    public function categorias()
    {
        return view('admin.categorias');
    }

    public function entradas()
    {
        return view('admin.entradas');
    } public function usuarios()
    {
        return view('admin.usuarios');
    }

    public function salidas()
    {
        return view('admin.salidas');
    }

    public function almacen()
    {
        return view('admin.almacen');
    }

    public function permisos()
    {
        return view('admin.permisos');
    }

    public function roles()
    {
        return view('admin.roles');
    }

    public function reportes()
    {
        return view('admin.reportes');
    }

    public function estadisticas()
    {
        return view('admin.estadisticas');
    }
}
