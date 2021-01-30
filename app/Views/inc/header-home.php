<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="img/favicon.png"/>
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header-style.css">
	<link rel="stylesheet" type="text/css" href="css/footer-style.css">
	<link rel="stylesheet" type="text/css" href="css/basic-style.css">
	<title>Document</title>
</head>
<body>
	<div class="containerheader">
		<?php include(VIEWS.'inc/header_navbar.php'); ?>

		<div class="slideshowContainer">
  
			<img class="imageSlides" src="<?php echo BURL.'assets/img/slideshow/home-slide1.jpg'; ?>" alt="beach side city view">
			<img class="imageSlides" src="<?php echo BURL.'assets/img/slideshow/home-slide2.jpg'; ?>" alt="leaf on the ground">
			<img class="imageSlides" src="<?php echo BURL.'assets/img/slideshow/home-slide3.jpg'; ?>" alt="lake surrounded by mountains">
			<span id ="leftArrow" class="slideshowArrow">&#8249;</span>
			<span id ="rightArrow" class="slideshowArrow">&#8250;</span>
		  
			<div class="slideshowCircles">
				 <span class="circle dot"></span>
			    <span class="circle"></span>
			    <span class="circle"></span>
  			</div>
  
		</div>
		<?php include(VIEWS.'inc/booking-form.php'); ?>
	</div>

	
<script type="text/javascript">
	window.addEventListener("scroll",function () {
		const navbar= document.querySelector(".nav");
		console.log(navbar);
		navbar.classList.toggle("sticky", window.scrollY>0);
	})

	// IMAGE SLIDES & CIRCLES ARRAYS, & COUNTER
	var imageSlides = document.getElementsByClassName('imageSlides');
	var circles = document.getElementsByClassName('circle');
	var leftArrow = document.getElementById('leftArrow');
	var rightArrow = document.getElementById('rightArrow');
	var counter = 0;

	// HIDE ALL IMAGES FUNCTION
	function hideImages() {
	  for (var i = 0; i < imageSlides.length; i++) {
	    imageSlides[i].classList.remove('visible');
	  }
	}

	// REMOVE ALL DOTS FUNCTION
	function removeDots() {
	  for (var i = 0; i < imageSlides.length; i++) {
	    circles[i].classList.remove('dot');
	  }
	}

	// SINGLE IMAGE LOOP/CIRCLES FUNCTION
	function imageLoop() {
	  var currentImage = imageSlides[counter];
	  var currentDot = circles[counter];
	  currentImage.classList.add('visible');
	  removeDots();
	  currentDot.classList.add('dot');
	  counter++;
	}

	// LEFT & RIGHT ARROW FUNCTION & CLICK EVENT LISTENERS
	function arrowClick(e) {
	  var target = e.target;
	  if (target == leftArrow) {
	    clearInterval(imageSlideshowInterval);
	    hideImages();
	    removeDots();
	    if (counter == 1) {
	      counter = (imageSlides.length - 1);
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    } else {
	      counter--;
	      counter--;
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    }
	  } 
	  else if (target == rightArrow) {
	    clearInterval(imageSlideshowInterval);
	    hideImages();
	    removeDots();
	    if (counter == imageSlides.length) {
	      counter = 0;
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    } else {
	      imageLoop();
	      imageSlideshowInterval = setInterval(slideshow, 10000);
	    }
	  }
	}

	leftArrow.addEventListener('click', arrowClick);
	rightArrow.addEventListener('click', arrowClick);


	// IMAGE SLIDE FUNCTION
	function slideshow() {
	  if (counter < imageSlides.length) {
	    imageLoop();
	  } else {
	    counter = 0;
	    hideImages();
	    imageLoop();
	  }
	}

	// SHOW FIRST IMAGE, & THEN SET & CALL SLIDE INTERVAL
	setTimeout(slideshow, 1000);
	var imageSlideshowInterval = setInterval(slideshow, 10000);

</script>

</body>
</html>