<?php $__env->startSection('title', 'El Buen Agricultor'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Entradas</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-4">
    
    <div class="card mb-4">
        <div class="card-body">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("entradas.index");

$__html = app('livewire')->mount($__name, $__params, 'lw-2526240985-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>



    <div class="card mb-4">
        <div class="card-body">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split("tipo-operacion.index");

$__html = app('livewire')->mount($__name, $__params, 'lw-2526240985-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
    
   
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\2-2024\Taller\inventario\resources\views/admin/entradas.blade.php ENDPATH**/ ?>