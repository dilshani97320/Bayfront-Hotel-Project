<?php include(VIEWS.'inc/header.php'); ?>   
    
<h1>Add New Product</h1>

<?php if(isset($success)): ?>
    <h2><?php echo $success; ?></h2>
<?php endif; ?> 
<?php if(isset($error)): ?>
    <h2><?php echo $error; ?></h2>
<?php endif; ?>   




<form action="<?php url('product/store'); ?>" method="post">
    <div>
        <label for="#">Name</label>
        <input type="text" name="name">
    </div>
    <br>
    <div>
        <label for="#">Price</label>
        <input type="text" name="price">
    </div>
    <br>
    <div>
        <label for="#">Description</label>
        <input type="text" name="description">
    </div>
    <button type="sumbit" name="submit">Submit</button>
</form>

<?php include(VIEWS.'inc/footer.php'); ?>
    

