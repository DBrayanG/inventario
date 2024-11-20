<div>
    <div>
        <button wire:click="vista_crear()" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Estante</button>
    </div>

    <div class="row mt-4">
    @foreach($estantes as $estante)
        @php
            // Array de clases de fondo de Bootstrap
            $backgroundClasses = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
            // Seleccionar aleatoriamente una clase de fondo
            $randomBackgroundClass = $backgroundClasses[array_rand($backgroundClasses)];
        @endphp
             <div class="card-body">
                <div class="card-box {{ $randomBackgroundClass }} mb-2 p-3 rounded">
                    <h5 class="mb-2">{{ $estante->nombre }}</h5>
                    <p>{{ $estante->descripcion }}</p>
                    <button wire:click="vista_editar({{ $estante->estante_id }})" class="btn btn-primary">Editar</button>
                    <button wire:click="eliminar_estante({{ $estante->estante_id }})" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
     @endforeach
</div>


    @if($show_vista)
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="createEstanteModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createEstanteModalLabel">Crear Nuevo Estante</h4>
                    <button wire:click="$set('show_vista', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="crear_estante">
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
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="editEstanteModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editEstanteModalLabel">Editar Estante</h4>
                    <button wire:click="$set('show_editar', false)" type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editar_estante">
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
            Livewire.on('estante-creado', (message) => {
                alert(message);
            });
            Livewire.on('estante-error', (message) => {
                alert(message);
            });
            Livewire.on('estante-actualizado', (message) => {
                alert(message);
            });
            Livewire.on('estante-eliminado', (message) => {
                alert(message);
            });
        });
    </script>
</div>
