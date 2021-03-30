<?php 

// Header

   $title = "Edit web page";

   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">

    <?php 
   
       $navbar_title = "Feedback Modify Page";
       $search = 0;
       $search_by = 'Room Number';
       $url = "editweb/index";

       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
    <div class="content">
        <div class="tablecard">
            <div class="card">
                <div class="cardheader">
                    <div class="options">
                        <h4>Current Reviews
                        </h4>
                    </div>
                    <p class="textfortabel">Guest Feedbacks Following Table</p>
                </div>
                <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Reservation Id</th>
                                <th>Guest Name</th>
                                <th>Guest Review</th>
                                <th>Guest Rate</th>
                                <th>Hotel Reply</th>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <th>Show Control</th>
                                <?php endif; ?>
                            </thead>

                            <?php foreach($review as $row): ?>
                            <tbody>
                                <td><?php echo $row['reservation_id'];?></td>

                                <?php foreach($customer as $value): ?>
                                <?php if($row['customer_id'] == $value['customer_id']): ?>
                                <td><?php echo $value['first_name'];?></td>
                                <?php endif; ?>
                                <?php endforeach ?>

                                <td><?php echo $row['guest_review'];?></td>

                                <td><?php echo $row['rating'];?></td>

                                <?php if( $row['hotel_reply'] ==""): ?>
                                <td><a href="<?php url('feedback/replyReview/'.$row['feedback_id']);?>" class="edit"><i
                                            class="material-icons">send</i>Reply</a></td>
                                <?php else: ?>
                                <td><?php echo $row['hotel_reply'];?></td>

                                <?php endif; ?>

                                <?php if($_SESSION['user_level'] == "Owner" ): ?>
                                <?php if( $row['is_show'] == "1"):  ?>
                                <td><a href="<?php url('feedback/hideReview/'.$row['feedback_id'].'/'.$room_id);?>"
                                        class="edit"><i class="material-icons">edit</i>Hide</a></td>
                                <?php else: ?>
                                <td><a href="<?php url('feedback/showReview/'.$row['feedback_id'].'/'.$room_id);?>"
                                        class="edit"><i class="material-icons">edit</i>Show</a></td>
                                <?php endif; ?>
                                <?php endif; ?>
                            </tbody>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
                <!--End Card Body -->
            </div>
        </div>
    </div>

</div>