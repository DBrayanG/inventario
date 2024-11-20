<?php

namespace App\Livewire\tipoOperacion;
use Livewire\Component;

use App\Models\tipoOperacion;

class Index extends Component
{
    public $tipoOperacions;
    public $showCreate = false;
    public $showEdit = false;
    public $selectedtipoOperacionId;
    public $nombre;
    public $descripcion;

    protected $rules = [
        'nombre' => 'required|string|max:255',
    ];

    public function showCreateModal()
    {
        $this->reset(['nombre']);
        $this->reset(['descripcion']);
        $this->showCreate = true;
    }

    public function createtipoOperacion()
    {
        $this->validate();

        tipoOperacion::create([
            'nombre' => $this->nombre,
         ]);

        session()->flash('message', 'tipoOperacion creado satisfactoriamente.');

        $this->reset(['nombre' , 'showCreate']);
        $this->tipoOperacions = tipoOperacion::all();
    }

    public function showEditModal($id)
    {
        $this->selectedtipoOperacionId = $id;
        $tipoOperacion = tipoOperacion::findOrFail($id);
        $this->nombre = $tipoOperacion->nombre;
        $this->descripcion = $tipoOperacion->descripcion;
        $this->showEdit = true;
    }

    public function updatetipoOperacion()
    {
        $this->validate();

        $tipoOperacion = tipoOperacion::findOrFail($this->selectedtipoOperacionId);
        $tipoOperacion->update([
            'nombre' => $this->nombre,
         ]);

        session()->flash('message', 'tipoOperacion actualizado satisfactoriamente.');

        $this->reset(['nombre', 'showEdit', 'selectedtipoOperacionId']);
        $this->tipoOperacions = tipoOperacion::all();
    }

    public function deletetipoOperacion($id)
    {
        tipoOperacion::destroy($id);

        session()->flash('message', 'tipoOperacion eliminado satisfactoriamente.');

        $this->tipoOperacions = tipoOperacion::all();
    }

    public function render()
    {
        $this->tipoOperacions = tipoOperacion::all();
        return view('livewire.tipo-operacion.index');
    }
    }
