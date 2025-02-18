<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    
    protected $table = "questions";
    protected $fillable = ['title','content','ville','user_id'];
}
