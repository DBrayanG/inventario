<div>
    <div>
        <button wire:click="vista_crear()" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva Unidad de Medida</button>
    </div>

    <div class="row bg bg-soft-success mt-4">

        @foreach($unidad_medidas as $unidad_medida)
        @php
        // Array de clases de fondo de Bootstrap
        $backgroundClasses = ['bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info', 'bg-light', 'bg-dark'];
        // Seleccionar aleatoriamente una clase de fondo
        $randomBackgroundClass = $backgroundClasses[array_rand($backgroundClasses)];
        @endphp
        <div class="card-body">
            <div class="card-box {{ $randomBackgroundClass }} mb-2 p-3 rounded">
                <h5 class="mb-2">{{ $unidad_medida->nombre }}</h5>
                <button wire:click="vista_editar({{ $unidad_medida->unidad_medida_id }})" class="btn btn-primary">Editar</button>
                <button wire:click="eliminar_unidad_medida({{ $unidad_medida->unidad_medida_id }})" class="btn btn-danger">Eliminar</button>
            </div>
        </div>

        @endforeach
    </div>

    @if($show_vista)
    <div class="modal fade show d-block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Unidad de Medida</h5>
                    <button type="button" class="close" wire:click="$set('show_vista', false)">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="crear_unidad_medida">
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
    <div class="modal fade show d-block" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Unidad de Medida</h5>
                    <button type="button" class="close" wire:click="$set('show_editar', false)">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editar_unidad_medida">
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
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>