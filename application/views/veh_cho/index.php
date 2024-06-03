<script>
    $("#menu_admin").addClass("active");
</script>
<br>
<?php if ($veh_cho) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">Lista de asignacion de vehiculos con chofer</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <i class="fas fa-plus"> <a href="<?php echo site_url("/veh_cho_controller/nuevo") ?>" style="color: white;"> Asignar vehiculo con chofer</a></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-warning table-bordered table-striped table-hover" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Fecha inicio</th>
                            <th>Hora fin</th>
                            <th>Vehiculo</th>
                            <th>Propietario</th>
                            <th>Chofer</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($veh_cho as $registro) { ?>

                            <tr>
                                <td><?php echo $registro->id_veh_cho ?></td>

                                <td><?php echo $registro->fecha_inicio ?></td>
                                <td><?php echo $registro->fecha_fin ?></td>
                                <td><?php echo $registro->placa_veh ?></td>
                                <td><?php echo $registro->nombres." " .$registro->apellidos ?></td>
                                <td><?php   echo $registro->nombres_cho." ".$registro->apellidos_cho ?></td>
                                <?php if($registro->estatus_veh_cho=="ACTIVO"){ ?>
                                    <td style="color: green;"><?php echo $registro->estatus_veh_cho ?></td>
                               <?php }else{ ?>
                                <td style="color: red;"><?php echo $registro->estatus_veh_cho ?></td>
                                <?php } ?>
                            
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url("/veh_cho_controller/editar/$registro->id_veh_cho") ?>" title="Editar " class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo site_url("/veh_cho_controller/eliminar/$registro->id_veh_cho") ?>" title="Eliminar " class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                                    <a href="<?php echo site_url("/veh_cho_controller/nuevo") ?>" style="color: white;">Asignar vehiculo con chofer</a>
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            Actualmente no existen asignacion de vehiculos con chofer.
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