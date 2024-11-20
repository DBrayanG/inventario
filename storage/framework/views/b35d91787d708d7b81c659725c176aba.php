<div>
    <h3>Gestión de Tipos de Agente</h3>



    <button wire:click="showCreateModal" class="btn btn-primary">Crear Tipo de Agente</button>



    <!-- Modal de Crear -->
    <!--[if BLOCK]><![endif]--><?php if($showCreate): ?>
    <div class="modal fade show d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Tipo de Agente</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="$set('showCreate', false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('showCreate', false)">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="createTipoAgente">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Modal de Editar -->
    <!--[if BLOCK]><![endif]--><?php if($showEdit): ?>
    <div class="modal fade show d-block" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Tipo de Agente</h5>
                    <button type="button" class="close" aria-label="Close" wire:click="$set('showEdit', false)">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('showEdit', false)">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="updateTipoAgente">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tipoAgentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoAgente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($tipoAgente->tipo_agente_id); ?></td>
                <td><?php echo e($tipoAgente->nombre); ?></td>
                <td>
                    <button wire:click="showEditModal(<?php echo e($tipoAgente->tipo_agente_id); ?>)" class="btn btn-warning">Editar</button>
                    <button wire:click="deleteTipoAgente(<?php echo e($tipoAgente->tipo_agente_id); ?>)" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </tbody>
    </table>
</div><?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/tipo-agentes/index.blade.php ENDPATH**/ ?>