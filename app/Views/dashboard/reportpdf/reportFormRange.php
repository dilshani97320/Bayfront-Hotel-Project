<?php 
   // Header
   $title = "Report Generate page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Search Room Page";
            $search = 0;
            $search_by = '#';
       
            include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>

    <?php 
        if(isset($errors['date'])) {
            echo '<script>alert("'.$errors['date'].'!!")</script>';
        }
    ?>

    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>Report Generate 
                        <span>
                            <a href="<?php url("report/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                       </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    
                    <form action="<?php url("report/reportRange"); ?>" method="post" target="_blank" class="addnewform">

                    <div class="section1">

                        <input type="text" name="owner_user_id" value ="<?php echo $_SESSION['user_id']; ?>" hidden  >
                        

                        

                        <div class="rowdate">
                            <label for="#"><i class="material-icons">today</i>Start Date:</label>
                                <!-- <div class="animate-formdate"> -->
                                    <input type="date"  autocomplete="off" name="start_date" class="inputFieldDate" 
                                    <?php 

                                        date_default_timezone_set("Asia/Colombo");
                                        $current_date = date('Y-m-d');
                                        if(isset($report['start_date'])){
                                            echo 'value="' . $report['start_date'] . '"';
                                        }
                                        else {
                                            echo 'value="'.$current_date .'"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                    <label for="name" class="label-name">
                                        <?php if((isset($errors)) && (isset($report['start_date']))): ?>
                                            <span class="content-name"><i class="material-icons">info</i>No ROOMS Available</span>
                                        <?php endif; ?>
                                    </label>    
                                <!-- </div> -->
                        </div>
                        

                        <div class="rowdate">
                            <label for="#"><i class="material-icons">today</i>End Date:</label>
                                <!-- <div class="animate-form"> -->
                                    <input type="date"  autocomplete="off" name="end_date" class="inputFieldDate" 
                                    <?php 
                                        date_default_timezone_set("Asia/Colombo");
                                        $current_date = date('Y-m-d');
                                        if(isset($report['end_date'])){
                                            echo 'value="' . $report['end_date'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                    <label for="name" class="label-name">
                                        <?php if((isset($errors)) && (isset($report['end_date']))): ?>
                                            <span class="content-name"><i class="material-icons">info</i>No ROOMS Available</span>
                                        <?php endif; ?>
                                    </label>   
                                <!-- </div>      -->
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Maitainence Cost:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="cost" class="inputField" maxlength="6" minlength="4" id="salary" oninput="validationSalary()"
                                    <?php 
                                        if(isset($report['cost'])){
                                            echo 'value="' . $report['cost'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Per Month Cost and Must Min length 4 and Max length 6"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['cost'])) && (isset($report['cost']))){?>
                                                <span class="content-name" id="msg_salary"><i class="material-icons">info</i><?php echo $errors['cost']; ?></span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                    <span class="content-name" id="msg_salary"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">ReportPDF</button>
                            </div>
                        </div>

                    </div>

                    <div class="section2"> 

                    </div>

                    </form>
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>

<script src="<?php echo BURL.'assets/js/main.js'; ?>"></script>  
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




