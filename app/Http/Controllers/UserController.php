<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\State;

class UserController extends Controller
{
    //Método cargar Lista de Usuarios
    public function index() {
        $users = User::all();
        return \View::make('users/list',compact('users'));
    }

    //Método para cargar vista Update en la carpeta users
    public function edit($id) {
        $user = User::find($id);
        //Consulta para cargar todos los estados y llevarlos a la vista para cargarlos en un select
        $states = State::pluck('state','id');
        
        return \View::make('users/update', compact('user','states'));
    }
}
