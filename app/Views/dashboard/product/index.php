<?php include(VIEWS.'inc/header.php'); ?>   
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Quantitiy</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($products as $row): ?>
            <tr>
                <td> <?php echo $i; $i++; ?></td>
                <td> <?php echo $row['name'];?></td>
                <td> <?php echo $row['price'];?><b>$</b></td>
                <td> <?php echo $row['description'];?></td>
                <td> <?php echo("2");?></td>
                <td> 
                    <a href="<?php url('/product/edit/'.$row['id']); ?>">Edit</a>
                </td>
                <td> 
                    <a href="<?php url('/product/delete/'.$row['id']); ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach ?> 
        </tbody>
    </table>



<?php include(VIEWS.'inc/footer.php'); ?>
    

