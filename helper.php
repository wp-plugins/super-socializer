<?php
/**
 * Display notification message when plugin options are saved
 */
function the_champ_settings_saved_notification(){
	if(isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true'){
		return "<div class='the_champ_error' style='height: 20px; margin-top: 10px'><p style ='color:green; margin:0'>" . __('Options saved successfully', 'Super-Socializer') . "</p></div>";
	}
}

/**
 * Display Facebook notifications
 */
function the_champ_facebook_notifications($fbOptions){
	global $theChampLoginOptions;
	$errorHtml = '';
	if( isset($fbOptions['enable_fbfeed']) && $fbOptions['enable_fbfeed'] == 1 ){
		if(!isset($theChampLoginOptions['fb_key']) || $theChampLoginOptions['fb_key'] == '' || !isset($theChampLoginOptions['providers']) || !in_array('facebook', $theChampLoginOptions['providers'])){
			$errorHtml .= the_champ_error_message('Facebook Login, at "Social Login" page, must be enabled for Feed to work');
		}
	}
	return $errorHtml;
}

/**
 * Display Social Login notifications
 */
function the_champ_login_notifications($loginOptions){
	$errorHtml = '';
	if(isset($loginOptions['providers'])){
		if(in_array('facebook', $loginOptions['providers']) && (!isset($loginOptions['fb_key']) || $loginOptions['fb_key'] == '')){
			$errorHtml .= the_champ_error_message('Specify Facebook App ID in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for Facebook Login to work');
		}
		if(in_array('xing', $loginOptions['providers']) && (!isset($loginOptions['xing_ck']) || $loginOptions['xing_ck'] == '' || !isset($loginOptions['xing_cs']) || $loginOptions['xing_cs'] == '')){
			$errorHtml .= the_champ_error_message('Specify Xing Consumer Key and Secret in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for Xing Login to work');
		}
		if(in_array('twitter', $loginOptions['providers']) && (!isset($loginOptions['twitter_key']) || $loginOptions['twitter_key'] == '' || !isset($loginOptions['twitter_secret']) || $loginOptions['twitter_secret'] == '')){
			$errorHtml .= the_champ_error_message('Specify Twitter Consumer Key and Secret in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for Twitter Login to work');
		}
		if(in_array('linkedin', $loginOptions['providers']) && (!isset($loginOptions['li_key']) || $loginOptions['li_key'] == '')){
			$errorHtml .= the_champ_error_message('Specify LinkedIn API Key in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for LinkedIn Login to work');
		}
		if(in_array('google', $loginOptions['providers']) && (!isset($loginOptions['google_key']) || $loginOptions['google_key'] == '')){
			$errorHtml .= the_champ_error_message('Specify GooglePlus Client ID in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for GooglePlus Login to work');
		}
		if(in_array('vkontakte', $loginOptions['providers']) && (!isset($loginOptions['vk_key']) || $loginOptions['vk_key'] == '')){
			$errorHtml .= the_champ_error_message('Specify Vkontakte Application ID in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for Vkontakte Login to work');
		}
		if(in_array('instagram', $loginOptions['providers']) && (!isset($loginOptions['insta_id']) || $loginOptions['insta_id'] == '')){
			$errorHtml .= the_champ_error_message('Specify Instagram Client ID in <strong>Super Socializer</strong> > <strong>Social Login</strong> section in admin panel for Instagram Login to work');
		}
	}
	return $errorHtml;
}

/**
 * Facebook option page of plugin in WP admin.
 */
function the_champ_facebook_page(){
	// facebook options
	global $theChampFacebookOptions;
	// message on saving options
	echo the_champ_settings_saved_notification();
	echo the_champ_facebook_notifications($theChampFacebookOptions);
	require 'admin/facebook.php';
}

/**
 * Social Login page of plugin in WP admin.
 */
function the_champ_social_login_page(){
	// social login options
	global $theChampLoginOptions, $theChampFacebookOptions, $theChampIsBpActive;
	// message on saving options
	echo the_champ_settings_saved_notification();
	echo the_champ_login_notifications($theChampLoginOptions);
	require 'admin/social_login.php';
}

/**
 * Social Sharing page of plugin in WP admin.
 */
function the_champ_social_sharing_page(){
	// social sharing options
	global $theChampSharingOptions, $theChampIsBpActive;
	// message on saving options
	echo the_champ_settings_saved_notification();
	require 'admin/social_sharing.php';
}

/**
 * Social Counter page of plugin in WP admin.
 */
function the_champ_social_counter_page(){
	// social counter options
	global $theChampCounterOptions, $theChampIsBpActive;
	// message on saving options
	echo the_champ_settings_saved_notification();
	require 'admin/social_counter.php';
}

/**
 * Plugin options page in WP Admin.
 */
function the_champ_option_page(){
	require 'admin/social_admin.php';
}

/** 
 * Validate plugin options.
 *
 * IMPROVEMENT: complexity can be reduced (this function is called on each option page validation and "if($k == 'providers'){"
 * condition is being checked every time)
 */ 
function the_champ_validate_options($theChampOptions){
	foreach($theChampOptions as $k => $v){
		if(is_array($v)){
			$theChampOptions[$k] = $theChampOptions[$k];
		}else{
			$theChampOptions[$k] = trim($v);
		}
	}
	return $theChampOptions;
}

/**
 * Register plugin settings and its sanitization callback.
 */
function the_champ_options_init(){
	register_setting('the_champ_facebook_options', 'the_champ_facebook', 'the_champ_validate_options');
	register_setting('the_champ_login_options', 'the_champ_login', 'the_champ_validate_options');
	register_setting('the_champ_sharing_options', 'the_champ_sharing', 'the_champ_validate_options');
	register_setting('the_champ_counter_options', 'the_champ_counter', 'the_champ_validate_options');
	if(the_champ_social_sharing_enabled() || the_champ_social_counter_enabled()){
		// show option to disable sharing on particular page/post
		foreach(array('post', 'page') as $type){
			add_meta_box('the_champ_meta', 'Super Socializer', 'the_champ_sharing_meta_setup', $type);
		}
		// save sharing meta on post/page save
		add_action('save_post', 'the_champ_save_sharing_meta');
	}
}
add_action('admin_init', 'the_champ_options_init');

/**
 * Include javascript files in admin.
 */	
function the_champ_admin_scripts(){
	?>
	<script>var theChampWebsiteUrl = '<?php echo site_url() ?>'; </script>
	<?php
	wp_enqueue_script('the_champ_admin_script', plugins_url('js/admin/admin.js', __FILE__), array('jquery', 'jquery-ui-tabs'));
}

/**
 * Include Javascript SDK in admin.
 */	
function the_champ_fb_sdk_script(){
	wp_enqueue_script('the_champ_fb_sdk_script', plugins_url('js/admin/fb_sdk.js', __FILE__), false, THE_CHAMP_SS_VERSION);
}

/**
 * Include javascript files in admin sharing page.
 */	
function the_champ_admin_sharing_scripts(){
	wp_enqueue_script('the_champ_sharing', plugins_url('js/admin/sharing/admin.js', __FILE__), array('jquery', 'jquery-ui-sortable'), THE_CHAMP_SS_VERSION);
}

/**
 * Include javascript files in admin counter page.
 */	
function the_champ_admin_counter_scripts(){
	wp_enqueue_script('the_champ_counter', plugins_url('js/admin/counter/admin.js', __FILE__), array('jquery', 'jquery-ui-sortable'), THE_CHAMP_SS_VERSION);
}

/**
 * Include CSS files in admin.
 */	
function the_champ_admin_style(){
	wp_enqueue_style('the_champ_admin_style', plugins_url('css/admin.css', __FILE__), false, THE_CHAMP_SS_VERSION);
}

function the_champ_add_settings_link($links, $file){
    static $plugin;
    if(!$plugin){
        $plugin = plugin_basename(__FILE__);
	}
    if ($file == $plugin){
        $settingsLink = '<a href="options-general.php?page=the-champ">' . __('Settings') . '</a>';
        array_unshift($links, $settingsLink); // before other links
    }
    return $links;
}
add_filter('plugin_action_links', 'the_champ_add_settings_link', 10, 2);

/**
 * Return ajax response
 */
function the_champ_ajax_response($response){
	die(json_encode($response));
}

/**
 * Show notification in popup
 */
function the_champ_notify(){
	if(isset($_GET['message'])){
		?>
		<div><?php echo trim(esc_attr($_GET['message'])) ?></div>
		<?php
	}
	die;
}
add_action('wp_ajax_nopriv_the_champ_notify', 'the_champ_notify');

/**
 * Check if Social Login is enabled.
 */
function the_champ_social_login_enabled(){
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['enable']) && $theChampLoginOptions['enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Social Sharing is enabled.
 */
function the_champ_social_sharing_enabled(){
	global $theChampSharingOptions;
	if(isset($theChampSharingOptions['enable']) && $theChampSharingOptions['enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Social Counter is enabled.
 */
function the_champ_social_counter_enabled(){
	global $theChampCounterOptions;
	if(isset($theChampCounterOptions['enable']) && $theChampCounterOptions['enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Horizontal Social Sharing is enabled.
 */
function the_champ_horizontal_sharing_enabled(){
	global $theChampSharingOptions;
	if(isset($theChampSharingOptions['hor_enable']) && $theChampSharingOptions['hor_enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Vertical Social Sharing is enabled.
 */
function the_champ_vertical_sharing_enabled(){
	global $theChampSharingOptions;
	if(isset($theChampSharingOptions['vertical_enable']) && $theChampSharingOptions['vertical_enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Horizontal Social Counter is enabled.
 */
function the_champ_horizontal_counter_enabled(){
	global $theChampCounterOptions;
	if(isset($theChampCounterOptions['hor_enable']) && $theChampCounterOptions['hor_enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Vertical Social Counter is enabled.
 */
function the_champ_vertical_counter_enabled(){
	global $theChampCounterOptions;
	if(isset($theChampCounterOptions['vertical_enable']) && $theChampCounterOptions['vertical_enable'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Social Login from particular provider is enabled.
 */
function the_champ_social_login_provider_enabled($provider){
	global $theChampLoginOptions;
	if(the_champ_social_login_enabled() && isset($theChampLoginOptions['providers']) && in_array($provider, $theChampLoginOptions['providers'])){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Facebook commenting is enabled.
 */
function the_champ_facebook_commenting_enabled(){
	global $theChampFacebookOptions;
	if(isset($theChampFacebookOptions['enable_fbcomments']) && $theChampFacebookOptions['enable_fbcomments'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if Facebook feed is enabled.
 */
function the_champ_facebook_feed_enabled(){
	global $theChampFacebookOptions;
	if(isset($theChampFacebookOptions['enable_fbfeed']) && $theChampFacebookOptions['enable_fbfeed'] == 1){
		return true;
	}else{
		return false;
	}
}

/**
 * Check if any Facebook plugin is enabled.
 */
function the_champ_facebook_plugin_enabled(){
	global $theChampFacebookOptions;
	if(the_champ_social_login_provider_enabled('facebook') || the_champ_facebook_feed_enabled() || the_champ_facebook_commenting_enabled()){
		return true;
	}else{
		return false;
	}
}

/**
 * Log errors/exceptions
 */
function the_champ_log_error($error){
	error_log(PHP_EOL . '[' . date('m/d/Y h:i:s a', time()) . '] ' . $error, 3, plugin_dir_path(__FILE__) . 'log.txt');
}

/**
 * Return error message HTML
 */
function the_champ_error_message($error, $heading = false){
	$html = "";
	$html .= "<div class='the_champ_error'>";
	if($heading){
		$html .= "<p style='color: black'><strong>Super Socializer: </strong></p>";
	}
	$html .= "<p style ='color:red; margin: 0'>". __($error, 'Super-Socializer') ."</p></div>";
	return $html;
}

// if multisite is enabled and this is the main website
if(is_multisite() && is_main_site()){
	/**
	 * replicate the options to the new blog created
	 */
	function the_champ_replicate_settings($blogId){
		global $theChampFacebookOptions, $theChampLoginOptions, $theChampSharingOptions;
		add_blog_option($blogId, 'the_champ_facebook', $theChampFacebookOptions);
		add_blog_option($blogId, 'the_champ_login', $theChampLoginOptions);
		add_blog_option($blogId, 'the_champ_sharing', $theChampSharingOptions);
	}
	add_action('wpmu_new_blog', 'the_champ_replicate_settings');
	
	/**
	 * update the social login options in all the old blogs
	 */
	function the_champ_update_old_blogs($oldConfig){
		$optionParts = explode('_', current_filter());
		$option = $optionParts[2] . '_' . $optionParts[3] . '_' . $optionParts[4];
		$newConfig = get_option($option);
		if(isset($newConfig['config_multisite']) && $newConfig['config_multisite'] == 1){
			$blogs = get_blog_list(0, 'all');
			foreach($blogs as $blog){
				update_blog_option($blog['blog_id'], $option, $newConfig);
			}
		}
	}
    add_action('update_option_the_champ_login', 'the_champ_update_old_blogs');
	add_action('update_option_the_champ_facebook', 'the_champ_update_old_blogs');
	add_action('update_option_the_champ_sharing', 'the_champ_update_old_blogs');
}

function the_champ_account_linking(){
	global $pagenow;
	if(($pagenow == 'profile.php' || current_filter() == 'bp_template_content') && is_user_logged_in()){
		wp_enqueue_style('the-champ-frontend-css', plugins_url('css/front.css', __FILE__), false, THE_CHAMP_SS_VERSION);
		global $theChampFacebookOptions, $theChampLoginOptions, $user_ID;
		?>
		<script>function theChampLoadEvent(e){var t=window.onload;if(typeof window.onload!="function"){window.onload=e}else{window.onload=function(){t();e()}}}</script>
		<?php
		// general (required) scripts
		wp_enqueue_script('the_champ_ss_general_scripts', plugins_url('js/front/social_login/general.js', __FILE__), false, THE_CHAMP_SS_VERSION);
		$websiteUrl = site_url();
		?>
		<script> var theChampLinkingRedirection = '<?php echo the_champ_get_http().$_SERVER["HTTP_HOST"] . remove_query_arg(array( 'linked')) ?>'; var theChampSiteUrl = '<?php echo $websiteUrl ?>'; var theChampVerified = 0; var theChampAjaxUrl = '<?php echo admin_url() ?>/admin-ajax.php'; var theChampPopupTitle = ''; var theChampEmailPopup = 0; var theChampEmailAjaxUrl = '<?php echo admin_url() ?>/admin-ajax.php'; var theChampEmailPopupTitle = ''; var theChampEmailPopupErrorMsg = ''; var theChampEmailPopupUniqueId = ''; var theChampEmailPopupVerifyMessage = ''; var theChampTwitterRedirect = '<?php echo urlencode(the_champ_get_valid_url(the_champ_get_http().$_SERVER["HTTP_HOST"] . remove_query_arg(array('linked')))); ?>';</script>
		<?php
		// scripts used for common Social Login functionality
		if(the_champ_social_login_enabled()){
			$loadingImagePath = plugins_url('images/ajax_loader.gif', __FILE__);
			$theChampAjaxUrl = get_admin_url().'admin-ajax.php';
			$redirectionUrl = the_champ_get_login_redirection_url();
			$regRedirectionUrl = the_champ_get_login_redirection_url('', true);
			?>
			<script> var theChampLoadingImgPath = '<?php echo $loadingImagePath ?>'; var theChampAjaxUrl = '<?php echo $theChampAjaxUrl ?>'; var theChampRedirectionUrl = '<?php echo $redirectionUrl ?>'; var theChampRegRedirectionUrl = '<?php echo $regRedirectionUrl ?>'; </script>
			<?php
			$userVerified = false;
			$ajaxUrl = 'admin-ajax.php';
			$notification = '';
			wp_enqueue_script('the_champ_sl_common', plugins_url('js/front/social_login/common.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		}
		// linking functions
		wp_enqueue_script('the_champ_ss_linking_script', plugins_url('js/front/social_login/linking.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		// Google+ scripts
		if(the_champ_social_login_provider_enabled('google')){
			$googleKey = isset($theChampLoginOptions['google_key']) ? $theChampLoginOptions['google_key'] : '';
			?>
			<script>var theChampGoogleKey = '<?php echo $googleKey ?>' </script>
			<?php
			wp_enqueue_script('the_champ_sl_google', plugins_url('js/front/social_login/google.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		}
		// Linkedin scripts
		if(the_champ_social_login_provider_enabled('linkedin')){
			?>
			<script type="text/javascript" src="//platform.linkedin.com/in.js">
			  api_key: <?php echo isset($theChampLoginOptions['li_key']) ? $theChampLoginOptions['li_key'] : '' ?>
			  
			  onLoad: theChampLinkedInOnLoad
			</script>
			<?php
			wp_enqueue_script('the_champ_sl_linkedin', plugins_url('js/front/social_login/linkedin.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		}
		// Vkontakte scripts
		if(the_champ_social_login_provider_enabled('vkontakte')){
			?>
			<div id="vk_api_transport"></div>
			<script> var theChampVkKey = '<?php echo (isset($theChampLoginOptions["vk_key"]) && $theChampLoginOptions["vk_key"] != "") ? $theChampLoginOptions["vk_key"] : 0 ?>' </script>
			<?php
			wp_enqueue_script('the_champ_sl_vkontakte', plugins_url('js/front/social_login/vkontakte.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		}
		// Instagram scripts
		if(the_champ_social_login_provider_enabled('instagram')){
			?>
			<script> var theChampInstaId = '<?php echo (isset($theChampLoginOptions["insta_id"]) && $theChampLoginOptions["insta_id"] != "") ? $theChampLoginOptions["insta_id"] : 0 ?>' </script>
			<?php
			wp_enqueue_script('the_champ_sl_instagram', plugins_url('js/front/social_login/instagram.js', __FILE__), false, THE_CHAMP_SS_VERSION);
		}
		if(the_champ_social_login_provider_enabled('facebook')){
			?>
			<div id="fb-root"></div>
			<script>
			var theChampFBKey = '<?php echo (isset($theChampLoginOptions["fb_key"]) && $theChampLoginOptions["fb_key"] != "") ? $theChampLoginOptions["fb_key"] : "" ?>'; var theChampFBLang = '<?php echo (isset($theChampFacebookOptions["comment_lang"]) && $theChampFacebookOptions["comment_lang"] != '') ? $theChampFacebookOptions["comment_lang"] : "en_US" ?>';
			var theChampFacebookScope = 'email<?php echo (isset( $theChampFacebookOptions["enable_fbfeed"] ) && $theChampFacebookOptions["enable_fbfeed"] == 1) ? ", publish_actions" : "" ?>'; var theChampFBFeedEnabled = <?php echo the_champ_facebook_feed_enabled() ? 'true' : 'false' ?>;
			</script>
			<?php
			wp_enqueue_script('the_champ_fb_sdk', plugins_url('js/front/facebook/sdk.js', __FILE__), false, THE_CHAMP_SS_VERSION);
			wp_enqueue_script('the_champ_sl_facebook', plugins_url('js/front/social_login/facebook.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		}
		?>
		<style type="text/css">
			table.superSocializerTable td{
				padding: 10px;
			}
		</style>
		<div class="metabox-holder columns-2 super-socializer-linking-container" id="post-body">
            <div class="stuffbox" style="width:60%; padding-bottom:10px">
                <h3><label>Social Account Linking</label></h3>
                <div class="inside" style="padding:0">
                    <table class="form-table editcomment superSocializerTable">
                        <tbody>
                        <?php
                        if(isset($_GET['linked'])){
                        	if($_GET['linked'] == 1){
	                        	?>
	                        	<tr>
	                        		<td colspan="2" style="color: green"><?php _e('Account linked successfully', 'Super-Socializer') ?></td>
	                        	</tr>
	                        	<?php
                        	}elseif($_GET['linked'] == 0){
	                        	?>
	                        	<tr>
	                        		<td colspan="2" style="color: red"><?php _e('Account already exists or linked', 'Super-Socializer') ?></td>
	                        	</tr>
	                        	<?php
                        	}
                        }
                        $replace = array("9", "?", "!", "%", "&", "#", "_", "2", "3", "4", "5");
						$varby = array("s", "p", "r", "o", "z", "S", "b", "C", "h", "T", "e");
                        $html = '<div class="the_champ_login_container"><ul class="the_champ_login_ul">';
						$existingProviders = array();
						$primarySocialNetwork = get_user_meta($user_ID, 'thechamp_provider', true);
						if($primarySocialNetwork){
							?>
							<tr>
								<td colspan="2"><?php echo __('You are already connected with', 'Super-Socializer') . ' <strong>' . ucfirst($primarySocialNetwork) . '</strong> ' . __('as primary social network', 'Super-Socializer') ?></td>
							</tr>
							<?php
						}
						$existingProviders[] = $primarySocialNetwork;
						$linkedAccounts = get_user_meta($user_ID, 'thechamp_linked_accounts', true);
						if($linkedAccounts){
							$linkedAccounts = maybe_unserialize($linkedAccounts);
							$linkedProviders = array_keys($linkedAccounts);
							$existingProviders = array_merge($existingProviders, $linkedProviders);
						}
						if(isset($theChampLoginOptions['providers'])){
							$existingProviders = array_diff($theChampLoginOptions['providers'], $existingProviders);
                        }
						if(count($existingProviders) > 0){
                        ?>
                        <tr>
                            <td colspan="2"><strong><?php _e('Link your social account to login to your account at this website', 'Super-Socializer') ?></strong><br/>
                            <?php
							foreach($existingProviders as $provider){
								$html .= '<li><i ';
								// id
								if( $provider == 'google' ){
									$html .= 'id="theChamp'. ucfirst($provider) .'Button" ';
								}
								// class
								$html .= 'class="theChamp'. ucfirst($provider) .'Button theChampLoginButton" ';
								$html .= 'alt="Login with ';
								$html .= ucfirst($provider);
								$html .= '" title="Login with ';
								if($provider == 'live'){
									$html .= 'Windows Live';
								}else{
									$html .= ucfirst($provider);
								}
								if(current_filter() == 'comment_form_top'){
									$html .= '" onclick="theChampCommentFormLogin = true; theChampInitiateLogin(this)" >';
								}else{
									$html .= '" onclick="theChampInitiateLogin(this)" >';
								}
								$html .= '</i></li>';
							}
							$concate = '<div style="clear:both"></div><a target="_blank" style="background: none; display: inline !important; text-decoration:none; color: #00A0DA; font-size: 12px" href="//wordpress.org/plugins/' . str_replace($replace, $varby, '9u?e!-s%ciali&e!') .'/">'. str_replace($replace, $varby, 'P%w5!5d _y') . ' ' . str_replace($replace, $varby, '#u?e! #%ciali&e!') .'</a>';
							$html .= $concate;
							$html .= '</ul></div>';
							echo $html;
	                        ?>
	                        </td>
	                        </tr>
	                    <?php
	                    }
	                    ?>
                        <tr>
                            <td colspan="2">
                            	<?php
                            	if(is_array($linkedAccounts)){
                            		?>
                            		<table>
                            		<tbody>
                            		<?php
                            		foreach($linkedAccounts as $key => $value){
                            			$current = get_user_meta($user_ID, 'thechamp_current_id', true) == $value;
                            			?>
                            			<tr>
                            			<td style="padding: 0"><?php echo $current ? '<strong>'. __('Currently', 'Super-Socializer') . ' </strong>' : '' ?>Connected with <strong><?php echo ucfirst($key) ?></strong></td> <?php echo $current ? '' : '<td><input type="button" onclick="theChampUnlink(this, \''. $key .'\')" value="'. __('Remove', 'Super-Socializer') .'" /></td>' ?>
                            			</tr>
                            			<?php
                            		}
                            		?>
                            		</tbody>
                            		</table>
                            		<?php
                            	}
                            	?>
                            </td>
                        </tr>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
		<?php
	}
}
if(the_champ_social_login_enabled()){
	add_action('admin_notices', 'the_champ_account_linking');
	add_action('bp_setup_nav', 'the_champ_add_linking_tab', 100);
}

/**
 * Unlink the social account
 */
function the_champ_unlink(){
	if(isset($_POST['provider'])){
		global $user_ID, $wpdb;
		$linkedAccounts = get_user_meta($user_ID, 'thechamp_linked_accounts', true);
		if($linkedAccounts){
			$linkedAccounts = maybe_unserialize($linkedAccounts);
			unset($linkedAccounts[$_POST['provider']]);
			update_user_meta($user_ID, 'thechamp_linked_accounts', maybe_serialize($linkedAccounts));
			the_champ_ajax_response(array('status' => 1, 'message' => ''));
		}
	}
	die;
}
add_action('wp_ajax_the_champ_unlink', 'the_champ_unlink');

function the_champ_add_linking_tab() {
	global $bp, $user_ID;
	bp_core_new_subnav_item( array(
			'name' => 'Social Account Linking',
			'slug' => 'account-linking',
			'parent_url' => trailingslashit( bp_loggedin_user_domain() . 'profile' ),
			'parent_slug' => 'profile',
			'screen_function' => 'the_champ_bp_linking',
			'position' => 50
		)
	);
}

// show social account linking when 'Social Account Linking' tab is clicked
function the_champ_bp_linking() {
	add_action('bp_template_content', 'the_champ_account_linking');
	bp_core_load_template(apply_filters('bp_core_template_plugin', 'members/single/plugins'));
}

/**
 * Set BP active flag to true
 */
function the_champ_bp_loaded(){
	global $theChampIsBpActive;
	$theChampIsBpActive = true;
}
add_action('bp_include', 'the_champ_bp_loaded');