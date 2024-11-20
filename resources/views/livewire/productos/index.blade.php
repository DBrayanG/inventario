<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Producto</button>
    
       
    </div>
    <div class="input-group mt-1 mb-3">
                <input wire:model.live="clave" type="text" class="form-control" placeholder="Buscar producto (ej. Methomil)">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
            </div>
    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Código </th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>  Vencimiento</th>
                    <th>Imagen</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->codigo_barra }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->fecha_venc }}</td>
                    <td><img src="{{ Storage::url($producto->imagen_url) }}" alt="Imagen del producto" width="50"></td>
                   
                    <td>{{ $producto->stock_actual }}</td>
                    <td>
                        <button wire:click="showEditModal({{ $producto->producto_id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteProducto({{ $producto->producto_id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para crear producto -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Nuevo Producto</h5>
                <button type="button" wire:click="$set('showCreate', false)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="createProducto">
                    <div class="row">
                        <!-- Primera columna -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="codigo_barra">Código de Barra</label>
                                <input type="text" id="codigo_barra" wire:model="codigo_barra" class="form-control">
                                @error('codigo_barra') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" wire:model="nombre" class="form-control">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
                                @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="fecha_venc">Fecha de Vencimiento</label>
                                <input type="date" id="fecha_venc" wire:model="fecha_venc" class="form-control">
                                @error('fecha_venc') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="newImagen">Imagen</label>
                                <input type="file" id="newImagen" wire:model="newImagen" class="form-control">
                                @error('newImagen') <span class="text-danger">{{ $message }}</span> @enderror

                                @if ($newImagen)
                                <div class="mt-2">
                                    <img src="{{ $newImagen->temporaryUrl() }}" alt="Preview" width="100">
                                </div>
                                @elseif ($imagen_url)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($imagen_url) }}" alt="Producto" width="100">
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- Segunda columna -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="costo_unitario">Costo Unitario</label>
                                <input type="number" id="costo_unitario" wire:model="costo_unitario" class="form-control">
                                @error('costo_unitario') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="demanda_anual">Demanda Anual</label>
                                <input type="number" id="demanda_anual" wire:model="demanda_anual" class="form-control">
                                @error('demanda_anual') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="punto_reorden">Punto de Reorden</label>
                                <input type="number" id="punto_reorden" wire:model="punto_reorden" class="form-control">
                                @error('punto_reorden') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock_actual">Stock Actual</label>
                                <input type="number" id="stock_actual" wire:model="stock_actual" class="form-control">
                                @error('stock_actual') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock_minimo">Stock Mínimo</label>
                                <input type="number" id="stock_minimo" wire:model="stock_minimo" class="form-control">
                                @error('stock_minimo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <select id="categoria_id" wire:model="categoria_id" class="form-control">
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="unidad_medida_id">Unidad de Medida</label>
                                <select id="unidad_medida_id" wire:model="unidad_medida_id" class="form-control">
                                    <option value="">Seleccione una unidad de medida</option>
                                    @foreach($unidadesMedida as $unidad)
                                    <option value="{{ $unidad->unidad_medida_id }}">{{ $unidad->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('unidad_medida_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Modal para editar producto -->
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Producto</h5>
                    <button type="button" wire:click="$set('showEdit', false)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateProducto">
                        <div>
                            <div class="form-group">
                                <label for="codigo_barra">Código de Barra</label>
                                <input type="text" id="codigo_barra" wire:model="codigo_barra" class="form-control">
                                @error('codigo_barra') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" wire:model="nombre" class="form-control">
                                @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" wire:model="descripcion" class="form-control"></textarea>
                                @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="fecha_venc">Fecha de Vencimiento</label>
                                <input type="date" id="fecha_venc" wire:model="fecha_venc" class="form-control">
                                @error('fecha_venc') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="newImagen">Imagen</label>
                                <input type="file" id="newImagen" wire:model="newImagen" class="form-control">
                                @error('newImagen') <span class="text-danger">{{ $message }}</span> @enderror

                                @if ($newImagen)
                                <div class="mt-2">
                                    <img src="{{ $newImagen->temporaryUrl() }}" alt="Preview" width="100">
                                </div>
                                @elseif ($imagen_url)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($imagen_url) }}" alt="Producto" width="100">
                                </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="costo_unitario">Costo Unitario</label>
                                <input type="number" id="costo_unitario" wire:model="costo_unitario" class="form-control">
                                @error('costo_unitario') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="demanda_anual">Demanda Anual</label>
                                <input type="number" id="demanda_anual" wire:model="demanda_anual" class="form-control">
                                @error('demanda_anual') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="punto_reorden">Punto de Reorden</label>
                                <input type="number" id="punto_reorden" wire:model="punto_reorden" class="form-control">
                                @error('punto_reorden') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock_actual">Stock Actual</label>
                                <input type="number" id="stock_actual" wire:model="stock_actual" class="form-control">
                                @error('stock_actual') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="stock_minimo">Stock Mínimo</label>
                                <input type="number" id="stock_minimo" wire:model="stock_minimo" class="form-control">
                                @error('stock_minimo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <select id="categoria_id" wire:model="categoria_id" class="form-control">
                                    <option value="">Seleccione una categoría</option>
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>


                            <div class="form-group">
                                <label for="unidad_medida_id">Unidad de Medida</label>
                                <select id="unidad_medida_id" wire:model="unidad_medida_id" class="form-control">
                                    <option value="">Seleccione una unidad de medida</option>
                                    @foreach($unidadesMedida as $unidad)
                                    <option value="{{ $unidad->unidad_medida_id }}">{{ $unidad->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('unidad_medida_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Modal de Error -->
    <div class="modal fade @if($showError) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Error</h5>
                    <button type="button" wire:click="$set('showError', false)" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $errorMessage }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('showError', false)" class="btn btn-danger">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Éxito -->
    <div class="modal fade @if($showSuccess) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Éxito</h5>
                    <button type="button" wire:click="$set('showSuccess', false)" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ $successMessage }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('showSuccess', false)" class="btn btn-primary">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


</div>