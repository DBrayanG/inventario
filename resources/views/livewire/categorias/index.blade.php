<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Categoria</button>
    </div>
    
    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->categoria_id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                    <td>
                        <button wire:click="showEditModal({{ $categoria->categoria_id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteCategoria({{ $categoria->categoria_id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para crear rol -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" categoria="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" categoria="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nueva Categoria</h5>
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
                        <label for="descripcion">Descripcion</label>
                        <input wire:model="descripcion" type="text" class="form-control">
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('showCreate', false)" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="createCategoria" class="btn btn-primary">Crear Categoria</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar rol -->
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" categoria="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" categoria="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Categoria</h5>
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
                        <label for="descripcion">Descripcion</label>
                        <input wire:model="descripcion" type="text" class="form-control">
                        @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('showEdit', false)" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="updateCategoria" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.on('categoriaCreated', message => {
                alert(message);
            });
            Livewire.on('categoriaUpdated', message => {
                alert(message);
            });
            Livewire.on('categoriaDeleted', message => {
                alert(message);
            });
        });
    </script>
</div>
