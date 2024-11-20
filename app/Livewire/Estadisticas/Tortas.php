<?php

namespace App\Livewire\Estadisticas;

use Livewire\Component;

class Tortas extends Component
{
    public $categorias;

    public function mount()
    {
        // Obtén las categorías y sus datos para el gráfico
        $this->categorias = [
            ['nombre' => 'Categoria 1', 'cantidad' => 10],
            ['nombre' => 'Categoria 2', 'cantidad' => 20],
            ['nombre' => 'Categoria 3', 'cantidad' => 30],
            ['nombre' => 'Categoria 4', 'cantidad' => 40],
        ];
    
    }

    public function render()
    {
        return view('livewire.estadisticas.tortas');
    }
}
