<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');

        // Configuración del cliente HTTP
        $client = new Client();

        try {
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'), // Asegúrate de tener la API Key en tu archivo .env
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'system', 'content' => 'Eres un asistente financiero amigable.'],
                        ['role' => 'user', 'content' => $userMessage],
                    ],
                    'max_tokens' => 150,
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return response()->json([
                'message' => $data['choices'][0]['message']['content']
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al conectar con la API de OpenAI: ' . $e->getMessage()
            ], 500);
        }
    }
}
