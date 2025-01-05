<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Activación Login</title>
    <style>
        .container {
            width: 80%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: auto;
        }
        .btn{
            background-color: #1f7cc9;
            border-radius: 5px;
            padding: 10px 12px;
            border: none;
            cursor: pointer;
            color: #fff;
            font-weight: 500;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>¡Bienvenido al sistema, {{ $usuario_nombre }} !</h1>
        <p>Tu correo en uso: {{ $usuario_email }}</p>
        <p>Ya puedes iniciar sesión, su login fue aprobado:) .</p>
        <a class="btn" href="http://127.0.0.1:8000/login" target="_blank" rel="noopener noreferrer">Iniciar sesión</a>
    </div>
    
</body>
</html>