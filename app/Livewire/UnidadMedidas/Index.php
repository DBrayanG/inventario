<?php

namespace App\Livewire\UnidadMedidas;

use App\Models\UnidadMedida;
use Livewire\Component;

class Index extends Component
{
    public $unidad_medidas;
    public $show_vista = false;
    public $show_editar = false;
    public $unidad_medida_seleccionada;
    public $nombre;
    public $descripcion;

    public function mount()
    {
        $this->unidad_medidas = UnidadMedida::all();
    }

    public function vista_crear()
    {
        $this->show_vista = true;
    }

    public function crear_unidad_medida()
    {
        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        try {
            $unidad_medida = new UnidadMedida();
            $unidad_medida->nombre = $this->nombre;
            $unidad_medida->descripcion = $this->descripcion;
            $unidad_medida->save();

            $this->dispatch('unidad-medida-creada', 'La unidad de medida se creó satisfactoriamente.');
            $this->reset(['nombre', 'descripcion']);
            $this->unidad_medidas = UnidadMedida::all();
        } catch (\Throwable $th) {
            $this->dispatch('unidad-medida-error', 'La unidad de medida no se pudo crear. Intente nuevamente.');
        }

        $this->show_vista = false;
    }

    public function vista_editar($id)
    {
        $this->unidad_medida_seleccionada = $id;
        $unidad_medida = UnidadMedida::findOrFail($id);
        $this->nombre = $unidad_medida->nombre;
        $this->descripcion = $unidad_medida->descripcion;
        $this->show_editar = true;
    }

    public function editar_unidad_medida()
    {
        $unidad_medida = UnidadMedida::findOrFail($this->unidad_medida_seleccionada);
        $unidad_medida->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion
        ]);

        $this->dispatch('unidad-medida-actualizada', 'La unidad de medida se actualizó correctamente.');
        $this->reset(['unidad_medida_seleccionada', 'nombre', 'descripcion']);
        $this->unidad_medidas = UnidadMedida::all();
        $this->show_editar = false;
    }

    public function eliminar_unidad_medida($id)
    {
        UnidadMedida::destroy($id);

        $this->dispatch('unidad-medida-eliminada', 'La unidad de medida se eliminó exitosamente.');
        $this->unidad_medidas = UnidadMedida::all();
    }

    public function render()
    {
        return view('livewire.unidad-medidas.index');
    }
}
