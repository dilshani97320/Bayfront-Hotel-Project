
<?php 

// Header
   $title = "Room page";
   include(VIEWS.'dashboard/inc/header.php');
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Room Page";
       $search = 1;
       $search_by = 'Room Number';
       if($_SESSION['user_level'] == "Owner"){
           $search_by = 'Room Number OR Press Today';
       }
       
       $url = "room/index";  //Search process url
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Room Page   
                       <span>
                        <?php if($_SESSION['user_level'] == "Owner"): ?>
                            <a href="<?php url("room/add"); ?>" class="addnew"><i class="material-icons">add</i>Add New</a>
                        <?php endif; ?>    
                            <a href="<?php url("room/index"); ?>" class="refresh"><i class="material-icons">refresh</i>Refresh</a> 
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Room View Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Room Type ID</th>
                                <th>Room Number</th>
                                <th>Check-In date</th>
                                <th>Check-Out date</th>
                                <th>Details</th>
                                <th>Make Reservation</th> 
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                    <th>Edit</th>
                                    <th>Delete</th>  
                                <?php endif; ?>
                            </thead>
                            <?php foreach($rooms as $row): ?>
                            <tbody>
                                <td><?php echo $row['room_id'];?></td>
                                <td><?php echo $row['room_type_id'];?></td>
                                <td><?php echo $row['room_number'];?></td>
                                <td>
                                    <?php $current_date = date("Y-m-d"); 
                                    if($row['check_in_date'] == NULL || $row['check_out_date'] < $current_date){ ?>
                                    <div class="out">
                                        <?php echo "Not Booked";?>
                                    </div> 
                                    <?php } else { ?>  
                                    <div class="in">
                                        <?php  echo $row['check_in_date'];?>
                                    </div>
                                    <?php } ?>
                                </td>

                                <td>
                                    <?php if($row['check_out_date'] == NULL || $row['check_out_date'] < $current_date){ ?>
                                    <div class="out">
                                        <?php echo "Not Booked";?>
                                    </div> 
                                    <?php } else { ?>  
                                    <div class="out">
                                        <?php  echo $row['check_out_date'];?>
                                    </div>
                                    <?php } ?>
                                </td>
                                <td><a href="<?php //url('room/edit/'.$row['emp_id']);?>" class="edit"><i class="material-icons">zoom_in</i>Details</a></td>
                                <td><a href="<?php //url('room/reservation/'.$row['emp_id']);?>" onclick="return confirm('Are you sure?');" class="edit"><i class="material-icons">book_online</i>Reservation</a></td>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <td><a href="<?php url('employee/edit/'.$row['emp_id']);?>" class="edit"><i class="material-icons">edit</i>Edit</a></td>
                                <td><a href="<?php url('employee/delete/'.$row['emp_id']);?>" onclick="return confirm('Are you sure?');" class="delete"><i class="material-icons">delete</i>Delete</a></td>
                                <?php endif; ?>
                            </tbody>
                            <?php endforeach ?> 
                        </table>
                    </div>
                </div>  <!--End Card Body -->
           </div> 
       </div>
   </div>

</div>   
   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
