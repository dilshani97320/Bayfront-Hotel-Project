<style>
.addFile{
    padding: 10px;
    width: 100%;
    background: red; 
    display: table;
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
flex= 1
}
.line #previewImg{
    width: 150px;
    height: 150px;
    object-fit: cover;  
}

.line .submitBtn{
    width: 200px;
    padding: 0;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
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
               <form action="<?php url("image/uploadImg"); ?>" method="post" enctype="multipart/form-data">
                    <div class="imgLine">
                        <div class="line">
                            
                            <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                        </div>
                        <div class="line">
                            <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                            <label class="addFile"> Enter Your File
                                <input type="file" name="file" size="60" onchange="previewFile(this);" required>
                            </label> 
                        </div>
                        <div class="line">
                            <input class="submitBtn" type="submit"  name="submit" value="Submit">
                        </div>
                    </div>

                </form>

                <div class="view">
                <img id="previewImg" src="<?php echo BURL.$path; ?>" alt="Placeholder">
           </div> 
       </div>
   </div>

</div>   
