<?php include('server1.php'); 

//fetch the record to be update
if(isset($_GET['edit'])){
   $discount_id=$_GET['edit'];
   $edit_state=true;
   $rec=mysqli_query($db,"SELECT * FROM room_discount WHERE discount_id=$discount_id");
   $record=mysqli_fetch_array($rec);
   $discount_rate=$record['discount_rate'];
   $start_date=$record['start_date'];
   $end_date=$record['end_date'];
   
   $discount_id=$record['discount_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Website-room discount</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    
 <?php if(isset($_SESSION['msg'])): ?>

  <div class="msg">
       <?php  
echo $_SESSION['msg'];
unset($_SESSION['msg']);
       ?>
  </div>
<?php endif ?>

    <div class="container">
        <h1>ROOM DISCOUNT DETAILS</h1>
    </div>

    <div class="container2">

<form method="post" action="server1.php">
    <input type="hidden" name="discount_id" value="<?php echo $discount_id; ?>">
    <!--<input type="text" name="id" placeholder="ID">-->
    <input type="text" name="discount_rate" placeholder="Discount Rate" value="<?php echo $discount_rate; ?>">
    <input class="same" type="Date" name="start_date" placeholder="Start Date" value="<?php echo $start_date; ?>">
    <input class="same" type="Date" name="end_date" placeholder="End Date" value="<?php echo $end_date; ?>">



    

    <!--create update delete create buttons-->
    <div class="buttonbox">

       <?php if($edit_state == false): ?>
         <button type="submit" class="btn1" name="create">create</button>
         <?php else:?>
        <button type="submit" class="btn3" name="update">Update</button>
        <?php endif ?>

      <!-- <button type="submit" class="btn2" name="read">Read</button>
       
       <button type="submit" class="btn4" name="delete">Delete</button>-->
    </div>
</form >
</div>
    <div class="tablebox">

        <table>
            <thead>
                <tr>
                
                    <th scope="col">Discount Id</th>
                    <th scope="col">Discount Rate</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_array($result)){?>
                <tr>
                    
                    <td><?php echo $row['discount_id'] ?></td>
                    <td><?php echo $row['discount_rate'] ?></td>
                    <td><?php echo $row['start_date'] ?></td>
                    <td><?php echo $row['end_date'] ?></td>
                    
                    <td><a class="edit_btn" href="room-discount.php?edit=<?php echo $row['discount_id']; ?>">Edit</a></td>
                    <td><a class="delete_btn" href="server1.php?delete=<?php echo $row['discount_id']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>