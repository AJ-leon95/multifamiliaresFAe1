<script>
    $("#menu_clientes").addClass("active");
</script>
<br>
<?php if ($dataUsu) { ?>
    <div class="container">
        <div class="card card-warning">
            <div class="card-header">
                <center>

                    <h3 class="card-title">LISTA DE CLIENTES</h3>
                </center>

                <div class="card-tools">
                    <button type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <svg style="width:20px ;height:20px ;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64" />
                        </svg><a href="<?php echo site_url("/ExcelController/generateExcelClientes") ?>" style="color: white;">Lista Clientes excel</a></i>
                    </button>
                    <button  type="button" class="btn btn-dark" title="Collapse"> <!-- data-card-widget="collapse" -->
                        <svg style="width:20px ;height:20px ;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
                            <path d="M5.523 10.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 4.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                            <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.6 11.6 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                        </svg><a target="_blank" href="<?php echo site_url("/PdfController/pdfClienteGeneral") ?>" style="color: white;">Lista Clientes pdf</a></i>
                    </button>

                    
                </div>
            </div>
            <div class="card-body p-0">

                <table  class="table table-warning table-bordered table-striped table-hover table table-striped table-bordered" style="width:100%" id="tbl">
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="table-warning">
                        <?php foreach ($dataUsu as $registro) {
                            if (
                                $registro->perfil == "CLIENTE"
                            ) {
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
                                    <td><?php echo $registro->nombres ?></td>
                                    <td><?php echo $registro->apellidos ?></td>
                                    <td><?php echo $registro->correo ?></td>
                                    <td><?php echo $registro->telefono ?></td>
                                    <td><?php echo $registro->direccion ?></td>
                                    <td class="text-right py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?php echo site_url("/usuarios_controller/eliminarCli/$registro->id_usu") ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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