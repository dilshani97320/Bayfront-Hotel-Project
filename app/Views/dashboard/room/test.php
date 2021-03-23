public function bookingCalendarAll($month, $year_val=0) {

// date_default_timezone_set("Asia/Colombo");
// $dateComponents = getdate();

// if($month_val != 0 && $year_val != 0) {
//     $month = $month_val;
//     $year = $year_val;
// }
// else {
//     // $month = $dateComponents['month'];
//     $month = date('m');
//     // $year = $dateComponents['year'];
//     $year = date('Y');
// }

$reservation = new Reservation();
$result = $reservation->getDayCountReservation();

foreach($result as $d)
{
        $datesArray[]= $d['check_in_date'];   
}

// First of all create an array containing names of all days in a week
$daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

$firstDayOfMonth = mktime(0,0,0,$month,1,$year);

// Getting the number of days this month containes
$numberofDays = date('t', $firstDayOfMonth);

// Getting some information about the first day of this month
$dateComponents = getdate($firstDayOfMonth);

//  Getting the name of this month
$monthName = $dateComponents['month'];


// Getting the index value 0-6 of the first day of this month
$dayOfWeek = $dateComponents['wday'];

// Getting the current date
$dateToday = date('Y-m-d');



$prev_month = date('m', mktime(0,0,0,$month-1, 1, $year));
$prev_year = date('Y', mktime(0,0,0,$month-1, 1, $year));
$next_month = date('m', mktime(0,0,0,$month+1, 1, $year));
$next_year = date('Y', mktime(0,0,0,$month+1, 1 , $year));
// $month_name = get_month_name($month_val);


$calendar = "<center><h2>$monthName $year</h2>";
$calendar .= "<div class= 'buttonset'><a class='btn_seek' href='http://localhost/MVC/public/room/bookingCalendar/".$prev_month."/".$prev_year."'>Prev Month</a>";
$calendar .= "<a class='btn_seek' href='http://localhost/MVC/public/room/bookingCalendar/".date('m')."/".date('Y')."'>Current Month</a>";
$calendar .= "<a class='btn_seek' href='http://localhost/MVC/public/room/bookingCalendar/".$next_month."/".$next_year."'>Next Month</a></div></center>";

$calendar .= "<br><table class='tableContent'>";
$calendar .= "<tr>";

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
    if($date < date('Y-m-d') ) {
        if(in_array($date, $datesArray)) {
            foreach($result as $d){
                // echo $d['check_in_date'];
                // $datesArray[]= $d['check_in_date']; 
                if($d['check_in_date'] == $date) {
                    $booked = $d['count'];
                    break;
                }  
            }
            $total = 6; // Number of Rooms
            $booked = (int)$booked;
            $val = $total-$booked;
            // echo $val;
            // echo gettype($booked);
            $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Booked = ".$booked."
                        <br>
                        Free = ". $val."
                        </button>";
        }
        else {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_danger'>N/A</button>";
        }
        
    }
    else {
        // echo $date;
        // $booked = $result[$date]['count'];
        if(in_array($date, $datesArray)) {
            foreach($result as $d){
                // echo $d['check_in_date'];
                // $datesArray[]= $d['check_in_date']; 
                if($d['check_in_date'] == $date) {
                    $booked = $d['count'];
                    break;
                }  
            }

            $total = 6; // Number of Rooms
            $booked = (int)$booked;
            $val = $total-$booked;
            $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Booked = ".$booked."
                        <br>
                        Free = ". $val."
                        </button>";
        }
        else {
            $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Booked = 0
                        <br>
                        Free =  6
                        </button>";
        }
        

        
        // $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_danger'>N/A</button>";
    }
    // else {
    //     $calendar .= "<td class='$today'><h4>$currentDay</h4><a  href='book.php?date=".$date."'' class='btn_seek_success'>Book</a>";
    // }
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

$data['calendar'] = $calendar;
view::load('dashboard/room/bookingCalendar', $data);
}


<!-- booking calendar WEbsit -->

<?php 
   // Header
   $title = "Search Room page";
   include(VIEWS.'dashboard/inc/header.php');
?> 
<style>


/* .container {
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
} */

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

tbody {
    width: 100%;
}
tr {
    width: 100%;
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
    background: #030c14;
    color: #fff;
    border-radius: 5px;
}

.tableContent {
    /* display: block; */
    width: 100%;
}

table {
    table-layout: fixed;
    border-collapse: collapse;
}

th.header {
    padding: 18px;
    font-size: 19px;
    background: #030c14;
    color: #fff;
    /* border: 1px solid #dee2e6; */
    border-top: 1px solid rgba(0, 0, 0, 0.06);
    border-bottom: 2px solid rgba(0, 0, 0, 0.06);
    
}

td {
    width: 125px;
    /* border: 1px solid #dee2e6; */
    border-top: 1px solid rgba(0, 0, 0, 0.06);
    border-bottom: 2px solid rgba(0, 0, 0, 0.06);
}

td > h4 {
    display: block;
    margin-left: 10px;
    margin-bottom: 10px;
    margin-top: 13px;
    font-size: 20px;
    line-height: 1px;
    padding: 3px;
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
    float: right;
    margin-right: 48px;
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
    float: right;
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
    float: right;
    margin-right: 48px;
}

.today {
    background: #030c14;
    color: aliceblue;
    border-radius: 5px;
}
</style>

<div class="wrapper">

    <?php 
            $navbar_title = "Booking Calendar";
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
                        <h4>Booking Calendar </h4>  
                    </div>

                    <p class="textfortabel">All Bookings have following Details</p>
                </div>

                <div class="cardbody">  
                   
                    <!-- <div class="section1"> -->
                    <!-- <div class="container"> -->
                        <!-- <div class="row"> -->
                            <?php echo $calendar; ?>
              
                        <!-- </div> -->
                    <!-- </div> -->
                       
                        

                        

                    <!-- </div> -->

                    <!-- <div class="section2">  -->

                    <!-- </div> -->
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




