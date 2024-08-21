<script>
    $("#menu_empresa").addClass("active");
</script>
<br>
<?php foreach ($emp as $registro) { ?>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?php echo $registro->nombre ?></h3>
                        <div class="col-12">
                            <img src="<?php echo base_url("/uploads/empresa/$registro->logo_emp") ?>" class="product-image" alt="Logo de la Empresa">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">
                            <center><?php echo $registro->nombre ?></center>
                        </h3>
                        <p><?php echo $registro->descripcion ?></p>

                        <hr>

                        <div class="row">
                            <div class="col-12">
                                <h4>RUC</h4>
                                <p><?php echo $registro->ruc ?></p>

                                <h4>Dirección</h4>
                                <p><?php echo $registro->direccion_emp ?></p>

                                <div class="row mt-4">
                                    <nav class="w-100">
                                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Misión</a>
                                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Visión</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content p-3" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $registro->mision ?></div>
                                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><?php echo $registro->vision ?></div>
                                    </div>
                                </div>

                                <?php if (
                                    $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                    $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                    $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                    $this->session->userdata("conectado")->perfil == "GERENTE"
                                ) { ?>
                                    <div class="d-flex justify-content-center mt-5 mb-3">
                                        <div class="mx-2">
                                            <a href="<?php echo site_url("/empresas_controller/editarEmp/$registro->id_emp") ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Editar datos de la empresa</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="<?php echo $registro->facebook_emp ?>" class="text-gray" target="_blank">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>

                            <a href="mailto:<?php echo $registro->correo_emp ?>" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
