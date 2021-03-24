function validationFirstName(){
	var name= document.getElementById("first_name").value;
	var text= document.getElementById("msg_first_name");
	var pattern = /^[A-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;

	if(name.match(pattern)  && name.length>= 4 && name.length<= 20){
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

	if(name.match(pattern)  && name.length>= 4 && name.length<= 20  ){
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

	if(name.match(pattern)  && name.length>= 12 && name.length<= 30  ){
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

	if(name.match(pattern)  && name.length>= 4 && name.length<= 6  ){
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

function validationAge(){
	var name= document.getElementById("age").value;
	var text= document.getElementById("msg_age");
	var pattern = /^\S[1-9]{1,2}$/;

	if(name.match(pattern)  && name.length>= 2 && name.length <= 3 && name > 20  ){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Age is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Age is Not Valid';
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

	if(name.match(pattern) && name.length>= 20 && name.length<= 35  ){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Location is Valid';
        text.style.color= "rgb(22, 80, 22)";
		console.log("hello2");
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

	if(name.match(pattern)  && name.length == 10){
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

function validationPassword(){
	var name= document.getElementById("reception_password").value;
	var text= document.getElementById("msg_reception_password");
	var pattern = /^\d{4}$/;

	if(name.match(pattern)  && name.length == 4){
		text.innerHTML ='<i class="material-icons" style="color:rgb(22, 80, 22)">check_circle</i>Password is Valid';
        text.style.color= "rgb(22, 80, 22)";
	}
	else{
		text.innerHTML ='<i class="material-icons" style="color:rgb(116, 24, 24)">info</i>Password is Not Valid';
        text.style.color= "rgb(116, 24, 24)";
	}
	if(name == ""){
		text.innerHTML ="";
	}

}
function giveNoOfGuest(){

	var roomNumber= document.getElementById("roomNumber").value;
	// this if condition change according to number of rooms
	if(roomNumber === "A001"){
		document.getElementById('no_of_guest').options.remove(document.getElementById('no_of_guest').selectedIndex);
		var opt = document.createElement('OPTION');
		opt.text = 'No of Guest:1';
		opt.value = 1;
		document.getElementById('no_of_guest').options.add(opt); 
	}
	if(roomNumber === "A002" || roomNumber === "B102" || roomNumber === "B103" || roomNumber === "C202"){
		document.getElementById('no_of_guest').options.remove(document.getElementById('no_of_guest').selectedIndex);
		var opt = document.createElement('OPTION');
		opt.text = 'No of Guest:2';
		opt.value = 2;
		document.getElementById('no_of_guest').options.add(opt); 
	}
	if(roomNumber === "B101"){
		document.getElementById('no_of_guest').options.remove(document.getElementById('no_of_guest').selectedIndex);
		var opt = document.createElement('OPTION');
		opt.text = 'No of Guest:4';
		opt.value = 4;
		document.getElementById('no_of_guest').options.add(opt); 
	}

}