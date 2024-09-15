<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecommendationMail;
use App\Models\User;
use App\Models\OnboardingQuestion;
use App\Models\OnboardingAnswer;

class OnboardingController extends Controller
{
    // Método para mostrar las preguntas de onboarding
    public function show()
    {
        // Generar preguntas usando IA
        $preguntas = $this->generarPreguntasIA();

        // Guardar preguntas generadas en la base de datos si es necesario
        foreach ($preguntas as $pregunta) {
            OnboardingQuestion::updateOrCreate(
                ['pregunta' => $pregunta['texto']],
                ['tipo' => $pregunta['tipo']]
            );
        }

        // Obtener todas las preguntas para mostrar en la vista
        $preguntasOnboarding = OnboardingQuestion::all();

        // Pasar las preguntas a la vista
        return view('onboarding.show', compact('preguntasOnboarding'));
    }

    // Método para generar preguntas usando OpenAI
    private function generarPreguntasIA()
    {
        // Crear cliente HTTP para OpenAI
        $client = new Client();

        try {
            $response = $client->post('https://api.openai.com/v1/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'text-davinci-003',
                    'prompt' => 'Genera 5 preguntas financieras personalizadas para un usuario bancario.',
                    'max_tokens' => 200,
                ]
            ]);

            $data = json_decode($response->getBody()->getContents(), true);
            $preguntas = [];

            // Generar preguntas a partir de la respuesta de OpenAI
            foreach (explode("\n", trim($data['choices'][0]['text'])) as $texto) {
                $preguntas[] = [
                    'texto' => $texto,
                    'tipo'  => 'text'  // Tipo de respuesta
                ];
            }

            return $preguntas;
        } catch (\Exception $e) {
            return [];
        }
    }

    // Guardar las respuestas del usuario
    public function store(Request $request)
    {
        $user = auth()->user();
        $respuestas = $request->input('respuestas');

        // Guardar respuestas y generar recomendaciones
        $recomendaciones = $this->generarRecomendaciones($respuestas);

        // Guardar respuestas en la base de datos
        foreach ($respuestas as $pregunta_id => $respuesta) {
            OnboardingAnswer::create([
                'user_id' => $user->id,
                'question_id' => $pregunta_id,
                'respuesta' => $respuesta,
            ]);
        }

        // Enviar recomendaciones por correo
        $this->enviarRecomendacionesPorCorreo($user, $recomendaciones);

        // Redirigir al dashboard con notificación
        return redirect()->route('home')->with('success', 'Recomendaciones generadas y enviadas.');
    }

    // Generar recomendaciones personalizadas basadas en las respuestas
    private function generarRecomendaciones($respuestas)
    {
        $recomendaciones = [];

        foreach ($respuestas as $pregunta_id => $respuesta) {
            $pregunta = OnboardingQuestion::find($pregunta_id);

            // Ejemplo de recomendaciones basadas en las respuestas
            if ($pregunta->pregunta == '¿Cuánto planeas ahorrar cada mes?' && $respuesta < 1000) {
                $recomendaciones[] = "Te sugerimos ahorrar al menos el 20% de tus ingresos para alcanzar tus metas financieras.";
            }

            if ($pregunta->pregunta == '¿Estás interesado en inversiones de bajo riesgo?' && $respuesta == '1') {
                $recomendaciones[] = "Considera invertir en bonos del gobierno o fondos de bajo riesgo.";
            }
        }

        return $recomendaciones;
    }

    // Enviar recomendaciones por correo
    private function enviarRecomendacionesPorCorreo($user, $recomendaciones)
    {
        Mail::to($user->email)->send(new RecommendationMail($recomendaciones));
    }
}
