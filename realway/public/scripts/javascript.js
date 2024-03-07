var bar = document.getElementById("bar");
var closebar = document.getElementById("closebar");
var drop_menu = document.getElementsByClassName("drop_menu")[0];
var overlay = document.getElementById("overlay");
var drop_menu_styles = window.getComputedStyle(drop_menu);

var body = document.getElementsByTagName("body")[0];

var currentUrl = window.location.href;

var callCounterShowsave = 0;
var callCounterJoker = 0;
var ccc = 0;
var temp = ccc + 1;

function openBar() {
	if(drop_menu_styles.display == "none") {
		drop_menu.style.display = "block";
		overlay.style.display = "block";
		setTimeout(function() {overlay.style.background = "rgba(0, 0, 0, 0.8)";}, 0);
		bar.style.display = "none";
		closebar.style.display = "block";
	} else if(drop_menu_styles.display == "block") {
		drop_menu.style.display = "none";
		overlay.style.background = "rgba(0, 0, 0, 0)";
		setTimeout(function() {overlay.style.display = "none";}, 800)
		closebar.style.display = "none";
		bar.style.display = "block";
	}
}

function closeOverlay() {
	if(drop_menu_styles.display == "block") {
		drop_menu.style.display = "none";
		overlay.style.background = "rgba(0, 0, 0, 0)";
		setTimeout(function() {overlay.style.display = "none";}, 800)
		closebar.style.display = "none";
		bar.style.display = "block";
	}
}

if(currentUrl.includes("realway/edituser")) {
	body.classList.add("edituser");
}

var changei = document.getElementsByClassName("fa-pencil-square-o");
var savablock = document.getElementsByClassName("safe")[0];
var divlook = document.getElementsByClassName("look");
var divset = document.getElementsByClassName("set");

var inputField = document.getElementsByClassName("field");
var ps = [];
var inputs = [];

for(var i = 0; i < inputField.length; i++) {
	if(inputField[i].tagName == "P") {
		ps.push(inputField[i]);
	}
	if(inputField[i].tagName == "INPUT") {
		inputs.push(inputField[i]);
	}
}

console.log();

function changefield(fieldNum) {
	if(window.getComputedStyle(divlook[fieldNum]).display == "block") {
		divlook[fieldNum].style.display = "none";
		divset[fieldNum].style.display = "block";
	} else if(window.getComputedStyle(divlook[fieldNum]).display == "none") {
		divset[fieldNum].style.display = "none";
		divlook[fieldNum].style.display = "block";
	}
	/*if(callCounterShowsave == 0) {
		showsave();
	}*/
	if(divset[fieldNum].style.display == "block") {
		inputs[fieldNum].value = ps[fieldNum].innerHTML;
	} else if(divset[fieldNum].style.display == "none") {
		if(callCounterJoker != 0) {
			showsave();
		}
		callCounterJoker = 0;
	}
}

function joker() {
	//showsave();
	if(callCounterJoker == 0) {
		for(var i = 0; i < divset.length; i++) {
			if(divset[i].style.display == "block") {
				console.log("temp = " + temp);
				console.log("ccc = " + ccc);
				console.log("callCounterJoker = " + callCounterJoker);
				if(temp == ccc) {
					showsave();
				}
				temp = ccc + 1;
				return;
			}
		}
	}
}

function showsave() {

	if(window.getComputedStyle(savablock).display == "none") {
		savablock.style.display = "block";
		callCounterShowsave++;
		callCounterJoker++;
	} else if(window.getComputedStyle(savablock).display == "block") {
		savablock.style.display = "none";
		callCounterShowsave--;
	}
}

for(var j = 0; j < inputs.length; j++) {
	var inputelem = inputs[j];
	console.log(inputelem.name);
	inputelem.addEventListener("input", function () {
		ccc++;
		temp = ccc;
		console.log("Зміни в інпуті з ім'ям: " + inputelem.name);
		joker();
	});
}

/*function () {
	console.log("Зміни в інпуті з ім'ям: " + inputelem.name);
}*/


function infoo() {

}



/*function added() {
	var a = 1;
	var b = 2;
	return a + b;
}*/


