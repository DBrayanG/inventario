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
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->rol_id }}</td>
                    <td>{{ $role->nombre }}</td>
                    <td>{{ $role->descripcion }}</td>
                    <td>
                        <button wire:click="showEditModal({{ $role->rol_id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="showPermisosModal({{ $role->rol_id }})" class="btn btn-success">Permisos</button>
                        <button wire:click="deleteRole({{ $role->rol_id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para crear rol -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
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
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input wire:model="descripcion" type="text" class="form-control">
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
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
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
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
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input wire:model="descripcion" type="text" class="form-control">
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
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
    <div class="modal fade @if($showPermiso) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
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
</div>