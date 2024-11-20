<?php

namespace App\Livewire\Home;

use App\Models\Agente;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Operacion;
use App\Models\Roles;
use App\Models\Estante;
use App\Models\Permisos;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $productosCount;
    public $operacionesCount;
    public $rolesCount;
    public $estantesCount;
    public $permisosCount;  
    public $categoriasCount;  
    public $userCount;  
    public $agentesCount;  

    public function mount()
    {
        $this->productosCount = Producto::count();
        $this->operacionesCount = Operacion::count();
        $this->rolesCount = Roles::count();
        $this->estantesCount = Estante::count();
        $this->permisosCount = Permisos::count(); 
        $this->categoriasCount = Categoria::count();  
        $this->userCount = User::count(); 
        $this->agentesCount = Agente::count(); 
    }

    public function render()
    {
        return view('livewire.home.index');
    }
}
