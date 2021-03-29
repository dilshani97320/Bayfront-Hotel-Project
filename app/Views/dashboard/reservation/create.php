<?php 
   // Header
   $title = "Add-Reservation page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Reservation Page";
            $search = 0;
            $search_by = '#';
       
            include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>

    <?php 
        if(isset($errors)) {
            // print_r($errors);
            // die();
            if(isset($errors['check_in_date']) && !isset($errors['check_out_date'])) {
               $msg = $errors['check_in_date']; 
               echo '<script>alert("'.$msg.'")</script>';
            }
            else if(isset($errors['check_out_date']) && !isset($errors['check_in_date'])) {
                $msg = $errors['check_out_date']; 
                echo '<script>alert("'.$msg.'")</script>'; 
            }
            else if(isset($errors['check_in_date']) && isset($errors['check_out_date'])) {
                // echo "hello";
                $msg = "Check In and Out Dates Invalid";
                echo '<script>alert("'.$msg.'")</script>';
            }
            else if(isset($errors['room_number']) && $errors['room_number'] == 1) {
                // echo "hello";
                $msg = "Room already reserved Sorry!!";
                echo '<script>alert("'.$msg.'")</script>';
            }
           
        }
    ?>
    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>New Reservation 
                        <span>
                        
                        <?php 
                            if(!isset($customer['id'])) { 
                                $customer['id'] = 0;
                            }
                        ?>
                        <?php if(isset($discount['value']) && isset($bookingCalendar) && $bookingCalendar == 0 ){ ?>
                            <!-- <a href="<?php //url("room/preview/".$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name']) ?>" class="addnew"><i class="material-icons">reply_all</i></a>   -->
                            <a href="<?php url("room/preview/".$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$reservation['type_name']) ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php } elseif(isset($discount['value']) && isset($bookingCalendar) && $bookingCalendar == 1 && isset($room_id) ) { ?>
                            <a href="<?php url("room/checkCalendarRetreive/".$customer['id']."/".$room_id); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php } else { ?>
                            <a href="<?php url("reservation/details"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php } ?>
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                <?php if(isset($discount['value'])){ ?>
                    <form action="<?php url("reservation/create/".$discount['value'].'/'.$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$reservation['type_name']); ?>" method="post" class="addnewform">
                <?php } else { ?>
                    <form action="<?php url("reservation/create"); ?>" method="post" class="addnewform">
                <?php } ?>    
                    <div class="section1">

                        <!-- Customer Part -->
                        <?php 
                        
                            if(!isset($bookingCalendar)) {
                                $bookingCalendar = 0;
                            }
                        
                        
                        ?>

                        <input type="text" name="bookingCalendar" value="<?php echo $bookingCalendar; ?>" hidden>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField" maxlength="20" minlength="4" id="first_name" oninput="validationFirstName()"
                                    <?php 
                                        if(isset($reservation['first_name'])){
                                            echo 'value="' . $reservation['first_name'] . '"';
                                        }
                                        if(isset($customer['first_name'])) {
                                            echo 'value="' . $customer['first_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Start with Capital letter Min length 4 and Max length 20"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['first_name'])) && (isset($reservation['first_name']))){ ?>
                                                <span class="content-name" id="msg_first_name"><i class="material-icons">info</i><?php echo $errors['first_name']; ?></span>
                                            <?php } else { ?>
                                            <!-- Real time validation -->
                                                <span class="content-name" id="msg_first_name"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="last_name" class="inputField" maxlength="20" minlength="4" id="last_name" oninput="validationLastName()"
                                    <?php 
                                        if(isset($reservation['last_name'])){
                                            echo 'value="' . $reservation['last_name'] . '"';
                                        }
                                        if(isset($customer['last_name'])) {
                                            echo 'value="' . $customer['last_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Start with Capital letter Min length 4 and Max length 20"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['last_name'])) && (isset($reservation['last_name']))){ ?>
                                                <span class="content-name" id="msg_last_name"><i class="material-icons">info</i><?php echo $errors['last_name']; ?></span>
                                            <?php } else { ?>
                                                <!-- Real time validation -->
                                                <span class="content-name" id="msg_last_name"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">perm_contact_calendar</i>Age:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="age" class="inputField" maxlength="3" minlength="2" id="age" oninput="validationAge()"
                                    <?php 
                                        if(isset($reservation['age'])){
                                            echo 'value="' . $reservation['age'] . '"';
                                        }
                                        if(isset($customer['age'])) {
                                            echo 'value="' . $customer['age'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must less than 20 Years old"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['age'])) && (isset($reservation['age']))){ ?>
                                                <span class="content-name" id="msg_age"><i class="material-icons">info</i><?php echo $errors['age']; ?></span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                    <span class="content-name" id="msg_age"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>
                        
                        <?php 
                            // echo $reservation['location'];
                            // die();
                        ?>
                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Country:</label>
                                <div class="animate-form">
                                    <select name="location" class="inputField" required>
                                         <option value="">-Select Country-</option>
                                    <?php if(isset($reservation['location'])){ ?>
                                        <option value="<?php echo $reservation['location']; ?>" selected><?php echo $reservation['location']; ?></option>
                                    <?php } elseif(isset($customer['location'])) { ?>
                                        <option value="<?php echo $customer['location']; ?>" selected><?php echo $customer['location']; ?></option>
                                    <?php } else { ?>

                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                    <?php } ?>
                                    </select>    
                                </div>     
                        </div>

                        
                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="contact_number" class="inputField" maxlength="10" minlength="10" id="contact_number" oninput="validationContactNumber()"
                                    <?php 
                                        if(isset($reservation['contact_number'])){
                                            echo 'value="' . $reservation['contact_number'] . '"';
                                        }
                                        if(isset($customer['contact_number'])) {
                                            echo 'value="' . $customer['contact_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Min length and Max length 10"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['contact_number'])) && (isset($reservation['contact_number']))){ ?>
                                                <span class="content-name" id="msg_contact_number"><i class="material-icons">info</i><?php echo $errors['contact_number']; ?></span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                <span class="content-name" id="msg_contact_number"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="email" class="inputField" maxlength="30" minlength="10" id="email" oninput="validationEmail()"
                                    <?php 
                                        if(isset($reservation['email'])){
                                            echo 'value="' . $reservation['email'] . '"';
                                        }
                                        if(isset($customer['email'])) {
                                            echo 'value="' . $customer['email'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must GMAIL Min length 12 and Max length 30"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['email'])) && (isset($reservation['email']))){ ?>
                                                <span class="content-name" id="msg_email"><i class="material-icons">info</i><?php echo $errors['email']; ?></span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                <span class="content-name" id="msg_email"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <!-- End of Customer Details Part  -->

                        <!-- Reservation Details -->

                       
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">room</i>Room Number:</label>
                                <div class="animate-form">
                                    <select name="room_number" class="inputField" id="roomNumber" onchange="giveNoOfGuest()" required>
                                        <option value="">-Select Room Number-</option>
                                        <?php foreach($rooms as $room): ?>
                                            <?php if(isset($reservation['room_number']) && ($reservation['room_number'] == $room['room_number'])) {?>
                                                <option value="<?php echo $room['room_number'].'|'.$room['type_id']; ?>" style="border: none" selected><?php echo $room['room_number']; ?>: <?php echo $room['room_name']; ?></option>     
                                            <?php }if(isset($reservation['room_number']) && ($reservation['room_number'] != $room['room_number'])) { ?>
                                                <option value="<?php echo $room['room_number'].'|'.$room['type_id']; ?>" style="border: none"><?php echo $room['room_number']; ?>: <?php echo $room['room_name']; ?></option> 
                                            <?php }if(!isset($reservation['room_number'])) { ?>
                                                <option value="<?php echo $room['room_number'].'|'.$room['type_id']; ?>" style="border: none"><?php echo $room['room_number']; ?>: <?php echo $room['room_name']; ?></option> 
                                            <?php } ?>
                                        <?php endforeach; ?>       
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">group_add</i>No of Guest:</label>
                                <div class="animate-form">
                                    <select name="max_guest" class="inputField" id="no_of_guest" required >
                                        <?php if(isset($reservation['max_guest'])) {?>
                                            <option value="<?php echo $reservation['max_guest']; ?>" selected>No of Guest:<?php echo $reservation['max_guest']; ?></option>
                                        <?php } ?> 
                                    </select>    
                                </div>     
                        </div>

                       


                        <div class="rowdate">
                            <label for="#"><i class="material-icons">today</i>Check-In Date:</label>
                                <!-- <div class="animate-form"> -->
                                    <input type="date"  autocomplete="off" name="check_in_date" class="inputFieldDate" required
                                    <?php 

                                        date_default_timezone_set("Asia/Colombo");
                                        $current_date = date('Y-m-d');
                                        if(isset($reservation['check_in_date'])){
                                            echo 'value="' . $reservation['check_in_date'] . '"';
                                        }
                                        else {
                                            echo 'value="'.$current_date .'"';
                                        } 
                                    
                                    ?>

                                    <?php 
                                        echo 'min="'.$current_date .'"';
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['check_in_date'])) && (isset($reservation['check_in_date']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['check_in_date']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                <!-- </div>      -->
                        </div>


                        <div class="rowdate">
                            <label for="#"><i class="material-icons">today</i>Check-Out Date:</label>
                                <!-- <div class="animate-form"> -->
                                    <input type="date"  autocomplete="off" name="check_out_date" class="inputFieldDate" 
                                    <?php 
                                        if(isset($reservation['check_out_date'])){
                                            echo 'value="' . $reservation['check_out_date'] . '"';
                                        }
                                    
                                    ?>

                                    <?php 
                                        echo 'min="'.$current_date .'"';
                                    ?>
                                    
                                    required
                                    >
                                    
                                    <label for="name" class="label-name">
                                        <?php if((isset($errors['check_out_date'])) && (isset($reservation['check_out_date']))): ?>
                                            <span class="content-name"><i class="material-icons">info</i><?php echo $errors['check_out_date']; ?></span>
                                        <?php endif; ?>
                                    </label>    
                                <!-- </div>      -->
                        </div>

                        <!-- End of Reservation Details -->
                          
                        <!-- Payment Details -->

                        <div class="row">
                            <label for="#"><i class="material-icons">request_quote</i>Payment Method:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="payment_method" class="inputField"
                                    <?php 
                                        if(isset($reservation['payment_method'])){
                                            echo 'value="' . $reservation['payment_method'] . '"';
                                        }
                                        else {
                                            echo 'value="CASH"';
                                        } 
                                    
                                    ?>
                                    
                                    readonly="readonly"
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['payment_method'])) && (isset($reservation['payment_method']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['payment_method']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        
                        <!-- End of Payment Details -->

                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Booking</button>
                            </div>
                        </div>
                    </div>

                    <div class="section2">
                        

                    </div>

                    </form>
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>
<script src="<?php echo BURL.'assets/js/main.js'; ?>"></script>   
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>



