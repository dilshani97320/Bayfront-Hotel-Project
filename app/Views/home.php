
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
            Our spa offers a comfort package like no other for revitalizing you. 
            Its unique setting will let you slip into a world of your own along with
             the stunning view of the ocean. We also offer yoga packages that will 
             help you relax your mind, limbs, and muscles.
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
              At Bayfront you can sample the freshest and juiciest seafood dishes as
               well as traditional Sri Lankan and Asian cuisine. Our team of skilled
                chefs brings together the best local ingredients and expertise to 
                deliver a scrumptious, globally inspired dining experience.
              </p>
              <a class="btn" href="<?php url('Dining/index'); ?>"
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
                    <h4>Yummy Food</h4>
                    <!-- <h6>Hikkaduwa</h6>/ -->
                  </div>
                </div>
              </figure>
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/dining2.webp'; ?>" alt="sample35" />
                <div class="title">
                  <div>
                    <h4>Tasty Beverages</h4>
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
            Overlooking Mirissa Beach in Sri Lanka, our 3-star beach resort captivates 
            beauty of Sri Lanka and the hospitality of her people. With stylish hotel rooms
             and suites, our hotel has breathtaking water views, excellent service, and a 
             prime location. Take advantage of surfing lessons by professionals. Indulge 
             yourself at our Spa and entrance your taste buds with superlative offerings 
             from our restaurant and bar. During your stay, explore Galle Dutch Fort, Mirissa
              Beach, Jungle Beach, and finally the famous Instagram tourist attraction, the 
              Mirissa Coconut Hill. A stay at our hotel is simply heavenly.
            </p>
            <a class="btn" href="<?php url('Activity/index'); ?>  "
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
                <a href="<?php url('Activity/ViewSubPage/7' ); ?>"></a>
              </figure>
            </div>
            <div class="img2">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act2.jpg'; ?>" alt="" class="img1" />
                <div class="title">
                  <div>
                    <h4>Trekking Trails</h4>
                    <h6>Sinharaja</h6>
                  </div>
                </div>
                <a href="<?php url('Activity/ViewSubPage/9' ); ?>"></a>
              </figure>
            </div>
            <div class="img3">
              <figure class="imgBlock">
                <img src="<?php echo BURL.'assets/img/home/act3.jpg'; ?>" alt="" class="img1" />
                <div class="title">
                  <div>
                    <h4>Stilt Fishing</h4>
                    <h6>Weligama</h6>
                  </div>
                </div>
                <a href="<?php url('Activity/ViewSubPage/8' ); ?>"></a>
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
                <a href="<?php url('Activity/ViewSubPage/6' ); ?>"></a>
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
                <a href="<?php url('Activity/ViewSubPage/10' ); ?>"></a>
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
//       $(".hover").mouseleave(function () {
//         $(this).removeClass("hover");
//       });

//       var btn = $('#button');

// $(window).scroll(function() {
//   if ($(window).scrollTop() > 300) {
//     btn.addClass('show');
//   } else {
//     btn.removeClass('show');
//   }
// });

// btn.on('click', function(e) {
//   e.preventDefault();
//   $('html, body').animate({scrollTop:0}, '300');
// });

    </script>
    <?php 
	

 