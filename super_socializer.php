<?php
/*
Plugin Name: Super Socializer
Plugin URI: http://super-socializer-wordpress.pyrovolt.com
Description: A complete 360 degree solution to provide all the social features like Social Login, Social Commenting, Social Sharing, Social Feed and more.
Version: 4.0.1
Author: The Champ
Author URI: http://thechamplord.wordpress.com
License: GPL2+
*/
defined('ABSPATH') or die("Cheating........Uh!!");
define('THE_CHAMP_SS_VERSION', '4.0.1');

$theChampLoginOptions = get_option('the_champ_login');
if(isset($theChampLoginOptions['providers']) && in_array('twitter', $theChampLoginOptions['providers'])){
	require 'library/twitteroauth.php';
}
if(isset($theChampLoginOptions['providers']) && in_array('xing', $theChampLoginOptions['providers'])){
	$theChampOauthConfigurationFile = plugins_url('library/oauth_configuration.json', __FILE__);
	require 'library/http.php';
	require 'library/oauth_client.php';
}

$theChampFacebookOptions = get_option('the_champ_facebook');
$theChampSharingOptions = get_option('the_champ_sharing');
$theChampCounterOptions = get_option('the_champ_counter');
$theChampIsBpActive = false;

require 'helper.php';
// include social login functions
require 'inc/social_login.php';

// include social sharing functions
if(the_champ_social_sharing_enabled() || the_champ_social_counter_enabled()){
	require 'inc/social_sharing.php';
}
//include widget class
require 'inc/widget.php';
//include shortcode
require 'inc/shortcode.php';

/**
 * Hook the plugin function on 'init' event.
 */
function the_champ_init(){
	if(get_option('the_champ_ss_version') != THE_CHAMP_SS_VERSION){
		update_option('the_champ_ss_version', THE_CHAMP_SS_VERSION);
	}
	add_action('wp_enqueue_scripts', 'the_champ_load_event');
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['footer_script']) && $theChampLoginOptions['footer_script'] == 1){
		add_action('wp_footer', 'the_champ_frontend_scripts');
		add_action('login_footer', 'the_champ_frontend_scripts');
	}else{
		add_action('wp_enqueue_scripts', 'the_champ_frontend_scripts');
	}
	add_action('wp_enqueue_scripts', 'the_champ_frontend_styles');
	add_action('login_head', 'wp_enqueue_scripts', 1);
	add_action('parse_request', 'the_champ_connect');
	load_plugin_textdomain( 'Super-Socializer', false, dirname(plugin_basename(__FILE__)).'/languages/' );
}
add_action('init', 'the_champ_init');

function the_champ_load_event(){
	?>
	<script>function theChampLoadEvent(e){var t=window.onload;if(typeof window.onload!="function"){window.onload=e}else{window.onload=function(){t();e()}}}</script>
	<?php
}

/**
 * Check querystring variables
 */
function the_champ_connect(){
	global $theChampLoginOptions;
	// verify email
	if(isset($_GET['SuperSocializerKey']) && ($verificationKey = trim(esc_attr($_GET['SuperSocializerKey']))) != ''){
		$users = get_users('meta_key=thechamp_key&meta_value='.$verificationKey);
		if(count($users) > 0 && isset($users[0] -> ID)){
			delete_user_meta($users[0] -> ID, 'thechamp_key');
			// update password and send email
			$password = wp_generate_password();
			wp_update_user(array('ID' => $users[0] -> ID, 'user_pass' => $password));
			the_champ_password_email($users[0] -> ID, $password);
			wp_redirect(site_url().'?SuperSocializerVerified=1');
			die;
		}
	}
	
	// Instagram auth
	if(isset($_GET['SuperSocializerInstaToken']) && $_GET['SuperSocializerInstaToken'] != ''){
		$instaAuthUrl = 'https://api.instagram.com/v1/users/self?access_token=' . trim(esc_attr($_GET['SuperSocializerInstaToken']));
		$response = wp_remote_get( $instaAuthUrl,  array( 'timeout' => 15 ) );
		if( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && 200 === $response['response']['code'] ){
			$body = json_decode(wp_remote_retrieve_body( $response ));
			if(is_object($body -> data) && isset($body -> data) && isset($body -> data -> id)){
				$redirection = isset($_GET['super_socializer_redirect_to']) && $_GET['super_socializer_redirect_to'] != '' ? esc_attr($_GET['super_socializer_redirect_to']) : '';
				$response = the_champ_user_auth($body -> data, 'instagram', $redirection);
				if(is_array($response) && isset($response['message']) && $response['message'] == 'register' && (!isset($response['url']) || $response['url'] == '')){
					$redirectTo = esc_attr(the_champ_get_login_redirection_url($redirection, true));
				}elseif(isset($response['message']) && $response['message'] == 'linked'){
					$redirectTo = $redirection . (strpos($redirection, '?') !== false ? '&' : '?') . 'linked=1';
				}elseif(isset($response['message']) && $response['message'] == 'not linked'){
					$redirectTo = $redirection . (strpos($redirection, '?') !== false ? '&' : '?') . 'linked=0';
				}elseif(isset($response['url']) && $response['url'] != ''){
					$redirectTo = $response['url'];
				}else{
					$redirectTo = esc_attr(the_champ_get_login_redirection_url($redirection));
				}
				the_champ_close_login_popup($redirectTo);
				//the_champ_close_login_popup(esc_attr(the_champ_get_login_redirection_url($redirection)));
			}
		}
	}
	
	// send request to Xing
	if(isset($_GET['SuperSocializerAuth']) && $_GET['SuperSocializerAuth'] == 'Xing'){
		session_start();
		if(!isset($_GET['oauth_token']) && isset($_SESSION['OAUTH_ACCESS_TOKEN'])){
			Unset($_SESSION['OAUTH_ACCESS_TOKEN']);
		}
		if(isset($theChampLoginOptions['xing_ck']) && $theChampLoginOptions['xing_ck'] != '' && isset($theChampLoginOptions['xing_cs']) && $theChampLoginOptions['xing_cs'] != ''){
			$xingClient = new oauth_client_class;
			$xingClient->debug = 0;
			$xingClient->debug_http = 1;
			$xingClient->server = 'XING';
			$xingClient->redirect_uri = site_url().'/index.php?SuperSocializerAuth=Xing&super_socializer_redirect_to=' . esc_attr($_GET['super_socializer_redirect_to']);
			$xingClient->client_id = $theChampLoginOptions['xing_ck'];
			$xingClient->client_secret = $theChampLoginOptions['xing_cs'];
			if(($success = $xingClient->Initialize())){
				if(($success = $xingClient->Process())){
					if(strlen($xingClient->access_token)){
						$success = $xingClient->CallAPI(
							'https://api.xing.com/v1/users/me', 
							'GET', array(), array('FailOnAccessError'=>true), $xingResponse);
					}
				}
				$success = $xingClient->Finalize($success);
			}
			if($xingClient->exit) die('exit');
			if($success){
				if(isset($xingResponse -> users) && is_array($xingResponse -> users) && isset($xingResponse -> users[0] -> id)){
					$xingRedirect = esc_attr($_GET['super_socializer_redirect_to']);
					$response = the_champ_user_auth($xingResponse -> users[0], 'xing', $xingRedirect);
					if(is_array($response) && isset($response['message']) && $response['message'] == 'register' && (!isset($response['url']) || $response['url'] == '')){
						$redirectTo = esc_attr(the_champ_get_login_redirection_url($xingRedirect, true));
					}elseif(isset($response['message']) && $response['message'] == 'linked'){
						$redirectTo = $xingRedirect . (strpos($xingRedirect, '?') !== false ? '&' : '?') . 'linked=1';
					}elseif(isset($response['message']) && $response['message'] == 'not linked'){
						$redirectTo = $xingRedirect . (strpos($xingRedirect, '?') !== false ? '&' : '?') . 'linked=0';
					}elseif(isset($response['url']) && $response['url'] != ''){
						$redirectTo = $response['url'];
					}else{
						$redirectTo = esc_attr(the_champ_get_login_redirection_url($xingRedirect));
					}
					the_champ_close_login_popup($redirectTo);
				}
			}else{
				echo 'Error:' . $xingClient->error;
				die;
			}
		}
	}
	
	// send request to twitter
	if(isset($_GET['SuperSocializerAuth']) && $_GET['SuperSocializerAuth'] == 'Twitter'){
		if(isset($theChampLoginOptions['twitter_key']) && $theChampLoginOptions['twitter_key'] != '' && isset($theChampLoginOptions['twitter_secret']) && $theChampLoginOptions['twitter_secret'] != ''){
			/* Build TwitterOAuth object with client credentials. */
			$connection = new TwitterOAuth($theChampLoginOptions['twitter_key'], $theChampLoginOptions['twitter_secret']);
			/* Get temporary credentials. */
			$requestToken = $connection->getRequestToken(site_url().'/index.php');
			if($connection->http_code == 200){
				// generate unique ID
				$uniqueId = mt_rand();
				// save oauth token and secret in db temporarily
				update_user_meta($uniqueId, 'thechamp_twitter_oauthtoken', $requestToken['oauth_token']);
				update_user_meta($uniqueId, 'thechamp_twitter_oauthtokensecret', $requestToken['oauth_token_secret']);
				if(isset($_GET['super_socializer_redirect_to']) && $_GET['super_socializer_redirect_to'] != ''){
					update_user_meta($uniqueId, 'thechamp_twitter_redirect', esc_attr($_GET['super_socializer_redirect_to']));
				}
				wp_redirect($connection->getAuthorizeURL($requestToken['oauth_token']));
				die;
			}else{
				?>
				<div style="width: 500px; margin: 0 auto">
					<ol>
					<li><?php echo sprintf(__('Enter exactly the following url in <strong>Website</strong> and <strong>Callback Url</strong> options in your Twitter app (see step 3 %s)', 'Super-Socializer'), '<a target="_blank" href="//thechamplord.wordpress.com/2014/01/28/getting-twitter-consumer-key-and-secret/">here</a>') ?><br/>
					<?php echo site_url() ?>
					</li>
					<li><?php _e('Make sure cURL is enabled at your website server. You may need to contact the server administrator of your website to verify this', 'Super-Socializer') ?></li>
					</ol>
				</div>
				<?php
				die;
			}
		}
	}
	// twitter authentication
	if(isset($_REQUEST['oauth_token'])){
		global $wpdb;
		$uniqueId = $wpdb->get_var($wpdb->prepare("SELECT user_id FROM $wpdb->usermeta WHERE meta_key = 'thechamp_twitter_oauthtoken' and meta_value = %s", $_REQUEST['oauth_token']));
		$oauthTokenSecret = get_user_meta($uniqueId, 'thechamp_twitter_oauthtokensecret', true);
		// twitter redirect url
		$twitterRedirectUrl = get_user_meta($uniqueId, 'thechamp_twitter_redirect', true);
		if(empty($uniqueId) || $oauthTokenSecret == ''){
			// invalid request
			wp_redirect(site_url());
			die;
		}
		$connection = new TwitterOAuth($theChampLoginOptions['twitter_key'], $theChampLoginOptions['twitter_secret'], $_REQUEST['oauth_token'], $oauthTokenSecret);
		/* Request access tokens from twitter */
		$accessToken = $connection->getAccessToken($_REQUEST['oauth_verifier']);
		/* Create a TwitterOauth object with consumer/user tokens. */
		$connection = new TwitterOAuth($theChampLoginOptions['twitter_key'], $theChampLoginOptions['twitter_secret'], $accessToken['oauth_token'], $accessToken['oauth_token_secret']);
		$content = $connection->get('account/verify_credentials');
		// delete temporary data
		delete_user_meta($uniqueId, 'thechamp_twitter_oauthtokensecret');
		delete_user_meta($uniqueId, 'thechamp_twitter_oauthtoken');
		delete_user_meta($uniqueId, 'thechamp_twitter_redirect');
		if(is_object($content) && isset($content -> id)){
			$response = the_champ_user_auth($content, 'twitter', $twitterRedirectUrl);
			if(is_array($response) && isset($response['message']) && $response['message'] == 'register' && (!isset($response['url']) || $response['url'] == '')){
				$redirectTo = esc_attr(the_champ_get_login_redirection_url($twitterRedirectUrl, true));
			}elseif(isset($response['message']) && $response['message'] == 'linked'){
				$redirectTo = $twitterRedirectUrl . (strpos($twitterRedirectUrl, '?') !== false ? '&' : '?') . 'linked=1';
			}elseif(isset($response['message']) && $response['message'] == 'not linked'){
				$redirectTo = $twitterRedirectUrl . (strpos($twitterRedirectUrl, '?') !== false ? '&' : '?') . 'linked=0';
			}elseif(isset($response['url']) && $response['url'] != ''){
				$redirectTo = $response['url'];
			}else{
				$redirectTo = esc_attr(the_champ_get_login_redirection_url($twitterRedirectUrl));
			}
			the_champ_close_login_popup($redirectTo);
		}
	}
}

function the_champ_close_login_popup($redirectionUrl){
	?>
	<script>
	if(window.opener){
		window.opener.location.href="<?php echo $redirectionUrl; ?>";
		window.close();
	}else{
		window.location.href="<?php echo $redirectionUrl; ?>";
	}
	</script>
	<?php
	die;
}

/**
 * Validate url
 */
function the_champ_validate_url($url){
	$expression = "/^(http:\/\/|https:\/\/|ftp:\/\/|ftps:\/\/|)?[a-z0-9_\-]+[a-z0-9_\-\.]+\.[a-z]{2,4}(\/+[a-z0-9_\.\-\/]*)?$/i";
    return (bool)preg_match($expression, $url);
}

/**
 * Get http/https protocol at the website
 */
function the_champ_get_http(){
	if(isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
		return "https://";
	}else{
		return "http://";
	}
}

/**
 * Return valid redirection url.
 */
function the_champ_get_valid_url($url){
	$url = urldecode($url);
	if($url == wp_login_url() || $url == site_url().'/wp-login.php?action=register' || $url == site_url().'/wp-login.php?loggedout=true'){ 
		$url = site_url().'/';
	}elseif(isset($_GET['redirect_to'])){
		if(urldecode($_GET['redirect_to']) == admin_url()){
			$url = site_url().'/';
		}elseif(the_champ_validate_url(urldecode($_GET['redirect_to'])) && (strpos(urldecode($_GET['redirect_to']), 'http://') !== false || strpos(urldecode($_GET['redirect_to']), 'https://') !== false)){
			$url = esc_attr($_GET['redirect_to']);
		}else{
			$url = site_url().'/';
		}
	}
	return $url;
}

/**
 * Return webpage url to redirect after login.
 */
function the_champ_get_login_redirection_url($twitterRedirect = '', $register = false){
	global $theChampLoginOptions, $user_ID;
	if($register){
		$option = 'register';
	}else{
		$option = 'login';
	}
	if(isset($theChampLoginOptions[$option.'_redirection'])){
		if($theChampLoginOptions[$option.'_redirection'] == 'same'){
			$http = the_champ_get_http();
			if($twitterRedirect != ''){
				$url = $twitterRedirect;
			}else{
				$url = $http.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			}
			return the_champ_get_valid_url($url);
		}elseif($theChampLoginOptions[$option.'_redirection'] == 'homepage'){
			return site_url();
		}elseif($theChampLoginOptions[$option.'_redirection'] == 'account'){
			return admin_url();
		}elseif($theChampLoginOptions[$option.'_redirection'] == 'custom' && $theChampLoginOptions[$option.'_redirection_url'] != ''){
			return $theChampLoginOptions[$option.'_redirection_url'];
		}elseif($theChampLoginOptions[$option.'_redirection'] == 'bp_profile' && $user_ID != 0){
			return bp_core_get_user_domain($user_ID);
		}else{
			return site_url();
		}
	}else{
		return site_url();
	}
}

/**
 * The javascript to loaded at front end.
 */
function the_champ_frontend_scripts(){
	global $theChampFacebookOptions, $theChampLoginOptions;
	// general (required) scripts
	wp_enqueue_script('the_champ_ss_general_scripts', plugins_url('js/front/social_login/general.js', __FILE__), false, THE_CHAMP_SS_VERSION);
	$websiteUrl = site_url();
	?>
	<script> var theChampSiteUrl = '<?php echo $websiteUrl ?>'; </script>
	<?php
	// scripts used for common Social Login functionality
	if(the_champ_social_login_enabled() && !is_user_logged_in()){
		$loadingImagePath = plugins_url('images/ajax_loader.gif', __FILE__);
		$theChampAjaxUrl = get_admin_url().'admin-ajax.php';
		$redirectionUrl = esc_attr(the_champ_get_login_redirection_url());
		$regRedirectionUrl = esc_attr(the_champ_get_login_redirection_url('', true));
		?>
		<script> var theChampLoadingImgPath = '<?php echo $loadingImagePath ?>'; var theChampAjaxUrl = '<?php echo $theChampAjaxUrl ?>'; var theChampRedirectionUrl = '<?php echo $redirectionUrl ?>'; var theChampRegRedirectionUrl = '<?php echo $regRedirectionUrl ?>'; </script>
		<?php
		$userVerified = false;
		$ajaxUrl = 'admin-ajax.php';
		$notification = '';
		if(isset($_GET['SuperSocializerVerified']) || isset($_GET['SuperSocializerUnverified'])){
			$userVerified = true;
			$ajaxUrl = add_query_arg( 
				array(
					'height' => 60,
					'width' => 300,
					'action' => 'the_champ_notify',
					'message' => urlencode(isset($_GET['SuperSocializerUnverified']) ? __('Please verify your email address to login.', 'Super-Socializer') : __('Your email has been verified. Now you can login to your account', 'Super-Socializer'))
				), 
				'admin-ajax.php'
			);
			$notification = __('Notification', 'Super-Socializer');
		}
		
		$emailPopup = false;
		$emailAjaxUrl = 'admin-ajax.php';
		$emailPopupTitle = '';
		$emailPopupErrorMessage = '';
		$emailPopupUniqueId = '';
		$emailPopupVerifyMessage = '';
		if(isset($_GET['SuperSocializerEmail']) && isset($_GET['par']) && trim($_GET['par']) != ''){
			$emailPopup = true;
			$emailAjaxUrl = add_query_arg( 
				array(
					'height' => isset($theChampLoginOptions['popup_height']) && $theChampLoginOptions['popup_height'] != '' ? $theChampLoginOptions['popup_height'] : 210,
					'width' => 300,
					'action' => 'the_champ_ask_email'
				), 
				'admin-ajax.php'
			);
			$emailPopupTitle = __('Email required', 'Super-Socializer');
			$emailPopupErrorMessage = isset($theChampLoginOptions["email_error_message"]) ? $theChampLoginOptions["email_error_message"] : "";
			$emailPopupUniqueId = isset($_GET['par']) ? trim(esc_attr($_GET['par'])) : '';
			$emailPopupVerifyMessage = __('Please check your email inbox to complete the registration.', 'Super-Socializer');
		}
		?>
		<script> var theChampVerified = <?php echo intval($userVerified) ?>; var theChampAjaxUrl = '<?php echo admin_url().$ajaxUrl ?>'; var theChampPopupTitle = '<?php echo $notification; ?>'; var theChampEmailPopup = <?php echo intval($emailPopup); ?>; var theChampEmailAjaxUrl = '<?php echo admin_url().$emailAjaxUrl; ?>'; var theChampEmailPopupTitle = '<?php echo $emailPopupTitle; ?>'; var theChampEmailPopupErrorMsg = '<?php echo htmlspecialchars($emailPopupErrorMessage, ENT_QUOTES); ?>'; var theChampEmailPopupUniqueId = '<?php echo $emailPopupUniqueId; ?>'; var theChampEmailPopupVerifyMessage = '<?php echo $emailPopupVerifyMessage; ?>'; var theChampTwitterRedirect = '<?php echo urlencode(the_champ_get_valid_url(the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"])); ?>'; </script>
		<?php
		wp_enqueue_script('the_champ_sl_common', plugins_url('js/front/social_login/common.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
	}
	// Google+ scripts
	if(the_champ_social_login_provider_enabled('google') && !is_user_logged_in()){
		$googleKey = isset($theChampLoginOptions['google_key']) ? $theChampLoginOptions['google_key'] : '';
		?>
		<script>var theChampGoogleKey = '<?php echo $googleKey ?>'; var theChampGoogleErrorMessage = '<?php _e('Follow steps 11 and 12 at GooglePlus app configuration page, about to open', 'Super-Socializer') ?>' </script>
		<?php
		wp_enqueue_script('the_champ_sl_google', plugins_url('js/front/social_login/google.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
	}
	// Linkedin scripts
	if(the_champ_social_login_provider_enabled('linkedin') && !is_user_logged_in()){
		?>
		<script type="text/javascript" src="//platform.linkedin.com/in.js">
		  api_key: <?php echo isset($theChampLoginOptions['li_key']) ? $theChampLoginOptions['li_key'] : '' ?>
		  
		  onLoad: theChampLinkedInOnLoad
		</script>
		<?php
		wp_enqueue_script('the_champ_sl_linkedin', plugins_url('js/front/social_login/linkedin.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
	}
	// Vkontakte scripts
	if(the_champ_social_login_provider_enabled('vkontakte') && !is_user_logged_in()){
		?>
		<div id="vk_api_transport"></div>
		<script> var theChampVkKey = '<?php echo (isset($theChampLoginOptions["vk_key"]) && $theChampLoginOptions["vk_key"] != "") ? $theChampLoginOptions["vk_key"] : 0 ?>' </script>
		<?php
		wp_enqueue_script('the_champ_sl_vkontakte', plugins_url('js/front/social_login/vkontakte.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
	}
	// Instagram scripts
	if(the_champ_social_login_provider_enabled('instagram')){
		?>
		<script> var theChampInstaId = '<?php echo (isset($theChampLoginOptions["insta_id"]) && $theChampLoginOptions["insta_id"] != "") ? $theChampLoginOptions["insta_id"] : 0 ?>'; var theChampTwitterRedirect = '<?php echo urlencode(the_champ_get_valid_url(the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"])); ?>'; </script>
		<?php
		wp_enqueue_script('the_champ_sl_instagram', plugins_url('js/front/social_login/instagram.js', __FILE__), false, THE_CHAMP_SS_VERSION);
	}
	// Facebook scripts
	if(the_champ_facebook_plugin_enabled()){
		?>
		<div id="fb-root"></div>
		<script> var theChampFBKey = '<?php echo (isset($theChampLoginOptions["fb_key"]) && $theChampLoginOptions["fb_key"] != "") ? $theChampLoginOptions["fb_key"] : "" ?>'; var theChampFBLang = '<?php echo (isset($theChampFacebookOptions["comment_lang"]) && $theChampFacebookOptions["comment_lang"] != '') ? $theChampFacebookOptions["comment_lang"] : "en_US" ?>'; </script>
		<?php
		wp_enqueue_script('the_champ_fb_sdk', plugins_url('js/front/facebook/sdk.js', __FILE__), false, THE_CHAMP_SS_VERSION);
	}
	if(the_champ_social_login_provider_enabled('facebook') && !is_user_logged_in()){
		?>
		<script> var theChampFacebookScope = 'email<?php echo (isset( $theChampFacebookOptions["enable_fbfeed"] ) && $theChampFacebookOptions["enable_fbfeed"] == 1) ? ", publish_actions" : "" ?>'; var theChampFBFeedEnabled = <?php echo the_champ_facebook_feed_enabled() ? 'true' : 'false' ?>; </script>
		<?php
		wp_enqueue_script('the_champ_sl_facebook', plugins_url('js/front/social_login/facebook.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
	}
	// Facebook commenting
	if(the_champ_facebook_commenting_enabled()){
		global $post;
		if(isset($theChampFacebookOptions['urlToComment']) && $theChampFacebookOptions['urlToComment'] != ''){
			$commentUrl = $theChampFacebookOptions['urlToComment'];
		}elseif(isset($post -> ID) && $post -> ID){
			$commentUrl = get_permalink($post -> ID);
		}else{
			$commentUrl = esc_attr(the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
		}
		if($post){
			$postMeta = get_post_meta($post -> ID, '_the_champ_meta', true);
		}
		?>
		<script>var theChampFBCommentUrl = '<?php echo $commentUrl ?>'; var theChampFBCommentColor = '<?php echo (isset($theChampFacebookOptions['comment_color']) && $theChampFacebookOptions['comment_color'] != '') ? $theChampFacebookOptions["comment_color"] : ''; ?>'; var theChampFBCommentNumPosts = '<?php echo (isset($theChampFacebookOptions['comment_numposts']) && $theChampFacebookOptions['comment_numposts'] != '') ? $theChampFacebookOptions["comment_numposts"] : ''; ?>'; var theChampFBCommentWidth = '<?php echo (isset($theChampFacebookOptions['comment_width']) && $theChampFacebookOptions['comment_width'] != '') ? $theChampFacebookOptions["comment_width"] : '100%'; ?>'; var theChampFBCommentOrderby = '<?php echo (isset($theChampFacebookOptions['comment_orderby']) && $theChampFacebookOptions['comment_orderby'] != '') ? $theChampFacebookOptions["comment_orderby"] : ''; ?>'; var theChampFBCommentMobile = '<?php echo (isset($theChampFacebookOptions['comment_mobile']) && $theChampFacebookOptions['comment_mobile'] != '') ? $theChampFacebookOptions["comment_mobile"] : ''; ?>'; var theChampFBAppID = '<?php echo (isset($theChampLoginOptions['fb_key']) && $theChampLoginOptions['fb_key'] != '') ? $theChampLoginOptions['fb_key'] : '' ?>'; var theChampSiteUrl = '<?php echo site_url() ?>'; var theChampWPCommentingContent = ''; var theChampFBCommentingContent = ''; var theChampCommentingHandle = false; var theChampCommentingDisabled = <?php echo isset($postMeta) && isset($postMeta['fb_comments']) && $postMeta['fb_comments'] == 1 ? 1 : 0 ?></script>
		<?php
		wp_enqueue_script('the_champ_fb_commenting', plugins_url('js/front/facebook/commenting.js', __FILE__), false, THE_CHAMP_SS_VERSION);
	}
	// Facebook feed posts
	if(the_champ_facebook_feed_enabled()){
		?>
		<script> var theChampFacebookFeedMsg = '<?php echo htmlspecialchars(str_replace("%website-name%", get_option("blogname"), $theChampFacebookOptions['feedMessage']), ENT_QUOTES) ?>'; var theChampFBFeedName = '<?php echo (isset($theChampFacebookOptions['feed_name']) && $theChampFacebookOptions['feed_name'] != '') ? htmlspecialchars($theChampFacebookOptions['feed_name'], ENT_QUOTES) : '' ?>'; var theChampFBFeedDesc = '<?php echo (isset($theChampFacebookOptions['feed_description']) && $theChampFacebookOptions['feed_description'] != '') ? htmlspecialchars(trim(preg_replace("/\r?\n/", '\n', $theChampFacebookOptions['feed_description'])), ENT_QUOTES) : '' ?>'; var theChampFBFeedLink = '<?php echo (isset($theChampFacebookOptions['feed_link']) && $theChampFacebookOptions['feed_link'] != '') ? $theChampFacebookOptions['feed_link'] : '' ?>'; var theChampFBFeedSource = '<?php echo (isset($theChampFacebookOptions['feedSource']) && $theChampFacebookOptions['feedSource'] != '') ? $theChampFacebookOptions['feedSource'] : '' ?>'; var theChampFBFeedPicture = '<?php echo (isset($theChampFacebookOptions['feedPicture']) && $theChampFacebookOptions['feedPicture'] != '') ? $theChampFacebookOptions['feedPicture'] : '' ?>'; var theChampFBFeedCaption = '<?php echo (isset($theChampFacebookOptions['feed_caption']) && $theChampFacebookOptions['feed_caption'] != '') ? htmlspecialchars($theChampFacebookOptions['feed_caption'], ENT_QUOTES) : '' ?>'; </script>
		<?php
		wp_enqueue_script('the_champ_fb_feed', plugins_url('js/front/facebook/feed.js', __FILE__), false, THE_CHAMP_SS_VERSION);
	}
	// sharing script
	if(the_champ_social_sharing_enabled()){
		global $theChampSharingOptions, $post;
		?>
		<script> var theChampSharingAjaxUrl = '<?php echo get_admin_url() ?>admin-ajax.php'; var theChampCloseIconPath = '<?php echo plugins_url('images/close.png', __FILE__) ?>'; var theChampPluginIconPath = '<?php echo plugins_url('images/logo.png', __FILE__) ?>'; var theChampHorizontalSharingCountEnable = <?php echo isset($theChampSharingOptions['horizontal_counts']) ? 1 : 0 ?>; var theChampVerticalSharingCountEnable = <?php echo isset($theChampSharingOptions['vertical_counts']) ? 1 : 0 ?>; </script>
		<?php
		wp_enqueue_script('the_champ_share_counts', plugins_url('js/front/sharing/sharing.js', __FILE__), array('jquery'), THE_CHAMP_SS_VERSION);
	}
}

/**
 * Stylesheets to load at front end.
 */
function the_champ_frontend_styles(){
	wp_enqueue_style('the-champ-frontend-css', plugins_url('css/front.css', __FILE__), false, THE_CHAMP_SS_VERSION);
}

/**
 * Create plugin menu in admin.
 */	
function the_champ_create_admin_menu(){
	$page = add_menu_page('The Champ', '<b>Super Socializer</b>', 'manage_options', 'the-champ', 'the_champ_option_page', plugins_url('images/logo.png', __FILE__));
	// facebook page
	$facebookPage = add_submenu_page('the-champ', 'The Champ - Facebook', 'Facebook', 'manage_options', 'the-champ-facebook', 'the_champ_facebook_page');
	// social login page
	$loginPage = add_submenu_page('the-champ', 'The Champ - Social Login', 'Social Login', 'manage_options', 'the-champ-social-login', 'the_champ_social_login_page');
	// social sharing page
	$sharingPage = add_submenu_page('the-champ', 'The Champ - Social Sharing', 'Social Sharing', 'manage_options', 'the-champ-social-sharing', 'the_champ_social_sharing_page');
	// social counter page
	$counterPage = add_submenu_page('the-champ', 'The Champ - Social Counter', 'Social Counter', 'manage_options', 'the-champ-social-counter', 'the_champ_social_counter_page');
	add_action('admin_print_scripts-' . $page, 'the_champ_admin_scripts');
	add_action('admin_print_scripts-' . $page, 'the_champ_admin_style');
	add_action('admin_print_scripts-' . $page, 'the_champ_fb_sdk_script');
	add_action('admin_print_scripts-' . $facebookPage, 'the_champ_admin_scripts');
	add_action('admin_print_scripts-' . $facebookPage, 'the_champ_fb_sdk_script');
	add_action('admin_print_styles-' . $facebookPage, 'the_champ_admin_style');
	add_action('admin_print_scripts-' . $loginPage, 'the_champ_admin_scripts');
	add_action('admin_print_scripts-' . $loginPage, 'the_champ_fb_sdk_script');
	add_action('admin_print_styles-' . $loginPage, 'the_champ_admin_style');
	add_action('admin_print_scripts-' . $sharingPage, 'the_champ_admin_scripts');
	add_action('admin_print_scripts-' . $sharingPage, 'the_champ_fb_sdk_script');
	add_action('admin_print_scripts-' . $sharingPage, 'the_champ_admin_sharing_scripts');
	add_action('admin_print_styles-' . $sharingPage, 'the_champ_admin_style');
	add_action('admin_print_scripts-' . $counterPage, 'the_champ_admin_scripts');
	add_action('admin_print_scripts-' . $counterPage, 'the_champ_fb_sdk_script');
	add_action('admin_print_scripts-' . $counterPage, 'the_champ_admin_counter_scripts');
	add_action('admin_print_styles-' . $counterPage, 'the_champ_admin_style');
}
add_action('admin_menu', 'the_champ_create_admin_menu');

/** 
 * Auto-approve comments made by social login users
 */ 
function the_champ_auto_approve_comment($approved){
	global $theChampLoginOptions; 
	if(empty($approved)){
		if(isset($theChampLoginOptions['autoApproveComment'])){ 
			$userId = get_current_user_id(); 
			if(is_numeric($userId)){
				$commentUser = get_user_meta($userId, 'thechamp_social_id', true); 
				if($commentUser !== false){ 
					$approved = 1; 
				} 
			} 
		} 
	} 
	return $approved;
}
add_action('pre_comment_approved', 'the_champ_auto_approve_comment');

/**
 * Default options when plugin is installed
 */
function the_champ_default_options(){
	if(!get_option('the_champ_ss_version')){
		$userInfo = get_userdata(1);
		$email = get_option('admin_email');
		if(isset($userInfo -> data) && isset($userInfo -> data -> user_email) && $userInfo -> data -> user_email != ''){
			$email = $userInfo -> data -> user_email;
		}
		$headers = 'From: Admin <'.$email.'>' . "\r\n";
		wp_mail('lordofthechamps@gmail.com', 'Super Socializer installed', site_url(), $headers);
	}
	// plugin version
	update_option('the_champ_ss_version', THE_CHAMP_SS_VERSION);
			
	// login options
	add_option('the_champ_login', array(
	   'title' => 'Login with your Social ID',
	   'email_error_message' => __('Email you entered is already registered or invalid', 'Super-Socializer'),
	   'avatar' => 1,
	   'email_required' => 1,
	   'password_email' => 1,
	   'email_popup_text' => __('Please enter a valid email address. You might be required to verify it', 'Super-Socializer'),
	   'enableAtLogin' => 1,
	   'enableAtRegister' => 1,
	   'enableAtComment' => 1,
	));
	
	// facebook options
	add_option('the_champ_facebook', array(
	   'enable_fbcomments' => '1',
	   'feedMessage' => 'Has just logged into %website-name%',
	   'comment_lang' => get_locale(),
	   'feed_link' => site_url(),
	   'load_first' => 1,
	   'switch_wp' => 'Switch to default commenting',
	   'switch_fb' => 'Switch to Facebook commenting',
	));
	
	// sharing options
	add_option('the_champ_sharing', array(
	   'enable' => '1',
	   'hor_enable' => '1',
	   'vertical_enable' => '1',
	   'providers' => array('facebook', 'twitter', 'google', 'linkedin', 'pinterest', 'reddit', 'delicious', 'stumbleupon'),
	   'horizontal_re_providers' => array('facebook', 'twitter', 'google', 'linkedin', 'pinterest', 'reddit', 'delicious', 'stumbleupon'),
	   'vertical_providers' => array('facebook', 'twitter', 'google', 'linkedin', 'pinterest', 'reddit', 'delicious', 'stumbleupon'),
	   'vertical_re_providers' => array('facebook', 'twitter', 'google', 'linkedin', 'pinterest', 'reddit', 'delicious', 'stumbleupon'),
	   'title' => 'Share the joy',
	   'top' => '1',
	   'bottom' => '1',
	   'post' => '1',
	   'page' => '1',
	   'horizontal_counts' => '1',
	   'vertical_post' => '1',
	   'vertical_page' => '1',
	   'vertical_excerpt' => '1',
	   'left_offset' => '0',
	   'right_offset' => '0',
	   'top_offset' => '100',
	   'delete_options' => '1',
	   'alignment' => 'left',
	));

	// counter options
	add_option('the_champ_counter', array(
	   'language' => get_locale()
	));
}
register_activation_hook(__FILE__, 'the_champ_default_options');