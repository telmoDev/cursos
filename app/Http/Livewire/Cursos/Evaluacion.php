<?php

namespace App\Http\Livewire\Cursos;

use App\Models\Curso;
use App\Models\Cursos\EvaluacionPregunta;
use App\Models\Users\Aprobados;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Evaluacion extends Component
{
    public $curso_slug;
    public $seccion;

    public $curso;
    public $mostrar_curso;

    public $contenido;
    public $pregunta_mostrar;
    public $indice;
    public $fin_de_curso = false;

    public $repositorioRespuestas = [];

    public $calificacion = 0;

    protected $rules = [
    ];

    public function mount()
    {
        $this->curso = Curso::where("slug", $this->curso_slug)->first();
        $this->pregunta_mostrar = $this->curso->evaluacion->evaluacionPregunta->random(5);
        $this->iniciarRepoRespuestas();
    }

    public function iniciarRepoRespuestas()
    {
        foreach ($this->pregunta_mostrar as $key => $pregunta) {
            $this->repositorioRespuestas[] = [
                'id_preg' => $pregunta->id,
                'respuestas' => '',
                'contestada' => false,
            ];
        }
    }

    public function render()
    {
        return view('livewire.cursos.evaluacion');
    }

    public function activar_curso($contenido_id, $contenido_slug)
    {
        return redirect()->route('curso.seccion' , [$this->curso_slug, $contenido_slug ] );
    }

    public function respuestas( $key, $id_curso, $id_respuesta )
    {
        $this->repositorioRespuestas[$key]['respuestas'] = $id_respuesta;
        $this->repositorioRespuestas[$key]['id_curso'] = $id_curso;
        $this->repositorioRespuestas[$key]['contestada'] = true;
    }

    public function enviar()
    {
        $respuestas_correctas = 0;
        foreach($this->repositorioRespuestas as $key => $preguntas) {
            if( $preguntas['respuestas'] != "" ){
                    $resp = EvaluacionPregunta::where('curso_evaluacion_id', $this->curso->evaluacion->id)
                                            ->where('respuesta_correcta_id', $preguntas['respuestas']  )
                            ->count();
                    if( $resp > 0 ){
                        $respuestas_correctas = $respuestas_correctas + 1;
                    }
            }
        }
        $this->calificacion = $respuestas_correctas / ( count($this->repositorioRespuestas) ) * 100;
        if( $this->calificacion > 80 ){
            $this->aprobarSiguiente();
        }
    }
    public function aprobarSiguiente()
    {
        if( Auth::check() ){
            $user = Auth::user()->id;
            foreach ($this->curso->secciones as $key => $seccion) {
                $cantidad = Aprobados::where('curso_id', $this->curso->id)
                            ->where('user_id', $user)
                            ->where('cursos_seccione_id', $seccion->id)
                            ->count();
                if( $cantidad == 0 ){
                    Aprobados::updateOrCreate(
                        [
                            'curso_id' => $this->curso->id,
                            'user_id' => $user,
                            'cursos_seccione_id' => $seccion->id,
                        ]
                    );
                    return;
                }
            }
        }
    }
}
