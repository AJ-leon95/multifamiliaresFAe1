<script>
    $("#reunion").addClass("active");
</script>
<br><?php
    date_default_timezone_set('America/Guayaquil');

    ?>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Editar Reunión</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($empresa) { ?>
                    <form action="<?php echo site_url("/reuniones_controller/actualizarReunion") ?>" method="post" enctype="multipart/form-data" id="frm">
                    <?php foreach($empresa as $registro){ ?>
                    <input hidden value="<?php echo $registro->id_emp ?>" type="text" class="form-control" name="fk_reu_emp" id="fk_reu_emp" aria-describedby="helpId" placeholder="ingrese el lugar de la reunión" />
                        <?php } ?>
                        <input hidden value="<?php echo $reunion->id_reu ?>" type="text" class="form-control" name="id_reu" id="id_reu" aria-describedby="helpId" placeholder="ingrese el lugar de la reunión" />

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="lugar_reu" class="form-label">Lugar de la reunión</label>
                                    <input value="<?php echo $reunion->lugar_reu ?>" type="text" class="form-control" name="lugar_reu" id="lugar_reu" aria-describedby="helpId" placeholder="ingrese el lugar de la reunión" />
                                </div>


                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="fecha_reu" class="form-label">Fecha reunión</label>
                                    <input value="<?php echo $reunion->fecha_reu ?>" type="date" class="form-control" name="fecha_reu" id="fecha_reu" aria-describedby="helpId" placeholder="" />
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="hora_reu" class="form-label">Hora reunión</label>
                                    <input  value="<?php echo $reunion->hora_reu ?>" type="time" class="form-control" name="hora_reu" id="hora_reu" aria-describedby="helpId" placeholder="" />
                                </div>

                            </div>
                        </div>
                        <div class="row">
                        <div class="col-3">
                                <div class="mb-3">
                                    <label for="asunto_reu" class="form-label">Asunto de la reunión</label>
                                    <textarea name="asunto_reu" id="asunto_reu" cols="30" rows="10"><?php echo $reunion->asunto_reu ?></textarea>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="punto1" class="form-label">punto 1</label>
                                    <textarea name="punto1" id="punto1" cols="30" rows="10"> <?php echo $reunion->punto1 ?></textarea>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="punto2" class="form-label">punto 2</label>
                                    <textarea name="punto2" id="punto2" cols="30" rows="10"> <?php echo $reunion->punto2 ?></textarea>

                                </div>
                            </div>
                            <div class="col-3">
                                <div class="mb-3">
                                    <label for="punto3" class="form-label">punto 3</label>
                                    <textarea name="punto3" id="punto3" cols="30" rows="10"> <?php echo $reunion->punto3 ?></textarea>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-3">
                                <div class="mb-3">
                                    <label for="punto4" class="form-label">punto 4</label>
                                    <textarea name="punto4" id="punto4" cols="30" rows="10"><?php echo $reunion->punto4 ?></textarea>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="punto5" class="form-label">punto 5</label>
                                    <textarea name="punto5" id="punto5" cols="30" rows="10"> <?php echo $reunion->punto5 ?></textarea>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="punto6" class="form-label">punto 6</label>
                                    <textarea name="punto6" id="punto6" cols="30" rows="10"> <?php echo $reunion->punto6 ?></textarea>

                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="punto7" class="form-label">punto 7</label>
                                    <textarea name="punto7" id="punto7" cols="30" rows="10"> <?php echo $reunion->punto7 ?></textarea>

                                </div>
                            </div>
                           
                        </div>
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Actulizar</button>
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