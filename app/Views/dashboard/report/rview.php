
<?php 

// Header
   $title = "Reservations page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Rooms Reservations ";
       $search = 0;
       $search_by = 'Room Number';
       $url = "reservation/details";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>All Room Reservations Page  
                       <span>
                            <?php if($_SESSION['user_level'] != "Owner"): ?>
                                <a href="<?php url("reservation/index"); ?>" class="addnew"><i class="material-icons">add_circle</i></a> 
                            <?php endif; ?>
                            <a href="<?php url("reservation/details"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                        
                       </h4>
                   </div>
                   <p class="textfortabel">Rooms Reservations View Following Table</p>
               </div>
               <div class="cardbody">

               <div class="data">
    


    <!-- <h3>Enter the duration to get Report</h2> -->
        <!-- <form method="post" action="<?php url('report/rview');?>">
    
            <input type="date" name="start_date">
            <input type="date" name="end_date"> -->
            <!-- <button type="submit" name="generate" class="submit" value="Generate the report">Generate</button> -->

 
            
            <!-- <h3>Enter the month to get Report</h3> -->

            <!-- <input type="text" name="month"> -->
            <!-- <button type="submit" name="generate1" class="submit" value="Generate the report">Generate</button> -->

            <!-- <h3>Enter the year to get Report</h3> -->

            <!-- <input type="text" name="year"> -->
            <!-- <button type="submit" name="generate2" class="submit" value="Generate the report">Generate</button> -->
    
    
      <!-- </form>
       -->

    <a href="<?php url('Report/viewReservation/'.$date);?>"> Create PDF</a>
      </div>
    
               <div class="tablebody">
                                <table>
                                    <thead>
                                        <th>Room Number</th>
                                        <th>Room Name</th>
                                        <th>Room Price</th>
                                        <th>No of Guest</th>
                                        <th>Check In Date</th>
                                        <th>Check Out Date</th>
                                        <th>Details</th>
                                        <?php if($_SESSION['user_level'] == "Owner" ): ?>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        <?php endif; ?>
                                        <?php if($_SESSION['user_level'] != "Owner" ): ?>
                                            <th>Reservation</th>
                                        <?php endif; ?>
                                                                                 
                                    </thead>
<?php
// var_dump($rooms);
// exit;
?>
                                    <?php foreach($rooms as $row): ?>
                                    <tbody>
                                        
                                        <td><?php echo $row['first_name'];?></td>
                                        <td><?php echo $row['last_name'];?></td>
                                        <td><?php echo $row['contact_number'];?></td>
                                        <td><?php echo $row['age'];?></td>
                                        <td>
                                            <?php 
                                            // session_start();
                                            
                                            date_default_timezone_set("Asia/Colombo");
                                            $current_date = date("Y-m-d"); 
                                            
                                                if($row['check_in_date'] == NULL || $row['check_out_date'] < $current_date && $_SESSION['user_level'] == "Reception"){ ?>
                                                <div class="outofdate">
                                                    <?php echo "Out of Date";?>
                                                </div> 
                                            <?php } else { ?>  
                                                <?php if($current_date > $row['check_out_date']) { ?>
                                                    <div class="outofdate">
                                                        <?php  echo $row['check_in_date'];?>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="in">
                                                        <?php  echo $row['check_in_date'];?>
                                                    </div>
                                                <?php } ?>
                                            <?php } 
                                            
                                            
                                            ?>
                                        </td>

                                        <td>
                                            <?php if($row['check_out_date'] == NULL || $row['check_out_date'] < $current_date && $_SESSION['user_level'] == "Reception") {?>
                                            <div class="outofdate">
                                                <?php echo "Out of Date";?>
                                            </div> 
                                            <?php } else { ?> 
                                                <?php if($current_date > $row['check_out_date']) { ?>
                                                    <div class="outofdate">
                                                        <?php  echo $row['check_out_date'];?>
                                                    </div>    
                                                <?php } else { ?>
                                                    <div class="out">
                                                        <?php  echo $row['check_out_date'];?>
                                                    </div>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>

                                        <td><a href="<?php url('room/details/'.$row['room_number']);?>" class="edit"><i class="material-icons">preview</i></a></td>
                                        <?php if($_SESSION['user_level'] != "Owner" ): ?>
                                            <?php if($current_date < $row['check_out_date']) { ?>
                                                <td><a href="#" onclick="return confirm('Can not Do Reservation Sorry!!?');" class="edit"><i class="material-icons">book_online</i></a></td>
                                            <?php } else { ?>
                                                <td><a href="<?php url('reservation/view/'.$row['room_number'].'/'.$row['max_guest']);?>" onclick="return confirm('Are you sure?');" class="edit"><i class="material-icons">book_online</i></a></td>
                                            <?php }; ?> 
                                            
                                        <?php endif; ?>
                                        <?php if($_SESSION['user_level'] == "Owner"): ?>
                                            <?php if($current_date > $row['check_out_date']) { ?>
                                                <td><a href="#" onclick="return confirm('Can not Edit Sorry!!');" class="edit"><i class="material-icons">edit</i></a></td>
                                            <?php } else { ?>   
                                                <td><a href="<?php url('reservation/edit/'.$row['room_number'].'/'.$row['check_in_date'].'/'.$row['check_out_date']);?>" class="edit"><i class="material-icons">edit</i></a></td>
                                            <?php }; ?>    
                                            <td><a href="<?php url('reservation/delete/'.$row['room_number'].'/'.$row['check_in_date'].'/'.$row['check_out_date']);?>" onclick="return confirm('Are you sure?');" class="delete"><i class="material-icons">delete</i></a></td>
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

<?php  

  include_once('connection.php');


  if(isset($_POST['generate']))
  {

    // $txtStartDate=$_POST['start_date'];
    // date_default_timezone_set("Asia/Colombo");
    // $txtEndDat = date('Y-m-d');
    

    // $query=mysqli_query($connection,"SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id WHERE check_in_date BETWEEN '$txtStartDate' and '$txtEndDate' order BY check_in_date");
    // $count=mysqli_num_rows($query);





  
  }


//   if(isset($_POST['generate1']))
//   {

    
//     $txtmonth=$_POST['month'];

//     $query1=mysqli_query($connection,"SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id WHERE MONTH(check_in_date) ='$txtmonth'");
//     $count1=mysqli_num_rows($query1);



  
//   }

//   if(isset($_POST['generate2']))
//   {

    
//     $txtyear=$_POST['year'];

//     $query1=mysqli_query($connection,"SELECT first_name,last_name,contact_number,age,email,location,no_of_guest,payment_method,check_in_date,check_out_date FROM reservation INNER JOIN customer on reservation.customer_id=customer.customer_id WHERE YEAR(check_in_date) ='$txtyear'");
//     $count2=mysqli_num_rows($query2);



  
//   }


