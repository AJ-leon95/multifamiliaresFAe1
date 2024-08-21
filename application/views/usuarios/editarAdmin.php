<br>
<script>
    $("#admin").addClass("active");
</script>
<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Editar Usuarios</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <?php if ($datosEmpresa) { ?>
                    <form action="<?php echo site_url("/usuarios_controller/actualizar") ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo set_value('id_usu', $usuario->id_usu); ?>" name="id_usu" id="id_usu" />
    <?php foreach ($datosEmpresa as $emp) { ?>
        <input type="hidden" value="<?php echo set_value('fk_usu_emp', $emp->id_emp); ?>" name="fk_usu_emp" id="fk_usu_emp" />
    <?php } ?>
    <input type="hidden" value="<?php echo set_value('perfil', $usuario->perfil); ?>" name="perfil" id="perfil" />

    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="nombres" class="form-label">Nombres</label>
                <input value="<?php echo set_value('nombres', $usuario->nombres); ?>" type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese su nombre" />
                <?php echo form_error('nombres', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input value="<?php echo set_value('apellidos', $usuario->apellidos); ?>" type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese su apellido" />
                <?php echo form_error('apellidos', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label for="cedula_usu" class="form-label">Cédula</label>
                <input value="<?php echo set_value('cedula_usu', $usuario->cedula_usu); ?>" type="text" class="form-control" name="cedula_usu" id="cedula_usu" placeholder="Ingrese su cédula" />
                <?php echo form_error('cedula_usu', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input value="<?php echo set_value('correo', $usuario->correo); ?>" type="email" class="form-control" name="correo" id="correo" placeholder="Ingrese su correo" />
                <?php echo form_error('correo', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label for="contrasenia" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input value="<?php echo set_value('contrasenia', $usuario->contrasenia); ?>" type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Ingrese su contraseña (mínimo 8 caracteres)" />
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
                <?php echo form_error('contrasenia', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-4">
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input value="<?php echo set_value('telefono', $usuario->telefono); ?>" type="text" class="form-control" name="telefono" id="telefono" placeholder="Ingrese su número celular" />
                <?php echo form_error('telefono', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <textarea name="direccion" id="direccion" class="form-control" cols="30" rows="10"><?php echo set_value('direccion', $usuario->direccion); ?></textarea>
                <?php echo form_error('direccion', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="foto" class="form-label">Foto(opcional)</label>
                <input type="file" class="form-control" name="foto" id="foto" />
                <?php echo form_error('foto', '<div class="text-danger">', '</div>'); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <center>
            <br>
            <button type="submit" class="btn btn-warning">Actualizar</button>
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
        language: "es",
        initialPreview: [
            "<img src='<?php echo base_url("/uploads/usuarios/") ?><?php echo $usuario->foto ?>' alt='Imagen Actual' height='100px'> "
        ],
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        showCaption: false,
        dropZoneEnabled: true
    });
    ClassicEditor
            .create(document.querySelector('#direccion'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        
    </script>
    