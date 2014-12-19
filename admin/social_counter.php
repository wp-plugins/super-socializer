<?php defined('ABSPATH') or die("Cheating........Uh!!"); ?>

<div id="fb-root"></div>

<div class="metabox-holder columns-2" id="post-body">
		<div class="menu_div" id="tabs">
			<form action="options.php" method="post">
			<?php settings_fields('the_champ_counter_options'); ?>
			<h2 class="nav-tab-wrapper" style="height:36px">
			<ul>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-1"><?php _e('Basic Configuration', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-2"><?php _e('Social Counter', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-3"><?php _e('Shortcode & Widget', 'Super-Socializer') ?></a></li>
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
							<img id="the_champ_sc_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_counter_enable"><?php _e("Enable Social Counter", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_counter_enable" name="the_champ_counter[enable]" type="checkbox" <?php echo isset($theChampCounterOptions['enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control for Social Counter. It must be checked to enable Social Counter functionality', 'Super-Socializer') ?>
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
							<?php _e('<strong>Note:</strong> To disable counter on particular page/post, edit that page/post and check the options at the bottom in <strong>"Super Socializer"</strong> section', 'Super-Socializer') ?>
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
							<img id="the_champ_sc_bitly_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_bitly_enable"><?php _e("Enable bit.ly url shortener for tweet button", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_bitly_enable" name="the_champ_counter[bitly_enable]" type="checkbox" <?php echo isset($theChampCounterOptions['bitly_enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_bitly_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control to enable bit.ly url shortening for sharing', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_bitly_login_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_bitly_login"><?php _e("bit.ly username", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_bitly_login" name="the_champ_counter[bitly_username]" type="text" value="<?php echo isset($theChampCounterOptions['bitly_username']) ? $theChampCounterOptions['bitly_username'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_bitly_login_help_cont">
							<td colspan="2">
							<div>
							<?php echo sprintf(__('Login to your bit.ly account and navigate to <a href="%s" target="_blank">this link</a> to get bit.ly username', 'Super-Socializer'), 'https://bitly.com/a/your_api_key') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_bitly_username.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_bitly_key_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_bitly_key"><?php _e("bit.ly API Key", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_bitly_key" name="the_champ_counter[bitly_key]" type="text" value="<?php echo isset($theChampCounterOptions['bitly_key']) ? $theChampCounterOptions['bitly_key'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_bitly_key_help_cont">
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
					<h3><label><?php _e('Language', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_sc_language_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_language"><?php _e("Language", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_language" name="the_champ_counter[language]" type="text" value="<?php echo isset($theChampCounterOptions['language']) ? $theChampCounterOptions['language'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_language_help_cont">
							<td colspan="2">
							<div>
							<?php echo sprintf(__('Enter the code of the language you want to use to render counters. You can find the language codes at <a href="%s" target="_blank">this link</a>. Leave it empty for default language(English)', 'Super-Socializer'), '//www.facebook.com/translations/FacebookLocales.xml') ?>
							</div>
							</td>
						</tr>
					</table>
					</div>
				</div>
						
				<div class="stuffbox">
					<h3><label><?php _e('Twitter username in tweet button', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_sc_twitter_username_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_twitter_username"><?php _e("Twitter username (without @)", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_twitter_username" name="the_champ_counter[twitter_username]" type="text" value="<?php echo isset($theChampCounterOptions['twitter_username']) ? $theChampCounterOptions['twitter_username'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_twitter_username_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Provided username will be appended after the content being tweeted as "via @USERNAME". Leave empty if you do not want any username.', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_twitter_username.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
					</table>
					</div>
				</div>

				<div class="stuffbox">
					<h3><label><?php _e('Horizontal Counter Interface Options', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_sc_horizontal_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_horizontal_enable"><?php _e("Enable horizontal counter interface", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_horizontal_enable" onclick="theChampHorizontalCounterOptionsToggle(this)" name="the_champ_counter[hor_enable]" type="checkbox" <?php echo isset($theChampCounterOptions['hor_enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_horizontal_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control to enable horizontal counter', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_horizontal_counter.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						
						<tbody id="the_champ_horizontal_counter_options" <?php echo isset($theChampCounterOptions['hor_enable']) ? '' : 'style="display: none"'; ?>>
						<tr>
							<th>
							<img id="the_champ_sc_horizontal_target_url_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_target_url"><?php _e("Target Url", 'Super-Socializer'); ?></label>
							</th>
							<td id="the_champ_target_url_column">
							<input id="the_champ_target_url_default" name="the_champ_counter[horizontal_target_url]" type="radio" <?php echo !isset($theChampCounterOptions['horizontal_target_url']) || $theChampCounterOptions['horizontal_target_url'] == 'default' ? 'checked = "checked"' : '';?> value="default" />
							<label for="the_champ_target_url_default"><?php _e('Url of the webpage where icons are located (default)', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_target_url_home" name="the_champ_counter[horizontal_target_url]" type="radio" <?php echo isset($theChampCounterOptions['horizontal_target_url']) && $theChampCounterOptions['horizontal_target_url'] == 'home' ? 'checked = "checked"' : '';?> value="home" />
							<label for="the_champ_target_url_home"><?php _e('Url of the homepage of your website', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_target_url_custom" name="the_champ_counter[horizontal_target_url]" type="radio" <?php echo isset($theChampCounterOptions['horizontal_target_url']) && $theChampCounterOptions['horizontal_target_url'] == 'custom' ? 'checked = "checked"' : '';?> value="custom" />
							<label for="the_champ_target_url_custom"><?php _e('Custom url', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_target_url_custom_url" name="the_champ_counter[horizontal_target_url_custom]" type="text" value="<?php echo isset($theChampCounterOptions['horizontal_target_url_custom']) ? $theChampCounterOptions['horizontal_target_url_custom'] : '' ?>" />
							</td>
						</tr>
						<tr class="the_champ_help_content" id="the_champ_sc_horizontal_target_url_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Url to like/share/tweet and display like/share/tweet counts', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_title_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_fblogin_title"><?php _e("Title", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_fblogin_title" name="the_champ_counter[title]" type="text" value="<?php echo isset($theChampCounterOptions['title']) ? $theChampCounterOptions['title'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_title_help_cont">
							<td colspan="2">
							<div>
							<?php _e('The text to display above the counter interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_providers_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Select and rearrange providers", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<ul id="the_champ_sc_rearrange">
							<?php
							$counterProviders = array('facebook_like', 'facebook_recommend', 'twitter_tweet', 'linkedin_share', 'google_plusone', 'googleplus_share', 'pinterest_pin_it', 'xing', 'reddit', 'stumbleupon_badge');
							// show selected providers
							if(isset($theChampCounterOptions['horizontal_providers']) && is_array($theChampCounterOptions['horizontal_providers'])){
								foreach($theChampCounterOptions['horizontal_providers'] as $selected){
									$labelParts = explode('_', $selected);
									$labelParts = array_map(function($word) { return ucfirst($word); }, $labelParts);
									$label = implode(' ', $labelParts);
									?>
									<li>
									<input id="the_champ_counter_<?php echo $selected ?>" name="the_champ_counter[horizontal_providers][]" type="checkbox" checked = "checked" value="<?php echo $selected ?>" />
									<label for="the_champ_counter_<?php echo $selected ?>"><?php _e($label, 'Super-Socializer'); ?></label>
									</li>
									<?php
								}
							}else{
								$theChampCounterOptions['horizontal_providers'] = array();
							}
							$remaining = array_diff($counterProviders, $theChampCounterOptions['horizontal_providers']);
							if(is_array($remaining)){
								foreach($remaining as $provider){
									$labelParts = explode('_', $provider);
									$labelParts = array_map(function($word) { return ucfirst($word); }, $labelParts);
									$label = implode(' ', $labelParts);
									?>
									<li>
									<input id="the_champ_counter_<?php echo $provider ?>" name="the_champ_counter[horizontal_providers][]" type="checkbox" value="<?php echo $provider ?>" />
									<label for="the_champ_counter_<?php echo $provider ?>"><?php _e($label, 'Super-Socializer'); ?></label>
									</li>
									<?php
								}
							}
							?>
							</ul>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_providers_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Select the providers for counter interface. Drag them to rearrange.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_hor_alignment_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_hor_alignment"><?php _e("Horizontal alignment", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<select id="the_champ_sc_hor_alignment" name="the_champ_counter[hor_counter_alignment]">
								<option value="left" <?php echo isset($theChampCounterOptions['hor_counter_alignment']) && $theChampCounterOptions['hor_counter_alignment'] == 'left' ? 'selected="selected"' : '' ?>><?php _e('Left', 'Super-Socializer') ?></option>
								<option value="center" <?php echo isset($theChampCounterOptions['hor_counter_alignment']) && $theChampCounterOptions['hor_counter_alignment'] == 'center' ? 'selected="selected"' : '' ?>><?php _e('Center', 'Super-Socializer') ?></option>
								<option value="right" <?php echo isset($theChampCounterOptions['hor_counter_alignment']) && $theChampCounterOptions['hor_counter_alignment'] == 'right' ? 'selected="selected"' : '' ?>><?php _e('Right', 'Super-Socializer') ?></option>
							</select>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_hor_alignment_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Horizontal alignment of the counter interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_position_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Position with respect to content", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_counter_top" name="the_champ_counter[top]" type="checkbox" <?php echo isset($theChampCounterOptions['top']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_top"><?php _e('Top of the content', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_bottom" name="the_champ_counter[bottom]" type="checkbox" <?php echo isset($theChampCounterOptions['bottom']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_bottom"><?php _e('Bottom of the content', 'Super-Socializer') ?></label>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_position_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify position of the counter interface with respect to the content', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_location_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Counter location", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_counter_home" name="the_champ_counter[home]" type="checkbox" <?php echo isset($theChampCounterOptions['home']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_home"><?php _e('Homepage', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_post" name="the_champ_counter[post]" type="checkbox" <?php echo isset($theChampCounterOptions['post']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_post"><?php _e('Posts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_page" name="the_champ_counter[page]" type="checkbox" <?php echo isset($theChampCounterOptions['page']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_page"><?php _e('Pages', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_excerpt" name="the_champ_counter[excerpt]" type="checkbox" <?php echo isset($theChampCounterOptions['excerpt']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_excerpt"><?php _e('Excerpts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_category" name="the_champ_counter[category]" type="checkbox" <?php echo isset($theChampCounterOptions['category']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_category"><?php _e('Category Archives', 'Super-Socializer') ?></label>
							<?php
							if($theChampIsBpActive){
								?>
								<br/>
								<input id="the_champ_counter_bp_activity" name="the_champ_counter[bp_activity]" type="checkbox" <?php echo isset($theChampCounterOptions['bp_activity']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_counter_bp_activity"><?php _e('BuddyPress activity and groups', 'Super-Socializer') ?></label>
								<?php
							}
							if(function_exists('is_bbpress')){
								?>
								<br/>
								<input id="the_champ_counter_bb_forum" name="the_champ_counter[bb_forum]" type="checkbox" <?php echo isset($theChampCounterOptions['bb_forum']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_counter_bb_forum"><?php _e('BBPress forum', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_counter_bb_topic" name="the_champ_counter[bb_topic]" type="checkbox" <?php echo isset($theChampCounterOptions['bb_topic']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_counter_bb_topic"><?php _e('BBPress topic', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_counter_bb_reply" name="the_champ_counter[bb_reply]" type="checkbox" <?php echo isset($theChampCounterOptions['bb_reply']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_counter_bb_reply"><?php _e('BBPress reply', 'Super-Socializer') ?></label>
								<?php
							}
							?>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_location_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify the pages where you want to enable counter interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						</tbody>
					</table>
					</div>
				</div>
				
				<div class="stuffbox">
					<h3><label><?php _e('Vertical (Floating) counter interface Options', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_sc_vertical_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_vertical_enable"><?php _e("Enable vertical (floating) counter interface", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_vertical_enable" onclick="theChampVerticalCounterOptionsToggle(this)" name="the_champ_counter[vertical_enable]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_enable']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_vertical_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Master control to enable vertical (floating) counter widget', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_vertical_counter.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>
						
						<tbody id="the_champ_vertical_counter_options" <?php echo isset($theChampCounterOptions['vertical_enable']) ? '' : 'style="display: none"'; ?>>
						<tr>
							<th>
							<img id="the_champ_sc_vertical_target_url_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_vertical_target_url"><?php _e("Target Url", 'Super-Socializer'); ?></label>
							</th>
							<td id="the_champ_vertical_target_url_column">
							<input id="the_champ_vertical_target_url_default" name="the_champ_counter[vertical_target_url]" type="radio" <?php echo !isset($theChampCounterOptions['vertical_target_url']) || $theChampCounterOptions['vertical_target_url'] == 'default' ? 'checked = "checked"' : '';?> value="default" />
							<label for="the_champ_vertical_target_url_default"><?php _e('Url of the webpage where icons are located (default)', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_vertical_target_url_home" name="the_champ_counter[vertical_target_url]" type="radio" <?php echo isset($theChampCounterOptions['vertical_target_url']) && $theChampCounterOptions['vertical_target_url'] == 'home' ? 'checked = "checked"' : '';?> value="home" />
							<label for="the_champ_vertical_target_url_home"><?php _e('Url of the homepage of your website', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_vertical_target_url_custom" name="the_champ_counter[vertical_target_url]" type="radio" <?php echo isset($theChampCounterOptions['vertical_target_url']) && $theChampCounterOptions['vertical_target_url'] == 'custom' ? 'checked = "checked"' : '';?> value="custom" />
							<label for="the_champ_vertical_target_url_custom"><?php _e('Custom url', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_vertical_target_url_custom_url" name="the_champ_counter[vertical_target_url_custom]" type="text" value="<?php echo isset($theChampCounterOptions['vertical_target_url_custom']) ? $theChampCounterOptions['vertical_target_url_custom'] : '' ?>" />
							</td>
						</tr>
						<tr class="the_champ_help_content" id="the_champ_sc_vertical_target_url_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Url to like/share/tweet and display like/share/tweet counts', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_vertical_providers_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Select and rearrange providers", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<ul id="the_champ_sc_vertical_rearrange">
							<?php
							// show selected providers
							if(isset($theChampCounterOptions['vertical_providers']) && is_array($theChampCounterOptions['vertical_providers'])){
								foreach($theChampCounterOptions['vertical_providers'] as $selected){
									$labelParts = explode('_', $selected);
									$labelParts = array_map(function($word) { return ucfirst($word); }, $labelParts);
									$label = implode(' ', $labelParts);
									?>
									<li>
									<input id="the_champ_vertical_counter_<?php echo $selected ?>" name="the_champ_counter[vertical_providers][]" type="checkbox" checked = "checked" value="<?php echo $selected ?>" />
									<label for="the_champ_vertical_counter_<?php echo $selected ?>"><?php _e($label, 'Super-Socializer'); ?></label>
									</li>
									<?php
								}
							}else{
								$theChampCounterOptions['vertical_providers'] = array();
							}
							$remaining = array_diff($counterProviders, $theChampCounterOptions['vertical_providers']);
							if(is_array($remaining)){
								foreach($remaining as $provider){
									$labelParts = explode('_', $provider);
									$labelParts = array_map(function($word) { return ucfirst($word); }, $labelParts);
									$label = implode(' ', $labelParts);
									?>
									<li>
									<input id="the_champ_vertical_counter_<?php echo $provider ?>" name="the_champ_counter[vertical_providers][]" type="checkbox" value="<?php echo $provider ?>" />
									<label for="the_champ_vertical_counter_<?php echo $provider ?>"><?php _e($label, 'Super-Socializer'); ?></label>
									</li>
									<?php
								}
							}
							?>
							</ul>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_vertical_providers_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Select the providers for counter interface. Drag them to rearrange.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_vertical_bg_color_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_vertical_bg_color"><?php _e("Background Color", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_sc_vertical_bg_color" style="width: 100px" name="the_champ_counter[vertical_bg]" type="text" value="<?php echo isset($theChampCounterOptions['vertical_bg']) ? $theChampCounterOptions['vertical_bg'] : '' ?>" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_vertical_bg_color_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify the color or hex code (example #cc78e0) for the background of vertical counter bar. Leave empty for transparent. You can get the hex code of the required color from <a href="http://www.colorpicker.com/" target="_blank">this link</a>', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_alignment_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_alignment"><?php _e("Horizontal alignment", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<select onchange="theChampToggleOffset(this.value)" id="the_champ_sc_alignment" name="the_champ_counter[alignment]">
								<option value="left" <?php echo isset($theChampCounterOptions['alignment']) && $theChampCounterOptions['alignment'] == 'left' ? 'selected="selected"' : '' ?>><?php _e('Left', 'Super-Socializer') ?></option>
								<option value="right" <?php echo isset($theChampCounterOptions['alignment']) && $theChampCounterOptions['alignment'] == 'right' ? 'selected="selected"' : '' ?>><?php _e('Right', 'Super-Socializer') ?></option>
							</select>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_alignment_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Horizontal alignment of the counter interface', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tbody id="the_champ_sc_left_offset_rows" <?php echo (isset($theChampCounterOptions['alignment']) && $theChampCounterOptions['alignment'] == 'left') ? '' : 'style="display: none"' ?>>
						<tr>
							<th>
							<img id="the_champ_sc_left_offset_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_left_offset"><?php _e("Left offset", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" id="the_champ_sc_left_offset" name="the_champ_counter[left_offset]" type="text" value="<?php echo isset($theChampCounterOptions['left_offset']) ? $theChampCounterOptions['left_offset'] : '' ?>" />px
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_left_offset_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify a number. Increase in number will shift counter interface towards right and decrease will shift it towards left.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						</tbody>
						
						<tbody id="the_champ_sc_right_offset_rows" <?php echo (isset($theChampCounterOptions['alignment']) && $theChampCounterOptions['alignment'] == 'right') ? '' : 'style="display: none"' ?>>
						<tr>
							<th>
							<img id="the_champ_sc_right_offset_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_right_offset"><?php _e("Right offset", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" id="the_champ_sc_right_offset" name="the_champ_counter[right_offset]" type="text" value="<?php echo isset($theChampCounterOptions['right_offset']) ? $theChampCounterOptions['right_offset'] : '' ?>" />px
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_right_offset_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify a number. Increase in number will shift counter interface towards left and decrease will shift it towards right.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						</tbody>
						
						<tr>
							<th>
							<img id="the_champ_sc_top_offset_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_sc_top_offset"><?php _e("Top offset", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input style="width: 100px" id="the_champ_sc_top_offset" name="the_champ_counter[top_offset]" type="text" value="<?php echo isset($theChampCounterOptions['top_offset']) ? $theChampCounterOptions['top_offset'] : '' ?>" />px
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_top_offset_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify a number. Increase in number will shift counter interface towards bottom and decrease will shift it towards top.', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
						
						<tr>
							<th>
							<img id="the_champ_sc_vertical_location_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label><?php _e("Counter location", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_counter_vertical_home" name="the_champ_counter[vertical_home]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_home']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_vertical_home"><?php _e('Homepage', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_vertical_post" name="the_champ_counter[vertical_post]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_post']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_vertical_post"><?php _e('Posts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_vertical_page" name="the_champ_counter[vertical_page]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_page']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_vertical_page"><?php _e('Pages', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_vertical_excerpt" name="the_champ_counter[vertical_excerpt]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_excerpt']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_vertical_excerpt"><?php _e('Excerpts', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_counter_vertical_category" name="the_champ_counter[vertical_category]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_category']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_counter_vertical_category"><?php _e('Category Archives', 'Super-Socializer') ?></label>
							<?php
							if(function_exists('is_bbpress')){
								?>
								<br/>
								<input id="the_champ_counter_vertical_bb_forum" name="the_champ_counter[vertical_bb_forum]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_bb_forum']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_counter_vertical_bb_forum"><?php _e('BBPress forum', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_counter_vertical_bb_topic" name="the_champ_counter[vertical_bb_topic]" type="checkbox" <?php echo isset($theChampCounterOptions['vertical_bb_topic']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_counter_vertical_bb_topic"><?php _e('BBPress topic', 'Super-Socializer') ?></label>
								<?php
							}
							?>
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_sc_vertical_location_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Specify the pages where you want to enable vertical counter interface', 'Super-Socializer') ?>
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
						<p><?php _e('You can use <strong>[TheChamp-Counter]</strong> Shortcode in the content of required page/post where you want to display Social Counter interface.', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Counter]</strong></p>
						<p><?php _e('You can use following attributes in the Shortcode', 'Super-Socializer') ?></p>
						<strong style="font-size: 16px">Style</strong>
						<p><?php _e('Use <strong>style</strong> attribute to style the rendered Social Counter interface', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Counter style="background-color:#000;"]</strong></p>
						
						<strong style="font-size: 16px">Type</strong>
						<p><?php _e('Use <strong>type</strong> attribute to specify the type ("horizontal" or "vertical") of Social Counter interface. Default type is "horizontal".', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Counter type="vertical"]</strong></p>
						
						<strong style="font-size: 16px"><?php _e('Left (Works with "Vertical" type interface only)', 'Super-Socializer') ?></strong>
						<p><?php _e('Use <strong>left</strong> attribute to specify the left offset (distance form the left side of the screen) of Social Counter interface.', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Counter type="vertical" left="500"]</strong></p>
						
						<strong style="font-size: 16px"><?php _e('Top (Works with "Vertical" type interface only)', 'Super-Socializer') ?></strong>
						<p><?php _e('Use <strong>top</strong> attribute to specify the top offset (distance form the top of the screen) of Social Counter interface.', 'Super-Socializer') ?></p>
						<p><?php _e('Example', 'Super-Socializer') ?></p>
						<p><strong>[TheChamp-Counter type="vertical" top="200"]</strong></p>
						<p><?php _e('You can use shortcode in PHP file as following', 'Super-Socializer') ?></p>
						<p><strong>&lt;?php echo do_shortcode('SHORTCODE') ?&gt;</strong></p>
						<p><?php _e('Replace <strong>SHORTCODE</strong> in above code with the required shortcode like <strong>[TheChamp-Counter style="background-color:#000;"]</strong>, so the final code looks like following', 'Super-Socializer') ?></p>
						<p><strong>&lt;?php echo do_shortcode('[TheChamp-Counter style="background-color:#000;"]') ?&gt;</strong></p>
					</div>
				</div>
				
				<div class="stuffbox">
					<h3><label><?php _e('Widget', 'Super-Socializer');?></label></h3>
					<div class="inside">
						<p><?php _e('You can navigate to the <strong>Appearance</strong> > <strong>Widgets</strong> section in the left pan and drag <strong>Super Socializer - Counter (Horizontal Widget)</strong> and <strong>Super Socializer - Counter (Vertical Floating Widget)</strong> widgets in the required area.', 'Super-Socializer') ?></p>
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