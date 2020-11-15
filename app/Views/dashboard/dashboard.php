
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
    <div class="content1">
        <div class="container1">
               <div class="row1">

                <div class="data1">
                    <div class="card1">
                        <div class="card-header1">
                            <div class="card-icon1">
                                <i class="material-icons">meeting_room</i>
                            </div>
                            <p class="card-category">Rooms</p>
                            <h3 class="card-title">
                                49/50 <small class="special">GB</small>
                            </h3>
                        </div>
                        <div class="card-footer1">
                            <div class="status1">
                                <i class="material-icons" >update</i>
                                Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data1">
                    <div class="card1">
                        <div class="card-header1">
                            <div class="card-icon2">
                                <i class="material-icons">hotel</i>
                            </div>
                            <p class="card-category">Reservations</p>
                            <h3 class="card-title">
                                49/50 <small class="special">GB</small>
                            </h3>
                        </div>
                        <div class="card-footer1">
                            <div class="status1">
                                <i class="material-icons" >update</i>
                                Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data1">
                    <div class="card1">
                        <div class="card-header1">
                            <div class="card-icon3">
                                <i class="material-icons">monetization_on</i>
                            </div>
                            <p class="card-category">Income</p>
                            <h3 class="card-title">
                                49/50 <small class="special">GB</small>
                            </h3>
                        </div>
                        <div class="card-footer1">
                            <div class="status1">
                                <i class="material-icons" >update</i>
                                Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="data1">
                    <div class="card1">
                        <div class="card-header1">
                            <div class="card-icon4">
                                <i class="material-icons">people_alt</i>
                            </div>
                            <p class="card-category">Employess</p>
                            <h3 class="card-title">
                                49/50 <small class="special">GB</small>
                            </h3>
                        </div>
                        <div class="card-footer1">
                            <div class="status1">
                                <i class="material-icons" >update</i>
                                Just Updated
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           </div>
    </div>

</div>   
    

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
