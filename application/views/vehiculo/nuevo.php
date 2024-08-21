<script>
    $("#menu_notificacion").addClass("active");
</script>
<br><?php
    date_default_timezone_set('America/Guayaquil');

    ?><div class="container">
    <div class="row">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Registrar nuevo vehiculo</h3>
            </div>
            <div class="card-body">
                <?php if ($usuario) { ?>
                    <form action="<?php echo site_url("/vehiculos_controller/guardarVeiculo") ?>" method="post" enctype="multipart/form-data" id="frm">

                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="placa_veh" class="form-label">Placa</label>
                                    <input type="text" class="form-control" name="placa_veh" id="placa_veh" value="<?php echo set_value('placa_veh'); ?>" aria-describedby="helpId" placeholder="Ingrese la placa en mayusculas" />
                                    <p style="color: red;"><?php echo form_error('placa_veh') ?></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="marca_veh" class="form-label">Marca</label>
                                    <select class="form-select form-select" name="marca_veh" id="marca_veh">
                                        <option disabled <?php echo set_select('marca_veh', '', TRUE); ?>>Seleccione una</option>
                                        <option value="Toyota" <?php echo set_select('marca_veh', 'Toyota'); ?>>Toyota</option>
                                        <option value="Ford" <?php echo set_select('marca_veh', 'Ford'); ?>>Ford</option>
                                        <option value="Chevrolet" <?php echo set_select('marca_veh', 'Chevrolet'); ?>>Chevrolet</option>
                                        <option value="Nissan" <?php echo set_select('marca_veh', 'Nissan'); ?>>Nissan</option>
                                        <option value="Kia" <?php echo set_select('marca_veh', 'Kia'); ?>>Kia</option>
                                        <option value="Hyundai" <?php echo set_select('marca_veh', 'Hyundai'); ?>>Hyundai</option>
                                        <option value="Honda" <?php echo set_select('marca_veh', 'Honda'); ?>>Honda</option>
                                        <option value="Volkswagen" <?php echo set_select('marca_veh', 'Volkswagen'); ?>>Volkswagen</option>
                                        <option value="Mazda" <?php echo set_select('marca_veh', 'Mazda'); ?>>Mazda</option>
                                        <option value="Renault" <?php echo set_select('marca_veh', 'Renault'); ?>>Renault</option>
                                        <option value="Suzuki" <?php echo set_select('marca_veh', 'Suzuki'); ?>>Suzuki</option>
                                        <option value="Chery" <?php echo set_select('marca_veh', 'Chery'); ?>>Chery</option>
                                        <option value="Great Wall" <?php echo set_select('marca_veh', 'Great Wall'); ?>>Great Wall</option>
                                        <option value="Jac" <?php echo set_select('marca_veh', 'Jac'); ?>>Jac</option>
                                        <option value="Changan" <?php echo set_select('marca_veh', 'Changan'); ?>>Changan</option>
                                        <option value="Geely" <?php echo set_select('marca_veh', 'Geely'); ?>>Geely</option>
                                        <option value="Mitsubishi" <?php echo set_select('marca_veh', 'Mitsubishi'); ?>>Mitsubishi</option>
                                        <option value="Peugeot" <?php echo set_select('marca_veh', 'Peugeot'); ?>>Peugeot</option>
                                        <option value="Fiat" <?php echo set_select('marca_veh', 'Fiat'); ?>>Fiat</option>
                                        <option value="Mercedes-Benz" <?php echo set_select('marca_veh', 'Mercedes-Benz'); ?>>Mercedes-Benz</option>
                                        <option value="BMW" <?php echo set_select('marca_veh', 'BMW'); ?>>BMW</option>
                                        <option value="Audi" <?php echo set_select('marca_veh', 'Audi'); ?>>Audi</option>
                                        <option value="Jeep" <?php echo set_select('marca_veh', 'Jeep'); ?>>Jeep</option>
                                        <option value="Land Rover" <?php echo set_select('marca_veh', 'Land Rover'); ?>>Land Rover</option>
                                        <option value="Subaru" <?php echo set_select('marca_veh', 'Subaru'); ?>>Subaru</option>
                                        <option value="Dongfeng" <?php echo set_select('marca_veh', 'Dongfeng'); ?>>Dongfeng</option>
                                        <option value="SsangYong" <?php echo set_select('marca_veh', 'SsangYong'); ?>>SsangYong</option>
                                        <option value="FAW" <?php echo set_select('marca_veh', 'FAW'); ?>>FAW</option>
                                        <option value="Foton" <?php echo set_select('marca_veh', 'Foton'); ?>>Foton</option>
                                    </select>
                                    <p style="color: red;"><?php echo form_error('marca_veh') ?></p>
                                </div>
                            </div>


                            <div class="col-3">
                                <?php $cont = date('Y'); ?>
                                <div class="mb-3">
                                    <label for="anio_veh" class="form-label">Año de fabricación</label>
                                    <select class="form-select form-select" name="anio_veh" id="anio_veh">
                                        <?php while ($cont >= 1980) { ?>
                                            <option value="<?php echo ($cont); ?>" <?php echo set_select('anio_veh', $cont); ?>>
                                                <?php echo ($cont); ?>
                                            </option>
                                        <?php $cont = ($cont - 1);
                                        } ?>
                                    </select>
                                    <p style="color: red;"><?php echo form_error('anio_veh') ?></p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="modelo_veh" class="form-label">Modelo</label>
                                    <input type="text" class="form-control" name="modelo_veh" id="modelo_veh" value="<?php echo set_value('modelo_veh'); ?>" aria-describedby="helpId" placeholder="Ingrese el modelo" />
                                    <p style="color: red;"><?php echo form_error('modelo_veh') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="status_veh" class="form-label">Status</label>
                                    <select class="form-select form-select" name="status_veh" id="status_veh">
                                        <option disabled <?php echo set_select('status_veh', '', TRUE); ?>>Seleccione una</option>
                                        <option value="ACTIVO" <?php echo set_select('status_veh', 'ACTIVO'); ?>>ACTIVO</option>
                                        <option value="INACTIVO" <?php echo set_select('status_veh', 'INACTIVO'); ?>>INACTIVO</option>
                                    </select>
                                    <p style="color: red;"><?php echo form_error('status_veh') ?></p>
                                </div>

                                <div class="mb-3">
                                    <label for="fk_veh_usu" class="form-label">Seleccione el propietario</label>
                                    <select class="form-select form-select" name="fk_veh_usu" id="fk_veh_usu">
                                        <option disabled <?php echo set_select('fk_veh_usu', '', TRUE); ?>>Seleccione uno</option>
                                        <?php foreach ($usuario as $registro) {
                                            if (
                                                $registro->perfil == "SECRETARIO" ||
                                                $registro->perfil == "SOCIO" ||
                                                $registro->perfil == "GERENTE" ||
                                                $registro->perfil == "PRESIDENTE"
                                            ) {
                                        ?>
                                                <option value="<?php echo $registro->id_usu ?>" <?php echo set_select('fk_veh_usu', $registro->id_usu); ?>>
                                                    <?php echo $registro->nombres . " " . $registro->apellidos ?>
                                                </option>
                                        <?php }
                                        } ?>
                                    </select>
                                    <p style="color: red;"><?php echo form_error('fk_veh_usu') ?></p>
                                </div>
                                <div class="mb-3">
                                    <label for="numero" class="form-label">Numero Unidad</label>
                                    <input type="number" class="form-control" name="numero" id="numero" value="<?php echo set_value('numero'); ?>" aria-describedby="helpId" placeholder="Ingrese el numero de la Unidad" />
                                    <p style="color: red;"><?php echo form_error('numero') ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="foto_veh" class="form-label">Foto vehículo</label>
                                    <input type="file" class="form-control" name="foto_veh" id="foto_veh" />
                                    <p style="color: red;"><?php echo form_error('foto_veh') ?></p>
                                </div>
                            </div>
                        </div>
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Guardar</button>
                            <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/vehiculos_controller/index") ?>" role="button">Cancelar</a>
                        </center>
                    </form>
                <?php } else {
                    echo "no hay";
                } ?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $("#foto_veh").fileinput({
        language: "es"
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