<html>
	<head>
		<meta name="google-translate-customization" content="2a914b2c873c692e-d6f30e9f6ab4cb01-g3f32f4e38f06d6b3-12"></meta>
	</head>
	<body>
		<link href="/skin/css/styles.css" rel="Stylesheet">
		<script src="/skin/js/jquery.js" type="text/javascript"></script>
		<script src="/skin/js/fantasygolf.js" type="text/javascript"></script>
		<div id="superdiv">
		<div id="header">
			<div id="logo">
				<a href="/index.php"><img height="75px" src="/skin/images/tigerprofile2.gif" /></a>
			</div>
			<div style="padding-top:10px;" id="google_translate_element"></div>
			<script type="text/javascript">
				function googleTranslateElementInit() {
				  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
				}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			<div id="topnavlinks">
				<ul>
					<?php if($this->session->userdata('isLoggedIn')): ?>
					<li><a href="/index.php/fantasygolf/logout">Logout</a></li>
					<li>&nbsp;|&nbsp;</li>            
					<?php else: ?>
					<li><a href="/index.php/fantasygolf/login">Login</a></li>
					<li>&nbsp;|&nbsp;</li>
					<?php endif; ?>
					<li><a href="/index.php/fantasygolf/accounts">Account</a></li>
				</ul>       
			</div>
		</div>
