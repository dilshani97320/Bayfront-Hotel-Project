<?php 
   // Header
   $title = "Add-Reservation page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Reservation Page";
            $search = 0;
            $search_by = '#';
       
            include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>
    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>New Reservation 
                        <!-- <span>
                            <a href="<?php //url("employee/index"); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Employee Table</a>  
                        </span> -->
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("reservation/create"); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <!-- Customer Part -->
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Contact Number:</label>
                            <input type="text" name="first_name" 
                            <?php 

                            if(!empty($reservation)) {
                                echo 'value="' . $reservation['first_name'] . '"';
                            }  

                            if(isset($errors)) {
                                echo 'value="' . $reservation['first_name'] . '"';
                            }
                            else if(isset($success)){
                                echo 'placeholder="Tharindu"';
                            }
                            else {
                                echo 'placeholder="Tharindu"';
                            }
                            
                            ?>
                            
                            >
                        </div>
                        <?php
                         $reservation= array('first_name' => "Tharindu"); 
                         $errors= array('first_name' => "less than 100 characters"); 
                        ?>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name"
                                    <?php 
                                        if(isset($reservation['first_name'])){
                                            echo 'value="' . $reservation['first_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Tharindu"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['first_name'])) && (isset($reservation['first_name']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i>Error of First Name</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name"
                                    <?php 
                                        if(isset($reservation['first_name'])){
                                            echo 'value="' . $reservation['first_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Tharindu"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['first_name'])) && (isset($reservation['first_name']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['first_name']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" value="Tharindu"
                                    <?php 

                                    // if(isset($_GET['cvv'])) {
                                    //     echo 'value="' . $_GET['cvv'] . '"';
                                    // } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    <label for="name" class="label-name">
                                        <span class="content-name"><i class="material-icons">info</i>Error of Your Email</span>
                                   
                                    </label>
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
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




<div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Credit Card Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="credit_card_number"
                                    <?php 
                                        if(isset($reservation['credit_card_number'])){
                                            echo 'value="' . $reservation['credit_card_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="XXXX-XXXX-XXXX-XXXX"';
                                        } 
                                    
                                    ?>
                                    
                                   
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['credit_card_number'])) && (isset($reservation['credit_card_number']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['credit_card_number']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                         

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Expire Month:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="expire_month"
                                    <?php 
                                        if(isset($reservation['expire_month'])){
                                            echo 'value="' . $reservation['expire_month'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="0778522736"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['expire_month'])) && (isset($reservation['expire_month']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['expire_month']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                         

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Expire Year:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="expire_year"
                                    <?php 
                                        if(isset($reservation['expire_year'])){
                                            echo 'value="' . $reservation['expire_year'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="0778522736"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['expire_year'])) && (isset($reservation['expire_year']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['expire_year']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        
 

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>CVV:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="cvv"
                                    <?php 
                                        if(isset($reservation['cvv'])){
                                            echo 'value="' . $reservation['cvv'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="0778522736"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['cvv'])) && (isset($reservation['cvv']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['cvv']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>







