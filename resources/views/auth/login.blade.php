@extends('layout.app')
@section('title', 'Login')

@section('content')
<style>
    /* Reset e fonte */
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #e3f2fd, #f8fbff);
        color: #333;
    }

    .login-wrapper {
        display: flex;
        min-height: 100vh;
        align-items: center;
        justify-content: center;
        padding: 20px;
        margin-left: -240px;
    }

    .login-container {
        display: flex;
        max-width: 900px;
        width: 100%;
        background: white;
        border-radius: 24px;
        box-shadow: 0 16px 32px rgba(0,0,0,0.12);
        overflow: hidden;
    }

    /* Coluna do logo */
    .logo-side {
        flex: 1;
        background: linear-gradient(135deg, #cad7e4, #dbe9f4);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
    }

    .logo-side img {
        max-width: 200px;
        height: auto;
        border-radius: 16px;
        object-fit: contain;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        background-color: white;
        padding: 8px;
    }

    /* Coluna do form */
    .form-side {
        flex: 1;
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-side h2 {
        margin-bottom: 24px;
        font-weight: 700;
        font-size: 28px;
        color: #2c3e50;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #555;
        font-size: 14px;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 12px 16px;
        margin-bottom: 24px;
        border-radius: 12px;
        border: 1.8px solid #b0c4de;
        font-size: 16px;
        transition: border-color 0.3s ease;
        outline-offset: 2px;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 8px rgba(74, 144, 226, 0.4);
        outline: none;
    }

    button {
        width: 100%;
        padding: 14px 0;
        background-color: #4a90e2;
        border: none;
        border-radius: 14px;
        color: white;
        font-weight: 700;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #3a76c2;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            border-radius: 0;
            box-shadow: none;
        }
        .logo-side {
            padding: 30px;
        }
        .form-side {
            padding: 10px;
        }
    }
</style>

<div class="login-wrapper">
    <div class="login-container">
        <div class="logo-side">
            <img src="{{ asset('build/assets/logo.png') }}" alt="Logo da Escola" />
        </div>
        <div class="form-side">
            <h2>Bem-vindo(a)!</h2>
            <form method="POST" action="#">
                @csrf
                <label for="cpf">CPF</label>
                <input id="cpf" type="text" name="cpf" required autofocus autocomplete="username" placeholder="Digite seu CPF" />

                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="Digite sua senha" />

                <button type="submit">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
