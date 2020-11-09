<?php require 'config/db.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/footer-style.css">
	<link rel="stylesheet" type="text/css" href="css/basic-style.css">
	<title>Document</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');

.container {
  max-width: 1000px;
  margin: auto;
  margin-bottom: 40px;
  /*border: #fff solid 3px;*/
  background: #fff;
}

.main-img img {
  width: 100%;
  height: 500PX;
  object-fit: cover;
}

.imgs img {
  width: 100%;
  height: 100px;
  object-fit: cover;
}

.imgs {
  display: grid;
  grid-template-columns: repeat(8, 1fr);
  grid-gap: 1px;
}

.imgs img {
  cursor: pointer;
}

/* Fade in animation */
@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

.fade-in {
  opacity: 0;
  animation: fadeIn var(--fade-time) ease-in 1 forwards;
}

/* Media Queries */
@media(max-width: 600px) {
  .imgs {
    grid-template-columns: repeat(2, 1fr);
  }
}


.price{
  border: 1px #d1e8f3 solid;
      line-height: 30px;
    font-weight: 800;
    font-size: 60px;
    color: #85b5cc;
    font-family: nanum myeongjo,helveticaneue-light,helvetica neue light,helvetica neue,Helvetica,Arial,lucida grande,sans-serif;
}
.price .titlePrice {
  color: #16131b;
    font-size: 15px;
    display: block;
    margin-bottom: 20px;
}
.price .value{
      font-weight: 800;
    letter-spacing: -5px;
}

.price .unit{
      font-size: 14px;
    color: #16131b;
    text-transform: lowercase;
}
</style>
<body>
	<?php include("common/header_navbar.php"); ?>

<!-- <div class="slidecontainer">
			<img class="image" src="img/post14.jpg" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Breakfast</h1>
		 	</div>
		</div> -->
		<div class="headImg">
			<div class="first">
			
			
			<h1>Deluxe Double Room with Balcony and Sea View</h1>
			<div class="container">
  <div class="main-img">
    <img src="img/view1.jpg" id="current">
  </div>

  <div class="imgs">
    <img src="img/view1.jpg">
    <img src="img/view2.jpg">
    <img src="img/view3.jpg">
    <img src="img/view4.jpg">
    <img src="img/view5.jpg">
    <img src="img/view6.webp">
    <img src="img/view7.webp">
    <img src="img/view8.webp">
  </div>
</div>

  <h2><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 480 480" height="30" width="30" style="enable-background:new 0 0 480 480;" xml:space="preserve">
<g>
  <g>
    <path d="M472,272h-8v-24c-0.021-15.886-9.44-30.254-24-36.608V88c-0.002-3.18-1.886-6.056-4.8-7.328
      c3.121-5.002,4.783-10.776,4.8-16.672c0-17.673-14.327-32-32-32c-17.673,0-32,14.327-32,32c0.033,5.634,1.569,11.157,4.448,16
      H99.552c2.879-4.843,4.415-10.366,4.448-16c0-17.673-14.327-32-32-32S40,46.327,40,64c0.017,5.896,1.679,11.67,4.8,16.672
      C41.886,81.944,40.002,84.82,40,88v123.392C25.44,217.746,16.021,232.114,16,248v24H8c-4.418,0-8,3.582-8,8v112
      c0,4.418,3.582,8,8,8h8v40c0,4.418,3.582,8,8,8h32c4.418,0,8-3.582,8-8v-40h352v40c0,4.418,3.582,8,8,8h32c4.418,0,8-3.582,8-8
      v-40h8c4.418,0,8-3.582,8-8V280C480,275.582,476.418,272,472,272z M408,48c8.837,0,16,7.163,16,16s-7.163,16-16,16
      s-16-7.163-16-16S399.163,48,408,48z M72,48c8.837,0,16,7.163,16,16s-7.163,16-16,16s-16-7.163-16-16S63.163,48,72,48z M56,96h368
      v112h-32.208c5.294-6.883,8.179-15.316,8.208-24v-16c-0.026-22.08-17.92-39.974-40-40h-64c-22.08,0.026-39.974,17.92-40,40v16
      c0.029,8.684,2.914,17.117,8.208,24h-48.416c5.294-6.883,8.179-15.316,8.208-24v-16c-0.026-22.08-17.92-39.974-40-40h-64
      c-22.08,0.026-39.974,17.92-40,40v16c0.029,8.684,2.914,17.117,8.208,24H56V96z M384,168v16c0,13.255-10.745,24-24,24h-64
      c-13.255,0-24-10.745-24-24v-16c0-13.255,10.745-24,24-24h64C373.255,144,384,154.745,384,168z M208,168v16
      c0,13.255-10.745,24-24,24h-64c-13.255,0-24-10.745-24-24v-16c0-13.255,10.745-24,24-24h64C197.255,144,208,154.745,208,168z
       M32,248c0-13.255,10.745-24,24-24h368c13.255,0,24,10.745,24,24v24H32V248z M48,432H32v-32h16V432z M448,432h-16v-32h16V432z
       M464,384H16v-96h448V384z"/>
  </g>
</g>
<g>
  <g>
    <path d="M72,352H40c-4.418,0-8,3.582-8,8s3.582,8,8,8h32c4.418,0,8-3.582,8-8S76.418,352,72,352z"/>
  </g>
</g>
<g>
  <g>
    <path d="M440,352H104c-4.418,0-8,3.582-8,8s3.582,8,8,8h336c4.418,0,8-3.582,8-8S444.418,352,440,352z"/>
  </g>
</g>
</svg>Room <small>400 sq.ft</small></h2>
  <ul style="margin-bottom: 30px;">
    <li>A feast to start your day, the Grand Breakfast offers an exquisite array of international delicacies including a healthy and vegetarian corner, to put you on the right track. Detox Butlers, Croissant Butlers and Chefs at the many action stations are at your command to make your breakfast, a feast fit for a king.</li>
    <li>
Includes 1 King Size Bed, private kitchen, bathroom and some living spaces.</li>
  </ul>


			<?php include("common/facility.php"); ?>			</div>


			<div class="second">
        <div class="price">
          <span class="titlePrice">Price</span>
          <span class="value">$120.6</span>
          <span class="unit">/Night</span>
        </div>
				<?php include("common/booking-formY.php"); ?> 
			</div>
			
		</div>

<?php
  $sql = "SELECT * FROM img ";
  $result = mysqli_query($conn, $sql);
 

  while ( $room = mysqli_fetch_assoc($result)) {
    echo "<img src='{$room['dir']}'  width='40%'>";
  }
?>

<?php include("common/footer.php"); ?>


	<script type="text/javascript">

  window.onload = function () {
    const navbar= document.querySelector(".nav");
    // console.log(navbar);
    navbar.classList.toggle("sticky");
  };

   const current = document.querySelector('#current');
const imgs = document.querySelector('.imgs');
const img = document.querySelectorAll('.imgs img');
const opacity = 0.6;

// Set first img opacity
img[0].style.opacity = opacity;

imgs.addEventListener('click', imgClick);

function imgClick(e) {
  // Reset the opacity
  img.forEach(img => (img.style.opacity = 1));

  // Change current image to src of clicked image
  current.src = e.target.src;

  // Add fade in class
  current.classList.add('fade-in');

  // Remove fade-in class after .5 seconds
  setTimeout(() => current.classList.remove('fade-in'), 500);

  // Change the opacity to opacity var
  e.target.style.opacity = opacity;
}
 
  </script>
</body>
</html>