<?php

namespace App\Livewire\Estadisticas;

use App\Models\Entrada;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LineaTiempoEntrada extends Component
{
    public $entradas;
    public function mount()
    {
        $this->entradas = [];
        
        $this->entradas = Entrada::select(DB::raw('DATE(fecha) as fecha'), DB::raw('SUM(cantidad) as cantidad'))
        ->groupBy(DB::raw('DATE(fecha)'))
        ->orderBy('fecha')
        ->get()
        ->toArray();
    }
    public function render()
    {
        return view('livewire.estadisticas.linea-tiempo-entrada');
    }
}
