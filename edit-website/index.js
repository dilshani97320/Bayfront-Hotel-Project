window.onclick=function(event){

opencloseDropdown(event)
}

function closeDropdown()
{
var dropdown=document.getElementsByClassName('dropdown-expand')
for(var i=0;i<dropdown.length;i++){
	dropdown[i].classList.remove('dropdown-expand')
}

}

function opencloseDropdown(event)
{
	if(!event.target.matches('.dropdown-toggle')){
		//
		//close dropdown when click out of dropdown menu
		//
		closeDropdown()
	}else{
		
		var toggle=event.target.dataset.toggle
var content=document.getElementById(toggle)
if(content.classList.remove('dropdown-expand')){
	closeDropdown()
}else{
	closeDropdown()
	content.classList.add('dropdown-expand')
}
	}
}