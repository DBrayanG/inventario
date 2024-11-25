<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class Index extends Component
{
    public $clientes;
    public $showCreate = false;
    public $showEdit = false;
    public $selectClienteId;
    public $nombre;
    public $telefono;
    public $direccion;

    protected $rules = [
        'nombre' =>'required|min:3',
        'telefono' =>'required|numeric',
        'direccion' =>'required'
    ];

    public function showCreateModal(){
        $this->reset(['nombre', 'telefono', 'direccion']);
        $this->showCreate = true;
    }

    public function createCliente(){
        $this->validate();
        Cliente::create([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion
        ]);
        session()->flash('message', 'Cliente creado satisfactoriamente');
        $this->reset(['nombre', 'telefono', 'direccion']);
        $this->showCreate = false;
        $this->clientes = Cliente::all();
    }

    public function showEditModal($id){
        $this->selectClienteId = $id;
        $cliente = Cliente::find($id);
        $this->nombre = $cliente->nombre;
        $this->telefono = $cliente->telefono;
        $this->direccion = $cliente->direccion;
        $this->showEdit = true;
    }

    public function updateCliente(){
        $this->validate();
        $cliente = Cliente::find($this->selectClienteId);
        $cliente->update([
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion
        ]);
        session()->flash('message', 'Cliente actualizado satisfactoriamente');
        $this->reset(['nombre', 'telefono', 'direccion']);
        $this->showEdit = false;
        $this->clientes = Cliente::all();
    }

    public function deleteCliente($id){
        Cliente::destroy($id);
        session()->flash('message', 'Cliente eliminado satisfactoriamente');
        $this->clientes = Cliente::all();
    }
    /* public function mount()
    {
        $this->clientes = Cliente::all();
    } */
    public function render()
    {
        $this->clientes = Cliente::all();
        return view('livewire.cliente.index');
    }
}
