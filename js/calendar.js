
        $(document).ready(function () {
            $('#bubleCalendar').fullCalendar({
                header: {
                    left: 'prev, today, next',
                    center: 'title',
                    right: 'month, agendaDay, list'
                },
                minTime: '06:00:00',
                maxTime: '19:30:60',
                eventLimit: 2,
                /*validRange: function(nowDate) {
                    return {
                        start: nowDate.clone().add(-1, 'day'),
                        end: nowDate.clone().add(1, 'week')
                    };
                },
                */
                dayClick: function (date, jsEvent, view) {
                    $("#btnSave").prop("hidden", false);
                    $("#btnDelete").prop("hidden", true);
                    $("#btnUpdate").prop("hidden", true);
                    $('#event_id').prop("hidden", true);

                    $("#bookDate").val(date.format('dddd, D MMMM, YYYY'));
                    $('#event_id').val('');
                    $('#studentName').html('');
                    $('#langLvl').html('');
                    $('#bookType').val('unspecified');
                    $('#bookSubtype').val('unspecified');
                    $('#numberClass').val('');
                    $('#numberUnit').val('');
                    $('#bookTime').val('00:00');
                    $("#crudModal").modal();

                },
                events: {
                    url: '../include/calendarEvents.php',
                    extraParams: function() {
                      return {
                        cachebuster: new Date().valueOf()
                      };
                    }
                  },
                eventClick: function (calEvent, jsEvent, view) {
                    $("#btnSave").prop("hidden", true);
                    $("#btnDelete").prop("hidden", false);
                    $("#btnUpdate").prop("hidden", false);
                    $('#event_id').prop("hidden", false);

                    $('#event_id').val(calEvent.event_id);
                    $('#studentName').html(calEvent.title);
                    $('#langLvl').html(calEvent.langLvl);
                    $('#bookType').val(calEvent.bookType);
                    myFunction()
                    $('#bookSubtype').val(calEvent.bookSubtype);
                    $('#numberClass').val(calEvent.numberClass);
                    $('#numberUnit').val(calEvent.numberUnit);
                    $('#bookTime').val(calEvent.bookTime);
                    $('#bookDate').val(calEvent.start.format('dddd, MMMM D, YYYY'));

                    $("#crudModal").modal();
                }

            });
        });
        
        function myFunction() {
            var tClass = "<div class='col-md-5'><p>Subtipo</p></div><div class='col-md-7'><select class='custom-select' name='bookSubtype' id='bookSubtype'><option selected value='unspecified'>Subtipo reserva</option><option value='tutorship'>Tutoria</option><option value='none'>Ninguno</option></select></div>";

            var tExam = "<div class='col-md-5'><p>Subtipo</p></div><div class='col-md-7'><select class='custom-select' name='bookSubtype' id='bookSubtype'><option selected value='unspecified'>Subtipo reserva</option><option value='repetition'>Repeticion</option><option value='none'>Ninguno</option></select></div>";

            var units = "<div class='col-md-5'><p>Unidad(es)</p></div><div class='col-md-7'><input type='number' name='numberUnit' id='numberUnit' min='1' max='17'></div>";

            var nClass = "<div class='col-md-5'><p>Clase o leccion</p></div><div class='col-md-7'><input type='text' name='numberClass' id='numberClass'></div>";

            var bType = document.getElementById("bookType").value;
            if(bType == "Class"){
                document.getElementById("containerBSubtype").innerHTML = tClass;
                document.getElementById("containerTClass").innerHTML = nClass;
                document.getElementById("containerUnits").innerHTML = units;
            };
            if(bType == "Quiz"){
                document.getElementById("containerBSubtype").innerHTML = tExam;
                document.getElementById("containerTClass").innerHTML = "";
                document.getElementById("containerUnits").innerHTML = units;
                alert ("Te recordamos que debes ingresar tu nota final del quiz una vez lo hayas presentado. Puedes hacerlo desde tu pagina de inicio 'home'. Si tienes problemas al encontrar tu pagina de inicio, comunicate con el administrador.");
            };
            if(bType == "Final"){
                document.getElementById("containerBSubtype").innerHTML = tExam;
                document.getElementById("containerTClass").innerHTML = "";
                document.getElementById("containerUnits").innerHTML = "";
                alert ("Te recordamos que debes ingresar tu nota final del examen final una vez lo hayas presentado. Puedes hacerlo desde tu pagina de inicio 'home'. Si tienes problemas al encontrar tu pagina de inicio, comunicate con el administrador.");
            };
        }