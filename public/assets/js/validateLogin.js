function validateEmail(ele, min, max) {
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    // console.log(ele);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(!ele.value.trim().match(mailformat)){
        errors.push("Enter Correct Email Address") 
    }
    if (errors.length > 0) {
        var preDivInside = document.querySelector("#alert01 p");
        var preDiv = document.getElementById("alert01");
        preDiv.style = "display:block;";
        preDivInside.innerHTML = errors[0];
    }else{
        var preDivInside = document.querySelector("#alert01 p");
        var preDiv = document.getElementById("alert01");
        preDiv.style = "display:none;";
    }
    if (lengthTxt == 0) {
        var preDivInside = document.querySelector("#alert01 p");
        var preDiv = document.getElementById("alert01");
        preDiv.style = "display:none;";
    }
}

function validatePassword(ele, min, max) {
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    // console.log(lengthTxt);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }
    var passwordformat = /^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/;
    if(!ele.value.trim().match(passwordformat)){
        errors.push("Enter Corect Password Format") 
    }else{
        var preDivInside = document.querySelector("#alert02 p");
        var preDiv = document.getElementById("alert02");
        preDiv.style = "display:none;";
    }
    if (errors.length > 0) {
        var preDivInside = document.querySelector("#alert02 p");
        var preDiv = document.getElementById("alert02");
        preDiv.style = "display:block;";
        preDivInside.innerHTML = errors[0];
    }else{
        var preDivInside = document.querySelector("#alert02 p");
        var preDiv = document.getElementById("alert02");
        preDiv.style = "display:none;";
    }
    if (lengthTxt == 0) {
        var preDivInside = document.querySelector("#alert02 p");
        var preDiv = document.getElementById("alert02");
        preDiv.style = "display:none;";
    }
}

function validatePasswordConfirm(ele, min, max) {
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    console.log(lengthTxt);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }

    var passwordDiv = document.querySelector("#input-field-password input");
    var password = passwordDiv.value;
    // console.log(password);

    if(ele.value.trim() != password){
        errors.push("Password Not Matched");
        var preDivInside = document.querySelector("#alert03 p");
        var preDiv = document.getElementById("alert03");
        preDiv.style = "display:block;";
        preDivInside.innerHTML = errors[0];
        preDivInside.style = "color: #ff0000;"; 
    }else{
        errors.push("Password Matched") 
        var preDivInside = document.querySelector("#alert03 p");
        var preDiv = document.getElementById("alert03");
        // console.log(preDiv);
        preDiv.style = "border-left: 6px solid #00a531;";
        preDivInside.style = "color: #00a531; ";
        preDivInside.innerHTML = errors[0];
    }
    if (lengthTxt == 0) {
        var preDivInside = document.querySelector("#alert03 p");
        var preDiv = document.getElementById("alert03");
        preDiv.style = "display:none;";
    }
}

function validateUsername(ele, min, max) {
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    // console.log(ele);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }
    var nameformat = /^[a-zA-Z0-9]+$/;
    if(!ele.value.trim().match(nameformat)){
        errors.push("Username Must Contain Letters & Digits Only") 
    }
    if (errors.length > 0) {
        var preDivInside = document.querySelector("#alert00 p");
        var preDiv = document.getElementById("alert00");
        preDiv.style = "display:block;";
        preDivInside.innerHTML = errors[0];
    }else{
        var preDivInside = document.querySelector("#alert00 p");
        var preDiv = document.getElementById("alert00");
        preDiv.style = "display:none;";
    }
    if (lengthTxt == 0) {
        var preDivInside = document.querySelector("#alert00 p");
        var preDiv = document.getElementById("alert00");
        preDiv.style = "display:none;";
    }
}