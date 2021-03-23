function validationFirstName(){
	var name= document.getElementById("first_name").value;
	var text= document.getElementById("msg_first_name");
	var pattern = /^[A-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

	if(name.match(pattern)){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>First Name is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>First Name is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}
function validationLastName(){
	var name= document.getElementById("last_name").value;
	var text= document.getElementById("msg_last_name");
	var pattern = /^[A-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

	if(name.match(pattern)){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Last Name is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Last Name is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}

function validationEmail(){
	var name= document.getElementById("email").value;
	var text= document.getElementById("msg_email");
	var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

	if(name.match(pattern)){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Email is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Email is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}
function validationSalary(){
	var name= document.getElementById("salary").value;
	var text= document.getElementById("msg_salary");
	var pattern = /^[0-9]+$/;

	if(name.match(pattern)){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Salary is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Salary is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}

function validationLocation(){
	var name= document.getElementById("location").value;
	var text= document.getElementById("msg_location");
	var pattern = /^([a-zA-Z0-9]+|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{1,}|[a-zA-Z0-9]+\s{1}[a-zA-Z0-9]{3,}\s{1}[a-zA-Z0-9]{1,})$/;

	if(name.match(pattern)){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Location is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Location is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}
function validationContactNumber(){
	var name= document.getElementById("contact_number").value;
	var text= document.getElementById("msg_contact_number");
	var pattern = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;

	if(name.match(pattern)){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Contact Number is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Contact Number is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}