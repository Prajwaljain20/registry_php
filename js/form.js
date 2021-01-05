function validate(){
	var name=document.getElementById("nam").value;
	var reg=/^[\w._%+-]+@[\w.-]+\.[a-zA-Z]{2,4}$/;
	if(reg.test(name)){
		document.getElementById("hell").innerHTML="&nbsp;";	
	}
	else{
		document.getElementById("hell").style.color="red";
		document.getElementById("hell").innerHTML="&nbsp;<strong> '@' missing</strong>";
		
	}
}