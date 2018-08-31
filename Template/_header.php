<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Nguyen Nam Book Store</title>
<meta name="description" content="Ecommerce website project" />
<meta name="keywords" content="Ecommerce website project" />
<meta http-equiv="imagetoolbar" content="no" />
<link href="/css/core.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/css/stylesheet.css" />
</head>
<body>
<div id="header">
	<div id="header_in">
		<h5><a href="/admin/?page=products">Nguyen Nam Book Store Management</a></h5>
		<?php
			if (Login::isLogged(Login::$_login_admin)) {
				echo '<div id="logged_as">Xin chào: <strong>';
				echo Login::getFullNameAdminFront(Session::getSession(Login::$_login_admin));
				echo '</strong> | <a href="/admin/?page=logout">Thoát</a></div>';				
			} else {
				echo '<div id="logged_as"><a href="/admin/">Đăng nhập</a></div>';
			}
		?>
	</div>
</div>

<div id="menu">
  <ul class="nav left" style="display: ;">
    <li id="catalog">
    <a class="top" href="/admin/?page=categories"
    	<?php echo Helper::getActive(array('page' => 'categories')); 
    	?>>Danh mục sản phẩm	
	</a>
	</li>
  
    <li id="catalog">
    <a class="top" href="/admin/?page=products"
    	<?php echo Helper::getActive(array('page' => 'products')); 
    	?>>Sản phẩm	
	</a>
	</li>

	<li id="catalog">
    <a class="top" href="/admin/?page=publisher"
    	<?php echo Helper::getActive(array('page' => 'publisher')); 
    	?>>Danh mục nhà phát hành	
	</a>
	</li>

	<li id="catalog">
    <a class="top" href="/admin/?page=orders"
    	<?php echo Helper::getActive(array('page' => 'orders')); 
    	?>>Xử lý hóa đơn
	</a>
	</li>
    
   	<li id="catalog">
    <a class="top" href="/admin/?page=clients"
    	<?php echo Helper::getActive(array('page' => 'clients')); 
    	?>>Khách hàng
	</a>
	</li>

	<li id="catalog">
    <a class="top" href="/admin/?page=business"
    	<?php echo Helper::getActive(array('page' => 'business')); 
    	?>>Doanh nghiệp
	</a>
	</li>
  <script type="text/javascript"><!--
$(document).ready(function() {
	$('.nav').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	
	$('.nav').css('display', 'block');
});
//--></script>
  <script type="text/javascript"><!-- 
function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	
	return urlVarValue;
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#dashboard').addClass('selected');
	} else {
		part = route.split('/');
		
		url = part[0];
		
		if (part[1]) {
			url += '/' + part[1];
		}
		
		$('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
	}
});
//--></script>
</div>





<div id="outer">
	<div id="wrapper">
		</div>
		<div id="">
		
		
		
		
		
		
		
		
		