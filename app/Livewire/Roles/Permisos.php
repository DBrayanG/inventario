<?php

namespace App\Livewire\Roles;

use App\Models\RolesPermisos;
use Livewire\Component;

class Permisos extends Component
{   public $roleId;
    public $permissions = [];
    public $selectedPermissions = [];

    public function mount()
    {
         
        $this->permissions = Permisos::all();
        $this->loadSelectedPermissions();
    }

    public function loadSelectedPermissions()
    {
        $this->selectedPermissions = RolesPermisos::all();
    }

    public function togglePermission($permissionId)
    {
        if (in_array($permissionId, $this->selectedPermissions)) {
            RolesPermisos::where('rol_id', $this->roleId)
                ->where('permiso_id', $permissionId)
                ->delete();
            
            // Remove from selectedPermissions array
            $this->selectedPermissions = array_filter($this->selectedPermissions, function($id) use ($permissionId) {
                return $id != $permissionId;
            });
        } else {
            RolesPermisos::create([
                'rol_id' => $this->roleId,
                'permiso_id' => $permissionId,
            ]);

            // Add to selectedPermissions array
            $this->selectedPermissions[] = $permissionId;
        }
    }

    public function render()
    {
        return view('livewire.roles.permisos');
    }
}
