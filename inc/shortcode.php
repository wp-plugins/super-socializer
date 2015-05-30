<?php
defined('ABSPATH') or die("Cheating........Uh!!");
/** 
 * Shortcode for Social Sharing.
 */ 
function the_champ_sharing_shortcode($params){
	// notify if sharing is disabled
	if(the_champ_social_sharing_enabled()){
		global $theChampSharingOptions;
		extract(shortcode_atts(array(
			'style' => '',
			'type' => 'horizontal',
			'left' => '0',
			'right' => '0',
			'top' => '100',
			'url' => '',
			'count' => 0,
			'align' => 'left'
		), $params));
		if(($type == 'horizontal' && !the_champ_horizontal_sharing_enabled()) || ($type == 'vertical' && !the_champ_vertical_sharing_enabled())){
			return;
		}
		global $post;
		if($url){
			$targetUrl = $url;
			$postId = 0;
		}elseif(get_permalink($post -> ID)){
			$targetUrl = get_permalink($post -> ID);
			$postId = $post -> ID;
		}else{
			$targetUrl = the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			$postId = 0;
		}
		// if bit.ly url shortener enabled, generate bit.ly short url
		$shortUrl = '';
		if(isset($theChampSharingOptions['use_shortlinks']) && function_exists('wp_get_shortlink')){
			$shortUrl = wp_get_shortlink();
			// if bit.ly integration enabled, generate bit.ly short url
		}elseif(isset($theChampSharingOptions['bitly_enable']) && isset($theChampSharingOptions['bitly_username']) && $theChampSharingOptions['bitly_username'] != '' && isset($theChampSharingOptions['bitly_key']) && $theChampSharingOptions['bitly_key'] != ''){
			$shortUrl = the_champ_generate_sharing_bitly_url($targetUrl, $postId);
		}
		$alignmentOffset = 0;
		if($left){
			$alignmentOffset = $left;
		}elseif($right){
			$alignmentOffset = $right;
		}
		$html = '<div class="the_champ_sharing_container the_champ_'.$type.'_sharing" ss-offset="' . $alignmentOffset . '" super-socializer-data-href="'.$targetUrl.'" ';
		$verticalOffsets = '';
		if($type == 'vertical'){
			$verticalOffsets = $align . ': '.$$align.'px; top: '.$top.'px;width:' . ((isset($theChampSharingOptions['vertical_sharing_size']) ? $theChampSharingOptions['vertical_sharing_size'] : '35') + 4) . "px;";
		}
		// style 
		if($style != "" || $verticalOffsets != ''){
			$html .= 'style="';
			if(strpos($style, 'background') === false){ $html .= '-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;'; }
			$html .= $verticalOffsets;
			$html .= $style;
			$html .= '"';
		}
		$html .= '>';
		$html .= the_champ_prepare_sharing_html($shortUrl == '' ? $targetUrl : $shortUrl, $type, $count);
		$html .= '</div>';
		if($count){
			$html .= '<script>theChampLoadEvent(
		function(){
			// sharing counts
			theChampCallAjax(function(){
				theChampGetSharingCounts('. ($type == 'horizontal' ? 1 : 0) .', '. ($type == 'vertical' ? 1 : 0) .');
			});
		}
	);</script>';
		}
		return $html;
	}
}
add_shortcode('TheChamp-Sharing', 'the_champ_sharing_shortcode');

/** 
 * Shortcode for Social Counter.
 */ 
function the_champ_counter_shortcode($params){
	// notify if counter is disabled
	if(the_champ_social_counter_enabled()){
		extract(shortcode_atts(array(
			'style' => '',
			'type' => 'horizontal',
			'left' => '0',
			'right' => '0',
			'top' => '100',
			'url' => '',
			'align' => 'left'
		), $params));
		if(($type == 'horizontal' && !the_champ_horizontal_counter_enabled()) || ($type == 'vertical' && !the_champ_vertical_counter_enabled())){
			return;
		}
		global $post;
		if($url){
			$targetUrl = $url;
			$postId = 0;
		}elseif(get_permalink($post -> ID)){
			$targetUrl = get_permalink($post -> ID);
			$postId = $post -> ID;
		}else{
			$targetUrl = the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
			$postId = 0;
		}
		$alignmentOffset = 0;
		if($left){
			$alignmentOffset = $left;
		}elseif($right){
			$alignmentOffset = $right;
		}
		$html = '<div class="the_champ_counter_container the_champ_'.$type.'_counter" ss-offset="' . $alignmentOffset . '" ';
		$verticalOffsets = '';
		if($type == 'vertical'){
			$verticalOffsets = $align . ': '.$$align.'px; top: '.$top.'px;';
		}
		// style 
		if($style != "" || $verticalOffsets != ''){
			$html .= 'style="';
			if(strpos($style, 'background') === false){ $html .= '-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;'; }
			$html .= $verticalOffsets;
			$html .= $style;
			$html .= '"';
		}
		$html .= '>';
		global $theChampCounterOptions;
		$counterUrl = $targetUrl;
		if(isset($theChampCounterOptions['use_shortlinks']) && function_exists('wp_get_shortlink')){
			$counterUrl = wp_get_shortlink();
			// if bit.ly integration enabled, generate bit.ly short url
		}elseif(isset($theChampCounterOptions['bitly_enable']) && isset($theChampCounterOptions['bitly_username']) && isset($theChampCounterOptions['bitly_username']) && $theChampCounterOptions['bitly_username'] != '' && isset($theChampCounterOptions['bitly_key']) && $theChampCounterOptions['bitly_key'] != ''){
			$shortUrl = the_champ_generate_counter_bitly_url($targetUrl, $postId);
			if($shortUrl){
				$counterUrl = $shortUrl;
			}
		}
		$html .= the_champ_prepare_counter_html($targetUrl, $type, $counterUrl);
		$html .= '</div>';
		return $html;
	}
}
add_shortcode('TheChamp-Counter', 'the_champ_counter_shortcode');

/** 
 * Shortcode for Social Login.
 */ 
function the_champ_login_shortcode($params){
	if(the_champ_social_login_enabled()){
		extract(shortcode_atts(array(
			'style' => ''
		), $params));
		$html = '<div ';
		// style 
		if($style != ""){
			if(strpos($style, 'float') === false){
				$style = 'float: left;' . $style;
			}
			$html .= 'style="'.$style.'"';
		}
		$html .= '>';
		$html .= the_champ_login_button(true);
		$html .= '</div><div style="clear:both"></div>';
		return $html;
	}
}
add_shortcode('TheChamp-Login', 'the_champ_login_shortcode');

/** 
 * Shortcode for Facebook Comments.
 */ 
function the_champ_fb_commenting_shortcode($params){
	extract(shortcode_atts(array(
		'style' => '',
		'url' => get_permalink(),
		'num_posts' => '',
		'width' => '',
		'language' => 'en_US'
	), $params));
	$html = '<div style="'. $style .'" id="the_champ_fb_commenting"> <div class="fb-comments" data-href="' .($url == '' ? the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] : $url). '"';
    $html .= ' data-numposts="' . $num_posts . '"';
    $html .= ' data-width="' . ($width == '' ? '100%' : $width) . '"';
    $html .= ' ></div></div><script type="text/javascript" src="//connect.facebook.net/' . $language . '/sdk.js
    "></script><script>FB.init({xfbml:1,version: "v2.3"});</script>';
	return $html;
}
add_shortcode('TheChamp-FB-Comments', 'the_champ_fb_commenting_shortcode');

/** 
 * Shortcode for GooglePlus Comments.
 */ 
function the_champ_gp_commenting_shortcode($params){
	extract(shortcode_atts(array(
		'style' => '',
		'url' => get_permalink(),
		'width' => '',
	), $params));
	$html = '<div style="'. $style .'" id="the_champ_gp_commenting">';
    $html .= "<div class='g-comments' data-href='" . ($url == '' ? the_champ_get_http().$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] : $url) . "' ". ($width ? "data-width='" .$width. "'" : "" ) ." data-first_party_property='BLOGGER' data-view_type='FILTERED_POSTMOD' ></div>";
    $html .= '</div><script type="text/javascript" src="//apis.google.com/js/plusone.js"></script>';
	return $html;
}
add_shortcode('TheChamp-GP-Comments', 'the_champ_gp_commenting_shortcode');