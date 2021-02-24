
<?php 

// Header
   $title = "Customer Blacklist page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Customer Page";
       $search = 1;
       $search_by = 'name';
       $url = "customer/blacklist";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Customer Blacklist Page   
                       <span>
                            <a href="<?php url("customer/selectOption"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("customer/blacklist"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Blacklist Customer View Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Location</th>
                                <th>Contact Number</th>
                                <th>Details</th>
                            </thead>
                            <?php foreach($customer as $row): ?>
                            <tbody>
                                <td><?php echo $row['customer_id'];?></td>
                                <td><?php echo $row['first_name'];?></td>
                                <td><?php echo $row['last_name'];?></td>
                                <td><?php echo $row['age'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td><?php echo $row['contact_number'];?></td>
                                <td><a href="<?php url('customer/blacklistDetails/'.$row['customer_id']);?>" class="edit"><i class="material-icons">preview</i></a></td>    
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