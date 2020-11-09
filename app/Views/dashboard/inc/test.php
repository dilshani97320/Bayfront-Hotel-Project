
<table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Check-In-Date</th>
                <th>Check-Out-Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; ?>
            <?php foreach($rooms as $row): ?>
            <tr>
                <td> <?php echo $row['room_id']; ?></td>
                <td> <?php echo $row['room_type_id'];?></td>
                <td> <?php echo $row['room_number'];?></td>
                <td> <?php echo $row['check_in_date'];?></td>
                <td> <?php echo $row['check_out_date'];?></td>
            </tr>
            <?php endforeach ?> 
        </tbody>
    </table>



