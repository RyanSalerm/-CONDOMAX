<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Condomax</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <!-- Vídeo de fundo -->
  <video autoplay muted loop id="bg-video">
    <source src="{{ asset('videos/corporativo.mp4') }}" type="video/mp4">
  </video>

  <div class="overlay"></div>

  <div class="centered">
    <div class="login-container">
      <img src="{{ asset('images/10 anos.png') }}" alt="Logo Condomax" class="logo">
      <h2>Bem-vindo</h2>

      <div id="error-message" class="error-message" style="display: none;">Preencha todos os campos corretamente.</div>

      <!-- Formulário correto -->
      <form method="POST" action="{{ route('login.post') }}" id="loginForm">
        @csrf

        <label for="email">Usuário</label>
        <input type="email" name="email" id="email" placeholder="Digite seu e-mail" required autofocus>

        <label for="password">Senha</label>
        <div class="password-wrapper">
          <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
          <button type="button" class="toggle-password" aria-label="Mostrar senha" tabindex="-1">
            <!-- Ícone olho -->
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="#bbb" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye" viewBox="0 0 24 24">
              <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
              <circle cx="12" cy="12" r="3"/>
            </svg>
          </button>
        </div>

        <button type="submit" id="loginBtn"><span id="btnText">Entrar</span></button>
      </form>

      <p class="forgot-password">Esqueceu a senha? <a href="#">Recuperar</a></p>
    </div>
  </div>

  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
