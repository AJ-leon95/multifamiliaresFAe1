<script>
    $("#menu_empresa").addClass("active");    
</script>

<br>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Editar datos de la empresa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($emp) { ?>
                    <form action="<?php echo site_url("/empresas_controller/ActualizarDatos") ?>" method="post" enctype="multipart/form-data">
                        <input hidden value="<?php echo $emp->id_emp ?>" type="text" class="form-control" name="id_emp" id="id_emp" aria-describedby="helpId" placeholder="ingrese su nombre" />
                   
                  

                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">nombre</label>
                                    <input value="<?php echo $emp->nombre ?>" type="text" class="form-control" name="nombre" id="nombres" aria-describedby="helpId" placeholder="ingrese su nombre" />
                                </div>

                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="ruc" class="form-label">ruc</label>
                                    <input value="<?php echo $emp->ruc ?>" type="text" class="form-control" name="ruc" id="apellidos" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="direccion_emp" class="form-label">Dirección</label>
                                    <input value="<?php echo $emp->direccion_emp ?>" type="text" class="form-control" name="direccion_emp" id="direccion_emp" aria-describedby="helpId" placeholder="ingrese su apellido" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">descripcion</label>
                                    <input value="<?php echo $emp->descripcion ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="ingrese su Correo" />
                                </div>

                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="facebook_emp" class="form-label">Faceboo</label>
                                    <div class="input-group">
                                        <input value="<?php echo $emp->facebook_emp ?>" type="text" class="form-control" name="facebook_emp" id="facebook_emp" aria-describedby="helpId" placeholder="Ingrese su contraseña mínimo 8 caracteres" />
                                    </div>
                                </div>


                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="correo_emp" class="form-label">correo</label>
                                    <input value="<?php echo $emp->correo_emp ?>" type="email" class="form-control" name="correo_emp" id="correo_emp" aria-describedby="helpId" placeholder="ingrese su numero celuular" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="mision" class="form-label">Misión</label>
                                    <textarea name="mision" id="mision" cols="30" rows="10"><?php echo $emp->mision ?></textarea>

                                </div>
                                <div class="mb-3">
                                    <label for="vision" class="form-label">Visión</label>
                                    <textarea name="vision" id="vision" cols="30" rows="10"><?php echo $emp->vision ?></textarea>

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="logo_emp" class="form-label">logo_emp(opcional)</label>
                                    <input type="file" class="form-control" name="logo_emp" id="logo_emp" aria-describedby="helpId" placeholder="ingrese su logo_emp en formato png" />
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <center>
                                <br>
                                <button type="submit" class="btn btn-warning">Actualizar</button>
                                <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/empresas_controller/index") ?>" role="button">Cancelar</a>


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
       $("#logo_emp").fileinput({
        language: "es",
        initialPreview: [
            "<img src='<?php echo base_url("/uploads/empresa/") ?><?php echo $emp->logo_emp ?>' alt='Imagen Actual' height='100px'> "
        ],
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        showCaption: false,
        dropZoneEnabled: true
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
                correo_emp: {
                    required: true,
                    number: true, // Asegura que el valor sea un número
                    maxlength: 10, // Mensaje de error para exceder la longitud máxima
                    minlength: 10, // Establece la longitud mínima del campo a 10 dígitos
                    correo_empInicio: true
                },

                direccion_emp: {
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
                correo_emp: {
                    required: "Por favor, ingrese su número de teléfono.",
                    number: "Por favor, ingrese solo números.", // Mensaje de error para números no válidos
                    maxlength: "El número de teléfono debe tener como máximo 10 dígitos.", // Mensaje de error para exceder la longitud máxima
                    minlength: "El número de teléfono debe tener al menos 10 dígitos." // Mensaje de error para longitud mínima no alcanzada

                },
                direccion_emp: {
                    required: 'Por favor, ingrese el número de cédula.',
                },

            }
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#mision'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#vision'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    