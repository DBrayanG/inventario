<?php

namespace App\Livewire\Categorias;

use App\Models\Categoria;
use App\Models\Categorias;
use Livewire\Component;

class Index extends Component
{
    public $categorias;
    public $showCreate = false;
    public $showEdit = false;
    public $selectedCategoriaId;
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

    public function createCategoria()
    {
        $this->validate();

        Categoria::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('message', 'Categoria creado satisfactoriamente.');

        $this->reset(['nombre','descripcion', 'showCreate']);
        $this->categorias = Categoria::all();
    }

    public function showEditModal($id)
    {
        $this->selectedCategoriaId = $id;
        $Categoria = Categoria::findOrFail($id);
        $this->nombre = $Categoria->nombre;
        $this->descripcion = $Categoria->descripcion;
        $this->showEdit = true;
    }

    public function updateCategoria()
    {
        $this->validate();

        $Categoria = Categoria::findOrFail($this->selectedCategoriaId);
        $Categoria->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('message', 'Categoria actualizado satisfactoriamente.');

        $this->reset(['nombre', 'showEdit', 'selectedCategoriaId']);
        $this->categorias = Categoria::all();
    }

    public function deleteCategoria($id)
    {
        Categoria::destroy($id);

        session()->flash('message', 'Categoria eliminado satisfactoriamente.');

        $this->categorias = Categoria::all();
    }

    public function render()
    {
        $this->categorias = Categoria::all();
        return view('livewire.Categorias.index');
    }
    }
