
<?php 

// Header
   $title = "Reception View page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Reception Page";
       $search = 1;
       $search_by = 'username';
       $url = "reception/viewAll";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Receptions Details Page   
                       <span>
                       <a href="<?php url("report/selectUserType"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        <a href="<?php url("reception/viewAll"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Receptions View Following Table</p>
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
                                <th>Details</th>
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
                                <td><a href="<?php url('reception/detailsView/'.$row['reception_user_id']);?>" class="edit"><i class="material-icons">preview</i></a></td>    
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
