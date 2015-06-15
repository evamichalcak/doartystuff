<?php 
 
$options = array(

	array( "name" => __( "General Settings", 'wp-lock' ),
		"type" => "section"),
		
	array( "type" => "open"),
	
		array(  
			"type" => "text",
			"name" => "Default Logo URL",
			"desc" => "Default logo used if no thumbnail exists. Must be 100x100 pixels in size.",
			"id" => "default_logo",
			"std" => ""
		),
		
		array(  
			"type" => "text",
			"name" => "Admins (Optional)",
			"desc" => "List of user ids associated with this site separated with comma. (e.g. USER_ID1,USER_ID2).",
			"id" => "site_admins",
			"std" => ""
		),

		array(  
			"type" => "text",
			"name" => "App ID (Optional)",
			"desc" => "Application ID associated with this site. You can <a href=\"https://developers.facebook.com/apps/\">get your app id here</a>. ",
			"id" => "app_id",
			"std" => ""
		),
	
	array( "type" => "close")

);