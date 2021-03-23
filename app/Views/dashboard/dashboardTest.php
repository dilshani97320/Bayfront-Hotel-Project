<?php 

function build_calendar($month, $year) {

    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    

    

    // First of all create an array containing names of all days in a week
    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    // echo $month;
    // echo "<br>";

    // Then get the first day of the month that is in the argument of the function
    
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    // echo $firstDayOfMonth;

    // Now getting the number of days this month containes
    $numberofDays = date('t', $firstDayOfMonth);

    // Getting some information about the first day of this month
    $dateComponents = getdate($firstDayOfMonth);

    //  Getting the name of this month
    $monthName = $dateComponents['month'];
    

    // Getting the index value 0-6 of the first day of this month
    $dayOfWeek = $dateComponents['wday'];

    // Getting the current date
    $dateToday = date('Y-m-d');

    // print_r($dateComponents);
    

    $prev_month = date('m', mktime(0,0,0,$month-1, 1, $year));
    $prev_year = date('Y', mktime(0,0,0,$month-1, 1, $year));
    $next_month = date('m', mktime(0,0,0,$month+1, 1, $year));
    $next_year = date('Y', mktime(0,0,0,$month+1, 1 , $year));
    // $month_name = get_month_name($month_val);
    
    
    $calendar = "<center><h2>$monthName $year</h2>";
    $calendar .= "<div class= 'buttonset'><a class='btn_seek' href='?month=".$prev_month."&year=".$prev_year."'>Prev Month</a>";
    $calendar .= "<a class='btn_seek' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a>";
    $calendar .= "<a class='btn_seek' href='?month=".$next_month."&year=".$next_year."'>Next Month</a></div></center>";

    $calendar .= "<br><table class='tableContent'>";
    $calendar .= "<tr>";
    // print_r($daysOfWeek);
    foreach($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    }

    $calendar .= "</tr><tr>";
   

    if($dayOfWeek > 0) {
        for($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td class='empty'></td>";
        }
    }

    $currentDay = 1;

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while($currentDay <= $numberofDays) {
        if($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        // echo $date;
        $dayName = strtolower(date('l', strtotime($date)));
        // echo $dayName;
        $today = $date==date('Y-m-d')?'today':"";
        // print_r($dayName);
        // echo $today;
        if($dayName == 'saturday' || $dayName == 'sunday') {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_danger'>Holiday</button>";
        }
        else if($date < date('Y-m-d')) {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Booked = 0
                         <br>
                         Free = 0
                         </button>";
            // $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_danger'>N/A</button>";
        }
        else {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><a  href='book.php?date=".$date."'' class='btn_seek_success'>Book</a>";
        }

        
        $currentDay++;
        $dayOfWeek++;
    }

    if($dayOfWeek < 7) {
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar .= "<td class='empty'></td>";
        }
    }

    $calendar .= "</tr></table>";



    return $calendar;

}

?>

<style>
body {
    /* margin: 0; */
    /* padding: 0; */
    /* font-family: sans-serif; */
}

.content2 {
    width: 81%;
    display: flex;
    float: right;
}

.content2-graph {
    width: 100%;
    /* display: flex; */
}

.container {
    display: flex;
    width: 100%;
    justify-content: center;
}

.row {
    display: block;
    padding: 20px;
}

.rowdetails {
    display: block;
}

center {
    display: block;
    text-align: center;
}

h2 {
    font-weight: 500;
    margin-bottom: 14px;
    /* line-height: 1.2px; */
    /* margin-bottom: 5px; */
    /* color: black; */
}

.buttonset {
    display: block;
    height: 35px;
}

a.btn_seek {
    /* display: block; */
    display: inline-block;
    width: 120px;
    margin-left: 10px;
    text-decoration: none;
    padding: 9px;
    background: #163044;
    color: #fff;
    border-radius: 5px;
}

.tableContent {
    display: block;
    width: 100%;
}

table {
    table-layout: fixed;
    border-collapse: collapse;
}

th.header {
    padding: 18px;
    font-size: 19px;
    border: 1px solid #dee2e6;
    
}

td {
    width: 125px;
    border: 1px solid #dee2e6;
}

td > h4 {
    margin-left: 10px;
    font-size: 20px;
    line-height: 1px;
}

.btn_seek_danger {
    display: inline-block;
    width: 67px;
    margin-left: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    padding: 10px;
    background: #dc3545;
    color: #fff;
    border-radius: 5px;
    border: none;
}

.btn_seek_view {
    display: inline-block;
    width: 108px;
    margin-left: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    padding: 10px;
    background: #dc3545;
    color: #fff;
    border-radius: 5px;
    border: none;
}

a.btn_seek_success {
    display: inline-block;
    width: 38px;
    margin-left: 10px;
    margin-bottom: 10px;
    text-decoration: none;
    padding: 10px;
    background: #28a745;
    color: #fff;
    border-radius: 5px;
    border: none;
}

.today {
    background: #081f33;
    color: aliceblue;
}
</style>

<div class="content2">
    <div class="content2-graph">
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
                            <div class="container">
                                    <div class="row">
                                        <!-- <div class="rowdetails"> -->
                                            <?php 
                                                date_default_timezone_set("Asia/Colombo");
                                                $dateComponents = getdate();

                                                if(isset($_GET['month']) && isset($_GET['year'])) {
                                                    $month = $_GET['month'];
                                                    $year = $_GET['year'];
                                                }
                                                else {
                                                    $month = $dateComponents['month'];
                                                    $year = $dateComponents['year'];
                                                    // echo $month;
                                                }
                                                // echo $month;
                                                echo build_calendar($month, $year);
                                            ?>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <!-- </div>    -->
            </div>
        </div>
    </div>
</div>

