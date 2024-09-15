<?php

namespace App\Http\Controllers;

use App\Models\OnboardingQuestion;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    public function show()
    {
        $questions = OnboardingQuestion::all(); // Preguntas de onboarding
        return view('onboarding.show', compact('questions'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        
        foreach ($request->answers as $question_id => $answer) {
            // Almacenar las respuestas del usuario
            $user->onboardingAnswers()->create([
                'question_id' => $question_id,
                'respuesta' => $answer,
            ]);
        }

        return redirect()->route('profile');
    }
}
