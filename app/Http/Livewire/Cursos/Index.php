<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Cursos\Cita;
use App\Models\Cursos\PaginaBloqueCursoModel;
use App\Models\Users\Aprobados;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Users\MisCursos as UsersMisCursos;

class Index extends Component
{
    public $curso;
    public $inscrito = false;
    public $secciones_inscrito = [];
    public $citas;
    public $bloques;

    public function mount()
    {
        // 2 dd( $this->curso->id );
        if( Auth::check() ){
            $id_user = Auth::user()->id;
            $this->mis_cursos = UsersMisCursos::where('user_id', $id_user)->where('curso_id', $this->curso->id)->get();
            $this->inscrito = ( $this->mis_cursos->count() > 0 )? true: false;
            if( $this->inscrito ){
                // $this->secciones_inscrito = ;
            }
        }
        $this->citas = Cita::where('cursos_id', $this->curso->id)->get();
        // $this->bloques = PaginaBloqueCursoModel::where('cursos_id', $this->curso->id)->get();
    }

    public function render()
    {
        return view('livewire.cursos.index');
    }

    public function Aprobado( $id_seccion )
    {
        if( Auth::check() ){
            $id_user = Auth::user()->id;
            return Aprobados::where('curso_id', $this->curso->id )
            ->where('user_id', $id_user )
            ->where('cursos_seccione_id', $id_seccion->id )
            ->exists();
        }
        return false;
    }
}
