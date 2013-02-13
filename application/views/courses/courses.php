<script language="javascript" type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function(){		
		$j(".menu").removeClass('currentmenu');
		$j("#menu_b_2").addClass('currentmenu');
	});
</script>
<div id="topmain"></div>
<div id="main">
	<br /><br />
	COURSES<br /><br />
	<form id="loginform" action="/index.php/courses/addCourse/" method="post">
		<input type="submit" value="Add Course" />
	</form>
</div>