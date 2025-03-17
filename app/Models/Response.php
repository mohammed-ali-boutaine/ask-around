<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //

    protected $table = 'responses';
    protected $fillable = ['content', 'user_id', 'question_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
