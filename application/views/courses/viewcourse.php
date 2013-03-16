<script language="javascript" type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function(){		
		$j(".menu").removeClass('currentmenu');
		$j("#menu_b_2").addClass('currentmenu');
		
	});
</script>
<div id="topmain"></div>
<div id="main">
	<br />
	<label>View Course <?php echo $this->uri->segment(3); ?></label>
	<br>
</div>