<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot con IA</title>
    <style>
        /* Estilos para el chat desplegable */
        .chatbot-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        .chatbot-toggle {
            background-color: #eb0029;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            width: 50px;
            height: 50px;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .chatbox {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 300px;
            height: 400px;
            display: none; /* Comienza cerrado */
            flex-direction: column;
            overflow: hidden;
            position: fixed;
            bottom: 80px;
            right: 20px;
        }

        .chat-header {
            background-color: #eb0029;
            color: white;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
        }

        .chat-window {
            flex-grow: 1;
            background-color: #f5f5f5;
            padding: 10px;
            overflow-y: auto;
        }

        .chat-input {
            display: flex;
            padding: 10px;
            background-color: #fff;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .chat-input button {
            background-color: #eb0029;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .message.user {
            background-color: #e0e0e0;
        }

        .message.bot {
            background-color: #d1e7dd;
        }
    </style>
</head>
<body>

<div class="chatbot-container">
    <!-- Botón para desplegar el chat -->
    <button class="chatbot-toggle" onclick="toggleChat()">💬</button>

    <!-- Caja del chat desplegable -->
    <div class="chatbox" id="chatbox">
        <div class="chat-header">
            Chat con IA
        </div>
        <div class="chat-window" id="chat-window">
            <!-- Mensajes del chat aparecerán aquí -->
        </div>
        <div class="chat-input">
            <input id="user-input" type="text" placeholder="Escribe tu mensaje aquí...">
            <button id="send-btn">Enviar</button>
        </div>
    </div>
</div>

<!-- Incluir el archivo JS del chatbot -->
<script src="{{ asset('js/chatbot.js') }}"></script>


</body>
</html>
