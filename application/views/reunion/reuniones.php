<br>
<script>
    $("#horarioReuniones").addClass("active");
</script>
<?php if ($reunion) { ?>
    <section class="content">
        <div class="container-fluid">
            <center>
                <h1>HORARIO DE REUNIONES</h1>
            </center>
            <div class="row">

                <!-- /.card-body -->



                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div><!-- /.container-fluid -->
    </section>
<?php } else { ?>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->

                        <!-- /.timeline-label -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline item -->

                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-comments bg-yellow"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> <?php echo date('H:i:s')  ?></span>
                                <h3 class="timeline-header"> Reuniones </h3>
                                <div class="timeline-body">
                                    Buenas estiamdo soci@ <?php $usuario = $this->session->userdata("conectado")->nombres;
                                                            echo $usuario;
                                                            ?> por el momento no hay ninguna reunion agendada.
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
<?php } ?>
<script>
    $(document).ready(function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            locale: 'es',
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Día',
                prev: 'Anterior',
                next: 'Siguiente'
            },
            initialView: 'dayGridMonth',
            titleFormat: {
                year: 'numeric',
                month: 'long'
            },
            editable: true,
            firstDay: 1,
            selectable: true,
            allDaySlot: false,
            events: function(fetchInfo, successCallback, failureCallback) {
                $.ajax({
                    url: '<?php echo site_url("/reuniones_controller/obtenerEventosModales") ?>', // URL del método en el controlador
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var events = [];
                        $.each(data, function(i, registro) {
                            events.push({
                                title: registro.lugar_reu,
                                start: registro.fecha_reu,
                                allDay: true,
                                backgroundColor: '#FFD733',
                                borderColor: '#000000',
                                extendedProps: {
                                    hora: registro.hora_reu,
                                    asunto: registro.asunto_reu,
                                    punto1: registro.punto1,
                                    punto2: registro.punto2,
                                    punto3: registro.punto3,
                                    punto4: registro.punto4,
                                    punto5: registro.punto5,
                                    punto6: registro.punto6,
                                    punto7: registro.punto7,
                                }
                            });
                        });
                        successCallback(events);
                    },
                    error: function() {
                        failureCallback('Error al cargar los eventos.');
                    }
                });
            },
            eventClick: function(info) {
                // Mostrar los detalles del evento en una ventana modal
                $('#eventPlace').text(info.event.title);
                $('#eventDescription').text(info.event.extendedProps.hora);
                $('#asunto').text(info.event.extendedProps.asunto);
                $('#punto1').text(info.event.extendedProps.punto1);
                $('#punto2').text(info.event.extendedProps.punto2);
                $('#punto3').text(info.event.extendedProps.punto3);
                $('#punto4').text(info.event.extendedProps.punto4);
                $('#punto5').text(info.event.extendedProps.punto5);
                $('#punto6').text(info.event.extendedProps.punto6);
                $('#punto7').text(info.event.extendedProps.punto7);

                var myModal = new bootstrap.Modal(document.getElementById('eventDetailsModal'));
                myModal.show();
            }
        });

        calendar.render();
    });
</script>

<!-- Modal -->
<div class="modal fade" id="eventDetailsModal" tabindex="-1" aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #FFD733; color: #000000;">
                <h5 class="modal-title" id="eventDetailsModalLabel">Detalles del Evento</h5>
            </div>
            <div class="modal-body">
                <p><strong>Lugar:</strong> <span id="eventPlace"></span></p>
                <p><strong>Hora:</strong> <span id="eventDescription"></span></p>
                <p><strong>Asunto:</strong> <span id="asunto"></span></p>
                <p><strong>Punto 1:</strong> <span id="punto1"></span></p>
                <p><strong>Punto 2:</strong> <span id="punto2"></span></p>
                <p><strong>Punto 3:</strong> <span id="punto3"></span></p>
                <p><strong>Punto 4:</strong> <span id="punto4"></span></p>
                <p><strong>Punto 5:</strong> <span id="punto5"></span></p>
                <p><strong>Punto 6:</strong> <span id="punto6"></span></p>
                <p><strong>Punto 7:</strong> <span id="punto7"></span></p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- Estilos adicionales para el modal -->
<style>
    .modal-content {
        border-radius: 8px;
    }

    .modal-header {
        border-bottom: 1px solid #ddd;
    }

    .modal-body p {
        margin-bottom: 10px;
        font-size: 1.1em;
    }

    .modal-footer {
        border-top: 1px solid #ddd;
    }

    .btn-close {
        filter: invert(1);
    }

    .fc-toolbar-title {
        text-transform: uppercase;
        /* Transforma el texto a mayúsculas */
    }
</style>