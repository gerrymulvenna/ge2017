<?php

require "../scripts/functions.php";

if ($_SERVER['SERVER_ADDR'] == "216.92.68.138")
{
    $url = "https://candidates.democracyclub.org.uk/results/all.atom";
}
else
{
    $url = "https://stage:ilovedemocracy@stage.candidates.democracyclub.org.uk/results/all.atom";
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
$str = curl_exec ($ch);
curl_close ($ch);

$xml = simplexml_load_string($str);

$elections = array();
$elected = array();
$retracted = array();
foreach ($xml->entry as $item)
{
    $election = $item->election_slug->__toString();
    $updated = $item->updated->__toString();
    if (array_key_exists($election, $elections))
    {
        if ($updated > $elections[$election])
        {
            $elections[$election] = $updated;
        }
    }
    else
    {
        $elections[$election] = $updated;
    }            
    $post_id = $item->post_id->__toString();
    if ($item->retracted->__toString() == "1")
    {
        $retracted[$election][$post_id] = $item->winner_person_id->__toString();
    }
    $elected[$election][$post_id] = $item->winner_person_id->__toString();
}

$archive = 0;
foreach ($elections as $election => $updated)
{
    $fname = $election . ".json";
    if (file_exists($fname))
    {
        $json = readJSON($fname);
        if ($updated > $json->updated)
        {
            $json->updated = $updated;
            $json->last_id++;
            // add any results with retracted flag set
            foreach ($retracted[$election] as $post_id => $id)
            {
                if ($elected[$post_id] == $id)
                {
                    unset($json->elected[$post_id]);
                }
            }
            foreach ($elected[$election] as $post_id => $id)
            {
                if (!in_array($post_id, array_keys($json->elected)))
                {
                    $json->elected[$post_id] = $id;
                }
            }
            writeJSON($json, $fname);
            $archive++;
         }
    }
    else
    {
        $json = array("last_id"=>1, "updated"=>$updated, "elected" => $elected[$election]);
        writeJSON($json, $fname);
        $archive++;
    }
}
if ($archive)
{
    $fname = "archive/" . date("Y-m-d-His") . ".xml";
    file_put_contents($fname, $str);
}

?>