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
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $productosParaPedir; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($producto['producto']); ?></td>
                    <td><?php echo e($producto['stock_actual']); ?></td>
                    <td><?php echo e($producto['rop']); ?></td>
                    <td><?php echo e($producto['cantidad_a_pedir']); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
</div><?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/puntos-re-orden/index.blade.php ENDPATH**/ ?>