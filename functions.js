function validateForm(){
	var x = document.forms["register"];
	var i;
	var count=0;
	var a = document.forms["register"]["email"].value;
	var b = document.forms["register"]["confirmpassword"].value;
	for(i=0; i<x.length; i++){
		if(x.elements[i].value == "" || x.elements[i].value==null){
			count++;
		}
	}
	if(a != ""||a != null||a != undefined){
		a = !validateEmail();
	}
	if(b != ""||b != null||b != undefined){
		b = !confirmPassword();
	}
	if(count+a+b==0){
		document.getElementById("submit").disabled = false;
		return true;
	}
	else{
		document.getElementById("submit").disabled = true;
		return false;
	}
}