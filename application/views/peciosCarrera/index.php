<script>
    $("#menu_admin").addClass("active");
</script>
<br>
<?php if ($precioCarrera) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">Lista de precios</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <i class="fas fa-plus"> <a href="<?php echo site_url("/PrecioCarreras_controller/nuevo") ?>" style="color: white;"> Nueva Reunion</a></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-warning table-bordered table-striped table-hover" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Distancia minima</th>
                            <th>Distancia Maxima</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($precioCarrera as $registro) { ?>

                            <tr>
                                <td><?php echo $registro->id_precio_carrera ?></td>

                                <td><?php echo $registro->distancia_minima ?></td>
                                <td><?php echo $registro->distancia_maxima ?></td>
                                <td><?php echo $registro->precio ?></td>
                                <td><?php echo $registro->descripcion ?></td>
                                <td class="text-right py-0 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?php echo site_url("/PrecioCarreras_controller/editar/$registro->id_precio_carrera") ?>" title="Editar " class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="<?php echo site_url("/PrecioCarreras_controller/eliminar/$registro->id_precio_carrera") ?>" title="Eliminar " class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
                                    <a href="<?php echo site_url("/PrecioCarreras_controller/nuevo") ?>" style="color: white;">Nuevo precio</a>
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            Actualmente no existen ningun precio de las carreras en la base de datos.
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