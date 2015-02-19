<?php


	 /*
	  
	 SeekUni.com
	  
	 Constraint Viewer Pane.
	 Decides which constraint to show.
	 (C) Damien Walsh 2009.
	  
	 */
	
//Load input:
$input = $_GET['request'];

//Wait
usleep(1000000*0.3);
	
//Switch?
switch($input) {


	case "term":
	
		/*
		Output HTML for the Search Term Constraint.
		*/
		
		?>
		
		<script type="text/javascript">
		
		  //The completion function
		  function term_completeSection()
		  {
			//Calculate val string.
			var val = $("#valuebox").val();
			
			//Add the constraint.
			$("<li/>")
				.attr("data", "term,term,"+$("#valuebox").val())
				.attr("class","sort ui-state-default ui-corner-all")
				.html(
				"<img src='./style/icons/magnifier-left.png' alt='Search' class='icon' /> Search Term" +
				"<span style='float:right; margin-left:67px; font-weight:normal; text-align:right;'>" + val.substr(0,16) + "...</span>"
				)
				.appendTo("#sortable");
				
			//Close Dialog
			$("#add_constraint").dialog("close");
			
			//Update all.
			find_courses();
		  }
		  
		  //The failure function
		  function term_abortSection()
		  {
			//Close dialog box.
			$("#add_constraint").dialog("close");
		  }
		
		</script>
		
		If you have a good idea of what you'd like to do at university, add a Search constraint.<br />
		Search Constraints cover both the description and title of the course.<br />
		<br /><br />
		
		<table>
		<tr>
			<td>
				<strong>Search for: &nbsp;</strong>
			</td>
			<td style="width:30px;">&nbsp;</td>
			<td>
				<input id="valuebox" type="text" name="v" style="width:160px;" />
			</td>
		</tr>
		</table>

		<br /><br /><br />
		
		<a href="#" onclick="term_completeSection();"><img src="style/image/button_add.png" alt="Add Constraint" /></a> &nbsp; &nbsp;
		<a href="#" onclick="term_abortSection();"><img src="style/image/button_cancel.png" alt="Cancel" /></a> &nbsp; &nbsp;
	
		<?php
	
	break;

	case "points":
	
		/*
		Output HTML for the Points constraint.
		*/
		
		?>
		
		<script type="text/javascript">
		
		  //The completion function
		  function points_completeSection()
		  {
			//Calculate val string.
			var val = $("input[name='m']:checked").val() + " " + $("#valuebox").val();
			
			//Add the constraint.
			$("<li/>")
				.attr("data", "points,"+$("input[name='m']:checked").val().replace(" ","_").toLowerCase()+","+$("#valuebox").val())
				.attr("class","sort ui-state-default ui-corner-all")
				.html(
				"<img src='./style/icons/ucas_icon_16px.png' alt='UCAS' class='icon' /> UCAS Points" +
				"<span style='float:right; margin-left:67px; font-weight:normal; text-align:right;'>" + val + "</span>"
				)
				.appendTo("#sortable");
				
			//Close Dialog
			$("#add_constraint").dialog("close");
			
			//Update all.
			find_courses();
		  }
		  
		  //The failure function
		  function points_abortSection()
		  {
			//Close dialog box.
			$("#add_constraint").dialog("close");
		  }
		
		</script>
		
		UCAS Points are a type of tariff used by <a href="http://www.ucas.com/" title="UCAS" target="_blank">UCAS</a>.<br />
		Many universities choose to display their entry requirements as UCAS Points.<br />
		<br /><br />
		
		<table>
		<tr>
			<td>
				<input type="radio" name="m" value="More than" /> More than...<br />
				<input type="radio" name="m" value="Less than" checked="checked" /> Less than...<br />
				<input type="radio" name="m" value="Exactly" /> Exactly...<br />
			</td>
			<td style="width:30px;">&nbsp;</td>
			<td>
				<input maxlength="3" id="valuebox" type="text" name="v" value="140" style="width:90px;" /> &nbsp; &nbsp;  UCAS Points.
			</td>
		</tr>
		</table>

		<br /><br /><br />
		
		<a href="#" onclick="points_completeSection();"><img src="style/image/button_add.png" alt="Add Constraint" /></a> &nbsp; &nbsp;
		<a href="#" onclick="points_abortSection();"><img src="style/image/button_cancel.png" alt="Cancel" /></a> &nbsp; &nbsp;
	
		<?php
	
	break;

	case "funding":
	
		/*
		Output HTML for the Finance constraint.
		*/
		
		?>
		
		<script type="text/javascript">
		
		  //The completion function
		  function finance_completeSection()
		  {
			//Calculate val string.
			var val = $("input[name='m']:checked").val() + " " + $("#valuebox").val() + " GBP p/a";
			
			//Add the constraint.
			$("<li/>")
				.attr("data", "finance,"+$("input[name='m']:checked").val().replace(" ","_").toLowerCase()+","+$("#valuebox").val())
				.attr("class","sort ui-state-default ui-corner-all")
				.html(
				"<img src='./style/icons/money.png' alt='finance' class='icon' /> Finance" +
				"<span style='float:right; margin-left:50px; font-weight:normal; text-align:right;'>" + val + "</span>"
				)
				.appendTo("#sortable");
				
			//Close Dialog
			$("#add_constraint").dialog("close");
			
			//Update all.
			find_courses();	
		  }
		  
		  //The failure function
		  function finance_abortSection()
		  {
			//Close dialog box.
			$("#add_constraint").dialog("close");
		  }
		
		</script>
		
		Finance is an important factor to consider when choosing a university &amp; course.<br />
		Remember, both universities and the government can offer financial support to students.<br />
		<br /><br />
		
		<table>
		<tr>
			<td>
				<input type="radio" name="m" value="More than" /> More than...<br />
				<input type="radio" name="m" value="Less than" checked="checked" /> Less than...<br />
				<input type="radio" name="m" value="Exactly" /> Exactly...<br />
			</td>
			<td style="width:30px;">&nbsp;</td>
			<td>
				<input maxlength="6" id="valuebox" type="text" name="v" value="2500" style="width:90px;" /> &nbsp; &nbsp;  &pound; Per Year
			</td>
		</tr>
		</table>

		<br /><br /><br />
		
		<a href="#" onclick="finance_completeSection();"><img src="style/image/button_add.png" alt="Add Constraint" /></a> &nbsp; &nbsp;
		<a href="#" onclick="finance_abortSection();"><img src="style/image/button_cancel.png" alt="Cancel" /></a> &nbsp; &nbsp;
	
		<?php
	
	break;
	
	default:
	
		?>
		
		Sorry, That request (<?php echo $input; ?>) is not supported.
		
		<?php
	
	break;
	
}	

?>