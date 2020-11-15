
<?php 

// Header
   $title = "Dashboard";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Edit Web Site Details";
       $search = 0;
       $search_by = 'name';
       $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Employee Page   
                       <span>
                            <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <a href="<?php url("editweb/createNew/") ?>" class="addnew"><i class="material-icons">add</i>Add New</a> 
                            <?php endif; ?>
                            
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Employee View Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Room Number</th>
                                <th>Room Name</th>
                                <th>Room Type</th>

                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                    <th>Edit</th>
                                    <th>Delete</th> 
                                    <th>View In Website</th>  
                                <?php endif; ?>
                            </thead>
                            
                            <?php foreach($rooms as $row): ?>
                            <tbody>
                                <td><?php echo $row['room_number'];?></td>
                                <td><?php echo $row['room_name'];?></td>
                                <td><?php echo $row['type_name'];?></td>
                                <?php if($_SESSION['user_level'] == "Owner"): ?>
                                    <td><a href="<?php url('editweb/selectChange/'.$row['room_number']);?>" class="edit"><i class="material-icons">edit</i>Edit </a></td>
                                    <td><a href="<?php url('editweb/delete/'.$row['room_id'].'/'.$row['room_number']);?>" onclick="return confirm('Are you sure to delete this record?');" class="delete"><i class="material-icons">delete</i>Delete</a></td>
                                    <td><a href="<?php url('RoomSuite/ViewRoom/'.$row['room_number']);?>"  class="view"><i class="material-icons">visibility</i>View Room</a></td>
                                <?php endif; ?>
                            </tbody>
                            <?php endforeach ?> 
                        </table>
                    </div>
                </div>  <!--End Card Body -->
           </div> 
       </div>
   </div>

</div>   
