<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title></title>
</head>
<body>






















<div id="slideshow">

<?php  foreach ($room_details as $key=>$value): //var_dump($value); ?>	
		<?php  if($value['is_delete']== 0): ?>							
	<div class="slideitem current">
		<div class="room-slider">
			<div class="room-details ">
				<div class="content-room">
					<span class="value"> <?php echo $value['price']; ?> $</span>
					<span class="unit">/Per Night</span>
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
				</div>
				<div class="bttn">
					<a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'] ); ?>">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
					<?php 
						$checkavailability = 1;
					?>
					<a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'].'/'.$checkavailability); ?>">BOOK NOW1<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
							<?php break;  ?> 
	<?php endif; ?> 
	<?php endforeach;  ?> 
		
   <?php  foreach ($room_details as $key=>$value): //var_dump($value); ?>	
		<?php  if($value['is_delete']== 0 && $key>0): ?>	
									
	<div class="slideitem">
		<div class="room-slider">
			<div class="room-details ">
				<div class="content-room">
					<span class="value"> <?php echo $value['price']; ?> $</span>
					<span class="unit">/Per Night</span>
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
				</div>
				<div class="bttn">
					<a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'] ); ?>">VIEW MORE <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
					<?php 
						$checkavailability = 1;
					?>
					<a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'].'/'.$checkavailability); ?>">BOOK NOW1<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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

			
		  
		

<script type="text/javascript">
	$(document).ready(function(){

$("#slideshow > div:gt(0)").hide();

var buttons = "<button class=\"slidebtn prev\"><i class=\"fa fa-long-arrow-left\"></i></button><button class=\"slidebtn next\"><i class=\"fa fa-long-arrow-right\"></i></button\>";

var slidesl = $('.slideitem').length
var d = "<li class=\"dot active-dot\">&bull;</li>";
for (var i = 1; i < slidesl; i++) {
  d = d+"<li class=\"dot\">&bull;</li>";
}	
var dots = "<ul class=\"slider-dots\">" + d + "</ul\>";

$("#slideshow").append(dots).append(buttons);
var interval = setInterval(slide, 10000);

function intslide(func) {
	if (func == 'start') { 
 	interval = setInterval(slide,10000);
	} else {
		clearInterval(interval);		
		}
}

function slide() {
		sact('next', 0, 1200);
}
	
function sact(a, ix, it) {
        var currentSlide = $('.current');
        var nextSlide = currentSlide.next('.slideitem');
        var prevSlide = currentSlide.prev('.slideitem');
		    var reqSlide = $('.slideitem').eq(ix);

		    var currentDot = $('.active-dot');
    	  var nextDot = currentDot.next();
    	  var prevDot = currentDot.prev();
		    var reqDot = $('.dot').eq(ix);
		
        if (nextSlide.length == 0) {
      		nextDot = $('.dot').first();
            nextSlide = $('.slideitem').first();
            }

        if (prevSlide.length == 0) {
      		prevDot = $('.dot').last();
            prevSlide = $('.slideitem').last();
            }
			
		if (a == 'next') {
			var Slide = nextSlide;
			var Dot = nextDot;
			}
			else if (a == 'prev') {
				var Slide = prevSlide;
				var Dot = prevDot;
				}
				else {
					var Slide = reqSlide;
					var Dot = reqDot;
					}

        currentSlide.fadeOut(it).removeClass('current');
        Slide.fadeIn(it).addClass('current');
		
    	currentDot.removeClass('active-dot');
    	Dot.addClass('active-dot');
}	

$('.next').on('click', function(){
		intslide('stop');						
		sact('next', 0, 400);
		intslide('start');						
	});//next

$('.prev').on('click', function(){
		intslide('stop');						
		sact('prev', 0, 400);
		intslide('start');						
	});//prev

$('.dot').on('click', function(){
		intslide('stop');
		var index  = $(this).index();
		sact('dot', index, 400);
		intslide('start');						
	});//prev
//slideshow
});



</script>

			
		  
		


	
</body>
</html>