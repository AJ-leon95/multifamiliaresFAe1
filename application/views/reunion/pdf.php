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
        <img src="<?php echo base_url("/uploads/empresa/$reunion->logo_emp") ?>" alt="Logo">
        <div class="text">
            <center>
                <h4>
                    COOPERATIVA DE TAXIS <br><?php echo $reunion->nombre ?><br>
                    RUC: <?php echo $reunion->ruc ?><br>
                    Correo: <?php echo $reunion->correo_emp ?><br>
                    Dirección: <?php echo $reunion->direccion_emp ?><br>
                    <br><br><br>
                </h4>
            </center>
            Latacunga <?php echo $reunion->fecha_reu ?> Hora: <?php echo $reunion->hora_reu ?>
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
            </b> a una reunión que se llevará a cabo el día <?php echo $reunion->fecha_reu ?> a las <?php echo $reunion->hora_reu ?>, en <b><?php echo $reunion->lugar_reu ?></b>, donde se tratará el asunto: <span><?php echo str_replace(["<p>", "</p>"], "", $reunion->asunto_reu); ?></span>, con el siguiente orden del día: <br>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 1: ".$reunion->punto1) . ", "?></span>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 2: ".$reunion->punto2) . ", "?></span>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 3: ".$reunion->punto3) . ", "?></span>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 4: ".$reunion->punto4) . ", "?></span>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 5: ".$reunion->punto5) . ", "?></span>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 6: ".$reunion->punto6) . ", "?></span>
            <span><?php echo str_replace(["<p>", "</p>"], "", "Punto 7: ".$reunion->punto7); ?></span>
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
