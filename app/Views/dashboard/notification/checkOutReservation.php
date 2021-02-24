
<?php 

// Header
   $title = "Reservations Check-Out Page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Room Reservations ";
       $search = 1;
       $search_by = 'Room Number or Contact Number';
       $url = "notification/checkOutMark";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>All Today Checked Out Reservations Page
                       <span>
                            <a href="<?php url("notification/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("notification/checkOutMark"); ?>" class="refresh"><i class="material-icons">loop</i></a>  
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Today Rooms Reservations View Following Table</p>
               </div>
               <div class="cardbody">
               <div class="tablebody">
                                <?php 
                                    if(isset($errors)) {
                                        echo '<script>alert("Can not Accept Already reserved Sorry!!")</script>';
                                    }
                                
                                
                                ?>
                                <table>
                                    <thead>
                                        <th>Room Number</th>
                                        <th>Room Name</th>
                                        <th>First Name</th>
                                        <th>Contact Number</th>
                                        <th>Room Price</th>
                                        <th>Check In Date</th>
                                        <th>Check Out Date</th>
                                        <th>Checked-Out</th>                                         
                                    </thead>

                                    <?php foreach($rooms as $row): ?>
                                    <tbody>
                                        
                                        <td><?php echo $row['room_number'];?></td>
                                        <td><?php echo $row['room_name'];?></td>
                                        <td><?php echo $row['first_name'];?></td>
                                        <td><?php echo $row['contact_number'];?></td>
                                        <td><?php echo $row['price'];?></td>
                                        <td>  
                                            <div class="in">
                                                <?php  echo $row['check_in_date'];?>
                                            </div>
                                        </td>

                                        <td>   
                                            <div class="out">
                                                <?php  echo $row['check_out_date'];?>
                                            </div>        
                                        </td>
                                        <?php if($row['check_out_status'] == NULL){ ?>
                                        <td>
                                            <div class="outofdate">
                                                <a href="<?php url('notification/departuredCustomer/'.$row['reservation_id']);?>" class="edit" style="color:#ffff;">departure</a>
                                            </div>
                                        </td>
                                        <?php } else {?>
                                        <td>
                                            <div class="outofdate">
                                                <a href="#" class="edit" style="color:#ffff; cursor:unset">checked</a>
                                            </div>
                                        </td>
                                        <?php } ?>
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