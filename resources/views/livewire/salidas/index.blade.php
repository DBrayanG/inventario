<div>
    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Gestión de Salidas</h3>
            @if ($successMessage)
            <div class="alert alert-success">{{ $successMessage }}</div>
            @endif
            @if ($errorMessage)
            <div class="alert alert-danger">{{ $errorMessage }}</div>
            @endif

            <button wire:click="showCreateModal" class="btn btn-primary mb-3">Crear Salida</button>
            <button wire:click="generatePDF" class="btn btn-primary mb-3">Descargar Informe PDF</button>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fechaInicio">Fecha Inicio:</label>
                    <input type="date" wire:model="fechaInicio" id="fechaInicio" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="fechaFin">Fecha Fin:</label>
                    <input type="date" wire:model="fechaFin" id="fechaFin" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="mes">Mes:</label>
                    <input type="month" wire:model="mes" id="mes" class="form-control">
                </div>
            </div>
            <!-- Modal de Crear -->
            <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Crear Nueva Salida</h5>
                            <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form wire:submit.prevent="createSalida">
                                <div class="row">
                                    <!-- Columna 1 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="producto_id">Producto</label>
                                            <select wire:model="producto_id" class="form-control">
                                                <option value="">Seleccione un producto</option>
                                                @foreach($productos as $producto)
                                                <option value="{{ $producto->producto_id }}">{{ $producto->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('producto_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" wire:model="cantidad" class="form-control">
                                            @error('cantidad') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!-- Columna 2 -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_operacion_id">Tipo de Operación</label>
                                            <select wire:model="tipo_operacion_id" class="form-control">
                                                <option value="">Seleccione un tipo de operación</option>
                                                @foreach($tiposOperacion as $tipoOperacion)
                                                <option value="{{ $tipoOperacion->tipo_operacion_id }}">{{ $tipoOperacion->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('tipo_operacion_id') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="agente_id">Agente</label>
                                            <select wire:model="agente_id" class="form-control">
                                                <option value="">Seleccione un agente</option>
                                                @foreach($agentes as $agente)
                                                <option value="{{ $agente->agente_id }}">{{ $agente->nombre }}</option>
                                                @endforeach
                                            </select>
                                            @error('agente_id') <span class="text-danger">{{ $message }}</span> @enderror
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
            <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Salida</h5>
                <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="updateSalida">
                    <div class="row">
                        <!-- Columna 1 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="producto_id">Producto</label>
                                <select wire:model="producto_id" class="form-control">
                                    <option value="">Seleccione un producto</option>
                                    @foreach($productos as $producto)
                                    <option value="{{ $producto->producto_id }}">{{ $producto->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('producto_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                <input type="date" wire:model="fecha" class="form-control">
                                @error('fecha') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" wire:model="cantidad" class="form-control">
                                @error('cantidad') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <!-- Columna 2 -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_operacion_id">Tipo de Operación</label>
                                <select wire:model="tipo_operacion_id" class="form-control">
                                    <option value="">Seleccione un tipo de operación</option>
                                    @foreach($tiposOperacion as $tipoOperacion)
                                    <option value="{{ $tipoOperacion->tipo_operacion_id }}">{{ $tipoOperacion->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_operacion_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="agente_id">Agente</label>
                                <select wire:model="agente_id" class="form-control">
                                    <option value="">Seleccione un agente</option>
                                    @foreach($agentes as $agente)
                                    <option value="{{ $agente->agente_id }}">{{ $agente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('agente_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="usuario_id">Usuario</label>
                                <select wire:model="usuario_id" class="form-control">
                                    <option value="">Seleccione un usuario</option>
                                    @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->usuario_id }}">{{ $usuario->name }}</option>
                                    @endforeach
                                </select>
                                @error('usuario_id') <span class="text-danger">{{ $message }}</span> @enderror
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
                    @foreach($salidas as $salida)
                    <tr>
                        <td>{{ $salida->id }}</td>
                        <td>{{ $salida->producto->nombre }}</td>
                        <td>{{ $salida->fecha }}</td>
                        <td>{{ $salida->cantidad }}</td>
                        <td>{{ $salida->tipoOperacion->nombre }}</td>
                        <td>{{ $salida->agente->nombre }}</td>
                        <td>{{ $salida->usuario->name }}</td>
                        <td>
                            <button wire:click="editSalida({{ $salida->id }})" class="btn btn-sm btn-warning">Editar</button>
                            <button wire:click="deleteSalida({{ $salida->id }})" class="btn btn-sm btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
