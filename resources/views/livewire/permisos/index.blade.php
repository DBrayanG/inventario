<div>
    <div>
        <button wire:click="vista_crear()" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Permiso</button>
    </div>

    <div class="row bg bg-soft-success mt-4">
        @foreach($permisos as $permiso)
        <div class="card m-2">
            <div class="card-body">
                <div class="card-box bg-{{ $loop->index % 2 == 0 ? 'soft-purple' : 'soft-blue' }} mb-2 p-3 rounded">
                    <h5 class="mb-2">{{ $permiso->nombre }}</h5>
                    <p>{{ $permiso->descripcion }}</p>
                    <button wire:click="vista_editar({{ $permiso->permiso_id }})" class="btn btn-primary">Editar</button>
                    <button wire:click="eliminar_permiso({{ $permiso->permiso_id }})" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($show_vista)
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="createPermisoModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createPermisoModalLabel">Crear Nuevo Permiso</h4>
                    <button wire:click="$set('show_vista', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="crear_permiso">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" wire:model="nombre">
                            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" wire:model="descripcion"></textarea>
                            @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($show_editar)
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="editPermisoModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editPermisoModalLabel">Editar Permiso</h4>
                    <button wire:click="$set('show_editar', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editar_permiso">
                        <div class="form-group">
                            <label for="nombre_seleccionado">Nombre</label>
                            <input type="text" class="form-control" id="nombre_seleccionado" wire:model="nombre_seleccionado">
                            @error('nombre_seleccionado') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="descripcion_seleccionado">Descripción</label>
                            <textarea class="form-control" id="descripcion_seleccionado" wire:model="descripcion_seleccionado"></textarea>
                            @error('descripcion_seleccionado') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('permiso-creado', (message) => {
                alert(message);
            });
            Livewire.on('permiso-error', (message) => {
                alert(message);
            });
            Livewire.on('permiso-actualizado', (message) => {
                alert(message);
            });
            Livewire.on('permiso-eliminado', (message) => {
                alert(message);
            });
        });
    </script>
</div>
