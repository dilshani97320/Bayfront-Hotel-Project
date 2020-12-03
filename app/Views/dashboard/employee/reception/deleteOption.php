<style>

</style>
<?php 

// Header
   $title = "Reception Delete page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Select Option Page";
       $search = 0;
       $search_by = 'name';
       $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>

<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Reception Delete Option Page
                       <span>
                            <a href="<?php url("reception/index"); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Reception Table</a>  
                       </span>
                       </h4>
                   </div>
                   <p class="textfortabel">Select Reception Choice</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="text">
                                <?php echo $reception['username']."<br>"; ?>
                                Remove From Reception Post
                            </div>
                            <a href="<?php url('reception/editPost/'.$reception['emp_id'].'/'.$reception['reception_user_id']);?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                Remove 
                                <?php echo "<br>".$reception['username']; ?>
                                Employee
                            </div>
                            <a href="<?php url('employee/delete/'.$reception['emp_id']);?>"></a>
                        </div>
                    </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
