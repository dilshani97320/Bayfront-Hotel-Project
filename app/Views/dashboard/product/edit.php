<?php include(VIEWS.'inc/header.php'); ?>   
    
<h1>Edit Product</h1>

<?php if(isset($success)): ?>
    <h2><?php echo $success; ?></h2>
<?php endif; ?> 
<?php if(isset($error)): ?>
    <h2><?php echo $error; ?></h2>
<?php endif; ?>   




<form action="<?php url('product/update/'.$row['id']); ?>" method="post">
    <div>
        <label for="#">Name</label>
        <input type="text" value="<?php echo $row['name']; ?>" name="name">
    </div>
    <br>
    <div>
        <label for="#">Price</label>
        <input type="text" value="<?php echo $row['price']; ?>" name="price">
    </div>
    <br>
    <div>
        <label for="#">Description</label>
        <input type="text" value="<?php echo $row['description']; ?>" name="description">
    </div>
    <button type="sumbit"  name="submit">Submit</button>
</form>

<?php include(VIEWS.'inc/footer.php'); ?>
    

