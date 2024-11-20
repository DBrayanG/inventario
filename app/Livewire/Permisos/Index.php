<?php

namespace App\Livewire\Permisos;

use App\Models\Permisos;
use Livewire\Component;

class Index extends Component
{
    public $permisos;
    public $show_vista = false;
    public $show_editar = false;
    public $permiso_seleccionado;
    public $nombre, $descripcion;
    public $nombre_seleccionado, $descripcion_seleccionado;

    public function mount()
    {
        $this->permisos = Permisos::all();
    }

    public function vista_crear()
    {
        $this->show_vista = true;
    }

    public function crear_permiso()
    {
        $this->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        try {
            Permisos::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
            ]);

            $this->dispatch('permiso-creado', 'El permiso se creó satisfactoriamente.');
            $this->reset(['nombre', 'descripcion']);
            $this->permisos = Permisos::all(); // Refresh list
            $this->show_vista = false;
        } catch (\Throwable $th) {
            $this->dispatch('permiso-error', 'No se pudo crear el permiso. Intente nuevamente.');
        }
    }

    public function vista_editar($id)
    {
        $this->permiso_seleccionado = $id;
        $permiso = Permisos::find($id);
        $this->nombre_seleccionado = $permiso->nombre;
        $this->descripcion_seleccionado = $permiso->descripcion;
        $this->show_editar = true;
    }

    public function editar_permiso()
    {
        $this->validate([
            'nombre_seleccionado' => 'required|string|max:255',
            'descripcion_seleccionado' => 'nullable|string',
        ]);

        $permiso = Permisos::find($this->permiso_seleccionado);
        $permiso->update([
            'nombre' => $this->nombre_seleccionado,
            'descripcion' => $this->descripcion_seleccionado,
        ]);

        $this->dispatch('permiso-actualizado', 'El permiso se actualizó correctamente.');
        $this->reset(['permiso_seleccionado', 'nombre_seleccionado', 'descripcion_seleccionado']);
        $this->permisos = Permisos::all(); // Refresh list
        $this->show_editar = false;
    }

    public function eliminar_permiso($id)
    {
        Permisos::destroy($id);
        $this->dispatch('permiso-eliminado', 'Permiso eliminado exitosamente.');
        $this->permisos = Permisos::all(); // Refresh list
    }

    public function render()
    {
        return view('livewire.permisos.index');
    }
}
