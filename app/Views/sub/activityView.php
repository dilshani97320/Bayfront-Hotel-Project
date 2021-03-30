<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="zoomImgage/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
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

.pimg1 .t1::after,
.pimg1 .t1::before,
.pimg1 .t1::after {
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post4.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>The best turtle hatchery in Sri Lanka</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Watching turtles are one of most riveting things that can be done. Koggala, Habaraduwa, Weligama
                are famous places for laying eggs and conservators care for those eggs until baby turtles come out and
                ready to be released to the sea. The Southern Sri Lanka is turtles' finest place for laying eggs and
                that is why those turtle conservation projects are carried on. You can also take part in this wonderful
                venture and save many sea turtles. Not only will you be able to get up close but also to release
                adorable baby turtles back into the ocean!</p>
            <P class="">Sea turtles are extraordinary creatures that have drastically declining population due to human
                interferences. Many have taken steps to establish conservation centers around the world. </P>
            <P class="">Mirissa, Kosgoda and Tangalle are amongst the other south coast destinations where one can see
                conservation efforts to save some of the sea turtle species nesting on the island’s beaches such as the
                Green Turtle, the Olive Ridley, Hawksbill, Loggerhead, and the giant Leatherback which is the largest
                sea turtle species in the world.</P>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post0.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Spa & Yoga</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Our spa offers a comfort package like no other for revitalizing you. Its unique setting will let
                you slip into a world of your own along with the stunning view of the ocean. We also offer yoga packages
                that will help you relax your mind, limbs, and muscles.</p>
            <p>Services, Treatments and Amenities</p>
            <ul style="list-style-type:disc;">
                <li>Body scrub</li>
                <li>Body wrap</li>
                <li>Couple's Massage</li>
                <li>Fitness classes </li>
                <li>Manicures/pedicures</li>
                <li>Massages</li>
                <li>Steam room</li>
            </ul>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post3.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>White Water Rafting</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Try White Water Rafting in the scenic Kelani River, covering major rapids and minor rapids. This
                activity is only for people above the age of 10 years. You will be provided with safety gear, modern
                rafts, and a extensive safety briefing by instructors . The route covers distance of about 5 km. The
                river and its surrounding will mesmerize you.</p>
            <p class="">Starting off the slopes of Adam’s Peak, the crystalline waters of the Kelani River weave its way
                through the Hill Country of Sri Lanka before flowing into the Indian Ocean. Your adventure will start in
                Kitulgala about 1.5 hours from Ceylon Tea Trails. After a safety briefing that meets international
                safety standards, and a few pointers on rafting technique, you will jump right into the action. Seven
                high quality, class III rapids and warm water make a top-notch introduction to the sport or an exciting
                pick for proficient rafters.</p>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post2.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Rural Bike Ride</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Cycle through the Weligama countryside in scenic back roads, experiencing the tranquility of a
                typical Sri Lankan village life.
                It is unique experience in Sri Lanka, and you may not experience any other part of the island.</p>
            <P class="">Experience the coastal country life up close riding through lush rice paddies, rubber, and
                cinnamon estates. Start the ride from the hotel and pedal along the cycling trail of total distance of
                15km through rural homes, historical buildings, and points of interests such as 'kadey'(small local
                boutique), lake covered with lotuses and water lilies, and coastal beaches. Have a coconut drink from
                the local shop or experience the hospitality of the locals.</P>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post5.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Sea Kayaking</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">A sea kayak tour is one of the best ways to explore the fabulous Weligama Bay. The surf
                conditions here between November and April are ideal for a first timers of this exciting sport. This
                normally takes 4 hours and, on the route,, there is Mirissa fishing harbor, the clay cliffs of the
                southern end of the bay and the many reefs and small islands.</p>
            <p class="">With lush beaches, perfect waves and just the right amount of sun, you can add to your adventure
                story the experiences that you will have here. Weligama is one of the best Sea Kayaking locations in Sri
                Lanka . Weligama has ideal surf conditions for beginners and intermediates. It folds itself around a
                large radiant bay with a wide sandy beach. This kayaking journey will take you out for a full day to
                experience stunning Weligama Bay.
            </p>
            <h4>DETAILS</h4>
            <ul style="list-style-type:none;">
                <li>Location: Weligama (25 kilometers east of Galle)</li>
                <li>Duration: Full Day</li>
                <li>Target Group: All skill levels</li>
                <li>Minimum Group: 6</li>
            </ul>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post7.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Blue whale watching in Sri Lanka</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Mirissa is one of the best Blue whales watching spots in the world. The waters around Mirissa
                are particularly rich in plankton which whales feed on, which will result in sightings around November
                to April / May. Mirissa is also one of the few places where swimming with blue whales is allowed.</p>
            <p class="">Choose your tour company carefully because not all of them are animal or environmentally
                friendly. Trying to get really close to the whales can frighten them unnecessarily. A good tour company
                will keep a careful distance from the whales.
                Whale watching is a waiting game. Choosing a competent company will help to know what to look out for
                and the best spots for whale sightings.</p>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post8.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>World's Best Coral Reefs for Scuba Diving</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">With endless palm-fringed coastline, Sri Lanka provides an amazing dive destination. Sri Lanka
                has an abundance of great wrecks scattered off the coast. Many of the wrecks found here are covered in
                marine life, soft corals, and large schools of fish.</p>
            <p class="">In addition to its spectacular bay, Weligama is an ideal place for diving and snorkelling.The
                coral reef here scores a remarkable length of 700 meters. The site is very shallow which accounts for
                the excellent visibility.The maximum depth of this dive is 22 meters.Beside the corals, there are many
                species of fish as well as sea anemones.</p>
            <p class>Some of the great diving sites here include Yala Rock which consists of rock formations as high as
                15 meters. For a different Scuba experience, this site is recommended as it also has caves opening to
                the corals and fishes.</p>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post9.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Stilt Fishermen in Sri Lanka</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Weligama is famous for the fishing technique employed by the fishermen of the village. They cast
                their lines out while balancing themselves quite cleverly on a 20-50 meter pole in shallow waters; stilt
                fishing derives its name from this act. Even though the origins of this strange way of fishing is yet
                unknown, this may be a good opportunity to chat up a few fishermen who take pride in this unique
                technique. The fishermen here guard their fishing poles with their lives and hand them down from one
                generation to another.</p>
            <p class="">Stilt fishing is a unique Sri Lankan tradition, This requires a great deal of patience. From a
                high position, the fisherman casts his line, and waits until a fish comes along to be caught. This
                method generally targets small fish. It involves waiting for several hours in complete silence to catch
                the fish. The majority of fishermen who practice this do not own modern fishing equipment. Sunrise and
                dusk are the ideal times one could catch a sight of these stilt fishermen. Foreigners can even climb the
                ritipanna to experience this.</p>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post10.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>The Best Trekking Trails in Sri Lanka</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">Coconut Tree Hill is presumably the most well-known place in Mirissa. You can watch the infinite
                sea and Mirissa bay area from the top of this amazing place. It takes you 10-15 min walk up the street
                from Mirissa Beach. You can reach here through Bandaramulla temple and also you can access this place
                via the beach. Accessing via the beach would be difficult if the sea is rough.

                This place has become so popular that a lot of people wish to make a popular frame of the headland
                leaving the sea with coconut trees. We recommend reaching this place in the morning or before sunset. If
                you love this place, make sure don’t throw any rubbish here.</p>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post8-2.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Swinging On a Rope Thalpe</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">The palm tree rope swing at Thalpe Beach near Unawatuna in Sri Lanka is an Instagram Hot spot.
                This ha become a must have shot in travel diaries. Even in the off season people are queuing to get
                their picture on the swing. Set on a narrow stretch of a beach, surronded by palm trees, the swing is on
                an amazing setting looking out to the sun set or sunrise. Swinging, you can feel the thrill, and the
                soft caressing of the sea breeze.</p>
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
        <img class="zoomImgage" src="<?php echo BURL.'assets/img/activity/post1.jpg'; ?>" alt="beach side city view">
        <div class="bottom-left">
            <h1>Relaxing Beaches Perfect for Summer</h1>
        </div>
    </div>
    <div class="subPageView">
        <div class="first">
            <i class="fa fa-heart" aria-hidden="true"></i> <?php echo(rand(10,50));?>
            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo(rand(10,100));?>
            <p class="">As an island nation Sri Lanka does not fall short of beaches to offer. Weligama, where Bayfront
                is situated, caters to all kinds of beaches - upbeat nightlife beaches, couple retreat beaches, offbeat
                explorative beaches, adventure beaches, Instagram famous beaches and, some more.</p>
            <p class="">Mirissa Beach, which is situated quite near to Bayfront is also a laid-back yet adventurous
                location, where travelers can find a sort of satisfaction that is rare to few destinations only. The
                Coconut Tree Grove, whales peeping out to say their hellos, the beach shacks, dancing dolphins, and
                adventurous water sports only add to the attraction.</p>
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
    <div class="parallexImg" style="background-image: url('<?php echo BURL.'assets/img/activity/para.jpg'; ?>');">
        <div class="parallexText">
            <span class="t1">Special promotions</span><br>
            <span class="boader">Find Your Favourite</span>

        </div>
    </div>


    <?php include(VIEWS.'inc/footer.php'); ?>

    <script type="text/javascript">
    window.onload = function() {
        const navbar = document.querySelector(".nav");
        // console.log(navbar);
        navbar.classList.toggle("sticky");
    };
    </script>
</body>

</html>