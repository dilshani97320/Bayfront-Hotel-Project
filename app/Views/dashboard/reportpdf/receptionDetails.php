<?php 
   // Header
   $title = "Reception View page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Reception View Page";
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
                        <h4>View Reception Details
                        <span>
                            <a href="<?php url("reception/viewAll"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Reception has Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("reception/update"); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <input type="text" name="reception_user_id" value ="<?php echo $reception['reception_user_id']; ?>" hidden  >
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($reception['first_name'])){
                                            echo 'value="' . $reception['first_name'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['first_name'] == ""){ ?>
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
                                    <input type="text"  autocomplete="off" name="last_name" class="inputField"
                                    <?php 
                                        if(isset($reception['last_name'])){
                                            echo 'value="' . $reception['last_name'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['last_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="email" class="inputField"
                                    <?php 
                                        if(isset($reception['email'])){
                                            echo 'value="' . $reception['email'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['email'] == ""){ ?>
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
                                    <input type="text"  autocomplete="off" name="contact_num" class="inputField"
                                    <?php 
                                        if(isset($reception['contact_num'])){
                                            echo 'value="' . $reception['contact_num'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['contact_num'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="location" class="inputField"
                                    <?php 
                                        if(isset($reception['location'])){
                                            echo 'value="' . $reception['location'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['location'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Username:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="username" class="inputField" minlength="4" maxlength="20" id="first_name" oninput="validationFirstName()"
                                    <?php 
                                        if(isset($reception['username'])){
                                            echo 'value="' . $reception['username'] . '"';
                                        }
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($reception['location'] == ""){ ?>
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
                   <p class="textfortabel">Reservations View of Reception Following Table</p>
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
                <form action="<?php url("report/generateReceptionReservations"); ?>" method="post" class="addnewform" target="_blank">
                    <div class="section1">
                        <input type="text" name="reception_id"  <?php echo 'value="' . $reception['reception_user_id'] . '"'?> hidden>
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">ReceptionPDF</button>
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



