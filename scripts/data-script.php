<?php
// script to pull data from Democracy Club csv and create JSONs
require "functions.php";

// avoid any scripting on public-facing website to avoid trashing any data files
if ($_SERVER['SERVER_ADDR'] == "216.92.68.138")
{
    header("Location: /"); /* Redirect browser */
    exit();
}

//buildRtree($elections, $outDir, $party_prefix, $party_colors);
buildData($CSVs, $use_fields, $req_fields);
buildPtree($elections, $party_prefix, $party_colors);
buildCtree($elections, $party_prefix);

?>