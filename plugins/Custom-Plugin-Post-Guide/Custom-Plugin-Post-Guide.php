<?php
/*
Plugin Name: Custom Plugin Post Guide
Description: Displays message ontop of post as a reminder
Version: 1.0
Author: Alan Kerbel
*/



add_action('all_admin_notices','top_message');
 
function top_message()
{
	if(strpos($_SERVER['REQUEST_URI'],'post-new')>0 || strpos($_SERVER['REQUEST_URI'],'post.php')>0)
	{
		echo ("
		<div style=' background:#FF0; width:80%; font-weight:bold; border:2px solid #000; 
		border-radius:5px; padding:20px; margin: 0 auto ; margin-top:10px;  '>
		<div style='margin-bottom:20px; '>
		<ol>
		<li></li>
		</ol>
		</div>
		
		</div>
	");
	}
}


/* off */
?>

