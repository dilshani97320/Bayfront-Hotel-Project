<?php
class Feedback{
    private $table1 = "reservation";
    private $table2 = "feedback";

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }

    public function getReservationId($room_id) {


        $query = "SELECT $this->table1.customer_id, $this->table1.reservation_id, $this->table2.feedback_id, $this->table2.guest_review, $this->table2.rating, $this->table2.hotel_reply, $this->table2.is_show
                FROM $this->table1
                INNER JOIN $this->table2 ON $this->table1.reservation_id = $this->table2.reservation_id WHERE $this->table1.room_id = '{$room_id}' ";

        // echo $query;  
        // exit();  
        $review = mysqli_query($this->connection, $query);
        // var_dump($rooms);
        if($review) {
            $review =mysqli_fetch_all($review,MYSQLI_ASSOC);
        
            // var_dump($review);
            // exit();
            return $review;
        }
        else {
            echo "Database Query Failed";
        }    

        
    }

    public function getAllFeedback() {


        $query = "SELECT * FROM $this->table2 ";

        // echo $query;  
        // exit();  
        $review = mysqli_query($this->connection, $query);
        // var_dump($rooms);
        if($review) {
            $review =mysqli_fetch_all($review,MYSQLI_ASSOC);
        
            // var_dump($review);
            // exit();
            return $review;
        }
        else {
            echo "Database Query Failed";
        }    

        
    }

    public function getOneReview($feedback_id){


        $query = "SELECT $this->table2.feedback_id, $this->table2.guest_review, $this->table2.rating, $this->table2.hotel_reply
                FROM $this->table2 WHERE $this->table2.feedback_id = '{$feedback_id}' LIMIT 1";

        // echo $query;  
        // exit();  
        $review = mysqli_query($this->connection, $query);
        // var_dump($rooms);
        if($review) {
            $review =mysqli_fetch_assoc($review);
        
            // var_dump($review);
            // exit();
            return $review;
        }
        else {
            echo "Database Query Failed";
        }    

        
    }

    public function hideReviewTemp($feedback_id) {


    //    exit;
        $query = "UPDATE $this->table2 SET $this->table2.is_show = 0
                  WHERE $this->table2.feedback_id = '{$feedback_id}' LIMIT 1";
// echo $query;  
//         exit();  
        $result = mysqli_query($this->connection, $query);
                
        $value =0;

        if($result) {
            $value = 1;
        }else{
            $value = 0;
        }

        return $value;
    }

    public function showReviewTemp($feedback_id) {


        //    exit;
            $query = "UPDATE $this->table2 SET $this->table2.is_show = 1
                      WHERE $this->table2.feedback_id = '{$feedback_id}' LIMIT 1";
    // echo $query;  
    //         exit();  
            $result = mysqli_query($this->connection, $query);
                    
            $value =0;
    
            if($result) {
                $value = 1;
            }else{
                $value = 0;
            }
    
            return $value;
        }

        public function updateReply($reply, $feedback_id) {


            //    exit;
                $query = "UPDATE $this->table2 SET $this->table2.hotel_reply = '{$reply}'
                          WHERE $this->table2.feedback_id = '{$feedback_id}' LIMIT 1";
        // echo $query;  
        //         exit();  
                $result = mysqli_query($this->connection, $query);
                        
                $value =0;
         
                if($result) {
                    $value = 1;
                }else{
                    $value = 0;
                }
        
                return $value;
            }

            public function addReview($reservation_id, $star, $review) {
        
                $query = "INSERT INTO $this->table2(feedback_id, reservation_id, guest_review, rating) VALUES (NULL, '{$reservation_id}', '{$review}', '{$star}')";
                // echo $query; exit;
                $result = mysqli_query($this->connection, $query);
                if($result) {
                    return 1;
                }else{
                    return 2;
                }
                
            }
            
}
?>