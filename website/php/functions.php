<?php

function head($title, $mapLat, $mapLong, $mapZoom, $twimg = '/website/image/ge2017map.jpg')
{
    $desc = "Map-based interface to UK General Election data 2017";
    $url = $_SERVER['REQUEST_URI'];
    echo '<!DOCTYPE html>
<html>
<head>';
    echo"    <title>$title</title>\n";
    echo'
    <meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://unpkg.com/leaflet@0.7.7/dist/leaflet.js"></script>
	<script src="https://cdn.rawgit.com/calvinmetcalf/leaflet-ajax/gh-pages/dist/leaflet.ajax.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
	<script src="/website/js/leaflet.pattern.js"></script>
    <script src="/website/js/jstree/jstree.min.js"></script>
  <script src="/website/js/jstree/jstree.types.js"></script>
  <script src="/website/js/jstree/jstree.search.js"></script>
  <script src="/website/js/FeedEk.js"></script>
<script type="text/javascript">
// global vars for maps.js
';
    echo "    var mapLat = $mapLat;\n";
    echo "    var mapLong = $mapLong;\n";
    echo "    var mapZoom = $mapZoom;\n";
    echo '</script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@0.7.7/dist//leaflet.css"/>
	<link rel="stylesheet" type="text/css" href="/website/css/style.css" media="screen, handheld" />
	<link rel="stylesheet" type="text/css" href="/website/css/parties.css" media="screen, handheld" />
	<link rel="stylesheet" type="text/css" href="/website/css/enhanced.css" media="screen  and (min-width: 50.5em)" />
    <link rel="stylesheet" href="/website/css/font-awesome.min.css">
	<link rel="stylesheet" href="/website/js/jstree/themes/default/style.min.css" />
	<link rel="icon" type="image/png" href="/website/image/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="/website/image/favicon-16x16.png" sizes="16x16" />
		<!--[if (lt IE 9)&(!IEMobile)]>
		<link rel="stylesheet" type="text/css" href="enhanced.css" />
		<![endif]-->
    <meta name="description" content="' . $desc . '" />
    <meta name="keywords" content="United Kingdom, general election, open data, #GE2017, politics, democracy club, parliamentary candidates, voting, first-past-the-post, Westminster"
    />
    <meta name="author" content="Gerry Mulvenna">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 month">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@gerrymulvenna" />
    <meta name="twitter:creator" content="@gerrymulvenna" />
    <meta property="og:url" content="' . $url . '" />
    <meta property="og:title" content="' . $title . '" />
    <meta property="og:description" content="' . $desc . '" />
';
echo "    <meta property=\"og:image\" content=\"https://" . $_SERVER['SERVER_NAME'] . "$twimg\" />\n";
echo '

</head>
<body>
	<div id="wrap">
';

}

function navigation($title, $param2 = NULL, $param3 = NULL, $param4 = NULL)
{
    echo"<header><h1><a href = \"/\">$title</a></h1><p>Explore results and candidates for the UK General Election #GE2017</p></header>\n";
    echo'
        <label for="show-menu" class="show-menu">Menu</label>
        <input type="checkbox" id="show-menu" role="button">
        <div id="cssmenu">
            <ul>
                <li><a href="/map/"><span>Map</span></a></li>
                <li><a href="/treeview/by-constituency.php"><span>Constituencies</span></a></li>
                <li><a href="/treeview/by-party.php"><span>Parties</span></a></li>
                <li><a href="/postcode/"><span>Postcode</span></a></li>
            </ul>
        </div>';
}

function foot($treeview = False, $param2 = False, $param3 = NULL, $param4 = NULL)
{
echo '
	</div>';
if ($treeview)
{
echo '
        <script src="/website/js/treeview.js"></script>
    ';
}
else
{

    echo '
        <script src="/website/js/map.js"></script>
        <script src="/website/js/overview.js"></script>
        <script src="/website/js/treeview.js"></script>
    ';
}
// Google analytics
echo"<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12076032-18', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>";
}

?>