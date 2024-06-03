<br>
<?php if ($reunion) { ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Lista de reuniones creadas anteriormente</h4>
                            </div>
                            <?php $contador = 1;
                            foreach ($reunion as $registro) { ?>
                                <div class="card-body">
                                    <!-- the events -->
                                    <div id="external-events">
                                        <div class="card card-light card-outline">
                                            <div class="card-header">
                                                <h5 class="card-title">Fecha: <?php echo $registro->fecha_reu . " Hora:" . $registro->hora_reu ?></h5>
                                                <h6 href="#" class="btn btn-tool btn-block">Reunión #<?php echo $contador ?></h6>
                                                <div class="card-tools">

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    <?php echo " Asunto a tratar: ". $registro->asunto_reu ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $contador++;
                            } ?>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->



                <!-- /.col -->
                <div class="col-md-9">
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
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
<?php } else {
    echo "NO HAY REUNIONES";
} ?>

<!-- Page specific script -->
<script>
    $(function() {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
            ele.each(function() {

                // create an Event Object (https://fullcalendar.io/docs/event-object)
                // it doesn't need to have a start or end

                var eventObject = {
                    title: $.trim($(this).text()) // use the element's text as the event title
                }

                // store the Event Object in the DOM element so we can get to it later
                $(this).data('eventObject', eventObject)

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 1070,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                })

            })
        }

        ini_events($('#external-events div.external-event'))

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');

        // initialize the external events
        // -----------------------------------------------------------------

        new Draggable(containerEl, {
            itemSelector: '.external-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText,
                    backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                    textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
                };
            }
        });

        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
           
            initialDate: new Date(), // Establece la fecha de inicio como la fecha actual
            locale: 'es', // Establece el idioma en español
            themeSystem: 'bootstrap',
           
            //Random default events
            events: [

                <?php foreach ($reunion as $registro) { ?> {
                        title: '<?php echo $registro->asunto_reu ?>',
                        start: '<?php echo $registro->fecha_reu ?>', // Utiliza la fecha de inicio de la reunión proporcionada por PHP
                        backgroundColor: '#FFD733', // Rojo
                        borderColor: '#000000', // Rojo
                        allDay: true // Indica que el evento dura todo el día
                    },
                <?php } ?>


            ],
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function(info) {
                // is the "remove after drop" checkbox checked?
                if (checkbox.checked) {
                    // if so, remove the element from the "Draggable Events" list
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            }
        });

        calendar.render();
        // $('#calendar').fullCalendar()

        /* ADDING EVENTS */
        var currColor = '#000000' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function(e) {
            e.preventDefault()
            // Save color
            currColor = $(this).css('color')
            // Add color effect to button
            $('#add-new-event').css({
                'background-color': currColor,
                'border-color': currColor
            })
        })
        $('#add-new-event').click(function(e) {
            e.preventDefault()
            // Get value and make sure it is not null
            var val = $('#new-event').val()
            if (val.length == 0) {
                return
            }

            // Create events
            var event = $('<div />')
            event.css({
                'background-color': currColor,
                'border-color': currColor,
                'color': '#000000'
            }).addClass('external-event')
            event.text(val)
            $('#external-events').prepend(event)

            // Add draggable funtionality
            ini_events(event)

            // Remove event from text input
            $('#new-event').val('')
        })
    })
</script>