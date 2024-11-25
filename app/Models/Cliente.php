<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        
    ];

    static public function CreateCliente(array $data){
        
        $new = Cliente::create([
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'direccion' => $data['direccion'],
        ]);
        return $new;
    }

    static public function UpdateCliente($id, array $data){
        
        $cliente = Cliente::find($id);
        $cliente->nombre = $data['nombre'] ?? $cliente->nombre;
        $cliente->telefono = $data['telefono'] ?? $cliente->telefono;
        $cliente->direccion = $data['direccion'] ?? $cliente->direccion;
        $cliente->save();
        return $cliente;
    }

    static public function DeleteCliente($id){

        $cliente = Cliente::find($id);
        $cliente->delete();
        return $cliente;
    }

    static public function GetCliente($attribute, $order = "desc", $paginate){

        $cliente = Cliente::where('nombre','ILIKE', "%" . strtolower($attribute) . '%')->orderBy('id', $order)->paginate($paginate);
        return $cliente;
    }

    static public function GetAllCliente(){

        $clientes = Cliente::all();
        return $clientes;
    }

    static public function GetClienteById($id){

        $cliente = Cliente::find($id);
        return $cliente;
    }

    
}
