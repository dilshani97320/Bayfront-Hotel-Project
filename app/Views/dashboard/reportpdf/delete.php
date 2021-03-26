<div class="cardbody">  
                    <form action="<?php url("reservation/create/"); ?>" method="post">

                    <div class="section1">

                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Total:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
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
                            <label for="#"><i class="material-icons">payment</i>Service Charge:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        $serviceCharge = $TotalRoomPrice*(10/100);
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
                            <label for="#"><i class="material-icons">payment</i>Sub Total:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                       $TotalPrice = $TotalRoomPrice + $serviceCharge;
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

                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">CustomBill</button>
                            </div>
                        </div>
                          
                    </div>

                    <div class="section2"></div>

                    </form>   
                </div>  <!--End Card Body -->



                <div class="cardheader">
                    <div class="options">
                        <h4>Customer Payments 
                        <span>    
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Include Following Details</p>
                </div>