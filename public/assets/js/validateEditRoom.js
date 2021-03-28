function validateRoomNo(ele, min, max){
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    var Txt = ele.value.trim();
    // console.log(ele);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }
    if (lengthTxt == 0) {
        errors.push("Room Name Field Required");
    }
    var typeDiv = document.querySelector("#animate-form-floor_type select");
    var floor = typeDiv.value;
    console.log(floor);
      
        
            if (floor == 0){
                if(Txt > 0 && Txt <100){
                errors.push("Room Number Matched")
                }else{
                errors.push("First Floor Contains 001 - 099");
                Txt = 006;
                }
            } 
            if(floor == 1){
                if(Txt > 99 && Txt <200){
                    errors.push("Room Number Matched")
                }else{
                    errors.push("First Floor Contains 100 - 199");
                } 
            } 
            if (floor == 2 ){
                if(Txt > 199 && Txt <300) {
                    errors.push("Room Number Matched")
                }else{
                    errors.push("First Floor Contains 200 - 299");
                } 
            } 
            if(floor == 3){
                if(Txt > 299 && Txt <400){
                    errors.push("Room Number Matched")
                }else{
                    errors.push("First Floor Contains 300 - 399");
                } 
            } 

            if (floor == 4){
                if(Txt > 399 && Txt <500) {
                    errors.push("Room Number Matched")
                }else{
                    errors.push("First Floor Contains 400 - 499");
                } 
            } 
            
    if (errors.length > 0) {
        var preDivInsideP = document.querySelector("#alert01 span");
        var preDiv = document.getElementById("alert01");
        // console.log(preDivInsideP);
        preDiv.style = "display: block;";
        preDivInsideP.innerHTML = '<i class="material-icons">info</i>'+ errors[0];
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


function validateRoomName(ele, min, max){
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    var Txt = ele.value.trim();
    console.log(Txt);
    console.log(lengthTxt);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }

    var typeDiv = document.querySelector("#animate-form-floor_type select");
    var floor = typeDiv.value;
    // console.log(floor);
      
    var typeformat =/^[A-Za-z.\s_-]+$/;
    if(!Txt.match(typeformat)  && lengthTxt != 0){
        errors.push("Name Must Be Contain Letters Only");
    }
    if (lengthTxt == 0) {
        errors.push("Room Name Field Required");
    }
    if (errors.length > 0) {
        var preDivInsideP = document.querySelector("#alert02 span");
        var preDiv = document.getElementById("alert02");
        // console.log(preDivInsideP);
        preDiv.style = "display: block;";
        preDivInsideP.innerHTML = '<i class="material-icons">info</i>'+ errors[0];
    }else{
        var preDivInsideP = document.querySelector("#alert02 span");
        var preDiv = document.getElementById("alert02");
        preDiv.style = "display:none;";
    }

    
}


function validateRoomDesc(ele, min, max){
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    var Txt = ele.value.trim();
    console.log(Txt);
    console.log(lengthTxt);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }

    var typeDiv = document.querySelector("#animate-form-floor_type select");
    var floor = typeDiv.value;
    // console.log(floor);
     
    if (lengthTxt == 0) {
        errors.push("Room Description Field Required");
    }
    if (errors.length > 0) {
        var preDivInsideP = document.querySelector("#alert002 span");
        var preDiv = document.getElementById("alert002");
        // console.log(preDivInsideP);
        preDiv.style = "display: block;";
        preDivInsideP.innerHTML = '<i class="material-icons">info</i>'+ errors[0];
    }else{
        var preDivInsideP = document.querySelector("#alert002 span");
        var preDiv = document.getElementById("alert002");
        preDiv.style = "display:none;";
    }

    
}
function validateRoomSize(ele, min, max){
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    var Txt = ele.value.trim();
    console.log(Txt);
    console.log(lengthTxt);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }

    var typeDiv = document.querySelector("#animate-form-floor_type select");
    var floor = typeDiv.value;
    // console.log(floor);
      
    var typeformat =/^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;
    if(!Txt.match(typeformat)  && lengthTxt != 0){
        errors.push("Room Size are numbers 0-9 and decimal point.");
    }
    if (lengthTxt == 0) {
        errors.push("Room Size Field Required");
    }
    if (errors.length > 0) {
        var preDivInsideP = document.querySelector("#alert04 span");
        var preDiv = document.getElementById("alert04");
        // console.log(preDivInsideP);
        preDiv.style = "display: block;";
        preDivInsideP.innerHTML = '<i class="material-icons">info</i>'+ errors[0];
    }else{
        var preDivInsideP = document.querySelector("#alert04 span");
        var preDiv = document.getElementById("alert04");
        preDiv.style = "display:none;";
    }

    
}

function validateRoomPrice(ele, min, max){
    var errors = Array();
    var lengthTxt = ele.value.trim().length;
    var Txt = ele.value.trim();
    console.log(Txt);
    console.log(lengthTxt);

    if (lengthTxt > max) {
        errors.push("Your Input Must Be Less than "+max)
    }

    var typeDiv = document.querySelector("#animate-form-floor_type select");
    var floor = typeDiv.value;
    // console.log(floor);
      
    var typeformat =/^[0-9]\d*(((,\d{3}){1})?(\.\d{0,2})?)$/;
    if(!Txt.match(typeformat)  && lengthTxt != 0){
        errors.push("Room Size are numbers 0-9 and decimal point.");
    }
    if (lengthTxt == 0) {
        errors.push("Room Size Field Required");
    }
    if (errors.length > 0) {
        var preDivInsideP = document.querySelector("#alert05 span");
        var preDiv = document.getElementById("alert05");
        // console.log(preDivInsideP);
        preDiv.style = "display: block;";
        preDivInsideP.innerHTML = '<i class="material-icons">info</i>'+ errors[0];
    }else{
        var preDivInsideP = document.querySelector("#alert05 span");
        var preDiv = document.getElementById("alert05");
        preDiv.style = "display:none;";
    }
}

function validateFloor(ele){
    var errors = Array();
    var lengthTxt = ele.value.length;
    var Txt = ele.value;
    // console.log(ele);
    console.log(Txt);
    var preDiv = document.getElementById("room-no");
    preDiv.style ="display: inline-flex;";
    var preDivInsideP = document.querySelector("#animate-form-room-no input");
    if(Txt == 0){
        preDivInsideP.setAttribute("max","99");
        preDivInsideP.setAttribute("min","001");
    }
    if(Txt == 1){
        preDivInsideP.setAttribute("max","199");
        preDivInsideP.setAttribute("min","100");
    }
    if(Txt == 2){
        preDivInsideP.setAttribute("max","299");
        preDivInsideP.setAttribute("min","200");
    }
    if(Txt == 3){
        preDivInsideP.setAttribute("max","399");
        preDivInsideP.setAttribute("min","300");
    }
    if(Txt == 4){
        preDivInsideP.setAttribute("max","499");
        preDivInsideP.setAttribute("min","400");
    }

    // if(Txt == 10){
    //     errors.push("Floor Type Field Required");
    // }
    // if (errors.length > 0) {
    //     var preDivInsideP = document.querySelector("#alert0001 span");
    //     var preDiv = document.getElementById("alert0001");
    //     // console.log(preDivInsideP);
    //     preDiv.style = "display: inline-flex;";
    //     preDivInsideP.innerHTML = '<i class="material-icons">info</i>'+ errors[0];
    // }else{
    //     var preDivInsideP = document.querySelector("#alert001 span");
    //     var preDiv = document.getElementById("alert0001");
    //     preDiv.style = "display:none;";
    // }
    // console.log(preDivInsideP);
    // console.log(Txt);
   
}