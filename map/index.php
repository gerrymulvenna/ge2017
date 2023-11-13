<?php
require $_SERVER["DOCUMENT_ROOT"] . "/website/php/functions.php";

// --------- council specific variables in this section --------
// this should be the council identifier consistent with Democracy Club data, this website and to a certain extent the map data
// used in the mapName js variable, the twitter image, the breadcrumb link
$mapLat = 55.4;              // good centre position for the map
$mapLong = -4.0;          // good centre position for the map 
$mapZoom = 5;                // zoom level starting position

// ------ below here should be the same for each council (but this is the top-level, so it has different content --------


// function head($title, $mapName, $mapLat, $mapLong, $mapZoom, $mapProperty, $mapUnit, $mapWardDesc, $twimg)
head("#ge2017 - Map-based interface to crowd-sourced data for the UK General Election 2017", $mapLat, $mapLong, $mapZoom, "/website/image/ge2017map.jpg");
navigation("UK General Election 2017");
echo '
<div class="content">
			<div id="map"></div>
            <div id="details">
';
echo'
            <div id="tabs-container">
                <ul class="tabs-menu">
                    <li ><a name="tab1" href="#candidates-2017">2017<br>candidates</a></li>
                    <li><a href="#candidates-2015">2015<br>candidates</a></li>
                    <li class="current"><a href="#uk-2017">2017<br>All UK</a></li>
                    <li><a href="#uk-2015">2015<br>All UK</a></li>
                    <li><a href="#search-tab">Search</a></li>
                </ul>
                <div class="tab">
                    <div id="candidates-2017" class="tab-content"></div>
                    <div id="candidates-2015" class="tab-content"></div>
                    <div id="uk-2017" class="tab-content">
                        <div id="uk2017header">
                        </div>
                        <div id="uk2017chart">
                        </div>
                    </div>
                    <div id="uk-2015" class="tab-content">
                        <div id="uk2015header">
                        </div>
                        <div id="uk2015chart">
                        </div>
                    </div>
                    <div id="search-tab" class="tab-content">
                        <h3>Explore and search 2017 candidates</h3>
                        <p>Click on a constituency or candidate to locate on map</p>
                        <div id="tree-ack"><div id="dc-caption">This full set of candidate data was collated by</div><div id="dc-logo"><a href="http://democracyclub.org.uk"><img src="/website/image/dc-logo-with-text-2017.png" width="250"></a></div></div>
                            <input type="text" id="map-tree-search" value="" class="input" placeholder="Find candidate or constituency" />
                            <div id="map-tree" class="demo"></div>
                    </div>
                </div>
            </div>
            <div id="dcAtom"></div>
		</div>';
foot();
?>