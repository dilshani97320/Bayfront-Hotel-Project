<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <title>Document</title>
</head>
<style>


</style>

<body>
    <?php 

    if(isset($check_availability['avilability']) && $check_availability['avilability'] == 1) {
      echo '<script>alert("Check Room Availability")</script>';
    }
    if(isset($errors)) {
      echo '<script>alert("Invalid Data")</script>';
    }
    if(isset($roomAvailable['availability']) && $roomAvailable['availability'] == 0 ) {
      echo '<script>alert("Room isn\'t Available")</script>';
    }
    if(isset($roomAvailable['availability']) && $roomAvailable['availability'] == 1 ) {
      echo '<script>alert("Room is Available")</script>';
    }
  
  ?>
    <?php include(VIEWS.'inc/header_navbar.php'); ?>


    <div class="container">
        <div class="roomView">
            <div class="roomSec1">

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
                        <img id="current" id="previewImg" src="<?php echo BURL.$img_details[$count-1]['image_path']; ?>"
                            alt="Placeholder">
                        <?php endif;  ?>
                    </div>

                    <div class="imgs">

                        <?php  foreach ($img_details as $key=>$value): ?>
                        <img src="<?php echo BURL.$value['image_path']; ?>">
                        <?php  endforeach;  ?>

                    </div>
                </div>


                <div class="single-room-meta2">
                    <div class="meta2">

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

                <h4><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 480 480" height="20"
                        width="20" style="enable-background:new 0 0 480 480;" xml:space="preserve">
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
       M464,384H16v-96h448V384z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M72,352H40c-4.418,0-8,3.582-8,8s3.582,8,8,8h32c4.418,0,8-3.582,8-8S76.418,352,72,352z" />
                            </g>
                        </g>
                        <g>
                            <g>
                                <path
                                    d="M440,352H104c-4.418,0-8,3.582-8,8s3.582,8,8,8h336c4.418,0,8-3.582,8-8S444.418,352,440,352z" />
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
                    <li><?php echo $room_details[0]['room_desc']; ?></li>
                </ul>


                <?php include(VIEWS.'inc/facility.php'); ?>
            </div>


            <div class="roomSec2">
                <div class="price pt">
                    <span class="titlePrice">Price Per Night</span>
                    <?php $flag=0; ?>
                    <?php  foreach ($discount_details as $key=>$value3): //var_dump($value3); ?>
                    <?php 
						date_default_timezone_set("Asia/Colombo");
						$current_date = date('Y-m-d');
						if($value3['room_type_id'] == $room_details[0]['type_id'] &&  $current_date >= $value3['start_date'] &&  $current_date <= $value3['end_date'] && $value3['discount_rate']!=0): ?>
                    <?php $flag++; $new =( $room_details[0]['price']*(100-$value3['discount_rate']))/100;
								$new = round($new, 2);
								//echo $value3['room_type_id']; exit; ?>
                    <span class="valueCutTwo">LKR
                        <?php echo $room_details[0]['price']; ?>
                    </span><br>
                    <span class="value">LKR <?php echo $new; ?> </span>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <?php  if($flag== 0): ?>
                    <span class="value">LKR <?php echo $room_details[0]['price']; ?> </span>

                    <?php endif; ?>
                </div>
                <?php include(VIEWS.'inc/booking-formY.php'); ?>

                <div class="Surroundings">
                    <h4> Hotel Surroundings</h4>
                    <div class="Sur">
                        <h5><svg id="Capa_1" enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512"
                                width="20" xmlns="http://www.w3.org/2000/svg">
                                <g id="XMLID_1539_">
                                    <g id="XMLID_649_">
                                        <path id="XMLID_650_"
                                            d="m436.442 217.65c1.595 3.851 5.318 6.176 9.242 6.176 1.275 0 2.571-.246 3.823-.765l27.329-11.32c5.103-2.113 7.525-7.963 5.412-13.065-2.114-5.102-7.963-7.525-13.066-5.411l-27.329 11.32c-5.102 2.113-7.525 7.962-5.411 13.065z" />
                                        <path id="XMLID_675_"
                                            d="m502 302.113h-92.333c-5.171-80.272-72.111-144-153.667-144s-148.495 63.728-153.667 144h-92.333c-5.522 0-10 4.478-10 10s4.478 10 10 10h201c5.522 0 10-4.478 10-10s-4.478-10-10-10h-88.627c5.132-69.235 63.103-124 133.627-124s128.495 54.765 133.627 124h-88.627c-5.522 0-10 4.478-10 10s4.478 10 10 10h201c5.522 0 10-4.478 10-10s-4.478-10-10-10z" />
                                        <path id="XMLID_676_"
                                            d="m256 134.164c5.522 0 10-4.478 10-10v-94.428c0-5.522-4.478-10-10-10s-10 4.478-10 10v94.429c0 5.522 4.478 9.999 10 9.999z" />
                                        <path id="XMLID_677_"
                                            d="m330.741 131.671c1.252.518 2.548.764 3.823.764 3.924 0 7.647-2.325 9.243-6.176l11.32-27.33c2.113-5.103-.31-10.952-5.412-13.066-5.103-2.109-10.952.311-13.066 5.412l-11.32 27.33c-2.113 5.102.31 10.952 5.412 13.066z" />
                                        <path id="XMLID_678_"
                                            d="m388.899 189.213c2.56 0 5.118-.977 7.071-2.929l67.726-67.726c3.905-3.905 3.905-10.237 0-14.143-3.906-3.904-10.236-3.904-14.143 0l-67.726 67.726c-3.905 3.905-3.905 10.237 0 14.143 1.954 1.953 4.513 2.929 7.072 2.929z" />
                                        <path id="XMLID_679_"
                                            d="m168.192 126.259c1.596 3.851 5.319 6.176 9.243 6.176 1.275 0 2.571-.246 3.823-.764 5.103-2.114 7.525-7.964 5.412-13.066l-11.32-27.33c-2.114-5.102-7.963-7.522-13.066-5.412-5.103 2.114-7.525 7.964-5.412 13.066z" />
                                        <path id="XMLID_680_"
                                            d="m35.163 231.462 27.329 11.32c1.252.519 2.548.765 3.823.765 3.924 0 7.647-2.325 9.242-6.176 2.114-5.103-.309-10.952-5.411-13.065l-27.329-11.32c-5.104-2.112-10.951.31-13.066 5.411-2.113 5.102.31 10.952 5.412 13.065z" />
                                        <path id="XMLID_681_"
                                            d="m116.029 186.285c1.953 1.952 4.512 2.929 7.071 2.929s5.118-.977 7.071-2.929c3.905-3.905 3.905-10.237 0-14.143l-67.726-67.726c-3.906-3.904-10.236-3.904-14.143 0-3.905 3.905-3.905 10.237 0 14.143z" />
                                        <path id="XMLID_682_"
                                            d="m424.643 375.745c-7.498 7.499-17.467 11.628-28.071 11.628s-20.573-4.129-28.071-11.628c-23.277-23.275-61.151-23.275-84.429 0-7.498 7.499-17.467 11.628-28.071 11.628s-20.573-4.129-28.071-11.628c-23.278-23.275-61.152-23.275-84.429 0-7.498 7.499-17.468 11.628-28.071 11.628-10.604 0-20.573-4.129-28.071-11.628-3.905-3.902-10.235-3.904-14.143 0-3.905 3.905-3.905 10.237 0 14.143 11.275 11.275 26.268 17.485 42.214 17.485s30.938-6.21 42.214-17.485c15.479-15.479 40.665-15.479 56.144 0 11.275 11.275 26.268 17.485 42.214 17.485s30.938-6.21 42.214-17.485c15.478-15.479 40.664-15.479 56.144 0 11.276 11.275 26.268 17.485 42.214 17.485s30.938-6.21 42.214-17.485c3.905-3.905 3.905-10.237 0-14.143-3.909-3.904-10.241-3.904-14.145 0z" />
                                        <path id="XMLID_683_"
                                            d="m354.357 460.664c-7.498 7.499-17.468 11.628-28.071 11.628-10.604 0-20.574-4.129-28.072-11.628-11.275-11.275-26.268-17.485-42.214-17.485s-30.938 6.21-42.214 17.485c-7.498 7.499-17.468 11.628-28.072 11.628s-20.573-4.129-28.071-11.628c-3.906-3.904-10.236-3.904-14.143 0-3.905 3.905-3.905 10.237 0 14.143 23.278 23.277 61.152 23.275 84.429 0 7.498-7.499 17.467-11.628 28.071-11.628s20.573 4.129 28.071 11.628c11.639 11.639 26.927 17.457 42.215 17.457 15.287 0 30.575-5.818 42.214-17.457 3.905-3.905 3.905-10.237 0-14.143-3.906-3.904-10.236-3.904-14.143 0z" />
                                        <path id="XMLID_684_"
                                            d="m263.069 319.184c1.86-1.86 2.931-4.44 2.931-7.07s-1.07-5.21-2.931-7.069c-1.859-1.86-4.439-2.931-7.069-2.931-2.641 0-5.21 1.07-7.07 2.931-1.86 1.859-2.93 4.439-2.93 7.069s1.069 5.21 2.93 7.07 4.44 2.93 7.07 2.93 5.21-1.07 7.069-2.93z" />
                                    </g>
                                </g>
                            </svg>Beaches in the neighbourhood</h5>
                        <ul>
                            <li>Weligama Beach Golden sand & Swimming</li>

                        </ul>
                    </div>

                    <div class="Sur">
                        <h5><svg height="20" viewBox="0 0 60 60" width="20" xmlns="http://www.w3.org/2000/svg">
                                <g id="Page-1" fill="none" fill-rule="evenodd">
                                    <g id="037---Train" fill="rgb(0,0,0)" fill-rule="nonzero">
                                        <path id="Shape"
                                            d="m1.055 58.969c.35243489.6363405 1.02258019 1.0311518 1.75 1.031h8.5c.8334819-.0030813 1.5785897-.520241 1.873-1.3l.263-.7h33.116l.263.7c.2944103.779759 1.0395181 1.2969187 1.873 1.3h8.5c.728091.0016868 1.3995778-.3924345 1.7530827-1.0289513.353505-.6365168.3331726-1.4148565-.0530827-2.0320487l-11.985-19.166c1.9626704-1.7035156 3.0905593-4.1741467 3.092-6.773v-15c-.0104696-8.8322157-7.1677843-15.98953038-16-16h-8c-8.8322157.01046962-15.9895304 7.1677843-16 16v15c.0014407 2.5988533 1.1293296 5.0694844 3.092 6.773l-11.983 19.166c-.38574136.6165211-.40641889 1.3938431-.054 2.03zm13.138-2.969.75-2h30.114l.75 2zm6-16h19.614l.75 2h-21.114zm-1.5 4h22.614l.75 2h-24.114zm-1.5 4h25.614l1.5 4h-28.614zm40 10h-8.5l-6.768-18.048c1.1713779-.1200533 2.307479-.4704332 3.343-1.031zm-16.193-20h-2.995c.051-4.344.748-11.241 9.995-15.483v8.483c-.0044086 3.8641657-3.1358343 6.9955914-7 7zm-15-36h8c7.7285595.00826732 13.9917327 6.27144053 14 14v4.335c-11.154 4.695-11.941 12.954-11.995 17.665h-12.005c-.059-4.711-.846-12.97-12-17.665v-4.335c.0082673-7.72855947 6.2714405-13.99173268 14-14zm-14 29v-8.483c9.247 4.242 9.944 11.139 10 15.483h-3c-3.8641657-.0044086-6.9955914-3.1358343-7-7zm2.732 7.921c1.035521.5605668 2.1716221.9109467 3.343 1.031l-6.768 18.048h-8.5z" />
                                        <path id="Shape"
                                            d="m15 33h2c.5522847 0 1-.4477153 1-1s-.4477153-1-1-1h-2c-.5522847 0-1 .4477153-1 1s.4477153 1 1 1z" />
                                        <path id="Shape"
                                            d="m45 31h-2c-.5522847 0-1 .4477153-1 1s.4477153 1 1 1h2c.5522847 0 1-.4477153 1-1s-.4477153-1-1-1z" />
                                        <path id="Shape"
                                            d="m16.039 18.958c1.3489259.7403358 2.6255067 1.6054511 3.813 2.584.3556247.2950424.80292.4569881 1.265.458h17.766c.46208-.0010119.9093753-.1629576 1.265-.458 1.1874933-.9785489 2.4640741-1.8436642 3.813-2.584.6384904-.3498191 1.0364533-1.0189637 1.039-1.747v-1.211c-.0071635-6.07216255-4.9278374-10.9928365-11-11h-8c-6.0721626.0071635-10.9928365 4.92783745-11 11v1.211c.0025467.7280363.4005096 1.3971809 1.039 1.747zm26.961-2.958-.008 1.208c-1.4551361.7982094-2.8310054 1.7330906-4.109 2.792h-7.883v-13h3c4.9682782.00551113 8.9944889 4.0317218 9 9zm-26 0c.0055111-4.9682782 4.0317218-8.99448887 9-9h3v13h-7.871c-1.2843578-1.0590594-2.6669745-1.9929703-4.129-2.789z" />
                                        <path id="Shape"
                                            d="m32 25h-4c-.5522847 0-1 .4477153-1 1s.4477153 1 1 1h4c.5522847 0 1-.4477153 1-1s-.4477153-1-1-1z" />
                                        <path id="Shape"
                                            d="m32 29h-4c-.5522847 0-1 .4477153-1 1s.4477153 1 1 1h4c.5522847 0 1-.4477153 1-1s-.4477153-1-1-1z" />
                                        <path id="Shape"
                                            d="m32 33h-4c-.5522847 0-1 .4477153-1 1s.4477153 1 1 1h4c.5522847 0 1-.4477153 1-1s-.4477153-1-1-1z" />
                                    </g>
                                </g>
                            </svg>Public transport</h5>
                        <ul>
                            <li>Weligama Railway Station - 600m</li>
                            <li>Weligama Bus Stop - 550m</li>
                        </ul>
                    </div>
                    <div class="Sur">
                        <h5><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 332 332"
                                width="20" height="20" style="enable-background:new 0 0 332 332;" xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M166,0C74.4,0,0,74.4,0,166s74.4,166,166,166s166-74.4,166-166S257.6,0,166,0z M166,317.6c-83.6,0-151.6-68-151.6-151.6
                  S82.4,14.4,166,14.4s151.6,68,151.6,151.6S249.6,317.6,166,317.6z" />
                                    </g>
                                </g>
                                <g>
                                    <g>
                                        <path d="M252.4,130H202V79.6c0-4-3.2-7.2-7.2-7.2h-57.6c-4,0-7.2,3.2-7.2,7.2V130H79.6c-4,0-7.2,3.2-7.2,7.2v57.6
                  c0,4,3.2,7.2,7.2,7.2H130v50.4c0,4,3.2,7.2,7.2,7.2h57.6c4,0,7.2-3.2,7.2-7.2V202h50.4c4,0,7.2-3.2,7.2-7.2v-57.6
                  C259.2,133.2,256,130,252.4,130z M245.6,187.6h-0.4h-50.4c-4,0-7.2,3.2-7.2,7.2v50.4h-43.2v-50.4c0-4-3.2-7.2-7.2-7.2H86.8v-43.2
                  h50.4c4,0,7.2-3.2,7.2-7.2V86.8H188v50.4c0,4,3.2,7.2,7.2,7.2h50.4V187.6z" />
                                    </g>
                                </g>
                            </svg>
                            Public Medical Centers</h5>
                        <ul>
                            <li>Weligama General Hospital- 1 Km</li>
                        </ul>
                    </div>

                    <div class="Sur">
                        <?Php  foreach ($review_details as $key=>$value): //var_dump($review_details); exit;?>
                        <?Php if($value['is_show']== "1"): ?>
                        <figure class="roomReviewSec">
                            <figcaption>
                                <?Php  foreach ($customer_details as $key1=>$value1):// var_dump($customer_details); exit?>
                                <?Php if($value1['customer_id']== $value['customer_id']): ?>
                                <h3><?php echo $value1['first_name']; ?></h3>
                                <h4><?php echo $value1['location']; ?></h4>
                                <?Php endif; ?>
                                <?Php endforeach; ?>
                                <?php  for ($i=0; $i < $value['rating']; $i++): ?>
                                <span class="ratingY">★</span>
                                <?php  endfor; ?>

                                <?php  for ($i=0; $i < 5-$value['rating']; $i++): ?>
                                <span class="ratingB">★</span>
                                <?php  endfor; ?>

                                <p><?php echo $value['guest_review'] ?></p>
                                <?php $id =$value1['customer_id']; ?>
                                <a href="#" onclick='showMore( <?php echo $id; ?>)'>Read More</a>
                                <p id="<?Php echo $value1['customer_id']; ?>" style="display: none;">
                                    <?php echo $value['hotel_reply'] ?></p>
                            </figcaption>
                        </figure>
                        <?Php endif; ?>
                        <?Php endforeach; ?>
                    </div>
                </div>

            </div>

        </div>
    </div>




    <?php include(VIEWS.'inc/footer.php'); ?>

    <script type="text/javascript">
    window.onload = function() {
        const navbar = document.querySelector(".nav");
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

    function showMore(id) {

        var ptag = document.getElementById(id);
        console.log(ptag);
        ptag.style = "display: block;";
    }
    </script>
</body>

</html>