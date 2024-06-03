<script>
    $("#menu_vehiculo").addClass("active");
</script>
<br>
<?php if ($vehiculo) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">Lista de Vehiculos</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <i class="fas fa-plus"> <a href="<?php echo site_url("/vehiculos_controller/nuevovehiculo") ?>" style="color: white;"> Registar Vehiculo</a></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-warning table-bordered table-striped table-hover" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>foto</th>
                            <th>Placa</th>
                            <th>Marca</th>
                            <th>Año fabricación</th>
                            <th>Modelo</th>
                            <th>Status</th>
                            <th>Propietario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($vehiculo as $registro) { ?>

                            <tr>
                                <td><?php echo $registro->id_veh ?></td>
                                <td><?php if ($registro->foto != "") { ?>
                                            <img src="<?php echo base_url("/uploads/vehiculos/$registro->foto_veh") ?>" alt="" style="border-radius: 80px; width:50px; height:60px"> <!--target="_blank" esta es para descargar  -->
                                            <!-- -->
                                        <?php } else { ?>
                                            N/A
                                        <?php } ?>
                                    </td>

                                <td><?php echo $registro->placa_veh ?></td>
                                <td><?php echo $registro->marca_veh ?></td>
                                <td><?php echo $registro->anio_veh ?></td>
                                <td><?php echo $registro->modelo_veh ?></td>
                                <td><?php echo $registro->status_veh ?></td>
                                <td><?php echo $registro->nombres." ".$registro->apellidos ?></td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url("/vehiculos_controller/enviarCorreos/$registro->id_veh") ?>" title="Enviar " class="btn btn-success"><i class="fas fa-envelope bg-blue"></i></a>
                                        <a href="<?php echo site_url("/vehiculos_controller/editarVehiculo/$registro->id_veh") ?>" title="Editar " class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo site_url("/vehiculos_controller/eliminarVehiculo/$registro->id_veh") ?>" title="Eliminar " class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                                    <a href="<?php echo site_url("/vehiculos_controller/nuevovehiculo") ?>" style="color: white;">Registrar vehiculo</a>
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            Actualmente no existen vehiculos en la base de datos.
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