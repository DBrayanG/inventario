<?php

namespace App\Livewire\Roles;

use App\Models\Roles;
use App\Models\Permisos;
 use App\Models\RolesPermisos;
use Livewire\Component;

class Index extends Component
{
    public $roles;
    public $showCreate = false;
    public $showEdit = false;
    public $showPermiso = false;
    public $selectedRoleId;
    public $permisos;
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


    public function createRole()
    {
        $this->validate();

        Roles::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('message', 'Role creado satisfactoriamente.');

        $this->reset(['nombre', 'descripcion', 'showCreate']);
        $this->roles = Roles::all();
    }

    public function showEditModal($id)
    {
        $this->selectedRoleId = $id;
        $role = Roles::findOrFail($id);
        $this->nombre = $role->nombre;
        $this->descripcion = $role->descripcion;
        $this->showEdit = true;
    }

    public function updateRole()
    {
        $this->validate();

        $role = Roles::findOrFail($this->selectedRoleId);
        $role->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('message', 'Role actualizado satisfactoriamente.');

        $this->reset(['nombre', 'showEdit', 'selectedRoleId']);
        $this->roles = Roles::all();
    }

    public function deleteRole($id)
    {
        Roles::destroy($id);

        session()->flash('message', 'Role eliminado satisfactoriamente.');

        $this->roles = Roles::all();
    }

    ///ASIGNACION DE PERMISOS

    public function showPermisosModal($rol_id)
    {

        $this->showPermiso = true;
    }
    public function asignarPermiso($rol_permiso_id)
    {
        $roles_permisos = new RolesPermisos();


        $roles_permisos->save();
    }

    public function eliminarPermiso($rol_permiso_id)
    {
    }















    public function render()
    {
        $this->roles = Roles::all();
        $this->permisos = Permisos::all();
        return view('livewire.roles.index');
    }
}
