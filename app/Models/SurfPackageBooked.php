<?php 

class SurfPackageBooked extends Connection{
    public $surf_package_booked_id;
    public  $package_id;
    // public  $reservation_id;
    // public  $customer_id;
    private  $is_valid;
    private  $is_request;
    private $coach;
    public $surfPackageBooked_table = "surf_package_booked";

    public function __construct() {        
        Connection::__construct();
    }

    public function createSurfReservation($package_id, $max_id, $customer_id) {
        $this->package_id = mysqli_real_escape_string($this->connection, $package_id);
        $customer = new Customer();
        $reservation = new Reservation();
        $customer->customer_id;
        $reservation->reservation_id;
        $customer->customer_id = mysqli_real_escape_string($this->connection, $customer_id); 
        $reservation->reservation_id = mysqli_real_escape_string($this->connection, $max_id); 
        // echo $this->package_id;
        $valid = 1;
        $request = 1;
        $query = "INSERT INTO $this->surfPackageBooked_table (
            package_id, reservation_id,customer_id, is_valid, is_request) 
            VALUES (
            '{$this->package_id}', '{$reservation->reservation_id}', '{$customer->customer_id}', '{$valid}', '{$request}'
            )";
//    print_r($query);
//    die();
        $result = mysqli_query($this->connection, $query);
        // echo "Query Level2";
        if($result) {
            // query successful..
            // echo "Query Successfull";
            $value = 1;
            return $value;
        }
        else {
            echo "Query failedXXX";
        }
    }

    public function requestNotification() {

        $customer = new Customer();
        $reservation = new Reservation();
        $customer->customer_table;
        $reservation->reservation_table;
        $package_table = "surf_package";

        date_default_timezone_set("Asia/Colombo");
        $current_date = date('Y-m-d');

        $query = "SELECT $package_table.package_name,  $package_table.price, $customer->customer_table.first_name, $customer->customer_table.email,
                  $reservation->reservation_table.check_out_date, $this->surfPackageBooked_table.surf_package_booked_id, $this->surfPackageBooked_table.is_request, $this->surfPackageBooked_table.coach
                  FROM $this->surfPackageBooked_table
                  INNER JOIN $customer->customer_table
                  ON  $this->surfPackageBooked_table.customer_id = $customer->customer_table.customer_id
                  INNER JOIN $reservation->reservation_table
                  ON  $this->surfPackageBooked_table.reservation_id = $reservation->reservation_table.reservation_id
                  INNER JOIN $package_table
                  ON  $this->surfPackageBooked_table.package_id = $package_table.package_id
                  WHERE $reservation->reservation_table.is_valid = 1 AND $reservation->reservation_table.request = 0 AND $reservation->reservation_table.check_out_date >= '{$current_date}'
                        AND $customer->customer_table.is_deleted = 0 AND $this->surfPackageBooked_table.is_valid = 1
                  ORDER BY $this->surfPackageBooked_table.surf_package_booked_id";

        $packageBookings = mysqli_query($this->connection, $query);
        // var_dump($query);
        // die();
        if($packageBookings) {
            mysqli_fetch_all($packageBookings,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $packageBookings;
    }
    public function requestNotificationSearch($search) {
        $search = mysqli_real_escape_string($this->connection, $search);
        $customer = new Customer();
        $reservation = new Reservation();
        $customer->customer_table;
        $reservation->reservation_table;
        $package_table = "surf_package";

        $query = "SELECT $package_table.package_name,  $package_table.price, $customer->customer_table.first_name, $customer->customer_table.email,
                  $reservation->reservation_table.check_out_date, $this->surfPackageBooked_table.surf_package_booked_id, $this->surfPackageBooked_table.is_request, $this->surfPackageBooked_table.coach
                  FROM $this->surfPackageBooked_table
                  INNER JOIN $customer->customer_table
                  ON  $this->surfPackageBooked_table.customer_id = $customer->customer_table.customer_id
                  INNER JOIN $reservation->reservation_table
                  ON  $this->surfPackageBooked_table.reservation_id = $reservation->reservation_table.reservation_id
                  INNER JOIN $package_table
                  ON  $this->surfPackageBooked_table.package_id = $package_table.package_id
                  WHERE $reservation->reservation_table.is_valid = 1 AND $reservation->reservation_table.request = 0 
                        AND $customer->customer_table.is_deleted = 0 AND $this->surfPackageBooked_table.is_valid = 1 AND $customer->customer_table.first_name = '{$search}'
                  ORDER BY $this->surfPackageBooked_table.surf_package_booked_id";

        $packageBookings = mysqli_query($this->connection, $query);
        // var_dump($query);
        // die();
        if($packageBookings) {
            mysqli_fetch_all($packageBookings,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $packageBookings;
    }

    public function updateCoach($coach, $surf_package_booked_id) {
        $this->coach = mysqli_real_escape_string($this->connection, $coach);
        $this->surf_package_booked_id = mysqli_real_escape_string($this->connection, $surf_package_booked_id);

        $query = "UPDATE $this->surfPackageBooked_table SET $this->surfPackageBooked_table.coach = '{$coach}' , $this->surfPackageBooked_table.is_request = 0
                  WHERE $this->surfPackageBooked_table.surf_package_booked_id = '{$this->surf_package_booked_id}' AND $this->surfPackageBooked_table.is_valid = 1  LIMIT 1";

        $result = mysqli_query($this->connection, $query);
         
        $value =0;
        if($result) {
            $value = 1;
        }
        // echo $value;
        return $value;
    }
    public function deleteReservation($surf_package_booked_id) {

        $this->surf_package_booked_id = mysqli_real_escape_string($this->connection, $surf_package_booked_id);

        $query = "UPDATE $this->surfPackageBooked_table SET $this->surfPackageBooked_table.is_valid = 0
                  WHERE $this->surfPackageBooked_table.surf_package_booked_id = '{$this->surf_package_booked_id}'  LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        
        $value =0;
        if($result) {
            $value = 1;
        }
        // echo $value;
        return $value;
    }

    
}