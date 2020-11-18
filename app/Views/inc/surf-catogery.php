<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Document</title>
</head>
<style>
	.side-nav-categories {
    padding: 0px;
    position: relative;
    margin-top: 0px;
    padding-bottom: 0px;
    background-color: #fff;
    border-width: 3px;
    border-style: solid;
    border-color: #f5f5f5 #eee #d5d5d5 #eee;
    box-shadow: 0 5px 0 rgba(200,200,200,.2);
    margin-bottom: 30px;
    width: 250px;
    margin: auto;
}

.title {
    color: #fff;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 0px;
    padding: 12px 25px 10px 25px;
    position: relative;
    display: inline-block;
    letter-spacing: 1px;
    text-transform: uppercase;
    background: #39BBCE;
    margin-top: 0px;
    margin-left: -10px;
}

.title:after {
    content: "";
    height: 1px;
    width: 1px;
    border-style: solid;
    border-width: 5px;
    position: absolute;
    bottom: -10px;
    left: 0;
    border-color: #39BBCE #39BBCE transparent transparent;
}

ul#category-tabs {
    list-style: none;
    padding: 0;
    margin: 0;
    padding: 0;
}

ul#category-tabs li {
    display: block;
    position: relative;
    margin: 0;
    border-bottom: 1px #ececec solid;
    padding: 10px 18px;
}
ul.sub-category-tabs li {
    padding: 2px  !important;
}
ul.sub-category-tabs li {
    border-bottom: 0px !important;
}

ul#category-tabs li a {
    color: #333;
    font-weight: 700;
    margin-bottom: 0;
    font-size: 16px;
}

ul#category-tabs li a i {
    top: 12px;
    left: 0;
    position: absolute;
    cursor: pointer;
    width: 16px;
    height: 16px;
    padding: 2px;
    color: #39BBCE;
}
</style>
<body>
	<div class="side-nav-categories">
					<div class="title"><strong>surf packages</strong></div>
					<ul id="category-tabs">
					    <li><a href="javascript:void" class="main-category">Beginners Package <i class="fa fa-minus"></i></a>
					        <ul class="sub-category-tabs">
					            <li><a href="<?php url('Surf/ViewSubPage/1' ); ?>">Solo </a></li>
					            <li><a href="<?php url('Surf/ViewSubPage/1' ); ?>">Group</a></li>
					        </ul>
					    </li>
					</ul>
					<ul id="category-tabs">
					    <li><a href="javascript:void" class="main-category">Intermediate Package<i class="fa fa-minus"></i></a>
					        <ul class="sub-category-tabs">
					            <li><a href="<?php url('Surf/ViewSubPage/2' ); ?>">Solo </a></li>
					            <li><a href="<?php url('Surf/ViewSubPage/2' ); ?>">Group</a></li>
					        </ul>
					    </li>
					</ul>
					<ul id="category-tabs">
					    <li><a href="javascript:void" class="main-category">Advanced Package<i class="fa fa-minus"></i></a>
					        <ul class="sub-category-tabs">
					            <li><a href="<?php url('Surf/ViewSubPage/3' ); ?>">Solo </a></li>
					            <li><a href="<?php url('Surf/ViewSubPage/3' ); ?>">Group</a></li>
					        </ul>
					    </li>
					</ul>
					<ul id="category-tabs">
					    <li><a href="javascript:void" class="main-category">Group Lesson<i class="fa fa-minus"></i></a>
					        <ul class="sub-category-tabs">
					            <li><a href="<?php url('Surf/ViewSubPage/4' ); ?>">7 Days Package </a></li>
					            <li><a href="<?php url('Surf/ViewSubPage/4' ); ?>">3 Days Package</a></li>
					        </ul>
					    </li>
					</ul>
					<ul id="category-tabs">
					    <li><a href="javascript:void" class="main-category">Solo Lesson<i class="fa fa-minus"></i></a>
					        <ul class="sub-category-tabs">
					            <li><a href="<?php url('Surf/ViewSubPage/5' ); ?>">7 Days Package </a></li>
					            <li><a href="<?php url('Surf/ViewSubPage/5  ' ); ?>">3 Days Package</a></li>
					        </ul>
					    </li>
					</ul>
				</div>

				<script type="text/javascript">
		$('#category-tabs li a').click(function(){
		$(this).next('ul').slideToggle('500');
		$(this).find('i').toggleClass('fa-minus fa-plus ')
			});
	</script>
</body>
</html>