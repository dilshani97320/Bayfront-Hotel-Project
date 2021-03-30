<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <script type="text/javascript" src="<?php echo BURL.'assets/js/alert.js'; ?>"></script>
    <title>BAYFRONT HOTEL</title>

</head>

<body>

    <?php	if(isset($errors) && !empty($errors)) { ?>
    <!-- echo '<script>alert("Enter Data is invalid")</script>'; -->
    <button style="display:none;" id="error-state"
        data-state="<?php if(isset($errors) && !empty($errors)){echo 'true';} ?>"
        onclick="customAlert.alert('Enter Data is invalid')">
        Custom Alert With No Heading
    </button>
    <?php } else { ?>
    <?php	if(isset($msg2)) { ?>
    <?php	//echo '<script>alert("'.$msg2.'")</script>'; ?>
    <button onload="customAlert.alert('This is a custom alert without heading.')">
        Custom Alert With No Heading
    </button>
    <?php }} ?>



    <?php include(VIEWS.'inc/header-room.php');  ?>
    <div class="container">
        <?php $count =0; //var_dump($discount_details); exit; ?>
        <?php  foreach ($room_details as $key=>$value): //var_dump($value); ?>
        <?php  if($value['is_delete']== 0): ?>
        <div class="room">
            <div class="room-slider">
                <div class="room-details ">
                    <div class="content-room">
                        <span class="value"> </span>
                        <?php $flag=0; ?>
                        <?php  foreach ($discount_details as $key=>$value3): //var_dump($value3); ?>
                        <?php 
						date_default_timezone_set("Asia/Colombo");
						$current_date = date('Y-m-d');
						if($value3['room_type_id'] == $value['type_id'] &&  $current_date >= $value3['start_date'] &&  $current_date <= $value3['end_date'] && $value3['discount_rate']!=0): ?>
                        <?php $flag++; $new =( $value['price']*(100-$value3['discount_rate']))/100;
								$new = round($new, 2);
								//echo $value3['room_type_id']; exit; ?>
                        <span class="valueCut">LKR
                            <?php echo $value['price']; ?>
                        </span><br>
                        <span class="value">LKR <?php echo $new; ?> </span>
                        <span class="unit">/Per Night</span>
                        <?php endif; ?>
                        <?php endforeach; ?>

                        <?php  if($flag== 0): ?>
                        <span class="value">LKR <?php echo $value['price']; ?> </span>
                        <span class="unit">/Per Night</span>

                        <?php endif; ?>

                        <h1><?php echo $value['room_name']; ?></h1>
                        <span><?php echo $value['type_name']; ?></span>
                        <p>
                            <?php echo $value['room_desc']; ?>
                        </p>

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

                        <div class="single-room-meta-two">
                            <div class="servbadge ">

                                <div class="meta2">

                                    <div class="title2"><svg class="bk-icon -iconset-wifi hp__important_facility_icon"
                                            height="20" width="20" viewBox="0 0 128 128" role="presentation"
                                            aria-hidden="true" focusable="false">
                                            <circle cx="64" cy="100" r="12"></circle>
                                            <path
                                                d="M118.3 32.7A94.9 94.9 0 0 0 64 16 94.9 94.9 0 0 0 9.7 32.7a4 4 0 1 0 4.6 6.6A87 87 0 0 1 64 24a87 87 0 0 1 49.7 15.3 4 4 0 1 0 4.6-6.6zM87.7 68.4a54.9 54.9 0 0 0-47.4 0 4 4 0 0 0 3.4 7.2 47 47 0 0 1 40.6 0 4 4 0 0 0 3.4-7.2z">
                                            </path>
                                            <path
                                                d="M104 50.5a81.2 81.2 0 0 0-80 0 4 4 0 0 0 4 7 73.2 73.2 0 0 1 72 0 4 4 0 0 0 4-7z">
                                            </path>
                                        </svg>Free WiFi</div>

                                </div>
                                <?php  if(isset($value['free_canselaration']) && $value['free_canselaration']== 1): ?>
                                <div class="meta2">

                                    <div class="title2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 512 512">
                                            <g>
                                                <path
                                                    d="M476,40h-4V24a8,8,0,0,0-8-8H432a8,8,0,0,0-8,8V40H376V24a8,8,0,0,0-8-8H336a8,8,0,0,0-8,8V40H280V24a8,8,0,0,0-8-8H240a8,8,0,0,0-8,8V40H184V24a8,8,0,0,0-8-8H144a8,8,0,0,0-8,8V40H88V24a8,8,0,0,0-8-8H48a8,8,0,0,0-8,8V40H36A28.031,28.031,0,0,0,8,68V420a28.031,28.031,0,0,0,28,28H138.55a167.693,167.693,0,0,0,234.9,0H476a28.031,28.031,0,0,0,28-28V68A28.031,28.031,0,0,0,476,40Zm-36-8h16V64H440Zm-96,0h16V64H344Zm-96,0h16V64H248Zm-96,0h16V64H152ZM56,32H72V64H56ZM256,480c-83.81,0-152-68.19-152-152s68.19-152,152-152,152,68.19,152,152S339.81,480,256,480Zm232-60a12.01,12.01,0,0,1-12,12H387.85A167.227,167.227,0,0,0,424,328c0-92.64-75.36-168-168-168S88,235.36,88,328a167.227,167.227,0,0,0,36.15,104H36a12.01,12.01,0,0,1-12-12V104H488Zm0-332H24V68A12.01,12.01,0,0,1,36,56h4V72a8,8,0,0,0,8,8H80a8,8,0,0,0,8-8V56h48V72a8,8,0,0,0,8,8h32a8,8,0,0,0,8-8V56h48V72a8,8,0,0,0,8,8h32a8,8,0,0,0,8-8V56h48V72a8,8,0,0,0,8,8h32a8,8,0,0,0,8-8V56h48V72a8,8,0,0,0,8,8h32a8,8,0,0,0,8-8V56h4a12.01,12.01,0,0,1,12,12Z" />
                                                <path
                                                    d="M264,200a8,8,0,0,0-8-8c-74.991,0-136,61.009-136,136a8,8,0,0,0,16,0A120.136,120.136,0,0,1,256,208,8,8,0,0,0,264,200Z" />
                                                <path
                                                    d="M335.2,271.432,312.568,248.8a8,8,0,0,0-11.313,0L256,294.059,210.745,248.8a8,8,0,0,0-11.313,0L176.8,271.432a8,8,0,0,0,0,11.313L222.059,328,176.8,373.255a8,8,0,0,0,0,11.313L199.432,407.2a8,8,0,0,0,11.313,0L256,361.941,301.255,407.2a8,8,0,0,0,11.313,0L335.2,384.568a8,8,0,0,0,0-11.313L289.941,328,335.2,282.745A8,8,0,0,0,335.2,271.432Zm-62.225,50.911a8,8,0,0,0,0,11.314l45.255,45.255-11.314,11.314-45.255-45.255a8,8,0,0,0-11.314,0l-45.255,45.255-11.314-11.314,45.255-45.255a8,8,0,0,0,0-11.314l-45.255-45.255,11.314-11.314,45.255,45.255a8,8,0,0,0,11.314,0l45.255-45.255,11.314,11.314Z" />
                                            </g>
                                        </svg>Free Canselaration</div>

                                </div>
                                <?php  endif; ?>

                                <div class="meta2">

                                    <div class="title2"><svg
                                            class="bk-icon -iconset-parking_sign hp__important_facility_icon"
                                            height="20" width="20" viewBox="0 0 128 128" role="presentation"
                                            aria-hidden="true" focusable="false">
                                            <path d="M70.8 44H58v16h12.8a8 8 0 0 0 0-16z"></path>
                                            <path
                                                d="M108 8H20A12 12 0 0 0 8 20v88a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12V20a12 12 0 0 0-12-12zM70 76H58v24H42V28h28a24 24 0 0 1 0 48z">
                                            </path>
                                        </svg>Free Parking</div>

                                </div>
                                <?php  if(isset($value['breakfast_included']) && $value['breakfast_included']== 1): ?>
                                <div class="meta2">

                                    <div class="title2"><svg class="bk-icon -iconset-coffee hp__important_facility_icon"
                                            height="20" width="20" viewBox="0 0 128 128" role="presentation"
                                            aria-hidden="true" focusable="false">
                                            <path
                                                d="M104 116a4 4 0 0 1-4 4H28a4 4 0 0 1 0-8h72a4 4 0 0 1 4 4zM40 96V50a2 2 0 0 1 2-2h44a2 2 0 0 1 2 2v6.4a20 20 0 0 1 0 39.2v.4a8 8 0 0 1-8 8H48a8 8 0 0 1-8-8zm48-31.3v22.6a12 12 0 0 0 0-22.6zM49 88a4 4 0 0 0 8 0V64a4 4 0 0 0-8 0zm-1-52a4 4 0 0 0 4-4V16a4 4 0 0 0-8 0v16a4 4 0 0 0 4 4zm16 4a4 4 0 0 0 4-4V12a4 4 0 0 0-8 0v24a4 4 0 0 0 4 4zm16-4a4 4 0 0 0 4-4V16a4 4 0 0 0-8 0v16a4 4 0 0 0 4 4z">
                                            </path>
                                        </svg>Excellent Breakfast
                                    </div>

                                </div>
                                <?php  endif; ?>

                                <?php  if(isset($value['hot_water']) && $value['hot_water']== 1): ?>
                                <div class="meta2">

                                    <div class="title2"><svg id="Capa_1" enable-background="new 0 0 512 512" height="20"
                                            viewBox="0 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                                            <g>
                                                <path
                                                    d="m497 422.48h-227v-24.16h1.462c8.284 0 15-6.716 15-15s-6.716-15-15-15h-32.924c-8.284 0-15 6.716-15 15s6.716 15 15 15h1.462v24.16h-46.273v-270.2c0-34.338 27.936-62.273 62.273-62.273s62.273 27.936 62.273 62.273v44.713c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15v-44.713c0-83.964-68.31-152.273-152.274-152.273s-152.272 68.309-152.272 152.273v270.2h-47.265v-24.16h1.461c8.284 0 15-6.716 15-15s-6.716-15-15-15h-32.923c-8.284 0-15 6.716-15 15s6.716 15 15 15h1.462v24.16h-11.462c-8.284 0-15 6.716-15 15v59.514c0 8.284 6.716 15 15 15h482c8.284 0 15-6.716 15-15v-59.514c0-8.284-6.716-15-15-15zm-363.273-270.2c0-67.422 54.852-122.273 122.273-122.273s122.274 54.851 122.274 122.273v29.713h-30v-29.713c0-50.88-41.393-92.273-92.273-92.273s-92.273 41.394-92.273 92.273v270.2h-30v-270.2zm348.273 329.713h-452v-29.513h452z" />
                                                <path
                                                    d="m304.24 311.646c-1.91-5.987-7.285-10.305-13.608-10.626-6.27-.319-12.187 3.465-14.592 9.246-2.397 5.761-.869 12.668 3.779 16.85 4.653 4.188 11.613 5.072 17.141 2.11 6.254-3.35 9.3-10.802 7.28-17.58z" />
                                                <path
                                                    d="m306.76 271.666c5.979-1.815 10.329-7.358 10.624-13.61.295-6.262-3.452-12.187-9.244-14.59-5.788-2.401-12.64-.853-16.852 3.78-4.216 4.637-5.048 11.622-2.108 17.14 3.337 6.264 10.805 9.302 17.58 7.28z" />
                                                <path
                                                    d="m444.93 359.757c-6.249.635-11.53 5.192-13.072 11.28-1.537 6.067 1.014 12.657 6.223 16.12 5.201 3.458 12.231 3.319 17.251-.425 5.029-3.751 7.238-10.395 5.419-16.405-2.041-6.74-8.8-11.295-15.821-10.57z" />
                                                <path
                                                    d="m432.42 301.076c-6.25.635-11.531 5.19-13.075 11.28-1.537 6.063 1.012 12.646 6.215 16.11 5.227 3.479 12.209 3.305 17.261-.42 5.044-3.719 7.233-10.414 5.418-16.4-2.042-6.74-8.794-11.295-15.819-10.57z" />
                                                <path
                                                    d="m407.53 251.586c-2.424 5.745-.853 12.682 3.779 16.85 4.653 4.187 11.613 5.072 17.141 2.11 5.513-2.953 8.7-9.241 7.765-15.434s-5.756-11.277-11.905-12.496c-6.938-1.375-14.078 2.426-16.78 8.97z" />
                                                <path
                                                    d="m376.71 374.067c-1.281-6.151-6.271-10.965-12.505-11.909-6.189-.937-12.486 2.254-15.425 7.769-2.943 5.522-2.117 12.495 2.104 17.14 4.215 4.639 11.066 6.175 16.856 3.78 6.582-2.724 10.271-9.832 8.97-16.78z" />
                                                <path
                                                    d="m376.93 315.516c-.647-6.237-5.194-11.533-11.281-13.065-6.053-1.523-12.67.989-16.119 6.215-3.469 5.258-3.298 12.172.42 17.256 3.687 5.043 10.453 7.248 16.41 5.414 6.731-2.073 11.293-8.773 10.57-15.82z" />
                                                <path
                                                    d="m376.93 255.516c-.647-6.236-5.194-11.533-11.281-13.065-6.053-1.523-12.67.989-16.119 6.215-3.469 5.258-3.298 12.172.42 17.256 3.687 5.043 10.453 7.248 16.41 5.414 6.731-2.073 11.293-8.773 10.57-15.82z" />
                                            </g>
                                        </svg>Hot Water
                                    </div>

                                </div>
                                <?php  endif; ?>
                            </div>
                            <div class="discPrice">

                            </div>
                        </div>


                    </div>

                    <div class="bttn">
                        <a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'] ); ?> ">VIEW MORE <i
                                class="fa fa-chevron-right" aria-hidden="true"></i></a>

                        <!-- Check if user give check-out-date and check-in-date -->
                        <?php if(isset($input_data) && (isset($customer) && $customer['id'] != 0)) { ?>
                        <a class="btn"
                            href="<?php url('Reservation/indexOnline/'.$value['room_number'].'/'.$value['max_guest'].'/'.$input_data['check_in_date'].'/'.$input_data['check_out_date'].'/'.$input_data['no_of_rooms'].'/'.$input_data['no_of_guests'].'/'.$customer['id']); ?>">BOOK
                            NOW<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php }else if(isset($input_data) && (!isset($customer))) { ?>
                        <?php 
								if (session_status() == PHP_SESSION_NONE) {
								    session_start();
								}
								$_SESSION['unreg_room_number'] = $value['room_number'];
								$_SESSION['unreg_max_guest'] = $value['max_guest'];
								$_SESSION['unreg_check_in_date'] = $input_data['check_in_date'];
								$_SESSION['unreg_check_out_date'] = $input_data['check_out_date'];
								$_SESSION['unreg_no_of_rooms'] = $input_data['no_of_rooms'];
								$_SESSION['unreg_no_of_guest'] = $input_data['no_of_guests'];	
									
								; ?>
                        <a class="btn"
                            href="<?php url('Reservation/indexOnline/'.$value['room_number'].'/'.$value['max_guest'].'/'.$input_data['check_in_date'].'/'.$input_data['check_out_date'].'/'.$input_data['no_of_rooms'].'/'.$input_data['no_of_guests'] ); ?>">BOOK
                            NOW<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php }else { ?>
                        <?php 
								$checkavailability = 1;
							?>
                        <a class="btn"
                            href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'].'/'.$checkavailability); ?> ">BOOK
                            NOW<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php } ?>

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

                <div class="room-img-mob">
                    <?php  foreach ($img_details as $key=>$valueImg): //var_dump($value); ?>

                    <?php if ($valueImg['room_number'] == $value['room_number'] ): ?>
                    <?php if ($valueImg['image_name'] == 'image_01' ): ?>
                    <img src="<?php echo BURL.$img_details[$key]['image_path']; ?>" alt="">
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>

                </div>
                <div class="room-details-mob ">
                    <div class="content-room">
                        <span class="value" style="color: #000; font-size: 30px;"> </span>
                        <?php $flag=0; ?>
                        <?php  foreach ($discount_details as $key=>$value3): //var_dump($value3); ?>
                        <?php 
						date_default_timezone_set("Asia/Colombo");
						$current_date = date('Y-m-d');
						if($value3['room_type_id'] == $value['type_id'] &&  $current_date >= $value3['start_date'] &&  $current_date <= $value3['end_date'] && $value3['discount_rate']!=0): ?>
                        <?php $flag++; $new =( $value['price']*(100-$value3['discount_rate']))/100;
								$new = round($new, 2);
								//echo $value3['room_type_id']; exit; ?>
                        <span class="valueCut">LKR
                            <?php echo $value['price']; ?>
                        </span><br>
                        <span class="value">LKR <?php echo $new; ?> </span>
                        <span class="unit">/Per Night</span>
                        <?php endif; ?>
                        <?php endforeach; ?>

                        <?php  if($flag== 0): ?>
                        <span class="value">LKR <?php echo $value['price']; ?> </span>
                        <span class="unit">/Per Night</span>

                        <?php endif; ?>
                        <h1><?php echo $value['room_name']; ?></h1>
                        <span><?php echo $value['type_name']; ?></span>
                        <p>Lorem20 ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, quas quasi nulla aut
                            blanditiis, minima omnis molestiae! Necessitatibus, adipisci nam id quis natus.</p>

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

                                <div class="title2"><svg class="bk-icon -iconset-wifi hp__important_facility_icon"
                                        height="20" width="20" viewBox="0 0 128 128" role="presentation"
                                        aria-hidden="true" focusable="false">
                                        <circle cx="64" cy="100" r="12"></circle>
                                        <path
                                            d="M118.3 32.7A94.9 94.9 0 0 0 64 16 94.9 94.9 0 0 0 9.7 32.7a4 4 0 1 0 4.6 6.6A87 87 0 0 1 64 24a87 87 0 0 1 49.7 15.3 4 4 0 1 0 4.6-6.6zM87.7 68.4a54.9 54.9 0 0 0-47.4 0 4 4 0 0 0 3.4 7.2 47 47 0 0 1 40.6 0 4 4 0 0 0 3.4-7.2z">
                                        </path>
                                        <path
                                            d="M104 50.5a81.2 81.2 0 0 0-80 0 4 4 0 0 0 4 7 73.2 73.2 0 0 1 72 0 4 4 0 0 0 4-7z">
                                        </path>
                                    </svg>Free WiFi</div>

                            </div>
                            <div class="meta2">

                                <div class="title2"><svg class="bk-icon -iconset-nosmoking hp__important_facility_icon"
                                        height="20" width="20" viewBox="0 0 128 128" role="presentation"
                                        aria-hidden="true" focusable="false">
                                        <path
                                            d="M64 8a56 56 0 1 0 56 56A56 56 0 0 0 64 8zm0 104a48 48 0 0 1-36.6-79l31 31H28v8h38.3L95 100.6A47.8 47.8 0 0 1 64 112zm36.6-17l-23-23H84v-8H69.7L33 27.4A48 48 0 0 1 100.6 95zM92 64h8v8h-8zm0-10c0-7.7-5.9-14-13.2-14H78a2 2 0 0 1-2-2 10 10 0 0 0-10-10h-8a2 2 0 0 1 0-4h8a14 14 0 0 1 13.8 12c9 .6 16.2 8.4 16.2 18a2 2 0 0 1-4 0zm-8 0a2 2 0 0 1-4 0 2 2 0 0 0-2-2h-3a15 15 0 0 1-15-15 2 2 0 0 1 4 0 11 11 0 0 0 11 11h3a6 6 0 0 1 6 6z">
                                        </path>
                                    </svg>Non-Smoking Rooms</div>

                            </div>
                            <div class="meta2">

                                <div class="title2"><svg
                                        class="bk-icon -iconset-parking_sign hp__important_facility_icon" height="20"
                                        width="20" viewBox="0 0 128 128" role="presentation" aria-hidden="true"
                                        focusable="false">
                                        <path d="M70.8 44H58v16h12.8a8 8 0 0 0 0-16z"></path>
                                        <path
                                            d="M108 8H20A12 12 0 0 0 8 20v88a12 12 0 0 0 12 12h88a12 12 0 0 0 12-12V20a12 12 0 0 0-12-12zM70 76H58v24H42V28h28a24 24 0 0 1 0 48z">
                                        </path>
                                    </svg>Free Parking</div>

                            </div>
                            <div class="meta2">

                                <div class="title2"><svg class="bk-icon -iconset-coffee hp__important_facility_icon"
                                        height="20" width="20" viewBox="0 0 128 128" role="presentation"
                                        aria-hidden="true" focusable="false">
                                        <path
                                            d="M104 116a4 4 0 0 1-4 4H28a4 4 0 0 1 0-8h72a4 4 0 0 1 4 4zM40 96V50a2 2 0 0 1 2-2h44a2 2 0 0 1 2 2v6.4a20 20 0 0 1 0 39.2v.4a8 8 0 0 1-8 8H48a8 8 0 0 1-8-8zm48-31.3v22.6a12 12 0 0 0 0-22.6zM49 88a4 4 0 0 0 8 0V64a4 4 0 0 0-8 0zm-1-52a4 4 0 0 0 4-4V16a4 4 0 0 0-8 0v16a4 4 0 0 0 4 4zm16 4a4 4 0 0 0 4-4V12a4 4 0 0 0-8 0v24a4 4 0 0 0 4 4zm16-4a4 4 0 0 0 4-4V16a4 4 0 0 0-8 0v16a4 4 0 0 0 4 4z">
                                        </path>
                                    </svg>Excellent Breakfast</div>

                            </div>
                        </div>

                    </div>

                    <div class="bttn">
                        <a class="btn" href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'] ); ?> ">VIEW MORE <i
                                class="fa fa-chevron-right" aria-hidden="true"></i></a>

                        <!-- Check if user give check-out-date and check-in-date -->
                        <?php if(isset($input_data) && (isset($customer) && $customer['id'] != 0)) { ?>
                        <a class="btn"
                            href="<?php url('Reservation/indexOnline/'.$value['room_number'].'/'.$value['max_guest'].'/'.$input_data['check_in_date'].'/'.$input_data['check_out_date'].'/'.$input_data['no_of_rooms'].'/'.$input_data['no_of_guests'].'/'.$customer['id']); ?>">BOOK
                            NOW<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php }else if(isset($input_data) && (!isset($customer))) { ?>
                        <?php 
								if (session_status() == PHP_SESSION_NONE) {
								    session_start();
								}
								$_SESSION['unreg_room_number'] = $value['room_number'];
								$_SESSION['unreg_max_guest'] = $value['max_guest'];
								$_SESSION['unreg_check_in_date'] = $input_data['check_in_date'];
								$_SESSION['unreg_check_out_date'] = $input_data['check_out_date'];
								$_SESSION['unreg_no_of_rooms'] = $input_data['no_of_rooms'];
								$_SESSION['unreg_no_of_guest'] = $input_data['no_of_guests'];	
									
								; ?>
                        <a class="btn"
                            href="<?php url('Reservation/indexOnline/'.$value['room_number'].'/'.$value['max_guest'].'/'.$input_data['check_in_date'].'/'.$input_data['check_out_date'].'/'.$input_data['no_of_rooms'].'/'.$input_data['no_of_guests'] ); ?>">BOOK
                            NOW<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php }else { ?>
                        <?php 
								$checkavailability = 1;
							?>
                        <a class="btn"
                            href="<?php url('RoomSuite/ViewRoom/'.$value['room_number'].'/'.$checkavailability); ?> ">BOOK
                            NOW<i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
        <?php //include(VIEWS.'dashboard/reservation/onlineCreate.php'); ?>

        <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <?php include(VIEWS.'inc/footer.php'	); ?>

    <script>
    if (document.getElementById('error-state')) {
        console.log("shhshdhsdh");
        document.getElementById('error-state').click();
    }
    </script>

</body>

</html>