
<style type="text/css">
  *{
  margin: 0;
  padding:0;
}
.wrapper{
  margin: 15px auto;
    max-width: 1100px;
    position: relative;
    background: #8ba8c2;
    

}
.header{
  padding: 20px;
}
.header h1{
letter-spacing: 2px;
  font-weight: 600;
  margin-left: 15px;
  margin-bottom: 20px;
  text-align: center;

}
.repo-btn{
  padding: 20px;
  align-content: center;

}
.repo-btn a{
  margin: 10px;
  cursor: pointer;
    display: inline-block;
    zoom: 1;
    background: #0f2a42;
    color: #fff;
    border: 1px solid #0b1c2a;
    border-radius: 4px;
    padding: 25px 40px;
    text-decoration: none;


}
.repo-main{
  padding: 20px;
  margin-top: 20px;

}
.repo-main h3{
  font-size: 20px;
  margin-bottom: 30px;
}
.repo-main label{
display: inline-block;
margin-bottom: 10px;
}
.repo-main input{
display: inline-block;
padding: 5px 10px;
border-radius: 5px;
border-style: none;
}
.sub-btn{
  padding: 10px;
  background: #0f2a42;
  color:#fff; 
     margin:10px;

}



</style>

<?php 

// Header
   $title = "Report page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Report Generator ";
       $search = 0;
       $search_by = 'Room Number';
       //$url = "reservation/details";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>All Room Reservations Page  
                       <span>
                            <?php if($_SESSION['user_level'] != "Owner"): ?>
                                <a href="<?php url("reservation/index"); ?>" class="addnew"><i class="material-icons">add_circle</i></a> 
                            <?php endif; ?>
                            <a href="<?php url("reservation/details"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                        
                       </h4>
                   </div>
                   <p class="textfortabel">Rooms Reservations View Following Table</p>
               </div>
               <div class="cardbody">
               
<div class="wrapper">
 <section class="header">
  <h1>WELCOME BAY FRONT</h1>

  
 </section>
 <section class="repo-btn">
  <a href="<?php url("report/empdetails"); ?>">Employees</a>
  <a href="rooms-report.php">Rooms</a>
    <a href="customer.php">Customers</a>
    <a href="reservation.php">Reservation</a>
    <a href="payment.php">Payment</a>
    <a href="#">Surf-Packages</a>

 </section>



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

                </div>  <!--End Card Body -->
           </div> 
       </div>
   </div>

</div>   
   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>