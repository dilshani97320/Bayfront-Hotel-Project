<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header-style.css">
	<link rel="stylesheet" type="text/css" href="css/footer-style.css">
	<link rel="stylesheet" type="text/css" href="css/basic-style.css">		
	<title>Room</title>
</head>
<style>
	.room{
	/*background-color: #fff;*/
	/*color: #000;*/
	width: 1400px;
	height: 500px;
	/*border: 2px solid black;*/
	margin: 20px auto;
	display: flex;
	flex-direction: row;
	align-items: center;
	justify-content: center;
	box-shadow:0 14px 80px rgba(0,0,0,.2);
}

.img-details{
	/*position: relative;*/


	padding: 20px
}.img-details img{
	/*position: relative;*/
	width: 500px;
	height: 400px;
}.details{
	/*position: relative;*/
	width: 50%;
	text-align: left; 
	padding: 10px
}

.title{
	font-size: 35px;
	margin-bottom: 10px;
	letter-spacing: 1.3px;	
	text-transform: uppercase;
	color: #000;
}

.text{
	font-size: 16px;
	margin-bottom: 3px;
	color:#000 rgba(0,0,0,.7);
}

.viewroom ,.booknow{
	display: inline-block;
	margin:40px;
	padding: 20px 40px;
	letter-spacing: 1px;
	text-transform: uppercase;
	font-weight: 700;
	color: #000;
	text-decoration: none;
	border-radius: 10px;
	background-image: linear-gradient(to right, #1E90FF 0%,#4facfe 100%);
}
.bttn{
	float: right;
	display: flex;
	margin-left: auto;	

	width: 100%;

}
.price{
	float: right;
	font-size: 22px;
	letter-spacing: 1.5px;
}
</style>
<body>
		 <?php include("common/header-room.php"); ?>
		 
	<div class="room">
		
		<div class="img-details">
			<img src="other/21.jpg">
		</div>

		<div class="details">
		<h2 class="title">Single Room</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis</p>
			<ul>
				<li><i class="fa fa-wifi" aria-hidden="true"></i> Free wifi</li>
				<li><i class="fa fa-cutlery" aria-hidden="true"> Delesious foof</i></li>
				<li><i class="fa fa-coffee" aria-hidden="true"> Coffee</i></li>
				<li><i class="fa fa-car" aria-hidden="true"> Parking</i></li>
			</ul>
			<div class="price">
				<h2>LKR 7500.00</h2>
			</div>
		<div class="bttn">
			 <a class="btn" href="view-room.php">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  <a class="btn" href="#">BOOK NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	    </div>
	</div>
<div class="room">
		
		<div class="img-details">
			<img src="other/21.jpg">
		</div>

		<div class="details">
		<h2 class="title">Single Room</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis</p>
			<ul>
				<li><i class="fa fa-wifi" aria-hidden="true"></i> Free wifi</li>
				<li><i class="fa fa-cutlery" aria-hidden="true"> Delesious foof</i></li>
				<li><i class="fa fa-coffee" aria-hidden="true"> Coffee</i></li>
				<li><i class="fa fa-car" aria-hidden="true"> Parking</i></li>
			</ul>
			<div class="price">
				<h2>LKR 7500.00</h2>
			</div>
		<div class="bttn">
			  <a class="btn" href="#">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  <a class="btn" href="#">BOOK NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	    </div>
	</div>
<div class="room">
		
		<div class="img-details">
			<img src="other/21.jpg">
		</div>

		<div class="details">
		<h2 class="title">Single Room</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis</p>
			<ul>
				<li><i class="fa fa-wifi" aria-hidden="true"></i> Free wifi</li>
				<li><i class="fa fa-cutlery" aria-hidden="true"> Delesious foof</i></li>
				<li><i class="fa fa-coffee" aria-hidden="true"> Coffee</i></li>
				<li><i class="fa fa-car" aria-hidden="true"> Parking</i></li>
			</ul>
			<div class="price">
				<h2>LKR 7500.00</h2>
			</div>
		<div class="bttn">
			 <a class="btn" href="#">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  <a class="btn" href="#">BOOK NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	    </div>
	</div>
<div class="room">
		
		<div class="img-details">
			<img src="other/21.jpg">
		</div>

		<div class="details">
		<h2 class="title">Single Room</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis</p>
			<ul>
				<li><i class="fa fa-wifi" aria-hidden="true"></i> Free wifi</li>
				<li><i class="fa fa-cutlery" aria-hidden="true"> Delesious foof</i></li>
				<li><i class="fa fa-coffee" aria-hidden="true"> Coffee</i></li>
				<li><i class="fa fa-car" aria-hidden="true"> Parking</i></li>
			</ul>
			<div class="price">
				<h2>LKR 7500.00</h2>
			</div>
		<div class="bttn">
			 <a class="btn" href="#">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  <a class="btn" href="#">BOOK NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	    </div>
	</div>
<div class="room">
		
		<div class="img-details">
			<img src="other/21.jpg">
		</div>

		<div class="details">
		<h2 class="title">Single Room</h2>
		<p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis</p>
			<ul>
				<li><i class="fa fa-wifi" aria-hidden="true"></i> Free wifi</li>
				<li><i class="fa fa-cutlery" aria-hidden="true"> Delesious foof</i></li>
				<li><i class="fa fa-coffee" aria-hidden="true"> Coffee</i></li>
				<li><i class="fa fa-car" aria-hidden="true"> Parking</i></li>
			</ul>
			<div class="price">
				<h2>LKR 7500.00</h2>
			</div>
		<div class="bttn">
			 <a class="btn" href="#">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
			  <a class="btn" href="#">BOOK NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		</div>
	    </div>
	</div>


	<?php include("common/footer.php"); ?>
</body>
</html>