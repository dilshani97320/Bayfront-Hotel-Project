
<?php 

// Header
   $title = "Reservation Report page";
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
       
    <!-- Table design -->
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
                    <div class="tablebody">
                        <table>
                            <thead>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact Number</th>
                            <th>Age</th>
                            <th>email</th>
                            <th>Location</th>
                            <th>No of Guests</th>
                            <th>Payment method</th>
                            <th>check in date</th>
                            <th>check out date</th>
                                
                            </thead>




                            <?php if(isset($query) || isset($count)) { ?>
  
  <tbody>
            <?php 
          
            while($row=mysqli_fetch_array($query)){?>
            <tr>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['contact_number'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['location'] ?></td>
                <td><?php echo $row['no_of_guest'] ?></td>
                <td><?php echo $row['payment_method'] ?></td>
                <td><?php echo $row['check_in_date'] ?></td>
                <td><?php echo $row['check_out_date'] ?></td>
                
            </tr>
            <?php } ?>

  </tbody>
    
 
                        </table>
                    </div>
                </div>  <!--End Card Body -->
           </div> 
       </div>
   </div>

</div>   
   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
