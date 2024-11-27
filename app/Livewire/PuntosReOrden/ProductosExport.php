<?php
namespace App\Livewire\PuntosReOrden;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Producto;
use Maatwebsite\Excel\Concerns\FromArray;

class ProductosExport implements FromCollection, WithHeadings, WithMapping
{
    protected $productosParaPedir;

    public function __construct($productosParaPedir)
    {
        $this->productosParaPedir = $productosParaPedir;
    }

    public function collection()
    {
        return collect($this->productosParaPedir);
    }

    public function headings(): array
    {
        return [
            'Producto',
            'Stock Actual',
            'ROP',
            'Cantidad a Pedir',
        ];
    }

    public function map($producto): array
    {
        return [
            $producto['producto'],
            $producto['stock_actual'],
            $producto['rop'],
            $producto['cantidad_a_pedir'],
        ];
    }
}
