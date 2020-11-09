<?php 
	

// require_once 'controllers/authControllers.php'; 

// if(isset($_GET['token'])){
//         $token =trim($_GET['token']);
//         verifyUser($token);
// }

// if(isset($_GET['password-token'])){
// 	$passwordToken =trim($_GET['password-token']);
// 	echo $_GET['password-token'];
// 	resetPassword($passwordToken);
// }


?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <title>BAYFRONT HOTEL</title>

  </head>
  <body>

    <?php include(VIEWS.'inc/header-home.php'); ?>

    <div class="container">
      <?php include(VIEWS.'inc/service-section.php'); ?>
      <?php include(VIEWS.'inc/room-slider.php'); ?>
      <a id="button"></a>
      <div class="activityContainer">

        <div class="activityRow activityOneTwo">
        	<div class="act activityOne">
          <div class="activity-img">
            <figure class="imgBlock">
              <img src="<?php echo BURL.'assets/img/home/yoga1.jpg'; ?>" alt="sample35" />
              <div class="title">
                <div>
                  <h4>Spa</h4>
                  <!-- <h6>Hikkaduwa</h6> -->
                </div>
              </div>
            </figure>
            <figure class="imgBlock">
              <img src="<?php echo BURL.'assets/img/home/yoga2.png'; ?>" alt="sample35" />
              <div class="title">
                <div>
                  <h4>Yoga</h4>
                  <!-- <h6>Hikkaduwa</h6> -->
                </div>
              </div>
            </figure>

          </div>
          <br />
          <div>
            <h1>SPA & YOGA</h1>

            <hr class="line-style" />
            <br />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt
              autem, numquam, eligendi veniam dignissimos sunt. Repellendus, cum
              perspiciatis impedit, cumque debitis vero odit quas commodi
              aspernatur blanditiis, voluptatibus illum ipsum. ipsum dolor sit
              amet, consectetur adipisicing elit..
            </p>
            <a class="btn" href="<?php url('Activity/ViewSubPage/0' ); ?>">FIND OUT MORE<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="act activityTwo">
          <div>
            <h1>FOOD & BEVERAGE</h1>
            <hr class="line-style" />
            <br />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Inventore vero natus, esse dolores id sit beatae repudiandae? Ea
              molestias quo similique accusamus minima est explicabo commodi,
              praesentium temporibus dolore cumque. ipsum dolor sit amet,
              consectetur adipisicing elit. Voluptatum, quas quasi nulla aut
              blanditiis, minima omnis molestiae! Necessitatibus, adipisci nam
              id quis natus, adipisci nam id quis natusadipisci nam id quis
              natus, adipisci nam id quis natus.
            </p>
            <a class="btn" href="dining.php"
              >FIND OUT MORE
              <i class="fa fa-chevron-right" aria-hidden="true"></i
            ></a>
          </div>
          <br />
          <div class="activity-img">
            <figure class="imgBlock">
              <img src="<?php echo BURL.'assets/img/home/dining1.jpg'; ?>" alt="sample35" />
              <div class="title">
                <div>
                  <h4>Traditional Food</h4>
                  <!-- <h6>Hikkaduwa</h6>/ -->
                </div>
              </div>
            </figure>
            <figure class="imgBlock">
              <img src="<?php echo BURL.'assets/img/home/dining2.webp'; ?>" alt="sample35" />
              <div class="title">
                <div>
                  <h4>Western Food</h4>
                  <!-- <h6>Hikkaduwa</h6> -->
                </div>
              </div>
            </figure>
          </div>
        </div>
        </div>

        <div class="activityRow activityThree">
          <dev class="activity2-text">
            <h1>EXPERIENCE <br />BAYFRONT WELIGAMA</h1>
            <hr class="line-style" />
            <br />
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
              ad modi recusandae sint reiciendis officia libero, nostrum enim
              numquam amet velit! Inventore autem consequuntur expedita facere
              laborum repudiandae facilis quidem voluptates impedit unde nulla
              explicabo atque, consequatur. Sit culpa aliquam quo.
            </p>
            <a class="btn" href="activity.php"
              >FIND OUT MORE
              <i class="fa fa-chevron-right" aria-hidden="true"></i
            ></a>
          </dev>

          <div class="activity2-img">
            <div class="img1">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act1.jpg'; ?>" alt="sample35" />
                <div class="title">
                  <div>
                    <h4>Diving</h4>
                    <h6>Hikkaduwa</h6>
                  </div>
                </div>
                <a href="landing.php?article=7"></a>
              </figure>
            </div>
            <div class="img2">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act2.jpg'; ?>" alt="" class="img1" />
                <div class="title">
                  <div>
                    <h4>Hiking</h4>
                    <h6>Upper Country</h6>
                  </div>
                </div>
                <a href="landing.php?article=9"></a>
              </figure>
            </div>
            <div class="img3">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act3.jpg'; ?>" alt="" class="img1" />
                <div class="title">
                  <div>
                    <h4>Train Ride</h4>
                    <h6>Ella</h6>
                  </div>
                </div>
                <a href="landing.php?article=8"></a>
              </figure>
            </div>
            <div class="img4">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act4.jpg'; ?>" alt="" class="img1" />
                <div class="title">
                  <div>
                    <h4>Whale Watching</h4>
                    <h6>Mirissa</h6>
                  </div>
                </div>
                <a href="landing.php?article=6"></a>
              </figure>
            </div>
            <div class="img5">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act5.jpg'; ?>" alt="" class="img1" />
                <div class="title">
                  <div>
                    <h4>Swinging On a Rope</h4>
                    <h6>Thalpe</h6>
                  </div>
                </div>
                <a href="landing.php?article=10"></a>
              </figure>
            </div>
          </div>
        </div>
      </div>

        <?php include(VIEWS.'inc/surf-block.php'); ?>

      <div id="gallery" class="container-fluid">
        <img src="<?php echo BURL.'assets/img/gallery/15.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/2.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/17.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/12.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/8.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/9.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/10.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/11.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/6.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/13.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/19.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/1.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/18.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/20.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/14.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/21.jpg'; ?>" class="img-responsive" />
        <img src="<?php echo BURL.'assets/img/gallery/22.jpg'; ?>" class="img-responsive" />
      </div>

      <?php include(VIEWS.'inc/review-block.php'); ?>
      
    </div>
    <?php include(VIEWS.'inc/footer.php'); ?>

    <script>
      $(".hover").mouseleave(function () {
        $(this).removeClass("hover");
      });

      var btn = $('#button');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

    </script>
    <?php 
	

 