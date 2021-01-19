<?php include('server.php'); 

//fetch the record to be update
if(isset($_GET['edit'])){
   $type_id=$_GET['edit'];
   $edit_state=true;
   $rec=mysqli_query($db,"SELECT * FROM room_type WHERE type_id=$type_id");
   $record=mysqli_fetch_array($rec);
   $type_name=$record['type_name'];
   $floor_no=$record['floor_no'];
   $room_price=$record['room_price'];
   $max_guest=$record['max_guest'];
   $facilities=$record['facilities'];
   $description=$record['description'];
   $type_id=$record['type_id'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Website-Room type</title>
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
        <h1>ROOM DETAILS</h1>
    </div>

    <div class="container2">

<form method="post" action="server.php">
    <input type="hidden" name="type_id" value="<?php echo $type_id; ?>">
    <!--<input type="text" name="id" placeholder="ID">-->
    <input type="text" name="type_name" placeholder="Room Type Name" value="<?php echo $type_name; ?>">
    <input class="same" type="text" name="floor_no" placeholder="Floor No" value="<?php echo $floor_no; ?>">
    <input class="same" type="text" name="room_price" placeholder="Room Price" value="<?php echo $room_price; ?>">
    <input class="same" type="text" name="max_guest" placeholder="Max Guest" value="<?php echo $max_guest; ?>">
    <input class="same" type="text" name="facilities" placeholder="Facilities" value="<?php echo $facilities; ?>">
    <input class="same" type="text" name="description" placeholder="Description" value="<?php echo $description; ?>">



    

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
                    <th scope="col">Room Type Id</th>
                    <th scope="col">Room Type Name</th>
                    <th scope="col">Floor No</th>
                    <th scope="col">Room Price</th>
                    <th scope="col">Max Guest</th>
                    <th scope="col">Facilities</th>
                    <th scope="col">Description</th>
                    <th colspan="2">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_array($result)){?>
                <tr>
                    <td><?php echo $row['type_id'] ?></td>
                    <td><?php echo $row['type_name'] ?></td>
                    <td><?php echo $row['floor_no'] ?></td>
                    <td><?php echo $row['room_price'] ?></td>
                    <td><?php echo $row['max_guest'] ?></td>
                    <td><?php echo $row['facilities'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                    <td><a class="edit_btn" href="room-type.php?edit=<?php echo $row['type_id']; ?>">Edit</a></td>
                    <td><a class="delete_btn" href="server.php?delete=<?php echo $row['type_id']; ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>