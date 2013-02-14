<script language="javascript" type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function(){		
		$j(".menu").removeClass('currentmenu');
		$j("#menu_b_2").addClass('currentmenu');
	});
</script>
<div id="topmain"></div>
<div id="main">

	<div class=" my-courses courses ">
		<table>
			<tr><th>My Courses</th><th></th></tr>
			<?php if(count($mycourses) > 0) : ?>
			<?php foreach($mycourses as $row): ?>
				<tr><td><?php echo $row->course_name; ?></td><td><a href="courses/editCourse/<?php echo $row->id; ?>">edit</a></tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr><td>You have no courses set up.</td><td></td></tr>
			<?php endif; ?>
		</table>
	</div>
	<div class=" all-courses courses ">
		<table>
			<tr><th>All Courses</th><th></th></tr>
			<?php if(count($allcourses) > 0) : ?>
			<?php foreach($allcourses as $row): ?>
				<tr><td><?php echo $row->course_name; ?></td><td><a href="courses/viewCourse/<?php echo $row->id; ?>">view</a></tr>
			<?php endforeach; ?>
			<?php else: ?>
				<tr><td>You have no courses set up.</td><td></td></tr>
			<?php endif; ?>
		</table>
	</div>
	<form id="loginform" action="/index.php/courses/addCourse/" method="post">
		<input type="submit" value="Add a New Course" />
	</form>
</div>