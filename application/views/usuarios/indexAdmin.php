<script>
    $("#menu_admin").addClass("active");
</script>
<br>
<?php if ($dataUsu) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">Lista Administrador y Directivos</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <i class="fas fa-plus"> <a href="<?php echo site_url("/usuarios_controller/nuevoAdmin") ?>" style="color: white;"> Nuevo Administrador</a></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-warning table-bordered table-striped table-hover" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Foto</th>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($dataUsu as $registro) {
                            if ($registro->perfil == "ADMINISTRADOR"||
                            $registro->perfil=="PRESIDENTE"||
                            $registro->perfil=="SECRETARIO"||
                            $registro->perfil=="GERENTE") {
                        ?>

                                <tr>
                                    <td><?php echo $registro->id_usu ?></td>
                                    <td><?php if ($registro->foto != "") { ?>
                                            <img src="<?php echo base_url("/uploads/usuarios/$registro->foto") ?>" alt="" style="border-radius: 80px; width:50px; height:60px"> <!--target="_blank" esta es para descargar  -->
                                            <!-- <h6  style="font-size: 8px;"><?php echo $registro->foto ?></h6> -->
                                        <?php } else { ?>
                                            N/A
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $registro->cedula_usu ?></td>
                                    <td><?php echo $registro->nombres ?></td>
                                    <td><?php echo $registro->apellidos ?></td>
                                    <td><?php echo $registro->correo ?></td>
                                    <td><?php echo $registro->contrasenia ?></td>
                                    <td><?php echo $registro->telefono ?></td>
                                    <td><?php echo $registro->direccion ?></td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?php echo site_url("/usuarios_controller/editarUsuario/$registro->id_usu") ?>" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo site_url("/usuarios_controller/eliminarUsuario/$registro->id_usu") ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php } 
                        } ?>

                    </tbody>
                </table>
            </div>
            <br>
        </div>
    <?php } else {
    echo "no hay datos ";
} ?>

    <script type="text/javascript">
        $("#tbl")
            .DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }

                },
                responsive: true

            });
    </script>