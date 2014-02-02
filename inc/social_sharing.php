<?php
/**
 * File contains the functions necessary for Social Sharing functionality
 */
 
/**
 * Render sharing interface html.
 */
function the_champ_prepare_sharing_html(){
	global $theChampSharingOptions, $post;
	if(isset($theChampSharingOptions['horizontal_re_providers'])){
		$html = '';
		foreach($theChampSharingOptions['horizontal_re_providers'] as $provider){
			if($provider == 'print'){
				$html .= '<img alt="Print" Title="Print" src=\''.plugins_url('../images/sharing/'.$provider.'.png', __FILE__).'\' onclick=\'window.print()\' />';
			}elseif($provider == 'email'){
				$html .= '<img alt="Email" Title="Email" src="'.plugins_url('../images/sharing/'.$provider.'.png', __FILE__).'" onclick="window.location.href = \'mailto:?subject=\' + escape(\'Have a look at this website\') + \'&body=\' + escape(\''.get_permalink($post->ID).'\')" />';
			}else{
				if($provider == 'facebook'){
					$sharingUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink($post->ID);
				}elseif($provider == 'twitter'){
					$sharingUrl = 'https://twitter.com/share?url=' . get_permalink($post->ID);
				}elseif($provider == 'linkedin'){
					$sharingUrl = 'http://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink($post->ID);
				}elseif($provider == 'google'){
					$sharingUrl = 'https://plus.google.com/share?url=' . get_permalink($post->ID);
				}elseif($provider == 'yahoo'){
					$sharingUrl = 'http://bookmarks.yahoo.com/toolbar/SaveBM/?u=' . get_permalink($post->ID) . '&t=' . $post->post_title . '&d=' . substr($post->post_content, 0, 100);
				}elseif($provider == 'reddit'){
					$sharingUrl = 'http://reddit.com/submit?url='.get_permalink($post->ID).'&title=' . $post->post_title;
				}elseif($provider == 'digg'){
					$sharingUrl = 'http://digg.com/submit?url='.get_permalink($post->ID).'&title=' . $post->post_title;
				}elseif($provider == 'delicious'){
					$sharingUrl = 'http://del.icio.us/post?url='.get_permalink($post->ID).'&title=' . $post->post_title;
				}elseif($provider == 'stumbleupon'){
					$sharingUrl = 'http://www.stumbleupon.com/submit?url='.get_permalink($post->ID).'&title=' . $post->post_title;
				}elseif($provider == 'float it'){
					$sharingUrl = 'http://www.designfloat.com/submit.php?url='.get_permalink($post->ID).'&title=' . $post->post_title;
				}elseif($provider == 'tumblr'){
					$sharingUrl = 'http://www.tumblr.com/share?v=3&u='.urlencode(get_permalink($post->ID)).'&t=' . urlencode($post->post_title) . '&s=';
				}
				$html .= '<img alt="'.($provider == 'google' ? 'Google Plus' : ucfirst($provider)).'" Title="'.($provider == 'google' ? 'Google Plus' : ucfirst($provider)).'" src=\''.plugins_url('../images/sharing/'.str_replace(' ', '_', $provider).'.png', __FILE__).'\' onclick=\'theChampPopup("'.$sharingUrl.'")\' />';
			}
		}
	}
	return $html;
}

/**
 * Enable sharing interface at selected areas.
 */
function the_champ_render_sharing($content){
	global $post;
	$sharingMeta = get_post_meta($post->ID, '_the_champ_meta', true);
	// if sharing is disabled on this page/post, return content unaltered
	if(isset($sharingMeta['sharing']) && $sharingMeta['sharing'] == 1 && !is_front_page()){
		return $content;
	}
	global $theChampSharingOptions;
	$sharingDiv = the_champ_prepare_sharing_html();
	$horizontalDiv = "<div class='the_champ_sharing_container'><div style='margin:0; font-weight:bold'>".ucfirst($theChampSharingOptions['title'])."</div>".$sharingDiv."</div>";
	// show horizontal sharing		
	if((isset( $theChampSharingOptions['home']) && is_front_page()) || ( isset( $theChampSharingOptions['post'] ) && is_single() ) || ( isset( $theChampSharingOptions['page'] ) && is_page() ) || ( isset( $theChampSharingOptions['excerpt'] ) && is_front_page() && current_filter() == 'get_the_excerpt' )){	
		if(isset($theChampSharingOptions['top'] ) && isset($theChampSharingOptions['bottom'])){
			$content = $horizontalDiv.'<br/>'.$content.'<br/>'.$horizontalDiv;
		}else{
			if(isset($theChampSharingOptions['top'])){
				$content = $horizontalDiv.$content;
			}
			elseif(isset($theChampSharingOptions['bottom'])){
				$content = $content.$horizontalDiv;
			}
		}
	}
	
	return $content;
}
add_filter('the_content', 'the_champ_render_sharing');
add_filter('get_the_excerpt', 'the_champ_render_sharing');