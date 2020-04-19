<?php
include_once '../include/events.php';
?>
<!DOCTYPE html>

<div id="bubleCalendar"></div>
<form action="" method="post">
    <?php include_once '../include/eventsFields.php';?>
    <div class="modal fade" id="crudModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <input id="event_id" name="event_id" readonly>
                    <h3 class="modal-title">Reservar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="x">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row" id="containerAlert">
                            <div class="col-md-12" id="msgAlert"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input id="branch" name="branch" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4" id="titleN">
                                <input id="studentName" name="studentName" readonly>
                            </div>
                            <div class="col-md-8" id="containerLanglvl">
                                <input id="langLvl" name="langLvl" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Tipo</p>
                            </div>
                            <div class="col-md-8">
                                <select class="custom-select" name="bookType" id="bookType" onchange="myFunction()">
                                    <option selected value="unspecified">Seleccione el tipo reserva</option>
                                    <option value="Class">Clase</option>
                                    <option value="Quiz">Quiz</option>
                                    <option value="Final">Examen final</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="containerBSubtype"></div>
                        <div class="row" id="containerUnits"></div>
                        <div class="row" id="containerTClass"></div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Fecha</p>
                            </div>
                            <div class="col-md-8">
                            <span data-toggle="tooltip" title="Los domingos no hay disponibilidad.">

                                <input id="bookDate" name="bookDate">
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Hora</p>
                            </div>
                            <div class="col-md-8">
                                <span data-toggle="tooltip" title="Horas disponibles: 06:00, 06:30, 07:30, 08:00, 09:00, 10:30, 12:00, 13:30, 15:00, 16:30, 18:00, 19:30">
                                    <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                        <input type="text" id="bookTime" name="bookTime" value="00:00">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnSave" id="btnSave" class="btn btn-primary">Reservar</button>
                    <button type="submit" name="btnDelete" id="btnDelete" class="btn btn-primary">Cancelar reserva</button>
                    <button type="submit" name="btnUpdate" id="btnUpdate" class="btn btn-primary">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $('.clockpicker').clockpicker();

    $.datepicker.regional["es"];
    $(function () {
        $('#bookDate').datepicker({
            dateFormat: "DD dd MM yy",
            //maxDate: "+1d",
            minDate: "1d",
            beforeShowDay: function (date) {
                var day = date.getDay();
                return [(day != 0), ''];
            }
        });
    });
</script>

</html>