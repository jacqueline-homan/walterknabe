jQuery(document).ready(function($){
	
	/* TinyMce tabs */
	
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});
	
	
	/* ========= Accordion ========*/
	var count_Acc = 1;
	
	$('#add_accordion_item').click(function() {
		
		//count_Acc = $('#accordion_holder').children('div').length +1 ;
		count_Acc ++;
		
		$('#accordion_holder').append('<div id="accordion_item-' + count_Acc + '" class="accordion_item"><div class="remove_accordion_item" id="remove-' + count_Acc+ '"></div><h4>Accordion Item ' + count_Acc + '</h4><label>Title:</label><input name="tab-title" id="' + count_Acc + '" type="text" value="Enter title" /><label>Content:</label><textarea>Enter content</textarea><div class="clear"></div></div>');
	
	});
	$('.remove_accordion_item').live('click', function() {
		$(this).parent().remove();
		return false;
	});
		
		
	/* ========= Toggle ========*/
	var count_Togg = 1;
	
	$('#add_toggle_item').click(function() {
		
		//count_Togg = $('#accordion_holder').children('div').length +1 ;
		count_Togg ++;
		
		$('#toggle_holder').append('<div id="toggle_item-' + count_Togg + '" class="toggle_item"><div class="remove_toggle_item" id="remove-' + count_Togg+ '"></div><h4>Toggle Item ' + count_Togg + '</h4><label>Title:</label><input name="tab-title" id="' + count_Togg + '" type="text" value="Enter title" /><label>Content:</label><textarea>Enter content</textarea><div class="clear"></div></div>');
	
	});
	$('.remove_toggle_item').live('click', function() {
		$(this).parent().remove();
		return false;
	});
	
	
	
	/* ========= Tabs ======== */
	var count_Tab = 1;
	
	$('#add_tab').click(function() {
		
		//count_Tab = $('#tabber_holder').children('div').length +1 ;
		count_Tab ++;
		
		$('#tabber_holder').append('<div id="tab_item-' + count_Tab + '" class="tab_item"><div class="remove_tab_item" id="remove-' + count_Tab+ '"></div><h4>Tab ' + count_Tab + '</h4><label>Title:</label><input name="tab-title" id="' + count_Tab + '" type="text" value="Enter title" /><label>Content:</label><textarea>Enter content</textarea><div class="clear"></div></div>');
	
	});
	$('.remove_tab_item').live('click', function() {
		$(this).parent().remove();
		return false;
	});
	
	
	
	/* ========= Columns ======== */
	$('#add_half').click(function() {
		
		$('#columns_holder').append('<div class="half"><div class="remove_column" id="remove_column"></div><textarea></textarea></div>');
		
	});
	
	$('#add_third').click(function() {
		
		$('#columns_holder').append('<div class="third"><div class="remove_column" id="remove_column"></div><textarea></textarea></div>');
		
	});
	$('#add_two_third').click(function() {
		
		$('#columns_holder').append('<div class="two_third"><div class="remove_column" id="remove_column"></div><textarea></textarea></div>');
		
	});
	
	$('#add_fourth').click(function() {
		
		$('#columns_holder').append('<div class="fourth"><div class="remove_column" id="remove_column"></div><textarea></textarea></div>');
		
	});
	$('#add_three_fourth').click(function() {
		
		$('#columns_holder').append('<div class="three_fourth"><div class="remove_column" id="remove_column"></div><textarea></textarea></div>');
		
	});
	$('.remove_column').live('click', function() {
		$(this).parent().remove();
		return false;
	});
	/* ========= end Columns ======== */
	
	/* ========= Custom Message icon selector =========*/

	$("select#icon").change(function () {
	
		var icon = $(this).val();
         
		
		$("select#icon option:selected").each(function () {
		
			if (icon == '') {
				$("#icon_holder").html('<i>No icon is selected for custom message box</i>');
			}else{
				$("#icon_holder").html('<img src="images/icons/'+ icon +'" />');
			}
			
		});

        })
        .change();
		
	/* ========= end Custom Message icon selector =========*/
	
	/* ========= List Style selector =========*/

	$("select#list_style").change(function () {
	
		var icon = $(this).val();
         
		
		$("select#list_style option:selected").each(function () {
		
			if (icon == '') {
				$("#list_image_holder").html('<i>No icon is selected for custom message box</i>');
			}else{
				$("#list_image_holder").html('<img src="images/liststyles/'+ icon +'" />');
			}
			
		});

        })
        .change();
		
	/* ========= end List Style selector =========*/
	
}); //end doc ready