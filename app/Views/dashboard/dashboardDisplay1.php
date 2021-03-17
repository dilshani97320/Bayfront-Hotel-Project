<div class="container1">
               <div class="row1">

                    <div class="data1">
                        <div class="card1">
                            <div class="card-header1">
                                <div class="card-icon1">
                                    <i class="material-icons">night_shelter</i>
                                </div>
                                <p class="card-category">Rooms</p>
                                <h3 class="card-title">
                                    <?php echo $details['rooms']; ?>
                                    <small class="special">#</small>
                                </h3>
                            </div>
                            <div class="card-footer1">
                                <div class="status1">
                                    <i class="material-icons" >update</i>
                                    Just Updated
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="data1">
                        <div class="card1">
                            <div class="card-header1">
                                <div class="card-icon2">
                                    <i class="material-icons">hotel</i>
                                </div>
                                <p class="card-category">Reservations</p>
                                <h3 class="card-title">
                                    <?php echo $details['reservations']; ?>
                                    <small class="special">#</small>
                                </h3>
                            </div>
                            <div class="card-footer1">
                                <div class="status1">
                                    <i class="material-icons" >update</i>
                                    Just Updated
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="data1">
                        <div class="card1">
                            <div class="card-header1">
                                <div class="card-icon3">
                                    <i class="material-icons">monetization_on</i>
                                </div>
                                <p class="card-category">Income</p>
                                <h3 class="card-title">
                                    <?php 
                                    $income = (int)$details['income'];
                                    echo $income; ?> 
                                <small class="special">Lkr</small>
                                </h3>
                            </div>
                            <div class="card-footer1">
                                <div class="status1">
                                    <i class="material-icons" >update</i>
                                    Just Updated
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="data1">
                        <div class="card1">
                            <div class="card-header1">
                                <div class="card-icon4">
                                    <i class="material-icons">people_alt</i>
                                </div>
                                <p class="card-category">Employess</p>
                                <h3 class="card-title">
                                    <?php echo $details['employees']; ?>
                                    <small class="special">#</small>
                                </h3>
                            </div>
                            <div class="card-footer1">
                                <div class="status1">
                                    <i class="material-icons" >update</i>
                                    Just Updated
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
           </div>