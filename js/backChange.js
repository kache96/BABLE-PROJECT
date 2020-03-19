var img1 = "img/Backgrounds/backBanksy/banksy.png"
var img2 = "img/Backgrounds/backBanksy/banksy1.png"
var img3 = "img/Backgrounds/backBanksy/banksy2.png"
var img4 = "img/Backgrounds/backBanksy/banksy3.png"
var img5 = "img/Backgrounds/backBanksy/banksy4.png"
var img6 = "img/Backgrounds/backBanksy/banksy5.png"
var img7 = "img/Backgrounds/backBanksy/banksy6.png"
var img8 = "img/Backgrounds/backBanksy/banksy7.png"
var img9 = "img/Backgrounds/backBanksy/banksy8.png"
var img10 = "img/Backgrounds/backBanksy/banksy9.png"
var randomize = Math.round(Math.random() * 9) + 1
if (randomize == 1) {
    newimg = img1
} else if (randomize == 2) {
    newimg = img2
} else if (randomize == 3) {
    newimg = img3
} else if (randomize == 4) {
    newimg = img4
} else if (randomize == 5) {
    newimg = img5
} else if (randomize == 6) {
    newimg = img6
} else if (randomize == 7) {
    newimg = img7
} else if (randomize == 8) {
    newimg = img8
} else if (randomize == 9) {
    newimg = img9
} else {
    newimg = img10
}
document.write('<body background="' + newimg + '">');

        