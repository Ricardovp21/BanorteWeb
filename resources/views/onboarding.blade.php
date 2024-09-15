@extends('layouts.app')

@section('title', 'Experiencia Personalizada')

@section('content')
    <h1>Personaliza tu Experiencia</h1>

    <form action="{{ route('onboarding.store') }}" method="POST">
        @csrf
        @foreach ($questions as $question)
            <div class="mb-4">
                <label>{{ $question->pregunta }}</label>
                @if ($question->tipo === 'texto')
                    <input type="text" name="answers[{{ $question->id }}]" class="border p-2 w-full">
                @elseif ($question->tipo === 'booleano')
                    <select name="answers[{{ $question->id }}]" class="border p-2 w-full">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Guardar Respuestas</button>
    </form>
@endsection
