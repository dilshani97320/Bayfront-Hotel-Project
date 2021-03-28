<?php 
   // Header
   $title = "Customer View page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Customer Bill View";
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
                        <h4>Customer Report View 
                        <span>
                            <a href="<?php url("notification/checkOutMark"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("notification/viewDeparturedCustomer/".$customer['customer_id']); ?>" class="refresh"><i class="material-icons">loop</i></a>    
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
                   <p class="textfortabel">Reservations View Following Table</p>
               </div>

               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Room Name</th>                
                                <th>Room Price</th>
                                <th>Discount</th>
                                <th>Amount</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>
                                <th>Payment Method</th>
                            </thead>
                            <?php 
                                $TotalRoomPrice = 0;
                                $i = 0;
                            ?>
                            <?php foreach($reservations as $row): ?>
                            <tbody>
                                <td><?php echo $row['room_name'];?></td>
                                <td><?php echo $row['price'];?></td>
                               
                               <!-- Discount date hase process -->
                               <?php 
                                if($row['discount_rate'] == 0) {
                                    $discount = 0;
                                }
                                else {
                                    if($row['check_in_date'] < $row['end_date'] && $row['check_in_date'] >= $row['start_date']) {
                                        $discount = $row['discount_rate'];
                                    }
                                    else {
                                        $discount = 0;
                                    }
                                }

                                $date1=date_create($row['check_in_date']);
                                $date2=date_create($row['check_out_date']);
                                $diff=date_diff($date1,$date2);
                                $days = $diff->format("%a");
                                $total_price = $days*$row['price'];
                                $total_price = $total_price;
                                $real_price = $total_price - $total_price*($discount/100);
                                
                                $TotalRoomPrice = $TotalRoomPrice + $real_price;
                                $roomPriceID[$i]['roomPriceValueDays']= $real_price; 
                                $roomPriceID[$i]['reservation_id']= $row['reservation_id']; 
                                $i++;
                               ?>

                                <td><?php echo $discount;?></td>

                                <td>

                                <?php 
                                    echo $real_price;
                                ?>
                                </td>
                                <td> 
                                    <div class="outofdate">
                                        <?php  echo $row['check_in_date'];?>
                                    </div>
                                </td>    
                                <td>
                                    <div class="outofdate">
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
                            <?php 
                                $_SESSION['roomPrices'] = $roomPriceID;
                            ?>
                        </table>

                    </div>
               </div>  <!-- End Card Body-->

               <div class="cardheader">
                    <div class="options">
                        <h4>Customer Report View 
                        <span>
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Include Following Details</p>
               </div>

                <?php 
                $serviceCharge = $TotalRoomPrice*(10/100);
                $TotalPrice = $TotalRoomPrice + $serviceCharge - $paidValue;
                $TotalPrice= round($TotalPrice, 3);
                ?>
                <div class="cardbody">  
                    <?php if($TotalPrice == 0) { ?>
                        <form action="<?php url("report/generateCustomBill"); ?>" method="post" class="addnewform" target="_blank">
                    <?php }else { ?>
                        <form action="<?php url("payment/paycashOnlineReservations"); ?>" method="post" class="addnewform">
                    <?php } ?>
                    

                    <div class="section1">
                        <input type="text" name="customer_id"  <?php echo 'value="' . $customer['customer_id'] . '"'?> hidden>
                        
                        <?php 
                            // print_r($reservationIDS);
                            // die();
                            $_SESSION['reservationIDS'] = $reservationIDS;
                        ?>
                        <input type="text"  autocomplete="off" name="first_name" <?php echo 'value="' . $customer['first_name'] . '"'?> hidden>
                        <input type="text"  autocomplete="off" name="last_name" <?php echo 'value="' . $customer['last_name'] . '"'?> hidden>
                        <input type="email"  autocomplete="off" name="email" <?php echo 'value="' . $customer['email'] . '"'?> hidden>
                        <input type="text"  autocomplete="off" name="contact_number" <?php echo 'value="' . $customer['contact_number'] . '"'?> hidden>
                        <div class="row">
                            <label for="#"><i class="material-icons">price_check</i>Total:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField" name="total_price"
                                    <?php 
                                        if(isset($TotalRoomPrice)){
                                            echo 'value="' . $TotalRoomPrice . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($TotalRoomPrice == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">sell</i>Service Charge:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        
                                        if(isset($serviceCharge)){
                                            echo 'value="' . $serviceCharge . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($serviceCharge == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">sell</i>Paid Value:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField" name="new_paid_amount"
                                    <?php 
                                        if(isset($paidValue)){
                                            echo 'value="' . $paidValue . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($paidValue == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">request_quote</i>Due Price:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField" name="amount"
                                    <?php 
                                        if(isset($TotalPrice)){
                                            echo 'value="' . $TotalPrice . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($TotalPrice == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <?php if($TotalPrice == 0) { ?>
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">CustomBill</button>
                            </div>
                        </div>
                       <?php }else { ?>
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Pay Now</button>
                            </div>
                        </div>
                       <?php } ?>
                        
                        
                                              
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



