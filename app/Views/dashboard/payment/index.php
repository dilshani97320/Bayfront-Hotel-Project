
<?php 

// Header
   $title = "Payment page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Payment Page";
       $search = 1;
       $search_by = 'name';
       if(isset($pay_online) && !isset($pay_all)) {
            $url = "payment/onlineIndex";
       }if(isset($pay_all) && !isset($pay_online)) {
            $url = "payment/allIndex";
       }if(!isset($pay_all) && !isset($pay_online)) {
            $url = "payment/cashIndex";
       }   
       
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
      
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                    <?php if(isset($pay_online) && !isset($pay_all)) { ?>
                        <h4>Payment Online Page   
                       <span>
                            <a href="<?php url("payment/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("payment/onlineIndex"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                       </h4>
                    <?php }if(isset($pay_all) && !isset($pay_online)) { ?>
                       <h4>All Payments Page   
                       <span>
                            <a href="<?php url("payment/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("payment/allIndex"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                       </h4>
                       <p class="textfortabel">Cash Payments only can Edit By Owner</p>
                    <?php }if(!isset($pay_all) && !isset($pay_online)) { ?>
                       <h4>Payment CASH Page   
                       <span>
                            <a href="<?php url("payment/option"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("payment/cashIndex"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                       </h4>
                    <?php } ?>
                       
                   </div>
                   <p class="textfortabel">Customer View Following Table and Payment $4.83 include tax</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Reception</th>
                                <th>First Name</th>
                                <?php if(!isset($pay_all)) { ?>
                                    <th>Last Name</th> 
                                <?php }?>
                                <th>Email</th>
                                <th>Room Name</th>
                                <th>Price</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <?php if(isset($pay_all)) { ?>
                                    <?php if($_SESSION['user_level'] == "Owner"): ?>
                                        <th>Edit</th>
                                    <?php endif; ?> 
                                <?php }?>
                            </thead>
                            <?php foreach($customer as $row): ?>
                            <tbody>
                                <td><?php
                                        if($row['username'] === "OnlineReceptionBot") {
                                            echo "ONLINE";
                                        }
                                        else {
                                            echo $row['username'];
                                        }
                                    ?>
                                </td>
                                <td><?php echo $row['first_name'];?></td>

                                <?php if(!isset($pay_all)) { ?>
                                    <td><?php echo $row['last_name'];?></td>
                                <?php }?>

                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['room_name'];?></td>
                                <td><?php echo $row['price'];?></td>
                                <td><?php echo $row['check_in_date'];?></td>
                                <td><?php echo $row['check_out_date'];?></td>
                                <td>
                                    <div class="in">
                                        <?php 
                                            $date1=date_create($row['check_in_date']);
                                            $date2=date_create($row['check_out_date']);
                                            $diff=date_diff($date1,$date2);
                                            $days = $diff->format("%a");
                                            $total_price = $days*$row['price'];
                                            $total_price = $total_price + 4.83;

                                            echo $total_price;
                                        ?>
                                    </div>
                                </td>
                                <?php if(isset($pay_online) && !isset($pay_all)) { ?>
                                    <td>
                                        <div class="outofdate">
                                            <a href="<?php url('payment/detailsView/'.$row['reservation_id'].'/'.$row['customer_id'].'/'.$total_price.'/'.$row['price'].'/'.$row['room_name'].'/'.$pay_online);?>" class="edit" style="color:#ffff;">Check</a>
                                        </div>
                                    </td>
                                <?php }if(isset($pay_all) && !isset($pay_online) ) {  $pay_online = 0; ?>
                                    <td>
                                        <div class="outofdate">
                                            <a href="<?php url('payment/detailsView/'.$row['reservation_id'].'/'.$row['customer_id'].'/'.$total_price.'/'.$row['price'].'/'.$row['room_name'].'/'.$pay_online.'/'.$pay_all);?>" class="edit" style="color:#ffff;">Check</a>
                                        </div>
                                    </td>
                                    
                                    <!-- Check Owner -->
                                    <?php if($_SESSION['user_level'] == "Owner"): ?> 
                                        <!--Check Cash Payment  -->
                                        <?php if($row['payment_method'] == "CASH" || $row['payment_method'] == "CASHONLINE" ) { ?>
                                        <?php 
                                            date_default_timezone_set("Asia/Colombo");
                                            $current_date = date('Y-m-d');    
                                        ?>
                                        <!-- Check current Date -->
                                        <?php if($row['check_in_date'] < $current_date ) { ?>
                                            <td><a href="#" onclick="return confirm('Can not Do Out of Date Edit Sorry!!?');" class="edit"><i class="material-icons">create</i></a></td>
                                        <?php } else { $editView = 1; ?>
                                            <td><a href="<?php url('payment/detailsView/'.$row['reservation_id'].'/'.$row['customer_id'].'/'.$total_price.'/'.$row['price'].'/'.$row['room_name'].'/'.$pay_online.'/'.$pay_all.'/'.$editView);?>" class="edit"><i class="material-icons">create</i></a></td>
                                            <?php unset($editView); ?>
                                        <?php } ?>
                                        
                                        <?php }else { ?>
                                            <td><a href="#" onclick="return confirm('Can not Do Online Edit Sorry!!?');" class="edit"><i class="material-icons">create</i></a></td>
                                        <?php } ?>
                                    <?php endif; ?> 

                                    <?php unset($pay_online); ?>
                                <?php }if(!isset($pay_all) && !isset($pay_online)) { ?>
                                    <td>
                                        <div class="outofdate">
                                            <a href="<?php url('payment/detailsView/'.$row['reservation_id'].'/'.$row['customer_id'].'/'.$total_price.'/'.$row['price'].'/'.$row['room_name']);?>" class="edit" style="color:#ffff;">Check</a>
                                        </div>
                                    </td>
                                <?php } ?>
                                
                            </tbody>
                            <?php endforeach ?> 
                        </table>
                    </div>
                </div>  <!--End Card Body -->
           </div> 
       </div>
   </div>

</div>   
   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>