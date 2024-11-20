<?php

namespace App\Livewire\Estadisticas;

use Livewire\Component;

class Index extends Component
{
    public $estadisticas;
    public $chartData;

    public function mount()
    {
        
        // Datos estadísticos simulados
        $this->estadisticas = [
            [
                'nombre' => 'Ventas',
                'valor' => 1200,
                'descripcion' => 'Total de ventas realizadas este mes.'
            ],
            [
                'nombre' => 'Usuarios Registrados',
                'valor' => 450,
                'descripcion' => 'Cantidad de usuarios registrados en la plataforma.'
            ],
            [
                'nombre' => 'Productos en Stock',
                'valor' => 300,
                'descripcion' => 'Cantidad de productos disponibles en inventario.'
            ],
            [
                'nombre' => 'Ingresos Totales',
                'valor' => 25000,
                'descripcion' => 'Ingresos totales generados este mes.'
            ],
        ];
       




        $this->chartData = [
            'labels' => array_column($this->estadisticas, 'nombre'),
            'values' => array_column($this->estadisticas, 'valor'),
        ];
    }

    public function render()
    {
        return view('livewire.estadisticas.index', [
            'estadisticas' => $this->estadisticas,
        ]);
    }
}
