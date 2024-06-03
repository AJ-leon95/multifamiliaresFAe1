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
                <h3 class="card-title">Registrar ediar vehiculo</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($usuario) { ?>
                    <form action="<?php echo site_url("/vehiculos_controller/actualizar") ?>" method="post" enctype="multipart/form-data" id="frm">
                    <input hidden value="<?php echo $usuarioEditar->id_veh ?>" type="text" class="form-control" name="id_veh" id="id_veh" aria-describedby="helpId" placeholder="Ingrese el modelo" />

                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="placa_veh" class="form-label">Placa</label>
                                    <input value="<?php echo $usuarioEditar->placa_veh ?>" type="text" class="form-control" name="placa_veh" id="placa_veh" aria-describedby="helpId" placeholder="Ingrese la placa en mayusculas" />
                                
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="marca_veh" class="form-label">Marca</label>
                                    <select class="form-select form-select" name="marca_veh" id="marca_veh">
                                        <option value="<?php echo $usuarioEditar->marca_veh ?>"  selected><?php echo $usuarioEditar->marca_veh ?></option>
                                        <option value="Toyota">Toyota</option>
                                        <option value="Ford">Ford</option>
                                        <option value="Chevrolet">Chevrolet</option>
                                        <option value="Honda">Honda</option>
                                        <option value="Volkswagen">Volkswagen</option>
                                        <option value="Nissan">Nissan</option>
                                        <option value="BMW">BMW</option>
                                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                                        <option value="Audi">Audi</option>
                                        <option value="Hyundai">Hyundai</option>
                                        <option value="Kia">Kia</option>
                                        <option value="Subaru">Subaru</option>
                                        <option value="Mazda">Mazda</option>
                                        <option value="Tesla">Tesla</option>
                                        <option value="Jeep">Jeep</option>
                                        <option value="Volvo">Volvo</option>
                                        <option value="Porsche">Porsche</option>
                                        <option value="Fiat">Fiat</option>
                                        <option value="Land Rover">Land Rover</option>
                                        <option value="Lexus">Lexus</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-3">
                                <?php $cont = date('Y'); ?>
                                <div class="mb-3">
                                    <label for="anio_veh" class="form-label">Año de fabricacion</label>
                                    <select class="form-select form-select" name="anio_veh" id="anio_veh">
                                        <option  value="<?php echo $usuarioEditar->anio_veh ?>"><?php echo $usuarioEditar->anio_veh ?></option>
                                        <?php while ($cont >= 1980) { ?>
                                            <option value="<?php echo ($cont); ?>">
                                                <?php echo ($cont); ?>
                                            </option>
                                        <?php $cont = ($cont - 1);
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="modelo_veh" class="form-label">Modelo</label>
                                    <input value="<?php echo $usuarioEditar->modelo_veh ?>" type="text" class="form-control" name="modelo_veh" id="modelo_veh" aria-describedby="helpId" placeholder="Ingrese el modelo" />
                                </div>

                            </div>


                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="status_veh" class="form-label">Status</label>
                                    <select class="form-select form-select" name="status_veh" id="status_veh">
                                        <option value="<?php echo $usuarioEditar->status_veh ?>"  selected><?php echo $usuarioEditar->status_veh ?></option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="fk_veh_usu" class="form-label">Seleccione el propietario</label>
                                    <select class="form-select form-select" name="fk_veh_usu" id="fk_veh_usu">
                                        <option value="<?php echo $usuarioEditar->fk_veh_usu ?>" selected><?php echo $usuarioEditar->nombres." ".$usuarioEditar->apellidos ?></option>
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
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Numero Unidad</label>
                                    <input value="<?php echo $usuarioEditar->numero ?>" type="number" class="form-control" name="numero" id="numero" aria-describedby="helpId" placeholder="Ingrese el numero de la Unidad" />
                                    <p style="color: red;"><?php echo form_error('numero') ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="foto_veh" class="form-label">foto vehiculo</label>
                                    <input type="file" class="form-control" name="foto_veh" id="foto_veh" aria-describedby="helpId" placeholder="ingrese su foto en formato png" />
                                </div>
                            </div>

                            <div class="col-6"></div>
                        </div>
            </div>

            <center>
                <br>
                <button type="submit" class="btn btn-warning">Actualizar</button>
                <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/vehiculos_controller/index") ?>" role="button">Cancelar</a>


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
     $("#foto_veh").fileinput({
        language: "es",
        initialPreview: [
            "<img src='<?php echo base_url("/uploads/vehiculos/") ?><?php echo $usuarioEditar->foto_veh ?>' alt='Imagen Actual' height='100px'> "
        ],
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        showCaption: false,
        dropZoneEnabled: true
    });
    $('#fk_veh_usu').select2();
    $('#año_fabricacion').select2();
    $('#marca_veh').select2();
</script>

<script type="text/javascript">
    $("#frm").validate({
        rules: {
            lugar_reu: {
                required: true,
            },
            fecha_reu: {
                required: true,
            },
            hora_reu: {
                required: true,
            },
            punto1: {
                required: true,

            },

        },
        messages: {
            lugar_reu: {
                required: 'Este campo es requerido.',

            },
            fecha_reu: {
                required: 'Este campo es requerido.',
            },
            hora_reu: {
                required: 'Este campo es requerido.',

            },
            punto1: {
                required: 'Este campo es requerido.',
            },
        }
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#punto1'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
    ClassicEditor
        .create(document.querySelector('#asunto_reu'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#punto2'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#punto3'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#punto4'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#punto5'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#punto6'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#punto7'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });
</script>