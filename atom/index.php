<?php

// side-stepping the domain restrictions in javascript to get hold of the Democracy Club atom feed fro results
// https://www.sitepoint.com/jsonp-examples/

$url = "https://candidates.democracyclub.org.uk/results/all.atom";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec ($ch);
curl_close ($ch);
echo $result;

?>