<style>

</style>
<?php 

// Header
   $title = "Customers Type Select page";
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
                       <h4>Customer Type Select Page
                       <span>
                            <a href="<?php url("report/selectUserType"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        </span>
                        </h4>
                   </div>
                   <p class="textfortabel">Select Customer Type</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="text">
                                All Customers
                            </div>
                            <a href="<?php url('customer/index');?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-ban"></i>
                            </div>
                            <div class="text">
                                Blacklist Customers
                            </div>
                            <a href="<?php url('customer/blacklist');?>"></a>
                        </div>   
                    </div>
                    
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
