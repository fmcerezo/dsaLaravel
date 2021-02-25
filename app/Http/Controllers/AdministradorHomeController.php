<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorHomeController extends Controller
{
    public function home() {
      return view('admin.administradorHome');
    }
}
