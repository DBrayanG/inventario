<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i>Nuevo Cliente</button>
    </div>

    <div class="mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cliente->id); ?></td>
                    <td><?php echo e($cliente->nombre); ?></td>
                    <td><?php echo e($cliente->telefono); ?></td>
                    <td><?php echo e($cliente->direccion); ?></td>
                    <td>
                        <button wire:click="showEditModal(<?php echo e($cliente->id); ?>)" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteCliente(<?php echo e($cliente->id); ?>)" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </tbody>
        </table>
    </div>
    <!-- Modal para crear -->
    <div class="modal fade <?php if($showCreate): ?> show d-block <?php endif; ?>" tabindex="-1" categoria="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" categoria="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nuevo Cliente</h5>
                    <button type="button" wire:click="$set('showCreate', false)" class="close" aria-label="Close">
                        <span aria-hcategoria_idden="true">&times;</span>
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
                        <label for="telefono">Telefono</label>
                        <input wire:model="telefono" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input wire:model="direccion" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['direccion'];
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
                    <button type="button" wire:click="createCliente" class="btn btn-primary">Crear Cliente</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar -->
    <div class="modal fade <?php if($showEdit): ?> show d-block <?php endif; ?>" tabindex="-1" categoria="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" categoria="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Cliente</h5>
                    <button type="button" wire:click="$set('showEdit', false)" class="close" aria-label="Close">
                        <span aria-hcategoria_idden="true">&times;</span>
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
                        <label for="telefono">Telefono</label>
                        <input wire:model="telefono" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['telefono'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input wire:model="direccion" type="text" class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['direccion'];
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
                    <button type="button" wire:click="updateCliente" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('clienteCreated', message => {
                alert(message);
            });
            Livewire.on('clienteUpdated', message => {
                alert(message);
            });
            Livewire.on('clienteDeleted', message => {
                alert(message);
            });
        });
    </script>
</div>
<?php /**PATH E:\2-2024\Taller\inventario\resources\views/livewire/cliente/index.blade.php ENDPATH**/ ?>