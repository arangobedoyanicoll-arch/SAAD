<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAAD</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        .contenedor{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
            text-align:center;
        }

        .card{
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 4px 10px rgba(0,0,0,0.2);
            width:500px;
        }

        h1{
            color:#1E3A8A;
            margin-bottom:15px;
        }

        p{
            color:#555;
            margin-bottom:30px;
            line-height:1.5;
        }

        .botones{
            display:flex;
            justify-content:center;
            gap:15px;
        }

        .btn{
            text-decoration:none;
            padding:12px 25px;
            border-radius:10px;
            color:white;
            font-weight:bold;
        }

        .login{
            background:#2563EB;
        }

        .registro{
            background:#10B981;
        }

        .btn:hover{
            opacity:0.8;
        }

    </style>

</head>
<body>

<div class="contenedor">

    <div class="card">

        <h1>SAAD</h1>

        <h3>Sistema de Atención y Acompañamiento a Padres</h3>

        <br>

        <p>
            Plataforma digital diseñada para la gestión de citaciones,
            seguimiento académico y atención de padres de familia
            en la institución educativa.
        </p>

        <div class="botones">

            <a href="login.php" class="btn login">
                Iniciar Sesión
            </a>

            <a href="registro.php" class="btn registro">
                Registrarse
            </a>

        </div>

    </div>

</div>

</body>
</html>