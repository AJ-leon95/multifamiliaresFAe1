<style>
    /* Ajuste de tamaño para el calendario */
    #calendar {
        max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        font-size: 1.2em;
        /* Aumenta el tamaño de la fuente */
    }

    .fc-toolbar {
        margin-bottom: 20px;
    }

    .fc-button {
        background-color: #FFD733;
        border-color: #FFD733;
        color: #000000;
    }

    .fc-button:hover {
        background-color: #E6C229;
        border-color: #E6C229;
        color: #000000;
    }
    
    .fc-toolbar-title {
        text-transform: uppercase;
        /* Transforma el texto a mayúsculas */
    }
</style>


<script>
    $("#horarioDeporte").addClass("active");
</script>

<br>

<?php if ($deporte) { ?>
    <div class="container-fluid">
        <center>
            <h1>HORARIO DE DEPORTES</h1>
        </center>
        <section class="card">
        <div class="row">
            <div class="col-12">
                <div id="calendar"></div>
            </div>
        </div>
    </section>
    </div>
<?php } else { ?>
    <!-- Main content -->
   
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="timeline">
                        <div>
                            <i class="fas fa-comments bg-yellow"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> <?php echo date('H:i:s'); ?></span>
                                <h3 class="timeline-header">Deportes</h3>
                                <div class="timeline-body">
                                    Buenas estimado/a soci@ <?php echo $this->session->userdata("conectado")->nombres; ?>, por el momento no hay ningún evento deportivo agendado.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                    url: '<?php echo site_url("/deportes_controller/obtenerEventos") ?>', // URL del método en el controlador
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var events = [];
                        $.each(data, function(i, registro) {
                            events.push({
                                title: registro.lugar_dep,
                                start: registro.fecha_dep,
                                allDay: true,
                                backgroundColor: '#FFD733',
                                borderColor: '#000000',
                                extendedProps: {
                                    hora: registro.hora_dep
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
</style>