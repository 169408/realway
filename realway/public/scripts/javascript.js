var bar = document.getElementById("bar");
var closebar = document.getElementById("closebar");
var drop_menu = document.getElementsByClassName("drop_menu")[0];
var overlay = document.getElementById("overlay");
var drop_menu_styles = window.getComputedStyle(drop_menu);

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


/*function added() {
	var a = 1;
	var b = 2;
	return a + b;
}*/


