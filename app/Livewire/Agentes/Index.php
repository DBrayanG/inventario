<?php

namespace App\Livewire\Agentes;

use Livewire\Component;
use App\Models\Agente;
use App\Models\TipoAgente;

class Index extends Component
{
    public $agentes;
    public $tipoAgentes;
    public $errorMessage = "";
    public $successMessage = "";
    public $showCreate = false;
    public $showEdit = false;
    public $showError = false;
    public $showSuccess = false;
    public $selectedAgenteId;
    public $nombre;
    public $telefono;
    public $email;
    public $direccion;
    public $tipo_agente_id;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'telefono' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'direccion' => 'required|string|max:255',
        'tipo_agente_id' => 'required|integer',
    ];

    public function mount()
    {
        $this->agentes = Agente::all();
        $this->tipoAgentes = TipoAgente::all();
    }

    public function showCreateModal()
    {
        $this->reset(['nombre', 'telefono', 'email', 'direccion', 'tipo_agente_id']);
        $this->showCreate = true;
    }

    public function createAgente()
    {
        $this->validate();

        Agente::create([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'tipo_agente_id' => $this->tipo_agente_id,
        ]);

        $this->showSuccess = true;
        $this->successMessage = "Agente creado satisfactoriamente.";

        session()->flash('message', 'Agente creado satisfactoriamente.');

        $this->reset(['nombre', 'telefono', 'email', 'direccion', 'tipo_agente_id', 'showCreate']);
        $this->agentes = Agente::all();
    }

    public function showEditModal($id)
    {
        $this->selectedAgenteId = $id;
        $agente = Agente::findOrFail($id);
        $this->nombre = $agente->nombre;
        $this->telefono = $agente->telefono;
        $this->email = $agente->email;
        $this->direccion = $agente->direccion;
        $this->tipo_agente_id = $agente->tipo_agente_id;
        $this->showEdit = true;
    }

    public function updateAgente()
    {
        $this->validate();

        $agente = Agente::findOrFail($this->selectedAgenteId);

        $agente->update([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'tipo_agente_id' => $this->tipo_agente_id,
        ]);

        session()->flash('message', 'Agente actualizado satisfactoriamente.');

        $this->reset(['nombre', 'telefono', 'email', 'direccion', 'tipo_agente_id', 'showEdit', 'selectedAgenteId']);
        $this->agentes = Agente::all();
    }

    public function deleteAgente($id)
    {
        $agente = Agente::findOrFail($id);
        $agente->delete();

        session()->flash('message', 'Agente eliminado satisfactoriamente.');

        $this->agentes = Agente::all();
    }

    public function render()
    {
        return view('livewire.agentes.index');
    }
}
