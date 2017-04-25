<?php
/*
Plugin Name: Custom Plugin Social Media Page
Description: TESTING - Displays a new page in your Wordpress admin settings that will allow you to enter your social media profiles. The icons appear on the top of blog posts and pages.
Version: 1.0
Author: Alan Kerbel
 */


add_action('admin_menu', 'my_plugin_menu');
// A Sidebar Widget
	add_action('widgets_init','register_msmp_widget');

$showAtLoopStart = true;

function register_msmp_widget()
{
	register_widget('sbw');
}

class sbw extends WP_Widget
{
	function sbw()
	{
		$options = array(
			'classname'	=>	'msmp-widget',
			'description'	=>	'Displays your social media icons from the Your Social Media Profiles By Test plugin'
		);

		parent::WP_Widget(false,'Your Social Media Profiles By Test',$options);
	}

	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);
		getSocialMediaProfiles();
	}
}

class Networks
{
	public function getNetworks()
	{
		$networks = array('squidoo','feedburner','tumblr','xing','yelp','facebook','twitter','myspace','linkedin','youtube','stumbleupon','flickr','digg','delicious','meetup','newsvine','mixx','lastfm');
		//$networks = array('twitter','facebook','linkedin');
		sort($networks);
		return $networks;
	}

	public function displayNetworkTable($profile)
	{
		$name = ucwords($profile);
		$html = ('
			<tr valign="top">
			<td><img width="32" src="' . $profile . '.png" /></td>
			<th scope="row">' . $name . '</th>
			<td><input size="75" type="text" name="' . $profile . '" value="' . get_option($profile) . '" /></td>
			</tr>
			');

		return $html;

	}
}

function getSocialMediaProfiles()
{
	if(get_option('prefix'))
	{
		echo get_option('prefix');
	}
	$profiles = new Networks;
	$network_array = $profiles->getNetworks();
	foreach($network_array as $n)
	{
		echo display_icon($n);
	}
	if(get_option('suffix'))
	{
		echo get_option('suffix');
	}
}


function display_icon($profile)
{
	if(get_option($profile)!="")
	{
		$html = ('
		<a style="text-decoration:none;" href="' . get_option($profile) . '" target="_blank">
		<img width="32" src="' . $profile . '.png"/>
		</a>
		');
	} else {
		$html = "";
	}

	return $html;


}


function my_plugin_menu() {
	add_options_page('Your Social Media Profiles', 'Your Social Media Profiles By Test', 'manage_options', 'test_one', 'my_plugin_options');
}

function my_plugin_options() {
				if (!current_user_can('manage_options'))  {
					wp_die( __('You do not have sufficient permissions to access this page.') );
				}

				?>

			<div class="wrap">
			<h2>Social Media Profiles</h2>
			Content<a href="" target="_blank">Link</a>

			<form method="post" action="options.php">
			<?php wp_nonce_field('update-options'); ?>



			<table class="form-table">

			<tr valign="top">
			<td colspan="3" style="color:#FFF;background:#3399FF;font-size:12pt;">Section Formatting</td>
			</tr>


			<tr valign="top">
			<td></td>
			<th scope="row">Prefix HTML</th>
			<td><input size="75" type="text" name="prefix" value="<?php echo get_option('prefix');?>" /></td>
			</tr>
			<tr valign="top">
			<td></td>
			<th scope="row">Suffix HTML</th>
			<td><input size="75" type="text" name="suffix" value="<?php echo get_option('suffix');?>" /></td>
			</tr>

			<tr valign="top">
			<td colspan="3" style="color:#FFF;background:#3399FF;font-size:12pt;">Your Social Networks</td>
			</tr>

			
			<?php
				$networks = new Networks;
				$network_array = $networks->getNetworks();
				foreach($network_array as $n)
				{
					echo $networks->displayNetworkTable($n);
				}
				
			?>
			</table>

			<input type="hidden" name="action" value="update" />
			<input type="hidden" name="page_options" value="prefix,suffix,<?php echo implode(",",$network_array); ?>" />

			<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Your Social Profiles') ?>" />
			</p>


			</form>
			</div>

			<table class="form-table">
			<tr valign="top">
			<td colspan="3" style="color:#FFF;background:#3399FF;font-size:12pt;">Title</td>
			</tr>
			</table>

			<p>
				<a href="">CONTENT
			</p>

			<p>
				<a href="">Content
			</p>

			<p>
				<a href="">Content
			</p>

			<p>
				<a href="">Content
			</p>

				<?php } 
				


// Method for Displaying The Social Media Icons


//Template Tag
	function displaySocialMediaIcons()
	{
		// Social Media Template Tag
		return getSocialMediaProfiles();
	}





	?>