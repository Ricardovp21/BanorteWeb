@extends('layouts.app')

@section('title', 'Perfil del Usuario')

@section('content')
    <h1>Perfil de {{ $user->name }}</h1>

    @if ($account)
        <div>
            <h2>Detalles de la Cuenta</h2>
            <p><strong>Saldo:</strong> ${{ $account->saldo }}</p>
            <p><strong>Tipo de Cuenta:</strong> {{ $account->tipo_cuenta }}</p>
        </div>
    @else
        <p>No tienes una cuenta asociada.</p>
    @endif
@endsection
