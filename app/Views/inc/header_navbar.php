<?php  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    
    <!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />          -->
    <link rel="stylesheet" type="text/css" href="<?php echo BURL.'assets/css/basic-style.css'; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo BURL.'assets/css/style.css'; ?>" />
    <title></title>
</head>

<body>

    <?php if (isset($_SESSION['unreg_user_id'])): ?>
        <?php switch ($_SESSION['usertype']): case '0':?>
                
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
                        <li class="nav-link" style="--i: .85s"><a href="<?php url() ?>">Home</a></li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="<?php url('Roomsuite/index'); ?>">Room & Lifestyle</a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/1'); ?>">Single Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/2'); ?>">Double Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/7'); ?>">Family Room</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Dining/index'); ?>">Dining</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Surf/index'); ?>">Surf</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Activity/index'); ?>">Activities</a></li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">

                    <a href="<?php url('Auth/logout'); ?>" class="btn1 transparent">Logout</a>

                    <a href="<?php url('dashboard/index'); ?>" class="btn1 solid">Dashboard</a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
        <?php break; case '1': ?> 
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
                        <li class="nav-link" style="--i: .85s"><a href="<?php url() ?>">Home</a></li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="<?php url('Roomsuite/index'); ?>">Room & Lifestyle</a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/1'); ?>">Single Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/2'); ?>">Double Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/7'); ?>">Family Room</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Dining/index'); ?>">Dining</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Surf/index'); ?>">Surf</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Activity/index'); ?>">Activities</a></li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">

                    <a href="<?php url('Auth/logout'); ?>" class="btn1 transparent">Logout</a>
                    <a href="<?php url('dashboard/index'); ?>" class="btn1 solid">Dashboard</a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
        <?php break; case '2': ?> 
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
                        <li class="nav-link" style="--i: .85s"><a href="<?php url() ?>">Home</a></li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="<?php url('Roomsuite/index'); ?>">Room & Lifestyle</a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/1'); ?>">Single Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/2'); ?>">Double Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/7'); ?>">Family Room</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Dining/index'); ?>">Dining</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Surf/index'); ?>">Surf</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Activity/index'); ?>">Activities</a></li>
                    </ul>
                </div>

                <div class="log-sign" style="--i: 1.8s">

                    <a href="<?php url('Auth/logout'); ?>" class="btn1 transparent">Logout</a>

                    <a href="<?php url('Profile/index'); ?>" class="btn1 solid"><i class="far fa-user-circle" ></i><?php echo $_SESSION['unreg_user_name']; ?></a>
                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
        <?php break; default: ?>

        <?php break; endswitch; ?> 
    <?php else: ?>
    


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
                        <li class="nav-link" style="--i: .85s"><a href="<?php url() ?>">Home</a></li>
                        <li class="nav-link" style="--i: .85s">
                            <a href="<?php url('Roomsuite/index'); ?>">Room & Lifestyle</a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/1'); ?>">Single Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/2'); ?>">Double Room</a>
                                    </li>
                                    <li class="dropdown-link">
                                        <a href="<?php url('Roomsuite/subPage/7'); ?>">Family Room</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Dining/index'); ?>">Dining</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Surf/index'); ?>">Surf</a></li>
                        <li class="nav-link" style="--i: .85s"><a href="<?php url('Activity/index'); ?>">Activities</a></li>
                        
                       
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

                    <a href="<?php url('Home/login'); ?>" class="btn1 transparent">Log in</a>

                    <!-- <a href="<?php //url('Dashboard/index'); ?>" class="btn1 solid">Dashboard</a> -->

                </div>
            </div>

            <div class="hamburger-menu-container">
                <div class="hamburger-menu">
                    <div></div>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>
</body>

</html>