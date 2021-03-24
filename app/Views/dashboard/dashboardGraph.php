<style>
body {
    /* margin: 0; */
    /* padding: 0; */
    /* font-family: sans-serif; */
}

.content-graph {
    width: 100%;
    display: flex;
}

.content1-graph {
    width: 100%;
    display: block;
}

section {
    width: 100%;
    height: 48vh;
    /* background: linear-gradient(0deg, #0039fe, #000105); */
}

.box {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-49%, -50%);
    /* width: 550px; */
    width: 100%;
    height: 300px;
    background: transparent;
    display: flex;
}

.box .skill {
    position: relative;
    flex: 1;
    text-align: center;
}

.box .skill .graph {
    position: absolute;
    width: 40px;
    /* background: rgba(0, 0, 0, 1); */
    background: rgb(116, 24, 24);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

.box .skill .graph:before {
    content: '';
    position: absolute;
    top: 2px;
    left: 2px;
    right: 2px;
    bottom: 0;
    background: rgb(116, 24, 24);
}

.box .skill .graph:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    background: rgb(116, 24, 24);

}

.box .skill .graph .percent {
    position: absolute;
    top: -20px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    color: #030c14;
    font-weight: 600;
}

.box .skill .name {
    position: absolute;
    bottom: -30px;
    left: 50%;
    transform: translateX(-50%);
    text-align: center;
    /* color: #fff; */
    color: #030c14;
    font-weight: 200;
    /* background: #030c14; */
    padding: 2px 6px;
    border-radius: 2px;
}

.reservationGraph {
    display: inline-flex;
    padding: 10px;
    background: #030c14;
    color: #fff;
    border-radius: 5px;
    margin-bottom: 5px;
}

</style>

<!-- <div class="content-graph"> -->
    <div class="content1-graph">
    <!-- <div class="row1"> -->
            <div class="tablecard">
                <div class="card">
                    <div class="cardbody">
                        <div class="tablebody">
                            <h4 class="reservationGraph">Reservations of Last 14 Days Since Today</h4>
                            <section>
                                <div class="box">
                                    <?php foreach($reservationCount as $row): ?>
                                        <?php 
                                            
                                            $count = $row['count'];
                                            $date = $row['check_in_date'];
                                            $date=date_create($date);
                                            $newDate =  date_format($date,"m/d");
                                            // Daily target reservation is 10
                                            // ALways count percent outof 10  
                                            $percentRate = $count*10;  
                                            //$percentRate = 100;  // use for testing purpose
                                        ?>
                                    <div class="skill">
                                        <div class="graph" style="height: <?php echo $percentRate; ?>%;">
                                            <div class="percent">0<?php echo $count; ?></div>
                                        </div>
                                        <div class="name"><?php echo $newDate; ?></div>
                                    </div>
                                    <?php endforeach ?>     
                                </div>
                            </section>
                        </div>
                    </div>
                </div>

                <!-- </div>    -->
            </div>
        </div>
    </div>
<!-- </div> -->

