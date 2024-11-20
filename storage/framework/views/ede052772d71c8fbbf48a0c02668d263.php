<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Rol</button>
    </div>

    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>rol_id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($role->rol_id); ?></td>
                    <td><?php echo e($role->nombre); ?></td>
                    <td><?php echo e($role->descripcion); ?></td>
                    <td>
                        <button wire:click="showEditModal(<?php echo e($role->rol_id); ?>)" class="btn btn-primary">Editar</button>
                        <button wire:click="showPermisosModal(<?php echo e($role->rol_id); ?>)" class="btn btn-success">Permisos</button>
                        <button wire:click="deleteRole(<?php echo e($role->rol_id); ?>)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>

    <!-- Modal para crear rol -->
    <div class="modal fade <?php if($showCreate): ?> show d-block <?php endif; ?>" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nuevo Rol</h5>
                    <button type="button" wire:click="$set('showCreate', false)" class="close" aria-label="Close">
                        <span aria-hrol_idden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model="nombre" type="text" class="form-control">
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
                        <label for="descripcion">Descripcion</label>
                        <input wire:model="descripcion" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['descripcion'];
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
                    <button type="button" wire:click="$set('showCreate', false)" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="createRole" class="btn btn-primary">Crear Rol</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar rol -->
    <div class="modal fade <?php if($showEdit): ?> show d-block <?php endif; ?>" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Rol</h5>
                    <button type="button" wire:click="$set('showEdit', false)" class="close" aria-label="Close">
                        <span aria-hrol_idden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model="nombre" type="text" class="form-control">
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
                        <label for="descripcion">Descripcion</label>
                        <input wire:model="descripcion" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['descripcion'];
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
                    <button type="button" wire:click="$set('showEdit', false)" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="updateRole" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal para asignar permisos -->
    <div class="modal fade <?php if($showPermiso): ?> show d-block <?php endif; ?>" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Asignacion de Permisos</h5>
                <button type="button" wire:click="$set('showPermiso', false)" class="close" aria-label="Close">
                    <span aria-hrol_idden="true">&times;</span>
                </button>
                </div>
                



               
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('roleCreated', message => {
                alert(message);
            });
            Livewire.on('roleUpdated', message => {
                alert(message);
            });
            Livewire.on('roleDeleted', message => {
                alert(message);
            });
        });
    </script>
</div><?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/roles/index.blade.php ENDPATH**/ ?>