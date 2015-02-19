<?php


	 /*
	  
	 SeekUni.com
	  
	 MySQL Driver.
	 (C) Damien Walsh 2009.
	  
	 */
	 

class mysql
{

	# The Link object.
	var $link;

	function mysql($USER, $PASS, $HOST, $DB)
	{
		
		//Create connection.
		$this->link = mysql_connect($HOST, $USER, $PASS);
		
		//Connect.
		mysql_select_db($DB, $this->link);
		
	}
	
	/*
	Sanitize a Database keyword / tablename.
	*/
	function san($input)
	{
		return mysql_real_escape_string($input);
	}
	
	/*
	Query!
	*/
	function q($input)
	{
		return mysql_query($input);
	}	
	
	/*
	Fetch object
	*/
	function fo($result)
	{
		return mysql_fetch_object($result);
	}
	

}
	 
?>