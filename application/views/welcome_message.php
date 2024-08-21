<!-- Main content -->
<br>
<section class="content">
	<div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-lg-3 col-6" style="height: 200px;">
				<!-- small box -->
				<div class="small-box bg-info">
					<div class="inner">

						<h3><?php if ($cantidad_vehiculos) {
								foreach ($cantidad_vehiculos as $vehiculo) {
									echo $vehiculo->cantidad_vehiculos;
								}
							} ?></h3>

						<p>Cantidad de vehículos registrados.</p>
					</div>
					<div class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16" style="height: 60px; width:80px;">
							<path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
						</svg>

					</div>
					<?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" 
                                // $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
					<a href="<?php echo site_url("/vehiculos_controller/reporteVehiculos"); ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
				<?php } ?>
				</div>
			</div>
			<div class="col-lg-3 col-6" style="height: 200px;">
				<!-- small box -->
				<div class="small-box bg-success">
					<div class="inner">
						<h3><?php if ($Cantidad_Socios) {
								foreach ($Cantidad_Socios as $socios) {
									echo $socios->cantidad;
								}
							} ?></sup></h3>

						<p>Total de socios de la cooperativa</p>
					</div>
					<div class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing" viewBox="0 0 16 16" style="height: 60px; width:80px;">
							<path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3M6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0" />
						</svg>
					</div>
					<?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" 
                                // $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
					<a href="<?php echo site_url("/usuarios_controller/index"); ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
				<?php } ?>
				</div>
			</div>
			<div class="col-lg-3 col-6" style="height: 200px;">
				<!-- small box -->
				<div class="small-box bg-warning">
					<div class="inner">
						<h3><?php if ($Cantidad_Clientes) {
								foreach ($Cantidad_Clientes as $cli) {
									echo $cli->cantidad;
								}
							} ?></h3>

						<p>Clientes registrados.</p>
					</div>
					<div class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-arms-up" viewBox="0 0 16 16" style="height: 60px; width:80px;">
							<path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
							<path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z" />
						</svg>
					</div>
					<?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" 
                                // $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
					<a href="<?php echo site_url("/usuarios_controller/indexCli"); ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
				<?php } ?>
				</div>
			</div>
			<div class="col-lg-3 col-6" style="height: 200px;">
				<!-- small box -->
				<div class="small-box bg-danger">
					<div class="inner">
						<h3><?php if ($Cantidad_Chofer) {
								foreach ($Cantidad_Chofer as $chofer) {
									echo $chofer->cantidad;
								}
							} ?></h3>

						<p>Choferes registrados.</p>
					</div>
					<div class="icon">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-raised-hand" viewBox="0 0 16 16" style="height: 60px; width:80px;">
							<path d="M6 6.207v9.043a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H6.236a1 1 0 0 1-.447-.106l-.33-.165A.83.83 0 0 1 5 2.488V.75a.75.75 0 0 0-1.5 0v2.083c0 .715.404 1.37 1.044 1.689L5.5 5c.32.32.5.754.5 1.207" />
							<path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
						</svg>
					</div>
					<?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" 
                                // $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
					<a href="<?php echo site_url("/usuarios_controller/indexAdmin"); ?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
				<?php } ?>
				</div>
			</div>
	
		</div>
		<!-- /.row -->
		<!-- Main row -->
		
		<!-- /.row (main row) -->
	</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
 <div class="row">
	
 <section class="col-lg-7 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-chart-pie mr-1"></i>
							TAXISTAS CON MAS CARRERAS
						</h3>
						
					</div><!-- /.card-header -->
					<div class="card-body">
						<div class="tab-content p-0">
							<!-- Morris chart - Sales -->
							<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
								<canvas id="revenue-chart-canvas" height="300" style="height: 300px; width: 600px;"></canvas>
							</div>
							<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
								<canvas id="sales-chart-canvas" height="300" style="height: 300px; width: 300px;"></canvas>
							</div>
						</div>
					</div><!-- /.card-body -->
				</div>
				<!-- /.card -->

				<script>
					// Datos de ejemplo
					var datos = {
						labels: [<?php if ($taxitas_masCarreras) { ?>
								<?php foreach ($taxitas_masCarreras as $contador) { ?> '<?php echo $contador->nombre_taxista." ".$contador->apellidos_taxista." Placa:".$contador->placa_veh ; ?>',
								<?php } ?>
							<?php }  ?>
						],
						datasets: [{
							label: 'Taxista con mas carreras',
							data: [<?php if ($taxitas_masCarreras) { ?>
									<?php foreach ($taxitas_masCarreras as $contador) { ?> '<?php echo $contador->total_carreras ; ?>',
									<?php } ?>
								<?php }  ?>
							], // Valores de las barras
							backgroundColor: [
								'rgba(255, 99, 132, 0.6)', // Color de la primera barra
								'rgba(54, 162, 235, 0.6)', // Color de la segunda barra
								'rgba(255, 206, 86, 0.6)' // Color de la tercera barra
							],
							borderColor: [
								'rgba(255, 99, 132, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)'
							],
							borderWidth: 1
						}]
					};

					// Opciones de configuraci�n
					var opciones = {
						scales: {
							y: {
								beginAtZero: true
							}
						}
					};

					// Obtener el contexto del lienzo
					var contexto = document.getElementById('revenue-chart-canvas').getContext('2d');

					// Crear el gr�fico de barras
					var graficoDeBarras = new Chart(contexto, {
						type: 'bar',
						data: datos,
						options: opciones
					});
				</script>

				<script>
					// Datos de ejemplo
					var datos = {
						labels: [<?php if ($taxitas_masCarrerasPorcentaje) { ?>
								<?php foreach ($taxitas_masCarrerasPorcentaje as $contador) { ?> '<?php echo $contador->nombre_ser; ?>',
								<?php } ?>
							<?php } ?>
						],
						datasets: [{
							data: [<?php if ($taxitas_masCarrerasPorcentaje) { ?>
									<?php foreach ($taxitas_masCarrerasPorcentaje as $contador) { ?> '<?php echo $contador->porcentaje_utilizado; ?>',
									<?php } ?>
								<?php } ?>
							], // Valores de las categor�as
							backgroundColor: [
								'rgba(255, 99, 132, 0.6)', // Color de la primera categor�a
								'rgba(54, 162, 235, 0.6)', // Color de la segunda categor�a
								'rgba(255, 206, 86, 0.6)' // Color de la tercera categor�a
							],
							borderColor: [
								'rgba(255, 99, 132, 1)',
								'rgba(54, 162, 235, 1)',
								'rgba(255, 206, 86, 1)'
							],
							borderWidth: 1
						}]
					};

					// Opciones de configuraci�n
					var opciones = {
						cutout: '80%', // Porcentaje de recorte del centro para formar la rosquilla
					};

					// Obtener el contexto del lienzo
					var contexto = document.getElementById('sales-chart-canvas').getContext('2d');

					// Crear el gr�fico de rosquilla
					var graficoDeRosquilla = new Chart(contexto, {
						type: 'doughnut',
						data: datos,
						options: opciones
					});
				</script>
			</section>

			<section class="col-lg-5 connectedSortable">



<!-- solid sales graph -->
<div class="card bg-gradient-info">
	<div class="card-header border-0">
		<h3 class="card-title">
			<i class="fas fa-th mr-1"></i>
			TAXISTAS CON MAS ENCOMIENDAS
		</h3>

		<div class="card-tools">
			<button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
	</div>
	<!-- /.card-body -->
	<div class="card-footer bg-transparent">
	
	</div>
	<!-- /.card-footer -->
</div>
<!-- /.card -->
<script>
	// Datos de ejemplo
	var datos = {
		labels: [<?php if ($taxitas_masEncomiendas) { ?>
				<?php foreach ($taxitas_masEncomiendas as $contador) { ?> '<?php echo $contador->nombre_taxista." ".$contador->apellidos_taxista." Placa:".$contador->placa_veh; ?>',
				<?php } ?>
			<?php }  ?>],
		datasets: [{
				label: '',
				data: [<?php if ($taxitas_masEncomiendas) { ?>
				<?php foreach ($taxitas_masEncomiendas as $contador) { ?> '<?php echo $contador->total_carreras; ?>',
				<?php } ?>
			<?php }  ?>],
				backgroundColor: 'rgba(255, 99, 132, 0.2)',
				borderColor: 'rgba(255, 99, 132, 1)',
				borderWidth: 1
			},
			{
				label: '',
				data: [5, 10, 15, 12, 25],
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgba(54, 162, 235, 1)',
				borderWidth: 1
			}
		]
	};

	// Opciones de configuraci�n
	var opciones = {
		scales: {
			x: {
				stacked: true
			},
			y: {
				stacked: true
			}
		}
	};

	// Obtener el contexto del lienzo
	var contexto = document.getElementById('line-chart').getContext('2d');

	// Crear el gr�fico de l�neas apiladas
	var graficoDeLineasApiladas = new Chart(contexto, {
		type: 'line',
		data: datos,
		options: opciones
	});
</script>

</section>
 </div>
</div>