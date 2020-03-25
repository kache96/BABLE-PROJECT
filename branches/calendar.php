<?php
include_once '../include/events.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrapp.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>

    <link rel="stylesheet" href="../css/calendar.css">
    <script src="../js/calendar.js"></script>

    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/jquery-ui.structure.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.css">
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/datepicker-es.js"></script>

    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">
    <script src="../js/bootstrap-clockpicker.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="../js/bootstrapp.min.js"></script>

    <title>Bable | Calendar</title>
</head>

<body>
    
    <div id="bubleCalendar"></div>     
    <form action="" method="post">
        <?php include_once '../include/eventsFields.php';?>
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
                                <div class="col-md-5">
                                    <p>Tipo</p>
                                </div>
                                <div class="col-md-7">
                                    <select name="bookType" id="bookType" onchange="myFunction()">
                                        <option selected value="unspecified">Tipo reserva</option>
                                        <option value="Class">Clase</option>
                                        <option value="Quiz">Quiz</option>
                                        <option value="Final">Examen final</option>
                                    </select>

                                </div>
                            </div>
                            <div class="row" id="containerBSubtype">
                                
                            </div>
                            <div class="row" id="containerUnits">
                                
                            </div>
                            <div class="row" id="containerTClass">
                                
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Fecha</p>
                                </div>
                                <div class="col-md-7">
                                    <input id="bookDate" name="bookDate">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Hora</p>
                                </div>
                                <div class="col-md-7">
                                    <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                    <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                        <input type="text" id="bookTime" name="bookTime" value="00:00">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                        <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary">Reservar</button>
                        <button type="submit" name="btnDelete" id="btnDelete" class="btn btn-primary">Cancelar reserva</button>
                        <button type="submit" name="btnUpdate" id="btnUpdate"
                            class="btn btn-primary">Guardar cambios</button>
                           
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
    $('.clockpicker').clockpicker();
    
    $.datepicker.regional[ "es" ];
    $( function() {
        $('#bookDate').datepicker({ 
            dateFormat: "DD dd MM yy",
            //maxDate: "+1d",
            minDate: "1d",
            beforeShowDay: function(date) {
                var day = date.getDay();
                return [(day != 0), ''];
            }
        });
    });
    </script>
</body>

</html>