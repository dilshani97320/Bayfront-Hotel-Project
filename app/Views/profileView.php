<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <title>BAYFRONT SURF</title>

</head>
<style>
.input-field {
    max-width: 80px;
    width: 100%;
    background-color: #fff;
    margin: 10px 0;
    height: 55px;
    border: 2px solid #000;
    border-radius: 10px;
    display: grid;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
}

.input-field i {
    text-align: center;
    line-height: 55px;
    color: #acacac;
    transition: 0.5s;
    font-size: 1.1rem;
}

.input-field input {
    background: transparent;
    outline: none;
    border: none;
    line-height: 1;
    font-weight: 500;
    font-size: 1.1rem;
    color: #333;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
    -webkit-background-color: transparent;
    transition: background-color 5000s ease-in-out 0s;
}

.commnt {
    width: 100px;
    background-color: #994112;
    border: none;
    outline: none;
    height: 49px;
    border-radius: 10px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    cursor: pointer;
    transition: 0.5s;
}

textarea {
    width: 100%;
    height: 75px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}

.bookings {
    margin-bottom: 20px;
    margin-left: 30px;
    font-size: 18px;
    font-weight: 600;
    color: #000;
}

dl.bookings dd {
    display: inline;
    font-size: 18px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-left: 30%;
}

dl.bookings dd:after {
    display: block;
    content: " ";
    clear: left;
    border-bottom: 2px solid #ccc;
    margin-bottom: 20px;
}

dl.bookings dt {
    display: inline-block;
    min-width: 200px;
    font-weight: 600;
    letter-spacing: 1px;
    font-size: 18px;
}

.profile {
    margin: 10px 50px 50px 50px;
    width: 1400px;
    font-size: 16px;
    display: flex;

    flex-direction: row;
    justify-content: space-between;
}

.profile .set2 {
    /* width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between; */
    flex: 3;
    padding: 20px;

}

.profile .set2 .bookBlock {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding: 20px;
    margin-bottom: 30px;
}

.profile .set2 .bookBlock h4 {

    margin-bottom: 30px;
}

.profile .set1 {
    /* width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between; */
    flex: 1;
    border-right: 2px solid #000;
}

.set1 .avatar {
    background-color: #ccc;
    border-radius: 50%;
    width: 40%;
    height: 4%;
    margin: auto;
}

.set1 .details h3 {
    text-align: center;
    margin-top: 10px;
}

.set1 .details h5 {
    text-align: center;
    margin-top: 10px;
}

.bookBlock h4 span {
    font-size: 16px;
    padding: 5px;
}

.cmtBlock {
    display: flex;

    flex-direction: row;
    justify-content: space-between;
}

.cmt {
    flex: 2;
    padding: 10px 50px;
}

.rating {
    display: inline-block;
    position: relative;
    height: 50px;
    line-height: 50px;
    font-size: 50px;
}

.rating label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    cursor: pointer;
}

.rating label:last-child {
    position: static;
}

.rating label:nth-child(1) {
    z-index: 5;
}

.rating label:nth-child(2) {
    z-index: 4;
}

.rating label:nth-child(3) {
    z-index: 3;
}

.rating label:nth-child(4) {
    z-index: 2;
}

.rating label:nth-child(5) {
    z-index: 1;
}

.rating label input {
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
}

.rating label .icon {
    float: left;
    color: transparent;
}

.rating label:last-child .icon {
    color: #000;
}

.rating:not(:hover) label input:checked~.icon,
.rating:hover label:hover input~.icon {
    color: #FFDF00;
}

.rating label input:focus:not(:checked)~.icon:last-child {
    color: #000;
    text-shadow: 0 0 5px #FFDF00;
}

.snip1568 {
    position: relative;
    display: inline-block;
    margin: 10px;
    width: 100%;
    color: #141414;
    text-align: left;
    line-height: 1.4em;
    font-size: 18px;
    box-shadow: none !important;
}

.snip1568 * {
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.snip1568 .profile-image img {
    border-radius: 5px;
    max-width: 100%;
    height: 80px;
    vertical-align: top;
    float: left;
}

.snip1568 figcaption {
    width: 100%;
    background-color: #333333;
    color: #fff;
    padding: 25px;
    display: inline-block;
    margin-bottom: 15px;
    border-radius: 5px;
    position: relative;
}

.snip1568 figcaption:after {
    content: '';
    position: absolute;
    left: 32px;
    top: 100%;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 10px 10px 0 10px;
    border-color: #333333 transparent transparent transparent;
}

.snip1568 h3,
.snip1568 h4,
.snip1568 p {
    margin: 0 0 5px;
}

.snip1568 h3 {
    font-weight: 600;
    font-size: 1.2em;
    font-family: 'Montserrat', Arial, sans-serif;
}

.snip1568 h4 {
    color: #8c8c8c;
    font-weight: 400;
    letter-spacing: 2px;
}

.snip1568 p {
    font-size: 0.9em;
    letter-spacing: 1px;
    opacity: 0.9;
}
</style>

<body>

    <?php include(VIEWS.'inc/header_navbar.php'); ?>

    <div class="profileCover">
        <img class="imageProf" src="<?php echo BURL.'assets/img/home/prof.svg' ?>">
        <div class="top-right">
            <h1> Welcome to the Hotel BayFront</h1>
        </div>
    </div>

    <div class="profile">
        <div class="set1">
            <div class="avatar"></div>
            <div class="details">
                <h3><?php echo $_SESSION['unreg_user_name']; ?> </h3>
                <h5><?php echo $_SESSION['unreg_user_email']; ?></h5>
            </div>
            <?php if(isset($customer_details)):?>

            <dl class="bookings">
                <dt>First Name:</dt>
                <dd><?php echo $customer_details['first_name']; ?></dd>
                <dt>Last Name:</dt>
                <dd><?php echo $customer_details['last_name']; ?></dd>
                <dt>Country</dt>
                <dd><?php echo $customer_details['location']; ?></dd>
                <dt>Contact Number</dt>
                <dd><?php echo $customer_details['contact_number']; ?></dd>
                <dt>Age</dt>
                <dd><?php echo $customer_details['age']; ?></dd>
            </dl>
            <?php endif;?>
        </div>

        <div class="set2">
            <?php  foreach ($reservation_details as $key=>$value): //var_dump($value); ?>
            <?php if ($value['request']== 0 && $value['is_valid']== 1):?>
            <div class="bookBlock">
                <h4> #Booking
                    <?php 
                        date_default_timezone_set("Asia/Kolkata"); 
                        $get = date("Y-m-d");
                            if ($get >= $value['check_out_date']):?>
                            <span style="background-color: red;">CHEK OUT</span>

                    <?php endif;?>
                    <?php   
                            if ($get < $value['check_in_date']): ?>
                            <span style="background-color: orange;">CHEK IN</span>
                            <?php  foreach ($rooms as $key1=>$value1): //var_dump($value); ?>
                                <?php  if($value1['room_id'] == $value['room_id']): //var_dump($value); ?>
                                    <?php if($value1['free_canselaration'] == 1): ?>
                                        <?php 
                                           $dateValid = date('Y-m-d',(strtotime ( '-2 day' , strtotime ( $value['check_in_date']) ) ));
                                        //    echo $dateValid; 
                                        //    echo $get;
                                            // die();
                                            if($get < $dateValid)  {
                                        ?>
                                        <span style="background-color: red;"><a href="<?php url('profile/cancelBooking/'.$value1['room_id'].'/'.$value['check_in_date'].'/'.$value['check_out_date'].'/'.$customer_details['email']);?>">CANCEL BOOKING</a></span>
                                        <?php } ?>
                                    
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                            
                            

                    <?php endif;?>
                    <?php 
                            if ($get >= $value['check_in_date'] && $get <= $value['check_out_date']): ?>
                            <span style="background-color: green;">PROCCESING</span>

                    <?php endif;?>



                </h4>

                <div class="pack">
                    <dl class="bookings">
                        <dt>Check In Date:</dt>
                        <dd><?php echo $value['check_in_date']; ?></dd>
                        <dt>Check Out Date:</dt>
                        <dd><?php echo $value['check_out_date']; ?></dd>
                        <dt>Total Nights:</dt>
                        <dd>
                            <?php
                                $date1=date_create($value['check_in_date']);
                                $date2=date_create($value['check_out_date']);
                                    $diff=date_diff($date1,$date2);
                                    if(isset($diff)){
                                        echo $diff->format("%a nights");
                                    }

                                ?>
                        </dd>

                        <?php  foreach ($rooms as $key1=>$value1): //var_dump($value); ?>
                        <?php  if($value1['room_id'] == $value['room_id']): //var_dump($value); ?>
                        <dt>Room Number:</dt>
                        <dd><?php echo $value1['room_number']; ?></dd>
                        <dt>Room Rate:</dt>
                        <dd><?php echo $value1['price']; ?> $</dd>
                        <dt>Total Rate:</dt>
                        <dd><?php 
                                $date1=date_create($value['check_in_date']);
                                $date2=date_create($value['check_out_date']);
                                $diff=date_diff($date1,$date2);
                                $string = $value1['price'];
                                $float1  = floatval($string);
                                $string = $diff->format("%a nights");
                                $float2  = floatval($string);;
                                // var_dump($float2);exit;
                                if(isset($diff)){
                                    echo $float1*$float2." $"; 
                                
                                }
                                ?>
                        </dd>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </dl>

                    <?php if ($value['check_out_status'] == "CHECKEDOUT"): ?>
                    <?php   $flag = 0; ?>
                    <?php  foreach ($review as $key1=>$value1): ?>

                    <?php if ($value['reservation_id'] == $value1['reservation_id'] ): ?>
                    <?php $flag++;?>
                    <?php endif;?>
                    <?php endforeach; ?>

                    <?php if ($flag == 1): ?>
                    <h5>Add your review</h5>
                    <form action="<?php url("profile/review"); ?>" method="post">
                        <input type="hidden" name="r_id" value="<?php echo $value['reservation_id']; ?>">
                        <div class="cmtBlock">
                            <div class="cmtt rating">
                                <label>
                                    <input type="radio" name="stars" value="1" />
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="2" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="3" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="4" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" name="stars" value="5" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                            </div>
                            <div class="cmt">
                                <textarea name="comment"></textarea>
                            </div>
                            <div class="cmtt">
                                <button type="submit" class="commnt" name="submitReview" value="Comment">Confirm
                                </button>
                            </div>
                        </div>
                    </form>

                    <?php else:?>
                    <?php  foreach ($review as $key1=>$value1): ?>
                    <?php if ($value['reservation_id'] == $value1['reservation_id'] ): ?>
                    <?php if ($value1['guest_review'] != NULL): ?>
                    <figure class="snip1568">
                        <figcaption>
                            <p><?php echo $value1['guest_review']; ?></p>
                        </figcaption>
                    </figure>
                    <?php endif;?>
                    <?php endif;?>
                    <?php endforeach; ?>



                    <?php endif;?>

                    <?php endif;?>
                </div>


            </div>
            <?php endif;?>
            <?php endforeach; ?>

        </div>

    </div>

    <?php include(VIEWS.'inc/footer.php'); ?>


    <script type="text/javascript">
    window.onload = function() {
        const navbar = document.querySelector(".nav");
        // console.log(navbar);
        navbar.classList.toggle("sticky");
    };

    $(':radio').change(function() {
        console.log('New star rating: ' + this.value);
    });
    </script>
</body>

</html>