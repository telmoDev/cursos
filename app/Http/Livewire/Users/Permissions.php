<?php

namespace App\Http\Livewire\Users;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Permissions extends Component
{
    public $campos;

    // Modelo
    public $modeloUsado = "App\Models\Permission";

    // Permission CRUD
    public $objectPermissionCreate;
    public $objectPermissionEdit;
    public $objectPermissionDelete;

    public $create = "permission-create";
    public $edit = "permission-edit";
    public $delete = "permission-delete";

    // popup
    public $popup = false;
    public $popup_tipo = "";
    public $elemento;

    // campos
    public $nombre;
    public $slug;

    public $ruta_formulario = "";

    public function mount()
    {
        $this->elemento = new $this->modeloUsado;
        $this->campos = (new $this->modeloUsado)->getFillable();

        $this->objectPermissionEdit = Gate::allows($this->edit);
        $this->objectPermissionDelete = Gate::allows($this->delete);
        $this->objectPermissionCreate = Gate::allows($this->create);
    }

    public function render()
    {
        return view('livewire.users.permissions', [
            'objects' => $this->modeloUsado::orderBy('id','desc')
                    ->paginate(5),
        ]);
    }

    public function new()
    {
        $this->elemento->nombre = "";
        $this->elemento->slug = "";

        $this->popup = true;
        $this->popup_tipo = "Crear";
    }

    public function view($id)
    {
        $this->elemento = $this->modeloUsado::findOrFail( $id );
        $this->popup = true;
        $this->popup_tipo = "Ver";
    }

    public function edit($id)
    {
        $this->elemento = $this->modeloUsado::findOrFail( $id );

        $this->nombre = $this->elemento->name;
        $this->slug = $this->elemento->slug;

        $this->popup = true;
        $this->popup_tipo = "Editar";
    }

    public function delete($id)
    {
        $this->elemento = $this->modeloUsado::findOrFail( $id );
        $this->popup = true;
        $this->popup_tipo = "Borrar";
    }

    public function aceptar()
    {
        if( $this->popup_tipo == "Crear" ){
            $nuevo = new $this->modeloUsado;
            $nuevo->name = $this->nombre;
            $nuevo->slug = $this->slug;
            $nuevo->save();
        }
        if( $this->popup_tipo == "Editar" ){
            $this->elemento->name = $this->nombre;
            $this->elemento->slug = $this->slug;
            $this->elemento->save();
        }
        if( $this->popup_tipo == "Borrar" ){
            $this->elemento->delete();

        }
        $this->popup = false;
    }
}
