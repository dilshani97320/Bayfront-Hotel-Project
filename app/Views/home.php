
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
            <svg enable-background="new 0 0 244 50" viewBox="0 0 244 50" xmlns="http://www.w3.org/2000/svg">
				<g fill="#7ab1c7">
					<path d="m104.5 8.7c-.9-.1-1.8-.2-2.7-.3-3.3-.5-6.6-1.1-9.1-3.3-.7-.6-1.7-.2-1.7.7-.1 2.5-.1 4.7 1.9 5.9-.7-.4-4.9 3.1-5.5 3.6-1.9 1.4-3.6 3-5.3 4.6-2.9 2.9-6.2 5.6-8.9 8.7-1.2 1.3-2.4 2.5-3.7 3.7-.6.3-1.3.6-1.9.8-2.6.7-6 .5-7.9-1.7-2-2.4-1.7-4.6 1.1-6.5 2.5-1.7 3.7-.9 3.5 2.4-1.8-.1-1.8 2.9 0 2.8 3.9-.2 5.6-4.7 2.5-7.3-3.6-3-9.8 0-10.7 4.3-.5 2.2.3 4.1 1.6 5.5-.7-.1-1.4-.1-2.1 0-.8.1-3.5.5-3.5 1.7 0 1 1.6 1 2.3 1 1.9.1 3.7-.3 5.3-1 1.6.9 3.5 1.4 5.3 1.3-3.8 2.5-8.1 4.1-12.8 3.9-1.5 0-2.9-.2-4.4-.5-.1-.1-.2-.2-.3-.2-.2 0-.3 0-.4 0-.7-.2-1.4-.4-2.1-.6 0-.5 0-1 .1-1.5.2-1.1.6-2.1 1.1-3.1.5-1.1 1.8-2.6 1.6-3.9-.5-2.7-4.1-.4-5.2.4-2.2 1.7-2.5 4.1-1.5 6.5-.6-.3-1.1-.6-1.6-.9-2.1-1.3-4.3-3.2-4.8-5.8-.5-2.4-.1-5.6 2.8-6.1.8-.2 1.9.2 2.1 1 0 .2 0 .4.1.7.5 3.1 6.5 1.1 6.8-1.5.3-2.7-3.4-4.5-5.6-4.6-5.1-.2-9.5 4-9.7 9.1 0 .9.1 1.8.2 2.7-2-.5-4.2-.3-6 .4-.2.1-.4.2-.7.3-.2 0-.3 0-.5 0-.6-1.9-1.9-3.4-3.6-4.4-.9-.6-4.1-2.4-4.6-.4-.2.8.5 1.4.9 1.9.9 1.1 1.9 2.2 3.1 3 .9.6 1.9.9 2.8 1.1-1.6 1-3 2.2-4.7 3-2.9 1.3-5.7 1.3-8.5.7-.5-1-.9-2.1-1.6-3-.8-1.1-1.9-1.9-3-2.7-1-.7-3.4-1.9-4-.1-.6 1.9 1 4.2 2.5 5.2 1 .7 2.2 1.2 3.5 1.5 2.6 1.8 5.8 2.3 8.9 1.7-.8 1.5-1.3 3.1-1.3 4.5 0 .5.5 1 1 1 2.2-.1 3.9-1.9 5.2-3.7 1-1.5 2.5-3.7 2.8-5.6.2-.1.3-.2.5-.3 3.8-2.3 6-1.7 9.2 0 .4.5.9 1 1.4 1.5-2.5-.5-4.7-.4-4.9 1.6-.1 1.5 1.5 2.1 2.7 2.3 2.1.3 5.6.6 7.7-.5 6.3 2.6 14.4 3 19.2 1.7 2.8-.8 5.3-2 7.6-3.5 0 .3-.1.5-.1.8-.2 1.5-.1 5 1.4 5.9 1.7 1 2.7-1.9 3.2-3.1.9-2.4 1-4.9.6-7.4 3.2-2.9 6.1-6.2 9.1-9.4v1.6c.3 3 2.5 5.9 5.7 5.9 2.2 0 5.3-2.4 4.3-4.9-.6-1.6-1.8-1.1-3.1-1.4-1.6-.3-2.8-1.6-3.3-3.2-.2-.8-.1-1.4.1-2 1.9-1.8 3.9-3.5 6-4.9 3.8-2.5 8.7-4.4 13.4-4.4-.6.2-1.3.5-1.9.8-1.5.8-4 2.6-3.4 4.6.5 1.6 1.8 1.4 3 .8 2.5-1.3 4.7-2.8 7.7-3 3.6-.1 5.8 1.4 7.2 4.2.1 1.3-.1 2.5-.9 3.9-1.2 1.9-3.1 3.1-4.8 4.3-.9.6-.7 2.3.6 2.2 1.7 0 4.1-.5 5.9-1.5-.3.9-.7 1.8-1.2 2.7-1 1.7-2.1 3.4-3.7 4.7-1.3 1.2-2.8 1.8-4.6 2-2.2-.5-4-1.4-3.9-4 0-.4.1-.9.5-1.1.6-.3 1.2.2 1.8.3 2.5.4 2.4-6.3-2.6-3.8-3.6 1.8-4.4 6.3-1.7 9.3 7.8 8.8 18.2-4.7 19.3-11.9 1.8-10.4-7.8-17.6-17.1-17.7z"></path>
					<path d="m242.9 30.9c-.6-1.8-2.9-.6-4 .1-1.1.8-2.2 1.6-3 2.7-.7.9-1.1 1.9-1.6 3-2.8.7-5.7.7-8.5-.7-1.7-.8-3.2-2-4.7-3 1-.1 1.9-.4 2.8-1.1 1.2-.8 2.2-1.9 3.1-3 .4-.5 1.1-1.1.9-1.9-.5-2-3.7-.2-4.6.4-1.8 1.1-3 2.6-3.6 4.4-.2 0-.3 0-.5 0-.2-.1-.4-.2-.7-.3-1.8-.7-4-.8-6-.4.2-.8.3-1.7.2-2.7-.2-5.1-4.5-9.3-9.7-9.1-2.2.1-5.9 1.9-5.6 4.6.3 2.6 6.3 4.6 6.8 1.5 0-.2 0-.4.1-.7.2-.8 1.3-1.2 2.1-1 2.8.5 3.2 3.8 2.8 6.1-.5 2.6-2.7 4.4-4.8 5.8-.5.3-1.1.6-1.6.9 1-2.4.7-4.8-1.5-6.5-1.1-.9-4.7-3.2-5.2-.4-.2 1.2 1.1 2.8 1.6 3.9.5 1 .9 2 1.1 3.1.1.5.1 1 .1 1.5-.7.2-1.4.4-2.1.6-.1 0-.3 0-.4 0s-.2.1-.3.2c-1.5.3-2.9.5-4.4.5-4.8.1-9-1.5-12.8-3.9 1.8 0 3.7-.4 5.3-1.3 1.7.8 3.5 1.2 5.3 1 .7 0 2.4 0 2.3-1 0-1.2-2.7-1.6-3.5-1.7-.7-.1-1.4-.1-2.1 0 1.3-1.4 2.1-3.3 1.6-5.5-.9-4.3-7.1-7.3-10.7-4.3-3.1 2.6-1.4 7.1 2.5 7.3 1.8.1 1.8-3 0-2.8-.2-3.3 1-4.1 3.5-2.4 2.8 1.9 3.2 4.1 1.1 6.5-1.9 2.2-5.3 2.4-7.9 1.7-.7-.2-1.3-.5-1.9-.8-1.3-1.2-2.5-2.4-3.7-3.7-2.7-3-6-5.8-8.9-8.7-1.7-1.6-3.4-3.2-5.3-4.6-.6-.5-4.9-4-5.5-3.6 2.1-1.2 2-3.5 1.9-5.9 0-.8-1-1.2-1.6-.7-2.5 2.3-5.9 2.9-9.1 3.3-.9.1-1.8.2-2.7.3-9.4.1-19 7.2-17.3 17.5 1.1 7.3 11.6 20.7 19.3 11.9 2.6-3 1.9-7.5-1.7-9.3-5-2.5-5 4.1-2.6 3.8.6-.1 1.3-.6 1.8-.3.4.2.5.7.5 1.1 0 2.6-1.7 3.5-3.9 4-1.8-.1-3.3-.8-4.6-2-1.5-1.3-2.7-3-3.7-4.7-.5-.9-.9-1.8-1.2-2.7 1.9 1 4.2 1.4 5.9 1.5 1.3 0 1.5-1.6.6-2.2-1.8-1.2-3.7-2.5-4.8-4.3-.9-1.4-1-2.6-.9-3.9 1.5-2.8 3.6-4.3 7.2-4.2 3 .1 5.1 1.7 7.7 3 1.2.6 2.5.8 3-.8.6-2-2-3.8-3.4-4.6-.6-.3-1.2-.6-1.9-.8 4.7.1 9.6 1.9 13.4 4.4 2.2 1.4 4.2 3.1 6 4.9.3.6.4 1.2.1 2-.5 1.6-1.7 2.8-3.3 3.2-1.2.3-2.5-.2-3.1 1.4-.9 2.5 2.1 4.9 4.3 4.9 3.3 0 5.4-2.9 5.7-5.9.1-.6.1-1.1 0-1.6 3 3.2 5.9 6.5 9.1 9.4-.5 2.5-.3 5 .6 7.4.4 1.2 1.4 4.1 3.2 3.1 1.5-.9 1.6-4.4 1.4-5.9 0-.3-.1-.5-.1-.8 2.3 1.5 4.8 2.7 7.6 3.5 4.9 1.3 13 1 19.2-1.7 2 1.1 5.5.8 7.7.5 1.2-.2 2.8-.8 2.7-2.3-.2-2.1-2.4-2.2-4.9-1.6.5-.5 1-1 1.4-1.5 3.2-1.6 5.4-2.2 9.2 0 .2.1.3.2.5.3.3 1.9 1.8 4.2 2.8 5.6 1.2 1.7 2.9 3.5 5.2 3.7.5 0 1-.5 1-1 0-1.4-.5-3-1.3-4.5 3.1.6 6.4 0 8.9-1.7 1.3-.3 2.5-.9 3.5-1.5 1.6-.9 3.2-3.1 2.6-5z"></path>
				</g>
			</svg>
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
	

 