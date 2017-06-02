<?php
require $_SERVER["DOCUMENT_ROOT"] . "/website/php/functions.php";

// --------- council specific variables in this section --------
// this should be the council identifier consistent with Democracy Club data, this website and to a certain extent the map data
// used in the mapName js variable, the twitter image, the breadcrumb link
$mapLat = 57.6;              // good centre position for the map
$mapLong = -4.2247;          // good centre position for the map 
$mapZoom = 6;                // zoom level starting position

// ------ below here should be the same for each council (but this is the top-level, so it has different content --------


// function head($title, $mapName, $mapLat, $mapLong, $mapZoom, $mapProperty, $mapUnit, $mapWardDesc, $twimg)
head("#ge2017 - Map-based interface to crowd-sourced data for the UK General Election 2017", $mapLat, $mapLong, $mapZoom, "/website/image/scotland.png");
navigation("UK General Election 2017");
echo '
<div class="content">
			<div id="map"></div>
            <div id="details">
                <div id="constinfo"></div>
';
echo'
            <div id="electorate"></div>
            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li class="current"><a id="ctab" href="#ge2015">2015</a></li>
                    <li><a href="#ge2017">2017</a></li>
                </ul>
                <div class="tab">
                    <div id="ge2015" class="tab-content"></div>
                    <div id="ge2017" class="tab-content"></div>
                </div>
            </div>
            <div id="candidates"></div>
		</div>';
foot();
?>