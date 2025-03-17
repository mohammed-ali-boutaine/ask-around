<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     public function up()
     {
          Schema::create('saved_questions', function (Blueprint $table) {
               $table->id();
               $table->foreignId('user_id')->constrained()->onDelete('cascade');
               $table->foreignId('question_id')->constrained()->onDelete('cascade');
               $table->timestamps();
               $table->unique(['user_id', 'question_id']);
          });
     }

     public function down()
     {
          Schema::dropIfExists('saved_questions');
     }
};
