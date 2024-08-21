<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convocatoria PDF</title>

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

        span {
            display: inline;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <img src="<?php echo base_url("/uploads/empresa/$deporte->logo_emp") ?>" alt="Logo">
        <div class="text">
            <center>
                <h4>
                    COOPERATIVA DE TAXIS <br><?php echo $deporte->nombre ?><br>
                    RUC: <?php echo $deporte->ruc ?><br>
                    Correo: <?php echo $deporte->correo_emp ?><br>
                    Dirección: <?php echo $deporte->direccion_emp ?><br>
                    <br><br><br>
                </h4>
            </center>
            Latacunga <?php echo $deporte->fecha_dep ?> Hora: <?php echo $deporte->hora_dep ?>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <center>
            <h1>CONVOCATORIA</h1>
        </center>
        <p>
            Mediante el presente, la cooperativa de transporte de pasajeros en Taxis <b>CONVOCA</b> a los socios <b>
                <?php foreach($socios as $socio){
                    echo $socio->nombres." ".$socio->apellidos.", ";
                }
                ?>
            </b> a una actividad deportiva  que se llevará a cabo el día <b><?php echo $deporte->fecha_dep ?></b> a las <b><?php echo $deporte->hora_dep ?></b>, en <b><?php echo $deporte->lugar_dep ?></b>
        </p>
        <br><br><br><br><br>
        <div class="signature-contenedor">
            <div class="signature presidente">
                <?php foreach ($presidente as $registro) { ?>
                    <div>
                        ______________________________<br>
                        <?php echo $registro->nombres . " " . $registro->apellidos ?><br>
                        <?php echo $registro->perfil ?>
                    </div>
                <?php } ?>
            </div>
            <div class="signature secretario">
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
