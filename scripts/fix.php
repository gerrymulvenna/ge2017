<?php
require "functions.php";

$json = readJSON("england-regions.json");

$region = array();
foreach ($json as $obj)
{
    $region[$obj->post_id] = $obj->region;
}
print_r($region);


?>

