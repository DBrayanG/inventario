<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Informe de Entradas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .header { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <h1 class="header">Informe de Entradas</h1>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Fecha</th>
                <th>Cantidad</th>
                <th>Tipo de Operación</th>
                <th>Agente</th>
                <th>Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $entradas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $entrada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($entrada->producto->nombre); ?></td>
                <td><?php echo e($entrada->fecha); ?></td>
                <td><?php echo e($entrada->cantidad); ?></td>
                <td><?php echo e($entrada->tipoOperacion->nombre); ?></td>
                <td><?php echo e($entrada->agente->nombre); ?></td>
                <td><?php echo e($entrada->usuario->name); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH E:\2-2024\Taller\inventario\resources\views/livewire/entradas/report.blade.php ENDPATH**/ ?>