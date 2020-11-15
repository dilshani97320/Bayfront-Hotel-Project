<style>
.addFile{
    padding: 5px;
    width: 150px;
    margin: 20px auto;
    background: #1e90ff; 
    letter-spacing: 1px;
    font-weight: 400;
    font-size: 15px;
    text-align: center;
    color: #fff;
}
span{
    margin-top: -5px;
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
  margin-left: 30px;
}
.line{
    width: 33.33%;
}
.line1{
    display: flex;
  flex-direction: column;
}
.line2{
    margin: 10px auto;
    display: flex;
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
    letter-spacing: 1px;
    font-weight: 400;
    color: #fff;
    border: none;
    font-size: 15px;
    text-align: center;
    background: #ed143d;
    box-shadow: 0 1px 2px 0 rgba(60,64,67,0.302), 0 1px 3px 1px rgba(60,64,67,0.149);
}

.line .submitBtn{
    width: 85px;
    text-decoration: none;
    padding: 8px;
    margin-bottom: 20px;
    letter-spacing: 1px;
    font-weight: 400;
    color: #fff;
    border: none;
    font-size: 15px;
    text-align: center;
    background: #00AF87;
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
                                    <input  type="file" name="file" size="60" onchange="previewFile(this);" required>
                                </label>
                            </div>
                            
                            <div class="line2">
                             
                                <input class="submitBtn" type="submit"  name="submit" value="Save">
                            </div>
                                
                        </div>
                    </form>
                </div>

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
                                        
                            
                                <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
                                <label class="addFile"><span class="material-icons">vertical_align_top</span>  Select File
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
