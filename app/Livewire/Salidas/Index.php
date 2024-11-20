<?php

namespace App\Livewire\Salidas;

use App\Models\Agente;
use App\Models\Operacion;
use App\Models\Producto;
use App\Models\TipoOperacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $operaciones;
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
    public $selectedOperacionId;
    public $showCreate = false;
    public $showEdit = false;
    public $successMessage = '';
    public $errorMessage = '';

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

        $this->operaciones = Operacion::all();
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
    
    
    

    public function createOperacion()
    {
        $this->validate();
        $this->usuario_id = Auth::user()->usuario_id;
        $this->fecha = date("Y-m-d");

        try {
            Operacion::create([
                'producto_id' => $this->producto_id,
                'fecha' => $this->fecha,
                'cantidad' => $this->cantidad,
                'tipo_operacion_id' => $this->tipo_operacion_id,
                'agente_id' => $this->agente_id,
                'usuario_id' => $this->usuario_id,
            ]);

            $this->resetInputFields();
            $this->operaciones = Operacion::all();
            $this->successMessage = 'Operación creada exitosamente.';
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al crear la operación. Inténtelo de nuevo.';
        }
    }

    public function editOperacion($id)
    {
        $operacion = Operacion::findOrFail($id);
        $this->selectedOperacionId = $operacion->operacion_id;
        $this->producto_id = $operacion->producto_id;
        $this->fecha = $operacion->fecha;
        $this->cantidad = $operacion->cantidad;
        $this->tipo_operacion_id = $operacion->tipo_operacion_id;
        $this->agente_id = $operacion->agente_id;
        $this->usuario_id = $operacion->usuario_id;
        $this->showEdit = true;
    }

    public function updateOperacion()
    {
        $this->validate();
        $this->fecha = date("Y-m-d");

        try {
            $operacion = Operacion::findOrFail($this->selectedOperacionId);
            $operacion->update([
                'producto_id' => $this->producto_id,
                'fecha' => $this->fecha,
                'cantidad' => $this->cantidad,
                'tipo_operacion_id' => $this->tipo_operacion_id,
                'agente_id' => $this->agente_id,
                'usuario_id' => $this->usuario_id,
            ]);

            $this->resetInputFields();
            $this->operaciones = Operacion::all();
            $this->successMessage = 'Operación actualizada exitosamente.';
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al actualizar la operación. Inténtelo de nuevo.';
        }
    }

    public function deleteOperacion($id)
    {
        try {
            Operacion::findOrFail($id)->delete();
            $this->operaciones = Operacion::all();
            $this->successMessage = 'Operación eliminada exitosamente.';
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al eliminar la operación. Inténtelo de nuevo.';
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
        $this->selectedOperacionId = null;
        $this->successMessage = '';
        $this->errorMessage = '';
    }
    public function render()
    {
        return view('livewire.salidas.index');
    }
}
