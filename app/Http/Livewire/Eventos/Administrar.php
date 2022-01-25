<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use Livewire\Component;

class Administrar extends Component
{
    public $evento;

    public $popupOpen = false;
    public $listado_fechas = [];
    public $popup_tipo;


    protected $rules = [
        "evento.nombre" => "",
        "evento.descripcion" => "",
        "evento.fecha_inicio" => "",
        "evento.fecha_fin" => "",
        "evento.observacion" => "",
    ];

    public function mount()
    {
        $this->evento = new Evento;
    }

    public function render()
    {
        $eventos = Evento::paginate(10);
        return view('livewire.eventos.administrar', compact("eventos"));
    }

    public function nuevo()
    {
        $this->evento = new Evento;
        $this->popupOpen = true;
        $this->popup_tipo = "Crear";
    }

    public function edit( $id )
    {
        $this->evento = Evento::findOrFail( $id );
        $this->popupOpen = true;
        $this->popup_tipo = "Editar";
    }

    public function delete( $id )
    {
        $this->evento = Evento::findOrFail( $id );
        $this->archivo = "delete";
        $this->popupOpen = true;
        $this->popup_tipo = "Borrar";
    }

    public function aceptar()
    {
        if( $this->popup_tipo == "Crear" ){
        }
        $this->validate();
        if( $this->popup_tipo == "Crear" || $this->popup_tipo == "Editar" ){
            $this->evento->save();
        }
        if( $this->popup_tipo == "Borrar" ){
            $this->evento->delete();
        }
        $this->popupOpen = false;
    }
}
