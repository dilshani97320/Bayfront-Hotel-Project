<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>reservationThanks</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #f5f5f5;
    }

    .btn {
        position: relative;
        padding: 15px 20px;
        background: #fff;
        font-size: 18px;
        display: inline-block;
        text-decoration: none;
        color: #1d2124;
        cursor: pointer;
        font-weight: 500;
        letter-spacing: 2px;
        transition: 0.5s;
    }

    .btn:hover {
        letter-spacing: 4px;
    }

    #popup {
        top: 50%;
        left: 50%;
        z-index: 1000;
        background: rgb(255, 255, 255);
        width: 450px;
        padding: 80px 50px 50px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.88);
        transition: 0.5s;
    }

    

    #popup .content {
        position: relative;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    #popup .content img {
        max-width: 200px;
    }

    #popup .content h2 {
        font-size: 24px;
        font-weight: 500;
        color: #333333;
        margin: 20px 0 10px;
    }

    #popup .content p {
        text-align: center;
        font-size: 16px;
        color: #333333;
    }

    #popup .content .inputBox {
        position: relative;
        width: 100%;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    

    /* mycase for redesign */
    #popup .content .inputBox a { 
        max-width: 150px;
        background: rgb(37, 89, 173);
        color: #fff;
        border: none;
    }

    .close {
        position: absolute;
        top: 30px;
        right: 30px;
        cursor: pointer;
    }

    .close img {
        max-width: 26px;
    }
</style>
<body>

    <div id="popup">
        <div class="content">
            <img src="<?php echo BURL.'assets/img/thanks/email.png'; ?>" alt="">
            <h2>Reservation Thanks</h2>
            <p>Thanks You For Reservation and Wait For The Accept. </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae libero, magnam velit laudantium veniam cumque!</p>    
            <div class="inputBox">
                <a href="<?php url("home/index"); ?>" class="btn">Website</a>
            </div>
        </div>
    </div>

</body>
</html>



