<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<title>Document</title>
</head>
<body>
	<div class="containerheader">
		<?php include(VIEWS.'inc/header_navbar.php'); ?>

		<div class="slideshowContainer">
  
			<!-- Replace the image 'src' with the images in your project.
			Javascript is set up so that you can add as many images as you like, but make sure that you match the number of 'circle' span elements (below) to the number of images -->
			<img class="imageSlides" src="<?php echo BURL.'assets/img/slideshow/room-slide1.jpg'; ?>" alt="beach side city view">
			<img class="imageSlides" src="<?php echo BURL.'assets/img/slideshow/room-slide2.jpg'; ?>" alt="beach side city view">
			<img class="imageSlides" src="<?php echo BURL.'assets/img/slideshow/room-slide3.jpg'; ?>" alt="beach side city view">
			
			  
			<!-- I would recommend to replace these 'span' elements with 'img' files
			for each the left and right arrow that fits your project, and size accordingly.
			I've shown 'span' elements because I didn't want to upload files. -->
			<span id ="leftArrow" class="slideshowArrow">&#8249;</span>
			<span id ="rightArrow" class="slideshowArrow">&#8250;</span>
		  
			<div class="slideshowCircles">
				<!-- Filled 'dot' class is set to first image in slideshow, and then via Javascript the filled 'dot' class follows the current image.
				Make sure you match the number of these 'circle' span elements to the number of images in your slideshow. -->
			    <span class="circle dot"></span>
			    <span class="circle"></span>
			    <span class="circle"></span>
  			</div>
  
		</div>
	</div>
<?php include(VIEWS.'inc/booking-form.php'); ?>

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