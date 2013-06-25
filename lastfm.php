<!-- 
DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
                    Version 2, December 2004
 
 Copyright (C) 2004 Sam Hocevar
  14 rue de Plaisance, 75014 Paris, France
 Everyone is permitted to copy and distribute verbatim or modified
 copies of this license document, and changing it is allowed as long
 as the name is changed.
 
            DO WHAT THE FUCK YOU WANT TO PUBLIC LICENSE
   TERMS AND CONDITIONS FOR COPYING, DISTRIBUTION AND MODIFICATION
 
  0. You just DO WHAT THE FUCK YOU WANT TO. 
-->

<?php
    #check if a lastfm Username was given as a parameter
    if(isset($_GET['lastfmusername'])) {
        $feed = file_get_contents ('http://ws.audioscrobbler.com/1.0/user/'.$_GET['lastfmusername'].'/recenttracks.rss');
        $returnurl = $_SERVER['PHP_SELF'].'?lastfmusername='.$_GET['lastfmusername'];
    #if not, use mine
    } else {
        $feed = file_get_contents ('http://ws.audioscrobbler.com/1.0/user/schlingel-de/recenttracks.rss');
        $returnurl = $_SERVER['PHP_SELF'];
    }
    #split the xml after the first <item> element as we only care about the last track (i.e. the first item)
    $feedItem = explode("<item>", $feed);
    #split everything after the first <item> at the first occurrence of <title> as this is where the info we want is located
    $track = explode("<title>", $feedItem[1]);
    #split at the </title> so we can discard everything after the atual title information
    $track = explode("</title>", $track[1]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
       "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META HTTP-EQUIV="content-type" CONTENT="text/html; charset=utf-8">
<meta http-equiv="refresh" content="5; url=<?php echo($returnurl); ?>">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> <!--JQuery-->

<script type="text/javascript">
$(document).ready(function() {
	var originalFontSize = 11;
	var sectionWidth = $('#titleinfo').width();

	$('#titleinfo span').each(function(){
		var spanWidth = $(this).width();
		var newFontSize = (sectionWidth/spanWidth) * originalFontSize;
		if (newFontSize > 64) {
		  newFontSize = 64;
        }
		$(this).css({"font-size" : newFontSize});
	});
});
</script>

<style>
#titleinfo{
	color: #fff;
	width: 1060px;
	height: 64px;
	font-size: 12px;
	line-height: 64px;
	font-weight: bold;
	text-align: center;
	font-family: "Roadgeek 2005 Series D";
}
</style>
</head>
<body>
    <div id="titleinfo">
    <span><?php echo (strtoupper($track[0])); ?></span>
    </div>
</body>
</html>