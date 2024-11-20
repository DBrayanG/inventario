<?php

namespace App\Livewire\PuntosReOrden;


use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

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
                'rop' => $rop,
                'cantidad_a_pedir' => $cantidad_a_pedir
            ];
        })->toArray();
    }

    public function calcularROP($productoId)
    {
        // Ejemplo de cálculo del ROP
        // Sustituye con tu lógica de cálculo real
        return 100; // Por ejemplo, siempre devuelve 100 para todos los productos
    }

    public function imprimirxls()
    {
        // Aquí generas el archivo Excel
        return Excel::download(new ProductosExport($this->productosParaPedir), 'productos_para_pedido.xlsx');
    }

    public function render()
    {
        return view('livewire.puntos-re-orden.index');
    }
}
