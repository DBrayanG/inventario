<?php

namespace App\Livewire\Entradas;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Agente;
use App\Models\Entrada;
use App\Models\Producto;
use App\Models\TipoOperacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public $entradas;
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
    public $selectedEntradadId;
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

        $this->entradas = Entrada::all();
        //dd($this->entradas);
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
            $query = Entrada::with(['producto', 'tipoOperacion', 'agente', 'usuario']);

            if ($this->fechaInicio && $this->fechaFin) {
                $query->whereBetween(DB::raw('DATE(fecha)'), [$this->fechaInicio, $this->fechaFin]);
            }

            if ($this->mes) {
                $query->whereMonth('fecha', '=', date('m', strtotime($this->mes)))
                    ->whereYear('fecha', '=', date('Y', strtotime($this->mes)));
            }

            $entradas = $query->get();

            // Generar el PDF
            $pdf = Pdf::loadView('livewire.entradas.report', ['entradas' => $entradas])
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

    public function createEntrada()
    {
        $this->validate();
        $this->usuario_id = Auth::user()->usuario_id; // Corrección de 'usuaario_id' a 'usuario_id'
        $this->fecha = now()->toDateString(); // Uso de Carbon para obtener la fecha actual
        try {
            // Crear la entrada
            Entrada::create([
                'producto_id' => $this->producto_id,
                'fecha' => $this->fecha,
                'cantidad' => $this->cantidad,
                'tipo_operacion_id' => $this->tipo_operacion_id,
                'agente_id' => $this->agente_id,
                'usuario_id' => $this->usuario_id,
            ]);

            // Actualizar el stock del producto
            $producto = Producto::findOrFail($this->producto_id); // Corrección de 'findOrFaild' a 'findOrFail'
            $producto->increment('stock_actual', $this->cantidad); // Uso de 'increment' para actualizar el stock
            // Actualizar la lista de tipos de operación y resetear campos
            $this->tiposOperacion = TipoOperacion::all();
            $this->entradas = Entrada::all();
            $this->resetInputFields(); // Corrección de 'resetInputFileds' a 'resetInputFields'
            $this->successMessage = 'La entrada se ha creado correctamente.';
            $this->showCreate = false;
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al crear la entrada: ' . $e->getMessage();
        }
    }

    public function editEntrada($id){
        $entrada = Entrada::findOrFail($id);
        $this->selectedEntradadId = $entrada->id;
        $this->producto_id = $entrada->producto_id;
        $this->fecha = $entrada->fecha;
        $this->cantidad = $entrada->cantidad;
        $this->tipo_operacion_id = $entrada->tipo_operacion_id;
        $this->agente_id = $entrada->agente_id;
        $this->usuario_id = $entrada->usuario_id;
        $this->showEdit = true;
    }

    public function updateEntrada()
    {        
        $this->validate();
        try {
            // Obtener la entrada y el producto relacionados
            $entrada = Entrada::findOrFail($this->entrada_id);
            $producto = Producto::findOrFail($entrada->producto_id);
            // Paso 1: Revertir el efecto de la cantidad original en el stock
            $producto->decrement('stock_actual', $entrada->cantidad);
            // Paso 2: Aplicar la nueva cantidad al stock
            $producto->increment('stock_actual', $this->cantidad);
            // Paso 3: Actualizar la entrada
            $entrada->update([
                'producto_id' => $this->producto_id,
                'fecha' => now()->toDateString(),
                'cantidad' => $this->cantidad,
                'tipo_operacion_id' => $this->tipo_operacion_id,
                'agente_id' => $this->agente_id,
                'usuario_id' => Auth::user()->usuario_id,
            ]);
            // Mensaje de éxito
            $this->successMessage = 'La entrada se ha actualizado correctamente.';
            $this->showEdit = false;
            $this->resetInputFields();
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al actualizar la entrada: ' . $e->getMessage();
        }
    }

    public function deleteEntrada($entradaId)
    {
        try {
            $entrada = Entrada::findOrFail($entradaId); // Obtener la entrada a eliminar
            $producto = Producto::findOrFail($entrada->producto_id); // Obtener el producto relacionado
            // Reducir el stock del producto
            $producto->decrement('stock_actual', $entrada->cantidad);
            // Eliminar la entrada
            $entrada->delete();
            // Mensaje de éxito
            $this->successMessage = 'La entrada se ha eliminado correctamente.';
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al eliminar la entrada.';
        }
    }

    private function resetInputFields(){
        $this->producto_id = null;
        $this->fecha = null;
        $this->cantidad = null;
        $this->tipo_operacion_id = null;
        $this->agente_id = null;
        $this->usuario_id = null;
        $this->showCreate = false;
        $this->showEdit = false;
        $this->selectedEntradadId = null;
        $this->successMessage = '';
        $this->errorMessage = '';
    }
    public function render()
    {
        return view('livewire.entradas.index');
    }
}
