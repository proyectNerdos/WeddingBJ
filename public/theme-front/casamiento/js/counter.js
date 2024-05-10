// CONTADOR PARA CASAMIENTO CUENTA REGRESIVA

var now = new Date();
var current_year = now.getFullYear();
var next_year = current_year + 1;

var target_date = new Date("June 1, 2024 17:00:00").getTime();

var days, hours, minutes, seconds;

var $days = document.getElementById("d");
var $hours = document.getElementById("h");
var $minutes = document.getElementById("m");
var $seconds = document.getElementById("s");

function update() {
    var current_date = new Date().getTime();
    var seconds_left = (target_date - current_date) / 1000;

    var days = parseInt(seconds_left / 86400);
    seconds_left = seconds_left % 86400;

    var hours = parseInt(seconds_left / 3600);
    seconds_left = seconds_left % 3600;

    var minutes = parseInt(seconds_left / 60);
    var seconds = parseInt(seconds_left % 60);

    document.getElementById("d").innerText = pad(days, 2);
    document.getElementById("h").innerText = pad(hours, 2);
    document.getElementById("m").innerText = pad(minutes, 2);
    document.getElementById("s").innerText = pad(seconds, 2);
}

update();

setInterval(update, 1000);

function pad(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
}
