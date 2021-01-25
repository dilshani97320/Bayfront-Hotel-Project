

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous" ></script>
	<title>Document</title>
</head>
<style>
	ul {
  margin: 0;
  padding: 0;
}
ul li {
  padding: 0;
}

.multi-steps {
  display: table;
  table-layout: fixed;
  width: 800px;
  margin: 30px auto;
}
.multi-steps > li {
  text-align: center;
  display: table-cell;
  position: relative;
  font-size: 18px;
  color: #000;
  letter-spacing: 1px;
  font-weight: 600;
}
.multi-steps > li:before {
  content: "\26AC";
  display: block;
  margin: 0 auto;
  background-color: #fff;
  font-size: 30px;
  font-weight: 600;
  width: 60px;
  height: 60px;
  color: #737272;
  line-height: 60px;
  text-align: center;
  font-weight: bold;
  border-width: 7px;
  border-style: solid;
  border-color: #0088ff;
  border-radius: 50%;
  z-index: 500;
}
.multi-steps > li:after {
  content: "";
  height: 10px;
  width: 250px;
  background-color: #0088ff;
  position: absolute;
  top: 30px;
  z-index: -1;
}
.multi-steps > li:last-child:after {
  display: none;
}
.multi-steps > li.select:before {
  background-color: #000;
  border-color: #000;
  font-family: FontAwesome;
  content: "\f0c1";
  color: #fff;
}
.multi-steps > li.first:before {
  font-family: FontAwesome;
  content: "\f674";
}
.multi-steps > li.second:before {
  font-family: FontAwesome;
  content: "\f0c1";
}
.multi-steps > li.third:before {
  font-family: FontAwesome;
  content: "\f00c";
}

.card {
  /*background: #fff;*/
  border-radius: 2px;
  height: auto;
  padding-top: 20px;
  padding-bottom: 50px;
  margin: 50px auto;
  text-align: center;
  position: relative;
  width: 800px;
  /*z-index: -10;*/
}

.card-3 {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

.btn {
  width: 250px;
  background-color: #5995fd;
  border: none;
  outline: none;
  height: 49px;
  border-radius: 10px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  margin: 10px 0;
  cursor: pointer;
  transition: 0.5s;
  /*z-index: 5;*/
}

.btn:hover {
  background-color: #4d84e2;
}

.input-field {
  width: 250px;
  background-color: #f0f0f0;
  margin: 0 auto;
  height: 55px;
  border-radius: 10px;
  display: grid;
  text-align: center;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
  /*z-index: 50;*/
}

.input-field i {
  text-align: center;
  line-height: 55px;
  color: #acacac;
  transition: 0.5s;
  font-size: 1.1rem;
}

.input-field input {
  background: none;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 500;
  font-size: 1.1rem;
  color: #333;
  /*z-index: 10;*/
}

.alert {
  width: 500px;
  height: 50px;
  display: flex;
  justify-content: left;
  align-items: center;
  border-radius: 5px;
  padding-left: 10px;
  padding-right: 40px;
  font-size: 18px;
  margin: 0 auto;
  box-shadow: rgba(0, 0, 0, 0.06) 0px 0px 15px;
}
/*.close-alert {
  color: #000000;
  font-size: 25px;
  display: flex;
  align-items: center;
  position: absolute;
  right: 15px;
  cursor: pointer;
}
.close-alert:hover {
  color: #000000;
  background: #f1f1f1;
  border-radius: 50%;
}*/
.successful.alert {
  border-left: 6px solid #02c302;
  background: white;
}

.successful.alert:before {
  content: "\2713";
  color: #02c302;
  font-size: 25px;
  font-family: "boxicons" !important;
  font-weight: normal;
  font-style: normal;
  font-variant: normal;
  line-height: 1;
  display: inline-block;
  text-transform: none;
  speak: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  padding-right: 10px;
}

.error.alert {
  border-left: 6px solid #ff0000;
  background: white;
  text-align: left;
}

.error.alert:before {
  content: "\2612";
  color: #ff0000;
  font-size: 25px;
  font-family: "boxicons" !important;
  font-weight: normal;
  font-style: normal;
  font-variant: normal;
  line-height: 1;
  display: inline-block;
  text-transform: none;
  speak: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  padding-right: 10px;
}
.image {
  width: 300px;
  height: 200px;
  overflow: hidden;
  object-fit: cover;
  margin: 0 auto;
}
.image img {
  width: 500px;
  height: 400px;
  margin: 0 auto;
  margin-left: -100px;
  margin-top: -100px;
}

</style>
<body>

	<div class="card card-3">
		<!-- <div class="raw">
			<ul class="list-unstyled multi-steps">
			    <li class="first">Send</li>
			    <li class="second select">Check</li>
			    <li class="third">Reset</li>
			 </ul>
	  	</div> -->
	  	<h1>Awaiting Email Confirmation</h1>
	  	<div class="image">
	  		<img src="<?php echo BURL.'assets/img/mail.gif'; ?>" alt="">
	  	</div>
			
			<div class="alert successful" role="alert">
         		<p>Please check your email and click the link to confirm your account</p>
         	</div>
		</div>
	

</body>
</html>