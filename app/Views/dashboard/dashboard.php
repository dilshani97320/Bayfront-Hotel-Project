
<?php 

 // Header
    $title = "Home page";
    include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">

        
    <?php 
    
        $navbar_title = "Home Page";
        $search = 0;
        $search_by = 'name';
        
        include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
        include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>
        
        <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">
                <div class="cardheader">
                    <div class="options">
                        <h4>Home Page</h4>    
                    </div>
                    <p class="textfortabel">See What is Complete</p>
                </div>
                <div class="cardbody">
                        <h4>Owner email= wtgihan@gmail.com and Password = 1111</h4>
                        <h4>Reception email= wtgihan@gmail.com and Password = 1234</h4>
                        <h4>1.Employee Page (Admin)</h4>
                        <h4>2.Add New Employee Page (Admin)</h4>
                        <h4>3.Modify Employee Page (Admin)</h4>
                        <h4>4.Room Page (Reception)</h4>
                        <h4>5.Room View Page Update (Reception)</h4>
                        <h4>5.Login Error Checking and view (Reception and Owner)</h4>
                        <!-- <h4>6.Room Refresh #Done</h4>
                        <h4>7.Basic Reservation Page #Done But Payment Details Validation NOT DONE</h4> -->

                </div>
            </div> 
        </div>
    </div>

</div>   
    

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
