var levels = "<li onclick='levelA1Content'><p id='level'>Nivel A1</p></li><li onclick='levelA2Content'><p id='level'>Nivel A2</p></li><li onclick='levelB1Content'><p id='level'>Nivel B1</p></li><li onclick='levelB2Content'><p id='level'>Nivel B2</p></li><li onclick='levelC1Content'><p id='level'>Nivel C1</p></li>";
var levelsP = "";

function dropLevelMenu(){
    document.getElementById('langMenu').innerHTML = levels;
}
function hideLevelMenu(){
    document.getElementById('langMenu').innerHTML = levelsP;

}
function dropLevelMenu1(){
    document.getElementById('langMenu1').innerHTML = levels;
}
function hideLevelMenu1(){
    document.getElementById('langMenu1').innerHTML = levelsP;

}
function dropLevelMenu2(){
    document.getElementById('langMenu2').innerHTML = levels;
}
function hideLevelMenu2(){
    document.getElementById('langMenu2').innerHTML = levelsP;

}
function dropLevelMenu3(){
    document.getElementById('langMenu3').innerHTML = levels;
}
function hideLevelMenu3(){
    document.getElementById('langMenu3').innerHTML = levelsP;
}
function dropLevelMenu4(){
    document.getElementById('langMenu4').innerHTML = levels;
}
function hideLevelMenu4(){
    document.getElementById('langMenu4').innerHTML = levelsP;

}