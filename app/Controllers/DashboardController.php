<?php 
// session_start();

class DashboardController {

    public function index() {
        
        if(isset($_SESSION)) {
            $data = array();

            $db = new Dashboard();
            $dbreservation = new Reservation();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();
            $countReservation = $dbreservation->getCountReservation();

            $data['reservationCount'] = $countReservation;
            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }

        else {
            session_start();
            $data = array();

            $db = new Dashboard();
            $dbreservation = new Reservation();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();
            $countReservation = $dbreservation->getCountReservation();

            $data['reservationCount'] = $countReservation;
            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }
        
        // view::load('dashboard/dashboard');
           
    }

    public function index2($errors) {

        if(isset($_SESSION)) {
            $data = array();

            $db = new Dashboard();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();
            
            $data['errors'] = $errors;
            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }

        else {
            session_start();
            $data = array();

            $db = new Dashboard();

            $resultRoom = $db->getRoomCount();
            $resultReservation = $db->getReservationCount();
            $resultIncome = $db->getReservationIncome();
            $resultEmployee = $db->getEmployeeCount();
            
            $data['errors'] = $errors;
            $data['details'] = array("rooms" => $resultRoom['total'], "reservations" => $resultReservation['total'], "income" => $resultIncome['total'], "employees" => $resultEmployee['total']);
            view::load('dashboard/dashboard', $data);
        }
        
    }

    public function bookingCalendarDetails($month, $year, $class, $method) {

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

        
        $calendar .= "<div class= 'buttonset'><a class='btn_seek' href='http://localhost/MVC/public/".$class."/".$method."/".$prev_month."/".$prev_year."'>Prev Month</a>";
        $calendar .= "<a class='btn_seek' href='http://localhost/MVC/public/".$class."/".$method."/".date('m')."/".date('Y')."'>Current Month</a>";
        $calendar .= "<a class='btn_seek' href='http://localhost/MVC/public/".$class."/".$method."/".$next_month."/".$next_year."'>Next Month</a></div></center>";    


        
        
       
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
                    $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Bookings = ".$booked."</button>";
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
                    $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Bookings = ".$booked."</button>";
                }
                else {
                    $calendar .= "<td class='$today'><h4>$currentDay</h4><button class='btn_seek_view'>Bookings = 0</button>";
                }
                
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

        // $data['calendar'] = $calendar;
        // view::load('dashboard/room/bookingCalendar', $data);
        return $calendar;
    }
}    

?>