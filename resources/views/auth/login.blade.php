<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - El Buen Agricultor</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
     <style>
        body {
            background-color: #28a745; /* Fondo verde campo */
            background:url('vendor/adminlte/dist/img/fondo.png') ;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-logo a {
            color: #ffffff; /* Color blanco para el texto del logo */
            font-size: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Sombra para el texto del logo */
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semi-transparente */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>El Buen Agricultor</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body bg-transparent absolute">
                <p class="login-box-msg">Iniciar Sesion</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Recordarme contraseña
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">Olvide mi contraseña</a>
                </p>
                <!-- <p class="mb-0">
                    <a href="#" class="text-center">Register a new </a>
                </p> -->
            </div>
        </div>
    </div>

    
</body>
</html>
