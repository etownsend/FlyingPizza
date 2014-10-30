// formCommunication.js

// Takes in an id for a form, collects data, submits it to the corresponding
// php script, and puts the result in the corresponding div object.
function processForm(id) {
	var form = document.getElementById(id);
	var response = document.getElementById(id + "-response");
	var xmlhttp = new XMLHttpRequest();

	// Update the response area when the request comes back
	xmlhttp.onreadystatechange=function() {
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			response.innerHTML = xmlhttp.responseText;
		}
	}
	
	// Get the arguments to post
	var args = [];
	for(var i = 0; i < form.length-2; i ++) {
		args.push(form.elements[i].name + "=" + form.elements[i].value);
	}
	argString = args.join("&");
	
	// Post the request
	xmlhttp.open("POST", form.action, true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(argString);

}

// Takes in an id for a for and blanks it's corresponding response area
function resetForm(id) {
	var responseArea = document.getElementById(id+"-response");
	responseArea.innerHTML = "";
}