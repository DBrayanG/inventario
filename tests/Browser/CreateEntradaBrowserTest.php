<?php
namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Laravel\Dusk\TestCase as DuskTestCase;
use App\Models\User;

class CreateEntradaBrowserTest extends DuskTestCase
{
    public function test_create_entrada()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/entradas/create')
                    ->type('producto_id', 1)
                    ->type('fecha', now()->toDateString())
                    ->type('cantidad', 5)
                    ->type('tipo_operacion_id', 1)
                    ->type('agente_id', 1)
                    ->press('Guardar')
                    ->assertSee('La entrada se ha creado correctamente.');
        });
    }
}