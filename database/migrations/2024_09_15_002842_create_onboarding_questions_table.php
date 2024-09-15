<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnboardingQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('onboarding_questions', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta');
            $table->enum('tipo', ['texto', 'seleccion', 'booleano']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('onboarding_questions');
    }
}
