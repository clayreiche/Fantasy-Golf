<link href="/skin/css/styles.css" rel="Stylesheet">
<script src="/skin/js/jquery.js" type="text/javascript"></script>
<script src="/skin/js/fantasygolf.js" type="text/javascript"></script>
<div id="superdiv">
<div id="header">
	<div id="logo">
		<a href="/index.php"><img height="75px" src="/skin/images/tigerprofile2.gif" /></a>
    </div>
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
