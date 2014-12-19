<?php defined('ABSPATH') or die("Cheating........Uh!!"); ?>
<script>
var theChampSharingIconPath = '<?php echo plugins_url('../images/sharing', __FILE__); ?>';
</script>

<div id="fb-root"></div>

<div class="metabox-holder columns-2" id="post-body">
		<div class="menu_div" id="tabs">
			<form action="options.php" method="post">
			<?php settings_fields('the_champ_sharing_options'); ?>
			<h2 class="nav-tab-wrapper" style="height:36px">
			<ul>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-1"><?php _e('Basic Configuration', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-2"><?php _e('Social Sharing', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-3"><?php _e('Shortcode & Widget', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-4"><?php _e('Troubleshooter', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-5"><?php _e('FAQ', 'Super-Socializer') ?></a></li>
			</ul>
			</h2>
			<div class="menu_containt_div" id="tabs-1">
				<div class="the_champ_left_column">
				<div class="stuffbox" >
					<h3><label><?php _e('Basic Configuration', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_ss_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sharing_enable"><?php _e("Enable Social Sharing", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sharing_enable" name="the_champ_sharing[enable]" type="checkbox" <?php echo isset($theChampSharingOptions['enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control for Social Sharing. It must be checked to enable Social Sharing functionality', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_delete_options_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_delete_options"><?php _e("Delete all the options on plugin deletion", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_delete_options" name="the_champ_sharing[delete_options]" type="checkbox" <?php echo isset($theChampSharingOptions['delete_options']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_delete_options_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, plugin options will get deleted when plugin is deleted/uninstalled and you will need to reconfigure the options when you install the plugin next time.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
					</table>
					</div>
				</div>
				
				<div class="stuffbox">
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<td colspan="2">
							<div>
							<?php _e('<strong>Note:</strong> To disable sharing and specify minimum share counts per social network on particular page/post, edit that page/post and check the options at the bottom in <strong>"Super Socializer"</strong> section', 'Super-Socializer') ?>
							</div>
							<img style="box-shadow: 4px 4px 4px 4px #888888; margin: 8px 0" width="550" id="the_champ_sl_emailver_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/snaps/ss_disable_sharing.png', __FILE__) ?>" />
							</td>
						</tr>
					</table>
					</div>
				</div>
				
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="menu_containt_div" id="tabs-2">
				<div class="the_champ_left_column">
				<div class="stuffbox">
					<h3><label><?php _e('bit.ly url shortener', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_ss_bitly_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_bitly_enable"><?php _e("Enable bit.ly url shortener for sharing", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_bitly_enable" name="the_champ_sharing[bitly_enable]" type="checkbox" <?php echo isset($theChampSharingOptions['bitly_enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_bitly_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control to enable bit.ly url shortening for sharing', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_bitly_login_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_bitly_login"><?php _e("bit.ly username", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_bitly_login" name="the_champ_sharing[bitly_username]" type="text" value="<?php echo isset($theChampSharingOptions['bitly_username']) ? $theChampSharingOptions['bitly_username'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_bitly_login_help_cont">
							<td colspan="2">
							<div>
							<?php echo sprintf(__('Login to your bit.ly account and navigate to <a href="%s" target="_blank">this link</a> to get bit.ly username', 'Super-Socializer'), 'https://bitly.com/a/your_api_key') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_bitly_username.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_bitly_key_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_bitly_key"><?php _e("bit.ly API Key", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_bitly_key" name="the_champ_sharing[bitly_key]" type="text" value="<?php echo isset($theChampSharingOptions['bitly_key']) ? $theChampSharingOptions['bitly_key'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_bitly_key_help_cont">
							<td colspan="2">
							<div>
							<?php echo sprintf(__('Login to your bit.ly account and navigate to <a href="%s" target="_blank">this link</a> to get your API key', 'Super-Socializer'), 'https://bitly.com/a/your_api_key') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_bitly_apikey.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
					</table>
					</div>
				</div>
				
				<div class="stuffbox">
					<h3><label><?php _e('Twitter username in sharing', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_ss_twitter_username_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_twitter_username"><?php _e("Twitter username (without @)", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_twitter_username" name="the_champ_sharing[twitter_username]" type="text" value="<?php echo isset($theChampSharingOptions['twitter_username']) ? $theChampSharingOptions['twitter_username'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_twitter_username_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Provided username will be appended after the content being shared as "via @USERNAME". Leave empty if you do not want any username in the content being shared.', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_twitter_username.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
					</table>
					</div>
				</div>
				
				<div class="stuffbox">
					<h3><label><?php _e('Horizontal Sharing Interface Options', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_ss_horizontal_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_horizontal_enable"><?php _e("Enable horizontal sharing interface", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_horizontal_enable" onclick="theChampHorizontalSharingOptionsToggle(this)" name="the_champ_sharing[hor_enable]" type="checkbox" <?php echo isset($theChampSharingOptions['hor_enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_horizontal_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control to enable horizontal sharing', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_horizontal_sharing.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						
						<tbody id="the_champ_horizontal_sharing_options" <?php echo isset($theChampSharingOptions['hor_enable']) ? '' : 'style="display: none"'; ?>>
						<tr>
							<th>
							<img id="the_champ_ss_horizontal_target_url_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_horizontal_target_url"><?php _e("Target Url", 'Super-Socializer'); ?></label>
							</th>
							<td id="the_champ_target_url_column">
							<input id="the_champ_target_url_default" name="the_champ_sharing[horizontal_target_url]" type="radio" <?php echo !isset($theChampSharingOptions['horizontal_target_url']) || $theChampSharingOptions['horizontal_target_url'] == 'default' ? 'checked = "checked"' : '';?> value="default" />
							<label for="the_champ_target_url_default"><?php _e('Url of the webpage where icons are located (default)', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_target_url_home" name="the_champ_sharing[horizontal_target_url]" type="radio" <?php echo isset($theChampSharingOptions['horizontal_target_url']) && $theChampSharingOptions['horizontal_target_url'] == 'home' ? 'checked = "checked"' : '';?> value="home" />
							<label for="the_champ_target_url_home"><?php _e('Url of the homepage of your website', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_target_url_custom" name="the_champ_sharing[horizontal_target_url]" type="radio" <?php echo isset($theChampSharingOptions['horizontal_target_url']) && $theChampSharingOptions['horizontal_target_url'] == 'custom' ? 'checked = "checked"' : '';?> value="custom" />
							<label for="the_champ_target_url_custom"><?php _e('Custom url', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_target_url_custom_url" name="the_champ_sharing[horizontal_target_url_custom]" type="text" value="<?php echo isset($theChampSharingOptions['horizontal_target_url_custom']) ? $theChampSharingOptions['horizontal_target_url_custom'] : '' ?>" />
							</td>
						</tr>
						<tr class="the_champ_help_content" id="the_champ_ss_horizontal_target_url_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Url to share', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_title_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_fblogin_title"><?php _e("Title", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_fblogin_title" name="the_champ_sharing[title]" type="text" value="<?php echo isset($theChampSharingOptions['title']) ? $theChampSharingOptions['title'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_title_help_cont">
							<td colspan="2">
							<div>
							<?php _e('The text to display above the sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_providers_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Select providers", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_facebook" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('facebook', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="facebook" />
							<label for="the_champ_sharing_facebook"><?php _e("Facebook", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_twitter" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('twitter', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="twitter" />
							<label for="the_champ_sharing_twitter"><?php _e("Twitter", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_linkedin" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('linkedin', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="linkedin" />
							<label for="the_champ_sharing_linkedin"><?php _e("LinkedIn", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_google" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('google', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="google" />
							<label for="the_champ_sharing_google"><?php _e("Google+", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_print" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('print', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="print" />
							<label for="the_champ_sharing_print"><?php _e("Print", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_email" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('email', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="email" />
							<label for="the_champ_sharing_email"><?php _e("Email", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_yahoo" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('yahoo', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="yahoo" />
							<label for="the_champ_sharing_yahoo"><?php _e("Yahoo", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_reddit" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('reddit', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="reddit" />
							<label for="the_champ_sharing_reddit"><?php _e("Reddit", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_digg" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('digg', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="digg" />
							<label for="the_champ_sharing_digg"><?php _e("Digg", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_delicious" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('delicious', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="delicious" />
							<label for="the_champ_sharing_delicious"><?php _e("Delicious", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_stumble" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('stumbleupon', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="stumbleupon" />
							<label for="the_champ_sharing_stumble"><?php _e("StumbleUpon", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_float" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('float it', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="float it" />
							<label for="the_champ_sharing_float"><?php _e("Float it", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_tumblr" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('tumblr', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="tumblr" />
							<label for="the_champ_sharing_tumblr"><?php _e("Tumblr", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_vk" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('vkontakte', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="vkontakte" />
							<label for="the_champ_sharing_vk"><?php _e("Vkontakte", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_pinterest" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('pinterest', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="pinterest" />
							<label for="the_champ_sharing_pinterest"><?php _e("Pinterest", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_xing" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('xing', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="xing" />
							<label for="the_champ_sharing_xing"><?php _e("Xing", 'Super-Socializer'); ?></label>
							</div>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_providers_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Select the providers for sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_rearrange_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Rearrange icons", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<ul id="the_champ_ss_rearrange">
								<?php
								if(isset($theChampSharingOptions['horizontal_re_providers'])){
									foreach($theChampSharingOptions['horizontal_re_providers'] as $rearrange){
										?>
										<li title="<?php echo $rearrange ?>" id="the_champ_re_horizontal_<?php echo str_replace(' ', '_', $rearrange) ?>" >
										<i class="theChampSharingButton theChampSharing<?php echo ucfirst(str_replace(' ', '', $rearrange)) ?>Button"></i>
										<input type="hidden" name="the_champ_sharing[horizontal_re_providers][]" value="<?php echo $rearrange ?>">
										</li>
										<?php
									}
								}
								?>
							</ul>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_rearrange_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Drag the icons to rearrange in desired order', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_hor_alignment_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_hor_alignment"><?php _e("Horizontal alignment", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<select id="the_champ_ss_hor_alignment" name="the_champ_sharing[hor_sharing_alignment]">
								<option value="left" <?php echo isset($theChampSharingOptions['hor_sharing_alignment']) && $theChampSharingOptions['hor_sharing_alignment'] == 'left' ? 'selected="selected"' : '' ?>><?php _e('Left', 'Super-Socializer') ?></option>
								<option value="center" <?php echo isset($theChampSharingOptions['hor_sharing_alignment']) && $theChampSharingOptions['hor_sharing_alignment'] == 'center' ? 'selected="selected"' : '' ?>><?php _e('Center', 'Super-Socializer') ?></option>
								<option value="right" <?php echo isset($theChampSharingOptions['hor_sharing_alignment']) && $theChampSharingOptions['hor_sharing_alignment'] == 'right' ? 'selected="selected"' : '' ?>><?php _e('Right', 'Super-Socializer') ?></option>
							</select>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_hor_alignment_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Horizontal alignment of the sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_position_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Position with respect to content", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sharing_top" name="the_champ_sharing[top]" type="checkbox" <?php echo isset($theChampSharingOptions['top']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_top"><?php _e('Top of the content', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_bottom" name="the_champ_sharing[bottom]" type="checkbox" <?php echo isset($theChampSharingOptions['bottom']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_bottom"><?php _e('Bottom of the content', 'Super-Socializer') ?></label>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_position_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify position of the sharing interface with respect to the content', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_location_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Sharing location", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sharing_home" name="the_champ_sharing[home]" type="checkbox" <?php echo isset($theChampSharingOptions['home']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_home"><?php _e('Homepage', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_post" name="the_champ_sharing[post]" type="checkbox" <?php echo isset($theChampSharingOptions['post']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_post"><?php _e('Posts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_page" name="the_champ_sharing[page]" type="checkbox" <?php echo isset($theChampSharingOptions['page']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_page"><?php _e('Pages', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_excerpt" name="the_champ_sharing[excerpt]" type="checkbox" <?php echo isset($theChampSharingOptions['excerpt']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_excerpt"><?php _e('Excerpts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_category" name="the_champ_sharing[category]" type="checkbox" <?php echo isset($theChampSharingOptions['category']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_category"><?php _e('Category Archives', 'Super-Socializer') ?></label>
							<?php
							if($theChampIsBpActive){
								?>
								<br/>
								<input id="the_champ_sharing_bp_activity" name="the_champ_sharing[bp_activity]" type="checkbox" <?php echo isset($theChampSharingOptions['bp_activity']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bp_activity"><?php _e('BuddyPress activity and groups', 'Super-Socializer') ?></label>
								<?php
							}
							if(function_exists('is_bbpress')){
								?>
								<br/>
								<input id="the_champ_sharing_bb_forum" name="the_champ_sharing[bb_forum]" type="checkbox" <?php echo isset($theChampSharingOptions['bb_forum']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bb_forum"><?php _e('BBPress forum', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_bb_topic" name="the_champ_sharing[bb_topic]" type="checkbox" <?php echo isset($theChampSharingOptions['bb_topic']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bb_topic"><?php _e('BBPress topic', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_bb_reply" name="the_champ_sharing[bb_reply]" type="checkbox" <?php echo isset($theChampSharingOptions['bb_reply']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bb_reply"><?php _e('BBPress reply', 'Super-Socializer') ?></label>
								<?php
							}
							?>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_location_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify the pages where you want to enable Sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_count_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sharing_counts"><?php _e("Show share counts", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sharing_counts" name="the_champ_sharing[horizontal_counts]" type="checkbox" <?php echo isset($theChampSharingOptions['horizontal_counts']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_count_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, share counts are displayed above sharing icons.', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_share_count.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						</tbody>
					</table>
					</div>
				</div>
				
				<div class="stuffbox">
					<h3><label><?php _e('Vertical (Floating) Sharing Interface Options', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_ss_vertical_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_vertical_enable"><?php _e("Enable vertical (floating) sharing interface", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_vertical_enable" onclick="theChampVerticalSharingOptionsToggle(this)" name="the_champ_sharing[vertical_enable]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control to enable vertical (floating) sharing widget', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_vertical_sharing.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						
						<tbody id="the_champ_vertical_sharing_options" <?php echo isset($theChampSharingOptions['vertical_enable']) ? '' : 'style="display: none"'; ?>>
						<tr>
							<th>
							<img id="the_champ_ss_vertical_target_url_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_vertical_target_url"><?php _e("Target Url", 'Super-Socializer'); ?></label>
							</th>
							<td id="the_champ_vertical_target_url_column">
							<input id="the_champ_vertical_target_url_default" name="the_champ_sharing[vertical_target_url]" type="radio" <?php echo !isset($theChampSharingOptions['vertical_target_url']) || $theChampSharingOptions['vertical_target_url'] == 'default' ? 'checked = "checked"' : '';?> value="default" />
							<label for="the_champ_vertical_target_url_default"><?php _e('Url of the webpage where icons are located (default)', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_vertical_target_url_home" name="the_champ_sharing[vertical_target_url]" type="radio" <?php echo isset($theChampSharingOptions['vertical_target_url']) && $theChampSharingOptions['vertical_target_url'] == 'home' ? 'checked = "checked"' : '';?> value="home" />
							<label for="the_champ_vertical_target_url_home"><?php _e('Url of the homepage of your website', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_vertical_target_url_custom" name="the_champ_sharing[vertical_target_url]" type="radio" <?php echo isset($theChampSharingOptions['vertical_target_url']) && $theChampSharingOptions['vertical_target_url'] == 'custom' ? 'checked = "checked"' : '';?> value="custom" />
							<label for="the_champ_vertical_target_url_custom"><?php _e('Custom url', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_vertical_target_url_custom_url" name="the_champ_sharing[vertical_target_url_custom]" type="text" value="<?php echo isset($theChampSharingOptions['vertical_target_url_custom']) ? $theChampSharingOptions['vertical_target_url_custom'] : '' ?>" />
							</td>
						</tr>
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_target_url_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Url to share', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_vertical_providers_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Select providers", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_facebook" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('facebook', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="facebook" />
							<label for="the_champ_vertical_sharing_facebook"><?php _e("Facebook", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_twitter" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('twitter', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="twitter" />
							<label for="the_champ_vertical_sharing_twitter"><?php _e("Twitter", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_linkedin" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('linkedin', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="linkedin" />
							<label for="the_champ_vertical_sharing_linkedin"><?php _e("LinkedIn", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_google" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('google', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="google" />
							<label for="the_champ_vertical_sharing_google"><?php _e("Google+", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_print" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('print', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="print" />
							<label for="the_champ_vertical_sharing_print"><?php _e("Print", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_email" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('email', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="email" />
							<label for="the_champ_vertical_sharing_email"><?php _e("Email", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_yahoo" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('yahoo', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="yahoo" />
							<label for="the_champ_vertical_sharing_yahoo"><?php _e("Yahoo", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_reddit" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('reddit', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="reddit" />
							<label for="the_champ_vertical_sharing_reddit"><?php _e("Reddit", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_digg" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('digg', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="digg" />
							<label for="the_champ_vertical_sharing_digg"><?php _e("Digg", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_delicious" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('delicious', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="delicious" />
							<label for="the_champ_vertical_sharing_delicious"><?php _e("Delicious", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_stumble" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('stumbleupon', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="stumbleupon" />
							<label for="the_champ_vertical_sharing_stumble"><?php _e("StumbleUpon", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_float" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('float it', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="float it" />
							<label for="the_champ_vertical_sharing_float"><?php _e("Float it", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_tumblr" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('tumblr', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="tumblr" />
							<label for="the_champ_vertical_sharing_tumblr"><?php _e("Tumblr", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_vk" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('vkontakte', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="vkontakte" />
							<label for="the_champ_vertical_sharing_vk"><?php _e("Vkontakte", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_pinterest" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('pinterest', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="pinterest" />
							<label for="the_champ_vertical_sharing_pinterest"><?php _e("Pinterest", 'Super-Socializer'); ?></label>
							</div>
							
							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_xing" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('xing', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="xing" />
							<label for="the_champ_vertical_sharing_xing"><?php _e("Xing", 'Super-Socializer'); ?></label>
							</div>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_providers_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Select the providers for sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_vertical_rearrange_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Rearrange icons", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<ul id="the_champ_ss_vertical_rearrange">
								<?php
								if(isset($theChampSharingOptions['vertical_re_providers'])){
									foreach($theChampSharingOptions['vertical_re_providers'] as $rearrange){
										?>
										<li title="<?php echo $rearrange ?>" id="the_champ_re_vertical_<?php echo str_replace(' ', '_', $rearrange) ?>" >
										<i class="theChampSharingButton theChampSharing<?php echo ucfirst(str_replace(' ', '', $rearrange)) ?>Button"></i>
										<input type="hidden" name="the_champ_sharing[vertical_re_providers][]" value="<?php echo $rearrange ?>">
										</li>
										<?php
									}
								}
								?>
							</ul>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_rearrange_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Drag the icons to rearrange in desired order', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_vertical_bg_color_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Background Color", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" name="the_champ_sharing[vertical_bg]" type="text" value="<?php echo isset($theChampSharingOptions['vertical_bg']) ? $theChampSharingOptions['vertical_bg'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_bg_color_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify the color or hex code (example #cc78e0) for the background of vertical sharing bar. Leave empty for transparent. You can get the hex code of the required color from <a href="http://www.colorpicker.com/" target="_blank">this link</a>', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_alignment_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_alignment"><?php _e("Horizontal alignment", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<select onchange="theChampToggleOffset(this.value)" id="the_champ_ss_alignment" name="the_champ_sharing[alignment]">
								<option value="left" <?php echo isset($theChampSharingOptions['alignment']) && $theChampSharingOptions['alignment'] == 'left' ? 'selected="selected"' : '' ?>><?php _e('Left', 'Super-Socializer') ?></option>
								<option value="right" <?php echo isset($theChampSharingOptions['alignment']) && $theChampSharingOptions['alignment'] == 'right' ? 'selected="selected"' : '' ?>><?php _e('Right', 'Super-Socializer') ?></option>
							</select>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_alignment_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Horizontal alignment of the sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tbody id="the_champ_ss_left_offset_rows" <?php echo (isset($theChampSharingOptions['alignment']) && $theChampSharingOptions['alignment'] == 'left') ? '' : 'style="display: none"' ?>>
						<tr>
							<th>
							<img id="the_champ_ss_left_offset_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_left_offset"><?php _e("Left offset", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" id="the_champ_ss_left_offset" name="the_champ_sharing[left_offset]" type="text" value="<?php echo isset($theChampSharingOptions['left_offset']) ? $theChampSharingOptions['left_offset'] : '' ?>" />px
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_left_offset_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify a number. Increase in number will shift sharing interface towards right and decrease will shift it towards left.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						</tbody>
						
						<tbody id="the_champ_ss_right_offset_rows" <?php echo (isset($theChampSharingOptions['alignment']) && $theChampSharingOptions['alignment'] == 'right') ? '' : 'style="display: none"' ?>>
						<tr>
							<th>
							<img id="the_champ_ss_right_offset_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_right_offset"><?php _e("Right offset", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" id="the_champ_ss_right_offset" name="the_champ_sharing[right_offset]" type="text" value="<?php echo isset($theChampSharingOptions['right_offset']) ? $theChampSharingOptions['right_offset'] : '' ?>" />px
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_right_offset_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify a number. Increase in number will shift sharing interface towards left and decrease will shift it towards right.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						</tbody>
						
						<tr>
							<th>
							<img id="the_champ_ss_top_offset_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_top_offset"><?php _e("Top offset", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" id="the_champ_ss_top_offset" name="the_champ_sharing[top_offset]" type="text" value="<?php echo isset($theChampSharingOptions['top_offset']) ? $theChampSharingOptions['top_offset'] : '' ?>" />px
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_top_offset_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify a number. Increase in number will shift sharing interface towards bottom and decrease will shift it towards top.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_vertical_location_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Sharing location", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sharing_vertical_home" name="the_champ_sharing[vertical_home]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_home']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_vertical_home"><?php _e('Homepage', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_vertical_post" name="the_champ_sharing[vertical_post]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_post']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_vertical_post"><?php _e('Posts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_vertical_page" name="the_champ_sharing[vertical_page]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_page']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_vertical_page"><?php _e('Pages', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_vertical_excerpt" name="the_champ_sharing[vertical_excerpt]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_excerpt']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_vertical_excerpt"><?php _e('Excerpts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_vertical_category" name="the_champ_sharing[vertical_category]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_category']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_vertical_category"><?php _e('Category Archives', 'Super-Socializer') ?></label>
							<?php
							if(function_exists('is_bbpress')){
								?>
								<br/>
								<input id="the_champ_sharing_vertical_bb_forum" name="the_champ_sharing[vertical_bb_forum]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_bb_forum']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_vertical_bb_forum"><?php _e('BBPress forum', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_vertical_bb_topic" name="the_champ_sharing[vertical_bb_topic]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_bb_topic']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_vertical_bb_topic"><?php _e('BBPress topic', 'Super-Socializer') ?></label>
								<?php
							}
							?>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_location_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify the pages where you want to enable vertical Sharing interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_ss_vertical_count_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sharing_vertical_counts"><?php _e("Show share counts", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sharing_vertical_counts" name="the_champ_sharing[vertical_counts]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_counts']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vertical_count_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, share counts are displayed above sharing icons.', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_vertical_sharing_count.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						</tbody>
					</table>
					</div>
				</div>
				
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="menu_containt_div" id="tabs-3">
				<div class="the_champ_left_column">
				<div class="stuffbox">
					<h3><label><?php _e('Shortcode', 'Super-Socializer');?></label></h3>
					<div class="inside">
						<p><?php _e('You can use <strong>[TheChamp-Sharing]</strong> Shortcode in the content of required page/post where you want to display Social Sharing interface.', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Sharing]</strong></p>
						<p><?php _e('You can use following attributes in the Shortcode', 'Super-Socializer') ?></p>
						<strong style="font-size: 16px">style</strong>
						<p><?php _e('Use <strong>style</strong> attribute to style the rendered Social Sharing interface', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Sharing style="background-color:#000;"]</strong></p>
						
						<strong style="font-size: 16px">type</strong>
						<p><?php _e('Use <strong>type</strong> attribute to specify the type ("horizontal" or "vertical") of Social Sharing interface. Default type is "horizontal".', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Sharing type="vertical"]</strong></p>
						
						<strong style="font-size: 16px">count</strong>
						<p><?php _e('Use <strong>count</strong> attribute to enable the share counts on Social Sharing interface', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Sharing count="1"]</strong></p>
						
						<strong style="font-size: 16px"><?php _e('left (Works with "Vertical" type interface only)', 'Super-Socializer') ?></strong>
						<p><?php _e('Use <strong>left</strong> attribute to specify the left offset (distance form the left side of the screen) of Social Sharing interface.', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Sharing type="vertical" left="500"]</strong></p>
						
						<strong style="font-size: 16px"><?php _e('top (Works with "Vertical" type interface only)', 'Super-Socializer') ?></strong>
						<p><?php _e('Use <strong>top</strong> attribute to specify the top offset (distance form the top of the screen) of Social Sharing interface.', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Sharing type="vertical" top="200"]</strong></p>
						<p><?php _e('You can use shortcode in PHP file as following', 'Super-Socializer') ?></p>
						<p><strong>&lt;?php echo do_shortcode('SHORTCODE') ?&gt;</strong></p>
						<p><?php _e('Replace <strong>SHORTCODE</strong> in above code with the required shortcode like <strong>[TheChamp-Sharing style="background-color:#000;"]</strong>, so the final code looks like following', 'Super-Socializer') ?></p>
						<p><strong>&lt;?php echo do_shortcode('[TheChamp-Sharing style="background-color:#000;"]') ?&gt;</strong></p>
					</div>
				</div>
				
				<div class="stuffbox">
					<h3><label><?php _e('Widget', 'Super-Socializer');?></label></h3>
					<div class="inside">
						<p><?php _e('You can navigate to the <strong>Appearance</strong> > <strong>Widgets</strong> section in the left pan and drag <strong>Super Socializer - Sharing (Horizontal Widget)</strong> and <strong>Super Socializer - Sharing (Vertical Floating Widget)</strong> widgets in the required area.', 'Super-Socializer') ?></p>
					</div>
				</div>
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="menu_containt_div" id="tabs-4">
				<div class="the_champ_left_column">
				<div class="stuffbox">
					<h3><label><?php _e('Facebook Sharing Troubleshooter', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<td>
							<?php _e('If Facebook sharing is not working fine, click at the following link and enter the problematic url (where Facebook sharing is not working properly) of your website in the text field:', 'Super-Socializer') ?><br/>
							<a style="text-decoration: none" target="_blank" href="https://developers.facebook.com/tools/debug/">https://developers.facebook.com/tools/debug/</a>
							</td>
						</tr>
					</table>
					</div>
				</div>
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="menu_containt_div" id="tabs-5">
				<div class="the_champ_left_column">
				<div class="stuffbox">
					<h3><label><?php _e('How can I show share counts of my website rather than of individual pages/posts?', 'Super-Socializer') ?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<td><?php _e('Choose "Url of the homepage of your website" in "Target Url" option and enable "Show share counts" option', 'Super-Socializer') ?></td>
						</tr>
					</table>
					</div>
				</div>
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="the_champ_clear"></div>
			<p class="submit">
				<input style="margin-left:8px" type="submit" name="save" class="button button-primary" value="<?php _e("Save Changes", 'Super-Socializer'); ?>" />
			</p>
			</form>
		</div>
</div>