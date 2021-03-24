
<div class="row">
<label for="#"><i class="material-icons">public</i>Country:</label>
    <div class="animate-form">
        <input type="text"  autocomplete="off" name="location" class="inputField" 
        <?php 
            if(isset($reservation['location'])){
                echo 'value="' . $reservation['location'] . '"';
            }
            if(isset($customer['location'])) {
                echo 'value="' . $customer['location'] . '"';
            }
            else {
                echo 'placeholder="Sri Lanka Galle"';
            } 
        
        ?>
        
        required
        >
        
            <label for="name" class="label-name">
                <?php if((isset($errors['location'])) && (isset($reservation['location']))): ?>
                    <span class="content-name"><i class="material-icons">info</i><?php echo $errors['location']; ?></span>
                <?php endif; ?>
            </label>    
    </div>     
</div>


<div class="row">
    <label for="#"><i class="material-icons">room</i>Room Number:</label>
        <div class="animate-form">
            <input type="text"  autocomplete="off" name="room_number" class="inputField" 
            <?php 
                if(isset($reservation['room_number'])){
                    echo 'value="' . $reservation['room_number'] . '"';
                }
                else {
                    echo 'placeholder="A001"';
                } 
            
            ?>
            
            
            >
            
                <label for="name" class="label-name">
                    <?php if((isset($errors['room_number'])) && (isset($reservation['room_number']))): ?>
                        <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_number']; ?></span>
                    <?php endif; ?>
                </label>    
        </div>     
</div>

<div class="row">
    <label for="#"><i class="material-icons">group_add</i>No of Guest:</label>
        <div class="animate-form">
            <input type="text"  autocomplete="off" name="max_guest" class="inputField"
            <?php 
                if(isset($reservation['max_guest'])){
                    echo 'value="' . $reservation['max_guest'] . '"';
                }
                else {
                    echo 'placeholder="5"';
                } 
            
            ?>
            
            
            >
            
                <label for="name" class="label-name">
                    <?php if((isset($errors['max_guest'])) && (isset($reservation['max_guest']))): ?>
                        <span class="content-name"><i class="material-icons">info</i><?php echo $errors['max_guest']; ?></span>
                    <?php endif; ?>
                </label>    
        </div>     
</div>