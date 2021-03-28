<?php 
   // Header
   $title = "Customer View page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Customer View";
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
                        <h4>Customer View 
                        <span>
                            <a href="<?php url("customer/index"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("customer/details/".$customer['customer_id']); ?>" class="refresh"><i class="material-icons">loop</i></a>    
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Include Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="#" method="post" class="addnewform">

                    <div class="section1">
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">admin_panel_settings</i>Customer ID:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['customer_id'])){
                                            echo 'value="' . $customer['customer_id'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['customer_id'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['first_name'])){
                                            echo 'value="' . $customer['first_name'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['first_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['last_name'])){
                                            echo 'value="' . $customer['last_name'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['last_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Age:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['age'])){
                                            echo 'value="' . $customer['age'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['age'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Location:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['location'])){
                                            echo 'value="' . $customer['location'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['location'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['email'])){
                                            echo 'value="' . $customer['email'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['email'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($customer['contact_number'])){
                                            echo 'value="' . $customer['contact_number'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($customer['contact_number'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>
                        
                                              
                    </div>

                    <div class="section2"> 

                    </div>

                    </form>
                </div>  <!--End Card Body -->

                <div class="cardheader">
                   <div class="options">
                       <h4>All Reservations</h4>
                   </div>
                   <p class="textfortabel">Reservations View of Customer Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Customer Name</th>                
                                <th>Room Number</th>
                                <th>Room Price</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>
                                <th>Payment Method</th>
                            </thead>
                            <?php foreach($reservations as $row): ?>
                            <tbody>
                                <td><?php echo $row['first_name'];?></td>
                                <td><?php echo $row['room_number'];?></td>
                               
                                <td><?php echo $row['price'];?></td>
                                <td> 
                                    <div class="in">
                                        <?php  echo $row['check_in_date'];?>
                                    </div>
                                </td>    
                                <td>
                                    <div class="out">
                                        <?php  echo $row['check_out_date'];?>
                                    </div>
                                </td>
                                <td>
                                <?php 
                                        if($row['payment_method'] == "ONLINEONLINE") {
                                            echo "ONLINE";
                                        }
                                        elseif($row['payment_method'] == "CASHONLINE") {
                                            echo "CASH";
                                        }
                                        else {
                                            echo $row['payment_method'];
                                        }
                                ?>
                                </td>
                            </tbody>
                            <?php endforeach ?> 
                        </table>
                    </div>
                </div> 
                
            <div class="cardbody">  
                <form action="<?php url("report/generateCustomerReservations"); ?>" method="post" class="addnewform" target="_blank">
                    <div class="section1">
                        <input type="text" name="customer_id"  <?php echo 'value="' . $customer['customer_id'] . '"'?> hidden>
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">CustomPDF</button>
                            </div>
                        </div>                          
                    </div>

                    <div class="section2"> 

                    </div>

                </form>
            </div> 

               </div>  <!--End Card -->
            
        
        </div>
    </div>   <!-- End Table design -->
    
</div>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>



