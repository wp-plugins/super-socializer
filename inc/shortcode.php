<?php
defined('ABSPATH') or die("Cheating........Uh!!");
/** 
 * Shortcode for Social Sharing.
 */ 
function the_champ_sharing_shortcode($params){
	// notify if sharing is disabled
	if(the_champ_social_sharing_enabled()){
		extract(shortcode_atts(array(
			'style' => '',
			'type' => 'horizontal',
			'left' => '0',
			'top' => '100',
		), $params));
		if(($type == 'horizontal' && !the_champ_horizontal_sharing_enabled()) || ($type == 'vertical' && !the_champ_vertical_sharing_enabled())){
			return;
		}
		global $post;
		$targetUrl = get_permalink($post -> ID);
		$html = '<div class="the_champ_sharing_container the_champ_'.$type.'_sharing" super-socializer-data-href="'.$targetUrl.'" ';
		$verticalOffsets = '';
		if($type == 'vertical'){
			$verticalOffsets = 'left: '.$left.'px; top: '.$top.'px;';
		}
		// style 
		if($style != "" || $verticalOffsets != ''){
			$html .= 'style="';
			$html .= $verticalOffsets;
			$html .= $style;
			$html .= '"';
		}
		$html .= '>';
		$html .= the_champ_prepare_sharing_html($targetUrl, $type);
		$html .= '</div>';
		return $html;
	}
}
add_shortcode('TheChamp-Sharing', 'the_champ_sharing_shortcode');

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