<script>
    $("#menu_chofer").addClass("active");
</script>
<br>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nuevo Chofer</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form action="<?php echo site_url("/choferes_controller/guardarChofer") ?>" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="nombres_cho" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombres_cho" id="nombres_cho" aria-describedby="helpId" placeholder="ingrese su nombre" />
                                <p style="color: red;"><?php echo form_error('nombres_cho') ?></p>

                            </div>

                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="apellidos_cho" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos_cho" id="apellidos_cho" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                <p style="color: red;"><?php echo form_error('apellidos_cho') ?></p>

                            </div>
                        </div>

                        <div class="col-4">
                            <div class="mb-3">
                                <label for="cedula_cho" class="form-label">Cedula</label>
                                <input type="number" class="form-control" name="cedula_cho" id="cedula_cho" aria-describedby="helpId" placeholder="ingrese su cedula" />
                                <p style="color: red;"><?php echo form_error('cedula_cho') ?></p>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="correo_cho" class="form-label">Correo</label>
                                <input type="email" class="form-control" name="correo_cho" id="correo_cho" aria-describedby="helpId" placeholder="ingrese su correo" />
                                <p style="color: red;"><?php echo form_error('correo_cho') ?></p>

                            </div>

                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="contrasenia_cho" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" name="contrasenia_cho" id="contrasenia_cho" aria-describedby="helpId" placeholder="Ingrese su contraseña mínimo 8 caracteres" />
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <p style="color: red;"><?php echo form_error('contrasenia_cho') ?></p>

                                </div>
                            </div>


                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <label for="telefono_cho" class="form-label">telefono</label>
                                <input type="text" class="form-control" name="telefono_cho" id="telefono_cho" aria-describedby="helpId" placeholder="ingrese su numero celuular" />
                                <p style="color: red;"><?php echo form_error('telefono_cho') ?></p>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="direccion_cho" class="form-label">Dirección</label>
                                <textarea name="direccion_cho" id="direccion_cho" cols="30" rows="10"></textarea>
                                <p style="color: red;"><?php echo form_error('direccion_cho') ?></p>

                            </div>
                            <div class="mb-3">
                                <label for="experiencia_cho" class="form-label">Experiencia</label>
                                <textarea name="experiencia_cho" id="experiencia_cho" cols="30" rows="10"></textarea>
                                <p style="color: red;"><?php echo form_error('experiencia_cho') ?></p>

                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="estado_cho" class="form-label">Estado</label>
                                    <select class="form-select form-select" name="estado_cho" id="estado_cho">
                                        <option disabled selected>Seleccione una</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>

                                    </select>
                                    <p style="color: red;"><?php echo form_error('estado_cho') ?></p>

                                </div>


                            </div>
                        
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="foto_cho" class="form-label">foto (opcional)</label>
                                <input type="file" class="form-control" name="foto_cho" id="foto_cho" aria-describedby="helpId" placeholder="ingrese su foto_cho en formato png" />
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Guardar</button>
                            <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/choferes_controller/index") ?>" role="button">Cancelar</a>


                        </center>
                    </div>

                </form>

            </div>

        </div>
    </div>


    <!-- //para poner el ojo de ver la contraseña -->
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordField = $('#contrasenia_cho');
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
        $("#foto_cho").fileinput({
            language: "es"
        });

        $("#frmRegistroCli").validate({
            rules: {
                nombres_cho: {
                    required: true,
                    letras: true
                },
                apellidos_cho: {
                    required: true,
                    letras: true
                },
                correo_cho: {
                    required: true,
                },
                contrasenia_cho: {
                    required: true,
                },
                telefono_cho: {
                    required: true,
                    number: true, // Asegura que el valor sea un número
                    maxlength: 10, // Mensaje de error para exceder la longitud máxima
                    minlength: 10, // Establece la longitud mínima del campo a 10 dígitos
                    telefono_choInicio: true
                },

                direccion_cho: {
                    required: true,
                },

            },
            messages: {
                nombres_cho: {
                    required: 'Por favor, ingrese sus nombres_cho.',
                    letras: 'El nombre solo admite caracteres',

                },
                apellidos_cho: {
                    required: 'Por favor, ingrese sus apellidos_cho.',
                    letras: 'El apellido solo admite caracteres',
                },
                correo_cho: {
                    required: 'Por favor, ingrese su correo_cho.',

                },
                contrasenia_cho: {
                    required: 'Por favor, ingrese el número de cédula.',
                },
                telefono_cho: {
                    required: "Por favor, ingrese su número de teléfono.",
                    number: "Por favor, ingrese solo números.", // Mensaje de error para números no válidos
                    maxlength: "El número de teléfono debe tener como máximo 10 dígitos.", // Mensaje de error para exceder la longitud máxima
                    minlength: "El número de teléfono debe tener al menos 10 dígitos." // Mensaje de error para longitud mínima no alcanzada

                },
                direccion_cho: {
                    required: 'Por favor, ingrese el número de cédula.',
                },

            }
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#direccion_cho'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#experiencia_cho'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>