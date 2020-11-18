
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap');

.headImg{
  margin-top: 100px;
}
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
  border: 2px #d1e8f3 solid;
    line-height: 30px;
    font-weight: 800;
    color: #62aacc;
    font-family: nanum myeongjo,helveticaneue-light,helvetica neue light,helvetica neue,Helvetica,Arial,lucida grande,sans-serif;
}

.price .titlePrice {
  color: #16131b;
  font-size: 20px;
  letter-spacing: 1px;
  font-weight: 600;
  display: block;
  margin-left: 15px;
  margin-bottom: 20px;
}
.price .value{
    font-weight: 550;
    font-size: 55px;
    letter-spacing: 1px;
    margin-left: 10px;
}

.price .unit{
    font-size: 16px;
    letter-spacing: 1px;
  font-weight: 600;
    color: #16131b;
    text-transform: capitalize;
}

.ht{
  letter-spacing: 2px;
  font-weight: 600;
  margin-left: 15px;
  margin-bottom: 20px;
}

.single-room-meta2 {
    display: flex;
    flex-wrap: wrap;
    flex: 1;
    margin: 20px 10px;
    border: 2px solid #85b5cc;
    padding: 10px 0;
    /* font-family: nanum myeongjo,helveticaneue-light,helvetica neue light,helvetica neue,Helvetica,Arial,lucida grande,sans-serif; */
    
}
.single-room-meta2 .meta2{
  display: block;
  width:  150px;
  margin-left: 30px;
}
.single-room-meta2 .title{
  display: block;
  margin-top: 0;
}
.single-room-meta2 .title i{
  margin-right: 8px;
  color: #85b5cc;
}

.single-room-meta2 .value-meta{
  margin: 2px auto;
  padding: 1px;
  text-align: center;
  font-weight: 700;
}
</style>
<body>
	<?php include(VIEWS.'inc/header_navbar.php'); ?>

  
    <div class="headImg">
			<div class="first">
			
			<h1 class="ht"><?php echo $room_details[0]['room_name']; ?></h1>
			<div class="container">
        <div class="main-img">

        <?php 
            $count =0;
            foreach ($img_details as $key=>$value) {
              // var_dump($value);
              foreach ($value as $set) {
                // echo $set;
                if ($set == 'image_01') {
                    $count = $key +1;
                    // echo $count;
                }
              }
            } 
          ?>
          <?php  if ($count == 0): ?>
            
          <?php else : ?>
            <img id="current" id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>" alt="Placeholder">
          <?php endif;  ?>
        </div>

        <div class="imgs">
        
        <?php  foreach ($img_details as $key=>$value): ?> 
          <img src="<?php echo BURL.$value['image_path']; ?>">
        <?php  endforeach;  ?> 
           
        </div>
      </div>


      <div class="single-room-meta2" >
							<div class="meta2" >
								
								<div class="title">
									<i class="fas fa-user-tie"></i>Guest
								</div>
								<div class="value-meta"><?php echo $room_details[0]['max_guest']; ?></div>
	
							</div>
							
							<div class="meta2">
								
								<div class="title">
									<i class="fas fa-compress"></i>Acreage
								</div>
								<div class="value-meta"><?php echo $room_details[0]['room_size']; ?> sqft</div>
	
							</div>
							<div class="meta2">
								
								<div class="title">
									<i class="fas fa-bed"></i>Beds
								</div>
								<div class="value-meta"><?php echo $room_details[0]['bed_type']; ?></div>
							</div>
							<div class="meta2">
								
								<div class="title">
								<i class="fas fa-eye"></i> View
								</div>
								<div class="value-meta"><?php echo $room_details[0]['room_view']; ?></div>
	
							</div>
              <div class="meta2">
								
								<div class="title">
								<i class="fas fa-building"></i>Floor 
								</div>
								<div class="value-meta">
                <?php 
                if ($room_details[0]['floor_type']==0) {
                  echo "Ground Floor";
                }
                if ($room_details[0]['floor_type']==1) {
                  echo "First Floor";
                }
                if ($room_details[0]['floor_type']==2) {
                  echo "Second Floor";
                }
                if ($room_details[0]['floor_type']==3) {
                  echo "Third Floor";
                }
                 ?></div>
	
							</div>
						</div>

  <h4><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   viewBox="0 0 480 480" height="20" width="20" style="enable-background:new 0 0 480 480;" xml:space="preserve">
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
</svg> <?php 
                if ($room_details[0]['air_condition']==1) {
                  echo "A/C";
                }else{
                  echo "Non A/C";
                }
                 ?> Room</h4>
  <ul style="margin-bottom: 30px;">
    <li>A feast to start your day, the Grand Breakfast offers an exquisite array of international delicacies including a healthy and vegetarian corner, to put you on the right track. Detox Butlers, Croissant Butlers and Chefs at the many action stations are at your command to make your breakfast, a feast fit for a king.</li>
    <li>
Includes 1 King Size Bed, private kitchen, bathroom and some living spaces.</li>
  </ul>


			<?php include(VIEWS.'inc/facility.php'); ?>			</div>


			<div class="second">
        <div class="price pt">
          <span class="titlePrice">Price</span>
          <span class="value"><?php echo $room_details[0]['price']; ?> $</span>
          <span class="unit">/Per Night</span>
        </div>
				<?php include(VIEWS.'inc/booking-formY.php'); ?> 

        <div class="">
          <h4>Hotel Surroundings</h4>
          <div>
            <h5>Beaches in the neighbourhood</h5>
            <ul>
              <li>Weligama Beach  Golden sand Swimming</li>
          
            </ul>
          </div>

          <div>
            <h5>Public transport</h5>
            <ul>
              <li>Weligama Railway Station 600m</li>
              <li>Weligama Bus Stop 550m</li>
            </ul>
          </div>
        </div>

			</div>
			
		</div>




<?php include(VIEWS.'inc/footer.php'); ?>

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