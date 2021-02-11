
<?php 

// Header
   $title = "Room Result page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Room Result Page";
       $search = 0;
       $search_by = 'name';
       $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Room Result Page   
                       <span>
                            <a href="<?php url("room/index"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                        
                       </h4>
                   </div>
                   <p class="textfortabel">Room  Result Following Table</p>
               </div>
               <div class="cardbody">
               <div class="tablebody">
                                <table>
                                    <thead>
                                        <th>Room Number</th>
                                        <th>Room Name</th>
                                        <th>Room Price</th>
                                        <th>No of Guest</th>
                                        <th>Check In Date</th>
                                        <th>Check In Date</th>
                                        <th>Details</th>
                                        <?php if($_SESSION['user_level'] == "Reception"): ?>
                                            <th>Make Reservation</th>  
                                        <?php endif; ?>
                                                                               
                                    </thead>
                                    <?php 
                                    // $data = array();
                                    // $data['values']= $rooms; 
                                    $roomnumber = "000";
                                    ?>

                                    <?php foreach($rooms as $row): ?>
                                        
                                        <?php if($row['room_number'] != $roomnumber ) { ?>
                                            <?php $roomnumber = $row['room_number']; ?>
                                            <tbody>
                                        
                                                <td><?php echo $row['room_number'];?></td>
                                                <td><?php echo $row['room_name'];?></td>
                                                <td><?php echo $row['price'];?></td>
                                                <td><?php echo $row['max_guest'];?></td>
                                                <td> 
                                                    <div class="outofdate">
                                                            <?php echo $details['check_in_date'];?>
                                                    </div> 
                                                </td>

                                                <td>
                                                    <div class="outofdate">
                                                            <?php echo $details['check_out_date'];?>
                                                    </div> 
                                                </td>

                                                <td><a href="<?php url('room/details1/'.$row['room_number'].'/'.$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name']);?>" class="edit"><i class="material-icons">preview</i></a></td>
                                                
                                                <?php if($_SESSION['user_level'] == "Reception"): ?>
                                                    <td><a href="<?php url('reservation/view1/'.$row['room_number'].'/'.$row['max_guest'].'/'.$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name'].'/'.$customer['id']);?>" onclick="return confirm('Are you sure?');" class="edit"><i class="material-icons">book_online</i></a></td>
                                                <?php endif; ?>
                                            </tbody>
                                        <?php } ?>
                                    
                                <?php endforeach ?> 
                                </table>
                           
                           </div>
                </div>  <!--End Card Body -->
           </div> 
       </div>
   </div>

</div>   
   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>