<?php

namespace App\Livewire\Salidas;

use App\Models\Agente;
use App\Models\Operacion;
use App\Models\Salida;
use App\Models\Producto;
use App\Models\TipoOperacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class Index extends Component
{
    public $salidas;
    public $productos;
    public $agentes;
    public $usuarios;
    public $tiposOperacion;
    public $producto_id;
    public $fecha   ;
    public $cantidad;
    public $tipo_operacion_id;
    public $agente_id;
    public $usuario_id;
    public $selectedSalidaId;
    public $showCreate = false;
    public $showEdit = false;
    public $successMessage = '';
    public $errorMessage = '';
    public $fechaInicio;
    public $fechaFin;
    public $mes;

    protected $rules = [
        'producto_id' => 'required|exists:productos,producto_id',
        
        'cantidad' => 'required|integer',
        'tipo_operacion_id' => 'required|exists:tipo_operaciones,tipo_operacion_id',
        'agente_id' => 'required|exists:agentes,agente_id',
     ];

    public function mount()
    {           
        $this->usuario_id = Auth::user()->usuario_id;
        $this->fecha = date("Y-m-d");
        $this->productos = Producto::all();
        $this->tiposOperacion = TipoOperacion::all();
        $this->agentes = Agente::all();
        $this->usuarios = User::all();
        $this->salidas = Salida::all();
    }

    public function generatePDF()
    {
        try {
            // Validar los filtros
            $this->validate([
                'fechaInicio' => 'nullable|date',
                'fechaFin' => 'nullable|date|after_or_equal:fechaInicio',
                'mes' => 'nullable|date_format:Y-m'
            ]);

            // Construir la consulta con los filtros
            $query = Salida::with(['producto', 'tipoOperacion', 'agente', 'usuario']);

            if ($this->fechaInicio && $this->fechaFin) {
                $query->whereBetween(DB::raw('DATE(fecha)'), [$this->fechaInicio, $this->fechaFin]);
            }

            if ($this->mes) {
                $query->whereMonth('fecha', '=', date('m', strtotime($this->mes)))
                    ->whereYear('fecha', '=', date('Y', strtotime($this->mes)));
            }

            $entradas = $query->get();

            // Generar el PDF
            $pdf = Pdf::loadView('livewire.salidas.report', ['entradas' => $entradas])
                ->setPaper('a4', 'landscape'); // Tamaño y orientación del papel

            // Descargar el PDF
            return response()->streamDownload(function() use ($pdf) {
                echo $pdf->output();
            }, 'informe_entradas_' . now()->format('Ymd_His') . '.pdf');
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al generar el PDF: ' . $e->getMessage();
        }
    }

    public function showCreateModal()
    {
        $this->resetInputFields();
        $this->showCreate = true;
     }
    
    public function closeModal()
    {
        $this->showCreate = false;
        $this->showEdit = false;
    }
    public function createSalida()
{
    $this->validate();

    try {
        $this->usuario_id = Auth::user()->usuario_id;
        $this->fecha = date("Y-m-d");

        // Obtener el producto para verificar stock disponible
        $producto = Producto::findOrFail($this->producto_id);

        // Validar que el stock sea suficiente
        if ($producto->stock_actual < $this->cantidad) {
            throw new \Exception('Stock insuficiente para realizar la salida.');
        }

        // Crear la salida
        Salida::create([
            'producto_id' => $this->producto_id,
            'fecha' => $this->fecha,
            'cantidad' => $this->cantidad,
            'tipo_operacion_id' => $this->tipo_operacion_id,
            'agente_id' => $this->agente_id,
            'usuario_id' => $this->usuario_id,
        ]);

        // Reducir el stock del producto
        $producto->decrement('stock_actual', $this->cantidad);

        $this->resetInputFields();
        $this->salidas = Salida::all();
        $this->successMessage = 'Salida creada exitosamente.';
    } catch (\Exception $e) {
        $this->errorMessage = 'Error al crear la salida: ' . $e->getMessage();
    }
}


    public function editSalida($id)
    {
        $salida = Salida::findOrFail($id);
        $this->selectedSalidaId = $salida->operacion_id;
        $this->producto_id = $salida->producto_id;
        $this->fecha = $salida->fecha;
        $this->cantidad = $salida->cantidad;
        $this->tipo_operacion_id = $salida->tipo_operacion_id;
        $this->agente_id = $salida->agente_id;
        $this->usuario_id = $salida->usuario_id;
        $this->showEdit = true;
    }

    public function updateSalida()
    {
        $this->validate();

        try {
            // Obtener la salida y el producto relacionados
            $salida = Salida::findOrFail($this->salida_id);
            $producto = Producto::findOrFail($salida->producto_id);

            // Paso 1: Revertir la cantidad original en el stock
            $producto->increment('stock_actual', $salida->cantidad);

            // Paso 2: Validar que el stock sea suficiente para la nueva cantidad
            if ($producto->stock_actual < $this->cantidad) {
                throw new \Exception('Stock insuficiente para actualizar la salida.');
            }

            // Paso 3: Reducir el stock con la nueva cantidad
            $producto->decrement('stock_actual', $this->cantidad);

            // Paso 4: Actualizar la salida
            $salida->update([
                'producto_id' => $this->producto_id,
                'fecha' => $this->fecha,
                'cantidad' => $this->cantidad,
                'tipo_operacion_id' => $this->tipo_operacion_id,
                'agente_id' => $this->agente_id,
                'usuario_id' => Auth::user()->usuario_id,
            ]);

            $this->resetInputFields();
            $this->salidas = Salida::all();
            $this->successMessage = 'Salida actualizada exitosamente.';
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al actualizar la salida: ' . $e->getMessage();
        }
    }


    public function deleteSalida($salidaId)
    {
        try {
            // Obtener la salida y el producto relacionados
            $salida = Salida::findOrFail($salidaId);
            $producto = Producto::findOrFail($salida->producto_id);

            // Revertir la cantidad de la salida en el stock
            $producto->increment('stock_actual', $salida->cantidad);

            // Eliminar la salida
            $salida->delete();

            $this->salidas = Salida::all();
            $this->successMessage = 'Salida eliminada exitosamente.';
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al eliminar la salida: ' . $e->getMessage();
        }
    }


    private function resetInputFields()
    {
        $this->producto_id = null;
        $this->fecha = null;
        $this->cantidad = null;
        $this->tipo_operacion_id = null;
        $this->agente_id = null;
        $this->usuario_id = null;
        $this->showCreate = false;
        $this->showEdit = false;
        $this->selectedSalidaId = null;
        $this->successMessage = '';
        $this->errorMessage = '';
    }
    public function render()
    {
        return view('livewire.salidas.index');
    }
}
