<style>
.addFile{
    padding: 10px;
    width: 150px;
    margin-top: 50px;
    background: #1e90ff; 
    letter-spacing: 1px;
    font-weight: 400;
    font-size: 18px;
    text-align: center;
    color: #fff;
}



input[type="file"] {
    display: none;
}
.imgLine{
    display: flex;
  flex-wrap: wrap;
}
.line{
    flex-basis: 300px;
}
.line #previewImg{
    width: 150px;
    margin-left: 50;
    height: 150px;
    object-fit: cover;  
}

.line .submitBtn{
    width: 168px;
    padding: 10px;
    margin-top: 50px;
    letter-spacing: 1px;
    font-weight: 400;
    color: #fff;
    border: none;
    font-size: 18px;
    text-align: center;
    background: #00AF87;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    

function previewFile(input) {

    console.log(input);
    var file = input.files[0];
    console.log(file);
  
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $(input).closest('.imgLine').find('#previewImg').attr("src", reader.result);
        }
            reader.readAsDataURL(file);
    }
}
</script>
<?php 

// Header
   $title = "Employee page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Employee Page";
       $search = 1;
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
                       
                       </h4>
                   </div>
                   <p class="textfortabel">Employee View Following Table</p>
               </div>
               
               <h1>Full Room View</h1>
               
              
                <form action="<?php url("image/uploadImg/image_01/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_01') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                                    
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>

                <form action="<?php url("image/uploadImg/image_02/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_02') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>

                <form action="<?php url("image/uploadImg/image_03/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_03') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>
                <h1>Washroom View</h1>
                <form action="<?php url("image/uploadImg/image_04/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_04') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>

                <form action="<?php url("image/uploadImg/image_05/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_05') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>

                <form action="<?php url("image/uploadImg/image_06/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_06') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>
                <h1>Room  Facility</h1>
                <form action="<?php url("image/uploadImg/image_07/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_07') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>

                <form action="<?php url("image/uploadImg/image_08/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_08') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>
                <h1>Other</h1>
                <form action="<?php url("image/uploadImg/image_09/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_09') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form>

                <form action="<?php url("image/uploadImg/image_10/$room_number"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            <?php 
                                $count =0;
                                foreach ($img_details as $key=>$value) {
                                    // var_dump($value);
                                    foreach ($value as $set) {
                                        // echo $set;
                                        if ($set == 'image_10') {
                                            $count = $key +1;
                                        }
                                    }
                                }
                            ?>
                            
                            <?php  if ($count == 0): ?>
                                <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                            <?php else : ?>
                                <img id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
                            <?php endif;  ?>
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile">  Select File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Save">
                        </div>
                    </div>

                </form> 
           </div> 
       </div>
   </div>

</div>   
