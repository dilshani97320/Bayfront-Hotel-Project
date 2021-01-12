<style>

</style>
<?php 

// Header
   $title = "Report Genarate  page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Report Generate Page";
       $search = 0;
       $search_by = 'name';
      // $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>

<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>All Report Generation Page</h4>
                   </div>
                   <p class="textfortabel">Select Report Choice</p>
               </div>
               
                    <div class="badgeSec">
                    <div class="horBadge">
                        
                        <div class="icon1">
                            <i class="fas fa-user-tag"></i>
                        </div>
                        <div class="text">
                             Employees
                        </div>
                        <a href="<?php url('report/empdetails');?>"></a>
                    </div>


                    <div class="horBadge">
                    
                    <div class="icon1">
          
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="text">
                         Rooms
                    </div>
                    <a href="<?php url('report/roomdetails');?>"></a>
                </div>


                <div class="horBadge">
                    
                        <div class="icon1">
                        <i class="fas fa-users"></i>
                        </div>
                        <div class="text">
                             Customers
                        </div>
                        <a href="<?php url('report/customerdetails');?>"></a>
                    </div>
                  
                    <div class="horBadge">
                    
                        <div class="icon1">
                        <i class="fas fa-address-book"></i>
                        </div>
                        <div class="text">
                             Reservations
                        </div>
                        <a href="<?php url('report/reservationdetails');?>"></a>
                    </div>


                    <div class="horBadge">
                    
                        <div class="icon1">
                        <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <div class="text">
                             Payments
                        </div>
                        <a href="<?php url('report/paymentdetails');?>"></a>
                    </div>


                    <div class="horBadge">
                        <div class="icon2">
                        <i class="fas fa-skiing"></i>
                        </div>
                        <div class="text">
                            Surf Packages
                        </div>
                        <a href="<?php url('report/surfdetails');?>"></a>
                    </div>
                


                    </div>


                    <section class="repo-main">

<h3>Enter the date to get Report</h2>
  <form method="get" action="daily.php">
    <select name='check_in_date'>
      <?php
            $query=mysqli_query($connection,"select * from reservation");
            while ($date =mysqli_fetch_array($query)) {
              echo "<option value='".$date['check_in_date']."'>".$date['check_in_date']."</option>";
            }
      ?>
    </select>
<input type="submit" name="submit1" class="sub-btn" value="Generate">

<!--<h3>Enter Time Duration to get Report</h2>
<form method="get">
<label>Start date</label>
<input type="date" name="start_date" >
<?php echo $start_date_error; ?>
<label>End date</label>
<input type="date" name="end_date" >
<?php echo $end_date_error; ?>

<input type="submit" name="submit" class="sub-btn">-->
</form>

</section>



           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
