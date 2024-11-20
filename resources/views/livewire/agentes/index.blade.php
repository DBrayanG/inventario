<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Agente</button>
    </div>
  <!-- //agregar un boton para refrescar el conponente icono refresh -->
    <div class="mt-4">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Tipo de Agente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agentes as $agente)
                <tr>
                    <td>{{ $agente->nombre }}</td>
                    <td>{{ $agente->telefono }}</td>
                    <td>{{ $agente->email }}</td>
                    <td>{{ $agente->direccion }}</td>
                    <td>{{ $agente->tipoAgente->nombre }}</td>
                    <td>
                        <button wire:click="showEditModal({{ $agente->agente_id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteAgente({{ $agente->agente_id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para crear agente -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nuevo Agente</h5>
                    <button type="button" wire:click="$set('showCreate', false)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="createAgente">
                        <!-- Campos del formulario -->
                        <div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" wire:model="nombre" class="form-control">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" id="telefono" wire:model="telefono" class="form-control">
                                @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" id="direccion" wire:model="direccion" class="form-control">
                                @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="tipo_agente_id">Tipo de Agente</label>
                                <select id="tipo_agente_id" wire:model="tipo_agente_id" class="form-control">
                                    <option value="">Seleccione un tipo de agente</option>
                                    @foreach($tipoAgentes as $tipoAgente)
                                    <option value="{{ $tipoAgente->tipo_agente_id }}">{{ $tipoAgente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_agente_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar agente -->
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Agente</h5>
                    <button type="button" wire:click="$set('showEdit', false)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateAgente">
                        <!-- Campos del formulario -->
                        <div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" wire:model="nombre" class="form-control">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" id="telefono" wire:model="telefono" class="form-control">
                                @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" id="direccion" wire:model="direccion" class="form-control">
                                @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="tipo_agente_id">Tipo de Agente</label>
                                <select id="tipo_agente_id" wire:model="tipo_agente_id" class="form-control">
                                    <option value="">Seleccione un tipo de agente</option>
                                    @foreach($tipoAgentes as $tipoAgente)
                                    <option value="{{ $tipoAgente->tipo_agente_id }}">{{ $tipoAgente->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('tipo_agente_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mensajes de éxito y error -->
    <div class="mt-3">
        @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
</div>
