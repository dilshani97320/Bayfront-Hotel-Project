
<?php 

// Header
   $title = "Reservations Notification Page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Room Reservations ";
       $search = 1;
       $search_by = 'Room Number';
       $url = "notification/reservationIndex";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>All Room Reservations Notification Page
                       <span>
                            <a href="<?php url("notification/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("notification/reservationIndex"); ?>" class="refresh"><i class="material-icons">loop</i></a>  
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Rooms Reservations Notifications View Following Table</p>
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
                                        <th>Room Price</th>
                                        <th>No of Guest</th>
                                        <th>Check In Date</th>
                                        <th>Check Out Date</th>
                                        <th>Accept</th>
                                        <th>Decline</th>
                                                                                 
                                    </thead>

                                    <?php foreach($rooms as $row): ?>
                                    <tbody>
                                        
                                        <td><?php echo $row['room_number'];?></td>
                                        <td><?php echo $row['room_name'];?></td>
                                        <td><?php echo $row['price'];?></td>
                                        <td><?php echo $row['max_guest'];?></td>
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
                                        
                                        <td>
                                            <div class="outofdate">
                                                <a href="<?php url('notification/accept/'.$row['reservation_id'].'/'.$row['room_number'].'/'.$row['check_in_date'].'/'.$row['check_out_date']);?>" class="edit" style="color:#ffff;">accept</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="outofdate">
                                                <a href="<?php url('notification/decline/'.$row['reservation_id']);?>" class="edit" style="color:#ffff;">decline</a>
                                            </div>
                                        </td>
                                        <!-- <td><a href="<?php url('room/details/'.$row['room_number']);?>" class="edit"><i class="material-icons">accept</i></a></td> -->
                                        <!-- <td><a href="<?php url('room/details/'.$row['room_number']);?>" class="edit"><i class="material-icons">preview</i></a></td> -->
                                        
                                        
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