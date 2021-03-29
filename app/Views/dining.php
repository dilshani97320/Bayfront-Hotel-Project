<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
	<title>BAYFRONT RESTURENT</title>
</head>
<body>

	<?php include(VIEWS.'inc/header-dining.php'); ?>
	
	<!-- Restuarant part -->
	<div class="boxes">
		<div class="title">
				<h1>Restaurant</h1>
				<hr class="line-style"><br>
		</div>
		<div class="details">
		<div class="box">
			<p class="text">
				Beautifully, and lavishly decorated, combined with the low lighting our restaurant 
				can provide the perfect ambience for a delicious meal. You can expect fresh flowers,
				tasteful artwork, candlelight, classical music, and linen tablecloths and napkins. 
				Enjoy the freshest seafood with the hotel's culinary team who will treat you to an 
				expertly prepared meals depicting the island’s culinary identity, with a splash of 
				traditional Sri Lankan and Asian cuisine, using top notch ingredients.  
		</div>

		<div class="box">
			<p class="text">
				Our delicious restaurant specializes in freshly brewed coffee, specialty drinks, mouthwatering pastries, light snacks, and decadent desserts.
				Appreciate our sophisticated Bar' upbeat ambiance with light restaurant bites, fine wines and cocktails.
			</p>
		</div>
	    </div>
	  
		<div class="galleryimg img1">
			<img src="<?php echo BURL.'assets/img/dining/12.jpg'; ?>">
			
		</div>
		<div class="galleryimg img2">
			
			<img src="<?php echo BURL.'assets/img/dining/4.jpg'; ?>">
			
		</div>
		<div class="galleryimg img3">
			
			<img src="<?php echo BURL.'assets/img/dining/5.jpg'; ?>">
			
		</div>
		<div class="galleryimg img4">
			
			<img src="<?php echo BURL.'assets/img/dining/11.jpg'; ?>">
		</div>
		<div class="galleryimg i img5">
			<img src="<?php echo BURL.'assets/img/dining/2.jpg'; ?>">
		</div>
	</div>
    <!-- End Restuarant Part -->
		
    <!-- Services Part -->

		<?php include(VIEWS.'inc/Dining-service-section.php'); ?>
	
	<!-- End Of Services Part -->
    
		<div class="title">
				<h4>Explore Our Menu</h4>
				<hr class="line-style"><br>
		</div>
	
<div class="dineset">
	
	<figure class="dineset-block">
<!-- <img src="other/food1.jpeg" alt="" /> -->
  <div class="foodImage"><img src="<?php echo BURL.'assets/img/dining/food1.jpeg'; ?>" alt="pr-sample15" /></div>
  <figcaption>
    <h3>Breakfast</h3>
    <p>The most important meal of the day is provided with both traditional and western options and a fine china pot of Sri Lankan tea to go with.</p>
  </figcaption><span class="read-more">
     
    Read More <i class="ion-android-arrow-forward"></i></span>
  <a href="<?php url('Dining/ViewSubPage/1' ); ?> "></a>
</figure>
<figure class="dineset-block center ">
<!-- <img src="other/food2.jpg" /> -->
  <div class="foodImage"><img src="<?php echo BURL.'assets/img/dining/food2.jpg'; ?>" /></div>
  <figcaption>
    <h3>Lunch</h3>
    <p>Large amount of delicious, gently spiced dishes in the traditional menu and, mouthwatering seafood and, tasty pasta and spaghetti awaits you at lunch.</p>
  </figcaption><span class="read-more">
     
    Read More <i class="ion-android-arrow-forward"></i></span>
  <a href="<?php url('Dining/ViewSubPage/2' ); ?>"></a>
</figure>
<figure class="dineset-block">
<!-- <img src="other/food3.jpg" alt="pr-sample16" /> -->
  <div class="foodImage"><img src="<?php echo BURL.'assets/img/dining/food3.jpg'; ?>" alt="pr-sample16" /></div>
  <figcaption>
    <h3>Dinner</h3>
    <p>You can choose from a simple traditional menu or the flavorful soups or delectable spicy kottu to end the day with a full stomach.</p>
  </figcaption><span class="read-more">
     
    Read More <i class="ion-android-arrow-forward"></i></span>
  <a href="<?php url('Dining/ViewSubPage/3' ); ?>"></a>
</figure>
</div>



<!-- parallex image -->
	
	<div class="parallexImg" style="background-image: url('<?php echo BURL.'assets/img/dining/1.jpg'; ?>');">
		<div class="parallexText">
			<span class="boader">Find Your Favourite</span>

		</div>
	</div>
	
<div class="title">
				<h4>Our Specialties</h4>
				<hr class="line-style"><br>
		</div>
<!-- Menu Part -->
	<div class="wrapper">
		
		<div class="menu">
			<div class="single-menu">
				<img src="<?php echo BURL.'assets/img/dining/a.jpg'; ?>">
				<div class="menu-content">
					<h4>Chicken Fried Salad <span>$45</span></h4>
					<p class="text">Fried chicken salad is the perfect fuse of crispy chicken and fresh vegetables  in  a dressing.</p>
				</div>
			</div>

			<div class="single-menu">
				<img src="<?php echo BURL.'assets/img/dining/b.jpg'; ?>">
				<div class="menu-content">
					<h4>Chicken Fried Salad <span>$45</span></h4>
					<p class="text">Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis</p>
				</div>
			</div>

			<div class="single-menu">
				<img src="<?php echo BURL.'assets/img/dining/c.jpg'; ?>">
				<div class="menu-content">
					<h4>Chicken Fried Salad <span>$45</span></h4>
					<p class="text">Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis</p>
				</div>
			</div>

			<div class="single-menu">
				<img src="<?php echo BURL.'assets/img/dining/d.jpg'; ?>">
				<div class="menu-content">
					<h4>Chicken Fried Salad <span>$45</span></h4>
					<p class="text">Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis</p>
				</div>
			</div>
			<div class="single-menu">
				<img src="<?php echo BURL.'assets/img/dining/e.jpg'; ?>">
				<div class="menu-content">
					<h4>Chicken Fried Salad <span>$45</span></h4>
					<p class="text">Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis</p>
				</div>
			</div>
			<div class="single-menu">
				<img src="<?php echo BURL.'assets/img/dining/f.jpg'; ?>">
				<div class="menu-content">
					<h4>Chicken Fried Salad <span>$45</span></h4>
					<p class="text">Aperiam tempore sit,perferendis numquam repudiandae porro voluptate dicta saepe facilis</p>
				</div>
			</div>

		</div>
	</div>
	<!-- End of Menu Part -->



	<div class="dineset">
		
<figure class="drinks a">
  <h3>Iced Tea Lemonade</h3>
  <div class="drinkImg">
    <img src="<?php echo BURL.'assets/img/dining/tea2.png'; ?>" alt="sq-sample6"/>
  </div>
  <!-- <div class="rating"><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star"></i><i class="ion-ios-star-outline"></i></div> -->
  <figcaption>
    <p>Bring the litre of water to a boil, remove from heat and add tea leaves. Keep for 3-5 minutes.Adding ginger, lemon and honey will also help to soothe a sore throat.</p>
    <div class="price">
      <s>$24.00</s>$19.00
    </div>
  </figcaption>
  <a href="#" class="add-to-cart"><i class="fa fa-heart" aria-hidden="true"></i></a>
</figure>
<figure class="drinks b">
  <h3> Ceylon Tea</h3>
  <div class="drinkImg">
    <img src="<?php echo BURL.'assets/img/dining/tea1.jpg'; ?>" alt="sq-sample17"/>
  </div>
  <figcaption>
    <p>
      Drinking ceylon tea acts as a backup to your immune system and gives it the extra jolt of minerals and antioxidants it needs to help you recover faster. 
    </p>
    <div class="price">
      <s>$18.00</s>$12.00
    </div>
  </figcaption>
  <a href="#" class="add-to-cart"><i class="fa fa-heart" aria-hidden="true"></i></a>
</figure>
<figure class="drinks c">
  <h3> king coconut </h3>
  <div class="drinkImg">
    <img src="<?php echo BURL.'assets/img/dining/tea3.jpg'; ?>" alt="sq-sample22"/>
  </div>
  <figcaption>
    <p>  
      Its delicious water is a healthy and refreshing drink, with impressive medicinal, cosmetic, and nutritional contributions.
    </p>
    <div class="price">
      <s>$5.00</s>$3.00
    </div>
  </figcaption>
  <a href="#" class="add-to-cart"><i class="fa fa-heart" aria-hidden="true"></i></a>
</figure>
	</div>




	<?php include(VIEWS.'inc/footer.php'); ?>

</body>
</html>