<div class="container  ">
    <h2 class="mb-4">Productos para Pedido</h2>
    <div class="mb-3 d-flex space-y-2">

        <!-- Botón para exportar a Excel -->
        <button wire:click="imprimirxls" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Excel
        </button>
        
        <button wire:click="calcularProductosParaPedir" class="btn bg-transparent ml-auto"  >
            <i class="fas fa-sync"></i>
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Stock Actual</th>
                    <th scope="col">ROP</th>
                    <th scope="col">Cantidad a Pedir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productosParaPedir as $producto)
                <tr>
                    <td>{{ $producto['producto'] }}</td>
                    <td>{{ $producto['stock_actual'] }}</td>
                    <td>{{ $producto['rop'] }}</td>
                    <td>{{ $producto['cantidad_a_pedir'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>