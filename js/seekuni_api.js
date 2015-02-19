/*
  
  SeekUni.com
  (C) Damien Walsh 2009.
  
  API Interactions

  */


function find_courses() {
	
	resultsMode();
	
	//Read all the constraints.
	var cons = ' { "constraints" : [ ';
	$(".sort").each(function() {
		
		//Each "data" attribute is in this form:
		// [name],[mode],[value]
		var data = $(this).attr("data").split(",");
		
		//JSON the string.
		cons = cons + ' { "name":"'+data[0]+'", "m":"'+data[1]+'", "v":"'+data[2]+'" },';
		
	});

	//Finish construction:
	cons = cons.substring(0,cons.length-1) + " ] } ";
	
	//Clear and show loader.
	$("#result_area").empty();
	$("<div/>").css("width","100%").css("height","200px").css("background","url(./style/image/loader.gif) no-repeat center center").appendTo("#result_area");

	//Build JSON.
	var info = "request=" + cons;
	
	//Make the JSON request.
	$.getJSON("./apis/json_uni_search.php", info, 
        function(data){
		  //ReClear:
		  $("#result_area").empty();
          $.each(data, function(i,item){
		   
		    if(item.uni == "empty")
			{
				//Empty set.
				//Exit.
				
				showEmpty();
				return false;
			}
			
			if(item.uni == "none")
			{
				//No Constraints
				//Exit.
				
				showNoConstraints();
				return false;
			}
		  
			//Complex parsing.
            $("<div/>").attr("class","choice_result").appendTo("#result_area");
			$("<img/>").css("float","left").attr("src","./repo/" + item.img).html(item.uni).appendTo("#result_area div:nth-child("+(i+1)+")");
			$("<p/>").css("float","left").css("padding-left","14px").html(
			"<h1 class='choice_header'>" + item.uni + "</h1>\n" +
			"<span style='font-size:10pt;'><strong>" + item.code + "</strong> &nbsp; " + item.name + "</span>\n" + 
			"<span style='font-size:8pt; display:block; padding-top:4px'>" + item.desc + "</span>"
			).appendTo("#result_area div:nth-child("+(i+1)+")");
          });
        });
}

function showEmpty()
{

/*
Show that the set is empty
*/

$("#result_area").html(
	"<div style='padding:30px;'><img src='style/image/header_uhoh_large.png' alt='Problems...' /><br /><br />" +
	"<strong>We couldn't find any courses which fit those requirements.</strong><br />" +
	"Try double-clicking some constraints to the left to see more courses.</div>"
);

}
  
function showNoConstraints()
{

/*
No Restriction on Courses
*/
$("#result_header").hide();
$("#result_area").css('background','url(style/image/su_banner_top.jpg)').css('height','270px');
$("#result_area").html("<div style='float:left; width:87%; margin-top: 220px; margin-left: 36px; height:156px; background:url(style/image/su_constraints_demo.jpg) no-repeat;'>" +
"<div style='padding-left:120px; padding-top:20px;'><span style='font-size:13pt; font-weight:bold;'>Your aspirations and preferences.</span><br /><br />" +
"The results you see from seekuni are based around your choices, aspirations, capabilities and requirements, not around basic search terms. "+
"<br /><br />You won't see anything which falls outside of the constraints you apply in your search so you'll know exactly where you stand with the results you see.</div></div>");



}

function resultsMode()
{
	$("#result_header").fadeIn("slow");
	$("#result_area").empty();
	$("#result_area").css("background","#fff");
}


