<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .contenedor {
            position: relative;
            width: 100%;
            padding: 20px;
        }

        .contenedor img {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 150px;
            height: 150px;
        }

        .contenedor .text {
            position: absolute;
            top: 20px;
            right: 20px;
            text-align: right;
        }

        p {
            text-align: justify;
        }

        .signature-contenedor {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            width: 100%;
        }

        .signature {
            width: 45%;
            text-align: center;
        }

        .gerente-contenedor {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }

        .gerente {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <img src="<?php echo base_url("/uploads/empresa/$notificacion->logo_emp") ?>" alt="Logo">
        <div class="text">
            <center>
                <h4>
                    COOPERATIVA DE TAXIS <br><?php echo $notificacion->nombre ?><br>
                    Ruc: <?php echo $notificacion->ruc ?><br>
                    Correo: <?php echo $notificacion->correo_emp ?><br>
                    Dirección: <?php echo $notificacion->direccion_emp ?><br>
                    <br><br><br>
                </h4>
            </center>
            Latacunga <?php echo $notificacion->fecha_not ?> Hora: <?php echo $notificacion->hora_not ?>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
        <center>
            <h1>NOTIFICACIÓN</h1>
        </center>
        <p>
            Mediante el presente, la cooperativa de transporte de pasajeros en Taxis "<?php echo $notificacion->nombre ?>", <b>NOTIFICA</b> al Sr. <?php echo $notificacion->nombres . " " . $notificacion->apellidos ?>, con CI: <?php echo $notificacion->cedula_usu ?>, socio de la institución con carácter de <?php echo $notificacion->caracter ?>, con la siguiente descripción: <?php echo $notificacion->mensaje ?>.
        </p>
        <br><br><br><br><br>
        <div class="signature-contenedor">
            <div class="signature">
                <?php foreach ($presidente as $registro) { ?>
                    <div>
                        ______________________________<br>
                        <?php echo $registro->nombres . " " . $registro->apellidos ?><br>
                        <?php echo $registro->perfil ?>
                    </div>
                <?php } ?>
            </div>
            <div class="signature">
                <?php foreach ($secretario as $registro) { ?>
                    <div>
                        ______________________________<br>
                        <?php echo $registro->nombres . " " . $registro->apellidos ?><br>
                        <?php echo $registro->perfil ?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="gerente-contenedor">
            <div class="gerente">
                <?php foreach ($gerente as $registro) { ?>
                    <div>
                        ______________________________<br>
                        <?php echo $registro->nombres . " " . $registro->apellidos ?><br>
                        <?php echo $registro->perfil ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
