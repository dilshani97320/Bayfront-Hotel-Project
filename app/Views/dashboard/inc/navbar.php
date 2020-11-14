
<div class="navbar">
<h2 class="nav-header"><?php echo $navbar_title; ?></h2>
<!-- when in logout -->

<?php if(!isset($_SESSION['user_id'])): ?>
    <!-- class="inputField" -->
    <div class="form">
        <form action="<?php url("login/log"); ?>" class="nav-form" method="post">
            <div class="navbar-input">
            <?php if(!empty($errors)) { ?>
                <input type="email" name="email" autocomplete="off" class="naverror-mail" placeholder ="Email Address Invalid">
            <?php } else { ?>
                <input type="email" name="email" autocomplete="off" class="nav-mail" placeholder ="Email Address">
            <?php } ?>    
            </div>
            <div class="navbar-input">
            <?php if(!empty($errors)) { ?>
                <input type="password" name="password" autocomplete="off" class="naverror-pass" placeholder="Password Invalid" >
            <?php } else { ?>
                <input type="password" name="password" autocomplete="off" class="nav-pass" placeholder="Password" >
            <?php } ?>
                
            </div>
            <div class="navbar-button">
                <button type="submit" class="nav-button" name="submit" >Log In</button>
            </div> 
        </form>
    </div>
<?php endif; ?>

<?php if(isset($_SESSION['user_id'])): ?>
    <?php if($search == 1): ?>
        <div class="navform">
            <div class="form-search">
                <form action="<?php url($url); ?>" class="nav-form1" method="post">  
                    <input type="search"  class="nav-search" name="search" placeholder="Search By <?php echo $search_by ; ?>::">
                    <i class="material-icons md-16">search</i>
                </form>
            </div>

            <div class="form1">
                <div class="form2">
                <div class="label-login">
                    <label for="#" class="label-welcome"><i class="material-icons md-18">account_circle</i>Hi <?php echo $_SESSION['username'] ; ?></label>
                </div>
                <form action="<?php url("login/logout"); ?>" method="post">
                    <div class="navbar-button">   
                        <button type="submit" class="nav-button" name="submit">Log Out</button>  
                    </div> 
                </form> 
                </div>
            </div>
        </div>
        
    <?php endif; ?>
    <?php if($search == 0): ?>
        <div class="navform">
            <div class="form-search"></div>
            <div class="form1">
                <div class="form2">
                <div class="label-login">
                    <label for="#" class="label-welcome"><i class="material-icons md-18">account_circle</i>Hi <?php echo $_SESSION['username'] ; ?></label>
                </div>
                <form action="<?php url("login/logout"); ?>" method="post">
                    <div class="navbar-button">   
                        <button type="submit" class="nav-button" name="submit">Log Out</button>  
                    </div> 
                </form> 
                </div>
            </div>
        </div>
    <?php endif; ?>        
<?php endif; ?>

<!-- when login -->


</div>