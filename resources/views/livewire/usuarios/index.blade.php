<div>
    <div>
        <button wire:click="showCreateModal" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo Usuario</button>
    </div>

    <div class="mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Imagen de Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->usuario_id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->rol->nombre }}</td>
                    <td>
                        @if($usuario->img_url)
                            <img src="{{ $usuario->img_url }}" alt="Imagen de Perfil" style="width: 50px; height: 50px; border-radius: 50%;">
                        @else
                            No disponible
                        @endif
                    </td>
                    <td>
                        <button wire:click="showEditModal({{ $usuario->usuario_id }})" class="btn btn-primary">Editar</button>
                        <button wire:click="deleteUsuario({{ $usuario->usuario_id }})" class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para crear usuario -->
    <div class="modal fade @if($showCreate) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Nuevo Usuario</h5>
                    <button type="button" wire:click="$set('showCreate', false)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="createUsuario" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="role_id">Rol</label>
                            <select id="role_id" wire:model="role_id" class="form-control">
                                <option value="">Seleccione un rol</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->rol_id }}">{{ $role->nombre }}</option>
                                @endforeach
                            </select>
                            @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="img_url">Imagen de Perfil</label>
                            <input type="file" id="img_url" wire:model="img_url" class="form-control-file">
                            @error('img_url') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar usuario -->
    <div class="modal fade @if($showEdit) show d-block @endif" tabindex="-1" role="dialog" style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Usuario</h5>
                    <button type="button" wire:click="$set('showEdit', false)" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateUsuario" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" id="password" wire:model="password" class="form-control">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="role_id">Rol</label>
                            <select id="role_id" wire:model="role_id" class="form-control">
                                <option value="">Seleccione un rol</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->rol_id }}">{{ $role->nombre }}</option>
                                @endforeach
                            </select>
                            @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="img_url">Imagen de Perfil</label>
                            <input type="file" id="img_url" wire:model="img_url" class="form-control-file">
                            @if($img_url)
                                <img src="{{ $img_url->temporaryUrl() }}" alt="Imagen de Perfil" style="width: 50px; height: 50px; border-radius: 50%;">
                            @endif
                            @error('img_url') <span class="text-danger">{{ $message }}</span> @enderror
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
