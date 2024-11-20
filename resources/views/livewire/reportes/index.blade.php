<div>
    <!-- Formulario para filtrar los reportes -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card m-2">
                <div class="card-header">
                    <strong>Filtrar Reporte</strong>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="getOperaciones">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fechaini">Fecha Inicio</label>
                                <input type="date" wire:model="fechaini" class="form-control" id="fechaini">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fechafin">Fecha Fin</label>
                                <input type="date" wire:model="fechafin" class="form-control" id="fechafin">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipo_operacion_id">Operación</label>
                                <select wire:model="tipo_operacion_id" class="form-control" id="tipo_operacion_id">
                                    <option value="">Seleccionar</option>
                                    @foreach($tiposOperaciones as $tipoOperacion)
                                    <option value="{{ $tipoOperacion->tipo_operacion_id }}">{{ $tipoOperacion->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Aplicar Filtros</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Mostrar los datos del reporte -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card m-2" style="min-height: 150px;">
                <div class="card-header">
                    <strong>Reporte</strong>
                    <div class="float-right">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i> PDF</button>
                        <button class="btn btn-success btn-sm"><i class="fa fa-file-excel"></i> Excel</button>
                        <button class="btn btn-primary btn-sm"><i class="fa fa-file-csv"></i> CSV</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-box   mb-2 p-3 rounded">
                        <div class="row wrapper">
                            <p><strong>Desde:</strong> {{ $fechaini }}</p>
                            <p><strong>Hasta:</strong> {{ $fechafin }}</p>
                            <p><strong>Tipo de Operación:</strong> {{ $tiposOperacionSelect->nombre?? 'No seleccionado'  }}</p>

                        </div>


                        <!-- Tabla para mostrar las operaciones -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($operaciones as $operacion)
                                <tr>
                                    <td>{{ $operacion->producto->nombre }}</td>
                                    <td>{{ $operacion->cantidad }}</td>
                                    <td>{{ $operacion->fecha }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>