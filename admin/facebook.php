<?php defined('ABSPATH') or die("Cheating........Uh!!"); ?>
<div id="fb-root"></div>

<div class="metabox-holder columns-2" id="post-body">
		<div class="menu_div" id="tabs">
					<form action="options.php" method="post">
					<?php settings_fields('the_champ_facebook_options'); ?>
					<h2 class="nav-tab-wrapper" style="height:36px">
					<ul>
						<li><a style="margin:0; height: 23px" class="nav-tab" href="#tabs-1"><?php _e('Facebook Commenting', 'Super-Socializer') ?></a></li>
						<li><a style="margin:0; height: 23px" class="nav-tab" href="#tabs-2"><?php _e('Feed', 'Super-Socializer') ?></a></li>
						<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-3"><?php _e('Shortcode', 'Super-Socializer') ?></a></li>
						<li style="margin-left:9px"><a style="margin:0; height:23px" class="nav-tab" href="#tabs-4"><?php _e('FAQ', 'Super-Socializer') ?></a></li>
					</ul>
					</h2>					
					<div class="menu_containt_div" id="tabs-1">
						<div class="the_champ_left_column">
						<div class="stuffbox">
							<h3><label><?php _e('Enable Facebook Commenting', 'Super-Socializer');?></label></h3>
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
									<?php _e('After enabling this option, Facebook commenting will appear before Wordpress comment form at your website', 'Super-Socializer') ?>
									</div>
									<img width="562" src="<?php echo plugins_url('../images/snaps/FB_commenting.png', __FILE__); ?>" />
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
						</div>
						<?php include 'help.php'; ?>
					</div>
					
					<div class="menu_containt_div" id="tabs-2">
						<div class="the_champ_left_column">
						
						<div class="stuffbox">
							<h3><label><?php _e('Important note', 'Super-Socializer');?></label></h3>
							<div class="inside">
								<?php echo sprintf(__('To use this feature follow the steps mentioned at <a href="%s" target="_blank">this link</a>', 'Super-Socializer'), 'http://thechamplord.wordpress.com/2014/06/17/enable-extended-permissions-in-facebook-app/'); ?>
							</div>
						</div>
						
						<div class="stuffbox">
							<h3><label><?php _e('Feed', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_fb_feed_enable_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_enable_fbfeed"><?php _e("Publish feed on user's timeline on Facebook login", 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_enable_fbfeed" name="the_champ_facebook[enable_fbfeed]" type="checkbox" <?php echo isset($theChampFacebookOptions['enable_fbfeed']) ? 'checked = "checked"' : '';?> value="1" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_enable_help_cont">
									<td colspan="2">
									<div>
									<?php _e('If enabled, a post will be published on the timeline of the user logging in', 'Super-Socializer') ?>
									</div>
									<img src="<?php echo plugins_url('../images/snaps/feed_enable.png', __FILE__); ?>" />
									</td>
								</tr>
							</table>
							</div>
						</div>
						
						<div class="stuffbox">
							<h3><label><?php _e('Facebook Feed Options', 'Super-Socializer');?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<th>
									<img id="the_champ_fb_feed_message_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_message"><?php _e('Message', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<textarea rows="4" cols="40" id="the_champ_fbfeed_message" name="the_champ_facebook[feedMessage]"><?php echo isset($theChampFacebookOptions['feedMessage']) ? $theChampFacebookOptions['feedMessage'] : '' ?></textarea>
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_message_help_cont">
									<td colspan="2">
									<div>
									<?php _e('Message for the feed post. %website-name% will be replaced with your website name in actual message.', 'Super-Socializer') ?>
									</div>
									<img src="<?php echo plugins_url('../images/snaps/feed_message.png', __FILE__); ?>" />
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_feed_link_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_link"><?php _e('Link (required)', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbfeed_link" name="the_champ_facebook[feed_link]" type="text" value="<?php echo isset($theChampFacebookOptions['feed_link']) ? $theChampFacebookOptions['feed_link'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_link_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The link attached to this feed (required parameter for this functionality to work)', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_feed_picture_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_picture"><?php _e('Picture', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbfeed_picture" name="the_champ_facebook[feedPicture]" type="text" value="<?php echo isset($theChampFacebookOptions['feedPicture']) ? $theChampFacebookOptions['feedPicture'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_picture_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The URL of a picture attached to this post. The picture must be at least 200px by 200px. (if this url is not specified, image from the url specified in Link parameter will be displayed in the post)', 'Super-Socializer') ?>
									</div>
									<img src="<?php echo plugins_url('../images/snaps/feed_picture.png', __FILE__); ?>" />
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_feed_source_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_source"><?php _e('Source', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbfeed_source" name="the_champ_facebook[feedSource]" type="text" value="<?php echo isset($theChampFacebookOptions['feedSource']) ? $theChampFacebookOptions['feedSource'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_source_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The URL of a media file (either SWF or MP3) attached to this post. If SWF, you must also specify picture (in "Picture" parameter) to provide a thumbnail for the video.', 'Super-Socializer') ?>
									</div>
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_feed_name_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_name"><?php _e('Name', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbfeed_name" name="the_champ_facebook[feed_name]" type="text" value="<?php echo isset($theChampFacebookOptions['feed_name']) ? $theChampFacebookOptions['feed_name'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_name_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The name of the link attachment', 'Super-Socializer') ?>
									</div>
									<img src="<?php echo plugins_url('../images/snaps/feed_name.png', __FILE__); ?>" />
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_feed_caption_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_caption"><?php _e('Caption', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<input id="the_champ_fbfeed_caption" name="the_champ_facebook[feed_caption]" type="text" value="<?php echo isset($theChampFacebookOptions['feed_caption']) ? $theChampFacebookOptions['feed_caption'] : '' ?>" />
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_caption_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The caption of the link (appears beneath the link name). If not specified, this field is automatically populated with the URL of the link.', 'Super-Socializer') ?>
									</div>
									<img src="<?php echo plugins_url('../images/snaps/feed_caption.png', __FILE__); ?>" />
									</td>
								</tr>
								
								<tr>
									<th>
									<img id="the_champ_fb_feed_desc_help" class="the_champ_help_bubble" src="<?php echo plugins_url('../images/info.png', __FILE__) ?>" />
									<label for="the_champ_fbfeed_description"><?php _e('Description', 'Super-Socializer'); ?></label>
									</th>
									<td>
									<textarea rows="4" cols="40" id="the_champ_fbfeed_description" name="the_champ_facebook[feed_description]"><?php echo isset($theChampFacebookOptions['feed_description']) ? $theChampFacebookOptions['feed_description'] : '' ?></textarea>
									</td>
								</tr>
								
								<tr class="the_champ_help_content" id="the_champ_fb_feed_desc_help_cont">
									<td colspan="2">
									<div>
									<?php _e('The description of the link (appears beneath the link caption). If not specified, this field is automatically populated by information scraped from the link, typically the title of the page.', 'Super-Socializer') ?>
									</div>
									<img src="<?php echo plugins_url('../images/snaps/feed_description.png', __FILE__); ?>" />
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
							<h3><label><?php _e('Shortcode', 'Super-Socializer');?></label></h3>
							<div class="inside">
								<p><?php _e('You can use <strong>[TheChamp-FB-Comments]</strong> Shortcode in the content of required page/post where you want to display Facebook Commenting interface.', 'Super-Socializer') ?></p>
								<p><?php _e('Example', 'Super-Socializer') ?></p>
								<p><strong>[TheChamp-FB-Comments]</strong></p>
								<p><?php _e('You can use following attributes in the Shortcode', 'Super-Socializer') ?></p>
								<strong style="font-size: 16px">Style</strong>
								<p><?php _e('Use <strong>style</strong> attribute to style the rendered commenting interface', 'Super-Socializer') ?></p>
								<p><?php _e('Example', 'Super-Socializer') ?></p>
								<p><strong>[TheChamp-FB-Comments style="background-color:#000;"]</strong></p>
								
								<strong style="font-size: 16px">url</strong>
								<p><?php _e('Use <strong>url</strong> attribute to specify the target url for comments. This defaults  to the page where shortcode is used.', 'Super-Socializer') ?></p>
								<p><?php _e('Example', 'Super-Socializer') ?></p>
								<p><strong>[TheChamp-FB-Comments url="http://mywebsite.com/page2"]</strong></p>
								
								<strong style="font-size: 16px"><?php _e('num_posts', 'Super-Socializer') ?></strong>
								<p><?php _e('Use <strong>num_posts</strong> attribute to specify the number of comments to display.', 'Super-Socializer') ?></p>
								<p><?php _e('Example', 'Super-Socializer') ?></p>
								<p><strong>[TheChamp-FB-Comments num_posts="5"]</strong></p>
								
								<strong style="font-size: 16px"><?php _e('width', 'Super-Socializer') ?></strong>
								<p><?php _e('Use <strong>width</strong> attribute to specify the width of commenting interface. Omit it for fluid width', 'Super-Socializer') ?></p>
								<p><?php _e('Example', 'Super-Socializer') ?></p>
								<p><strong>[TheChamp-FB-Comments width="200"]</strong></p>
								<p><?php _e('You can use shortcode in PHP file as following', 'Super-Socializer') ?></p>
								<p><strong>&lt;?php echo do_shortcode('SHORTCODE') ?&gt;</strong></p>
								<p><?php _e('Replace <strong>SHORTCODE</strong> in above code with the required shortcode like <strong>[TheChamp-FB-Comments style="background-color:#000;"]</strong>, so the final code looks like following', 'Super-Socializer') ?></p>
								<p><strong>&lt;?php echo do_shortcode('[TheChamp-FB-Comments style="background-color:#000;"]') ?&gt;</strong></p>
							</div>
						</div>
						</div>
						<?php include 'help.php'; ?>
					</div>
					
					<div class="menu_containt_div" id="tabs-4">
						<div class="the_champ_left_column">
						<div class="stuffbox">
							<h3><label><?php _e('How can I disable FB comments at individual page/post?', 'Super-Socializer') ?></label></h3>
							<div class="inside">
							<table width="100%" border="0" cellspacing="0" cellpadding="0" class="form-table editcomment menu_content_table">
								<tr>
									<td><?php _e('Edit that page/post and check the option "Disable Facebook Comments on this post/page" at the bottom in "Super Socializer" section', 'Super-Socializer') ?></td>
								</tr>
							</table>
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