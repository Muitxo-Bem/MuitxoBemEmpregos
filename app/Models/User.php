<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','tipo'
    ];

    public static $rules = [ 
        'email' => 'required|email',
        'senha' => 'required|confirmed|min:8|max:64',
    ];

    public static $messages = [
        'email.*' => 'O campo Email é obrigatório e deve ser válido',
        'senha.confirmed' => 'A confirmação da senha deve ser igual à senha digitada',
        'senha.*' => 'O campo Senha é obrigatório e deve conter no mínimo 8 caracteres e no máximo 64 caracteres'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function candidato(){
        return $this->hasOne('App\Models\Candidato');
    }
    public function empregador(){
        return $this->hasOne('App\Models\Empregador');
    }
}
