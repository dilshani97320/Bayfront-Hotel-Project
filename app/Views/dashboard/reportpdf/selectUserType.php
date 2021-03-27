<style>

</style>
<?php 

// Header
   $title = "User Select page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Select User Type Page";
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
                       <h4>Report Select User Option Page
                       <span>
                            <a href="<?php url("report/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        </span>
                        </h4>
                   </div>
                   <p class="textfortabel">Select Report User Choice or User View Details</p>
               </div>
               
                    <div class="badgeSec">

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                Customers
                            </div>
                            <a href="<?php url('customer/selectOption');?>"></a>
                        </div>
                        
                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fa fa-user-tag"></i>
                            </div>
                            <div class="text">
                                Receptions
                            </div>
                            <a href="<?php url('reception/viewAll');?>"></a>
                        </div>

                        
                    </div>

           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
