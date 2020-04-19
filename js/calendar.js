$(document).ready(function() {
  $("#bubleCalendar").fullCalendar({
    header: {
      left: "prev, today, next",
      center: "title",
      right: "month, agendaDay, list"
    },
    allDaySlot: false,
    minTime: "06:00:00",
    maxTime: "19:30:60",
    eventLimit: 2,
    dayClick: function(date, jsEvent, view) {
      hideText();
      $("#btnSave").prop("hidden", false);
      $("#btnDelete").prop("hidden", true);
      $("#btnUpdate").prop("hidden", true);

      $("#bookDate").val(date.format("dddd, D MMMM, YYYY"));
      $("#event_id").val("");
      $("#studentName").html("");
      $("#langLvl").html("");
      $("#branch").html("");
      $("#bookType").val("unspecified");
      $("#bookSubtype").val("unspecified");
      $("#numberClass").val("");
      $("#numberUnit").val("");
      $("#bookTime").val("00:00");

      $("#crudModal").modal();
    },
    eventSources: [
      {
        url: "../include/calendarEvents.php",
      }
    ],
    eventClick: function(calEvent, jsEvent, view) {
      showText();
      $("#btnSave").prop("hidden", true);
      $("#btnDelete").prop("hidden", false);
      $("#btnUpdate").prop("hidden", false);
      
      $("#event_id").val(calEvent.event_id);
      $("#studentName").val(calEvent.title);
      $("#langLvl").val(calEvent.langLvl);
      $("#branch").val(calEvent.branch);
      $("#bookType").val(calEvent.bookType);
      myFunction();
      $("#bookSubtype").val(calEvent.bookSubtype);
      $("#numberClass").val(calEvent.numberClass);
      $("#numberUnit").val(calEvent.numberUnit);
      $("#bookTime").val(calEvent.bookTime);
      $("#bookDate").val(calEvent.start.format("dddd, MMMM D, YYYY"));

      $("#crudModal").modal();
    }
  });
});

function hideText() {
  document.getElementById("containerAlert").setAttribute("Style", "Visibility: hidden; Height: 0px");
  document.getElementById("msgAlert").setAttribute("Style", "Visibility: hidden");

  document.getElementById("titleN").setAttribute("Style", "Height: 0px");
  document.getElementById("studentName").setAttribute("Style", "Height: 0px");
  document.getElementById("containerLanglvl").setAttribute("Style", "Height: 0px");
  document.getElementById("langLvl").setAttribute("Style", "Height: 0px");
}
function showText() {
  document.getElementById("containerAlert").setAttribute("Style", "Visibility: hidden; Height: 0px");
  document.getElementById("msgAlert").setAttribute("Style", "Visibility: hidden");

  document.getElementById("titleN").removeAttribute("Style", "Height: 0px");
  document.getElementById("studentName").removeAttribute("Style", "Height: 0px");
  document.getElementById("containerLanglvl").removeAttribute("Style", "Height: 0px");
  document.getElementById("langLvl").removeAttribute("Style", "Height: 0px");

}

function myFunction() {
  var tClass =
    "<div class='col-md-4'><p>Subtipo</p></div><div class='col-md-8'><select class='custom-select' name='bookSubtype' id='bookSubtype'><option selected value='unspecified'>Seleccione el subtipo reserva</option><option value='tutorship'>Tutoria</option><option value='none'>Ninguno</option></select></div>";

  var tExam =
    "<div class='col-md-4'><p>Subtipo</p></div><div class='col-md-8'><select class='custom-select' name='bookSubtype' id='bookSubtype'><option selected value='unspecified'>Seleccion el subtipo reserva</option><option value='repetition'>Repeticion</option><option value='none'>Ninguno</option></select></div>";

  var units =
    "<div class='col-md-4'><p>Unidad(es)</p></div><div class='col-md-8'><input type='number' name='numberUnit' id='numberUnit' min='1' max='17' placeholder='Ingrese el numero de la unidad'></div>";

  var nClass =
    "<div class='col-md-4'><p>Clase o leccion</p></div><div class='col-md-8'><input type='text' name='numberClass' id='numberClass' placeholder='Ingrese el numero/leccion de la clase'></div>";

  var alert = "<div id='alert'><p>Te recordamos que debes ingresar tu nota final del quiz una vez lo hayas presentado. Puedes hacerlo desde tu pagina de inicio <a href='../index.php'><b>'home'. </b></a>Si tienes problemas al encontrar tu pagina de inicio, comunicate con el administrador.</p></div>";

  var bType = document.getElementById("bookType").value;
  if (bType == "Class") {
    document.getElementById("containerBSubtype").innerHTML = tClass;
    document.getElementById("containerTClass").innerHTML = nClass;
    document.getElementById("containerUnits").innerHTML = units;
  }
  if (bType == "Quiz") {
    
    document.getElementById("msgAlert").innerHTML = alert;
    document.getElementById("containerAlert").removeAttribute("Style", "Visibility: hidden; Height: 0px");
    document.getElementById("msgAlert").removeAttribute("Style", "Visibility: hidden");

    document.getElementById("containerBSubtype").innerHTML = tExam;
    document.getElementById("containerTClass").innerHTML = "";
    document.getElementById("containerUnits").innerHTML = units;
  }
  if (bType == "Final") {
    document.getElementById("msgAlert").innerHTML = alert;
    document.getElementById("containerAlert").removeAttribute("Style", "Visibility: hidden; Height: 0px");
    document.getElementById("msgAlert").removeAttribute("Style", "Visibility: hidden");


    document.getElementById("containerBSubtype").innerHTML = tExam;
    document.getElementById("containerTClass").innerHTML = "";
    document.getElementById("containerUnits").innerHTML = "";
  }
}

// INGLES
function enA1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Inglés - Nivel A1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "English A1");
  
}
function enA2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Inglés - Nivel A2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "English A2");
  
}
function enB1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Inglés - Nivel B1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "English B1");
  
}
function enB2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Inglés - Nivel B2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "English B2");
  
}
function enC1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Inglés - Nivel C1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "English C1");
  
}
//FRANCES
function frA1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Francés - Nivel A1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Francés A1");
  
}
function frA2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Francés - Nivel A2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Francés A2");
  
}
function frB1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Francés - Nivel B1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Francés B1");
  
}
function frB2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Francés - Nivel B2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Francés B2");
  
}
function frC1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Francés - Nivel C1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Francés C1");
  
}
//ITALIANO
function itA1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Italiano - Nivel A1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Italiano A1");
  
}
function itA2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Italiano - Nivel A2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Italiano A2");
  
}
function itB1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Italiano - Nivel B1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Italiano B1");
  
}
function itB2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Italiano - Nivel B2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Italiano B2");
  
}
function itC1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Italiano - Nivel C1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Italiano C1");
  
}
//ALEMAN
function alA1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Alemán - Nivel A1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Alemán A1");
  
}
function alA2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Alemán - Nivel A2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Alemán A2");
  
}
function alB1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Alemán - Nivel B1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Alemán B1");
  
}
function alB2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Alemán - Nivel B2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Alemán B2");
  
}
function alC1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Alemán - Nivel C1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Alemán C1");
  
}
//PORTUGUES
function poA1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Portugués - Nivel A1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Portugués A1");
  
}
function poA2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Portugués - Nivel A2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Portugués A2");
  
}
function poB1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Portugués - Nivel B1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Portugués B1");
  
}
function poB2() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Portugués - Nivel B2";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);

  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Portugués B2");
  
}
function poC1() {
  document.getElementById("containerInfo").setAttribute("Style", "Opacity: -0");

  document.getElementById("level").innerHTML = "Portugués - Nivel C1";
  document.getElementById("containerLevelsC").removeAttribute("hidden");

  var vbranchN = document.getElementById("branchName").textContent;
  var vbranch = document.getElementById("branch").value;
  document.getElementById("branch").setAttribute("Value", vbranchN);
  
  var vlangLvl = document.getElementById("langLvl").value;
  document.getElementById("langLvl").setAttribute("Value", "Portugués C1");
  
}