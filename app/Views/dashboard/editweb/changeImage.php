

<?php 
unset($_POST);
$_POST = array();

// Header
   $title = "Image page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Edit Image Page";
       $search = 0;
       $search_by = 'name';
       $url = "#";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>

    <div class="content">
        <div class="tablecard">
            <div class="card">
                <div class="cardheader">
                    <div class="options">
                        <h4><?php echo $room_number." "; ?>Edit Image Page   
                        <span>
                            <a href="<?php url("editweb/index"); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Rooms Table</a>  
                        </span> 
                        </h4>
                    </div>
                    <p class="textfortabel">Image Views Following Room</p>
                </div>
                
                <h4 class="imgh1">Full Room View</h4>

                <div class="sadara">
                
                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_01/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                    <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"> <span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="line2">
                                
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>

                    <!-- Change phase -->
                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_02/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>
                                        
                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                            <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                                <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>
                                    </div>
                                    

                                </div>
                                
                                <div class="line2">
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>
                    
                    <!--End of Change phase -->
                    
                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_03/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>

                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                        <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                            <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                
                                <div class="line2">
                                    
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>
                </div>

                    <h4 class="imgh1">Washroom View</h4>
                    <div class="sadara"> 

                    

                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_04/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>

                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                        <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                            <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="line2">
                                    
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>

                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_05/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                    <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                    <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                        <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                    </label>
                                    
                                    <?php if (isset($img_details[$count-1]['image_path'])):?>
                                    <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                        <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                    <?php endif; ?>

                                    </div>
                                </div>
                                
                                <div class="line2">
                                    
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>

                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_06/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>
                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                        <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                            <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>

                                    </div>

                                </div>
                                
                                <div class="line2">
                                
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>
                    </div>

                    <h4 class="imgh1">Room  Facility</h4>
                    <div class="sadara">
                    
                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_07/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>
                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                        <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                            <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>
                                    </div>

                                </div>
                                
                                <div class="line2">
                                
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>

                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_08/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                    <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                    <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                        <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                    </label>

                                    <?php if (isset($img_details[$count-1]['image_path'])):?>
                                    <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                        <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="line2">
                                
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>
                    </div>

                    <h4 class="imgh1">Other</h4>
                    <div class="sadara"> 
                    

                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_09/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>
                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                        <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                            <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="line2">
                                
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>
                    </div>

                    <div class="line">
                        <form action="<?php url("image/uploadImg/image_10/$room_number"); ?>" method="post" enctype="multipart/form-data">
                            <div class="imgLine">
                                <div class="line1">
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
                                            
                                    <div class="line3">
                                        <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                        <label class="addFile"><span><i class="material-icons " style = "margin-right:0px">publish</i>  Select File</span>
                                            <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                        </label>
                                        <?php if (isset($img_details[$count-1]['image_path'])):?>
                                        <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                            <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="line2">
                                
                                    
                                    <input class="submitBtn1" type="submit"  name="submit" value="Save">
                                </div>
                                    
                            </div>
                        </form>

                        </div>
                    </form>
                    </div>
                </div>


            </div> 
        </div>
    </div>
</div>   

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

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
