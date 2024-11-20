<div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Gestión de Operaciones</h3>
            <!--[if BLOCK]><![endif]--><?php if($successMessage): ?>
            <div class="alert alert-success"><?php echo e($successMessage); ?></div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <!--[if BLOCK]><![endif]--><?php if($errorMessage): ?>
            <div class="alert alert-danger"><?php echo e($errorMessage); ?></div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <button wire:click="showCreateModal" class="btn btn-primary mb-3">Crear Operación</button>

            <!-- Modal de Crear -->
            <div class="modal fade <?php if($showCreate): ?> show d-block <?php endif; ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Nueva Operación</h5>
                            <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="createOperacion">
                                <div class="row">
                                    <!-- Columna 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="producto_id">Producto</label>
                                            <select wire:model="producto_id" class="form-control">
                                                <option value="">Seleccione un producto</option>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($producto->producto_id); ?>"><?php echo e($producto->nombre); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </select>
                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['producto_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" wire:model="cantidad" class="form-control">
                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                    <!-- Columna 2 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_operacion_id">Tipo de Operación</label>
                                            <select wire:model="tipo_operacion_id" class="form-control">
                                                <option value="">Seleccione un tipo de operación</option>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tiposOperacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoOperacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($tipoOperacion->tipo_operacion_id); ?>"><?php echo e($tipoOperacion->nombre); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </select>
                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tipo_operacion_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                        <div class="form-group">
                                            <label for="agente_id">Agente</label>
                                            <select wire:model="agente_id" class="form-control">
                                                <option value="">Seleccione un agente</option>
                                                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $agentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($agente->agente_id); ?>"><?php echo e($agente->nombre); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                            </select>
                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['agente_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de Editar -->
            <div class="modal fade <?php if($showEdit): ?> show d-block <?php endif; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Operación</h5>
                <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateOperacion">
                    <div class="row">
                        <!-- Columna 1 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="producto_id">Producto</label>
                                <select wire:model="producto_id" class="form-control">
                                    <option value="">Seleccione un producto</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($producto->producto_id); ?>"><?php echo e($producto->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['producto_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" wire:model="fecha" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['fecha'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" wire:model="cantidad" class="form-control">
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['cantidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <!-- Columna 2 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_operacion_id">Tipo de Operación</label>
                                <select wire:model="tipo_operacion_id" class="form-control">
                                    <option value="">Seleccione un tipo de operación</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $tiposOperacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoOperacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipoOperacion->tipo_operacion_id); ?>"><?php echo e($tipoOperacion->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['tipo_operacion_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="form-group">
                                <label for="agente_id">Agente</label>
                                <select wire:model="agente_id" class="form-control">
                                    <option value="">Seleccione un agente</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $agentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($agente->agente_id); ?>"><?php echo e($agente->nombre); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['agente_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario</label>
                                <select wire:model="usuario_id" class="form-control">
                                    <option value="">Seleccione un usuario</option>
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($usuario->usuario_id); ?>"><?php echo e($usuario->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['usuario_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Operación</th>
                        <th>Agente</th>
                        <th>Personal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $operaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $operacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($operacion->operacion_id); ?></td>
                        <td><?php echo e($operacion->producto->nombre); ?></td>
                        <td><?php echo e($operacion->fecha); ?></td>
                        <td><?php echo e($operacion->cantidad); ?></td>
                        <td><?php echo e($operacion->tipoOperacion->nombre); ?></td>
                        <td><?php echo e($operacion->agente->nombre); ?></td>
                        <td><?php echo e($operacion->usuario->name); ?></td>
                        <td>
                            <button wire:click="editOperacion(<?php echo e($operacion->operacion_id); ?>)" class="btn btn-sm btn-warning">Editar</button>
                            <button wire:click="deleteOperacion(<?php echo e($operacion->operacion_id); ?>)" class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/salidas/index.blade.php ENDPATH**/ ?>