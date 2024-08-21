<div class="container">
    <div class="row">
        <!-- general form elements disabled -->
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nuevo Precio</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <br>
                <form action="<?php echo site_url("/PrecioCarreras_controller/guardar") ?>" method="post">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="distancia_minima" class="form-label">Distancia Mínima</label>
                                <input value="<?php echo set_value('distancia_minima'); ?>" step="0.001" min="0" type="number" class="form-control" name="distancia_minima" id="distancia_minima" aria-describedby="helpId" placeholder="" />
                                <p><?php echo form_error('distancia_minima'); ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="distancia_maxima" class="form-label">Distancia Máxima</label>
                                <input value="<?php echo set_value('distancia_maxima'); ?>" step="0.001" min="0" type="number" class="form-control" name="distancia_maxima" id="distancia_maxima" aria-describedby="helpId" placeholder="" />
                                <p><?php echo form_error('distancia_maxima'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio</label>
                                <input value="<?php echo set_value('precio'); ?>" step="0.01" min="0" type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="" />
                                <p><?php echo form_error('precio'); ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <center>
                        <br>
                        <button type="submit" class="btn btn-warning">Guardar</button>
                        <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/PrecioCarreras_controller/index") ?>" role="button">Cancelar</a>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function replaceCommaWithDot(e) {
        let value = e.target.value;
        if (value.includes(',')) {
            e.target.value = value.replace(',', '.');
        }
    }

    // Reemplazar comas por puntos en el campo de distancia mínima
    document.getElementById('distancia_minima').addEventListener('input', replaceCommaWithDot);

    // Reemplazar comas por puntos en el campo de distancia máxima
    document.getElementById('distancia_maxima').addEventListener('input', replaceCommaWithDot);

    // Reemplazar comas por puntos en el campo de precio
    document.getElementById('precio').addEventListener('input', replaceCommaWithDot);
});
</script>
