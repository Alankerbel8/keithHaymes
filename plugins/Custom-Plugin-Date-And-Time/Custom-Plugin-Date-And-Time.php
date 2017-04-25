<?php
/*
Plugin Name: Custom Plugin Date And Time
Description: Shortcode to display the date and time after each post.
Version: 1.0
Author: Alan Kerbel
*/



add_shortcode('date-and-time','put_date_and_time');

function put_date_and_time($atts)
{

	return '<span style="background-color:'.$bgcolor.'; color:'.$color.'" >' . date('m/d/Y H:i:s') . '</span>';
}
 


?>