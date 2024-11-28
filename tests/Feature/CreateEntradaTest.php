<?php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Entrada;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateEntradaTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_entrada_updates_product_stock()
    {
        $producto = Producto::factory()->create(['stock_actual' => 10]);

        $entradaData = [
            'producto_id' => $producto->id,
            'fecha' => now()->toDateString(),
            'cantidad' => 5,
            'tipo_operacion_id' => 1,
            'agente_id' => 1,
            'usuario_id' => 1,
        ];

        Entrada::create($entradaData);

        $producto->refresh();

        $this->assertEquals(15, $producto->stock_actual);
    }
}