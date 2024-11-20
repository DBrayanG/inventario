<div class="container-fluid pt-1">
    <div class="row">
        <!-- Tarjeta Productos -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="card-text">{{ $productosCount }}</p>
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
                    <p class="card-text">{{ $operacionesCount }}</p>
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
                    <p class="card-text">{{ $rolesCount }}</p>
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
                    <p class="card-text">{{ $userCount }}</p>
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
                    <p class="card-text">{{ $agentesCount }}</p>
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
                    <p class="card-text">{{ $estantesCount }}</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div> 
         <!-- Tarjeta Categorias -->
         @if(isset($categoriasCount))
         <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-gradient-indigo">
                <div class="card-body">
                    <h5 class="card-title">Categorias</h5>
                    <p class="card-text">{{ $categoriasCount }}</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>
        @endif
        <!-- Tarjeta Permisos (si se incluye) -->
        @if(isset($permisosCount))
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Permisos</h5>
                    <p class="card-text">{{ $permisosCount }}</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-light">Ver Más</a>
                </div>
            </div>
        </div>
        @endif


    </div>
</div>
