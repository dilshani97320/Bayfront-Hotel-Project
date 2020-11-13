
<table>
        <thead>
            <tr>
                <!-- <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Check-In-Date</th>
                <th>Check-Out-Date</th> -->
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <?php echo $errors[0]; ?></td>
                <td> <?php echo $errors[1];?></td>
                <?php if(!empty($errors)) {
                    echo "<td> <?php echo $errors[0];?></td>
                          <br>
                          <td> <?php echo $errors[1];?></td>";
                }
                else {
                    echo "No Error";
                }
                
                
                ?>
                
            </tr>
        </tbody>
    </table>



