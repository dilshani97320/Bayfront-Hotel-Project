
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
       $url = "payment/cashIndex";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
       
    <!-- Table design -->
   <div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Payment CASH Page   
                       <span>
                            <a href="<?php url("payment/selectOption"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                            <a href="<?php url("payment/cashIndex"); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Customer View Following Table and Payment $4.83 include tax</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Reception</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Room Name</th>
                                <th>Price</th>
                                <th>Check-In</th>
                                <th>Check-Out</th>
                                <th>Amount</th>
                                <th>Status</th>
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
                                <td><?php echo $row['last_name'];?></td>
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
                                    <td>
                                        <div class="outofdate">
                                            <a href="<?php url('payment/detailsView/'.$row['reservation_id'].'/'.$row['customer_id'].'/'.$total_price.'/'.$row['price'].'/'.$row['room_name']);?>" class="edit" style="color:#ffff;">Check</a>
                                        </div>
                                    </td>
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