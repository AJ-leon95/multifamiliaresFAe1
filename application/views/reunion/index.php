<script>
    $("#menu_admin").addClass("active");
</script>
<br>
<?php if ($reuniones) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">Lista de reuniones generales</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <i class="fas fa-plus"> <a href="<?php echo site_url("/reuniones_controller/nuevoReunion") ?>" style="color: white;"> Nueva Reunion</a></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-warning table-bordered table-striped table-hover" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Lugar</th>
                            <th>Punto 1</th>
                            <th>Punto 2</th>
                            <th>Punto 3</th>
                            <th>Punto 4</th>
                            <th>Punto 5</th>
                            <th>Punto 6</th>
                            <th>Punto 7</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($reuniones as $registro) { ?>

                            <tr>
                                <td><?php echo $registro->id_reu ?></td>

                                <td><?php echo $registro->fecha_reu ?></td>
                                <td><?php echo $registro->hora_reu ?></td>
                                <td><?php echo $registro->lugar_reu ?></td>
                                <td><?php   echo $registro->punto1 ?></td>
                                <td><?php echo $registro->punto2  ?></td>
                                <td><?php echo $registro->punto3  ?></td>
                                <td><?php echo $registro->punto4  ?></td>
                                <td><?php echo $registro->punto5  ?></td>
                                <td><?php echo $registro->punto6  ?></td>
                                <td><?php echo $registro->punto7  ?></td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url("/reuniones_controller/enviarCorreos/$registro->id_reu") ?>" title="Enviar " class="btn btn-success"><i class="fas fa-p "></i></a>
                                        <a href="<?php echo site_url("/reuniones_controller/enviarCorreos/$registro->id_reu") ?>" title="Enviar " class="btn btn-success"><i class="fas fa-envelope bg-blue"></i></a>
                                        <a href="<?php echo site_url("/reuniones_controller/editarReunion/$registro->id_reu") ?>" title="Editar " class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo site_url("/reuniones_controller/eliminarReunion/$registro->id_reu") ?>" title="Eliminar " class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <br>
        </div>
    <?php } else { ?>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Información: </h5>
                            <div class="card-tools d-flex justify-content-end">
                                <button type="button" class="btn btn-dark" title="Collapse">
                                    <a href="<?php echo site_url("/reuniones_controller/nuevoReunion") ?>" style="color: white;">Nueva Reunion</a>
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            Actualmente no existen reuniones en la base de datos.
                        </div>


                        <!-- Main content -->

                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    <?php } ?>

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