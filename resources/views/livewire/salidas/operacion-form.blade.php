<form wire:submit.prevent="{{ $action }}">
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
                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
            @endforeach
        </select>
        @error('usuario_id') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>
