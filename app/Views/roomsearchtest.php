<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">	
	<link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
	<title>BAYFRONT ROOM</title>

</head>
<style>
	.servbadge .meta2 svg{
		fill: #008009;
	}
	.value-meta{
		font-weight: 500;
	}
</style>
<body>
		 <!-- <?php //include(VIEWS.'inc/header-room.php');  ?> -->
	<?php  
		foreach ($room_details as $key => $value) {
			// $arr[3] will be updated with each value from $arr...
			// echo "{$key} => {$value} ";
			// $value['']
			echo $value['is_delete'];
			// print_r($room_details);
		}
		print_r($room_details);
		echo "</br>";
		print_r($room_all);
	die();
	
	
	; ?>
		 
	
	
	<div class="container">
<?php $count =0; ?>
	<?php  foreach ($room_details as $value): //var_dump($value); ?>
		<?php  if($value['is_delete']== 0): ?>
		<div class="room">
			<div class="room-slider">
				<div class="room-details ">
					<div class="content-room">
						<span class="value" style="color: #000; font-size: 30px;"> </span>
						<span class="value"> <?php echo $value['price']; ?> $</span>
						<span class="unit" style="color: #000;">/Per Night</span>
						<h1><?php echo $value['room_name']; ?></h1>
						<span><?php echo $value['type_name']; ?></span>
						<p>Lorem20 ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, quas quasi nulla aut blanditiis, minima omnis molestiae! Necessitatibus, adipisci nam id quis natus.</p>
						
						<div class="single-room-meta">
							<div class="meta">
								
								<div class="title">
									<i class="fas fa-user-tie"></i>Guest
								</div>
								<div class="value-meta"><?php echo $value['max_guest']; ?></div>
	
							</div>
							
							<div class="meta">
								
								<div class="title">
									<i class="fas fa-compress"></i>Acreage
								</div>
								<div class="value-meta"><?php echo $value['room_size']; ?> sq.ft</div>
	
							</div>
							<div class="meta">
								
								<div class="title">
									<i class="fas fa-bed"></i>Beds
								</div>
								<div class="value-meta"><?php echo $value['bed_type']; ?></div>
							</div>
							<div class="meta">
								
								<div class="title">
								<i class="fas fa-eye"></i> View
								</div>
								<div class="value-meta"><?php echo $value['room_view']; ?></div>
	
							</div>
						</div>
						<div class="servbadge">
						<div class="meta2">
								
							<div class="title2"><svg class="bk-icon -iconset-wifi hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><circle cx="64" cy="100" r="12"></circle><path d="M118.3 32.7A94.9 94.9 0 0 0 64 16 94.9 94.9 0 0 0 9.7 32.7a4 4 0 1 0 4.6 6.6A87 87 0 0 1 64 24a87 87 0 0 1 49.7 15.3 4 4 0 1 0 4.6-6.6zM87.7 68.4a54.9 54.9 0 0 0-47.4 0 4 4 0 0 0 3.4 7.2 47 47 0 0 1 40.6 0 4 4 0 0 0 3.4-7.2z"></path><path d="M104 50.5a81.2 81.2 0 0 0-80 0 4 4 0 0 0 4 7 73.2 73.2 0 0 1 72 0 4 4 0 0 0 4-7z"></path></svg>Free WiFi</div>
	
						</div>
						<div class="meta2">
								
							<div class="title2"><svg class="bk-icon -iconset-nosmoking hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M64 8a56 56 0 1 0 56 56A56 56 0 0 0 64 8zm0 104a48 48 0 0 1-36.6-79l31 31H28v8h38.3L95 100.6A47.8 47.8 0 0 1 64 112zm36.6-17l-23-23H84v-8H69.7L33 27.4A48 48 0 0 1 100.6 95zM92 64h8v8h-8zm0-10c0-7.7-5.9-14-13.2-14H78a2 2 0 0 1-2-2 10 10 0 0 0-10-10h-8a2 2 0 0 1 0-4h8a14 14 0 0 1 13.8 12c9 .6 16.2 8.4 16.2 18a2 2 0 0 1-4 0zm-8 0a2 2 0 0 1-4 0 2 2 0 0 0-2-2h-3a15 15 0 0 1-15-15 2 2 0 0 1 4 0 11 11 0 0 0 11 11h3a6 6 0 0 1 6 6z"></path></svg>Non-Smoking Rooms</div>
	
						</div>
						<!-- <div class="meta2">
								
							<div class="title2"><svg class="bk-icon -iconset-shuttle hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M92 100a10 10 0 1 1-10 10 10 10 0 0 1 10-10zm-66 10a10 10 0 1 0 10-10 10 10 0 0 0-10 10zM16 56h88.2a8 8 0 0 1 7.6 5.5l7.8 26.3a8 8 0 0 1 .4 2.5V106a6 6 0 0 1-6 6h-6.1a16 16 0 1 0-31.8 0H52a16 16 0 1 0-31.8 0H16a8 8 0 0 1-8-8V64a8 8 0 0 1 8-8zm72 24l25 8-7-24H88zm-24 0h16V64H64zm-24 0h16V64H40zm-24 0h16V64H16zm28.2-44.6l8 4.5 4.4 8a.4.4 0 0 0 .6 0l1-1a.4.4 0 0 0 0-.3V37l6.5-5.9L76.1 46a1.4 1.4 0 0 0 2 .4l1-.5a1.4 1.4 0 0 0 .5-1.8L72 24.2l9-8.4a10.2 10.2 0 0 0 3-6.4A1.4 1.4 0 0 0 82.6 8a10.2 10.2 0 0 0-6.5 2.9L67.6 20l-19.8-7.5a1.4 1.4 0 0 0-1.8.6l-.5 1A1.4 1.4 0 0 0 46 16l15 11.5-5.8 6.2h-9.7a.4.4 0 0 0-.3.1l-1 1a.4.4 0 0 0 0 .6z"></path></svg></i>Airport shuttle</div>
	
						</div> -->
						<div class="meta2">
								
							<div class="title2"><svg class="bk-icon -iconset-parking_sign hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M70.8 44H58v16h12.8a8 8 0 0 0 0-16z"></path><path d="M108 8H20A12 12 0 0 0 8 20v88a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12V20a12 12 0 0 0-12-12zM70 76H58v24H42V28h28a24 24 0 0 1 0 48z"></path></svg>Free Parking</div>
	
						</div>
						<div class="meta2">
								
							<div class="title2"><svg class="bk-icon -iconset-coffee hp__important_facility_icon" height="20" width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true" focusable="false"><path d="M104 116a4 4 0 0 1-4 4H28a4 4 0 0 1 0-8h72a4 4 0 0 1 4 4zM40 96V50a2 2 0 0 1 2-2h44a2 2 0 0 1 2 2v6.4a20 20 0 0 1 0 39.2v.4a8 8 0 0 1-8 8H48a8 8 0 0 1-8-8zm48-31.3v22.6a12 12 0 0 0 0-22.6zM49 88a4 4 0 0 0 8 0V64a4 4 0 0 0-8 0zm-1-52a4 4 0 0 0 4-4V16a4 4 0 0 0-8 0v16a4 4 0 0 0 4 4zm16 4a4 4 0 0 0 4-4V12a4 4 0 0 0-8 0v24a4 4 0 0 0 4 4zm16-4a4 4 0 0 0 4-4V16a4 4 0 0 0-8 0v16a4 4 0 0 0 4 4z"></path></svg>Excellent Breakfast</div>
	
						</div>
					</div>
					</div>
					
					<div class="bttn">
						<a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'] ); ?> ">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
						<a class="btn" href="<?php url('Booking/' ); ?> ">BOOK NOW <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
					</div>
				</div>
				<div class="room-img">
					<?php  foreach ($img_details as $key=>$valueImg): //var_dump($value); ?>
						
							<?php if ($valueImg['room_number'] == $value['room_number'] ): ?>
								<?php if ($valueImg['image_name'] == 'image_01' ): ?>
									<img src="<?php echo BURL.$img_details[$key]['image_path']; ?>" alt="">
								<?php endif; ?>
							<?php endif; ?>
					<?php endforeach; ?>  
					
				</div>
			</div>
		</div>
			 
	<?php endif; ?> 
	<?php endforeach; ?>  
	</div>             
		
	<!-- <?php //include(VIEWS.'inc/footer.php'	); ?> -->
</body>
</html>

