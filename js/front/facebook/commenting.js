function theChampRenderFBCommenting() {
    var t = document.getElementById("respond");
    if(!t){
        return;
    }
    var htmls = [];
    var scripts = [];
    var scriptsSrc = [];
    // wordpress
    htmls['wordpress'] = '<div style="clear:both"></div>' + t.innerHTML;
    // facebook
    theChampFBCommentingContent = '<div class="fb-comments" data-href="' + theChampFBCommentUrl + '"', "" != theChampFBCommentColor && (theChampFBCommentingContent += ' data-colorscheme="' + theChampFBCommentColor + '"'), "" != theChampFBCommentNumPosts && (theChampFBCommentingContent += ' data-numposts="' + theChampFBCommentNumPosts + '"'), theChampFBCommentingContent += ' data-width="' + theChampFBCommentWidth + '"', "" != theChampFBCommentOrderby && (theChampFBCommentingContent += ' data-order-by="' + theChampFBCommentOrderby + '"'), "" != theChampFBCommentMobile && (theChampFBCommentingContent += ' data-mobile="' + theChampFBCommentMobile + '"'), theChampFBCommentingContent += " ></div>";
    htmls['fb'] = theChampFBCommentingContent;
    scripts['fb'] = 'theChampInitiateFB();';
    
    // googleplus
    htmls['googleplus'] = "<div class='g-comments' data-href='" + theChampGpCommentsUrl + "' "+ (theChampGpCommentsWidth ? "data-width='"+ theChampGpCommentsWidth +"'" : "") +" data-first_party_property='BLOGGER' data-view_type='FILTERED_POSTMOD' ></div>";
    scripts['googleplus'] = ' ';
    scriptsSrc['googleplus'] = '//apis.google.com/js/plusone.js';

    // disqus
    htmls['disqus'] = '<div class="embed-container clearfix" id="disqus_thread">' + (theChampDisqusShortname != '' ? theChampDisqusShortname : '<div style="font-size: 14px;clear: both;">Specify a Disqus shortname in Super Socializer &gt; Social Commenting section in admin panel</div>') + '</div>';
    scripts['disqus'] = "var disqus_shortname = '" + theChampDisqusShortname + "';(function(d) {var dsq = d.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js'; (d.getElementsByTagName('head')[0] || d.getElementsByTagName('body')[0]).appendChild(dsq); })(document);";
    var commentingHtml = '<div class="theChampCommentingTabs"><h3 id="theChampReplyTitle" style="margin-bottom:15px" class="comment-reply-title">'+ theChampScLabel +'</h3><ul>';
    theChampScEnabledTabs = theChampScEnabledTabs.split(',');
    for(var i = 0; i < theChampScEnabledTabs.length; i++){
        commentingHtml += '<li id="theChampTabs-'+ i +'-li" onclick="';
        commentingHtml += 'this.setAttribute(\'class\', \'theChampSelectedTab\');document.getElementById(\'theChampTabs-'+ i +'\').style.display=\'block\';';
        if(theChampScEnabledTabs[i] == 'fb'){
            commentingHtml += 'theChampInitiateFB();';
        }
        for(var j = 0; j < theChampScEnabledTabs.length; j++){
            if(j != i){
                commentingHtml += 'document.getElementById(\'theChampTabs-' + j + '-li\').setAttribute(\'class\', \'\');document.getElementById(\'theChampTabs-'+ j +'\').style.display=\'none\';';
            }
        }
        commentingHtml += '">';
        commentingHtml += theChampScTabLabels[theChampScEnabledTabs[i]];
        commentingHtml += '</li>';
    }
    commentingHtml += '</ul>';
    for(var i = 0; i < theChampScEnabledTabs.length; i++){
        commentingHtml += '<div id="theChampTabs-' + i + '"><div style="clear: both"></div>' + htmls[theChampScEnabledTabs[i]] + '</div>';
    }
    commentingHtml += '</div>';
    t.innerHTML = commentingHtml;
    var replyTitle = document.getElementById("reply-title");
    if(replyTitle){ replyTitle.remove(); }
    for(var i = 0; i < theChampScEnabledTabs.length; i++){
        if(scripts[theChampScEnabledTabs[i]]){
            var script = document.createElement('script');
            if(scriptsSrc[theChampScEnabledTabs[i]]){
                script.setAttribute('src', scriptsSrc[theChampScEnabledTabs[i]]);
            }
            script.innerHTML = scripts[theChampScEnabledTabs[i]];
            document.getElementById('theChampTabs-' + i).appendChild(script);
        }
    }
    document.getElementById('theChampTabs-0-li').setAttribute('class', 'theChampSelectedTab');
    setTimeout(function(){
        for(var i = 1; i < theChampScEnabledTabs.length; i++){
           document.getElementById('theChampTabs-' + i).style.display = 'none';
        }
    }, 3000);
}
theChampLoadEvent(function() {
    theChampRenderFBCommenting()
});