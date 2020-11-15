<style>
     input[type='checkbox'], input[type='radio'] {
		 --active: #275efe;
		 --active-inner: #fff;
		 --focus: 2px rgba(39, 94, 254, .3);
		 --border: #275efe;
		 --border-hover: #275efe;
		 --background: #fff;
		 --disabled: #000;
		 --disabled-inner: #e1e6f9;
		 -webkit-appearance: none;
		 -moz-appearance: none;
		 height: 21px;
		 outline: none;
		 display: inline-block;
		 vertical-align: top;
		 position: relative;
		 margin: 0;
		 cursor: pointer;
		 border: 1px solid var(--bc, var(--border));
		 background: var(--b, var(--background));
		 transition: background 0.3s, border-color 0.3s, box-shadow 0.2s;
    }
    input[type='checkbox']:after, input[type='radio']:after {
		 content: '';
		 display: block;
		 left: 0;
		 top: 0;
		 position: absolute;
		 transition: transform var(--d-t, 0.3s) var(--d-t-e, ease), opacity var(--d-o, 0.2s);
	}
	 input[type='checkbox']:checked, input[type='radio']:checked {
		 --b: var(--active);
		 --bc: var(--active);
		 --d-o: 0.3s;
		 --d-t: 0.6s;
		 --d-t-e: cubic-bezier(0.2, 0.85, 0.32, 1.2);
	}
	 
	 input[type='checkbox']:hover:not(:checked):not(:disabled), input[type='radio']:hover:not(:checked):not(:disabled) {
		 --bc: var(--border-hover);
	}
	 input[type='checkbox']:focus, input[type='radio']:focus {
		 box-shadow: 0 0 0 var(--focus);
	}
	 input[type='checkbox']:not(.switch), input[type='radio']:not(.switch) {
		 width: 21px;
	}
	 input[type='checkbox']:not(.switch):after, input[type='radio']:not(.switch):after {
		 opacity: var(--o, 0);
	}
	 input[type='checkbox']:not(.switch):checked, input[type='radio']:not(.switch):checked {
		 --o: 1;
	}
	 input[type='checkbox'] + label, input[type='radio'] + label {
		 font-size: 14px;
		 line-height: 21px;
		 display: inline-block;
		 vertical-align: top;
		 cursor: pointer;
		 margin-left: 4px;
	}
	 input[type='checkbox']:not(.switch) {
		 border-radius: 7px;
	}
	 input[type='checkbox']:not(.switch):after {
		 width: 5px;
		 height: 9px;
		 border: 2px solid var(--active-inner);
		 border-top: 0;
		 border-left: 0;
		 left: 7px;
		 top: 4px;
		 transform: rotate(var(--r, 20deg));
	}
	 input[type='checkbox']:not(.switch):checked {
		 --r: 43deg;
	}
	 input[type='checkbox'].switch {
		 width: 38px;
		 border-radius: 11px;
	}
	 input[type='checkbox'].switch:after {
		 left: 2px;
		 top: 2px;
		 border-radius: 50%;
		 width: 15px;
		 height: 15px;
		 background: var(--ab, var(--border));
		 transform: translateX(var(--x, 0));
	}
	 input[type='checkbox'].switch:checked {
		 --ab: var(--active-inner);
		 --x: 17px;
	}
	 input[type='checkbox'].switch:disabled:not(:checked):after {
		 opacity: 0.6;
	}
	 input[type='radio'] {
		 border-radius: 50%;
	}
	 input[type='radio']:after {
		 width: 19px;
		 height: 19px;
		 border-radius: 50%;
		 background: var(--active-inner);
		 opacity: 0;
		 transform: scale(var(--s, 0.7));
	}
	 input[type='radio']:checked {
		 --s: 0.5;
	}


.addFile{
    padding: 10px;
    width: 150px;
    margin-top: 50px;
    background: #1e90ff; 
    letter-spacing: 1px;
    font-weight: 400;
    font-size: 18px;
    text-align: center;
    color: #fff;
    
}



input[type="file"] {
    display: none;
}
.imgLine{
    display: flex;
  flex-wrap: wrap;
}
.line{
    flex-basis: 300px;
}
.line #previewImg{
    width: 150px;
    margin-left: 50;
    height: 150px;
    object-fit: cover;  
}

.line .submitBtn{
    width: 168px;
    padding: 10px;
    margin-top: 50px;
    letter-spacing: 1px;
    font-weight: 400;
    color: #fff;
    border: none;
    font-size: 18px;
    text-align: center;
    background: #00AF87;
    box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 1px 3px 1px rgba(60,64,67,0.149);
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    

function previewFile(input) {

    console.log(input);
    var file = input.files[0];
    console.log(file);
  
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $(input).closest('.imgLine').find('#previewImg').attr("src", reader.result);
        }
            reader.readAsDataURL(file);
    }
}
</script>
<?php 

// Header
   $title = "Employee page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Employee Page";
       $search = 1;
       $search_by = 'name';
       $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Employee Page   
                      
                       </h4>
                   </div>
                   <p class="textfortabel">Employee View Following Table</p>
               </div>

               <div class="cardbody">  
                    <form action="<?php url("editweb/create/") ?>" method="post" class="addnewform" enctype="multipart/form-data">

                    <div class="section1">
					
                        <div class="row">
                            <label for="#"><i class="material-icons">perm_identity</i>Room Type</label>
                            <select name="type_name" class="inputField" selected="<?php echo $room_details[0]['type_id']; ?>">
                                <option value="" style="border: none">Select Room Type</option> 
                                <option value="1" style="border: none">Single Room</option> 
                                <option value="2" style="border: none">Double Room with King Size Bed </option> 
                                <option value="3" style="border: none">Double Room with Queen Size Bed</option> 
                                <option value="4" style="border: none">Triple Room</option> 
                                <option value="5" style="border: none">Twin Double Room</option> 
                                <option value="6" style="border: none">Twin Room</option> 
                                <option value="7" style="border: none">Family Room</option> 
                                            
                            </select>
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">perm_identity</i>Floor Type</label>
                            <select name="floor_type" class="inputField" selected="<?php echo $room_details[0]['type_id']; ?>">
                                <option value="" style="border: none">Select The Floor</option> 
                                <option value="0" style="border: none">Ground Floor</option> 
                                <option value="1" style="border: none">First Floor </option> 
                                <option value="2" style="border: none">Scond Floor</option> 
                                <option value="3" style="border: none">Third Floor</option> 
                                <option value="4" style="border: none">Fourth Floor</option> 
                            </select>
                        </div>
                        
                        <div class="row">
                        <label for="#"><i class="material-icons">perm_identity</i>Room Number</label>
                        <input type="text" name="room_number" value="">
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room name</label>
                            <input type="text" name="room_name" value="">
                        </div>

                        
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room Discription</label>
                            <textarea name="room_desc" value="" rows="5" cols="40"></textarea>
                            
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room View</label>
                            <input type="text" name="room_view" value="">
                            
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room Size</label>
                            <input type="text" name="room_size" value="">
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Price</label>
                            <input type="num" name="price" value=""> 
                        </div>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Air Condition</label>
                            <!-- <input type="text" name="salary"> -->
                            <label for="r1">No</label>
                            <input id="s1" type="checkbox" name="air_condition" class="switch"  >
                            <label for="r1">Yes</label>
                            
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">location_on</i>Hot Water</label>
                            <!-- <input type="text" name="location"> -->
                            <label for="r1">No</label>
                            <input id="s1" type="checkbox" name="hot_water" class="switch"  >
                            <label for="r1">Yes</label>
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Free Canseleration</label>
                            <label for="r1">No</label>
                            <input id="s1" name="free_canseleration" type="checkbox" class="switch"  >
                            <label for="r1">Yes</label>
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Breakfast Included</label>
                            <label for="r1">No</label>
                            <input id="s1" name="breakfast_included" type="checkbox" class="switch"  >
                            <label for="r1">Yes</label>
                        </div>
                        
                        <div class="imgLine">
                        <div class="line">
                            <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input  type="file" name="imgfile" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                    </div>

                        <div class="row">
                            <div class="button">
                                <input type="submit" name="submit" value="submit">
                            </div>
                        </div>
                    </div>

                  

                    </div>

                    </form>
                </div>  <!--End Card Body -->

           </div> 
       </div>
   </div>

</div>   
