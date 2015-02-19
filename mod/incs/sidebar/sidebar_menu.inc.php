<?php

  session_start();
  if(!$_SESSION['logged-in']) exit();

?>

					<div class="panel">
						<span class="head">Menu</span><br />
						<br />
						
						<a href="#" class="link ui-corner-all ui-state-default ui-widget-content ui-state-default"><span style="float:left; margin: 0px 4px 0px 0px" class="ui-icon ui-icon-triangle-1-e"></span>Dashboard</a>
						<a href="#" class="link ui-corner-all ui-state-default ui-widget-content ui-state-default"><span style="float:left; margin: 0px 4px 0px 0px" class="ui-icon ui-icon-pencil"></span>Universities</a>
						<a href="#" class="link ui-corner-all ui-state-default ui-widget-content ui-state-default"><span style="float:left; margin: 0px 4px 0px 0px" class="ui-icon ui-icon-pencil"></span>Courses</a>
						<br /><br />
						<a href="#" class="link ui-corner-all ui-state-default ui-widget-content ui-state-default"><span style="float:left; margin: 0px 4px 0px 0px" class="ui-icon ui-icon-power"></span>Log Out</a>
						<br /><br />
						
					</div>
