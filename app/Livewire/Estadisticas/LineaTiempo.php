<?php

namespace App\Livewire\Estadisticas;

use App\Models\Salida;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LineaTiempo extends Component
{

    public $Salida;

 
    public function mount()
    {
        $this->Salida = [];
        
        $this->Salida = Salida::select(DB::raw('DATE(fecha) as fecha'), DB::raw('SUM(cantidad) as cantidad'))
        ->groupBy(DB::raw('DATE(fecha)'))
        ->orderBy('fecha')
        ->get()
        ->toArray();
    }

    public function render()
    {
        return view('livewire.estadisticas.linea-tiempo');
    }
}
