<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnboardingQuestion extends Model
{
    protected $fillable = ['pregunta', 'tipo'];

    public function answers()
    {
        return $this->hasMany(OnboardingAnswer::class, 'question_id');
    }
}
