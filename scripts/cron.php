<?php
// script to pull data from Democracy Club csv and create JSONs
require "functions.php";

//buildRtree($elections, $outDir, $party_prefix, $party_colors);
buildData($CSVs, $use_fields, $req_fields, "/usr/home/movgwifi/public_html/ge2017.mulvenna.org/scripts");
buildPtree($elections, $party_prefix, $party_colors, "/usr/home/movgwifi/public_html/ge2017.mulvenna.org/scripts/england-regions.json");
buildCtree($elections, $party_prefix, "/usr/home/movgwifi/public_html/ge2017.mulvenna.org/scripts/england-regions.json");

?>
