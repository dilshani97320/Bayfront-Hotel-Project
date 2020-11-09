<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
	<title>BAYFRONT ACTIVITY </title>

</head>
<style>
.pimg1 .t1::before {
    left: 400px;
    /* right: auto; */
}
.pimg1 .t1::after {
    left: 850px;
    /* right: auto; */
}
.pimg1 .t1::after, .pimg1 .t1::before, .pimg1 .t1::after {
    content: '';
    display: block;
    width: 100px;
    height: 3px;
    background-color: #d3a478;
    margin-left: 15px;
    position: absolute;
    top: 16px;
    right: 0;
}
</style>
<body>

	<?php include(VIEWS.'inc/header_navbar.php'); ?>

	<?php 
			// echo $id;
			// exit();

		switch ($id) {
			case '1':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post4.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>The best turtle hatchery in Sri Lanka</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
				<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
			</div>
			
		</div>

	<?php
					break;
				case '0':
	?>

		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post0.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Spa & Yoga</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
				<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>

     <?php 
			break;
			case '2':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post3.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>White Water Rafting</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
			</div>
			
		</div>

	<?php 
			break;
			case '4':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post2.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Rural Bike Ride</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
			</div>
			
		</div>
		<?php 
			break;
			case '5':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post5.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Sea Kayaking</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
			</div>
			
		</div>
	<?php 
			break;
			case '6':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post7.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Blue whale watching in Sri Lanka</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>

	<?php 
			break;
			case '7':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/post8.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>World's Best Coral Reefs for Scuba Diving</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>

	<?php 
			break;
			case '8':
	?>
		<div class="slidecontainer">
			<img class="image" src="img/post8-1.jpg" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Most Scenic Train Ride in Sri Lanka</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>

	<?php 
			break;
			case '9':
	?>
		<div class="slidecontainer">
			<img class="image" src="<?php echo BURL.'assets/img/activity/act2.jpg'; ?>" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>The Best Hiking and Trekking Trails in Sri Lanka</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>

	<?php 
			break;
			case '10':
	?>
		<div class="slidecontainer">
			<img class="image" src="img/post8-2.jpg" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Swinging On a Rope Thalpe</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
			<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>

	<?php 
			break;
			case '11':
	?>
		<div class="slidecontainer">
			<img class="image" src="img/post1.jpg" alt="beach side city view">
		 	<div class="bottom-left">
		 		<h1>Visits to Historic Sites and points of interest</h1>
		 	</div>
		</div>
		<div class="headImg">
			<div class="first">
			<i class="fa fa-heart" aria-hidden="true"></i>  <?php echo(rand(10,50));?>
			<i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
			<p class="">Lorem psum dolor sit amet consectetur adipisicing elit. Minima neque illo consectetur velit sint, necessitatibus, ipsum temporibus earum quod esse doloremque natus magni. Saepe, pariatur. Earum beatae, sit id pariatur? Get behind the wheel of the M4 and prepare for explosive performance and the M division’s renowned handling capabilities. Power comes from a 425-hp twin-turbo inline six-cylinder, mated to either a six-speed manual or a paddle-shifted seven-speed automatic and rear-wheel drive. For the ultimate M4, the Competition package makes 444 hp, with forged 20-inch wheels from the M4 GTS. Offered as a coupe or convertible, the M4 lives up to the legendary performance of the M cars that came before it.</p>	
			</div>
			<div class="second">
				<?php include(VIEWS.'inc/activity-catogery.php'); ?>
				 
				
			</div>
			
		</div>
	<?php
					break;
				default:
					# code...
					break;
			}
		
	?>
	<div class="pimg1" style="background-image: url('<?php echo BURL.'assets/img/activity/para.jpg'; ?>');">
		<div class="ptext">
			<span class="t1">Special promotions</span><br>
			<span class="boader">Find Your Favourite</span>

		</div>
	</div>
	
	
	<?php include(VIEWS.'inc/footer.php'); ?>

	<script type="text/javascript">
	window.onload = function () {
		const navbar= document.querySelector(".nav");
		// console.log(navbar);
		navbar.classList.toggle("sticky");
	};
	</script>
</body>
</html>