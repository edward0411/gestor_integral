
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body>
    <div style='width: 100%; height: auto;'>
        <div style='width: 100%; float: left; background: #0b2d3f; height: auto;'>

            <div style='float: right; text-align: right; padding: 10px; padding-top: 60px; padding-right: 40px;'>
                <a href='#' style='text-decoration: none; font-size: 12px; color: white; font-family: arial;'>Tus Tareas</a>
            </div>
        </div>
        <div style='width: 100%; height: 10px; background: #36a1db; float: left;'>
        </div>
        <div style='width: 90%; height: auto; float: left; padding: 5%; font-family: arial; color: grey; text-align: justify;'>
            <p><h1>Hola, {{ $user->u_name }}</h1></p>
            <br>
            <p>
                Has creado una cuenta con nosotros, solo te falta verificarla, ingresa este codigo en tu perfil:
            </p>
            <br>
            {{$token}}
            
            <br>
            <br>

            Gracias,<br>
            <b>Tus Tareas Team</b>

        </div>
    </div>
</body>
</html>
