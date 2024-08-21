<div class="container">
    <br>
    <div class="row">
        <div class="card">
            <center>
                <h3>Registrate con nosotros taxi seguro encomiendas y carreras</h3>
            </center>
            <div class="card-body">
                <?php if ($datosEmpresa) { ?>
                    <form action="<?php echo site_url("/phpMailer_controller/RegistrarCliente") ?>" method="post" id="frmRegistroCli" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6">
                                <?php foreach ($datosEmpresa as $emp) { ?>
                                    <div class="mb-3">
                                        <input hidden value="<?php echo $emp->id_emp ?>" type="text" class="form-control" name="fk_usu_emp" id="fk_usu_emp" aria-describedby="helpId" placeholder="" />
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-6"></div>
                        </div>
                        <div class="mb-3">
                            <input hidden value="CLIENTE" type="text" class="form-control" name="perfil" id="perfil" aria-describedby="helpId" placeholder="" />
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input value="<?php echo set_value('nombres'); ?>" type="text" class="form-control" name="nombres" id="nombres" aria-describedby="helpId" placeholder="ingrese su nombre" />
                                    <?php echo form_error('nombres'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input value="<?php echo set_value('apellidos'); ?>" type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                    <?php echo form_error('apellidos'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input value="<?php echo set_value('correo'); ?>" type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="ingrese su Correo" />
                                    <?php echo form_error('correo'); ?>
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
                                        <?php echo form_error('contrasenia'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input value="<?php echo set_value('telefono'); ?>" type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="ingrese su número celular" />
                                    <?php echo form_error('telefono'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input value="<?php echo set_value('direccion'); ?>" type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="ingrese su direccion" />
                                    <?php echo form_error('direccion'); ?>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto (opcional)</label>
                                    <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="ingrese su foto en formato png" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <center>
                                <br>
                                <button type="submit" class="btn btn-warning">Registrarse</button>
                            </center>
                        </div>
                    </form>
                <?php } else {
                    echo "no hay";
                } ?>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar mensaje de éxito y redireccionar -->
<script>
    // Verificar si hay un mensaje flash de éxito
    <?php if ($this->session->flashdata('correcto')): ?>
        // Mostrar el mensaje flash en un cuadro de alerta
        alert("<?php echo $this->session->flashdata('correcto'); ?>");
        // Redireccionar a la página de inicio de sesión después de cerrar el cuadro de alerta
        window.location.href = "<?php echo site_url('vista_general/login'); ?>";
    <?php endif; ?>
</script>

<!-- Para poner el ojo de ver la contraseña -->
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
