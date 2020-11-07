<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="headstyle.css">
    <title>Responsive Navbar</title>
</head>

<body>
    <header class="nav">
        <div class="navbarContainer">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                <img src="<?php echo BURL.'assets/img/basic/logo.png'; ?>" alt="">
                <h3 class="logo">BAY FRONT</h3>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .85s"><a href="index.php">Home</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="room.php">Room & Lifestyle</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="dining.php">Dining</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="surf.php">Surf</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="activity.php">Activities</a></li>
                        
                       
                        <!-- <li class="nav-link" style="--i: .85s">
                            <a href="#">Menu<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                   
                                    <li class="dropdown-link">
                                        <a href="#">Link 1</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 2</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 3<i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown second">
                                            <ul>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 1</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 2</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">Link 3</a>
                                                </li>
                                                <li class="dropdown-link">
                                                    <a href="#">More<i class="fas fa-caret-down"></i></a>
                                                    <div class="dropdown second">
                                                        <ul>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 1</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 2</a>
                                                            </li>
                                                            <li class="dropdown-link">
                                                                <a href="#">Link 3</a>
                                                            </li>
                                                            <div class="arrow"></div>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <div class="arrow"></div>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="#">Link 4</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li> -->
                       
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">
                    <a href="login.php" class="btn1 transparent">Log in</a>
                    <a href="#" class="btn1 solid">Book Now</a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
   
</body>

</html>