<?php defined('ABSPATH') or die("Cheating........Uh!!"); ?>

<div id="fb-root"></div>

<div class="metabox-holder columns-2" id="post-body">
		<div class="menu_div" id="tabs">
			<form id="the_champ_sharing_form" action="options.php" method="post">
			<?php settings_fields('the_champ_sharing_options'); ?>
			<h2 class="nav-tab-wrapper" style="height:36px">
			<ul>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-1"><?php _e('Basic Configuration', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-2"><?php _e('Sharing Interface', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-3"><?php _e('Sharing Options', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-4"><?php _e('Shortcode & Widget', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-5"><?php _e('Troubleshooter', 'Super-Socializer') ?></a></li>
				<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-6"><?php _e('FAQ', 'Super-Socializer') ?></a></li>
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
							
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="menu_containt_div" id="tabs-2">
				<div class="the_champ_left_column">
					<div class="stuffbox">
						<h3><label><?php _e('Horizontal interface options', 'Super-Socializer');?></label></h3>
						<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
										<img id="the_champ_sharing_icon_shape_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
										<label><?php _e("Shape", 'Super-Socializer'); ?></label>
									</th>
									<td>
										<?php
										$sharingShape = isset($theChampSharingOptions['horizontal_sharing_shape']) ? $theChampSharingOptions['horizontal_sharing_shape'] : 'round'; 
										$sharingSize = isset($theChampSharingOptions['horizontal_sharing_size']) ? $theChampSharingOptions['horizontal_sharing_size'] : 32; 
										?>
										<input id="the_champ_sharing_icon_round" onclick="tempHorShape = 'round';theChampSharingPreview('horizontal', document.getElementById('the_champ_sharing_icon_size').value, 'round')" name="the_champ_sharing[horizontal_sharing_shape]" type="radio" <?php echo $sharingShape == 'round' ? 'checked = "checked"' : '';?> value="round" />
										<label for="the_champ_sharing_icon_round"><?php _e("Round", 'Super-Socializer'); ?></label><br/>
										<input id="the_champ_sharing_icon_square" onclick="tempHorShape = 'square';theChampSharingPreview('horizontal', document.getElementById('the_champ_sharing_icon_size').value, 'square')" name="the_champ_sharing[horizontal_sharing_shape]" type="radio" <?php echo $sharingShape == 'square' ? 'checked = "checked"' : '';?> value="square" />
										<label for="the_champ_sharing_icon_square"><?php _e("Square", 'Super-Socializer'); ?></label>
									</td>
								</tr>

								<tr class="the_champ_help_content" id="the_champ_sharing_icon_shape_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Shape of the sharing icons', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
										<img id="the_champ_sharing_icon_size_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
										<label><?php _e("Size (in pixels)", 'Super-Socializer'); ?></label>
									</th>
									<td>
										<input style="width:50px" id="the_champ_sharing_icon_size" onkeyup="theChampSharingSizeValidate(this)" name="the_champ_sharing[horizontal_sharing_size]" type="text" value="<?php echo $sharingSize; ?>" />
										<input id="the_champ_sharing_size_plus" type="button" value="+" onmouseup="tempHorSize = document.getElementById('the_champ_sharing_icon_size').value;theChampSharingPreview('horizontal', tempHorSize, tempHorShape)" />
										<input id="the_champ_sharing_size_minus" type="button" value="-" onmouseup="tempHorSize = document.getElementById('the_champ_sharing_icon_size').value;theChampSharingPreview('horizontal', tempHorSize, tempHorShape)" />
										<script type="text/javascript">
											var tempHorShape = '<?php echo $sharingShape ?>';
											var tempHorSize = '<?php echo $sharingSize ?>';
											theChampIncrement(document.getElementById('the_champ_sharing_size_plus'), "add", document.getElementById('the_champ_sharing_icon_size'), 300, 0.7);
											theChampIncrement(document.getElementById('the_champ_sharing_size_minus'), "subtract", document.getElementById('the_champ_sharing_icon_size'), 300, 0.7);
										</script>
									</td>
								</tr>

								<tr class="the_champ_help_content" id="the_champ_sharing_icon_size_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Size of the sharing icons', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
										<label style="float:left"><?php _e("Icon Preview", 'Super-Socializer'); ?></label>
									</th>
									<td>
										<div id="the_champ_sharing_preview" style="background-color:#3C589A">
											<div style="background:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAzMCAzMCI+PHBhdGggc3Ryb2tlPSIjZmZmIiBkPSJNMTQgMjUgdiAtMTMgUSAxMyA2IDIxIDcuNSBNIDEwIDE0IEwgMjAgMTQiIHN0cm9rZS13aWR0aD0iNCIgZmlsbD0ibm9uZSI+PC9wYXRoPjwvc3ZnPg==') no-repeat left;width:100%;height:100%;"></div>
										</div>
										<script type="text/javascript">
										theChampSharingPreview('horizontal', <?php echo $sharingSize .', "'. $sharingShape . '"' ?>);
										</script>
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<div id="the_champ_sharing_preview_message" style="color:green;display:none"><?php _e('Do not forget to save the configuration after making changes by clicking the save button below', 'Super-Socializer'); ?></div>
									</td>
								</tr>
							</table>
						</div>	
					</div>
				
					<div class="stuffbox">
						<h3><label><?php _e('Vertical interface options', 'Super-Socializer');?></label></h3>
						<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
										<img id="the_champ_vertical_sharing_icon_shape_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
										<label><?php _e("Shape", 'Super-Socializer'); ?></label>
									</th>
									<td>
										<?php
										$verticalSharingShape = isset($theChampSharingOptions['vertical_sharing_shape']) ? $theChampSharingOptions['vertical_sharing_shape'] : 'round'; 
										$verticalSharingSize = isset($theChampSharingOptions['vertical_sharing_size']) ? $theChampSharingOptions['vertical_sharing_size'] : 32; 
										?>
										<input id="the_champ_vertical_sharing_icon_round" onclick="tempVerticalShape = 'round';theChampSharingPreview('vertical', document.getElementById('the_champ_vertical_sharing_icon_size').value, 'round')" name="the_champ_sharing[vertical_sharing_shape]" type="radio" <?php echo $verticalSharingShape == 'round' ? 'checked = "checked"' : '';?> value="round" />
										<label for="the_champ_vertical_sharing_icon_round"><?php _e("Round", 'Super-Socializer'); ?></label><br/>
										<input id="the_champ_vertical_sharing_icon_square" onclick="tempVerticalShape = 'square';theChampSharingPreview('vertical', document.getElementById('the_champ_vertical_sharing_icon_size').value, 'square')" name="the_champ_sharing[vertical_sharing_shape]" type="radio" <?php echo $verticalSharingShape == 'square' ? 'checked = "checked"' : '';?> value="square" />
										<label for="the_champ_vertical_sharing_icon_square"><?php _e("Square", 'Super-Socializer'); ?></label>
									</td>
								</tr>

								<tr class="the_champ_help_content" id="the_champ_vertical_sharing_icon_shape_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Shape of the sharing icons', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
										<img id="the_champ_vertical_sharing_icon_size_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
										<label><?php _e("Size (in pixels)", 'Super-Socializer'); ?></label>
									</th>
									<td>
										<input style="width:50px" id="the_champ_vertical_sharing_icon_size" onkeyup="theChampSharingSizeValidate(this)" name="the_champ_sharing[vertical_sharing_size]" type="text" value="<?php echo $verticalSharingSize; ?>" />
										<input id="the_champ_vertical_sharing_size_plus" type="button" value="+" onmouseup="tempVerticalSize = document.getElementById('the_champ_vertical_sharing_icon_size').value;theChampSharingPreview('vertical', tempVerticalSize, tempVerticalShape)" />
										<input id="the_champ_vertical_sharing_size_minus" type="button" value="-" onmouseup="tempVerticalSize = document.getElementById('the_champ_vertical_sharing_icon_size').value;theChampSharingPreview('vertical', tempVerticalSize, tempVerticalShape)" />
										<script type="text/javascript">
											var tempVerticalShape = '<?php echo $verticalSharingShape ?>';
											var tempVerticalSize = '<?php echo $verticalSharingSize ?>';
											theChampIncrement(document.getElementById('the_champ_vertical_sharing_size_plus'), "add", document.getElementById('the_champ_vertical_sharing_icon_size'), 300, 0.7);
											theChampIncrement(document.getElementById('the_champ_vertical_sharing_size_minus'), "subtract", document.getElementById('the_champ_vertical_sharing_icon_size'), 300, 0.7);
										</script>
									</td>
								</tr>

								<tr class="the_champ_help_content" id="the_champ_vertical_sharing_icon_size_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Size of the sharing icons', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
										<label style="float:left"><?php _e("Icon Preview", 'Super-Socializer'); ?></label>
									</th>
									<td>
										<div id="the_champ_vertical_sharing_preview" style="background-color:#3C589A">
											<div style="background:url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHZpZXdCb3g9IjAgMCAzMCAzMCI+PHBhdGggc3Ryb2tlPSIjZmZmIiBkPSJNMTQgMjUgdiAtMTMgUSAxMyA2IDIxIDcuNSBNIDEwIDE0IEwgMjAgMTQiIHN0cm9rZS13aWR0aD0iNCIgZmlsbD0ibm9uZSI+PC9wYXRoPjwvc3ZnPg==') no-repeat left;width:100%;height:100%;"></div>
										</div>
										<script type="text/javascript">
										theChampSharingPreview('vertical', <?php echo $verticalSharingSize .', "'. $verticalSharingShape . '"' ?>);
										</script>
									</td>
								</tr>

								<tr>
									<td colspan="2">
										<div id="the_champ_vertical_sharing_preview_message" style="color:green;display:none"><?php _e('Do not forget to save the configuration after making changes by clicking the save button below', 'Super-Socializer'); ?></div>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<?php include 'help.php'; ?>
			</div>

			<div class="menu_containt_div" id="tabs-3">
				<div class="the_champ_left_column">
				
				<div class="stuffbox">
					<h3><label><?php _e('Modernizr', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_remove_modernizr_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_remove_modernizr"><?php _e("Do not load Modernizr JS", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_remove_modernizr" name="the_champ_sharing[remove_modernizr]" type="checkbox" <?php echo isset($theChampSharingOptions['remove_modernizr']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_remove_modernizr_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If you find the plugin breaking your theme, you can try enabling this option', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>
					</table>
					</div>
				</div>

				<div class="stuffbox">
					<h3><label><?php _e('Url shortener', 'Super-Socializer');?></label></h3>
					<div class="inside">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
						<tr>
							<th>
							<img id="the_champ_surl_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_surl_enable"><?php _e("Use shortlinks already installed", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_surl_enable" name="the_champ_sharing[use_shortlinks]" type="checkbox" <?php echo isset($theChampSharingOptions['use_shortlinks']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_surl_enable_help_cont">
							<td colspan="2">
							<div>
							<?php _e('Allows for shortened URLs to be used when sharing content if a shortening plugin is installed', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>

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

							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_whatsapp" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('whatsapp', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="whatsapp" />
							<label for="the_champ_sharing_whatsapp"><?php _e("Whatsapp", 'Super-Socializer'); ?></label>
							</div>

							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_yummly" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('yummly', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="yummly" />
							<label for="the_champ_sharing_yummly"><?php _e("Yummly", 'Super-Socializer'); ?></label>
							</div>

							<div class="theChampHorizontalSharingProviderContainer">
							<input id="the_champ_sharing_buffer" name="the_champ_sharing[providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['providers']) && in_array('buffer', $theChampSharingOptions['providers']) ? 'checked = "checked"' : '';?> value="buffer" />
							<label for="the_champ_sharing_buffer"><?php _e("Buffer", 'Super-Socializer'); ?></label>
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
								if(!isset($theChampSharingOptions['horizontal_re_providers'])){
									$theChampSharingOptions['horizontal_re_providers'] = array('facebook', 'twitter', 'google', 'linkedin', 'pinterest', 'reddit', 'delicious', 'stumbleupon', 'whatsapp');
								}
								$horSharingStyle = 'width:' . $theChampSharingOptions['horizontal_sharing_size'] . 'px;height:' . $theChampSharingOptions['horizontal_sharing_size'] . 'px;';
								$horDeliciousRadius = '';
								if($theChampSharingOptions['horizontal_sharing_shape'] == 'round'){
									$horSharingStyle .= 'border-radius:999px;';
									$horDeliciousRadius = 'border-radius:999px;';
								} 
								?>
								<script>
								var theChampHorSharingStyle = '<?php echo $horSharingStyle ?>', theChampHorDeliciousRadius = '<?php echo $horDeliciousRadius ?>';
								</script>
								<?php
								foreach($theChampSharingOptions['horizontal_re_providers'] as $rearrange){
									?>
									<li title="<?php echo $rearrange ?>" id="the_champ_re_horizontal_<?php echo str_replace(' ', '_', $rearrange) ?>" >
									<i style="display:block;<?php echo $horSharingStyle ?>" class="theChamp<?php echo ucfirst(str_replace(' ', '', $rearrange)) ?>Background"><div class="theChampSharingSvg theChamp<?php echo ucfirst(str_replace(' ', '', $rearrange)) ?>Svg" style="<?php echo $horDeliciousRadius ?>"></div></i>
									<input type="hidden" name="the_champ_sharing[horizontal_re_providers][]" value="<?php echo $rearrange ?>">
									</li>
									<?php
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
							<label for="the_champ_sharing_category"><?php _e('Category Archives', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_archive" name="the_champ_sharing[archive]" type="checkbox" <?php echo isset($theChampSharingOptions['archive']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_archive"><?php _e('Archive Pages (Category, Tag, Author or Date based pages)', 'Super-Socializer') ?></label><br/>
							<?php
							$post_types = get_post_types( array( 'public' => true ), 'names', 'and' );
							$post_types = array_diff( $post_types, array( 'post', 'page' ) );
							if( count( $post_types ) ) {	
								foreach ( $post_types as $post_type ) {
									?>
									<input id="the_champ_sharing_<?php echo $post_type ?>" name="the_champ_sharing[<?php echo $post_type ?>]" type="checkbox" <?php echo isset($theChampSharingOptions[$post_type]) ? 'checked = "checked"' : '';?> value="1" />
									<label for="the_champ_sharing_<?php echo $post_type ?>"><?php echo ucfirst( $post_type ) . 's'; ?></label><br/>
									<?php
								}
							}
							
							if($theChampIsBpActive){
								?>
								<input id="the_champ_sharing_bp_activity" name="the_champ_sharing[bp_activity]" type="checkbox" <?php echo isset($theChampSharingOptions['bp_activity']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bp_activity"><?php _e('BuddyPress activity and groups', 'Super-Socializer') ?></label><br/>
								<?php
							}
							if(function_exists('is_bbpress')){
								?>
								<input id="the_champ_sharing_bb_forum" name="the_champ_sharing[bb_forum]" type="checkbox" <?php echo isset($theChampSharingOptions['bb_forum']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bb_forum"><?php _e('BBPress forum', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_bb_topic" name="the_champ_sharing[bb_topic]" type="checkbox" <?php echo isset($theChampSharingOptions['bb_topic']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bb_topic"><?php _e('BBPress topic', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_bb_reply" name="the_champ_sharing[bb_reply]" type="checkbox" <?php echo isset($theChampSharingOptions['bb_reply']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_bb_reply"><?php _e('BBPress reply', 'Super-Socializer') ?></label>
								<br/>
								<?php
							}
							if(the_champ_ss_woocom_is_active()){
								?>
								<input id="the_champ_sharing_woocom_shop" name="the_champ_sharing[woocom_shop]" type="checkbox" <?php echo isset($theChampSharingOptions['woocom_shop']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_woocom_shop"><?php _e('After individual product at WooCommerce Shop page', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_woocom_product" name="the_champ_sharing[woocom_product]" type="checkbox" <?php echo isset($theChampSharingOptions['woocom_product']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_woocom_product"><?php _e('WooCommerce Product Page', 'Super-Socializer') ?></label>
								<br/>
								<input id="the_champ_sharing_woocom_thankyou" name="the_champ_sharing[woocom_thankyou]" type="checkbox" <?php echo isset($theChampSharingOptions['woocom_thankyou']) ? 'checked = "checked"' : '';?> value="1" />
								<label for="the_champ_sharing_woocom_thankyou"><?php _e('WooCommerce Thankyou Page', 'Super-Socializer') ?></label>
								<br/>
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

						<tr>
							<th>
							<img id="the_champ_ss_total_hor_shares_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_total_hor_shares"><?php _e("Show total shares", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_total_hor_shares" name="the_champ_sharing[horizontal_total_shares]" type="checkbox" <?php echo isset($theChampSharingOptions['horizontal_total_shares']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_total_hor_shares_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, total shares will be displayed with sharing icons', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_horizontal_total_shares.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>

						<tr>
							<th>
							<img id="the_champ_ss_hmore_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_hmore"><?php _e("Enable 'More' icon", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_hmore" name="the_champ_sharing[horizontal_more]" type="checkbox" <?php echo isset($theChampSharingOptions['horizontal_more']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_hmore_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, "More" icon will be displayed after selected sharing icons which shows additional sharing networks in popup', 'Super-Socializer') ?>
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

							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_whatsapp" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('whatsapp', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="whatsapp" />
							<label for="the_champ_vertical_sharing_whatsapp"><?php _e("Whatsapp", 'Super-Socializer'); ?></label>
							</div>

							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_yummly" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('yummly', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="yummly" />
							<label for="the_champ_vertical_sharing_yummly"><?php _e("Yummly", 'Super-Socializer'); ?></label>
							</div>

							<div class="theChampVerticalSharingProviderContainer">
							<input id="the_champ_vertical_sharing_buffer" name="the_champ_sharing[vertical_providers][]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_providers']) && in_array('buffer', $theChampSharingOptions['vertical_providers']) ? 'checked = "checked"' : '';?> value="buffer" />
							<label for="the_champ_vertical_sharing_buffer"><?php _e("Buffer", 'Super-Socializer'); ?></label>
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
								if(!isset($theChampSharingOptions['vertical_re_providers'])){
									$theChampSharingOptions['vertical_re_providers'] = array('facebook', 'twitter', 'google', 'linkedin', 'pinterest', 'reddit', 'delicious', 'stumbleupon', 'whatsapp');
								}
								$verticalSharingStyle = 'width:' . $theChampSharingOptions['vertical_sharing_size'] . 'px;height:' . $theChampSharingOptions['vertical_sharing_size'] . 'px;';
								$verticalDeliciousRadius = '';
								if($theChampSharingOptions['vertical_sharing_shape'] == 'round'){
									$verticalSharingStyle .= 'border-radius:999px;';
									$verticalDeliciousRadius = 'border-radius:999px;';
								}
								?>
								<script>
								var theChampVerticalSharingStyle = '<?php echo $verticalSharingStyle ?>', theChampVerticalDeliciousRadius = '<?php echo $verticalDeliciousRadius ?>';
								</script>
								<?php
								foreach($theChampSharingOptions['vertical_re_providers'] as $rearrange){
									?>
									<li title="<?php echo $rearrange ?>" id="the_champ_re_vertical_<?php echo str_replace(' ', '_', $rearrange) ?>" >
									<i style="display:block;<?php echo $verticalSharingStyle ?>" class="theChamp<?php echo ucfirst(str_replace(' ', '', $rearrange)) ?>Background"><div class="theChampSharingSvg theChamp<?php echo ucfirst(str_replace(' ', '', $rearrange)) ?>Svg" style="<?php echo $verticalDeliciousRadius ?>"></div></i>
									<input type="hidden" name="the_champ_sharing[vertical_re_providers][]" value="<?php echo $rearrange ?>">
									</li>
									<?php
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
							<?php _e('Specify a number. Increase in number will shift sharing interface towards right and decrease will shift it towards left. Number can be negative too.', 'Super-Socializer') ?>
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
							<?php _e('Specify a number. Increase in number will shift sharing interface towards left and decrease will shift it towards right. Number can be negative too.', 'Super-Socializer') ?>
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
							<label for="the_champ_sharing_vertical_category"><?php _e('Category Archives', 'Super-Socializer') ?></label><br/>
							<input id="the_champ_sharing_vertical_archive" name="the_champ_sharing[vertical_archive]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_archive']) ? 'checked = "checked"' : '';?> value="1" />
							<label for="the_champ_sharing_vertical_archive"><?php _e('Archive Pages (Category, Tag, Author or Date based pages)', 'Super-Socializer') ?></label><br/>
							<?php
							if( count( $post_types ) ) {
								foreach ( $post_types as $post_type ) {
									?>
									<input id="the_champ_sharing_vertical_<?php echo $post_type ?>" name="the_champ_sharing[vertical_<?php echo $post_type ?>]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_' . $post_type]) ? 'checked = "checked"' : '';?> value="1" />
									<label for="the_champ_sharing_vertical_<?php echo $post_type ?>"><?php echo ucfirst( $post_type ) . 's'; ?></label><br/>
									<?php
								}
							}

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

						<tr>
							<th>
							<img id="the_champ_ss_total_vertical_shares_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_total_vertical_shares"><?php _e("Show total shares", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_total_vertical_shares" name="the_champ_sharing[vertical_total_shares]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_total_shares']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_total_vertical_shares_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, total shares will be displayed with sharing icons', 'Super-Socializer') ?>
							<img width="550" src="<?php echo plugins_url('../images/snaps/ss_vertical_total_shares.png', __FILE__); ?>" />
							</div>
							</td>
						</tr>

						<tr>
							<th>
							<img id="the_champ_ss_vmore_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_vmore"><?php _e("Enable 'More' icon", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_vmore" name="the_champ_sharing[vertical_more]" type="checkbox" <?php echo isset($theChampSharingOptions['vertical_more']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_vmore_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, "More" icon will be displayed after selected sharing icons which shows additional sharing networks in popup', 'Super-Socializer') ?>
							</div>
							</td>
						</tr>

						<tr>
							<th>
							<img id="the_champ_ss_mobile_sharing_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
							<label for="the_champ_ss_mobile_sharing"><?php _e("Hide sharing on mobile devices", 'Super-Socializer'); ?></label>
							</th>
							<td>
							<input id="the_champ_ss_mobile_sharing" name="the_champ_sharing[hide_mobile_sharing]" type="checkbox" <?php echo isset($theChampSharingOptions['hide_mobile_sharing']) ? 'checked = "checked"' : '';?> value="1" />
							</td>
						</tr>
						
						<tr class="the_champ_help_content" id="the_champ_ss_mobile_sharing_help_cont">
							<td colspan="2">
							<div>
							<?php _e('If enabled, vertical sharing interface will not appear on mobile devices', 'Super-Socializer') ?>
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
			
			<div class="menu_containt_div" id="tabs-4">
				<div class="the_champ_left_column">
				<div class="stuffbox">
					<h3><label><?php _e('Shortcode & Widget', 'Super-Socializer');?></label></h3>
					<div class="inside">
						<p><a href="http://support.heateor.com/social-sharing-shortcode-and-widget/" target="_blank"><?php _e('Social Sharing Shortcode & Widget', 'Super-Socializer') ?></a></p>
					</div>
				</div>
				</div>
				<?php include 'help.php'; ?>
			</div>
			
			<div class="menu_containt_div" id="tabs-5">
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
			
			<div class="menu_containt_div" id="tabs-6">
				<div class="the_champ_left_column">
				<div class="stuffbox">
					<h3><label><?php _e('FAQ', 'Super-Socializer') ?></label></h3>
					<div class="inside">
						<p><a href="http://support.heateor.com/how-can-i-show-share-counts-of-my-website-rather-than-of-individual-pagepost/" target="_blank"><?php _e('How can I show share counts of my website rather than of individual pages/posts?', 'Super-Socializer') ?></a></p>
						<p><a href="http://support.heateor.com/how-can-i-disable-social-sharing-on-particular-pagepost/" target="_blank"><?php _e('How can I disable sharing on particular page/post?', 'Super-Socializer') ?></a></p>
						<p><a href="http://support.heateor.com/how-can-i-specify-minimum-sharing-count-for-sharing-networks/" target="_blank"><?php _e('How can I specify minimum sharing count for sharing networks?', 'Super-Socializer') ?></a></p>
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