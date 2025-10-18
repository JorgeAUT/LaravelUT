<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
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
            color: #dc3545;
        }
        .admin-badge {
            background-color: #dc3545;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            display: inline-block;
            margin: 10px 0;
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
        <h1>🔐 Panel de Administración</h1>
        
        <div class="admin-badge">ADMIN</div>
        
        <p><strong>Usuario:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Rol:</strong> {{ Auth::user()->role->name }}</p>
        
        <div class="links">
            <a href="/dashboard">Dashboard</a>
            <a href="/perfil">Perfil</a>
        </div>

        <p style="color: #28a745;">✅ Solo los administradores pueden ver esta página.</p>

        <form method="POST" action="/logout" style="margin-top: 20px;">
            @csrf
            <button type="submit" style="padding: 10px 20px; background-color: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Cerrar Sesión
            </button>
        </form>
    </div>
</body>
</html>