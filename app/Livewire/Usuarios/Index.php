<?php

namespace App\Livewire\Usuarios;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $usuarios;
    public $roles;
    public $name;
    public $email;
    public $password;
    public $role_id;
    public $img_url;
    public $selectedUserId;
    public $showCreate = false;
    public $showEdit = false;
    public $showError = false;
    public $showSuccess = false;
    public $errorMessage = '';
    public $successMessage = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:4',
        'role_id' => 'required|exists:roles,rol_id',
        'img_url' => 'nullable|image|max:2048',
    ];

    protected $messages = [
        'img_url.image' => 'El archivo debe ser una imagen.',
        'img_url.max' => 'La imagen no puede superar los 2 MB.',
    ];

    public function mount()
    {
     
        $this->usuarios = User::all();
        $this->roles = Roles::all();
    }

    

    public function showCreateModal()
    {
        $this->reset(['name', 'email', 'password', 'role_id', 'img_url']);
        $this->showCreate = true;
    }

    public function showEditModal($userId)
    {
        $user = User::findOrFail($userId);
        $this->selectedUserId = $user->usuario_id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role_id = $user->rol_id;
        $this->img_url = $user->img_url;
        $this->showEdit = true;
    }

    public function createUsuario()
    {
        $this->validate();
    
        try {
            // Instanciar el modelo User
            $new_user = new User();

           

            $new_user->name = $this->name;
            $new_user->email = $this->email;
            $new_user->password = Hash::make($this->password);
            $new_user->rol_id = $this->role_id;
    
            // Verificar si se ha subido una imagen
            if ($this->img_url) {
                $new_user->img_url = $this->img_url->store('profile-images', 'public');
            }
       
            // Guardar el nuevo usuario en la base de datos
            $new_user->save();
    
            // Actualizar el estado de la interfaz
            $this->showCreate = false;
            $this->successMessage = 'Usuario creado exitosamente.';
            $this->showSuccess = true;
    
            // Obtener la lista actualizada de usuarios
            $this->usuarios = User::all();
        } catch (\Exception $e) {
            // Manejo de errores
            $this->errorMessage = 'Error al crear el usuario. Inténtelo de nuevo.' . $e;
            $this->showError = true;
        }
    }
    

    public function updateUsuario()
    {
        $this->validate();
    
        try {
            // Encontrar el usuario por ID
            $new_user = User::findOrFail($this->selectedUserId);
    
            // Asignar los nuevos valores al modelo
            $new_user->name = $this->name;
            $new_user->email = $this->email;
            $new_user->rol_id = $this->role_id;
    
            // Actualizar la contraseña si se ha proporcionado
            if ($this->password) {
                $new_user->password = Hash::make($this->password);
            }
    
            // Manejar la imagen de perfil si se ha proporcionado
            if ($this->img_url) {
                // Eliminar la imagen antigua si existe
                if ($new_user->img_url && Storage::exists('public/' . $new_user->img_url)) {
                    Storage::delete('public/' . $new_user->img_url);
                }
                $new_user->img_url = $this->img_url->store('profile-images', 'public');
            }
    
            // Guardar los cambios en la base de datos
            $new_user->save();
    
            // Actualizar el estado de la interfaz
            $this->showEdit = false;
            $this->successMessage = 'Usuario actualizado exitosamente.';
            $this->showSuccess = true;
    
            // Obtener la lista actualizada de usuarios
            $this->usuarios = User::all();
        } catch (\Exception $e) {
            // Manejo de errores
            $this->errorMessage = 'Error al actualizar el usuario. Inténtelo de nuevo.';
            $this->showError = true;
        }
    }
    

    public function deleteUsuario($userId)
    {
        try {
            $user = User::findOrFail($userId);

            // Delete image if exists
            if ($user->img_url && Storage::exists('public/' . $user->img_url)) {
                Storage::delete('public/' . $user->img_url);
            }

            $user->delete();

            $this->successMessage = 'Usuario eliminado exitosamente.';
            $this->showSuccess = true;

            $this->usuarios = User::all();
        } catch (\Exception $e) {
            $this->errorMessage = 'Error al eliminar el usuario. Inténtelo de nuevo.';
            $this->showError = true;
        }
    }

    public function render()
    {
        return view('livewire.usuarios.index');
    }
}
