<script language="javascript" type="text/javascript">
	var $j = jQuery.noConflict();
	$j(function(){		
		$j(".menu").removeClass('currentmenu');
		$j("#menu_b_2").addClass('currentmenu');
		
		$j(".hole-input").attr('maxlength', '1');
		$j(".hole-input-text").attr('maxlength', '2');
		$j(".hole-input-handicap").attr('maxlength', '2');
		$j(".hole-input-yards").attr('maxlength', '3');
		$j(".hole-input-yards-total").attr('maxlength', '4');
		
		$j('.hole-front').change(function() {
			var count = 0;
			$j('.hole-front').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-par-out').replaceWith("<td class='hole-par-text hole-par-out'>" + count + "</td>");
		});
		$j('.hole-back').change(function() {
			var count = 0;
			$j('.hole-back').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-par-in').replaceWith("<td class='hole-par-text hole-par-in'>" + count + "</td>");
		});
		$j('.hole-input').change(function() {
			var count = 0;
			$j('.hole-input').each(function() {
				count += Number($j(this).val());
			});
			$j('.hole-par-total').replaceWith("<td class='hole-par-text hole-par-total'>" + count + "</td>");
		});
		
		$j('#tbox').change(function() {
			//alert($j("option:selected", this).text());
			$j(this).parent().css('background-color', $j("option:selected", this).css('background-color'));
			$j(this).closest('.teeBox').css('background-color', $j("option:selected", this).attr('light-color'));
			$j(this).closest('.teeBox').find('.teeLabel').replaceWith("<label class='teeLabel'>" + $j("option:selected", this).text() + " Tees</label>");
		});
		
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
	<br />
	<label>Add a Course</label><br />
	<form id="loginform" action="/index.php/courses/createCourse/" method="post">
		<ul class="addCourse">
			<li>
				<div class="input-box header-info">
					<label for="course_name">Course Name</label>
					<br>
					<input type="text" id="course_name" name="course_name" class="input-text input-text-wide" />
				</div>
			</li>
			<li>
				<input type="hidden" id="course_par" name="course_par" value="" />
				<input type="hidden" id="course_par_out" name="course_par_out" value="" />
				<input type="hidden" id="course_par_in" name="course_par_in" value="" />
				
			</li>
			<br>
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
						<td><input id="hole_par_1" name="hole_par_1" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_2" name="hole_par_2" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_3" name="hole_par_3" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_4" name="hole_par_4" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_5" name="hole_par_5" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_6" name="hole_par_6" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_7" name="hole_par_7" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_8" name="hole_par_8" value="" type="text" class="hole-input hole-front" /></td>
						<td><input id="hole_par_9" name="hole_par_9" value="" type="text" class="hole-input hole-front" /></td>
						<td class="hole-par-text hole-par-out"></td>
						<td><input id="hole_par_10" name="hole_par_10" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_11" name="hole_par_11" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_12" name="hole_par_12" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_13" name="hole_par_13" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_14" name="hole_par_14" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_15" name="hole_par_15" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_16" name="hole_par_16" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_17" name="hole_par_17" value="" type="text" class="hole-input hole-back" /></td>
						<td><input id="hole_par_18" name="hole_par_18" value="" type="text" class="hole-input hole-back" /></td>
						<td class="hole-par-text hole-par-in"></td>
						<td class="hole-par-text hole-par-total"></td>
					</tr>
				</table>
			</li>
			<br>
			<br>
			<div class="teeBox" style="">
				<li>				
					<div class="header-info" style="">
						<label for="tbox">Tee Box</label>
						<br>					
						<div style="width:25px;border:1px solid #b6b6b6;background:black;margin-right:30px;">
							<select id="tbox" name="tbox" class="clear input-text" style="opacity:0;width:120%;overflow:hidden;">
								<option value="gold" style="background:white;width:25px;" light-color="#FFFFFF">Select a color</option>
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
					<label class="teeLabel">Black Tees</label>
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
							<th>Handicap</th>
							<td><input id="hole_handicap_1" name="hole_handicap_1" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_2" name="hole_handicap_2" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_3" name="hole_handicap_3" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_4" name="hole_handicap_4" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_5" name="hole_handicap_5" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_6" name="hole_handicap_6" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_7" name="hole_handicap_7" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_8" name="hole_handicap_8" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_9" name="hole_handicap_9" value="" type="text" class="hole-input-handicap" /></td>
							<td></td>
							<td><input id="hole_handicap_10" name="hole_handicap_10" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_11" name="hole_handicap_11" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_12" name="hole_handicap_12" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_13" name="hole_handicap_13" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_14" name="hole_handicap_14" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_15" name="hole_handicap_15" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_16" name="hole_handicap_16" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_17" name="hole_handicap_17" value="" type="text" class="hole-input-handicap" /></td>
							<td><input id="hole_handicap_18" name="hole_handicap_18" value="" type="text" class="hole-input-handicap" /></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<th>Yards</th>
							<td><input id="hole_yards_1" name="hole_yards_1" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_2" name="hole_yards_2" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_3" name="hole_yards_3" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_4" name="hole_yards_4" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_5" name="hole_yards_5" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_6" name="hole_yards_6" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_7" name="hole_yards_7" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_8" name="hole_yards_8" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_9" name="hole_yards_9" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_out" name="hole_yards_out" value="" type="text" class="hole-input hole-input-yards-total" /></td>
							<td><input id="hole_yards_10" name="hole_yards_10" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_11" name="hole_yards_11" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_12" name="hole_yards_12" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_13" name="hole_yards_13" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_14" name="hole_yards_14" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_15" name="hole_yards_15" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_16" name="hole_yards_16" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_17" name="hole_yards_17" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_18" name="hole_yards_18" value="" type="text" class="hole-input-yards" /></td>
							<td><input id="hole_yards_in" name="hole_yards_in" value="" type="text" class=" hole-input hole-input-yards-total" /></td>
							<td><input id="hole_yards_total" name="hole_yards_total" value="" type="text" class="hole-input hole-input-yards-total" /></td>
						</tr>
					</table>
				</li>
			</div>
			<br>
			<li style="text-align:center;">				
				<div class="input-box">
					<input type="button" value="add tee box" />
				</div>		
				<div class="input-box">
					<input type="submit" value="finished" />
				</div>
			</li>
		</ul>
	</form>
</div>