<?php
// script to pull data from Democracy Club csv and create JSONs
require "functions.php";

//buildRtree($elections, $outDir, $party_prefix, $party_colors);
buildData($CSVs, $use_fields, $req_fields);
buildPtree($elections, $party_prefix, $party_colors);
buildCtree($elections, $party_prefix);

?>