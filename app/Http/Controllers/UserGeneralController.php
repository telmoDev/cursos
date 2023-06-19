<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserGeneralController extends Controller
{
  public function index()
  {
      return view("users.admin");
  }
}
