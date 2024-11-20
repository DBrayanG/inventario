<div class="container-fluid pt-1">
    <div class="row">
        <!-- Tarjeta Productos -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text"><?php echo e($productosCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Operaciones -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Operaciones</h5>
                    <p class="card-text"><?php echo e($operacionesCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Roles -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text"><?php echo e($rolesCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Usuarios -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-gradient-info">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="card-text"><?php echo e($userCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Agentes -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-gradient-maroon">
                <div class="card-body">
                    <h5 class="card-title">Agentes</h5>
                    <p class="card-text"><?php echo e($agentesCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>

        <!-- Tarjeta Estantes -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Estantes</h5>
                    <p class="card-text"><?php echo e($estantesCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div> 
         <!-- Tarjeta Categorias -->
         <!--[if BLOCK]><![endif]--><?php if(isset($categoriasCount)): ?>
         <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-gradient-indigo">
                <div class="card-body">
                    <h5 class="card-title">Categorias</h5>
                    <p class="card-text"><?php echo e($categoriasCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        <!-- Tarjeta Permisos (si se incluye) -->
        <!--[if BLOCK]><![endif]--><?php if(isset($permisosCount)): ?>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Permisos</h5>
                    <p class="card-text"><?php echo e($permisosCount); ?></p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


    </div>
</div>
<?php /**PATH D:\SEMESTRE_1_2024\TALLER_DE_GRADO_1\taller_grado\resources\views/livewire/home/index.blade.php ENDPATH**/ ?>