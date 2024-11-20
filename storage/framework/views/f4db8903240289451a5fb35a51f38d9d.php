<div>
    <div>
        <button wire:click="vista_crear" class="btn btn-primary">
            <i class="fa fa-plus"></i> Nueva Categoría
        </button>
    </div>

    <div class="row bg bg-soft-success">
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card m-2">
            <div class="card-body">
                <div class="card-box bg-<?php echo e($loop->index % 2 == 0 ? 'soft-purple' : 'soft-blue'); ?> mb-2 p-3 rounded">
                    <h5 class="mb-2"><?php echo e($categoria->nombre); ?></h5>
                    <button wire:click="vista_editar(<?php echo e($categoria->categoria_id); ?>)" class="btn btn-primary">Editar</button>
                    <button wire:click="eliminar_categoria(<?php echo e($categoria->categoria_id); ?>)" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($show_vista): ?>
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="createProductoModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createCategoryModalLabel">CREAR NUEVA CATEGORÍA</h4>
                    <button wire:click="$set('show_vista', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input wire:model="nombre" name="nombre" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="$set('show_vista', false)" type="button" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="crear_categoria" type="button" class="btn btn-success">Crear Categoría</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($show_editar): ?>
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editCategoryModalLabel">EDITAR CATEGORÍA</h4>
                    <button wire:click="$set('show_editar', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_seleccionda">Nombre:</label>
                        <input wire:model="nombre_seleccionda" name="nombre_seleccionda" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombre_seleccionda'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="$set('show_editar', false)" type="button" class="btn btn-secondary">Cancelar</button>
                    <button wire:click="editar_categoria" type="button" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <script>
        document.addEventListener('livewire:load', () => {
            Livewire.on('categoria-creada', event => {
                alert(event.message);
            });
            Livewire.on('categoria-error', event => {
                alert(event.message);
            });
            Livewire.on('categoria-actualizado', event => {
                alert(event.message);
            });
            Livewire.on('categoria-eliminada', event => {
                alert(event.message);
            });
        });
    </script>
</div>
<?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/categorias/index.blade.php ENDPATH**/ ?>