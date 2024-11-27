<?php

namespace App\Livewire\Reportes;

use Livewire\Component;


use App\Models\Entrada;
use App\Models\Salida;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\TipoOperacion;

class Index extends Component
{
    public $fechaini;
    public $fechafin;
    public $tipo;
    public $operaciones;
    public $tiposOperaciones;
    public $tiposOperacionSelect;
    public $tipo_operacion_id;
    public $errorMessage;

    public function mount()
    {     
        $this->operaciones = Entrada::all();
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
        // Validación de entradas
        $this->tiposOperacionSelect = TipoOperacion::find($this->tipo_operacion_id);
        $this->validate([
            'fechaini' => 'required|date',
            'fechafin' => 'required|date|after_or_equal:fechaini',
            'tipo_operacion_id' => 'nullable|exists:tipo_operaciones,tipo_operacion_id', // Verifica que tipo_operacion_id exista en la tabla correcta
            'tipo' => 'required|in:1,2' // 1 para Entrada, 2 para Salida
        ]);

        try {
            // Definir la consulta base dependiendo del tipo
            if ($this->tipo == 1) {
                $query = Entrada::query();
            } else {
                $query = Salida::query();
            }

            // Aplicar filtros de tipo de operación y rango de fechas
            if ($this->tipo_operacion_id) {
                $query->where('tipo_operacion_id', $this->tipo_operacion_id);
            }

            $query->whereBetween('fecha', [$this->fechaini, $this->fechafin]);

            // Obtener los resultados
            $this->operaciones = $query->with(['producto', 'tipoOperacion', 'agente']) // Ejemplo de relaciones si las tienes
                ->orderBy('fecha', 'asc')
                ->get();
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al obtener las operaciones: ' . $e->getMessage();
        }
    }    

    public function exportToPdf()
    {
        
        try {
            // Validación para asegurarse de que hay datos para exportar
            /* if (empty($this->operaciones) || $this->operaciones->isEmpty()) {
                $this->errorMessage = 'No hay datos para exportar.';
                return;
            } */

            // Preparar datos para la vista
            $data = [
                'operaciones' => $this->operaciones,
                'totalCantidad' => $this->totalCantidad,
                'fechaInicio' => $this->fechaini,
                'fechaFin' => $this->fechafin,
                'tipoOperacion' => $this->tipo_operacion_id ? TipoOperacion::find($this->tipo_operacion_id)->nombre : 'Todos',
            ];

            // Renderizar la vista para el PDF
            $pdf = Pdf::loadView('livewire.reportes.pdf', $data);

            // Descargar el PDF
            return $pdf->download('operaciones_' . now()->format('Ymd_His') . '.pdf');

        } catch (\Exception $e) {
            $this->errorMessage = 'Error al exportar a PDF: ' . $e->getMessage();
        }
    }



}
