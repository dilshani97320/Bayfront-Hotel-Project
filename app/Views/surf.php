<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
	<title>BAYFRONT SURF</title>

</head>
<body>

	<?php include(VIEWS.'inc/header-surf.php'); ?>
	<?php include(VIEWS.'inc/surf-service-section.php'); ?>

	<div class="surfSection1" >
		
		<div class="content imgsec ">
			<img src="<?php echo BURL.'assets/img/surf/h1-video-img.jpg'; ?>">
		</div>
		<div class="content textsec ">
			<h3>SURFERS PARADISE</h3><hr class="line-style"><br>
			<p>We set up Bayfront right here in Weligama Bay as it’s the centre of surf culture on the south coast of Sri Lanka. Surrounded by some of the most amazing surf spots in the world, come have fun with us in the surf – from catching your first wave to learning all aspects of the surfing lifestyle, we’ve got you covered with lessons for all levels, guided surf sessions and board rentals.</p>
            
		</div>


	</div><!--section1-->
	
	<div class="surfSection2" >
		
		<div class="part pack0">
		
			<h3>TOP SURF LESSONS</h3><hr class="line-style">
			<ul class="p1">
				<li>&#10004; 2 hour lesson </li>
				<li>&#10004; Surfboard with fins, wax</li>
				<li>&#10004; Free use of rashguard </li>
				<li>&#10004; Beach theory lesson including safety briefing </li>
				<li>&#10004; Transportation included (within Weligama – from main point to jungle beach) </li>
				<li>&#10004; Experienced ISA Qualified surf coach with good english skills </li>
				<li>&#10004; Lesson following our own surf methodology </li>
				<li>&#10004; Coconut Water after the lesson</li>
				<li>&#10004; Shower, changing room and other facilities </li>
			</ul>
		</div>

		<div class="part pack1">
			<figure class="imgBlockSurf">
				<img class="img1" src="<?php echo BURL.'assets/img/surf/29.jpg'; ?>">
  					<div class="title">
    					<div>
					      <h4>group lesons</h4>
					      <h5>Book now</h5>
					    </div>
					</div>
 					<a href="<?php url('Surf/ViewSubPage/4' ); ?>"></a>
				</figure>
			<!-- 
			<h3>Sample topic</h3>
			<p>sdfnhghk nkjkcsucbkbasdckfjsg</p> -->
		</div>

		<div class="part pack2">
			<figure class="imgBlockSurf">
				<img class="img2" src="<?php echo BURL.'assets/img/surf/32.jpg'; ?>">
  					<div class="title">
    					<div>
					      <h4>Solo lesons</h4>
					      <h5>book now</h5>
					    </div>
					</div>
 					<a href="<?php url('Surf/ViewSubPage/5' ); ?>"></a>
				</figure>
			<!-- 
			<h3>Sample topic</h3>
			<p>sdfnhghk nkjkcsucbkbasdckfjsg</p> -->
		</div>
	</div><!--section2-->
	<section class="section3 clearfix">
		<br>
	<!-- <h1>SURFING FOR ALL ABILITIES</h1> 
	<hr class="line-style"><br> -->
	
	<?php include(VIEWS.'inc/surf-block.php'); ?>
	<?php include(VIEWS.'inc/footer.php'); ?>
</body>
</html>