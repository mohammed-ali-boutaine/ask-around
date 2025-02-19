<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Question extends Model
{
    //
    


    protected $table = "questions";
    protected $fillable = ['title','content','ville','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
