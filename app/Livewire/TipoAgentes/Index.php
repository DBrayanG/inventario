<?php

namespace App\Livewire\TipoAgentes;

use App\Models\TipoAgente;
use Livewire\Component;

class Index extends Component
{



    public $tipoAgentes;
    public $showCreate = false;
    public $showMessaje = false;
    public $showEdit = false;
    public $selectedTipoAgenteId;
    public $nombre;

    protected $rules = [
        'nombre' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->tipoAgentes = TipoAgente::all();

    }   public function showCreateModal()
    {
        $this->reset(['nombre']);
        $this->showCreate = true;
    }

    public function createTipoAgente()
    {
        $this->validate();

        TipoAgente::create([
            'nombre' => $this->nombre,
        ]);

        session()->flash('message', 'Tipo de Agente creado satisfactoriamente.');
 
        $this->reset(['nombre', 'showCreate']);
        $this->tipoAgentes = TipoAgente::all();
    }

    public function showEditModal($id)
    {
        $this->selectedTipoAgenteId = $id;
        $tipoAgente = TipoAgente::findOrFail($id);
        $this->nombre = $tipoAgente->nombre;
        $this->showEdit = true;
    }

    public function updateTipoAgente()
    {
        $this->validate();

        $tipoAgente = TipoAgente::findOrFail($this->selectedTipoAgenteId);
        $tipoAgente->update([
            'nombre' => $this->nombre,
        ]);

        session()->flash('message', 'Tipo de Agente actualizado satisfactoriamente.');
 
        $this->reset(['nombre', 'showEdit', 'selectedTipoAgenteId']);
        $this->tipoAgentes = TipoAgente::all();
    }

    public function deleteTipoAgente($id)
    {
        TipoAgente::destroy($id);

        session()->flash('message', 'Tipo de Agente eliminado satisfactoriamente.');
         
        $this->tipoAgentes = TipoAgente::all();
    }

    public function render()
    {
        return view('livewire.tipo-agentes.index');
    }
}
