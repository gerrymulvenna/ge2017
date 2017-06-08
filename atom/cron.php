<?php

require "../scripts/functions.php";

$url = "https://candidates.democracyclub.org.uk/results/all.atom";

while(1)
{
    $ret = pollFeed($url, "../atom");

    if ($ret)
    {
        buildData($CSVs, $use_fields, $req_fields, "../scripts");
        buildPtree($elections, $party_prefix, $party_colors, "../scripts/england-regions.json");
        buildCtree($elections, $party_prefix, "../scripts/england-regions.json");
    }    
    else
    {
        echo "<p>Nothing to do</p>\n";
    }
    sleep(60);
}
?>