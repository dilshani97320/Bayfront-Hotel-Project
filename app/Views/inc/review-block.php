<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
  <style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat);
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

.homeReview-container{
  width:1200px;
  margin: auto;
  height: 470px;
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.homeReview {
  flex-basis:300px;
  box-shadow: none !important;
  color: #141414;
  display: inline-block;
  font-family: 'Open Sans', Arial, sans-serif;
  font-size: 14px;
  line-height: 1.4em;
  margin: 50px;
  /* max-width: 315px;
  min-width: 230px; */
  position: relative;
  text-align: left;
  width: 100%;
}

.homeReview * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.homeReview .profile-image img {
  border-radius: 50%;
  max-width: 100%;
  height: 140px;
  vertical-align: top;
  float: left;
}

.homeReview .figcaption {
  background-color: #4e6969;
  border-radius: 5px;
  color: #fff;
  display: inline-block;
  margin-top: 15px;
  padding: 25px;
  position: relative;
  width: 100%;
}

.homeReview .figcaption:after {
  border-color: transparent transparent #4e6969 transparent;
  border-style: solid;
  border-width: 0 10px 10px 10px;
  bottom: 100%;
  content: '';
  height: 0;
  left: 32px;
  position: absolute;
  width: 0;
}

.homeReview h3,
.homeReview h4,
.homeReview p {
  margin: 0 0 5px;
}

.homeReview h3 {
  font-weight: 600;
  font-size: 1.2em;
  font-family: 'Montserrat', Arial, sans-serif;
}

.homeReview h4 {
  color: #8c8c8c;
  font-weight: 400;
  letter-spacing: 2px;
}

.homeReview p {
  font-size: 0.9em;
  letter-spacing: 1px;
  opacity: 0.9;
}

.homeReview .icons {
  padding: 50px 5px;
  float: right;
}

.homeReview i {
  color: #FFDF00;
  display: inline-block;
  font-size: 18px;
  font-weight: normal;
  opacity: 0.75;
  padding: 10px 2px;
}

.homeReview i:hover {
  opacity: 1;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

@media (max-width: 768px) {
  .homeReview-container{
    width: 729px;
    height: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .homeReview{
    flex-basis: 700px;
  }
}
  </style>
<body>
 <div class="homeReview-container">
    <div class="homeReview">
  <div class="profile-image"><img src="<?php echo BURL.'assets/img/home/rew1.jpg'; ?>" alt="profile-sample1" />
    
  </div>
  <div class="icons">
     <h3>Chauffina Carr</h3>
    <h4>England</h4>
  </div>
  <div class="figcaption">
    <p>Which is worse, that everyone has his price, or that the price is always so low.</p>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>

  </div>
</div>
<div class="homeReview">
  <div class="profile-image"><img src="<?php echo BURL.'assets/img/home/rew2.jpg'; ?>" alt="profile-sample4" /></div>
  <div class="icons">
    <h3>Samuel Serif</h3>
    <h4>USA</h4>
  </div>
  <div class="figcaption">
    <p>I'm killing time while I wait for life to shower me with meaning and happiness.</p>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star-half-o" aria-hidden="true"></i>

  </div>
</div>
<div class="homeReview">
  <div class="profile-image"><img src="<?php echo BURL.'assets/img/home/rew3.png'; ?>" alt="profile-sample9" />
    
  </div>
  <div class="icons">
    <h3>Sue Shei</h3>
    <h4>Russia</h4>
  </div>
  <div class="figcaption">
    
    <p>The only skills I have the patience to learn are those that have no real application in life. </p>
     <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
    <i class="fa fa-star" aria-hidden="true"></i>
  </div>
</div>
 </div>
</body>
</html>