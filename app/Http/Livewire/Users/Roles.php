<?php

namespace App\Http\Livewire\Users;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class Roles extends Component
{
    public $campos;

    // Modelo
    public $modeloUsado = "App\Models\Role";

    // Role CRUD
    public $objectPermissionCreate;
    public $objectPermissionEdit;
    public $objectPermissionDelete;

    public $create = "role-create";
    public $edit = "role-edit";
    public $delete = "role-delete";

    // popup
    public $popup = false;
    public $popup_tipo = "";
    public $elemento;

    // campos
    public $nombre;
    public $description;
    public $permisos = [];

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
        return view('livewire.users.roles', [
            'objects' => $this->modeloUsado::orderBy('id','desc')
                    ->paginate(5),
            'allPermissions' => Permission::select('id','name','slug')->get(),
        ]);
    }

    public function new()
    {
        $this->nombre = "";
        $this->description = "";
        $this->permisos = [];
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
        $this->nombre = "";
        $this->description = "";
        $this->permisos = [];
        $this->elemento = $this->modeloUsado::findOrFail( $id );

        $this->nombre = $this->elemento->name;
        $this->description = $this->elemento->description;
        foreach ($this->elemento->permissions as $key => $permiso) {
            $this->permisos[$permiso->id] = true;
        }

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
            $nuevo->description = $this->description;
            $nuevo->save();
            $nuevo->permissions()->sync( array_keys( $this->permisos ) );

        }
        if( $this->popup_tipo == "Editar" ){
            $this->elemento->name = $this->nombre;
            $this->elemento->description = $this->description;
            $this->elemento->save();
            $this->elemento->permissions()->sync( array_keys( $this->permisos ) );
        }
        if( $this->popup_tipo == "Borrar" ){
            $this->elemento->delete();

        }
        $this->popup = false;
    }
}
