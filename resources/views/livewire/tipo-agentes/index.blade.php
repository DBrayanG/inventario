<div>
    <h3>Gestión de Tipos de Agente</h3>



    <button wire:click="showCreateModal" class="btn btn-primary">Crear Tipo de Agente</button>



    <!-- Modal de Crear -->
    @if($showCreate)
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
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('showCreate', false)">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="createTipoAgente">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Modal de Editar -->
    @if($showEdit)
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
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="$set('showEdit', false)">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="updateTipoAgente">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipoAgentes as $tipoAgente)
            <tr>
                <td>{{ $tipoAgente->tipo_agente_id }}</td>
                <td>{{ $tipoAgente->nombre }}</td>
                <td>
                    <button wire:click="showEditModal({{ $tipoAgente->tipo_agente_id }})" class="btn btn-warning">Editar</button>
                    <button wire:click="deleteTipoAgente({{ $tipoAgente->tipo_agente_id }})" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>