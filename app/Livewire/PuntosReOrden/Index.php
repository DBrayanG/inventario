<?php

namespace App\Livewire\PuntosReOrden;


use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Livewire\PuntosReOrden\ProductosExport;

class Index extends Component
{
    public $productosParaPedir = [];

    public function mount()
    {
        $this->calcularProductosParaPedir();
    }

    public function calcularProductosParaPedir()
    {
        // Aquí deberías implementar la lógica para calcular el ROP y las cantidades a pedir.
        // Esto es solo un ejemplo. Reemplaza con la lógica real.
        $productos = DB::table('productos')->get();
        
        $this->productosParaPedir = $productos->map(function ($producto) {
            // Aquí se calculan el ROP y la cantidad a pedir según la lógica de tu negocio
            $rop = $this->calcularROP($producto->producto_id);
            $cantidad_a_pedir = max(0, $rop - $producto->stock_actual);

            return [
                'producto' => $producto->nombre,
                'stock_actual' => $producto->stock_actual,
                'stock_minimo' => $producto->stock_minimo,
                'rop' => $rop,
                'cantidad_a_pedir' => $cantidad_a_pedir
            ];
        })->toArray();
    }

    public function calcularROP($productoId)
    {
        // Ejemplo de cálculo del ROP
        // Sustituye con tu lógica de cálculo real
        /*
        Punto de reorden = (ventas promedio por día x Lead time en días) + Stock de seguridad
        Cálculo de ventas promedio = Total ventas del producto/ Número de días

        Cálculo de ventas promedio: 800 unidades vendidas/ 30 días = 26.6 que redondeamos a 27
        Lead time = Promedio (días desde que se realiza la orden hasta que se entrega el producto)

        Stock de seguridad = (Órdenes máximas diarias x Máximo valor de Lead Time) – ( Promedio de órdenes promedio x Lead Time promedio)
        Stock de seguridad = (35 x 20) – (27 x 17) = 700 – 459 = 241 unidades
        Punto de reorden = (ventas promedio por día x Lead time en días) + Stock de seguridad

        Punto de reorden = (27 x 17) + 241 = 700 unidades de producto
        */
        return 100; // Por ejemplo, siempre devuelve 100 para todos los productos
    }

    public function imprimirxls()
    {
        // Aquí generas el archivo Excel
        $this->calcularProductosParaPedir();
        return Excel::download(new ProductosExport($this->productosParaPedir), 'productos_para_pedido.xlsx');
    }

    public function render()
    {
        return view('livewire.puntos-re-orden.index');
    }
}
