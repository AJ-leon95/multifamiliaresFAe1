<script>
    $("#menu_notificacion").addClass("active");
</script>
<br><?php
    date_default_timezone_set('America/Guayaquil');

    ?>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Actualizar Notificaciòn</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($empresa) { ?>
                    <form action="<?php echo site_url("/notificaciones_controller/ActualizarNotificacion") ?>" method="post" enctype="multipart/form-data" id="frm">
                    <input hidden value="<?php echo $notificacion->id_not?>" type="text" class="form-control" name="id_not" id="id_not" aria-describedby="helpId" placeholder="" />

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="caracter" class="form-label">Caracter</label>
                                    <select class="form-select form-select" name="caracter" id="caracter">
                                        <option selected><?php echo $notificacion->caracter ?></option>
                                        <option value="URGENTE">URGENTE</option>
                                        <option value="PRIMER AVISO">PRIMER AVISO</option>
                                        <option value="SEGUNDO AVISO">SEGUNDO AVISO</option>
                                        <option value="INFORMACIÓN">INFORMACIÓN</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="fecha_not" class="form-label">Fecha Notificacion</label>
                                    <input value="<?php echo $notificacion->fecha_not?>" type="date" class="form-control" name="fecha_not" id="fecha_not" aria-describedby="helpId" placeholder="" />
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="hora_not" class="form-label">Hora Notificacion</label>
                                    <input  value="<?php echo date('H:i:s'); ?>"type="time" class="form-control" name="hora_not" id="hora_not" aria-describedby="helpId" placeholder="" />
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea name="mensaje" id="mensaje" cols="30" rows="10"><?php echo $notificacion->mensaje ?></textarea>

                                </div>
                            </div>


                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="fk_not_usu" class="form-label">Elija al socio o directivo</label>
                                    <select class="form-select form-select" name="fk_not_usu" id="fk_not_usu">
                                        <option value="<?php echo $notificacion->fk_not_usu  ?>" selected><?php echo $notificacion->nombres ." ".$notificacion->apellidos ?></option>
                                        <?php foreach ($usuario as $registro) {
                                            if (
                                                $registro->perfil == "SECRETARIO" ||
                                                $registro->perfil == "SOCIO" ||
                                                $registro->perfil == "GERENTE" ||
                                                $registro->perfil == "PRESIDENTE"
                                            ) {
                                        ?>
                                                <option value="<?php echo $registro->id_usu ?>"><?php echo $registro->nombres . " " . $registro->apellidos ?></option>

                                        <?php }
                                        } ?>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Cancelar</a>


                        </center>
            </div>

            </form>
        <?php } else {
                    echo "no hay";
                } ?>
        </div>

    </div>
</div>

<script type="text/javascript">
    $('#fk_not_usu').select2();
</script>

<script type="text/javascript">
    $("#frm").validate({
        rules: {
            caracter: {
                required: true,
            },
            fecha_not: {
                required: true,
            },
            hora_not: {
                required: true,
            },
            mensaje: {
                required: true,
                
            },
            fk_not_usu: {
                required: true,
            },
            },
        messages: {
            caracter: {
                required: 'Este campo es requerido.',

            },
            fecha_not: {
                required: 'Este campo es requerido.',
            },
            hora_not: {
                required: 'Este campo es requerido.',

            },
            mensaje: {
                required: 'Este campo es requerido.',
            },
            fk_not_usu: {
                required: "Este campo es requerido.",
               
            },
        

        }
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#mensaje'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>