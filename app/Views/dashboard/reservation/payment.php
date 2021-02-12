<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BURL.'assets/css/bookingform.css'; ?>" />
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <title>Pay-Now|Form</title>
</head>
<body>
    <?php 
                    $date1=date_create($reservation['check_in_date']);
                    $date2=date_create($reservation['check_out_date']);
                    $diff=date_diff($date1,$date2);
                    $days = $diff->format("%a");
                    $total_price = $days*$room['price'];
                    $total_price = $total_price + 4.83;
                
    ?>
    <section class="bookingform">
        <div class="row">
            <div class="form">
                <div class="signredirect">
                    <div class="logoimg">
                        <img src="<?php echo BURL.'assets/img/basic/logo.png'; ?>" alt="">
                    </div>
                    <div class="description">
                        <div class="line1">
                            <span class="sign1">Welcome from bayfront hotel System!!</span>
                            <!-- <a href="#" class="sign2">Signin</a> -->
                        </div>
                        <span class="sign3">Your Reservation accepted form bayfront hotel mangement and then you can PAY NOW</span>
                    </div>
                </div>
                <div class="contactdetails">
                    <h5>Let us know who you are</h5>
                    <form action="<?php url("payment/payonline"); ?>" method="post" id="payment-form">
                        <!-- This is may reset according to form -->
                        <!-- $first_name = $POST['first_name'];
                $email = $POST['email'];
                $room_name = $POST['room_name'];
                $room_view = $POST['room_view'];
                $room_price = $POST['room_price'];
                $payment_way = $POST['payment_way'];
                $customer_id = $POST['customer_id'];
                $reservation_id = $POST['reservation_id'];
                $token = $POST['stripeToken']; -->
                        <input type="text" name="customer_id" value ="<?php echo $customer['customer_id']; ?>" hidden  >
                        <input type="text" name="reservation_id" value ="<?php echo $reservation['reservation_id']; ?>" hidden  >
                        <input type="text" name="room_name" value ="<?php echo $room['room_name']; ?>" hidden>
                        <input type="text" name="room_view" value ="<?php echo $room['room_view']; ?>" hidden>
                        <input type="text" name="room_price" value ="<?php echo $total_price?>" hidden>
                        <!-- <input type="text" name="check_in_date">
                        <input type="text" name="check_out_date"> -->
                        <div class="rowlong1">
                            <div class="rowdata1">
                                <label for="#">First Name
                                    <?php if($customer['first_name'] == ""){ ?>
                                        <i class="fa fa-exclamation-circle"></i>
                                    <?php } else {?>
                                        <i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i>
                                    <?php } ?>     
                                </label>
                                <input type="text" class="inputrow" name="first_name" autocomplete="off"
                                <?php 
                                        if(isset($customer['first_name'])){
                                            echo 'value="' . $customer['first_name'] . '"';
                                        }       
                                    
                                ?>
                                
                                readonly>
                            </div>
                            <div class="rowdata1">
                                <label for="#">Last Name
                                    <?php if($customer['last_name'] == ""){ ?>
                                        <i class="fa fa-exclamation-circle"></i>
                                    <?php } else {?>
                                        <i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i>
                                    <?php } ?>  
                                    
                                </label>
                                <input type="text" class="inputrow" name="last_name" autocomplete="off"
                                <?php 
                                        if(isset($customer['last_name'])){
                                            echo 'value="' . $customer['last_name'] . '"';
                                        }       
                                    
                                ?>
                                readonly>
                            </div>
                        </div>

                        <div class="rowlong">
                            <label for="#">Email
                                <?php if($customer['email'] == ""){ ?>
                                        <i class="fa fa-exclamation-circle"></i>
                                    <?php } else {?>
                                        <i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i>
                                    <?php } ?>
                            </label>
                            <input type="text" class="inputrow" name="email" autocomplete="off"
                            <?php 
                                        if(isset($customer['email'])){
                                            echo 'value="' . $customer['email'] . '"';
                                        }       
                                    
                                ?>
                            readonly>
                        </div>

                        <div class="rowlong1">
                            <div class="rowdata1">
                                <label for="#">Contact Number
                                    <?php if($customer['contact_number'] == ""){ ?>
                                        <i class="fa fa-exclamation-circle"></i>
                                    <?php } else {?>
                                        <i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i>
                                    <?php } ?>
                                </label>
                                <input type="text" class="inputrow" autocomplete="off"
                                <?php 
                                        if(isset($customer['contact_number'])){
                                            echo 'value="' . $customer['contact_number'] . '"';
                                        }       
                                    
                                ?>
                                readonly>
                            </div>
                            <div class="rowdata1">
                                <label for="#">Payment Selection</label>
                                 <select name="payment_way" class="inputrow">
                                         <option value="ONLINEPAY">-Select Payment PART-</option>
                                         <option value="ONLINEHALF" style="border: none">HALF PAYMENT</option>      
                                         <option value="ONLINEFULL" style="border: none">FULL PAYMENT</option>      
                                </select>
                            </div>
                        </div>
                        <div class="rowlong">
                            <label for="#">Credit Card Details
                                <i class="fa fa-exclamation-circle"></i>
                                <i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i>
                            </label>
                           
                                <div id="card-element" class="paymentcardform inputrow">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
    
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="buttonrow">
                            <!-- <button type="submit" class="buttonnow">Pay Now</button> -->
                            <button>Pay Now</button>
                        </div>
                        
                        
                    </form>
                    
                </div>
            </div>
        </div>
        <aside class="roomdetails">
            <div class="detailsroom">
                <div class="dates">
                    <h4><span><i class="fa fa-calendar"></i>Check In Date</span><?php echo $reservation['check_in_date']; ?></h4>
                    <h4><span><i class="fa fa-calendar"></i>Check Out Date</span><?php echo $reservation['check_out_date']; ?></h4>
                    <strong>1 x Room Assigned on Arrival</strong>
                </div>
                <div class="roomrow">
                    <h4><span>Room Number</span><?php echo $room['room_number']; ?></h4>
                    <h4><span><i class="fa fa-users"></i>Max Guest </span><?php echo $room_type['max_guest']; ?> Adults</h4>
                </div>
            </div>

            <div class="detailsroomprice">
                <div class="priceroom">
                    <h4><span>Price(1 room x 1 night)</span>$ <?php echo $room['price']; ?></h4>
                    <h4><span>Booking fees</span><strong class="vital">FREE</strong></h4>
                    <strong class="vital2">Included in price:
                        <br>
                        Hotel tax and service fees $ 4.83
                    </strong>
                </div>
                <div class="roomrow1">
                    <h4><span>Price<i class="fa fa-info-circle"></i></span>$ <?php echo $total_price; ?></h4>
                </div>
            </div>

        </aside>
    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?php echo BURL.'assets/js/charge.js'; ?>"></script>
</body>
</html>