<!DOCTYPE html>
<html>
<head>
    <title>Accesos no permitidos detectados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Accesos no permitidos detectados</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <p>Estimado usuario,</p>
                <p>Se ha detectado un acceso no permitido de forma recurrente</p>
                <ul>
                    <li>Ruta: {{ $ruta }}</li>
                    <li>Fecha: {{ $datetime }}</li>
                    <li>No. intentos: {{ $unauthorizedAccessCount }}</li>
                </ul>
            </div>
        </div>
        
    </div>
</body>
</html>
