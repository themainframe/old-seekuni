<?php


	 /*
	  
	 SeekUni.com
	  
	 JSON Course Search API
	 (C) Damien Walsh 2009.
	  
	 */

//Basic functions:
@require_once "../seekuni_functions.php";	 
	 
//Load Config:
@require_once "../config.php";	  
	  
//Include the MySQL driver.
@require_once "../mysql_driver.php";
$sql = new mysql($MYSQL_USER, $MYSQL_PASS, $MYSQL_HOST, $MYSQL_DB);

//Load JSON Object.
$JSON = $_GET['request'];


/*
#### FOR DEBUGGING:
$JSON = "
	{
      \"constraints\" : [
	           {	\"name\" : \"finance\",   \"m\" : \"less_than\",	 \"v\" : \"2400\" 				},
	           {	\"name\" : \"points\",    \"m\" : \"less_than\",	 \"v\" : \"300\" 				}
     ]
	 
	}
";
*/

//Load the JSON request as an object.
$request = json_decode($JSON);

//Start a WHERE collection.
$clauses = array();

//Decide what action to take:
foreach($request->constraints as &$constraint)
{

	//Load values safe-mode:
	$name = $sql->san($constraint->name);
	$mode = $sql->san($constraint->m);
	$value = $sql->san($constraint->v);
	
	//Options:
	
	switch($name) {
	
		case "finance":
		
			/*
			Finance module.
			Restrict courses by Finance.
			*/

			$SIGN = sign_from_quantifier($mode);
			$CLAUSE = "`course_cost` {$SIGN} '{$value}'";
			
		break;
		
		case "points":
		
			/*
			UCAS Points module.
			Restrict courses by UCAS Points Reqs.
			*/

			$SIGN = sign_from_quantifier($mode);
			$CLAUSE = "`course_ucas` {$SIGN} '{$value}'";
			
		break;
		
		case "term":
		
			/*
			Search mode
			Add a LIKE clause.
			*/
			
			$CLAUSE = "`course_name` LIKE '%{$value}%'";
		
		break;
		
		default:
		
			//Nothing.
			$CLAUSE = "";
		
		break;
	
	}
	
	//Add:
	$clauses[] = $CLAUSE;
	
}

//No constraints?
if(count($clauses) == 0)
{
	//Create an empty JSON.
	$JSON_OUT = '[{"name":"none","code":"000","desc":"empty","uni":"none","img":"empty.png"}]';
	print $JSON_OUT;
	exit();
}

//Build the Query.
$QUERY = "SELECT * FROM `su_course`, `su_uni` WHERE `course_uni` = `uni_id` AND ";

//Build...
foreach($clauses as &$clause)
  if($clause != "")
	$QUERY .= $clause . " AND ";
	
//Final AND:
$QUERY = substr($QUERY, 0, -5) . " LIMIT 10;";

//Query and output as JSON.
//NOT all columns!
$result = $sql->q($QUERY);

//Empty?!
if(mysql_num_rows($result) == 0)
{
	//Create an empty JSON.
	$JSON_OUT = '[{"name":"empty","code":"000","desc":"empty","uni":"empty","img":"empty.png"}]';
	print $JSON_OUT;
	exit();
}

//Read all out into an assoc array.
$courses = array();
while($option = $sql->fo($result))
{
	
	$course = array();
	$course['name'] = $option->course_name;
	$course['code'] = $option->course_code;
	$course['desc'] = "A description.";
	$course['uni'] = $option->uni_name;
	$course['img'] = $option->uni_image;
	
	//Add.
	$courses[] = $course;
	
}

//Wait
usleep(0.2*1000000);

//Build JSON.
$JSON_OUT = json_encode($courses);

//Output!
print $JSON_OUT;

?>