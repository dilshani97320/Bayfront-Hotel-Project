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
    background: #1d2124;
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
    position: fixed;
    /* position:static; */
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
    background: #fff;
    width: 450px;
    padding: 80px 50px 50px;
    box-shadow: 0 15px 30px rgba(0,0,0,0.88);
    transition: 0.5s ease;
    visibility: hidden;
}

#popup.active {
    visibility: visible;
    top: 50%;
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

#popup .content .inputBox input {
    width: 100%;
    border: 1px solid rgba(0,0,0,0.2);
    padding: 15px;
    outline: none;
    font-size: 18px;
}

#popup .content .inputBox input[type="submit"] {
    max-width: 150px;
    background: #1d2124;
    color: #fff;
    border: none;
}
/* mycase for redesign */
#popup .content .inputBox a { 
    max-width: 150px;
    background: #1d2124;
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Popup-Box | JS</title>
</head>
<body>
    <!-- <a href="#" class="btn" onclick="popupToggle();">Subscribe Us</a> -->

    <div id="popup">
        <div class="content">
            <img src="email.png" alt="">
            <h2>Join Our Newsletter</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae libero, magnam velit laudantium veniam cumque!</p>
        </div>
        <a class="close" onclick="popupToggle();"><img src="cancel.png" alt=""></a>
    </div>

    <script>
        function popupToggle(){
            const popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>
</body>
</html>