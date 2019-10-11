<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function list(){
        $users = User::all();

        return view('user.list', compact('users'));
    }

    public function profile(){
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }

    public function profileEdit(User $user){
        return view('user.profileEdit', compact('user'));

    }

    public function profileUpdate(Request $request, User $user){

        $request->validate([
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        if ($request->imagem != null) {
            $imageName = time().'.'.request()->imagem->getClientOriginalExtension();
            $user->update([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                'imagem' => $request['imagem']->storeAs('users', $imageName),
            ]);
            return redirect()->route('user.profile')
                            ->with('success','Perfil atualizado com Sucesso!');
        }else{
            $user->update([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                // 'imagem' => $request['imagem']->storeAs('users', $imageName),
            ]);
            return redirect()->route('user.profile')
                            ->with('success','Perfil atualizado com Sucesso!');

        }


    }
}
