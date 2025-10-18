<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        .role-badge {
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin: 10px 0;
            color: white;
        }
        .role-admin {
            background-color: #dc3545;
        }
        .role-agente {
            background-color: #ff9800;
        }
        .role-cliente {
            background-color: #28a745;
        }
        .links {
            margin: 20px 0;
        }
        .links a {
            display: inline-block;
            margin-right: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .links a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👤 Mi Perfil</h1>
        
        <div class="role-badge role-{{ Auth::user()->role->name }}">
            {{ strtoupper(Auth::user()->role->name) }}
        </div>
        
        <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Rol:</strong> {{ Auth::user()->role->name }}</p>
        
        <div class="links">
            <a href="/dashboard">Dashboard</a>
            @if(Auth::user()->hasRole('admin'))
                <a href="/admin">Panel Admin</a>
            @endif
            @if(Auth::user()->hasRole('agente'))
                <a href="/agente">Panel Agente</a>
            @endif
        </div>

        <form method="POST" action="/logout" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Cerrar Sesión
            </button>
        </form>
    </div>
</body>
</html>