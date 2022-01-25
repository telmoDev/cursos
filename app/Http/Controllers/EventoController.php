<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;

class EventoController extends Controller
{
    public function administrar()
    {
        return view("evento.administrar");
    }
    public function index()
    {
        return view("evento.index");
    }
}
