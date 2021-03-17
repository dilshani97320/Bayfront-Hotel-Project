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
                        </div>
                    <div class="cardbody">
                        <div class="tablebody">
                            <section>
                                <div class="box">
                                    <div class="skill">
                                        <div class="graph" style="height: 50%;">
                                            <div class="percent">50%</div>
                                        </div>
                                        <div class="name">Day01</div>
                                    </div>
                                
                                    <div class="skill">
                                        <div class="graph" style="height: 70%;">
                                            <div class="percent">70%</div>
                                        </div>
                                        <div class="name">Day02</div>
                                    </div>
                                
                                    <div class="skill">
                                        <div class="graph" style="height: 65%;">
                                            <div class="percent">65%</div>
                                        </div>
                                        <div class="name">Day03</div>
                                    </div>
                                
                                    <div class="skill">
                                        <div class="graph" style="height: 60%;">
                                            <div class="percent">60%</div>
                                        </div>
                                        <div class="name">Day04</div>
                                    </div>
                                
                                    <div class="skill">
                                        <div class="graph" style="height: 42%;">
                                            <div class="percent">42%</div>
                                        </div>
                                        <div class="name">Day05</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 45%;">
                                            <div class="percent">45%</div>
                                        </div>
                                        <div class="name">Day06</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 100%;">
                                            <div class="percent">100%</div>
                                        </div>
                                        <div class="name">Day07</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 45%;">
                                            <div class="percent">45%</div>
                                        </div>
                                        <div class="name">Day08</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 95%;">
                                            <div class="percent">95%</div>
                                        </div>
                                        <div class="name">Day09</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 45%;">
                                            <div class="percent">45%</div>
                                        </div>
                                        <div class="name">Day10</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 45%;">
                                            <div class="percent">85%</div>
                                        </div>
                                        <div class="name">Day11</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 25%;">
                                            <div class="percent">25%</div>
                                        </div>
                                        <div class="name">Day12</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 55%;">
                                            <div class="percent">55%</div>
                                        </div>
                                        <div class="name">Day13</div>
                                    </div>
                                    <div class="skill">
                                        <div class="graph" style="height: 35%;">
                                            <div class="percent">35%</div>
                                        </div>
                                        <div class="name">Today</div>
                                    </div>
                                    
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

