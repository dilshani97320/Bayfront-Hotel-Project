<?php 

// Header

   $title = "Edit web page";

   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">

    <?php 
   
       $navbar_title = "Feedback Modify Page";
       $search = 1;
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
                        <h4>Current Rooms
                        </h4>
                    </div>
                    <p class="textfortabel">Room View Following Table</p>
                </div>
                <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Room Number</th>
                                <th>Room Name</th>
                                <th>Room Type</th>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <th>View Review</th>
                                <th>View In Website</th>
                                <?php endif; ?>
                            </thead>

                            <?php foreach($rooms as $row): ?>
                            <tbody>
                                <td><?php echo $row['room_number'];?></td>
                                <td><?php echo $row['room_name'];?></td>
                                <td><?php echo $row['type_name'];?></td>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <td><a href="<?php url('feedback/viewFeedback/'.$row['room_id']);?>" class="edit"><i
                                            class="material-icons">edit</i>Open Review</a></td>

                                <td><a href="<?php url('RoomSuite/ViewRoom/'.$row['room_number']);?>" class="view"><i
                                            class="material-icons">visibility</i>View Room</a></td>
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