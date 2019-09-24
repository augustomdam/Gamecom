<?php

namespace App\Http\Controllers;

use App\Funcao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        foreach ($users as $user) {
            $funcaos = $user->funcaos;
        }

        return view('user.list', compact('users', 'funcaos'));
    }

    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }
}
