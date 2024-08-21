<script>
    $("#admin").addClass("active");
</script>
<br>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nuevo Administrador</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($datosEmpresa) { ?>
                    <form action="<?php echo site_url("/usuarios_controller/guardarUsuario") ?>" method="post" enctype="multipart/form-data">
                        <input hidden value="ADMINISTRADOR" type="text" class="form-control" name="perfil" id="perfil" aria-describedby="helpId" placeholder="ingrese su nombre" />
                        <?php foreach ($datosEmpresa as $emp) { ?>
                            <input hidden value="<?php echo $emp->id_emp ?>" type="text" class="form-control" name="fk_usu_emp" id="fk_usu_emp" aria-describedby="helpId" placeholder="ingrese su nombre" />
                        <?php } ?>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input value="<?php echo set_value('nombres'); ?>" type="text" class="form-control" name="nombres" id="nombres" aria-describedby="helpId" placeholder="ingrese su nombre" />
                                    <p><?php echo form_error('nombres'); ?></p>
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input value="<?php echo set_value('apellidos'); ?>" type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                    <p><?php echo form_error('apellidos'); ?></p>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="cedula_usu" class="form-label">Cedula</label>
                                    <input value="<?php echo set_value('cedula_usu'); ?>" type="number" class="form-control" name="cedula_usu" id="cedula_usu" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                    <p><?php echo form_error('cedula_usu'); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input value="<?php echo set_value('correo'); ?>" type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="ingrese su Correo" />
                                    <p><?php echo form_error('correo'); ?></p>                                
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <input value="<?php echo set_value('contrasenia'); ?>" type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Ingrese su contraseña mínimo 8 caracteres" />
                                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                    <p><?php echo form_error('contrasenia'); ?></p>
                                </div>


                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">telefono</label>
                                    <input value="<?php echo set_value('telefono'); ?>" type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="ingrese su numero celuular" />
                                    <p><?php echo form_error('telefono'); ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <textarea name="direccion" id="direccion" cols="30" rows="10"><?php echo set_value('direccion'); ?></textarea>
                                    <p><?php echo form_error('direccion'); ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto(opcional)</label>
                                    <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="ingrese su foto en formato png" />
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <center>
                                <br>
                                <button type="submit" class="btn btn-warning">Guardar</button>
                                <a name="" id="" class="btn btn-danger" href="<?php echo site_url("usuarios_controller/indexAdmin") ?>" role="button">Cancelar</a>


                            </center>
                        </div>

                    </form>
                <?php } else {
                    echo "no hay";
                } ?>
            </div>

        </div>
    </div>


    <!-- //para poner el ojo de ver la contraseña -->
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordField = $('#contrasenia');
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#togglePassword i').removeClass('bi-eye').addClass('bi-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    $('#togglePassword i').removeClass('bi-eye-slash').addClass('bi-eye');
                }
            });
        });
    </script>

    <script type="text/javascript">
        $("#foto").fileinput({
            language: "es"
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#direccion'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>