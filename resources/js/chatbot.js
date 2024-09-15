// Función para alternar el despliegue del chat
function toggleChat() {
    const chatbox = document.getElementById('chatbox');
    chatbox.style.display = chatbox.style.display === 'none' || chatbox.style.display === '' ? 'flex' : 'none';
}

// Función que hace la solicitud a la API del chatbot
async function query(data) {
    const response = await fetch(
    "https://api.stack-ai.com/inference/v0/run/83e8fd4a-0df3-4865-83b2-75fc365d353f/66e6e92e78e9b8d3bc4ed0f0",
    {
        headers: {
            'Authorization': 'Bearer 4d4787c8-11be-4db4-bc30-290aed337e23', // Reemplaza con tu clave API
            'Content-Type': 'application/json'
        },
        method: "POST",
        body: JSON.stringify(data),
    });
    const result = await response.json();
    return result;
}

// Evento al hacer clic en el botón de enviar
document.getElementById('send-btn').addEventListener('click', function () {
    const userInput = document.getElementById('user-input').value;

    if (userInput.trim() === '') return; // No hacer nada si el campo está vacío

    // Mostrar el mensaje del usuario en la ventana del chat
    const chatWindow = document.getElementById('chat-window');
    chatWindow.innerHTML += `<div class="message user"><strong>Tú:</strong> ${userInput}</div>`;
    document.getElementById('user-input').value = ''; // Limpiar campo de entrada

    // Hacer la solicitud a la API
    query({
        "user_id": "12345", // Cambia esto con un ID de usuario único
        "in-0": userInput
    }).then((response) => {
        const botResponse = response['out-0']; // El valor de la respuesta que regresa el bot
        chatWindow.innerHTML += `<div class="message bot"><strong>Bot:</strong> ${botResponse}</div>`;
        chatWindow.scrollTop = chatWindow.scrollHeight; // Desplazar al final del chat
    }).catch((error) => {
        console.error('Error al conectar con la API del chatbot:', error);
        chatWindow.innerHTML += `<div class="message bot"><strong>Error:</strong> No se pudo obtener una respuesta.</div>`;
    });
});
