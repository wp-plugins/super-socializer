<?php defined('ABSPATH') or die("Cheating........Uh!!"); ?>
<div id="fb-root"></div>

<div class="metabox-holder columns-2" id="post-body">
		<div class="menu_div" id="tabs">
					<form action="options.php" method="post">
					<?php settings_fields('the_champ_facebook_options'); ?>
					<h2 class="nav-tab-wrapper" style="height:36px">
					<ul>
						<li><a style="margin:0; height: 23px" class="nav-tab" href="#tabs-1"><?php _e('Social Commenting', 'Super-Socializer') ?></a></li>
						<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-2"><?php _e('Shortcode', 'Super-Socializer') ?></a></li>
						<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-3"><?php _e('FAQ', 'Super-Socializer') ?></a></li>
					</ul>
					</h2>					
					<div class="menu_containt_div" id="tabs-1">
						<div class="the_champ_left_column">
						<div class="stuffbox">
							<h3><label><?php _e('Enable Social Commenting', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_enable_commenting_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_enable_commenting"><?php _e("Enable Social Commenting", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_enable_commenting" name="the_champ_facebook[enable_commenting]" type="checkbox" <?php echo isset($theChampFacebookOptions['enable_commenting']) ? 'checked = "checked"' : '';?> value="1" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_enable_commenting_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Enable Social Commenting', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_commenting_tab_order_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_commenting_tab_order"><?php _e("Order of tabs in commenting interface", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_commenting_tab_order" name="the_champ_facebook[commenting_order]" type="text" value="<?php echo isset($theChampFacebookOptions['commenting_order']) ? $theChampFacebookOptions['commenting_order'] : '';?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_commenting_tab_order_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Order of the tabs shown in social commenting interface. Defaults to wordpress,facebook,googleplus,disqus', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_commenting_title_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_commenting_title"><?php _e("Comment area label", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_commenting_title" name="the_champ_facebook[commenting_label]" type="text" value="<?php echo isset($theChampFacebookOptions['commenting_label']) ? $theChampFacebookOptions['commenting_label'] : '';?>" />
									</td>
								</tr>
							</table>
							</div>
						</div>

						<div class="stuffbox">
							<h3><label><?php _e('Labels', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_wp_comment_label_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_wp_comment_label"><?php _e("Label for WordPress Commenting tab", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_wp_comment_label" name="the_champ_facebook[label_wordpress_comments]" type="text" value="<?php echo isset($theChampFacebookOptions['label_wordpress_comments']) ? $theChampFacebookOptions['label_wordpress_comments'] : '';?>" />
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_fb_comment_label_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fb_comment_label"><?php _e("Label for Facebook Commenting tab", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fb_comment_label" name="the_champ_facebook[label_facebook_comments]" type="text" value="<?php echo isset($theChampFacebookOptions['label_facebook_comments']) ? $theChampFacebookOptions['label_facebook_comments'] : '';?>" />
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_gp_comment_label_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_gp_comment_label"><?php _e("Label for G+ Commenting tab", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_gp_comment_label" name="the_champ_facebook[label_googleplus_comments]" type="text" value="<?php echo isset($theChampFacebookOptions['label_googleplus_comments']) ? $theChampFacebookOptions['label_googleplus_comments'] : '';?>" />
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_dq_comment_label_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_dq_comment_label"><?php _e("Label for Disqus Commenting tab", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_dq_comment_label" name="the_champ_facebook[label_disqus_comments]" type="text" value="<?php echo isset($theChampFacebookOptions['label_disqus_comments']) ? $theChampFacebookOptions['label_disqus_comments'] : '';?>" />
									</td>
								</tr>
							</table>
							</div>
						</div>

						<div class="stuffbox">
							<h3><label><?php _e('Facebook Commenting Options', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_fb_comment_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_enable_fbcomments"><?php _e("Enable Facebook Commenting", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_enable_fbcomments" name="the_champ_facebook[enable_fbcomments]" type="checkbox" <?php echo isset($theChampFacebookOptions['enable_fbcomments']) ? 'checked = "checked"' : '';?> value="1" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Enable Social Commenting', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_fb_comment_url_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_comment_url"><?php _e('Url to comment on', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_comment_url" name="the_champ_facebook[urlToComment]" type="text" value="<?php echo isset($theChampFacebookOptions['urlToComment']) ? $theChampFacebookOptions['urlToComment'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_url_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The absolute URL that comments posted will be permanently associated with. Stories on Facebook about comments posted, will link to this URL.<br/>If left empty <strong>(Recommended)</strong>, url of the webpage will be used at which commenting is enabled.', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_comment_width_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbcomment_width"><?php _e('Width', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbcomment_width" name="the_champ_facebook[comment_width]" type="text" value="<?php echo isset($theChampFacebookOptions['comment_width']) ? $theChampFacebookOptions['comment_width'] : '' ?>" />px
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_width_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Leave empty to auto-adjust the width. The width (in pixels) of the Comments block.', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_comment_color_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbcomment_color"><?php _e('Color Scheme', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<select id="the_champ_fbcomment_color" name="the_champ_facebook[comment_color]">
										<option value="light" <?php echo isset($theChampFacebookOptions['comment_color']) && $theChampFacebookOptions['comment_color'] == 'light' ? 'selected="selected"' : '' ?>><?php _e('Light', 'Super-Socializer') ?></option>
										<option value="dark" <?php echo isset($theChampFacebookOptions['comment_color']) && $theChampFacebookOptions['comment_color'] == 'dark' ? 'selected="selected"' : '' ?>><?php _e('Dark', 'Super-Socializer') ?></option>
									</select>
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_color_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The color scheme used by the plugin. Can be "light" or "dark".', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_comment_numposts_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbcomment_numposts"><?php _e('Number of comments', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbcomment_numposts" name="the_champ_facebook[comment_numposts]" type="text" value="<?php echo isset($theChampFacebookOptions['comment_numposts']) ? $theChampFacebookOptions['comment_numposts'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_numposts_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The number of comments to show by default. The minimum value is 1. Defaults to 10', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_comment_orderby_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbcomment_orderby"><?php _e('Order by', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<select id="the_champ_fbcomment_orderby" name="the_champ_facebook[comment_orderby]">
										<option value="social" <?php echo isset($theChampFacebookOptions['comment_orderby']) && $theChampFacebookOptions['comment_orderby'] == 'social' ? 'selected="selected"' : '' ?>><?php _e('Social', 'Super-Socializer') ?></option>
										<option value="reverse_time" <?php echo isset($theChampFacebookOptions['comment_orderby']) && $theChampFacebookOptions['comment_orderby'] == 'reverse_time' ? 'selected="selected"' : '' ?>><?php _e('Reverse Time', 'Super-Socializer') ?></option>
										<option value="time" <?php echo isset($theChampFacebookOptions['comment_orderby']) && $theChampFacebookOptions['comment_orderby'] == 'time' ? 'selected="selected"' : '' ?>><?php _e('Time', 'Super-Socializer') ?></option>
									</select>
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_orderby_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The order to use when displaying comments.', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_comment_mobile_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbcomment_mobile"><?php _e('Mobile', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<select id="the_champ_fbcomment_mobile" name="the_champ_facebook[comment_mobile]">
										<option value="auto-detect" <?php echo isset($theChampFacebookOptions['comment_mobile']) && $theChampFacebookOptions['comment_mobile'] == 'auto-detect' ? 'selected="selected"' : '' ?>><?php _e('Auto Detect', 'Super-Socializer') ?></option>
										<option value="true" <?php echo isset($theChampFacebookOptions['comment_mobile']) && $theChampFacebookOptions['comment_mobile'] == 'true' ? 'selected="selected"' : '' ?>><?php _e('True', 'Super-Socializer') ?></option>
										<option value="false" <?php echo isset($theChampFacebookOptions['comment_mobile']) && $theChampFacebookOptions['comment_mobile'] == 'false' ? 'selected="selected"' : '' ?>><?php _e('False', 'Super-Socializer') ?></option>
									</select>
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_mobile_help_cont">
									<td colspan="2">
									<div>
									<?php _e('A boolean value that specifies whether to show the mobile-optimized version or not.', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_comment_lang_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbcomment_lang"><?php _e('Language', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbcomment_lang" name="the_champ_facebook[comment_lang]" type="text" value="<?php echo isset($theChampFacebookOptions['comment_lang']) ? $theChampFacebookOptions['comment_lang'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_comment_lang_help_cont">
									<td colspan="2">
									<div>
									<?php echo sprintf(__('Enter the code of the language you want to use to display commenting. You can find the language codes at <a href="%s" target="_blank">this link</a>. Leave it empty for default language(English)', 'Super-Socializer'), '//www.facebook.com/translations/FacebookLocales.xml') ?>
									</div>
									</td>
								</tr>
							</table>
							</div>
						</div>
						
						<div class="stuffbox">
							<h3><label><?php _e('Google Plus Commenting Options', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_enable_gpcomments_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_enable_gpcomments"><?php _e("Enable Google Plus Commenting", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_enable_gpcomments" name="the_champ_facebook[enable_googlepluscomments]" type="checkbox" <?php echo isset($theChampFacebookOptions['enable_googlepluscomments']) ? 'checked = "checked"' : '';?> value="1" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_enable_gpcomments_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Enable Google Plus Commenting', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_gpcomments_width_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_gpcomments_width"><?php _e("Width", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_gpcomments_width" name="the_champ_facebook[gpcomments_width]" type="text" value="<?php echo isset($theChampFacebookOptions['gpcomments_width']) ? $theChampFacebookOptions['gpcomments_width'] : ''; ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_gpcomments_width_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Width of GooglePlus Commenting interface. Leave empty for auto adjust', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_gpcomments_url_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_gpcomments_url"><?php _e("Url to comment on", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_gpcomments_url" name="the_champ_facebook[gpcomments_url]" type="text" value="<?php echo isset($theChampFacebookOptions['gpcomments_url']) ? $theChampFacebookOptions['gpcomments_url'] : ''; ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_gpcomments_url_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The absolute URL that comments posted will be permanently associated with. Stories on Google Plus about comments posted, will link to this URL.<br/>If left empty <strong>(Recommended)</strong>, url of the webpage will be used at which commenting is enabled.', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
							</table>
							</div>
						</div>

						<div class="stuffbox">
							<h3><label><?php _e('Disqus Commenting Options', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_enable_dqcomments_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_enable_dqcomments"><?php _e("Enable Disqus Commenting", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_enable_dqcomments" name="the_champ_facebook[enable_disquscomments]" type="checkbox" <?php echo isset($theChampFacebookOptions['enable_disquscomments']) ? 'checked = "checked"' : '';?> value="1" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_enable_dqcomments_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Enable Disqus Commenting', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>

								<tr>
									<th>
									<img id="the_champ_commenting_dq_shortname_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_commenting_dq_shortname"><?php _e("Disqus Shortname", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_commenting_dq_shortname" name="the_champ_facebook[dq_shortname]" type="text" value="<?php echo isset($theChampFacebookOptions['dq_shortname']) ? $theChampFacebookOptions['dq_shortname'] : ''; ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_commenting_dq_shortname_help_cont">
									<td colspan="2">
									<div>
									<?php _e('<strong>Required to use Disqus commenting.</strong> You can find it in your Disqus plugin settings section as shown in the screenshot below', 'Super-Socializer') ?>
									</div>
									<img width="562" src="<?php echo plugins_url('../images/snaps/sc_disqus_shortname.png', __FILE__); ?>" />
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
							<h3><label><?php _e('Shortcode', 'Super-Socializer');?></label></h3>
							<div class="inside">
								<p><a href="//support.heateor.com/social-commenting-shortcode/" target="_blank"><?php _e('Shortcode', 'Super-Socializer') ?></a></p>
							</div>
						</div>
						</div>
						<?php include 'help.php'; ?>
					</div>
					
					<div class="menu_containt_div" id="tabs-3">
						<div class="the_champ_left_column">
						<div class="stuffbox">
							<h3><label><?php _e('FAQ', 'Super-Socializer') ?></label></h3>
							<div class="inside">
								<p><a href="//support.heateor.com/how-can-i-disable-social-commenting-at-individual-pagepost/" target="_blank"><?php _e('How can I disable Social Commenting at individual page/post?', 'Super-Socializer') ?></a></p>
							</div>
						</div>
						</div>
						<?php include 'help.php'; ?>
					</div>
			<div class="the_champ_clear"></div>
			<p class="submit">
				<input id="the_champ_enable_fblike" style="margin-left:8px" type="submit" name="save" class="button button-primary" value="<?php _e("Save Changes", 'Super-Socializer'); ?>" />
			</p>
			</form>
		</div>
</div>