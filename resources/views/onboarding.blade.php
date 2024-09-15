@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Encuesta de Onboarding</h1>

    <form action="{{ route('onboarding.store') }}" method="POST">
        @csrf
        @foreach ($preguntasOnboarding as $pregunta)
            <div class="mb-3">
                <label for="pregunta-{{ $pregunta->id }}" class="form-label">{{ $pregunta->pregunta }}</label>
                <input type="text" class="form-control" id="pregunta-{{ $pregunta->id }}" name="respuestas[{{ $pregunta->id }}]" required>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
