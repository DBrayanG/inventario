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
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        <button wire:click="showEditModal({{ $cliente->id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteCliente({{ $cliente->id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal para crear -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" categoria="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
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
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input wire:model="telefono" type="text" class="form-control">
                        @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input wire:model="direccion" type="text" class="form-control">
                        @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
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
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" categoria="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
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
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input wire:model="telefono" type="text" class="form-control">
                        @error('telefono') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input wire:model="direccion" type="text" class="form-control">
                        @error('direccion') <span class="text-danger">{{ $message }}</span> @enderror
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
