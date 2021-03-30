<?php
// Header
$title = "Search Room page";
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
     if(isset($errors)) {
         echo '<script>alert("No Rooms Available Sorry!!")</script>';
     }
 ?>

    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>Room Search
                            <span>
                                <a href="<?php url("feedback/index"); ?>" class="addnew"><i
                                        class="material-icons">reply_all</i></a>
                            </span>
                        </h4>
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">
                    <?php 
                     if(!isset($customer['id'])) { 
                         $customer['id'] = 0;
                     }
                 ?>
                    <form action="<?php url("feedback/reply/".$customer['id']); ?>" method="post" class="addnewform">

                        <div class="section1">

                            <input type="hidden" name="feedback_id" value="<?php echo $review['feedback_id']; ?>">


                            <div class="rowdate">
                                <label for="#"><i class="material-icons">today</i>Guest Reply:</label>
                                <!-- <div class="animate-formdate"> -->


                                <label for="name" class="label-name">
                                    <?php echo $review['guest_review'] ?>
                                </label>
                                <!-- </div> -->
                            </div>

                            <div class="rowdate">
                                <label for="#"><i class="material-icons">today</i>Guest Rate:</label>
                                <!-- <div class="animate-form"> -->


                                <label for="name" class="label-name">
                                    <?php echo "5 out of ".$review['rating'] ?>
                                </label>
                                <!-- </div>      -->
                            </div>

                            <div class="row">
                                <label for="#"><i class="material-icons">today</i>Hotel Reply:</label>
                                <div class="animate-form">
                                    <textarea type="date" autocomplete="off" name="reply" class="inputFieldDate"
                                        required> <?php echo $review['hotel_reply'] ?></textarea>

                                    <label for="name" class="label-name">
                                        <?php if((isset($errors)) && (isset($details['check_out_date']))): ?>
                                        <span class="content-name"><i class="material-icons">info</i>No ROOMS
                                            Available</span>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>


                            <div class="row">
                                <div class="button">
                                    <button class="save" name="submit">Reply</button>
                                </div>
                            </div>

                        </div>

                        <div class="section2">

                        </div>

                    </form>
                </div>
                <!--End Card Body -->
            </div>
            <!--End Card -->


        </div>
    </div> <!-- End Table design -->

</div>

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>