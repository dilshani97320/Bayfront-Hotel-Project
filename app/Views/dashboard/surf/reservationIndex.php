
<?php 

// Header
   $title = "Reservations Surf Notification Page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Surf Reservations";
       $search = 1;
       $search_by = 'Customer Name';
       $url = "surf/reservationIndex";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>All Surf Reservations Notification Page
                       <span>
                            <a href="<?php url("notification/option");?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("surf/reservationIndex"); ?>" class="refresh"><i class="material-icons">loop</i></a>  
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Surf Reservations View Following Table</p>
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
                                        <th>Frist Name(C)</th>
                                        <th>Email(C)</th>
                                        <th>Package Name</th>
                                        <th>Package Price</th>
                                        <th>Till Valid</th>
                                        <th style="text-align:center;">Coach</th>
                                        <th>Accept</th>
                                        <th>Decline</th>
                                                                                 
                                    </thead>

                                    <?php foreach($package as $row): ?>
                                    <tbody>
                                        
                                        <td><?php echo $row['first_name'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                        <td><?php echo ucfirst($row['package_name']);?></td>
                                        <td><?php echo $row['price'];?></td>
                                        <td>  
                                            <div class="out">
                                                <?php  echo $row['check_out_date'];?>
                                            </div>
                                        </td>

                                        <?php if($row['is_request'] == 1) { ?>
                                        <form action="<?php url("surf/reserveCoach/".$row['surf_package_booked_id'].'/'.$row['email']); ?>" method="post">
                                        <td>
                                        <!-- <div class="row"> -->
                                            <div class="animate-form">
                                                <select name="coach" class="inputFieldCoach" required>
                                                    <option value="">-Select Coach -</option>
                                                    <option value="Hello">Hello</option>
                                                    <option value="Hello1">Hello1</option>
                                                    <option value="Hello2">Hello2</option>     
                                                </select>    
                                            </div>     
                                        </td>
                                        
                                        <td>
                                            <button type="submit" name ="submit" class="save_surf" style="color:#fff; background-color: #030c14">accept</a>
                                        </td>

                                        <td>
                                            <div class="outofdate">
                                                <a href="<?php url("surf/reserveDeclineCoach/".$row['surf_package_booked_id'].'/'.$row['email']);?>" class="edit" style="color:#ffff;">decline</a>
                                            </div>
                                        </td>
                                        </form>
                                        <?php } else { ?>
                                        <td>
                                                <?php echo $row['coach']; ?>         
                                        </td>
                                        
                                        <td>
                                            <div class="outofdate">
                                                <a href="#" class="edit" style="color:#ffff;">checked</a>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="outofdate">
                                                <a href="#" class="edit" style="color:#ffff;">checked</a>
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