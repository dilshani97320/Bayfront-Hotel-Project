<style>
     input[type='checkbox'], input[type='radio'] {
		 --active: #275efe;
		 --active-inner: #fff;
		 --focus: 2px rgba(39, 94, 254, .3);
		 --border: #bbc1e1;
		 --border-hover: #275efe;
		 --background: #fff;
		 --disabled: #f6f8ff;
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
	 input[type='checkbox']:disabled, input[type='radio']:disabled {
		 --b: var(--disabled);
		 cursor: not-allowed;
		 opacity: 0.9;
	}
	 input[type='checkbox']:disabled:checked, input[type='radio']:disabled:checked {
		 --b: var(--disabled-inner);
		 --bc: var(--border);
	}
	 input[type='checkbox']:disabled + label, input[type='radio']:disabled + label {
		 cursor: not-allowed;
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

</style>
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
                    <form action="<?php url("editweb/update/".$room_details[0]['room_id']); ?>" method="post" class="addnewform">

                    <div class="section1">
                     
                        <div class="row">
                        <label for="#"><i class="material-icons">perm_identity</i>Room Number</label>
                        <input type="text" name="room_number" value="<?php echo $room_details[0]['room_number']; ?>">
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room name</label>
                            <input type="text" name="room_name" value="<?php echo $room_details[0]['room_name']; ?>">
                        </div>

                        
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room Discription</label>
                            <textarea name="room_desc" value="" rows="5" cols="40"><?php echo $room_details[0]['room_desc']; ?></textarea>
                            
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Floor Type</label>
                            <input type="text" name="floor_type" value="<?php echo $room_details[0]['floor_type']; ?>">
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room Size</label>
                            <input type="text" name="room_size" value="<?php echo $room_details[0]['room_size']; ?>">
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Price</label>
                            <input type="num" name="price" value="<?php echo $room_details[0]['price']; ?>"> 
                        </div>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Air Condition</label>
                            <!-- <input type="text" name="salary"> -->
                            <input id="s1" type="checkbox" name="air_condition" class="switch" <?php  if($room_details[0]['air_condition']==1) {  echo "checked";} ?> >
                            
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">location_on</i>Hot Water</label>
                            <!-- <input type="text" name="location"> -->
                            <input id="s1" type="checkbox" name="hot_water" class="switch" <?php  if($room_details[0]['hot_water']==1) {  echo "checked";} ?> >
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Free Canseleration</label>
                            <input id="s1" name="free_canseleration" type="checkbox" class="switch" <?php  if($room_details[0]['free_canselaration']==1) {  echo "checked";} ?> >
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
