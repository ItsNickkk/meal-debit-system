document.write("\
	<div style=\"width:100%; height: 20px; margin:0px;\" class=\"animated fadeIn\"><span style=\"float: right; top: 5px; right: 5px; position: absolute;\"><button id=\"close-btn\" ></button></span>\
	<span style=\"float: right; top: 5px; right: 30px; position: absolute;\"><button id=\"max-btn\" ></button></span>\
	<span style=\"float: right; top: 5px; right: 50px; position: absolute;\"><button id=\"min-btn\" ></button></span>\
	<span style=\"float: right; top: 5px; right: 95px; position: absolute; width: 100%; -webkit-app-region: drag;\">q</span></div>\
	");

const remote = require('electron').remote;

document.getElementById("min-btn").addEventListener("click", function (e) {
	var window = remote.getCurrentWindow();
	window.minimize(); 
	});

document.getElementById("max-btn").addEventListener("click", function (e) {
	var window = remote.getCurrentWindow();
	if (!window.isMaximized()) {
		window.maximize();          
	} else {
		window.unmaximize();
	}
});

document.getElementById("close-btn").addEventListener("click", function (e) {
    var window = remote.getCurrentWindow();
    window.close();
});