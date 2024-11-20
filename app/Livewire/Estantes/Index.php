<?php

namespace App\Livewire\Estantes;

use App\Models\Estante;
use Livewire\Component;

class Index extends Component
{
    public $estantes;
    public $show_vista = false;
    public $show_editar = false;
    public $estante_seleccionado;
    public $nombre, $descripcion;
    public $nombre_seleccionado, $descripcion_seleccionado;

    public function mount()
    {
        $this->estantes = Estante::all();
    }

    public function vista_crear()
    {
        $this->show_vista = true;
    }

    public function crear_estante()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable|string',
        ]);

        try {
            Estante::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);

            $this->dispatch('estante-creado', 'El estante se creó satisfactoriamente.');
            $this->reset(['nombre', 'descripcion']);
            $this->estantes = Estante::all(); // Refresh list
            $this->show_vista = false;
        } catch (\Throwable $th) {
            $this->dispatch('estante-error', 'No se pudo crear el estante. Intente nuevamente.');
        }
    }

    public function vista_editar($id)
    {
        $this->estante_seleccionado = $id;
        $estante = Estante::find($id);
        $this->nombre_seleccionado = $estante->nombre;
        $this->descripcion_seleccionado = $estante->descripcion;
        $this->show_editar = true;
    }

    public function editar_estante()
    {
        $this->validate([
            'nombre_seleccionado' => 'required',
            'descripcion_seleccionado' => 'nullable|string',
        ]);

        $estante = Estante::find($this->estante_seleccionado);
        $estante->update([
            'nombre' => $this->nombre_seleccionado,
            'descripcion' => $this->descripcion_seleccionado,
        ]);

        $this->dispatch('estante-actualizado', 'El estante se actualizó correctamente.');
        $this->reset(['estante_seleccionado', 'nombre_seleccionado', 'descripcion_seleccionado']);
        $this->estantes = Estante::all(); // Refresh list
        $this->show_editar = false;
    }

    public function eliminar_estante($id)
    {
        Estante::destroy($id);
        $this->dispatch('estante-eliminado', 'Estante eliminado exitosamente.');
        $this->estantes = Estante::all(); // Refresh list
    }

    public function render()
    {
        return view('livewire.estantes.index');
    }
}
