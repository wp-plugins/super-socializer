<script>
function theChampFBFeedPost(){
		var params = {};
		params['message'] =  '<?php echo $theChampFacebookOptions['feedMessage'] ?>';
		<?php if(isset($theChampFacebookOptions['feed_name']) && $theChampFacebookOptions['feed_name'] != ''){ ?>
		params['name'] = '<?php echo $theChampFacebookOptions['feed_name'] ?>';
		<?php }
		if(isset($theChampFacebookOptions['feed_description']) && $theChampFacebookOptions['feed_description'] != ''){ ?>
		params['description'] = '<?php echo $theChampFacebookOptions['feed_description'] ?>';
		<?php }
		if(isset($theChampFacebookOptions['feed_link']) && $theChampFacebookOptions['feed_link'] != ''){ ?>
		params['link'] = '<?php echo $theChampFacebookOptions['feed_link'] ?>';
		<?php }
		if(isset($theChampFacebookOptions['feedSource']) && $theChampFacebookOptions['feedSource'] != ''){ ?>
		params['source'] = '<?php echo $theChampFacebookOptions['feedSource'] ?>';
		<?php }
		if(isset($theChampFacebookOptions['feedPicture']) && $theChampFacebookOptions['feedPicture'] != ''){ ?>
		params['picture'] = '<?php echo $theChampFacebookOptions['feedPicture'] ?>';
		<?php }
		if(isset($theChampFacebookOptions['feed_caption']) && $theChampFacebookOptions['feed_caption'] != ''){ ?>
		params['caption'] = '<?php echo $theChampFacebookOptions['feed_caption'] ?>';
		<?php } ?>
		FB.api('/me/feed', 'post', params, function(response) {});
}
</script>