<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use App\Notifications\EmailVerify;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'imagem',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class);
    }

    public function funcaos()
    {
        return $this->belongsToMany(Funcao::class, 'users_funcaos', 'user_id', 'funcao_id')
            ->withTimestamps();
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }

    public function pontuacaos()
    {
        return $this->hasMany(Pontuacao::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function ranking(){
        return $this->hasOne(Ranking::class);
    }
    public function ranking_equipe(){
        return $this->hasOne(RankingEquipe::class);
    }

    public function isAdmin(){
        $funcaos = $this->funcaos;
        foreach ($funcaos as $funcao) {
            if ($funcao->nome == 'admin') {
                return true;
            }else{
                return false;
            }
        }
    }
    public function isProfessor(){
        $funcaos = $this->funcaos;
        foreach ($funcaos as $funcao) {
            if ($funcao->nome == 'professor') {
                return true;
            }
        }
    }
    public function isAluno(){
        $funcaos = $this->funcaos;
        foreach ($funcaos as $funcao) {
            if ($funcao->nome == 'aluno') {
                return true;
            }
        }
    }

    // public function sendEmailVerificationNotification(User $user){
    //     $this->notify(new EmailVerify($user->id));
    // }

}
