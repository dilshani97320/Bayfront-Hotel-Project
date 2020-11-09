
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
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Employee Page   
                       <span>
                            <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <a href="<?php url("employee/add"); ?>" class="addnew"><i class="material-icons">add</i>Add New</a> 
                            <?php endif; ?>
                            <a href="<?php url("employee/index"); ?>" class="refresh"><i class="material-icons">refresh</i>Refresh</a> 
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Employee View Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Salary</th>
                                <th>Location</th>
                                <th>Contact Number</th>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                    <th>Edit</th>
                                    <th>Delete</th>  
                                <?php endif; ?>
                            </thead>
                            <?php foreach($employee as $row): ?>
                            <tbody>
                                <td><?php echo $row['emp_id'];?></td>
                                <td><?php echo $row['first_name'];?></td>
                                <td><?php echo $row['last_name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['salary'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td><?php echo $row['contact_num'];?></td>
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
