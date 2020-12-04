
<?php 

// Header
   $title = "Reception page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Reception Page";
       $search = 1;
       $search_by = 'username';
       $url = "Reception/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Reception Page   
                       <span>
                       <a href="<?php url("employee/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                            <a href="<?php url("reception/index"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                            
                        
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Reception View Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Location</th>      
                                <th>Post</th>                           
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                <?php endif; ?>
                                <?php if($_SESSION['user_level'] != "Owner"): ?>
                                    <th>View</th>
                                <?php endif; ?>

                            </thead>
                            <?php foreach($reception as $row): ?>
                            <tbody>
                                <td><?php echo $row['reception_user_id'];?></td>
                                <td><?php echo $row['username'];?></td>
                                <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['contact_num'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td>Receptionist</td>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                    <td><a href="<?php url('reception/edit/'.$row['reception_user_id']);?>" class="edit"><i class="material-icons">edit</i></a></td>
                                    <td><a href="<?php url('reception/delete/'.$row['reception_user_id']);?>" class="delete"><i class="material-icons">delete</i></a></td>
                                <?php endif; ?>
                                <?php if($_SESSION['user_level'] != "Owner") {
                                        if($_SESSION['user_id'] == $row['reception_user_id']) { ?>
                                             <td><a href="<?php url('reception/edit/'.$row['reception_user_id']);?>" class="edit"><i class="material-icons">visibility</i></a></td>
                                        <?php }else {; ?>
                                             <td><a href="#" class="edit"><i class="material-icons">visibility_off</i></a></td>
                                <?php } }; ?>
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
