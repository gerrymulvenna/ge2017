<?php
// script to pull data from Democracy Club csv and create JSONs
require "functions.php";

//buildRtree($elections, $outDir, $party_prefix, $party_colors);
buildData($CSVs, $use_fields, $req_fields, "../scripts");
buildPtree($elections, $party_prefix, $party_colors, "../scripts/england-regions.json");
buildCtree($elections, $party_prefix, "../scripts/england-regions.json");

?>