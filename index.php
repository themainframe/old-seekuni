<html>

	<head>
		<title>seekuni : Welcome</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style/main.css" />
		<link rel="stylesheet" type="text/css" href="style/jquery_mods.css" />
		
		<!-- Import jQuery -->
		<link rel="stylesheet" type="text/css" href="lib/jquery/css/smoothness/jquery-ui-1.7.2.custom.css" />
		<script type="text/javascript" src="lib/jquery/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="lib/jquery/js/jquery-ui-1.7.2.custom.min.js"></script>
		
		<!-- Import SeekUni functions & APIs -->
		<script type="text/javascript" src="js/seekuni_functions.js"></script>
		<script type="text/javascript" src="js/seekuni_api.js"></script>
	</head>
	
	<body>
		
		<div id="container">
		
			<div class="header">
				<a href="#" class="tab" style="margin-right:50px;">apply</a>
				<a href="#" class="tab">review</a>
				<a href="#" class="tab">compare</a>
				<a href="#" class="tab selected">search</a>
			</div>
			
			<br />
			
			<div class="page">
			
				<div class="sidebar">
					
					<div class="panel">
						<span class="head">Constraints</span><br />
						
						<ul id="sortable" style="margin-top:10px;">
						</ul>
						
						<br />
						
						<div class="constraint_info" onclick="find_courses();">
							Drag constraints to reprioritize them.<br />
							Double-click to remove a constraint.
						</div>
						<br />
						
						<div class="button" onclick="$('#add_constraint').dialog('open');">
							<img src="style/icons/plus-circle.png" style="vertical-align:middle;" alt="Icon" /> &nbsp;
							Add a constraint...
						</div>
						
						
						<br />

					</div>
					
					
					<div id="add_constraint" title="Add a constraint...">
						
						<div id="choose_opt">
							<p>
								<ol id="selectable" style="margin-top:10px;">
									<li class="ui-widget-content itm" style="background-image:url(style/icons/magnifier-left.png);"><span id="term">Search Term</span><br /><span style="font-weight:normal;">Constrain based on the kind of course you're looking for.</span></li>
									<li class="ui-widget-content itm" style="background-image:url(style/icons/award_star_gold_3.png);"><span id="grades">A-Level Results</span><br /><span style="font-weight:normal;">Constrain based on the grades you have obtained / are expecting to obtain.</span></li>
									<li class="ui-widget-content itm" style="background-image:url(style/icons/ucas_icon_16px.png);"><span id="points">UCAS Points</span><br /><span style="font-weight:normal;">Constrain based on UCAS Points.</span></li>						
									<li class="ui-widget-content itm" style="background-image:url(style/icons/money.png);"><span id="funding">Funding</span><br /><span style="font-weight:normal;">Constrain based on funding limits.</span></li>
									<li class="ui-widget-content itm" style="background-image:url(style/icons/books-brown.png);"><span id="subject">Subject</span><br /><span style="font-weight:normal;">Constrain based on the subject you would like to study.</span></li>
									<li class="ui-widget-content itm" style="background-image:url(style/icons/vector.png);"><span id="distance">Distance</span><br /><span style="font-weight:normal;">Constrain based on distance from your location.</span></li>
								</ol>	
							</p>
						</div>
						
						<div id="conf_opt" style="ui-hidden">
						
							<p>
							
								<h2 id="conf_opt_header"></h2>
								
								<div id="conf_pane">
								
								&nbsp;
								
								</div>
							
							</p>
						
						</div>
						
						
					</div>
				</div>
				
				<div class="main">
				
					<div class="panel" style="height:400px; ">
						<span class="head" id="result_header" style="display:none;">Results<br /><br /></span>
						<div id="result_area" style="height:270px; background:url(style/image/su_banner_top.jpg) no-repeat";>
							<?php
								@include("incs/homepage_inc.php");
							?>
						</div>
					</div>
					
				
					
					<!-- Footer -->
					<img src="style/image/su_under.jpg" alt="SeekUni.com" style="margin-right:15px; float:right;" />
					
				
				</div>
			
			</div>
		
		</div>
		
	</body>

</html>