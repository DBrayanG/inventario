<?php

namespace App\Livewire\Reportes;

use Livewire\Component;


use App\Models\Operacion;
use App\Models\TipoOperacion;

class Index extends Component
{
    public $fechaini;
    public $fechafin;
    public $operaciones;
    public $tiposOperaciones;
    public $tiposOperacionSelect;
    public $tipo_operacion_id;

    public function mount()
    {     
        $this->operaciones = Operacion::all();
        $this->tiposOperaciones = TipoOperacion::all();
    }


    // Método para manejar la renderización del componente
    public function render()
    {

        // Retorna la vista con los datos necesarios
        return view('livewire.reportes.index');
    }

    // Método para obtener operaciones filtradas
    public function getOperaciones()
    {
        $this->tiposOperacionSelect = TipoOperacion::find($this->tipo_operacion_id);

        $query = Operacion::query();

        // Filtrar por fecha si se proporcionan
        if ($this->fechaini && $this->fechafin) {
            $query->whereBetween('fecha', [$this->fechaini, $this->fechafin]);
        }

        // Filtrar por tipo de operación si se proporciona
        if ($this->tipo_operacion_id) {
            $query->where('tipo_operacion_id', $this->tipo_operacion_id);
        }
        $this->operaciones = $query->get();
    }
}
