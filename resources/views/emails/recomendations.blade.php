<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomendaciones Personalizadas</title>
</head>
<body>
    <h1>Recomendaciones para mejorar tu experiencia bancaria</h1>

    <ul>
        @foreach ($recomendaciones as $recomendacion)
            <li>{{ $recomendacion }}</li>
        @endforeach
    </ul>

    <p>Gracias por usar nuestra aplicación bancaria.</p>
</body>
</html>
