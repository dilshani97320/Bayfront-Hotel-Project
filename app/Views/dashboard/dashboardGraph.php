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
    /* display: flex; */
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
    /* border-bottom: 1px solid #000; */
    /* border-left: 1px solid #000; */
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
    background: rgba(0, 0, 0, 1);
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
    /* background: linear-gradient(0deg, #003ba5, #009ffe); */
    background: #030c14;
}

.box .skill .graph:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 100%;
    /* background: rgba(255,255,255,.1); */
    background: #030c14;
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
</style>

<div class="content-graph">
<div class="content1-graph">
    <!-- <div class="row1"> -->
            <div class="tablecard">
                <div class="card">
                        <div class="cardheader">
                            <div class="options">
                                <h4>Reservation Graph 
                                <span>
                                    
                                </span>
                            </h4>  
                                
                            </div>
                            <p class="textfortabel">Reservation View Following Graph</p>
                            <p class="textfortabel">Reservation Count Start From Past Day To Today</p>
                            <p class="textfortabel">Daily Target Reservation is TEN(10) and Count 14 Days</p>
                        </div>
                    <div class="cardbody">
                        <div class="tablebody">
                            <section>
                                <div class="box">
                                    <?php 
                                        // print_r($reservationCount);
                                        // die();
                                    ?>
                                    <?php foreach($reservationCount as $row): ?>
                                        <?php 
                                            
                                            $count = $row['count'];
                                            $date = $row['check_in_date'];
                                            $date=date_create($date);
                                            $newDate =  date_format($date,"m/d");
                                            // Daily target reservation is 10
                                            // ALways count percent outof 10  
                                            $percentRate = $count*10;  
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
</div>

