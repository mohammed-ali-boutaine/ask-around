<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    //
    use HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = ['username', 'email', 'password', 'picture'];
    protected $hidden = ['password'];

    public function questions(){
        return $this->hasMany(Question::class);

    }

}
