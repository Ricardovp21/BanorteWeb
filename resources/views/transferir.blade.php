@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="form-title">Transferir dinero</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('transferir') }}" method="POST" class="form-container">
        @csrf

        <!-- Campo Número de tarjeta -->
        <div class="form-group">
            <label for="numero_tarjeta" class="form-label">Número de tarjeta</label>
            <input type="text" name="numero_tarjeta" class="form-control" required placeholder="Número de tarjeta">
            <span class="input-info">16 Dígitos</span>
        </div>

        <!-- Campo Monto -->
        <div class="form-group">
            <label for="monto" class="form-label">Monto a transferir</label>
            <input type="number" name="monto" class="form-control" required placeholder="Monto a transferir">
        </div>

        <!-- Botones -->
        <div class="form-actions">
            <button type="submit" class="btn-primary">Transferir</button>
            <a href="{{ route('transferir.form') }}" class="btn-tertiary">Cancelar</a>
        </div>
    </form>
</div>

<style>
    /* Tipografía */
    @font-face {
        font-family: 'Gotham Book';
        src: url('/path-to-your-font/Gotham-Book.otf');
    }
    @font-face {
        font-family: 'Gotham Medium';
        src: url('/path-to-your-font/Gotham-Medium.otf');
    }
    @font-face {
        font-family: 'Roboto';
        src: url('/path-to-your-font/Roboto-Regular.ttf');
    }

    body {
        font-family: 'Roboto', sans-serif;
        background-color: #F6F6F6;
    }

    /* Estilos del formulario */
    .form-container {
        background-color: white;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .form-title {
        font-family: 'Gotham Medium';
        font-size: 30px;
        color: #323E48;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-family: 'Gotham Medium';
        font-size: 15px;
        color: #5B6670;
        margin-bottom: 0.5rem;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        font-size: 15px;
        font-family: 'Roboto';
        color: #323E48;
        background-color: #F6F6F6;
        border: 1px solid #C1C5C8;
        border-radius: 4px;
    }

    .form-control::placeholder {
        color: #C1C5C8;
    }

    .form-control:focus {
        outline: none;
        border-color: #323E48;
    }

    .input-info {
        font-size: 12px;
        color: #5B6670;
        margin-top: 0.5rem;
    }

    /* Botones */
    .form-actions {
        display: flex;
        justify-content: space-between;
    }

    .btn-primary {
        font-family: 'Gotham Medium';
        background-color: #EB0029;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #DB0026;
    }

    .btn-tertiary {
        font-family: 'Gotham Medium';
        background-color: transparent;
        color: #DB0026;
        padding: 10px 20px;
        border: 2px solid #DB0026;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-tertiary:hover {
        background-color: #DB0026;
        color: white;
    }

    .alert {
        padding: 10px;
        margin-bottom: 1rem;
        border-radius: 4px;
    }

    .alert-success {
        background-color: #DFF0D8;
        color: #3C763D;
    }

    .alert-danger {
        background-color: #F2DEDE;
        color: #A94442;
    }
</style>

@endsection
