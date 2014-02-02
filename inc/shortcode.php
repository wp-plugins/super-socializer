<?php
/** 
 * Shortcode for Social Sharing.
 */ 
function the_champ_sharing_shortcode($params){
	extract(shortcode_atts(array(
		'style' => ''
	), $params));
	$html = '<div class="the_champ_sharing_container" ';
	// style 
	if($style != ""){
		$html .= 'style="'.$style.'"';
	}
	$html .= '>';
	$html .= the_champ_prepare_sharing_html();
	$html .= '</div>';
	return $html;
}
add_shortcode('TheChamp-Sharing', 'the_champ_sharing_shortcode');

/** 
 * Shortcode for Social Login.
 */ 
function the_champ_login_shortcode($params){
	extract(shortcode_atts(array(
		'style' => ''
	), $params));
	$html = '<div ';
	// style 
	if($style != ""){
		$html .= 'style="'.$style.'"';
	}
	$html .= '>';
	$html .= the_champ_login_button(true);
	$html .= '</div>';
	return $html;
}
add_shortcode('TheChamp-Login', 'the_champ_login_shortcode');