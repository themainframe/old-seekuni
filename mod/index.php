<?php

	/*
	SeekUni.com
	(C) Damien Walsh 2009
	
	Moderation Index.
	*/
	

//Start
session_start();

//Load Config:
require_once "../config.php";	  
	  
//Include the MySQL driver.
require_once "../mysql_driver.php";
$sql = new mysql($MYSQL_USER, $MYSQL_PASS, $MYSQL_HOST, $MYSQL_DB);

switch($_GET['doAction']) 
{

	case "login":
	
	//Try to log in.
	$safeU = $sql->san($_POST['username']);
	$safeP = md5($_POST['password']);
	
	//Query.
	$result = mysql_query("SELECT * FROM `su_users` WHERE `user_name` = '{$safeU}' AND `user_password` = '{$safeP}' LIMIT 1;");

	//Correct?
	if(mysql_num_rows($result) == 1) {
		//Correct!
		
		//Get row:
		$row = $sql->fo($result);
		
		$_SESSION['logged-in'] = true;
		$_SESSION['full-name'] = $row->user_fullname;
		$_SESSION['email'] = $row->user_email;
		$_SESSION['id'] = $row->user_id;
		
		//Header.
		header("Location: ./?View=dashboard");
		
	} else {
		//Incorrect.
		//Header.
		header("Location: ./?login_error=1");	
	}
	
	break;

}

?>
<html>

	<head>
		<title>seekuni : Moderation</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="style/main.css" />
		
		<!-- Import jQuery -->
		<link rel="stylesheet" type="text/css" href="../lib/jquery/css/smoothness/jquery-ui-1.7.2.custom.css" />
		<script type="text/javascript" src="../lib/jquery/js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="../lib/jquery/js/jquery-ui-1.7.2.custom.min.js"></script>
	</head>
	
	<body>
		
	<?php

		//Did a login-error condition just happen?
		if($_GET['login_error']=="1")
		{
			?>
			
		<div id="login_error">
			<p>
				<strong>Error</strong>
				<br />
				Sorry, your username or password was incorrect.<br />
				Please try again.
			</p>	
		</div>
		
		<script type="text/javascript">
			$(function() {
				$("#login_error").dialog({
					bgiframe: true,
					modal: true,
					resizable: false,
					title: "Login Failed",
					buttons: {
						Ok: function() {
							$(this).dialog('close');
						}
					}
				});
			});
		</script>
			
			<?php
		}

	?>
	
		<div id="container">
		
			<div class="header">

			</div>
			
			<br />
			
			<div class="page" >
			
				<div class="sidebar">
					
					<?php
						switch($_SESSION['logged-in']) {
						
						case true:
							include "incs/sidebar/sidebar_menu.inc.php";
						break;
						
						case false:
							include "incs/sidebar/sidebar_login.inc.php";
						break;
						 
						}
					?>
							
				</div>
		
				<div class="main">
				
					<div class="panel" style="height:400px; ">
						
					<?php
						
						//Allowed:
						$allowed = array("default","dashboard");
						
						$view = $_GET['View'];
						if($view == "" || !in_array($view,$allowed))
						{
							$view = "default";
						}
						
						include("views/{$view}.view.php");
						
					
					?>
						
					</div>
	
					<!-- Footer -->
					<img src="../style/image/su_under.jpg" alt="SeekUni.com" style="margin-right:15px; float:right;" />
					
				
				</div>
			
			</div>
		
		</div>
		
	</body>

</html>