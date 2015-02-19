/*
   SeekUni.com
   (C) Damien Walsh 2009
*/

	$(function() {
	
		$("#sortable").sortable( {
			update: function(event,ui) {
				find_courses();
			}
		} );
		
		$(".sort").live("dblclick", function() {
			$(this).fadeOut("slow");
			$(this).remove();
			//Resync:
			find_courses();
		});
		
		$("#sortable").disableSelection();
		$('#selectable').selectable();

			$("#add_constraint").dialog({
				bgiframe: true,
				height: 350,
				width:600,
				modal: true,
				autoOpen: false,
				close: function(event,ui) {
					 $("#choose_opt").fadeIn("fast");
					 $("#conf_opt").fadeOut("fast");
					 
					 //Clear panes.
					 $("#conf_opt_header").html("");
					 $("#conf_pane").html("");
				}
				
			});
	
			$(".itm").bind("click", function(e){
			
			  //The user selected a restriction type.
			  $("#choose_opt").fadeOut("fast");
			  $("#conf_opt").fadeIn("fast");
			  $("<div/>").css("width","100%").css("height","200px").css("background","url(./style/image/loader.gif) no-repeat center center").appendTo("#conf_pane");
			  var option_title = $(this).children("span:first").html();
			  
			  //Show the right pane.
			  $.get("./ajax/constraint_pane.ajax.php", { request: $(this).children("span:first").attr("id") } 
              , function(data) {
			  	  $("#conf_opt_header").html(option_title);
			      $("#conf_pane").html(data);
			  });

			  
			});

	});