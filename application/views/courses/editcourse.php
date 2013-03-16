<script language="javascript" type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function(){		
		$j(".menu").removeClass('currentmenu');
		$j("#menu_b_2").addClass('currentmenu');
		$j('.tboxline').each(function() {
			$j(this).css('background-color', lighterColor($j(this).css('background-color'),.8));
		});
		$j(".hole-input").attr('maxlength', '1');
		$j(".hole-input-text").attr('maxlength', '2');
		$j(".hole-input-handicap").attr('maxlength', '2');
		$j(".hole-input-yards").attr('maxlength', '3');
		$j(".hole-input-yards-total").attr('maxlength', '4');
		
		// VALIDATION
		$j('#submit').live('click', function() {
			$j('input').each(function() {
				if($j(this).val() == '') {
					alert("All fields are required.");
					return false;
				}
			});
			return false;
		});
		$j('#cancel').live('click', function() {
			window.location.href = "/index.php/courses/";
		});
		
		// AUTO TOTAL THE PARS
		$j('.hole-front').change(function() {
			var count = 0;
			$j('.hole-front').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-par-out').replaceWith("<td class='hole-par-text hole-par-out'>" + count + "</td>");
			$j('#course_par_out').attr('value',count);
		});
		$j('.hole-back').change(function() {
			var count = 0;
			$j('.hole-back').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-par-in').replaceWith("<td class='hole-par-text hole-par-in'>" + count + "</td>");
			$j('#course_par_in').attr('value',count);
		});
		$j('.hole-input').change(function() {
			var count = 0;
			$j('.hole-input').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-par-total').replaceWith("<td class='hole-par-text hole-par-total'>" + count + "</td>");
			$j('#course_par').attr('value',count);
		});
		
		// AUTO TOTAL THE YARDAGE
		$j('.hole-yards-front').change(function() {
			var count = 0;
			$j('.hole-yards-front').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-yards-out').replaceWith("<td class=' hole-yards-out'>" + count + "</td>");
			$j('#hole_yards_out').attr('value',count);
		});
		$j('.hole-yards-back').change(function() {
			var count = 0;
			$j('.hole-yards-back').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-yards-in').replaceWith("<td class=' hole-yards-in'>" + count + "</td>");
			$j('#hole_yards_in').attr('value',count);
		});
		$j('.hole-input-yards').change(function() {
			var count = 0;
			$j('.hole-input-yards').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-yards-total').replaceWith("<td class=' hole-yards-total'>" + count + "</td>");
			$j('#hole_yards_total').attr('value',count);
		});
		
		// COLOR VOODOO FOR TEE BOX BACKGROUND
		$j('#tbox').change(function() {
			//alert($j("option:selected", this).text());
			var lightcolor = lighterColor($j("option:selected", this).css('background-color'), .85);
			$j(this).parent().css('background-color', $j("option:selected", this).css('background-color'));
			$j(this).closest('.teeBox').css('background-color', lightcolor);
			$j(this).closest('.teeBox').find('.teeLabel').replaceWith("<label class='teeLabel'>" + $j("option:selected", this).text() + " Tees</label>");
		});
		
		// AUTO TAB FOR PAR ROW
		$j('input[id^=hole_par_]').keyup(function() {			
			if ($j(this).val().length == $j(this).attr('maxlength')) {
				var id = $j(this).attr('id').match(/^hole_par_(\d+)$/);
				var nextId = Number(id[1]) + 1;
				$j('#hole_par_' + nextId).focus();
			}
		});
	});
</script>
<div id="topmain"></div>
<div id="main">
	<label style="float:left;margin-left:40px;">Edit Course: <?php echo $course_name . " (" . $course_id . ")"; ?></label>
	<br>
	<?php foreach($tboxes as $tbox): ?>
	<div class="" style="margin-left:40px;margin-top:5px;">
		<table class=" tbl-hole tboxline" style="background-color:<?php echo $tbox->tbox; ?>;">
			<tr>
				<th>Hole</th>
				<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>OUT</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>IN</td><td>TOTAL</td>
			</tr>
			<tr>
				<th><?php echo ucfirst($tbox->tbox) . " " . $tbox->rating . "/" . $tbox->slope; ?></th>
				<?php foreach($tbox->holes as $hole): ?>
					<?php if($hole->hole_num == '10'): ?>
						<td><?php echo $tbox->outyds; ?></td>
					<?php endif; ?>
					<td><?php echo $hole->yards; ?></td>
					<?php if($hole->hole_num == '18'): ?>
						<td><?php echo $tbox->inyds; ?></td>
						<td><?php echo $tbox->totalyds; ?></td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
			<tr>
				<th><?php echo ucfirst($tbox->tbox) . " Handicap"; ?></th>
				<?php foreach($tbox->holes as $hole): ?>
					<?php if($hole->hole_num == '10'): ?>
						<td></td>
					<?php endif; ?>
					<td><?php echo $hole->handicap; ?></td>
					<?php if($hole->hole_num == '18'): ?>
						<td></td>
						<td></td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
			<tr>
				<th><?php echo ucfirst($tbox->tbox) . " Par"; ?></th>
				<?php $partotal = 0; $backpartotal = 0; ?>
				<?php foreach($tbox->holes as $hole): ?>								
					<?php if($hole->hole_num == '10'): ?>
						<td><?php echo $partotal; ?></td>
						<?php $backpartotal = 0; ?>
					<?php endif; ?>
					<td><?php echo $hole->par; ?></td>
					<?php $partotal = $partotal + $hole->par; ?>
					<?php $backpartotal = $backpartotal + $hole->par; ?>
					<?php if($hole->hole_num == '18'): ?>
						<td><?php echo $backpartotal; ?></td>
						<td><?php echo $partotal; ?></td>
					<?php endif; ?>
				<?php endforeach; ?>
			</tr>
			<tr><td colspan=22></td></tr>
		</table>
	</div>
	<?php endforeach; ?>
	<form id="teeboxform" action="/index.php/courses/saveCourse/" method="post">
		<ul class="addCourse">
			<li>
				<input type="hidden" id="course_par" name="course_par" value="" />
				<input type="hidden" id="course_par_out" name="course_par_out" value="" />
				<input type="hidden" id="course_par_in" name="course_par_in" value="" />
				<input id="hole_yards_out" name="hole_yards_out" value="" type="hidden" />
				<input id="hole_yards_in" name="hole_yards_in" value="" type="hidden" />
				<input id="hole_yards_total" name="hole_yards_total" value="" type="hidden" />				
				<input id="course_image" name="course_image" value="" type="hidden" />
			</li>
			<div class="teeBox" style="">
				<li>				
					<div class="header-info" style="">
						<label for="tbox">Tee Box</label>
						<br>					
						<div style="width:25px;border:1px solid #b6b6b6;background:black;margin-right:30px;">
							<select id="tbox" name="tbox" class="clear input-text" style="opacity:0;width:120%;overflow:hidden;">
								<option value="" style="background:white;width:25px;" light-color="#FFFFFF">Select a color</option>
								<option value="gold" style="background:gold;width:25px;" light-color="#FFF7CC">Gold</option>
								<option value="blue" style="background:blue;width:25px;" light-color="#CCD4FF">Blue</option>
								<option value="green" style="background:green;width:25px;" light-color="#EDFFCC">Green</option>
								<option value="red" style="background:red;width:25px;" light-color="#FFCCCC">Red</option>
								<option value="black" style="background:black;width:25px;" light-color="#EAEDED">Black</option>
								<option value="silver" style="background:silver;width:25px;" light-color="#F2F2F2">Silver</option>
								<option value="white" style="background:white;width:25px;" light-color="#FFFFFF">White</option>
								<option value="purple" style="background:purple;width:25px;" light-color="#DECCFF">Purple</option>
								<option value="purple" style="background:yellow;width:25px;" light-color="#FFFFB2">Yellow</option>
							</select>
						</div>
					</div>
				</li>
				<li>	
					<div class="input-box header-info">
						<label for="rating">Rating</label>
						<br>
						<input type="text" id="rating" name="rating" class="input-text" style="width:35px;" />
					</div>
				</li>
				<li>
					<div class="input-box header-info">
						<label for="slope">Slope</label>
						<br>
						<input type="text" id="slope" name="slope" class="input-text" style="width:35px;" />
					</div>
				</li>
				<li>
					<label class="teeLabel">No Tee Box is Selected</label>
				</li>
				<br>
				<br>				
				<li>
					<table class="tbl-hole">
						<tr>
							<th>Hole</th>
							<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>OUT</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>IN</td><td>TOTAL</td>
						</tr>
						<tr>
							<th>Par</th>
							<td><input id="hole_par_1" name="hole_par[0]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_2" name="hole_par[1]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_3" name="hole_par[2]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_4" name="hole_par[3]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_5" name="hole_par[4]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_6" name="hole_par[5]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_7" name="hole_par[6]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_8" name="hole_par[7]" value="" type="text" class="hole-input hole-front" /></td>
							<td><input id="hole_par_9" name="hole_par[8]" value="" type="text" class="hole-input hole-front" /></td>
							<td class="hole-par-text hole-par-out"></td>
							<td><input id="hole_par_10" name="hole_par[9]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_11" name="hole_par[10]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_12" name="hole_par[11]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_13" name="hole_par[12]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_14" name="hole_par[13]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_15" name="hole_par[14]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_16" name="hole_par[15]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_17" name="hole_par[16]" value="" type="text" class="hole-input hole-back" /></td>
							<td><input id="hole_par_18" name="hole_par[17]" value="" type="text" class="hole-input hole-back" /></td>
							<td class="hole-par-text hole-par-in"></td>
							<td class="hole-par-text hole-par-total"></td>
						</tr>
						<tr>
							<th>Handicap</th>
							<td><input id="hole_handicap_1" name="hole_handicap[0]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_2" name="hole_handicap[1]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_3" name="hole_handicap[2]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_4" name="hole_handicap[3]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_5" name="hole_handicap[4]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_6" name="hole_handicap[5]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_7" name="hole_handicap[6]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_8" name="hole_handicap[7]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_9" name="hole_handicap[8]" value="" type="text" class="hole-input-handicap" /></td>
							<td></td>
							<td><input id="hole_handicap_10" name="hole_handicap[9]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_11" name="hole_handicap[10]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_12" name="hole_handicap[11]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_13" name="hole_handicap[12]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_14" name="hole_handicap[13]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_15" name="hole_handicap[14]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_16" name="hole_handicap[15]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_17" name="hole_handicap[16]" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_18" name="hole_handicap[17]" value="" type="text" class="hole-input-handicap" /></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th>Yards</th>
							<td><input id="hole_yards_1" name="hole_yards[0]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_2" name="hole_yards[1]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_3" name="hole_yards[2]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_4" name="hole_yards[3]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_5" name="hole_yards[4]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_6" name="hole_yards[5]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_7" name="hole_yards[6]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_8" name="hole_yards[7]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td><input id="hole_yards_9" name="hole_yards[8]" value="" type="text" class="hole-input-yards hole-yards-front" /></td>
							<td class=" hole-yards-out "></td>
							<td><input id="hole_yards_10" name="hole_yards[9]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_11" name="hole_yards[10]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_12" name="hole_yards[11]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_13" name="hole_yards[12]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_14" name="hole_yards[13]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_15" name="hole_yards[14]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_16" name="hole_yards[15]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_17" name="hole_yards[16]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td><input id="hole_yards_18" name="hole_yards[17]" value="" type="text" class="hole-input-yards hole-yards-back" /></td>
							<td class=" hole-yards-in "></td>
							<td class=" hole-yards-total "></td>
						</tr>
					</table>
				</li>
			</div>
			<br>
			<li style="text-align:center;">				
				<div class="input-box">
					<input id="cancel" name="cancel" type="button" value="cancel" />
				</div>		
				<div class="input-box">
					<input id="submit" name="submit" type="submit" value="save and continue" />
				</div>		
				<div class="input-box">
					<input id="submit" name="submit" type="submit" value="save and finish" />
				</div>
			</li>
		</ul>
	</form>
</div>