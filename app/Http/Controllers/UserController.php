<?php

namespace App\Http\Controllers;

use App\Funcao;
use App\Permissao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function list()
    {
        $users = User::paginate(15);

        return view('user.list', compact('users'));
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }

    public function profileEdit(User $user)
    {
        return view('user.profileEdit', compact('user'));
    }

    public function profileUpdate(Request $request, User $user)
    {
        Storage::delete($user->imagem);
        if ($request->name = null) {
            $user->update([
                'password' => Hash::make($request['password']),
                'imagem' => Storage::put('users', $request['imagem'], 'public'),
            ]);
            return redirect()->route('user.profile')
                ->with('success', 'Perfil atualizado com Sucesso!');

        }elseif($request->password = null){
            $user->update([
                'name' => $request['name'],
                'imagem' => Storage::put('users', $request['imagem'], 'public'),
            ]);

        }elseif($request->imagem = null){
            $user->update([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
            ]);

        } else {
             $user->update([
                'name' => $request['name'],
                'password' => Hash::make($request['password']),
                'imagem' => Storage::put('users', $request['imagem'], 'public'),
            ]);
            return redirect()->route('user.profile')
                ->with('success', 'Perfil atualizado com Sucesso!');
        }
    }

    public function atribuirFuncao(User $user)
    {
        $funcaos = Funcao::all();
        return view('user.atribuirFuncao', compact('funcaos', 'user'));
    }
    public function atribuiFuncao(Request $request)
    {
        $request->validate([
            'funcao_id' => 'required',
        ]);

        DB::table('users_funcaos')->insert([
            'user_id' => $request['user_id'],
            'funcao_id' => $request['funcao_id'],
        ]);
        return redirect()->route('user.list')
            ->with('success', 'Função atribuída com Sucesso!');
    }

    public function deleteFuncao(User $user, Funcao $funcao)
    {
        $user_funcao = DB::table('users_funcaos')
                        ->where('user_id', $user->id)
                        ->where( 'funcao_id', $funcao->id)
                        ->delete();
        return redirect()->route('user.list')
            ->with('success', 'Função desvinculada com Sucesso!');
    }


}
