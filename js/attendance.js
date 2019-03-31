
/*$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
	
});*/

function openNav(){
	document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	document.getElementById("sidebar-wrapper").style.width = "250px";
	//document.getElementById("page-content-wrapper").style.marginLeft = "400";
}

function closeNav() {
	document.getElementById("sidebar-wrapper").style.width = "0";
	document.getElementById("page-content-wrapper").style.marginLeft= "0";
	document.body.style.backgroundColor = "white";
}

function saveEvent(){
	var r = confirm("Press a button");
	if (r == true) {
		x = "You pressed OK!";
	} else {
		x = "You pressed Cancel!";
	}
	alert(x);}

