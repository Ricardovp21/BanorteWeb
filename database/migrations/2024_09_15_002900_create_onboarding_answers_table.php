<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnboardingAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('onboarding_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('question_id')->constrained('onboarding_questions')->onDelete('cascade');
            $table->text('respuesta');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('onboarding_answers');
    }
}
