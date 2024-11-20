<div>
    <div>
        <button wire:click="vista_crear()" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Estante</button>
    </div>

    <div class="row mt-4">
    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $estantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estante): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            // Array de clases de fondo de Bootstrap
            $backgroundClasses = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
            // Seleccionar aleatoriamente una clase de fondo
            $randomBackgroundClass = $backgroundClasses[array_rand($backgroundClasses)];
        ?>
             <div class="card-body">
                <div class="card-box <?php echo e($randomBackgroundClass); ?> mb-2 p-3 rounded">
                    <h5 class="mb-2"><?php echo e($estante->nombre); ?></h5>
                    <p><?php echo e($estante->descripcion); ?></p>
                    <button wire:click="vista_editar(<?php echo e($estante->estante_id); ?>)" class="btn btn-primary">Editar</button>
                    <button wire:click="eliminar_estante(<?php echo e($estante->estante_id); ?>)" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
</div>


    <!--[if BLOCK]><![endif]--><?php if($show_vista): ?>
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="createEstanteModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createEstanteModalLabel">Crear Nuevo Estante</h4>
                    <button wire:click="$set('show_vista', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="crear_estante">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" wire:model="nombre">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" wire:model="descripcion"></textarea>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['descripcion'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($show_editar): ?>
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="editEstanteModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editEstanteModalLabel">Editar Estante</h4>
                    <button wire:click="$set('show_editar', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editar_estante">
                        <div class="form-group">
                            <label for="nombre_seleccionado">Nombre</label>
                            <input type="text" class="form-control" id="nombre_seleccionado" wire:model="nombre_seleccionado">
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['nombre_seleccionado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="form-group">
                            <label for="descripcion_seleccionado">Descripción</label>
                            <textarea class="form-control" id="descripcion_seleccionado" wire:model="descripcion_seleccionado"></textarea>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['descripcion_seleccionado'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('estante-creado', (message) => {
                alert(message);
            });
            Livewire.on('estante-error', (message) => {
                alert(message);
            });
            Livewire.on('estante-actualizado', (message) => {
                alert(message);
            });
            Livewire.on('estante-eliminado', (message) => {
                alert(message);
            });
        });
    </script>
</div>
<?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/estantes/index.blade.php ENDPATH**/ ?>