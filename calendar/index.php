<?php
include_once 'include/events.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="js/jquery.min.js"></script>
    <script src="js/moment.min.js"></script>
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <script src="js/fullcalendar.min.js"></script>
    <script src="js/es.js"></script>

    <link rel="stylesheet" href="css/calendar.css">
    <script src="js/optionsCalendar.js"></script>

    <link rel="stylesheet" href="css/bootstrap-clockpicker.css">
    <script src="js/bootstrap-clockpicker.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <title>Bable | Calendar</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-7">
                <div id="bubleCalendar"></div>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#bubleCalendar').fullCalendar({
                header: {
                    left: 'today, prev, next',
                    center: 'title',
                    right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
                },
                dayClick: function (date, jsEvent, view) {
                    $("#btnSave").prop("disabled",false);
                    $("#btnDelete").prop("disabled",true);
                    $("#btnUpdate").prop("disabled",true);

                    $("#bookDate").val(date.format());
                    $('#event_id').val('');
                    $('#studentName').html('');
                    $('#studentCode').html('');
                    $('#bookType').val('Sin_especificar');
                    $('#bookSubtype	').val('Sin_especificar');
                    $('#numberClass').val('');
                    $('#numberUnit').val('');
                    $('#bookTime').val('00:00');
                    $("#crudModal").modal();

                },
                events: {
                    url: 'http://localhost/calendar/include/calendarEvents.php'
                },

                eventClick: function (calEvent, jsEvent, view) {
                    $("#btnSave").prop("disabled",true);
                    $("#btnDelete").prop("disabled",false);
                    $("#btnUpdate").prop("disabled",false);

                    $('#event_id').val(calEvent.event_id);
                    $('#studentName').html(calEvent.title);
                    $('#studentCode').html(calEvent.studentCode);
                    $('#bookType').val(calEvent.bookType);
                    $('#bookSubtype	').val(calEvent.bookSubtype);
                    $('#numberClass').val(calEvent.numberClass);
                    $('#numberUnit').val(calEvent.numberUnit);
                    $('#bookTime').val(calEvent.bookTime);

                    dateTime = calEvent.start._i.split(" ");
                    $('#bookDate').val(dateTime[0]);


                    $("#crudModal").modal();
                }

            });
        });


    </script>
    <form action="" method="post">
                    <?php include_once 'include/eventsFields.php';?>
    <div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Reservar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 id="studentName"></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 id="studentCode"></h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input id="event_id" name="event_id">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Tipo</p>
                                </div>
                                <div class="col-md-6">
                                    <select name="bookType" id="bookType">
                                        <option selected value="Sin_especificar"">Tipo reserva</option>
                                        <option value="Class" onclick="displayClase()">Clase</option>
                                        <option value="Quiz" onclick="displayQuiz()">Quiz</option>
                                        <option value="Final exam" onclick="displayQuiz()">Examen final</option>
                                    </select>

                                </div>
                            </div>
                            <div id="typeQuiz"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Subtipo</p>
                                </div>
                                <div class="col-md-6">
                                    <select name="bookSubtype" id="bookSubtype">
                                        <option selected value="Sin_especificar">Subtipo reserva</option>
                                        <option value="Tutoria">Tutoria</option>
                                        <option value="Rep-Quiz/Examen">Repeticion</option>
                                        <option value="Ninguno">Ninguno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Unidad(es)</p>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="numberUnit" id="numberUnit">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Clase #</p>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="numberClass" id="numberClass">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Fecha</p>
                                </div>
                                <div class="col-md-6">
                                    <input id="bookDate" name="bookDate" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Hora</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group clockpicker" data-placement="left" data-align="top"
                                        data-autoclose="true">
                                        <input type="text" id="bookTime" name="bookTime" value="00:00">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar
                        reserva</button>
                    <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary">Reservar</button>
                    <button type="submit" name="btnDelete" id="btnDelete" class="btn btn-primary">Eliminar</button>
                    <button type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script>
       

        $('.clockpicker').clockpicker();
        

    </script>
</body>

</html>