<script>
    $("#deporte").addClass("active");
</script>
<br><?php
    date_default_timezone_set('America/Guayaquil');

    ?>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Editar Deporte</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($empresa) { ?>
                    <form action="<?php echo site_url("/deportes_controller/ActualizarDeporte") ?>" method="post" enctype="multipart/form-data" id="frm">
                        <?php foreach ($empresa as $registro) { ?>
                            <input hidden value="<?php echo $registro->id_emp ?>" type="text" class="form-control" name="fk_dep_emp" id="fk_dep_emp" aria-describedby="helpId" placeholder="ingrese el lugar de la reunión" />
                        <?php } ?>
                        <input hidden value="<?php echo $deporte->id_dep ?>" type="text" class="form-control" name="id_dep" id="id_dep" aria-describedby="helpId" placeholder="ingrese el lugar de la reunión" />

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lugar_dep" class="form-label">Lugar</label>
                                    <input value="<?php echo $deporte->lugar_dep ?>" type="text" class="form-control" name="lugar_dep" id="lugar_dep" aria-describedby="helpId" placeholder="ingrese el lugar de la reunión" />
                                    <p style="color: red;"><?php echo form_error('lugar_dep') ?></p>
                                </div>


                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="fecha_dep" class="form-label">Fecha reunión</label>
                                    <input value="<?php echo $deporte->fecha_dep?>" type="date" class="form-control" name="fecha_dep" id="fecha_dep" aria-describedby="helpId" placeholder="" />
                                    <p style="color: red;"><?php echo form_error('fecha_dep') ?></p>
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="hora_dep" class="form-label">Hora reunión</label>
                                    <input value="<?php echo $deporte->hora_dep?>" type="time" class="form-control" name="hora_dep" id="hora_dep" aria-describedby="helpId" placeholder="" />
                                    <p style="color: red;"><?php echo form_error('hora_dep') ?></p>
                                </div>

                            </div>
                        </div>
                       
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                            <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/deportes_controller/index") ?>" role="button">Cancelar</a>


                        </center>
            </div>

            </form>
        <?php } else {
                    echo "no hay";
                } ?>
        </div>

    </div>
</div>
