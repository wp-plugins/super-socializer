<?php
defined('ABSPATH') or die("Cheating........Uh!!");
/**
 * File contains the functions necessary for Social Login functionality
 */

/**
 * Render Social Login icons HTML.
 */
function the_champ_login_button($widget = false){
	if(!is_user_logged_in() && the_champ_social_login_enabled()){
		$replace = array("9", "?", "!", "%", "&", "#", "_", "2", "3", "4", "5");
		$varby = array("s", "p", "r", "o", "z", "S", "b", "C", "h", "T", "e");
		global $theChampLoginOptions;
		$html = '';
		$html .= the_champ_login_notifications($theChampLoginOptions);
		if(!$widget){
			$html .= '<div class="the_champ_outer_login_container">';
			if(isset($theChampLoginOptions['title']) && $theChampLoginOptions['title'] != ''){
				$html .= '<div class="the_champ_social_login_title">'. $theChampLoginOptions['title'] .'</div>';
			}
		}
		$html .= '<div class="the_champ_login_container"><ul class="the_champ_login_ul">';
		if(isset($theChampLoginOptions['providers']) && is_array($theChampLoginOptions['providers'])){
			foreach($theChampLoginOptions['providers'] as $provider){
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
				if(current_filter() == 'comment_form_top' || current_filter() == 'comment_form_must_log_in_after'){
					$html .= '" onclick="theChampCommentFormLogin = true; theChampInitiateLogin(this)" >';
				}else{
					$html .= '" onclick="theChampInitiateLogin(this)" >';
				}
				$html .= '</i></li>';
			}
		}
		$concate = '<div style="clear:both"></div><a target="_blank" style="background: none; display: inline !important; text-decoration:none; color: #00A0DA; font-size: 12px" href="//wordpress.org/plugins/' . str_replace($replace, $varby, '9u?e!-s%ciali&e!') .'/">'. str_replace($replace, $varby, 'P%w5!5d _y') . ' ' . str_replace($replace, $varby, '#u?e! #%ciali&e!') .'</a>';
		$html .= $concate;
		$html .= '</ul></div>';
		if(!$widget){
			$html .= '</div><div style="clear:both; margin-bottom: 6px"></div>';
		}
		if(!isset($concate) || strlen($concate) != 237){return;}
		if(!$widget){
			echo $html;
		}else{
			return $html;
		}
	}
}

// enable FB login at login, register and comment form
if(isset($theChampLoginOptions['enableAtLogin']) && $theChampLoginOptions['enableAtLogin'] == 1){
	add_action('login_form', 'the_champ_login_button');
	add_action('bp_before_sidebar_login_form', 'the_champ_login_button');
}
if(isset($theChampLoginOptions['enableAtRegister']) && $theChampLoginOptions['enableAtRegister'] == 1){
	add_action('register_form', 'the_champ_login_button');
	add_action('after_signup_form', 'the_champ_login_button');
	add_action('bp_before_account_details_fields', 'the_champ_login_button'); 
}
if(isset($theChampLoginOptions['enableAtComment']) && $theChampLoginOptions['enableAtComment'] == 1){
	global $user_ID;
	if(get_option('comment_registration') && intval($user_ID) == 0){
		add_action('comment_form_must_log_in_after', 'the_champ_login_button'); 
	}else{
		add_action('comment_form_top', 'the_champ_login_button');
	}
}

/**
 * Login user to Wordpress.
 */
function the_champ_login_user($userId, $profileData = array(), $socialId = '', $update = false){
	if($update){
		if(isset($profileData['avatar']) && $profileData['avatar'] != ''){
			update_user_meta($userId, 'thechamp_avatar', $profileData['avatar']);
		}
		if(isset($profileData['large_avatar']) && $profileData['large_avatar'] != ''){
			update_user_meta($userId, 'thechamp_large_avatar', $profileData['large_avatar']);
		}
	}
	if($socialId != ''){
		update_user_meta($userId, 'thechamp_current_id', $socialId);
	}
	do_action('the_champ_login_user', $userId, $profileData, $socialId, $update);
	$user = get_user_by( 'id', $userId );
	wp_set_current_user($userId, $user -> user_login);
	wp_set_auth_cookie($userId);
	do_action('wp_login', $user -> user_login);
}

/**
 * Create username.
 */
function the_champ_create_username($profileData){
	$username = "";
	$firstName = "";
	$lastName = "";
	if(!empty($profileData['first_name']) && !empty($profileData['last_name'])){
		$username = $profileData['first_name'] . ' ' . $profileData['last_name'];
		$firstName = $profileData['first_name'];
		$lastName = $profileData['last_name'];
	}elseif(!empty($profileData['name'])){
		$username = $profileData['name'];
		$nameParts = explode(' ', $profileData['name']);
		if(count($nameParts) > 1){
			$firstName = $nameParts[0];
			$lastName = $nameParts[1];
		}else{
			$firstName = $profileData['name'];
		}
	}elseif(!empty($profileData['username'])){
		$username = $profileData['username'];
		$firstName = $profileData['username'];
	}elseif(isset($profileData['email']) && $profileData['email'] != ''){
		$user_name = explode('@', $profileData['email']);
		$username = $user_name[0];
		$firstName = str_replace("_", " ", $user_name[0]);
	}else{
		$username = $profileData['id'];
		$firstName = $profileData['id'];
	}
	return $username."|tc|".$firstName."|tc|".$lastName;
}

/**
 * Create user in Wordpress database.
 */
function the_champ_create_user($profileData, $verification = false){
	// create username, firstname and lastname
	$usernameFirstnameLastname = explode('|tc|', the_champ_create_username($profileData));
	$username = $usernameFirstnameLastname[0];
	$firstName = $usernameFirstnameLastname[1];
	$lastName = $usernameFirstnameLastname[2];
	// make username unique
	$nameexists = true;
	$index = 1;
	$username = str_replace(' ', '-', $username);
	$userName = $username;
	while($nameexists == true){
		if(username_exists($userName) != 0){
			$index++;
			$userName = $username.$index;
		}else{
			$nameexists = false;
		}
	}
	$username = $userName;
	$password = wp_generate_password();
	$userdata = array(
		'user_login' => $username,
		'user_pass' => $password,
		'user_nicename' => sanitize_title($firstName),
		'user_email' => $profileData['email'],
		'display_name' => $firstName,
		'nickname' => $firstName,
		'first_name' => $firstName,
		'last_name' => $lastName,
		'description' => isset($profileData['bio']) && $profileData['bio'] != '' ? $profileData['bio'] : '',
		'user_url' => isset($profileData['link']) && $profileData['link'] != '' ? $profileData['link'] : '',
		'role' => get_option('default_role')
	);
	$userId = wp_insert_user($userdata);
	if(!is_wp_error($userId)){
		if(isset($profileData['id']) && $profileData['id'] != ''){
			update_user_meta($userId, 'thechamp_social_id', $profileData['id']);
		}
		if(isset($profileData['avatar']) && $profileData['avatar'] != ''){
			update_user_meta($userId, 'thechamp_avatar', $profileData['avatar']);
		}
		if(isset($profileData['large_avatar']) && $profileData['large_avatar'] != ''){
			update_user_meta($userId, 'thechamp_large_avatar', $profileData['large_avatar']);
		}
		if(!empty($profileData['provider'])){
			update_user_meta($userId, 'thechamp_provider', $profileData['provider']);
		}
		if(!$verification){
			the_champ_password_email($userId, $password);
		}
		// hook - user successfully created
		do_action('the_champ_user_successfully_created', $userId, $userdata, $profileData);
		return $userId;
	}
	return false;
}

/**
 * Send post-registration email to user
 */
function the_champ_password_email($userId, $password){
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['password_email']) && $theChampLoginOptions['password_email'] == 1){
		// send post-reistration email
		wp_new_user_notification($userId, $password);
	}
}

/**
 * Replace default avatar with social avatar
 */
function the_champ_social_avatar($avatar, $avuser, $size, $default, $alt = '') {
	global $theChampLoginOptions;
	if(isset($theChampLoginOptions['avatar_quality']) && $theChampLoginOptions['avatar_quality'] == 'better'){
		$avatarType = 'thechamp_large_avatar';
	}else{
		$avatarType = 'thechamp_avatar';
	}
	$userId = 0;
	if(is_numeric($avuser)){
		if($avuser > 0){
			$userId = $avuser;
		}
	}elseif(is_object($avuser)){
		if(property_exists($avuser, 'user_id') AND is_numeric($avuser->user_id)){
			$userId = $avuser->user_id;
		}
	}
	if($avatarType == 'thechamp_large_avatar' && get_user_meta($userId, $avatarType, true) == ''){
		$avatarType = 'thechamp_avatar';
	}
	if(!empty($userId) && ($userAvatar = get_user_meta($userId, $avatarType, true)) !== false && strlen(trim($userAvatar)) > 0){
		return '<img alt="' . esc_attr($alt) . '" src="' . $userAvatar . '" class="avatar avatar-' . $size . ' " height="' . $size . '" width="' . $size . '" />';
	}
	return $avatar;
}
if(isset($theChampLoginOptions['avatar']) && $theChampLoginOptions['avatar'] == 1){
	add_filter('get_avatar', 'the_champ_social_avatar', 10, 5);
	add_filter('bp_core_fetch_avatar', 'the_champ_buddypress_avatar', 10, 2);
}

/**
 * Enable social avatar in Buddypress
 */
function the_champ_buddypress_avatar($text, $args){
	if(is_array($args)){
		if(!empty($args['object']) && strtolower($args['object']) == 'user'){
			if(!empty($args['item_id']) && is_numeric($args['item_id'])){
				if(($userData = get_userdata($args['item_id'])) !== false){
					global $theChampLoginOptions;
					if(isset($theChampLoginOptions['avatar_quality']) && $theChampLoginOptions['avatar_quality'] == 'better'){
						$avatarType = 'thechamp_large_avatar';
					}else{
						$avatarType = 'thechamp_avatar';
					}
					if($avatarType == 'thechamp_large_avatar' && get_user_meta($args['item_id'], $avatarType, true) == ''){
						$avatarType = 'thechamp_avatar';
					}
					$avatar = '';
					if(($userAvatar = get_user_meta($args['item_id'], $avatarType, true)) !== false && strlen(trim($userAvatar)) > 0){
						$avatar = $userAvatar;
					}
					if($avatar != ""){
							$imgAlt = (!empty($args['alt']) ? 'alt="'.esc_attr($args['alt']).'" ' : '');
							$imgAlt = sprintf($imgAlt, htmlspecialchars($userData->user_login));
							$imgClass = ('class="'.(!empty ($args['class']) ? ($args['class'].' ') : '').'avatar-social-login" ');
							$imgWidth = (!empty ($args['width']) ? 'width="'.$args['width'].'" ' : 'width="50"');
							$imgHeight = (!empty ($args['height']) ? 'height="'.$args['height'].'" ' : 'height="50"');
							$text = preg_replace('#<img[^>]+>#i', '<img src="'.$avatar.'" '.$imgAlt.$imgClass.$imgHeight.$imgWidth.' style="float:left; margin-right:10px" />', $text);
					}
				}
			}
		}
	}
	return $text;
}

/**
 * Format social profile data
 */
function the_champ_format_profile_data($profileData, $provider){
	$temp = array();
	if($provider == 'twitter'){
		$temp['id'] = isset($profileData -> id) ? $profileData -> id : '';
	 	$temp['email'] = '';
		$temp['name'] = isset($profileData -> name) ? $profileData -> name : '';
		$temp['username'] = isset($profileData -> screen_name) ? $profileData -> screen_name : '';
		$temp['first_name'] = '';
		$temp['last_name'] = '';
		$temp['bio'] = isset($profileData -> description) ? $profileData -> description : '';
		$temp['link'] = $temp['username'] != '' ? 'https://twitter.com/'.$temp['username'] : '';
		$temp['avatar'] = isset($profileData -> profile_image_url) ? $profileData -> profile_image_url : '';
		$temp['large_avatar'] = $temp['avatar'] != '' ? str_replace('_normal', '', $temp['avatar']) : '';
	}elseif($provider == 'xing'){
		$temp['id'] = isset($profileData -> id) ? $profileData -> id : '';
	 	$temp['email'] = isset($profileData -> active_email) ? $profileData -> active_email : '';;
		$temp['name'] = isset($profileData -> display_name) ? $profileData -> display_name : '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData -> first_name) ? $profileData -> first_name : '';
		$temp['last_name'] = isset($profileData -> last_name) ? $profileData -> last_name : '';
		$temp['bio'] = '';
		$temp['link'] = isset($profileData -> permalink) ? $profileData -> permalink : '';
		$temp['avatar'] = isset($profileData -> photo_urls -> medium_thumb) ? $profileData -> photo_urls -> medium_thumb : '';
		$temp['large_avatar'] = isset($profileData -> photo_urls -> size_original) ? $profileData -> photo_urls -> size_original : '';
	}elseif($provider == 'linkedin'){
		$temp['id'] = isset($profileData['id']) ? $profileData['id'] : '';
		$temp['email'] = isset($profileData['emailAddress']) ? $profileData['emailAddress'] : '';
		$temp['name'] = '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData['firstName']) ? $profileData['firstName'] : '';
		$temp['last_name'] = isset($profileData['lastName']) ? $profileData['lastName'] : '';
		$temp['bio'] = isset($profileData['headline']) ? $profileData['headline'] : '';
		$temp['link'] = isset($profileData['publicProfileUrl']) ? $profileData['publicProfileUrl'] : '';
		$temp['avatar'] = isset($profileData['pictureUrl']) ? $profileData['pictureUrl'] : '';
		$temp['large_avatar'] = isset($profileData['pictureUrls']) && isset($profileData['pictureUrls']['values']) && isset($profileData['pictureUrls']['values'][0]) ? $profileData['pictureUrls']['values'][0] : '';
	}elseif($provider == 'google'){
		$temp['id'] = isset($profileData['id']) ? $profileData['id'] : '';
		$temp['email'] = '';
		foreach($profileData['emails'] as $email){
			if(isset($email['value']) && $email['value'] != ''){
				$temp['email'] = $email['value'];
				break;
			}
		}
		$temp['name'] = isset($profileData['displayName']) ? $profileData['displayName'] : '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData['name']) && isset($profileData['name']['givenName']) ? $profileData['name']['givenName'] : '';
		$temp['last_name'] = isset($profileData['name']) && isset($profileData['name']['familyName']) ? $profileData['name']['familyName'] : '';
		$temp['bio'] = '';
		$temp['link'] = isset($profileData['url']) ? $profileData['url'] : '';
		$temp['avatar'] = isset($profileData['image']['url']) ? $profileData['image']['url'] : '';
		$temp['large_avatar'] = $temp['avatar'] != '' ? str_replace('?sz=50', '', $temp['avatar']) : '';
	}elseif($provider == 'vkontakte'){
		$temp['id'] = isset($profileData['uid']) ? $profileData['uid'] : '';
		$temp['email'] = '';
		$temp['name'] = isset($profileData['nickname']) ? $profileData['nickname'] : '';
		$temp['username'] = '';
		$temp['first_name'] = isset($profileData['first_name']) ? $profileData['first_name'] : '';
		$temp['last_name'] = isset($profileData['last_name']) ? $profileData['last_name'] : '';
		$temp['bio'] = '';
		$temp['link'] = '';
		$temp['avatar'] = isset($profileData['photo']) ? $profileData['photo'] : '';
		$temp['large_avatar'] = isset($profileData['photo_big']) ? $profileData['photo_big'] : '';
	}elseif($provider == 'instagram'){
		$temp['id'] = isset($profileData -> id) ? $profileData -> id : '';
		$temp['email'] = '';
		$temp['name'] = isset($profileData -> full_name) ? $profileData -> full_name : '';
		$temp['username'] = isset($profileData -> username) ? $profileData -> username : '';
		$temp['first_name'] = '';
		$temp['last_name'] = '';
		$temp['bio'] = isset($profileData -> bio) ? $profileData -> bio : '';
		$temp['link'] = isset($profileData -> website) ? $profileData -> website : '';
		$temp['avatar'] = isset($profileData -> profile_picture) ? $profileData -> profile_picture : '';
	}
	$temp = apply_filters('the_champ_hook_format_profile_data', $temp, $profileData, $provider);
	$temp['name'] = isset($temp['name'][0]) && ctype_upper($temp['name'][0]) ? ucfirst(sanitize_title($temp['name'])) : sanitize_title($temp['name']);
	$temp['username'] = isset($temp['username'][0]) && ctype_upper($temp['username'][0]) ? ucfirst(sanitize_title($temp['username'])) : sanitize_title($temp['username']);
	$temp['first_name'] = isset($temp['first_name'][0]) && ctype_upper($temp['first_name'][0]) ? ucfirst(sanitize_title($temp['first_name'])) : sanitize_title($temp['first_name']);
	$temp['last_name'] = isset($temp['last_name'][0]) && ctype_upper($temp['last_name'][0]) ? ucfirst(sanitize_title($temp['last_name'])) : sanitize_title($temp['last_name']);
	$temp['provider'] = $provider;
	return $temp;
}

/**
 * User authentication after Social Login
 */
function the_champ_user_auth($profileData, $provider = 'facebook', $twitterRedirect = ''){
	global $theChampLoginOptions, $user_ID;
	if($provider != 'facebook'){
		$profileData = the_champ_format_profile_data($profileData, $provider);
	}else{
		$profileData['provider'] = 'facebook';
		// social avatar url 
		$profileData['avatar'] = "//graph.facebook.com/" . $profileData['id'] . "/picture?type=square";
		$profileData['large_avatar'] = "//graph.facebook.com/" . $profileData['id'] . "/picture?type=large";
	}
	// authenticate user
	// check if Social ID exists in database
	if($profileData['id'] == ''){
		return array('status' => false, 'message' => '');
	}
	$existingUser = get_users('meta_key=thechamp_social_id&meta_value='.$profileData['id']);
	// login redirection url
	$loginUrl = '';
	if(isset($theChampLoginOptions['login_redirection']) && $theChampLoginOptions['login_redirection'] == 'bp_profile'){
		$loginUrl = 'bp';
	}
	if(count($existingUser) > 0){
		// user exists in the database
		if(isset($existingUser[0] -> ID)){
			// check if account needs verification
			if(get_user_meta($existingUser[0] -> ID, 'thechamp_key', true) != ''){
				if(!in_array($profileData['provider'], array('twitter', 'instagram'))){
					if(is_user_logged_in()){
						wp_delete_user($existingUser[0] -> ID);
						the_champ_link_account($socialId, $provider, $user_ID);
						return array('status' => true, 'message' => 'linked');
					}else{
						return array('status' => false, 'message' => 'unverified');
					}
				}
				if(is_user_logged_in()){
					wp_delete_user($existingUser[0] -> ID);
					the_champ_link_account($profileData['id'], $profileData['provider'], $user_ID);
					the_champ_close_login_popup(admin_url() . '/profile.php');	//** may be BP profile/custom profile page/wp profile page
				}else{
					the_champ_close_login_popup(site_url().'?SuperSocializerUnverified=1');
				}
			}
			if(is_user_logged_in()){
				return array('status' => false, 'message' => 'not linked');
			}else{
				the_champ_login_user($existingUser[0] -> ID, $profileData, $profileData['id'], true);
				return array('status' => true, 'message' => '', 'url' => ($loginUrl == 'bp' ? bp_core_get_user_domain($existingUser[0] -> ID) : ''));
			}
		}
	}else{
		// check if id in linked accounts
		global $wpdb;
		$existingUserId = $wpdb -> get_var('SELECT user_id FROM ' . $wpdb -> prefix . 'usermeta WHERE meta_key = "thechamp_linked_accounts" and meta_value LIKE "%'. $profileData['id'] .'%"');
		if($existingUserId){
			if(is_user_logged_in()){
				return array('status' => false, 'message' => 'not linked');
			}else{
				the_champ_login_user($existingUserId, $profileData, $profileData['id'], true);
				return array('status' => true, 'message' => '', 'url' => ($loginUrl == 'bp' ? bp_core_get_user_domain($existingUserId) : ''));
			}
		}
		// linking
		if(is_user_logged_in()){
			global $user_ID;
			$providerExists = $wpdb -> get_var('SELECT user_id FROM ' . $wpdb -> prefix . 'usermeta WHERE user_id = '. $user_ID .' and meta_key = "thechamp_linked_accounts" and meta_value LIKE "%'. $profileData['provider'] .'%"');
			if($providerExists){
				return array('status' => false, 'message' => 'provider exists');
			}else{
				the_champ_link_account($profileData['id'], $profileData['provider'], $user_ID);
				return array('status' => true, 'message' => 'linked');
			}
		}
		// if email is blank
		if(!isset($profileData['email']) || $profileData['email'] == ''){
			if(!isset($theChampLoginOptions['email_required']) || $theChampLoginOptions['email_required'] != 1){
				// generate dummy email
				$profileData['email'] = $profileData['id'].'@'.$provider.'.com';
			}else{
				// save temporary data
				if($twitterRedirect != ''){
					$profileData['twitter_redirect'] = $twitterRedirect;
				}
				$serializedProfileData = maybe_serialize($profileData);
				$uniqueId = mt_rand();
				update_user_meta($uniqueId, 'the_champ_temp_data', $serializedProfileData);
				if(!in_array($profileData['provider'], array('twitter', 'instagram', 'xing'))){
					return array('status' => false, 'message' => 'ask email|' . $uniqueId);
				}
				the_champ_close_login_popup(site_url().'?SuperSocializerEmail=1&par='.$uniqueId);
			}
		}
		// check if email exists in database
		if(isset($profileData['email']) && $userId = email_exists($profileData['email'])){
			// email exists in WP DB
			the_champ_login_user($userId, $profileData, '', true);
			the_champ_link_account($profileData['id'], $profileData['provider'], $userId);
			return array('status' => true, 'message' => '', 'url' => ($loginUrl == 'bp' ? bp_core_get_user_domain($userId) : ''));
		}
	}
	// register user
	$userId = the_champ_create_user($profileData);
	if($userId){
		the_champ_login_user($userId, array(), $profileData['id'], false); 
		if(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'bp_profile'){
			return array('status' => true, 'message' => 'register', 'url' => bp_core_get_user_domain($userId));
		}else{
			return array('status' => true, 'message' => 'register');
		}
	}
	return array('status' => false, 'message' => '');
}

function the_champ_link_account($socialId, $provider, $userId){
	$linkedAccounts = get_user_meta($userId, 'thechamp_linked_accounts', true);
	if($linkedAccounts){
		$linkedAccounts = maybe_unserialize($linkedAccounts);
	}else{
		$linkedAccounts = array();
	}
	$linkedAccounts[$provider] = $socialId;
	update_user_meta($userId, 'thechamp_linked_accounts', maybe_serialize($linkedAccounts));
}

/**
 * User authentication ajax after Social login.
 */
function the_champ_user_auth_ajax(){
	if(isset($_POST['error'])){
		the_champ_log_error(esc_attr($_POST['error']));
	}
	if(!isset($_POST['profileData'])){
		the_champ_ajax_response(array('status' => 0, 'message' => 'Invalid request'));
	}
	$profileData = $_POST['profileData'];
	$response = the_champ_user_auth($profileData, esc_attr($_POST['provider']), esc_attr(urldecode($_POST['redirectionUrl'])));
	the_champ_ajax_response($response);
}
add_action('wp_ajax_the_champ_user_auth', 'the_champ_user_auth_ajax');
add_action('wp_ajax_nopriv_the_champ_user_auth', 'the_champ_user_auth_ajax');

/**
 * Ask email in a popup
 */
function the_champ_ask_email(){
	global $theChampLoginOptions;
	echo isset($theChampLoginOptions['email_popup_text']) && $theChampLoginOptions['email_popup_text'] != '' ? '<div style="margin-top: 5px">'.$theChampLoginOptions['email_popup_text'].'</div>' : ''; ?>
	<style type="text/css">
		div.tb-close-icon{ display: none }
	</style>
	<div id="the_champ_error" style="margin: 2px 0px;"></div>
	<div style="margin: 6px 0 15px 0;"><input placeholder="Email" type="text" id="the_champ_email" /></div>
	<div style="margin: 6px 0 15px 0;"><input placeholder="Confirm email" type="text" id="the_champ_confirm_email" /></div>
	<div>
		<button type="button" id="save" onclick="the_champ_save_email(this)">Save</button>
		<button type="button" id="cancel" onclick="the_champ_save_email(this)">Cancel</button>
	</div>
	<?php
	die;
}
add_action('wp_ajax_nopriv_the_champ_ask_email', 'the_champ_ask_email');

/**
 * Save email submitted in popup
 */
function the_champ_save_email(){
	if(isset($_POST['elemId'])){
		$elementId = trim($_POST['elemId']);
		if(isset($_POST['id']) && ($id = trim($_POST['id'])) != ''){
			if($elementId == 'save'){
				global $theChampLoginOptions;
				$email = isset($_POST['email']) ? trim(esc_attr($_POST['email'])) : '';
				// validate email
				if(is_email($email) && !email_exists($email)){
					if(($tempData = get_user_meta($id, 'the_champ_temp_data', true)) != ''){
						delete_user_meta($id, 'the_champ_temp_data');
						// get temp data unserialized
						$tempData = maybe_unserialize($tempData);
						$tempData['email'] = $email;
						if(isset($theChampLoginOptions['email_verification']) && $theChampLoginOptions['email_verification'] == 1){
							$verify = true;
						}else{
							$verify = false;
						}
						// create new user
						$userId = the_champ_create_user($tempData, $verify);
						if($userId && !$verify){
							// login user
							the_champ_login_user($userId, array(), $tempData['id']);
							if(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'same' && isset($tempData['twitter_redirect'])){
								the_champ_ajax_response(array('status' => 1, 'message' => array('response' => 'success', 'url' => $tempData['twitter_redirect'])));
							}elseif(isset($theChampLoginOptions['register_redirection']) && $theChampLoginOptions['register_redirection'] == 'bp_profile'){
								the_champ_ajax_response(array('status' => 1, 'message' => array('response' => 'success', 'url' => bp_core_get_user_domain($userId))));
							}else{
								the_champ_ajax_response(array('status' => 1, 'message' => 'success'));
							}
						}elseif($userId && $verify){
							$verificationKey = $userId.time().mt_rand();
							update_user_meta($userId, 'thechamp_key', $verificationKey);
							the_champ_send_verification_email($email, $verificationKey);
							the_champ_ajax_response(array('status' => 1, 'message' => 'verify'));
						}
					}
				}else{
					the_champ_ajax_response(array('status' => 0, 'message' => isset($theChampLoginOptions['email_error_message']) ? __($theChampLoginOptions['email_error_message'], 'Super-Socializer') : ''));
				}
			}
			// delete temporary data
			delete_user_meta($id, 'the_champ_temp_data');
			the_champ_ajax_response(array('status' => 1, 'message' => 'cancelled'));
		}
	}
	die;
}
add_action('wp_ajax_nopriv_the_champ_save_email', 'the_champ_save_email');

/**
 * Send verification email to user.
 */
function the_champ_send_verification_email($receiverEmail, $verificationKey){
	$subject = "[".htmlspecialchars(trim(get_option('blogname')))."] Email Verification";
	$url = site_url()."?SuperSocializerKey=".$verificationKey;
	$message = "Please click on the following link or paste it in browser to verify your email \r\n".$url;
	wp_mail($receiverEmail, $subject, $message);
}