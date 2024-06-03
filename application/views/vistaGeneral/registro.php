<br>
<div class="container">
    <br>
    <div class="row">
        <div class="card">
            <center>

                <h3> Registrate con nosotros taxi seguro encomiendas y carreras</h3>
            </center>
            <div class="card-body">
                <?php if ($datosEmpresa) { ?>
                    <form action="<?php echo site_url("/vista_general/RegistrarCliente") ?>" method="post" id="frmRegistroCli" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" name="nombres" id="nombres" aria-describedby="helpId" placeholder="ingrese su nombre" />
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="apellidos" class="form-label">Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="ingrese su Correo" />
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Ingrese su contraseña mínimo 8 caracteres" />
                                        <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>


                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">telefono</label>
                                    <input type="text" class="form-control" name="telefono" id="telefono" aria-describedby="helpId" placeholder="ingrese su numero celuular" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" aria-describedby="helpId" placeholder="ingrese su direccion" />
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
   
    $("#frmRegistroCli").validate({
        rules: {
            nombres: {
                required: true,
                letras: true
            },
            apellidos: {
                required: true,
                letras: true
            },
            correo: {
                required: true,
            },
            contrasenia: {
                required: true,
            },
            telefono: {
                required: true,
                number: true, // Asegura que el valor sea un número
                maxlength: 10, // Mensaje de error para exceder la longitud máxima
                minlength: 10, // Establece la longitud mínima del campo a 10 dígitos
                telefonoInicio: true
            },

            direccion: {
                required: true,
            },

        },
        messages: {
            nombres: {
                required: 'Por favor, ingrese sus nombres.',
                letras: 'El nombre solo admite caracteres',

            },
            apellidos: {
                required: 'Por favor, ingrese sus apellidos.',
                letras: 'El apellido solo admite caracteres',
            },
            correo: {
                required: 'Por favor, ingrese su correo.',

            },
            contrasenia: {
                required: 'Por favor, ingrese el número de cédula.',
            },
            telefono: {
                required: "Por favor, ingrese su número de teléfono.",
                number: "Por favor, ingrese solo números.", // Mensaje de error para números no válidos
                maxlength: "El número de teléfono debe tener como máximo 10 dígitos.", // Mensaje de error para exceder la longitud máxima
                minlength: "El número de teléfono debe tener al menos 10 dígitos." // Mensaje de error para longitud mínima no alcanzada

            },
            direccion: {
                required: 'Por favor, ingrese el número de cédula.',
            },

        }
    });
    CKEDITOR.replace('direccion');
</script>