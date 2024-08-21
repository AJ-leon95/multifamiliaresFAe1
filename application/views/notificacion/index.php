<script>
    $("#menu_admin").addClass("active");
</script>
<br>
<?php if ($notificacion) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">Lista de notificaciones generales</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <i class="fas fa-plus"> <a href="<?php echo site_url("/notificaciones_controller/nuevoNotificacion") ?>" style="color: white;"> Nueva Notificación</a></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">

                <table class="table table-warning table-bordered table-striped table-hover" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Caracter</th>
                            <th>Mensaje</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Dirijido a</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($notificacion as $registro) {?>

                                <tr>
                                    <td><?php echo $registro->id_not ?></td>
                                    
                                    <td><?php echo $registro->caracter ?></td>
                                    <td><?php echo $registro->mensaje ?></td>
                                    <td><?php echo $registro->fecha_not ?></td>
                                    <td><?php echo $registro->hora_not ?></td>
                                    <td><?php echo $registro->nombres ." ".$registro->apellidos  ?></td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                        <a target="_blank" href="<?php echo site_url("/PdfController/notificacion/$registro->id_not") ?>" title="Imprimir notificacion" class="btn btn-success"><i class="fas fa-print"></i></i></a>
                                        <a href="<?php echo site_url("/phpMailer_controller/enviarNotificacion/$registro->id_not") ?>" title="Enviar notificacion" class="btn btn-success"><i class="fas fa-envelope bg-blue"></i></a>
                                            <a href="<?php echo site_url("/notificaciones_controller/editarNotificacion/$registro->id_not") ?>" title="Editar notificacion" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo site_url("/notificaciones_controller/eliminarNotificacion/$registro->id_not") ?>" title="Eliminar notificacion" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <br>
        </div>
    <?php } else {?>
  
  <section class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-12">

              <div class="callout callout-info">
                  <h5><i class="fas fa-info"></i> Información: </h5>
                  <div class="card-tools d-flex justify-content-end">
                      <button type="button" class="btn btn-dark" title="Collapse">
                          <a href="<?php echo site_url("/notificaciones_controller/nuevoNotificacion") ?>" style="color: white;">Nueva Notificación</a>
                          <i class="fas fa-plus"></i>
                      </button>
                  </div>

                  Actualmente no existen ninguna notificacion en la base de datos.
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