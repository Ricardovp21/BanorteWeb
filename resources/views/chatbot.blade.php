<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot API</title>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .chat-container {
            background-color: #fff;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding: 20px;
        }

        .chat-header {
            font-size: 18px;
            font-weight: bold;
            color: #eb0029;
            text-align: center;
            margin-bottom: 10px;
        }

        .chat-window {
            flex-grow: 1;
            overflow-y: auto;
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 15px;
        }

        .chat-input {
            display: flex;
            margin-top: 10px;
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
            background-color: #eee;
        }

        .message.bot {
            background-color: #d4edda;
        }

        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
            display: none; /* Oculto por defecto */
        }
    </style>
</head>
<body>

<div class="chat-container">
    <div class="chat-header">
        Chatbot Educativo
    </div>
    <div class="chat-window" id="chat-window">
        <!-- Aquí aparecerán los mensajes -->
    </div>
    <div class="chat-input">
        <input id="user-input" type="text" placeholder="Escribe tu mensaje aquí...">
        <button id="send-btn">Enviar</button>
    </div>
    <div id="error-message" class="error-message">El mensaje no debe superar las 100 palabras.</div>
</div>

<!-- JavaScript para interactuar con la API -->
<script>
    // Función para manejar la solicitud con timeout
    function fetchWithTimeout(url, options, timeout = 60000) { // Timeout de 1 minuto (60,000 ms)
        return new Promise((resolve, reject) => {
            const timer = setTimeout(() => {
                reject(new Error('Tiempo de espera agotado (Timeout).'));
            }, timeout);

            fetch(url, options).then(
                (response) => {
                    clearTimeout(timer);
                    resolve(response);
                },
                (err) => {
                    clearTimeout(timer);
                    reject(err);
                }
            );
        });
    }

    // Función para contar palabras en un string
    function countWords(str) {
        return str.trim().split(/\s+/).length;
    }

    // Función para recortar las palabras a un límite
    function limitWords(str, limit) {
        const words = str.trim().split(/\s+/);
        if (words.length > limit) {
            return words.slice(0, limit).join(' ') + '...'; // Recortar y añadir puntos suspensivos
        }
        return str;
    }

    async function query(data) {
        try {
            const response = await fetchWithTimeout(
                "https://api.stack-ai.com/inference/v0/run/83e8fd4a-0df3-4865-83b2-75fc365d353f/66e6e92e78e9b8d3bc4ed0f0",
                {
                    headers: {
                        'Authorization': 'Bearer 4d4787c8-11be-4db4-bc30-290aed337e23', // Reemplaza con tu clave API
                        'Content-Type': 'application/json'
                    },
                    method: "POST",
                    body: JSON.stringify(data),
                }
            );
            const result = await response.json();
            return result;
        } catch (error) {
            console.error('Error en la solicitud o tiempo agotado:', error);
            throw error;  // Lanzar error para manejarlo fuera de la función
        }
    }

    document.getElementById('send-btn').addEventListener('click', function () {
        const userInput = document.getElementById('user-input').value;
        const errorMessage = document.getElementById('error-message');

        // Contar las palabras del input del usuario
        const wordCount = countWords(userInput);

        if (wordCount > 100) {
            // Mostrar mensaje de error si supera las 100 palabras
            errorMessage.style.display = 'block';
            return;
        } else {
            errorMessage.style.display = 'none'; // Ocultar el mensaje de error si está dentro del límite
        }

        if (userInput.trim() === '') return; // No hacer nada si el campo está vacío

        // Mostrar el mensaje del usuario en la ventana del chat
        const chatWindow = document.getElementById('chat-window');
        chatWindow.innerHTML += `<div class="message user"><strong>Tú:</strong> ${userInput}</div>`;
        document.getElementById('user-input').value = ''; // Limpiar campo de entrada

        // Hacer la solicitud a la API
        query({
            "user_id": "12345",  // Cambia esto si tienes un ID único para el usuario
            "in-0": userInput
        }).then((response) => {
            console.log(response);  // Verifica la estructura completa de la respuesta en la consola

            // Obtener la respuesta del bot
            let botResponse = response.outputs ? response.outputs["out-0"] : "Lo siento, no tengo una respuesta en este momento.";

            // Recortar la respuesta si excede las 150 palabras
            botResponse = limitWords(botResponse, 150);
            
            // Mostrar la respuesta del bot en la ventana del chat
            chatWindow.innerHTML += `<div class="message bot"><strong>Bot:</strong> ${botResponse}</div>`;
            chatWindow.scrollTop = chatWindow.scrollHeight; // Desplazar al final del chat
        }).catch((error) => {
            chatWindow.innerHTML += `<div class="message bot"><strong>Error:</strong> No se pudo obtener una respuesta. ${error.message}</div>`;
        });
    });
</script>

</body>
</html>
