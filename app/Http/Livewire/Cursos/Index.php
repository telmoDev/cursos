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
    public $mis_cursos = [];
    public $caracteristica_cursos = [];
    public $tarjetas = [];
    public $videos;

    public function mount()
    {
        //dd($this->caracteristica_cursos);
        //dd( $this->curso->id );
        $this->caracteristica_cursos = $this->curso->caracteristicas()->get();
        $this->tarjetas = [
            [
                'titulo' => 'POO',
                'subtitulo' => '¿Qué es la POO?',
                'contenido' => 'La POO es............................',
            ],
            [
                'titulo' => 'Herencia',
                'subtitulo' => '¿Qué es la herencia?',
                'contenido' => 'Herencia en POO es .................................',
            ],
            // Agrega más tarjetas aquí si es necesario
        ];
        $this->videos = [
            [
                'nombre' => 'Javier Vidaurreta',
                'titulo' => 'People Country Lead de WPP España',
                'descripcion' => '“Yo encuentro valor en ThePowerMBA, hablando como alguien de Recursos Humanos, porque aquellos que pasen por el programa, van a aportar un conocimiento actualizado de la realidad económica, han demostrado la inquietud o el apetito por seguir formándose.“',
            ],
            [
                'nombre' => 'Elvira Herreros',
                'titulo' => 'Directora de Ingeniería en Novabase',
                'descripcion' => '“Te ayuda a tener el conocimiento global y a poder trasladarlo en tu día a día, tiene mucha aplicación. Sin duda los casos prácticos y los ejemplos de otras empresas, motivan y ayudan mucho al resto de profesionales. Es una de las principales diferencias con otros másteres.”',
            ],
            // Agrega más tarjetas aquí si es necesario
        ];
        //dd($caracteristica_cursos);
        /* if( Auth::check() ){
            $id_user = Auth::user()->id;
            //$this->mis_cursos = UsersMisCursos::where('user_id', $id_user)->where('curso_id', $this->curso->id)->get();
            //$this->inscrito = ( $this->mis_cursos->count() > 0 )? true: false;
            if( $this->inscrito ){
                // $this->secciones_inscrito = ;
            }
        } */
        //$this->citas = Cita::where('cursos_id', $this->curso->id)->get();
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
