
<?php 

 // Header
    $title = "Home page";
    include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">

        
    <?php 
    
        $navbar_title = "Dashboard Page";
        $search = 0;
        $search_by = 'name';
        
        include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
        include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
        
    ?>
        
        <!-- Table design -->

    <div class="content1">
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

           <div class="container-calendar">
            <h3 id="monthAndYear"></h3>
            <div class="button-container-calendar">
                <button id="previous" onclick="previous()"><i class="fa fa-arrow-circle-left" style="font-size:23px"></i></button>
                <button id="next" onclick="next()"><i class="fa fa-arrow-circle-right" style="font-size:23px"></i></button>
            </div>
            <table class="table-calendar" id="calendar" data-lang="en">
                <thead id="thead-month"></thead>
                <tbody id="calendar-body"></tbody>
            </table>
            <div class="footer-container-calendar">
                <label for="month">Jump To: 
                    <select id="month" onchange="jump()">
                        <option value=0>Jan</option>
                        <option value=1>Feb</option>
                        <option value=2>Mar</option>
                        <option value=3>Apr</option>
                        <option value=4>May</option>
                        <option value=5>Jun</option>
                        <option value=6>Jul</option>
                        <option value=7>Aug</option>
                        <option value=8>Sep</option>
                        <option value=9>Oct</option>
                        <option value=10>Nov</option>
                        <option value=11>Dec</option>
                    </select>
                    <select id="year" onchange="jump()"></select>
                </label>
            </div>
    </div>
    </div>

    

</div>   

<script type="text/javascript">

function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
}

today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");


createYear = generate_year_range(1970, 2050);
/** or
 * createYear = generate_year_range( 1970, currentYear );
 */

document.getElementById("year").innerHTML = createYear;

var calendar = document.getElementById("calendar");
var lang = calendar.getAttribute('data-lang');

var months = "";
var days = "";

var monthDefault = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var dayDefault = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

if (lang == "en") {
    months = monthDefault;
    days = dayDefault;
} else if (lang == "id") {
    months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    days = ["Ming", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"];
} else if (lang == "fr") {
    months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
    days = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
} else {
    months = monthDefault;
    days = dayDefault;
}


var $dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
}
$dataHead += "</tr>";

//alert($dataHead);
document.getElementById("thead-month").innerHTML = $dataHead;


monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);



function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}

function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}

function showCalendar(month, year) {

    var firstDay = ( new Date( year, month ) ).getDay();

    tbl = document.getElementById("calendar-body");

    
    tbl.innerHTML = "";

    
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    var date = 1;
    for ( var i = 0; i < 6; i++ ) {
        
        var row = document.createElement("tr");

        
        for ( var j = 0; j < 7; j++ ) {
            if ( i === 0 && j < firstDay ) {
                cell = document.createElement( "td" );
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";

                if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                    cell.className = "date-picker selected";
                }
                row.appendChild(cell);
                date++;
            }


        }

        tbl.appendChild(row);
    }

}

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}



</script>
    

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
