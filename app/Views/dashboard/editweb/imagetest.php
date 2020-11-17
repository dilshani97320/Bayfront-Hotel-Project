<style>

.addFile1{
    padding: 5px;
    width: 110px;
    height: 28px;
    margin: 20px auto;
    margin-left: 15px;
    background: #020d18;
    letter-spacing: 1px;
    font-weight: 400;
    font-size: 15px;
    text-align: center;
    color: #fff;
    border-radius: 4px;
}

.addFile2{
    padding: 5px;
    width: 110px;
    height: 28px;
    margin: 20px auto;
    /* margin-left: 15px; */
    background: #020d18;
    letter-spacing: 1px;
    font-weight: 400;
    font-size: 15px;
    text-align: center;
    color: #fff;
    border-radius: 4px;
}

span{
    display: inline-flex;
    margin-top: 0px;
}

.material-icons {
    top: 6px;
    margin-left: 0px;
    /* padding-top: 5px; */
}

.h1{
    margin: 30px 20px;
    letter-spacing: 1px;

}
input[type="file"] {
    display: none;
}
.sadara{
    display: flex;
  flex-direction: row;
}
.imgLine{
    display: flex;
  flex-direction: row;
  /* margin-left: 30px; */
}
.line{
    width: 33.33%;
}
.line1{
    /* display: flex;
    flex-direction: column; */
    display: flex;
    flex-direction: row;
}
.line2{
    margin: 10px auto;
    display: flex;
    margin-left: 50px;
    flex-direction: column;
}

.line3 {
    margin: 10px auto;
    display: flex;
    margin-left: 25px;
    flex-direction: column;
}
.line #previewImg{
    width: 200px;
    margin: 5px auto;
    height: 200px;
    object-fit: cover;  
}
.line .btnDel{
    width: 75px;
    text-decoration: none;
    padding: 5px;
    margin-bottom: 20px;
    border-radius: 4px;
    margin-left: 33px;
    letter-spacing: 1px;
    font-weight: 400;
    color: #fff;
    border: none;
    font-size: 15px;
    text-align: center;
    background: #980d27;
    box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 1px 3px 1px rgba(60,64,67,0.149);
}

.line .submitBtn1{
    width: 174px;
    border-radius: 4px;
    text-decoration: none;
    padding: 8px;
    margin-bottom: 20px;
    letter-spacing: 1px;
    font-weight: 400;
    color: #fff;
    border: none;
    font-size: 15px;
    text-align: center;
    background: #055e49;
    box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 1px 3px 1px rgba(60,64,67,0.149);
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
                       <h4>Edit Image Page   
                       
                       </h4>
                   </div>
                   <p class="textfortabel">Image Views Following Room</p>
               </div>
               
               <h1 class="h1">Full Room View</h1>
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span><i class="material-icons" style = "margin-right:0px">get_app</i>  Select File <span>
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
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
                                    <label class="addFile2"><span><i class="material-icons " style = "margin-right:0px">get_app</i>  Select File</span>
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
                                <?php if (isset($img_details[$count-1]['image_path'])):?>
                                    <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                        <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                <?php endif; ?>
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                                 
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
                            </div>
                                
                        </div>
                    </form>
                </div>
                </div>
                <h1 class="h1">Washroom View</h1>
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                                 
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                                 
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                             
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
                            </div>
                                
                        </div>
                    </form>
                </div>
                </div>
                <h1 class="h1">Room  Facility</h1>
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                             
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                             
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
                            </div>
                                
                        </div>
                    </form>
                </div>
                </div>
                <h1 class="h1">Other</h1>
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                             
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile1"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                             
                                 <?php if (isset($img_details[$count-1]['image_path'])):?>
                                 <?php $img = explode('/',$img_details[$count-1]['image_path']); $img= end($img);?>
                                    <a class="btnDel" href="<?php url('image/deleteImg/'.$room_number.'/'.$img); ?>"  >Delete</a>
                                 <?php endif; ?>
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
                            </div>
                                
                        </div>
                    </form>
                    </div>
                </div>

           </div> 
       </div>
   </div>

</div>   
