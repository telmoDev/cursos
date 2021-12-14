<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        abort_if( Gate::denies('permission-view'), Response::HTTP_FORBIDDEN );
        return view('users.permissions.index');
    }
}
