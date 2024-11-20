<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva tipoOperacion</button>
    </div>

    <div class="mt-4">
        <div class="row">
            @foreach($tipoOperacions as $tipoOperacion)
                @php
                // Array de clases de fondo de Bootstrap
                $backgroundClasses = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
                // Seleccionar aleatoriamente una clase de fondo
                $randomBackgroundClass = $backgroundClasses[array_rand($backgroundClasses)];
                  @endphp
                  <div class="card-body">
                    <div class="card-box {{ $randomBackgroundClass }}  mb-2 p-3 rounded ">
                        <h5 class="card-title">{{ $tipoOperacion->nombre }}</h5><br>
                         <button wire:click="showEditModal({{ $tipoOperacion->tipo_operacion_id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteTipoOperacion({{ $tipoOperacion->tipo_operacion_id }})" class="btn btn-danger">Eliminar</button>
                    </div>
                 
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal para crear rol -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" tipoOperacion="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" tipoOperacion="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nueva tipoOperacion</h5>
                    <button type="button" wire:click="$set('showCreate', false)" class="close" aria-label="Close">
                        <span aria-htipo_operacion_idden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model="nombre" type="text" class="form-control">
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('showCreate', false)" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="createtipoOperacion" class="btn btn-primary">Crear tipoOperacion</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar rol -->
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" tipoOperacion="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" tipoOperacion="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar tipoOperacion</h5>
                    <button type="button" wire:click="$set('showEdit', false)" class="close" aria-label="Close">
                        <span aria-htipo_operacion_idden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model="nombre" type="text" class="form-control">
                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('showEdit', false)" class="btn btn-secondary">Cancelar</button>
                    <button type="button" wire:click="updatetipoOperacion" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('tipoOperacionCreated', message => {
                alert(message);
            });
            Livewire.on('tipoOperacionUpdated', message => {
                alert(message);
            });
            Livewire.on('tipoOperacionDeleted', message => {
                alert(message);
            });
        });
    </script>
</div>