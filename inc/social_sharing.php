<?php
defined('ABSPATH') or die("Cheating........Uh!!");
/**
 * File contains the functions necessary for Social Sharing functionality
 */

/**
 * Render sharing interface html.
 */
function the_champ_prepare_sharing_html($postUrl, $sharingType = 'horizontal', $displayCount){
	global $theChampSharingOptions, $post;
	$output = apply_filters('the_champ_sharing_interface_filter', '', $postUrl, $sharingType, $theChampSharingOptions, $post, $displayCount);
	if($output != ''){
		return $output;
	}
	$html = '';
	$sharingMeta = '';
	if(!is_front_page()){
		$sharingMeta = get_post_meta($post->ID, '_the_champ_meta', true);
	}
	if(isset($theChampSharingOptions[$sharingType.'_re_providers'])){
		$html = '<ul '. ($sharingType == 'horizontal' && isset($theChampSharingOptions['hor_sharing_alignment']) && $theChampSharingOptions['hor_sharing_alignment'] == "center" ? "style='list-style: none;position: relative;left: 50%;'" : "") .' class="the_champ_sharing_ul">';
		foreach($theChampSharingOptions[$sharingType.'_re_providers'] as $provider){
			$html .= '<li>';
			if($displayCount){
				$startingCount = isset($sharingMeta[$provider . '_' . $sharingType . '_count']) && $sharingMeta[$provider . '_' . $sharingType . '_count'] != '' ? true : false;
				$html .= '<span '. ($startingCount ? 'ss_st_count="'. $sharingMeta[$provider . '_' . $sharingType . '_count'] .'"' : '') .' class="the_champ_share_count the_champ_'.$provider.'_count" >&nbsp;</span>';
			}
			if($provider == 'print'){
				$html .= '<i alt="Print" Title="Print" class="theChampSharingButton theChampSharing'. ucfirst($provider) .'Button" onclick=\'window.print()\'></i>';
			}elseif($provider == 'email'){
				$html .= '<i alt="Email" Title="Email" class="theChampSharingButton theChampSharing'. ucfirst($provider) .'Button" onclick="window.location.href = \'mailto:?subject=\' + escape(\'Have a look at this website\') + \'&body=\' + escape(\''.$postUrl.'\')"></i>';
			}else{
				if($provider == 'facebook'){
					$sharingUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . $postUrl;
				}elseif($provider == 'twitter'){
					$sharingUrl = 'http://twitter.com/intent/tweet?'. (isset($theChampSharingOptions['twitter_username']) && $theChampSharingOptions['twitter_username'] != '' ? 'via=' . $theChampSharingOptions['twitter_username'] . '&' : '') . 'text='.urlencode($post->post_title).'&url=' . $postUrl;
				}elseif($provider == 'linkedin'){
					$sharingUrl = 'http://www.linkedin.com/shareArticle?mini=true&url=' . $postUrl;
				}elseif($provider == 'google'){
					$sharingUrl = 'https://plus.google.com/share?url=' . $postUrl;
				}elseif($provider == 'yahoo'){
					$sharingUrl = 'http://bookmarks.yahoo.com/toolbar/SaveBM/?u=' . $postUrl . '&t=' . urlencode($post->post_title);
				}elseif($provider == 'reddit'){
					$sharingUrl = 'http://reddit.com/submit?url='.$postUrl.'&title=' . urlencode($post->post_title);
				}elseif($provider == 'digg'){
					$sharingUrl = 'http://digg.com/submit?url='.$postUrl.'&title=' . urlencode($post->post_title);
				}elseif($provider == 'delicious'){
					$sharingUrl = 'http://del.icio.us/post?url='.$postUrl.'&title=' . urlencode($post->post_title);
				}elseif($provider == 'stumbleupon'){
					$sharingUrl = 'http://www.stumbleupon.com/submit?url='.$postUrl.'&title=' . urlencode($post->post_title);
				}elseif($provider == 'float it'){
					$sharingUrl = 'http://www.designfloat.com/submit.php?url='.$postUrl.'&title=' . urlencode($post->post_title);
				}elseif($provider == 'tumblr'){
					$sharingUrl = 'http://www.tumblr.com/share?v=3&u='.urlencode($postUrl).'&t=' . urlencode($post->post_title) . '&s=';
				}elseif($provider == 'vkontakte'){
					$sharingUrl = 'http://vkontakte.ru/share.php?&url='.urlencode($postUrl);
				}elseif($provider == 'xing'){											
					$sharingUrl = 'https://www.xing-share.com/social_plugins/share?url='. urlencode($postUrl) .'&wtmc=XING&sc_p=xing-share';
				}elseif($provider == 'pinterest'){
					$sharingUrl = "javascript:void((function(){var e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','//assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)})());";
				}
				$html .= '<i alt="'.($provider == 'google' ? 'Google Plus' : ucfirst($provider)).'" Title="'.($provider == 'google' ? 'Google Plus' : ucfirst($provider)).'" class="theChampSharingButton theChampSharing'. ucfirst( str_replace(' ', '', $provider) ) .'Button" ';
				if($provider == 'pinterest'){
					$html .= 'onclick="'.$sharingUrl.'"></i>';
				}else{
					$html .= 'onclick=\' theChampPopup("'.$sharingUrl.'")\'></i>';
				}
			}
			$html .= '</li>';
		}
		$html .= '<li>';
		if($displayCount){
			$html .= '<span class="the_champ_share_count">&nbsp;</span>';
		}
		$html .= '<i style="display: inline !important; visibility: visible !important" title="More" alt="More" class="theChampSharingButton theChampSharingMoreButton" onclick="theChampMoreSharingPopup(this, \''.$postUrl.'\', \''.urlencode($post->post_title).'\')" ></i></li></ul><div style="clear:both"></div>';
	}
	return $html;
}

/**
 * Render counter interface html.
 */
function the_champ_prepare_counter_html($postUrl, $sharingType = 'horizontal', $shortUrl){
	global $theChampCounterOptions, $post;
	$output = apply_filters('the_champ_counter_interface_filter', '', $postUrl, $shortUrl, $sharingType, $theChampCounterOptions, $post);
	if($output != ''){
		return $output;
	}
	$html = '<div id="fb-root"></div>';
	if(isset($theChampCounterOptions[$sharingType.'_providers']) && is_array($theChampCounterOptions[$sharingType.'_providers'])){
		$html = '<ul '. ($sharingType == 'horizontal' && isset($theChampCounterOptions['hor_counter_alignment']) && $theChampCounterOptions['hor_counter_alignment'] == "center" ? "style='list-style: none;position: relative;left: 50%;'" : "") .' class="the_champ_sharing_ul">';
		$language = isset($theChampCounterOptions['language']) && $theChampCounterOptions['language'] != '' ? $theChampCounterOptions['language'] : '';
		foreach($theChampCounterOptions[$sharingType.'_providers'] as $provider){
			if($provider == 'facebook_like'){
				$html .= '<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/'. ($language == '' ? 'en_US' : $language) .'/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script><li class="the_champ_facebook_like"><div class="fb-like" data-href="'. $postUrl .'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>';
			}elseif($provider == 'facebook_recommend'){
				$html .= '<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/'. ($language == '' ? 'en_US' : $language) .'/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script><li class="the_champ_facebook_recommend"><div class="fb-like" data-href="'. $postUrl .'" data-layout="button_count" data-action="recommend" data-show-faces="false" data-share="false"></div></li>';
			}elseif($provider == 'twitter_tweet'){
				$html .= '<li class="the_champ_twitter_tweet"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'. $shortUrl .'" data-counturl="'. $postUrl .'" data-text="'. urlencode($post->post_title) .'" data-via="'. (isset($theChampCounterOptions['twitter_username']) && $theChampCounterOptions['twitter_username'] != '' ? $theChampCounterOptions['twitter_username'] : '') .'" data-lang="'. $language .'" >Tweet</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document, "script", "twitter-wjs");</script></li>';
			}elseif($provider == 'linkedin_share'){
				$html .= '<li class="the_champ_linkedin_share"><script src="//platform.linkedin.com/in.js" type="text/javascript">lang: '. $language .'</script><script type="IN/Share" data-url="' . $postUrl . '" data-counter="right"></script></li>';
			}elseif($provider == 'google_plusone'){
				$html .= '<li class="the_champ_google_plusone"><script type="text/javascript" src="https://apis.google.com/js/platform.js">{lang: "'. $language .'"}</script><div class="g-plusone" data-size="medium" data-href="'. $postUrl .'"></div></li>';
			}elseif($provider == 'pinterest_pin_it'){
				$html .= '<li class="the_champ_pinterest_pin"><a data-pin-lang="'. $language .'" href="//www.pinterest.com/pin/create/button/?url='. $postUrl .'" data-pin-do="buttonPin" data-pin-config="beside"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script></li>';
			}elseif($provider == 'googleplus_share'){
				$html .= '<li class="the_champ_gp_share"><script type="text/javascript" src="https://apis.google.com/js/platform.js">{lang: "'. $language .'"}</script><div class="g-plus" data-action="share" data-annotation="bubble" data-href="'. $postUrl .'"></div></li>';
			}elseif($provider == 'reddit'){
				$html .= '<li class="the_champ_reddit"><script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script></li>';
			}elseif($provider == 'xing'){
				$html .= '<li class="the_champ_xing"><div data-type="XING/Share" data-counter="right" data-url="'. $postUrl .'" data-lang="'. $language .'"></div>
				<script>
				  ;(function (d, s) {
					var x = d.createElement(s),
					  s = d.getElementsByTagName(s)[0];
					  x.src = "https://www.xing-share.com/js/external/share.js";
					  s.parentNode.insertBefore(x, s);
				  })(document, "script");
				</script></li>';
			}elseif($provider == 'stumbleupon_badge'){
				$html .= '<li class="the_champ_stumble">
							<su:badge layout="1" location="'. $postUrl .'"></su:badge>
							<script type="text/javascript">
							  (function() {
								var li = document.createElement(\'script\'); li.type = \'text/javascript\'; li.async = true;
								li.src = (\'https:\' == document.location.protocol ? \'https:\' : \'http:\') + \'//platform.stumbleupon.com/1/widgets.js\';
								var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(li, s);
							  })();
							</script>
						</li>';
			}
		}
		$html .= '</ul><div style="clear:both"></div>';
	}
	return $html;
}

function the_champ_generate_sharing_bitly_url($url){
    global $theChampSharingOptions;
    //generate the URL
    $bitly = 'http://api.bit.ly/v3/shorten?format=txt&login='. $theChampSharingOptions['bitly_username'] .'&apiKey='. $theChampSharingOptions['bitly_key'] .'&longUrl='.urlencode($url);
	$response = wp_remote_get( $bitly,  array( 'timeout' => 15 ) );
	if( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && 200 === $response['response']['code'] ){
		return trim(wp_remote_retrieve_body( $response ));
	}
	return false;
}

function the_champ_generate_counter_bitly_url($url){
    global $theChampCounterOptions;
    //generate the URL
    $bitly = 'http://api.bit.ly/v3/shorten?format=txt&login='. $theChampCounterOptions['bitly_username'] .'&apiKey='. $theChampCounterOptions['bitly_key'] .'&longUrl='.urlencode($url);
	$response = wp_remote_get( $bitly,  array( 'timeout' => 15 ) );
	if( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && 200 === $response['response']['code'] ){
		return trim(wp_remote_retrieve_body( $response ));
	}
	return false;
}

$theChampVerticalHomeCount = 0;
$theChampVerticalExcerptCount = 0;
$theChampVerticalCounterHomeCount = 0;
$theChampVerticalCounterExcerptCount = 0;
/**
 * Enable sharing interface at selected areas.
 */
function the_champ_render_sharing($content){
	global $post;
	// hook to bypass sharing
	$disable = apply_filters('the_champ_bypass_sharing', $post, $content);
	// if $disable value is 1, return content without sharing interface
	if($disable === 1){ return $content; }
	$sharingMeta = get_post_meta($post->ID, '_the_champ_meta', true);
	global $theChampSharingOptions, $theChampCounterOptions;
	
	$sharingBpActivity = false;
	$counterBpActivity = false;
	if(current_filter() == 'bp_activity_entry_meta'){
		if(isset($theChampSharingOptions['bp_activity'])){
			$sharingBpActivity = true;
		}
		if(isset($theChampCounterOptions['bp_activity'])){
			$counterBpActivity = true;
		}
	}
	if(isset($theChampCounterOptions['enable'])){
		//counter interface
		if(isset($theChampCounterOptions['hor_enable']) && !(isset($sharingMeta['counter']) && $sharingMeta['counter'] == 1 && !is_front_page())){
			if($counterBpActivity){
				$counterPostUrl = bp_get_activity_thread_permalink();
			}elseif(isset($theChampCounterOptions['horizontal_target_url'])){
				if($theChampCounterOptions['horizontal_target_url'] == 'default'){
					$counterPostUrl = get_permalink($post->ID);
				}elseif($theChampCounterOptions['horizontal_target_url'] == 'home'){
					$counterPostUrl = site_url();
				}elseif($theChampCounterOptions['horizontal_target_url'] == 'custom'){
					$counterPostUrl = isset($theChampCounterOptions['horizontal_target_url_custom']) ? trim($theChampCounterOptions['horizontal_target_url_custom']) : get_permalink($post->ID);
				}
			}else{
				$counterPostUrl = get_permalink($post->ID);
			}
			
			$counterUrl = $counterPostUrl;
			// if bit.ly integration enabled, generate bit.ly short url
			if(isset($theChampCounterOptions['bitly_enable']) && isset($theChampCounterOptions['bitly_username']) && isset($theChampCounterOptions['bitly_username']) && $theChampCounterOptions['bitly_username'] != '' && isset($theChampCounterOptions['bitly_key']) && $theChampCounterOptions['bitly_key'] != ''){
				$shortUrl = the_champ_generate_counter_bitly_url($counterPostUrl);
				if($shortUrl){
					$counterUrl = $shortUrl;
				}
			}
			
			$sharingDiv = the_champ_prepare_counter_html($counterPostUrl, 'horizontal', $counterUrl);
			$sharingContainerStyle = '';
			$sharingTitleStyle = 'style="font-weight:bold"';
			if(isset($theChampCounterOptions['hor_counter_alignment'])){
				if($theChampCounterOptions['hor_counter_alignment'] == 'right'){
					$sharingContainerStyle = 'style="float: right"';
				}elseif($theChampCounterOptions['hor_counter_alignment'] == 'center'){
					$sharingContainerStyle = 'style="float: right;position: relative;left: -50%;text-align: left;"';
					$sharingTitleStyle = 'style="font-weight: bold;list-style: none;position: relative;left: 50%;"';
				}
			}
			$horizontalDiv = "<div style='clear: both'></div><div ". $sharingContainerStyle ." class='the_champ_counter_container the_champ_horizontal_counter'><div ". $sharingTitleStyle .">".ucfirst($theChampCounterOptions['title'])."</div>".$sharingDiv."</div><div style='clear: both'></div>";
			if($counterBpActivity){
				echo $horizontalDiv;
			}
			// show horizontal counter		
			if((isset( $theChampCounterOptions['home']) && is_front_page()) || (isset( $theChampCounterOptions['category']) && is_category()) || ( isset( $theChampCounterOptions['post'] ) && is_single() && isset($post -> post_type) && $post -> post_type == 'post' ) || ( isset( $theChampCounterOptions['page'] ) && is_page() && isset($post -> post_type) && $post -> post_type == 'page' ) || ( isset( $theChampCounterOptions['excerpt'] ) && is_front_page() && current_filter() == 'get_the_excerpt' ) || ( isset( $theChampCounterOptions['bb_reply'] ) && current_filter() == 'bbp_get_reply_content' ) || ( isset( $theChampCounterOptions['bb_forum'] ) && (isset( $theChampCounterOptions['top'] ) && current_filter() == 'bbp_template_before_single_forum' || isset( $theChampCounterOptions['bottom'] ) && current_filter() == 'bbp_template_after_single_forum' )) || ( isset( $theChampCounterOptions['bb_topic'] ) && (isset( $theChampCounterOptions['top'] ) && in_array(current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic')) || isset( $theChampCounterOptions['bottom'] ) && in_array(current_filter(), array('bbp_template_after_single_topic', 'bbp_template_after_lead_topic')) )) ){	
				if( in_array( current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic', 'bbp_template_before_single_forum', 'bbp_template_after_single_topic', 'bbp_template_after_lead_topic', 'bbp_template_after_single_forum') ) ){
					echo '<div style="clear:both"></div>'.$horizontalDiv.'<div style="clear:both"></div>';
				}else{
					if(isset($theChampCounterOptions['top'] ) && isset($theChampCounterOptions['bottom'])){
						$content = $horizontalDiv.'<br/>'.$content.'<br/>'.$horizontalDiv;
					}else{
						if(isset($theChampCounterOptions['top'])){
							$content = $horizontalDiv.$content;
						}elseif(isset($theChampCounterOptions['bottom'])){
							$content = $content.$horizontalDiv;
						}
					}
				}
			}
		}
		if(isset($theChampCounterOptions['vertical_enable']) && !(isset($sharingMeta['vertical_counter']) && $sharingMeta['vertical_counter'] == 1 && !is_front_page())){
			if(isset($theChampCounterOptions['vertical_target_url'])){
				if($theChampCounterOptions['vertical_target_url'] == 'default'){
					$counterPostUrl = get_permalink($post->ID);
				}elseif($theChampCounterOptions['vertical_target_url'] == 'home'){
					$counterPostUrl = site_url();
				}elseif($theChampCounterOptions['vertical_target_url'] == 'custom'){
					$counterPostUrl = isset($theChampCounterOptions['vertical_target_url_custom']) ? trim($theChampCounterOptions['vertical_target_url_custom']) : get_permalink($post->ID);
				}
			}else{
				$counterPostUrl = get_permalink($post->ID);
			}
			
			$counterUrl = $counterPostUrl;
			// if bit.ly integration enabled, generate bit.ly short url
			if(isset($theChampCounterOptions['bitly_enable']) && isset($theChampCounterOptions['bitly_username']) && isset($theChampCounterOptions['bitly_username']) && $theChampCounterOptions['bitly_username'] != '' && isset($theChampCounterOptions['bitly_key']) && $theChampCounterOptions['bitly_key'] != ''){
				$shortUrl = the_champ_generate_counter_bitly_url($counterPostUrl);
				if($shortUrl){
					$counterUrl = $shortUrl;
				}
			}
			
			$sharingDiv = the_champ_prepare_counter_html($counterPostUrl, 'vertical', $counterUrl);
			$verticalDiv = "<div class='the_champ_counter_container the_champ_vertical_counter' style='".(isset($theChampCounterOptions['alignment']) && $theChampCounterOptions['alignment'] != '' && isset($theChampCounterOptions[$theChampCounterOptions['alignment'].'_offset']) ? $theChampCounterOptions['alignment'].': '. ( $theChampCounterOptions[$theChampCounterOptions['alignment'].'_offset'] == '' ? 0 : $theChampCounterOptions[$theChampCounterOptions['alignment'].'_offset'] ) .'px;' : '').(isset($theChampCounterOptions['top_offset']) ? 'top: '. ( $theChampCounterOptions['top_offset'] == '' ? 0 : $theChampCounterOptions['top_offset'] ) .'px;' : '') . (isset($theChampCounterOptions['vertical_bg']) && $theChampCounterOptions['vertical_bg'] != '' ? 'background-color: '.$theChampCounterOptions['vertical_bg'] . ';' : '-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;') . "'>".$sharingDiv."</div>";
			// show vertical counter
			if((isset( $theChampCounterOptions['vertical_home']) && is_front_page()) || (isset( $theChampCounterOptions['vertical_category']) && is_category()) || ( isset( $theChampCounterOptions['vertical_post'] ) && is_single() && isset($post -> post_type) && $post -> post_type == 'post' ) || ( isset( $theChampCounterOptions['vertical_page'] ) && is_page() && isset($post -> post_type) && $post -> post_type == 'page' ) || ( isset( $theChampCounterOptions['vertical_excerpt'] ) && is_front_page() && current_filter() == 'get_the_excerpt' ) || ( isset( $theChampCounterOptions['vertical_bb_forum'] ) && current_filter() == 'bbp_template_before_single_forum') || ( isset( $theChampCounterOptions['vertical_bb_topic'] ) && in_array(current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic'))) ){
				if( in_array( current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic', 'bbp_template_before_single_forum') ) ){
					echo $verticalDiv;
				}else{
					if(is_front_page()){
						global $theChampVerticalCounterHomeCount, $theChampVerticalCounterExcerptCount;
						if(current_filter() == 'the_content'){
							$var = 'theChampVerticalCounterHomeCount';
						}elseif(current_filter() == 'get_the_excerpt'){
							$var = 'theChampVerticalCounterExcerptCount';
						}
						if($$var == 0){
							if(isset($theChampCounterOptions['vertical_target_url']) && $theChampCounterOptions['vertical_target_url'] == 'default'){
								$counterPostUrl = site_url();
								$counterUrl = $counterPostUrl;
								// if bit.ly integration enabled, generate bit.ly short url
								if(isset($theChampCounterOptions['bitly_enable']) && isset($theChampCounterOptions['bitly_username']) && isset($theChampCounterOptions['bitly_username']) && $theChampCounterOptions['bitly_username'] != '' && isset($theChampCounterOptions['bitly_key']) && $theChampCounterOptions['bitly_key'] != ''){
									$shortUrl = the_champ_generate_counter_bitly_url($counterPostUrl);
									if($shortUrl){
										$counterUrl = $shortUrl;
									}
								}
								
								$sharingDiv = the_champ_prepare_counter_html($counterPostUrl, 'vertical', $counterUrl);
								$verticalDiv = "<div class='the_champ_counter_container the_champ_vertical_counter' style='".(isset($theChampCounterOptions['alignment']) && $theChampCounterOptions['alignment'] != '' && isset($theChampCounterOptions[$theChampCounterOptions['alignment'].'_offset']) ? $theChampCounterOptions['alignment'].': '. ( $theChampCounterOptions[$theChampCounterOptions['alignment'].'_offset'] == '' ? 0 : $theChampCounterOptions[$theChampCounterOptions['alignment'].'_offset'] ) .'px;' : '').(isset($theChampCounterOptions['top_offset']) ? 'top: '. ( $theChampCounterOptions['top_offset'] == '' ? 0 : $theChampCounterOptions['top_offset'] ) .'px;' : '') . (isset($theChampCounterOptions['vertical_bg']) && $theChampCounterOptions['vertical_bg'] != '' ? 'background-color: '.$theChampCounterOptions['vertical_bg'] . ';' : '-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;') . "'>".$sharingDiv."</div>";
							}
							$content = $content.$verticalDiv;
							$$var++;
						}
					}else{
						$content = $content.$verticalDiv;
					}
				}
			}
		}
	}

	if(isset($theChampSharingOptions['enable'])){
		// sharing interface
		if(isset($theChampSharingOptions['hor_enable']) && !(isset($sharingMeta['sharing']) && $sharingMeta['sharing'] == 1 && !is_front_page())){
			if($sharingBpActivity){
				$postUrl = bp_get_activity_thread_permalink();
			}elseif(isset($theChampSharingOptions['horizontal_target_url'])){
				if($theChampSharingOptions['horizontal_target_url'] == 'default'){
					$postUrl = get_permalink($post->ID);
				}elseif($theChampSharingOptions['horizontal_target_url'] == 'home'){
					$postUrl = site_url();
				}elseif($theChampSharingOptions['horizontal_target_url'] == 'custom'){
					$postUrl = isset($theChampSharingOptions['horizontal_target_url_custom']) ? trim($theChampSharingOptions['horizontal_target_url_custom']) : get_permalink($post->ID);
				}
			}else{
				$postUrl = get_permalink($post->ID);
			}
			
			$sharingUrl = $postUrl;
			// if bit.ly integration enabled, generate bit.ly short url
			if(isset($theChampSharingOptions['bitly_enable']) && isset($theChampSharingOptions['bitly_username']) && isset($theChampSharingOptions['bitly_username']) && $theChampSharingOptions['bitly_username'] != '' && isset($theChampSharingOptions['bitly_key']) && $theChampSharingOptions['bitly_key'] != ''){
				$shortUrl = the_champ_generate_sharing_bitly_url($postUrl);
				if($shortUrl){
					$sharingUrl = $shortUrl;
				}
			}
			
			$sharingDiv = the_champ_prepare_sharing_html($sharingUrl, 'horizontal', isset($theChampSharingOptions['horizontal_counts']));
			$sharingContainerStyle = '';
			$sharingTitleStyle = 'style="font-weight:bold"';
			if(isset($theChampSharingOptions['hor_sharing_alignment'])){
				if($theChampSharingOptions['hor_sharing_alignment'] == 'right'){
					$sharingContainerStyle = 'style="float: right"';
				}elseif($theChampSharingOptions['hor_sharing_alignment'] == 'center'){
					$sharingContainerStyle = 'style="float: right;position: relative;left: -50%;text-align: left;"';
					$sharingTitleStyle = 'style="font-weight: bold;list-style: none;position: relative;left: 50%;"';
				}
			}
			$horizontalDiv = "<div style='clear: both'></div><div ". $sharingContainerStyle ." class='the_champ_sharing_container the_champ_horizontal_sharing' super-socializer-data-href='".$postUrl."'><div ". $sharingTitleStyle ." >".ucfirst($theChampSharingOptions['title'])."</div>".$sharingDiv."</div><div style='clear: both'></div>";
			if($sharingBpActivity){
				echo $horizontalDiv;
			}
			// show horizontal sharing		
			if((isset( $theChampSharingOptions['home']) && is_front_page()) || (isset( $theChampSharingOptions['category']) && is_category()) || ( isset( $theChampSharingOptions['post'] ) && is_single() && isset($post -> post_type) && $post -> post_type == 'post' ) || ( isset( $theChampSharingOptions['page'] ) && is_page() && isset($post -> post_type) && $post -> post_type == 'page' ) || ( isset( $theChampSharingOptions['excerpt'] ) && is_front_page() && current_filter() == 'get_the_excerpt' ) || ( isset( $theChampSharingOptions['bb_reply'] ) && current_filter() == 'bbp_get_reply_content' ) || ( isset( $theChampSharingOptions['bb_forum'] ) && (isset( $theChampSharingOptions['top'] ) && current_filter() == 'bbp_template_before_single_forum' || isset( $theChampSharingOptions['bottom'] ) && current_filter() == 'bbp_template_after_single_forum' )) || ( isset( $theChampSharingOptions['bb_topic'] ) && (isset( $theChampSharingOptions['top'] ) && in_array(current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic')) || isset( $theChampSharingOptions['bottom'] ) && in_array(current_filter(), array('bbp_template_after_single_topic', 'bbp_template_after_lead_topic')) ))){
				if( in_array( current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic', 'bbp_template_before_single_forum', 'bbp_template_after_single_topic', 'bbp_template_after_lead_topic', 'bbp_template_after_single_forum') ) ){
					echo '<div style="clear:both"></div>'.$horizontalDiv.'<div style="clear:both"></div>';
				}else{
					if(isset($theChampSharingOptions['top'] ) && isset($theChampSharingOptions['bottom'])){
						$content = $horizontalDiv.'<br/>'.$content.'<br/>'.$horizontalDiv;
					}else{
						if(isset($theChampSharingOptions['top'])){
							$content = $horizontalDiv.$content;
						}elseif(isset($theChampSharingOptions['bottom'])){
							$content = $content.$horizontalDiv;
						}
					}
				}
			}
		}
		if(isset($theChampSharingOptions['vertical_enable']) && !(isset($sharingMeta['vertical_sharing']) && $sharingMeta['vertical_sharing'] == 1 && !is_front_page())){
			if(isset($theChampSharingOptions['vertical_target_url'])){
				if($theChampSharingOptions['vertical_target_url'] == 'default'){
					$postUrl = get_permalink($post->ID);
				}elseif($theChampSharingOptions['vertical_target_url'] == 'home'){
					$postUrl = site_url();
				}elseif($theChampSharingOptions['vertical_target_url'] == 'custom'){
					$postUrl = isset($theChampSharingOptions['vertical_target_url_custom']) ? trim($theChampSharingOptions['vertical_target_url_custom']) : get_permalink($post->ID);
				}
			}else{
				$postUrl = get_permalink($post->ID);
			}
			
			$sharingUrl = $postUrl;
			// if bit.ly integration enabled, generate bit.ly short url
			if(isset($theChampSharingOptions['bitly_enable']) && isset($theChampSharingOptions['bitly_username']) && isset($theChampSharingOptions['bitly_username']) && $theChampSharingOptions['bitly_username'] != '' && isset($theChampSharingOptions['bitly_key']) && $theChampSharingOptions['bitly_key'] != ''){
				$shortUrl = the_champ_generate_sharing_bitly_url($postUrl);
				if($shortUrl){
					$sharingUrl = $shortUrl;
				}
			}
			
			$sharingDiv = the_champ_prepare_sharing_html($sharingUrl, 'vertical', isset($theChampSharingOptions['vertical_counts']));
			$verticalDiv = "<div class='the_champ_sharing_container the_champ_vertical_sharing' style='".(isset($theChampSharingOptions['alignment']) && $theChampSharingOptions['alignment'] != '' && isset($theChampSharingOptions[$theChampSharingOptions['alignment'].'_offset']) && $theChampSharingOptions[$theChampSharingOptions['alignment'].'_offset'] != '' ? $theChampSharingOptions['alignment'].': '.$theChampSharingOptions[$theChampSharingOptions['alignment'].'_offset'].'px;' : '').(isset($theChampSharingOptions['top_offset']) && $theChampSharingOptions['top_offset'] != '' ? 'top: '.$theChampSharingOptions['top_offset'].'px;' : '') . (isset($theChampSharingOptions['vertical_bg']) && $theChampSharingOptions['vertical_bg'] != '' ? 'background-color: '.$theChampSharingOptions['vertical_bg'] : '-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;') . "' super-socializer-data-href='".$postUrl."'>".$sharingDiv."</div>";
			// show vertical sharing
			if((isset( $theChampSharingOptions['vertical_home']) && is_front_page()) || (isset( $theChampSharingOptions['vertical_category']) && is_category()) || ( isset( $theChampSharingOptions['vertical_post'] ) && is_single() && isset($post -> post_type) && $post -> post_type == 'post' ) || ( isset( $theChampSharingOptions['vertical_page'] ) && is_page() && isset($post -> post_type) && $post -> post_type == 'page' ) || ( isset( $theChampSharingOptions['vertical_excerpt'] ) && is_front_page() && current_filter() == 'get_the_excerpt' ) || ( isset( $theChampSharingOptions['vertical_bb_forum'] ) && current_filter() == 'bbp_template_before_single_forum') || ( isset( $theChampSharingOptions['vertical_bb_topic'] ) && in_array(current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic')))){
				if( in_array( current_filter(), array('bbp_template_before_single_topic', 'bbp_template_before_lead_topic', 'bbp_template_before_single_forum') ) ){
					echo $verticalDiv;
				}else{
					if(is_front_page()){
						global $theChampVerticalHomeCount, $theChampVerticalExcerptCount;
						if(current_filter() == 'the_content'){
							$var = 'theChampVerticalHomeCount';
						}elseif(current_filter() == 'get_the_excerpt'){
							$var = 'theChampVerticalExcerptCount';
						}
						if($$var == 0){
							if(isset($theChampSharingOptions['vertical_target_url']) && $theChampSharingOptions['vertical_target_url'] == 'default'){
								$postUrl = site_url();
								$sharingUrl = $postUrl;
								// if bit.ly integration enabled, generate bit.ly short url
								if(isset($theChampSharingOptions['bitly_enable']) && isset($theChampSharingOptions['bitly_username']) && isset($theChampSharingOptions['bitly_username']) && $theChampSharingOptions['bitly_username'] != '' && isset($theChampSharingOptions['bitly_key']) && $theChampSharingOptions['bitly_key'] != ''){
									$shortUrl = the_champ_generate_sharing_bitly_url($postUrl);
									if($shortUrl){
										$sharingUrl = $shortUrl;
									}
								}
								
								$sharingDiv = the_champ_prepare_sharing_html($sharingUrl, 'vertical', isset($theChampSharingOptions['vertical_counts']));
								$verticalDiv = "<div class='the_champ_sharing_container the_champ_vertical_sharing' style='".(isset($theChampSharingOptions['alignment']) && $theChampSharingOptions['alignment'] != '' && isset($theChampSharingOptions[$theChampSharingOptions['alignment'].'_offset']) && $theChampSharingOptions[$theChampSharingOptions['alignment'].'_offset'] != '' ? $theChampSharingOptions['alignment'].': '.$theChampSharingOptions[$theChampSharingOptions['alignment'].'_offset'].'px;' : '').(isset($theChampSharingOptions['top_offset']) && $theChampSharingOptions['top_offset'] != '' ? 'top: '.$theChampSharingOptions['top_offset'].'px;' : '') . (isset($theChampSharingOptions['vertical_bg']) && $theChampSharingOptions['vertical_bg'] != '' ? 'background-color: '.$theChampSharingOptions['vertical_bg'] : '-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;') . "' super-socializer-data-href='".$postUrl."'>".$sharingDiv."</div>";
							}
							$content = $content.$verticalDiv;
							$$var++;
						}
					}else{
						$content = $content.$verticalDiv;
					}
				}
			}
		}
	}
	return $content;
}
add_filter('the_content', 'the_champ_render_sharing');
add_filter('get_the_excerpt', 'the_champ_render_sharing');
if(isset($theChampSharingOptions['bp_activity']) || isset($theChampCounterOptions['bp_activity'])){
	add_action('bp_activity_entry_meta', 'the_champ_render_sharing', 999);
}
add_filter('bbp_get_reply_content', 'the_champ_render_sharing');
add_filter( 'bbp_template_before_single_forum', 'the_champ_render_sharing' );
add_filter( 'bbp_template_before_single_topic', 'the_champ_render_sharing' );
add_filter( 'bbp_template_before_lead_topic', 'the_champ_render_sharing' );
add_filter( 'bbp_template_after_single_forum', 'the_champ_render_sharing' );
add_filter( 'bbp_template_after_single_topic', 'the_champ_render_sharing' );
add_filter( 'bbp_template_after_lead_topic', 'the_champ_render_sharing' );

/**
 * Get sharing count for providers
 */
function the_champ_sharing_count(){
	if(isset($_GET['urls']) && count($_GET['urls']) > 0){
		$targetUrls = array_unique($_GET['urls']);
		foreach($targetUrls as $k => $v){
			$targetUrls[$k] = esc_attr($v);
		}
	}else{
		the_champ_ajax_response(array('status' => 0, 'message' => __('Invalid request')));
	}
	global $theChampSharingOptions;
	$horizontalSharingNetworks = isset($theChampSharingOptions['providers']) ? $theChampSharingOptions['providers'] : array();
	$verticalSharingNetworks = isset($theChampSharingOptions['vertical_providers']) ? $theChampSharingOptions['vertical_providers'] : array();
	$sharingNetworks = array_unique(array_merge($horizontalSharingNetworks, $verticalSharingNetworks));
	if(count($sharingNetworks) == 0){
		the_champ_ajax_response(array('status' => 0, 'message' => __('Providers not selected')));
	}
	$responseData = array();
	foreach($targetUrls as $targetUrl){
		foreach($sharingNetworks as $provider){
			switch($provider){
				case 'facebook':
					$url = 'http://graph.facebook.com/?id=' . $targetUrl;
					break;
				case 'twitter':
					$url = 'http://urls.api.twitter.com/1/urls/count.json?url=' . $targetUrl;
					break;
				case 'linkedin':
					$url = 'http://www.linkedin.com/countserv/count/share?url='. $targetUrl .'&format=json';
					break;
				case 'reddit':
					$url = 'http://www.reddit.com/api/info.json?url='. $targetUrl;
					break;
				case 'delicious':
					$url = 'http://feeds.delicious.com/v2/json/urlinfo/data?url='. $targetUrl;
					break;
				case 'pinterest':
					$url = 'http://api.pinterest.com/v1/urls/count.json?callback=theChamp&url='. $targetUrl;
					break;
				case 'stumbleupon':
					$url = 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url='. $targetUrl;
					break;
				case 'google':
					$url = 'http://share.yandex.ru/gpp.xml?url='. $targetUrl;
					break;
				case 'vkontakte':
					$url = 'https://vk.com/share.php?act=count&url='. $targetUrl;
					break;
				default:
					$url = '';
			}
			if($url == '') { continue; }
			$response = wp_remote_get( $url,  array( 'timeout' => 15 ) );
			if( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && 200 === $response['response']['code'] ){
				$body = wp_remote_retrieve_body( $response );
				if($provider == 'pinterest'){
					$body = str_replace(array('theChamp(', ')'), '', $body);
				}
				if(!in_array($provider, array('google', 'vkontakte'))){
					$body = json_decode($body);
				}
				switch($provider){
					case 'facebook':
						if(!empty($body -> shares)){
							$responseData[$targetUrl]['facebook'] = $body -> shares;
						}else{
							$responseData[$targetUrl]['facebook'] = 0;
						}
						break;
					case 'twitter':
						if(!empty($body -> count)){
							$responseData[$targetUrl]['twitter'] = $body -> count;
						}else{
							$responseData[$targetUrl]['twitter'] = 0;
						}
						break;
					case 'linkedin':
						if(!empty($body -> count)){
							$responseData[$targetUrl]['linkedin'] = $body -> count;
						}else{
							$responseData[$targetUrl]['linkedin'] = 0;
						}
						break;
					case 'reddit':
						$responseData[$targetUrl]['reddit'] = 0;
						if(!empty($body -> data -> children)){
							$children = $body -> data -> children;
							if(!empty($children[0] -> data -> score)){
								$responseData[$targetUrl]['reddit'] = $children[0] -> data -> score;
							}
						}
						break;
					case 'delicious':
						if(!empty($body[0] -> total_posts)){
							$responseData[$targetUrl]['delicious'] = $body[0] -> total_posts;
						}else{
							$responseData[$targetUrl]['delicious'] = 0;
						}
						break;
					case 'pinterest':
						if(!empty($body -> count)){
							$responseData[$targetUrl]['pinterest'] = $body -> count;
						}else{
							$responseData[$targetUrl]['pinterest'] = 0;
						}
						break;
					case 'stumbleupon':
						if(!empty($body -> result) && isset( $body -> result -> views )){
							$responseData[$targetUrl]['stumbleupon'] = $body -> result -> views;
						}else{
							$responseData[$targetUrl]['stumbleupon'] = 0;
						}
						break;
					case 'google':
						if(!empty($body)){
							$responseData[$targetUrl]['google'] = $body;
						}else{
							$responseData[$targetUrl]['google'] = 0;
						}
						break;
					case 'vkontakte':
						if(!empty($body)){
							$responseData[$targetUrl]['vkontakte'] = $body;
						}else{
							$responseData[$targetUrl]['vkontakte'] = 0;
						}
						break;
				}
			}
		}
	}
	the_champ_ajax_response(array('status' => 1, 'message' => $responseData));
}

add_action('wp_ajax_the_champ_sharing_count', 'the_champ_sharing_count');
add_action('wp_ajax_nopriv_the_champ_sharing_count', 'the_champ_sharing_count');

/**
 * Show sharing meta options
 */
function the_champ_sharing_meta_setup(){
	global $post;
	$postType = $post->post_type;
	$sharingMeta = get_post_meta($post->ID, '_the_champ_meta', true);
	?>
	<p>
		<label for="the_champ_sharing">
			<input type="checkbox" name="_the_champ_meta[sharing]" id="the_champ_sharing" value="1" <?php checked('1', @$sharingMeta['sharing']); ?> />
			<?php _e('Disable Horizontal Social Sharing on this '.$postType, 'Super-Socializer') ?>
		</label>
		<br/>
		<label for="the_champ_vertical_sharing">
			<input type="checkbox" name="_the_champ_meta[vertical_sharing]" id="the_champ_vertical_sharing" value="1" <?php checked('1', @$sharingMeta['vertical_sharing']); ?> />
			<?php _e('Disable Vertical Social Sharing on this '.$postType, 'Super-Socializer') ?>
		</label>
		<br/>
		<label for="the_champ_counter">
			<input type="checkbox" name="_the_champ_meta[counter]" id="the_champ_counter" value="1" <?php checked('1', @$sharingMeta['counter']); ?> />
			<?php _e('Disable Horizontal Social Counter on this '.$postType, 'Super-Socializer') ?>
		</label>
		<br/>
		<label for="the_champ_vertical_counter">
			<input type="checkbox" name="_the_champ_meta[vertical_counter]" id="the_champ_vertical_counter" value="1" <?php checked('1', @$sharingMeta['vertical_counter']); ?> />
			<?php _e('Disable Vertical Social Counter on this '.$postType, 'Super-Socializer') ?>
		</label>
		<br/>
		<label for="the_champ_fb_comments">
			<input type="checkbox" name="_the_champ_meta[fb_comments]" id="the_champ_fb_comments" value="1" <?php checked('1', @$sharingMeta['fb_comments']); ?> />
			<?php _e('Disable Facebook Comments on this '.$postType, 'Super-Socializer') ?>
		</label>
		<?php
		if(the_champ_social_sharing_enabled()){
			global $theChampSharingOptions;
			$excludedProviders = array('print', 'email', 'yahoo', 'digg', 'float it', 'tumblr', 'xing');
			if(isset($theChampSharingOptions['hor_enable']) && isset($theChampSharingOptions['horizontal_counts']) && isset($theChampSharingOptions['providers']) && count($theChampSharingOptions['providers']) > 0){
				?>
				<p>
				<strong><?php _e('Horizontal sharing', 'Super-Socializer') ?></strong>
				<?php
				foreach(array_diff($theChampSharingOptions['providers'], $excludedProviders) as $sharingProvider){
					?>
					<br/>
					<label for="the_champ_<?php echo $sharingProvider ?>_horizontal_sharing_count">
						<span style="width: 242px; float:left"><?php _e('Starting share count for ' . ucfirst($sharingProvider), 'Super-Socializer') ?></span>
						<input type="text" name="_the_champ_meta[<?php echo $sharingProvider ?>_horizontal_count]" id="the_champ_<?php echo $sharingProvider ?>_horizontal_sharing_count" value="<?php echo isset($sharingMeta[$sharingProvider.'_horizontal_count']) ? $sharingMeta[$sharingProvider.'_horizontal_count'] : '' ?>" />
					</label>
					<?php
				}
				?>
				</p>
				<?php
			}
			
			if(isset($theChampSharingOptions['vertical_enable']) && isset($theChampSharingOptions['vertical_counts']) && isset($theChampSharingOptions['vertical_providers']) && count($theChampSharingOptions['vertical_providers']) > 0){
				?>
				<p>
				<strong><?php _e('Vertical sharing', 'Super-Socializer') ?></strong>
				<?php
				foreach(array_diff($theChampSharingOptions['vertical_providers'], $excludedProviders) as $sharingProvider){
					?>
					<br/>
					<label for="the_champ_<?php echo $sharingProvider ?>_vertical_sharing_count">
						<span style="width: 242px; float:left"><?php _e('Starting share count for ' . ucfirst($sharingProvider), 'Super-Socializer') ?></span>
						<input type="text" name="_the_champ_meta[<?php echo $sharingProvider ?>_vertical_count]" id="the_champ_<?php echo $sharingProvider ?>_vertical_sharing_count" value="<?php echo isset($sharingMeta[$sharingProvider.'_vertical_count']) ? $sharingMeta[$sharingProvider.'_vertical_count'] : '' ?>" />
					</label>
					<?php
				}
				?>
				</p>
				<?php
			}
		}
		?>
	</p>
	<?php
    echo '<input type="hidden" name="the_champ_meta_nonce" value="' . wp_create_nonce(__FILE__) . '" />';
}

/**
 * Save sharing meta fields.
 */
function the_champ_save_sharing_meta($postId){
    // make sure data came from our meta box
    if(!isset($_POST['the_champ_meta_nonce']) || !wp_verify_nonce( $_POST['the_champ_meta_nonce'], __FILE__ )){
		return $postId;
 	}
    // check user permissions
    if($_POST['post_type'] == 'page'){
        if(!current_user_can('edit_page', $postId)){
			return $postId;
    	}
	}else{
        if(!current_user_can('edit_post', $postId)){
			return $postId;
    	}
	}
    if ( isset( $_POST['_the_champ_meta'] ) ) {
		$newData = $_POST['_the_champ_meta'];
	}else{
		$newData = array( 'sharing' => 0, 'vertical_sharing' => 0, 'counter' => 0, 'vertical_counter' => 0, 'fb_comments' => 0 );
	}
	update_post_meta($postId, '_the_champ_meta', $newData);
    return $postId;
}