<div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Reception Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="username" class="inputField"
                                    <?php 
                                        if(isset($user['emp_id'])){
                                            echo 'value="' . $user['emp_id'] . '"';
                                        }
                                        
                                    ?>
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($user['emp_id'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Not Granted</span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Granted</span>
                                            <?php } ?>
                                        </label>    
                                </div>     
 </div>




