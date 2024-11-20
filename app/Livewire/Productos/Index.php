<?php

namespace App\Livewire\Productos;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\UnidadMedida;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;
    public $productos = [];
        public $categorias;
    public $unidadesMedida;
    public $errorMessage="";
    public $successMessage ="";
    public $showCreate = false;
    public $showEdit = false;
    public $showError = false;
    public $showSuccess = false;
    public $selectedProductoId;
    public $codigo_barra;
    public $nombre;
    public $descripcion;
    public $fecha_venc;
    public $imagen_url;
    public $costo_unitario;
    public $demanda_anual;
    public $punto_reorden;
    public $stock_actual;
    public $stock_minimo;
    public $categoria_id;
    public $unidad_medida_id;
    public $newImagen;
    public $clave;

    protected $rules = [
        'codigo_barra' => 'required|string|max:255',
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string|max:255',
        'fecha_venc' => 'nullable|date',
        'costo_unitario' => 'required|numeric',
        'demanda_anual' => 'required|numeric',
        'punto_reorden' => 'required|numeric',
        'stock_actual' => 'required|numeric',
        'stock_minimo' => 'required|numeric',
        'categoria_id' => 'required|integer',
        'unidad_medida_id' => 'required|integer',
        'newImagen' => 'nullable|image|max:1024', // 1MB Max
    ];
    public function mount()
    {
        $this->productos = Producto::all(); 
        $this->unidadesMedida = UnidadMedida::all();
        $this->categorias = Categoria::all();
    }
    public function updatedClave()
    {
        $this->productos = Producto::where('nombre', 'like', '%' . $this->clave . '%')
            ->orWhere('descripcion', 'like', '%' . $this->clave . '%')
            ->get();
    }
    public function showCreateModal()
    {
        $this->reset(['codigo_barra', 'nombre', 'descripcion', 'fecha_venc', 'costo_unitario', 'demanda_anual', 'punto_reorden', 'stock_actual', 'stock_minimo', 'categoria_id', 'unidad_medida_id', 'newImagen']);
        $this->showCreate = true;
    }

    public function createProducto()
    {
        $this->validate();

        if ($this->newImagen) {
            $this->imagen_url = $this->newImagen->store('productos', 'public');
        }

        Producto::create([
            'codigo_barra' => $this->codigo_barra,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha_venc' => $this->fecha_venc,
            'imagen_url' => $this->imagen_url,
            'costo_unitario' => $this->costo_unitario,
            'demanda_anual' => $this->demanda_anual,
            'punto_reorden' => $this->punto_reorden,
            'stock_actual' => $this->stock_actual,
            'stock_minimo' => $this->stock_minimo,
            'categoria_id' => $this->categoria_id,
            'unidad_medida_id' => $this->unidad_medida_id,
        ]);
        $this->showSuccess=true;
        $this->successMessage ="Producto creado satisfactoriamente.";

        session()->flash('message', 'Producto creado satisfactoriamente.');

        $this->reset(['codigo_barra', 'nombre', 'descripcion', 'fecha_venc', 'costo_unitario', 'demanda_anual', 'punto_reorden', 'stock_actual', 'stock_minimo', 'categoria_id', 'unidad_medida_id', 'newImagen', 'showCreate']);
        $this->productos = Producto::all();
    }

    public function showEditModal($id)
    {
        $this->selectedProductoId = $id;
        $producto = Producto::findOrFail($id);
        $this->codigo_barra = $producto->codigo_barra;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->fecha_venc = $producto->fecha_venc;
        $this->imagen_url = $producto->imagen_url;
        $this->costo_unitario = $producto->costo_unitario;
        $this->demanda_anual = $producto->demanda_anual;
        $this->punto_reorden = $producto->punto_reorden;
        $this->stock_actual = $producto->stock_actual;
        $this->stock_minimo = $producto->stock_minimo;
        $this->categoria_id = $producto->categoria_id;
        $this->unidad_medida_id = $producto->unidad_medida_id;
        $this->showEdit = true;
    }

    public function updateProducto()
    {
        $this->validate();

        $producto = Producto::findOrFail($this->selectedProductoId);

        if ($this->newImagen) {
            if ($producto->imagen_url) {
                Storage::disk('public')->delete($producto->imagen_url);
            }
            $this->imagen_url = $this->newImagen->store('productos', 'public');
        }

        $producto->update([
            'codigo_barra' => $this->codigo_barra,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha_venc' => $this->fecha_venc,
            'imagen_url' => $this->imagen_url,
            'costo_unitario' => $this->costo_unitario,
            'demanda_anual' => $this->demanda_anual,
            'punto_reorden' => $this->punto_reorden,
            'stock_actual' => $this->stock_actual,
            'stock_minimo' => $this->stock_minimo,
            'categoria_id' => $this->categoria_id,
            'unidad_medida_id' => $this->unidad_medida_id,
        ]);

        session()->flash('message', 'Producto actualizado satisfactoriamente.');

        $this->reset(['codigo_barra', 'nombre', 'descripcion', 'fecha_venc', 'costo_unitario', 'demanda_anual', 'punto_reorden', 'stock_actual', 'stock_minimo', 'categoria_id', 'unidad_medida_id', 'newImagen', 'showEdit', 'selectedProductoId']);
        $this->productos = Producto::all();
    }

    public function deleteProducto($id)
    {
        
         
        $producto = Producto::findOrFail($id);

        if ($producto->imagen_url) {
            Storage::disk('public')->delete($producto->imagen_url);
        }

        $producto->delete();

        session()->flash('message', 'Producto eliminado satisfactoriamente.');

        $this->productos = Producto::all();
    }

    public function render()
    {
        return view('livewire.productos.index');
    }
}
