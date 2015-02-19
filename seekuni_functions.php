<?php


	 /*
	  
	 SeekUni.com
	  
	 Global Functions.
	 (C) Damien Walsh 2009.
	  
	 */
	 


/*
	Get a sign (>, =, <= ....) from a quantifier
	The quantifiers are in the API refs.
*/
function sign_from_quantifier($quantifier)
{

	switch($mode) {
		
		case "less_than":
			$SIGN = "<";
		break;	
		
		case "more_than":
			$SIGN = ">";
		break;	

		case "exactly":
			$SIGN = "=";
		break;	
		
		default:
			$SIGN = "<=";
		break;
		
	}
	
	return $SIGN;

}

?>