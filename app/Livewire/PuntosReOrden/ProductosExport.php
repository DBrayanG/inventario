<?php
namespace App\Livewire\PuntosReOrden;

 

use Maatwebsite\Excel\Concerns\FromArray;

class ProductosExport implements FromArray
{
    protected $productos;

    public function __construct(array $productos)
    {
        $this->productos = $productos;
    }

    public function array(): array
    {
        return $this->productos;
    }
}
