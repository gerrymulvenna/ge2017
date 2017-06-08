<?php

$dataRoot = "https://candidates.democracyclub.org.uk/media/candidates-";
$rid = 5000;

$elections = array(
"parl.2017-06-08",
"parl.2015-05-07");

$use_fields = array(
"id",
"name",
"party_id",
"party_name",
"elected",
"email",
"twitter_username",
"facebook_page_url",
"party_ppc_page_url",
"facebook_personal_url",
"homepage_url",
"wikipedia_url",
"linkedin_url",
"image_url",
"parlparse_id",
"theyworkforyou_url",
"party_ec_id");

$req_fields = array(
"id",
"name",
"elected");

$CSVs = array(
"https://candidates.democracyclub.org.uk/media/candidates-parl.2017-06-08.csv" => "parl.2017-06-08",
"https://candidates.democracyclub.org.uk/media/candidates-2015.csv" => "parl.2015-05-07");

// this array of party abbreviations mirrors the classes in parties.css
// used in the jstree data to prefix each candidate and set the icon class
$party_prefix = array(
"Christian-Party-Proclaiming-Christs-Lordship" => "CPPCL",
"Christian-Party-" => "CPPCL",
"Socialist-Labour-Party" => "SocLab",
"Social-Democratic-Party" => "SDP",
"A-Better-Britain-_-Unionist-Party" => "ABBUP",
"Scottish-Unionist-Party" => "SUP",
"The-Rubbish-Party" => "RP",
"Independent" =>"Ind",
"Independent-Network" =>"IndNet",
"Independent-Alliance-North-Lanarkshire" =>"IANL",
"Scottish-Green-Party" =>"Green",
"Orkney-Manifesto-Group" =>"OMG",
"Trade-Unionist-and-Socialist-Coalition" =>"TUSC",
"Liberal-Democrats" =>"LD",
"Labour-Party" =>"Lab",
"Labour-and-Co-operative-Party" =>"LabCo",
"Conservative-and-Unionist-Party" =>"Con",
"Scottish-National-Party-SNP" =>"SNP",
"Scottish-Socialist-Party" =>"SSP",
"UK-Independence-Party-UKIP" =>"UKIP",
"Scottish-Libertarian-Party" =>"SLP",
"Solidarity---Scotlands-Socialist-Movement" =>"Solidarity",
"National-Front" =>"NF",
"West-Dunbartonshire-Community-Party" =>"WDCP",
"RISE---Respect-Independence-Socialism-and-Environmentalism" =>"RISE",
"Workers-Revolutionary-Party" =>"WRP",
"National-Health-Action-Party" =>"NHA",
"Womens-Equality-Party" => "WEP",
"English-Democrats"=> "ED",
"Pirate-Party-UK" => "Pirate",
"British-National-Party" => "BNP",
"Official-Monster-Raving-Loony-Party" => "OMRLP",
"The-Yorkshire-Party" => "YP",
"Christian-Peoples-Alliance" => "CPA",
"Plaid-Cymru---The-Party-of-Wales" => "PC",
"SDLP-Social-Democratic--Labour-Party" => "SDLP",
"Traditional-Unionist-Voice---TUV" => "TUV",
"Green-Party" => "Green",
"Sinn-Fein" => "SF",
"Ulster-Unionist-Party" => "UUP",
"Alliance---Alliance-Party-of-Northern-Ireland" => "Alliance",
"Democratic-Unionist-Party---DUP" => "DUP",
"The-Workers-Party" => "WP",
"Socialist-Party" => "SP",
"UK-Independence-Party" => "UKIP",
"People-Before-Profit-Alliance" => "PBP",
"Progressive-Unionist-Party" => "PUP",
"NI21" => "NI21",
"Cannabis-is-Safer-than-Alcohol" => "CISTA",
"Speaker-seeking-re-election" => "Speaker",
"Not-transferred" => "N/T");


// this array of party abbreviations mirrors the classes in parties.css
// used in the jstree data to prefix each candidate and set the icon class
$party_colors = array(
"Christian-Party-Proclaiming-Christs-Lordship" => "#3B0C72",
"Christian-Party-" => "#3B0C72",
"Socialist-Labour-Party" => "#ff0000",
"Social-Democratic-Party" => "#ff0000",
"A-Better-Britain-_-Unionist-Party" => "#2E4F98",
"Scottish-Unionist-Party" => "#034AA6",
"The-Rubbish-Party" => "#7ec0ee",
"Independent" =>"#B0BEC5",
"Independent-Network" =>"#B0BEC5",
"Independent-Alliance-North-Lanarkshire" =>"#B0BEC5",
"Scottish-Green-Party" =>"#43B02A",
"Orkney-Manifesto-Group" =>"#008083",
"Trade-Unionist-and-Socialist-Coalition" =>"#E5327E",
"Liberal-Democrats" =>"#F2B027",
"Labour-Party" =>"#cb2710",
"Labour-and-Co-operative-Party" =>"#cb2710",
"Conservative-and-Unionist-Party" =>"#00386B",
"Scottish-National-Party-SNP" =>"#fef48b",
"Scottish-Socialist-Party" =>"#DE3136",
"UK-Independence-Party-UKIP" =>"112, 48, 160",
"Scottish-Libertarian-Party" =>"0, 97, 167",
"Solidarity---Scotlands-Socialist-Movement" =>"#054a24",
"National-Front" =>"#B4716B",
"West-Dunbartonshire-Community-Party" =>"#ED1A23",
"RISE---Respect-Independence-Socialism-and-Environmentalism" =>"#F25D25",
"Workers-Revolutionary-Party" => "#B40001",
"National-Health-Action-Party" => "#9BC4E0",
"Womens-Equality-Party" => "#6E2D91",
"English-Democrats" => "#9F121B",
"Pirate-Party-UK" => "#F78DCF",
"British-National-Party" => "#070C20",
"Official-Monster-Raving-Loony-Party" => "#FFF000",
"The-Yorkshire-Party" => "#75C1E5",
"Christian-Peoples-Alliance" => "#813887",
"Plaid-Cymru---The-Party-of-Wales" => "#358838",
"SDLP-Social-Democratic--Labour-Party" => "#E53935",
"Traditional-Unionist-Voice---TUV" => "#303F9F",
"Green-Party" => "#64DD17",
"Sinn-Fein" => "#4CAF50",
"Ulster-Unionist-Party" => "#03A9F4",
"Alliance---Alliance-Party-of-Northern-Ireland" => "#FDD835",
"Democratic-Unionist-Party---DUP" => "#FF5722",
"The-Workers-Party" => "#FF0000",
"Socialist-Party" => "#e60000",
"UK-Independence-Party" => "#9C27B0",
"People-Before-Profit-Alliance" => "#E91E63",
"Progressive-Unionist-Party" => "#880E4F",
"NI21" => "#581845",
"Procapitalism" => "#f633ff",
"NI-Conservatives" => "#B0BEC5",
"Labour-Alternative" => "#E57373",
"South-Belfast-Unionists" => "#9195FF",
"NI-Labour-Representation-Committee" => "#E57373",
"Northern-Ireland-First" => "#b3d71d",
"Cross-Community-Labour-Alternative" => "#E57373",
"Democracy-First" => "#d7761d",
"Animal-Welfare-Party" => "#ce1d99",
"Citizens-Independent-Social-Thought-Alliance" => "#F84651",
"Cannabis-is-Safer-than-Alcohol" => "#F84651",
"Speaker-seeking-re-election" => "#afeeee",
"Not-transferred" => "#000000");

//build a results tree to present party / councillor data at national, council and ward level
function buildRTree($elections, $dataDir, $party_prefix, $party_colors)
{
    global $elected_without_contest;  // array of candidate IDs standing in uncontested wards
    global $blank_row;                // field specification for CSV structure

    $national_parties = array();
    $councils = array();
    $council_parties = array();
    $wards = array();
    $ward_parties = array();
    $wardcode = array();
    $wardname = array();
    $cwards = array();
    $txdata = array();
    $id = 0;
    $ctotal = 0;
    $root = new jstree_node(++$id,"root","Scotland");
    $root->open();      // expand at startup
    $council_container = new jstree_node(++$id, "container", "Explore by council"); 
    $root->children[] = $council_container;

    // get an index of ward and council info so we can access the results data
    $wardinfo = readJSON($dataDir . "wardinfo.json");
    foreach ($wardinfo->Wards as $ward)
    {
        if (!empty($ward->election))
        {
            $wardcode[$ward->cand_ward_code] = $ward->map_ward_code;
            $wardname[$ward->cand_ward_code] = $ward->ward_name;
        }
    }

    // convert the candidate data to tree nodes indexed by cand_ward_code (post_id)
    echo "Building RESULTS data tree...<br>\n";
    foreach ($elections as $election => $council)
    {
        if (preg_match('/^local\.(.+)\.2017-05-04$/', $election, $matches))
  	    {
            $cdata = readJSON($dataDir. $election . ".json");
            foreach ($cdata->wards as $ward)
            {
                if (!empty($ward->post_id))
                {
                    $node = new jstree_node(++$id, "ward", $ward->post_label);
                    $cArray = array();  //clear array of candidates for each ward. We'll use this when pulling in results
                    foreach ($ward->candidates as $candidate)
                    {
                        $row = $blank_row;
                        // for the purposes of these summary data, let's treat "Labour-and-Co-operative-Party" as the same as "Labour Party"
                        if ($candidate->party_name == "Labour and Co-operative Party")
                        {
                            $candidate->party_name = "Labour Party";
                        }
                        $cArray[$candidate->id] = $candidate;
                        // create or update the party node
                        if (array_key_exists($election, $councils))
                        {
                            if (array_key_exists($election . $ward->post_label, $wards))
                            {
                                // all parent nodes exist, just need to find parent nodes from the arrays
                                $ward_node = $wards[$election . $ward->post_label];
                                $council_node = $councils[$election];
                            }
                            else
                            {
                                // need a new ward node
                                $council_node = $councils[$election];
                                $ward_node = new jstree_node(++$id, "ward", $wardname[$ward->post_id]);
                                $wards[$election . $ward->post_label] = $ward_node;
                                $council_node->children[0]->children[] = $ward_node;  // first child of each council node should be "Explore by ward"
                            }
                        }
                        else
                        {
                            // need a new council node, new ward node 
                            $council_node = new jstree_node(++$id, "council", $council);
                            $council_node->children[] = new jstree_node(++$id, "container", "Explore by wards");
                            $council_node->properties['slug'] = $matches[1];
                            $councils[$election] = $council_node;
                            $council_container->children[] = $council_node;
                            $ward_node = new jstree_node(++$id, "ward", $wardname[$ward->post_id]);
                            $wards[$election . $ward->post_label] = $ward_node;
                            $council_node->children[0]->children[] = $ward_node;  // first child of each council node should be "Explore by ward"
                        }
                        if (array_key_exists($candidate->party_name, $national_parties))
                        {
                            if (array_key_exists($candidate->party_name . $election, $council_parties))
                            {
                                if (array_key_exists($candidate->party_name . $election . $ward->post_label, $ward_parties))
                                {
                                    // all 3 types of node already exist for this party
                                    $ward_party_node = $ward_parties[$candidate->party_name . $election . $ward->post_label];
                                    $council_party_node = $council_parties[$candidate->party_name . $election];
                                    $national_party_node = $national_parties[$candidate->party_name];
                                }
                                else
                                {
                                    // need a new ward_party node 
                                    $ward_party_node = new jstree_node(++$id,"party",$candidate->party_name);
                                    $ward_parties[$candidate->party_name . $election . $ward->post_label] = $ward_party_node;
                                    $ward_node->children[] = $ward_party_node;
                                    $council_party_node = $council_parties[$candidate->party_name . $election];
                                    $national_party_node = $national_parties[$candidate->party_name];
                                }
                            }
                            else
                            {
                                // need a new council_party node and ward_party node
                                $council_party_node = new jstree_node(++$id, "party", $candidate->party_name);
                                $council_node->children[] = $council_party_node;
                                $council_parties[$candidate->party_name . $election] = $council_party_node;
                                $ward_party_node = new jstree_node(++$id,"party",$candidate->party_name);
                                $ward_parties[$candidate->party_name . $election . $ward->post_label] = $ward_party_node;
                                $ward_node->children[] = $ward_party_node;
                                $national_party_node = $national_parties[$candidate->party_name];
                            }
                        }
                        else
                        {
                            // need all the party nodes
                            $national_party_node = new jstree_node(++$id, "party", $candidate->party_name);
                            $national_parties[$candidate->party_name] = $national_party_node;
                            $root->children[] = $national_party_node;
                            $council_party_node = new jstree_node(++$id, "party", $candidate->party_name);
                            $council_node->children[] = $council_party_node;
                            $council_parties[$candidate->party_name . $election] = $council_party_node;
                            $ward_party_node = new jstree_node(++$id,"party",$candidate->party_name);
                            $ward_parties[$candidate->party_name . $election . $ward->post_label] = $ward_party_node;
                            $ward_node->children[] = $ward_party_node;
                        }
                        // now that we have all the nodes in place for this candidate we can add it to the appropriate places and add quantitative data from the results
                        $root->no_candidates += 1;
                        $ward_party_node->no_candidates += 1;
                        $council_party_node->no_candidates += 1;
                        $ward_node->no_candidates += 1;
                        $council_node->no_candidates += 1;
                        $national_party_node->no_candidates += 1;
                        $cand_node = new jstree_node(++$id,"candidate",$candidate->name);
                        $ward_party_node->children[] = $cand_node;

                        // populate the CSV data row for candidate variables
                        $row['id'] = $candidate->id;
                        $row['name'] = $candidate->name;
                        $row['party_name'] = $candidate->party_name;
                        $row['council_id'] = $matches[1];
                        $row['council_name'] = $council;
                        $row['election'] = $election;
                        $row['cand_ward_id'] = $ward->post_id;
                        $row['map_ward_id'] = $wardcode[$ward->post_id];
                        $row['ward_name'] = $wardname[$ward->post_id];
                        $row['contested'] = (in_array($candidate->id, $elected_without_contest)) ? 0 : 1;
                        $row['elected'] = ($candidate->elected == "True") ? 1 : 0;
                        $row['candidates'] = count($ward->candidates);

                        if ($candidate->elected == "True")
                        {
                            $ward_party_node->no_seats += 1;
                            $council_party_node->no_seats += 1;
                            $national_party_node->no_seats += 1;
                            $council_party_node->children[] = $cand_node;
                        }
                        // catch the uncontested wards here and update variables which won't get touched when we process the results
                        if (in_array($candidate->id, $elected_without_contest))
                        {
                            $root->no_seats++;;
                            $council_node->no_seats++;
                            $ward_node->no_seats++;
                            $row['status'] = 'Elected';
                        }
                        $data[$candidate->id] = $row;
                    }
                    // now let's get the results data
                    $fname = $dataDir . $matches[1] . "/" . $wardcode[$ward->post_id] . "/ResultsJson.json";
                    if (file_exists($fname))
                    {
                        $json = readJSON($fname);
                        recordtransfers($txdata, $json->Constituency->countGroup, $matches[1], $wardcode[$ward->post_id]);
                        $info = $json->Constituency->countInfo;
                        $parties = array();    // use this to update party properties once per ward
                        foreach ($json->Constituency->countGroup as $item)
                        {
                            if ($item->Count_Number == 1)
                            {
                                if (array_key_exists($item->Candidate_Id, $cArray))
                                {
                                    if (property_exists($cArray[$item->Candidate_Id], "party_name"))
                                    {
                                        $party = $cArray[$item->Candidate_Id]->party_name;
                                        if (!in_array($party, $parties))
                                        {
                                            $parties[] = $party;
                                        }
                                        $national_parties[$party]->incrementProperty("first_prefs",$item->Candidate_First_Pref_Votes);
                                        $council_parties[$party . $election]->incrementProperty("first_prefs",$item->Candidate_First_Pref_Votes);
                                        $ward_parties[$party . $election . $ward->post_label]->incrementProperty("first_prefs",$item->Candidate_First_Pref_Votes);
                                        // update CSV data
                                        $data[$item->Candidate_Id]['first_prefs'] = $item->Candidate_First_Pref_Votes;
                                        $data[$item->Candidate_Id]['status'] = $item->Status;
                                        $data[$item->Candidate_Id]['occurred_on_count'] = $item->Occurred_On_Count;
                                        $data[$item->Candidate_Id]['electorate'] = $info->Total_Electorate;
                                        $data[$item->Candidate_Id]['total_poll'] = $info->Total_Poll;
                                        $data[$item->Candidate_Id]['valid_poll'] = $info->Valid_Poll;
                                        $data[$item->Candidate_Id]['rejected'] = $info->Spoiled;
                                        $data[$item->Candidate_Id]['quota'] = $info->Quota;
                                        $data[$item->Candidate_Id]['seats'] = $info->Number_Of_Seats;
                                    }
                                    else
                                    {
                                        print_r($cArray[$item->Candidate_Id]);
                                    }
                                }
                                else
                                {
                                    echo "Candidate_Id NOT FOUND: " . $item->Candidate_Id . ", " . $item->Firstname . " " . $item->Surname . ", " . $item->Party_Name . "<br>\n";
                                }
                            }
                            else
                            {
                                // stages beyond the first add data to CSV
                                $tkey = "transfers" . sprintf("%02d", $item->Count_Number);
                                $vkey = "total_votes" . sprintf("%02d", $item->Count_Number);
                                $data[$item->Candidate_Id][$tkey] = $item->Transfers;
                                $data[$item->Candidate_Id][$vkey] = $item->Total_Votes;
                                if (empty($data[$item->Candidate_Id]['status']))
                                {
                                    $data[$item->Candidate_Id]['status'] = $item->Status;
                                    $data[$item->Candidate_Id]['occurred_on_count'] = $item->Occurred_On_Count;
                                }
                            }
                        }
                        foreach ($parties as $party)
                        {
                            if (array_key_exists($party, $national_parties))
                            {
                                $national_parties[$party]->incrementProperty("valid_poll",$info->Valid_Poll);
                                $national_parties[$party]->incrementProperty("quotas",$info->Quota);
                                $national_parties[$party]->incrementProperty("no_wards");
                            }
                            if (array_key_exists($party . $election, $council_parties))
                            {
                                $council_parties[$party . $election]->incrementProperty("no_wards");
                                $council_parties[$party . $election]->incrementProperty("quotas",$info->Quota);
                                $council_parties[$party . $election]->incrementProperty("valid_poll",$info->Valid_Poll);
                            }
                            $ward_parties[$party . $election . $ward->post_label]->incrementProperty("valid_poll",$info->Valid_Poll);
                            $ward_parties[$party . $election . $ward->post_label]->incrementProperty("quotas",$info->Quota);
                            $ward_parties[$party . $election . $ward->post_label]->incrementProperty("no_wards");
                        }
                        $root->incrementProperty("electorate", $info->Total_Electorate);
                        $councils[$election]->incrementProperty("electorate", $info->Total_Electorate);
                        $wards[$election . $ward->post_label]->incrementProperty("electorate", $info->Total_Electorate);

                        $root->incrementProperty("total_poll", $info->Total_Poll);
                        $councils[$election]->incrementProperty("total_poll", $info->Total_Poll);
                        $wards[$election . $ward->post_label]->incrementProperty("total_poll", $info->Total_Poll);

                        $root->incrementProperty("valid_poll", $info->Valid_Poll);
                        $councils[$election]->incrementProperty("valid_poll", $info->Valid_Poll);
                        $wards[$election . $ward->post_label]->incrementProperty("valid_poll", $info->Valid_Poll);

                        $root->incrementProperty("no_wards");
                        $councils[$election]->incrementProperty("no_wards");
                        $wards[$election . $ward->post_label]->incrementProperty("no_wards");

                        $root->no_seats += $info->Number_Of_Seats;
                        $councils[$election]->no_seats += $info->Number_Of_Seats;
                        $wards[$election . $ward->post_label]->no_seats += $info->Number_Of_Seats;
                    }
                    else
                    {
                        // probably an uncontested ward, which are dealt with in the main candidate data loop abovve
                        $root->incrementProperty("no_wards");
                        $council_node->incrementProperty("no_wards");
                        $ward_node->incrementProperty("no_wards");
                    }
                }
            }
        }
    }
    classifyParties($root, $party_prefix);
    writeJSON($root, $dataDir . "results-tree.json");

    // just Scotland-level data (used for colouring the map by biggest party)
    $summary = getSummary($root->children[0], $party_prefix, $party_colors);
    writeJSON($summary, $dataDir . "summary.json");

    // generate the scotland-level overview JSON, a summary of the party standings across all councils
    $overview = new Overview("All 32 Councils", "scotland","root");
    $overview->electorate = $root->properties['electorate'];
    $overview->total_poll = $root->properties['total_poll'];
    $overview->valid_poll = $root->properties['valid_poll'];
    $overview->no_seats = $root->no_seats;
    $overview->no_candidates = $root->no_candidates;
    $overview->no_wards = $root->properties['no_wards'];
    for ($i = 1; $i < count($root->children); $i++)   //skip element 0, which is just the container
    {
        $name = $root->children[$i]->icon;
        $short = $party_prefix[$name];
        $color = $party_colors[$name];
        $party = new Party($name, $short, $color);
        $party->no_seats = $root->children[$i]->no_seats;
        $party->no_candidates = $root->children[$i]->no_candidates;
        $party->no_wards = $root->children[$i]->properties['no_wards'];
        $party->first_prefs = $root->children[$i]->properties['first_prefs'];
        $party->quotas = round($root->children[$i]->properties['first_prefs'] / $root->children[$i]->properties['quotas'], 2);
        $overview->parties[] = $party;
    }
    writeJSON($overview, $dataDir . "overview.json");

    foreach ($root->children[0]->children as $cnode)
    {
        // generate the council-level overview JSON, a summary of the party standings for a given council
        if (preg_match('/<strong>(.+)<\/strong>/', $cnode->text, $matches))
        {
            $overview = new Overview($matches[1], $cnode->properties['slug'] ,"council");
            $overview->electorate = $cnode->properties['electorate'];
            $overview->total_poll = $cnode->properties['total_poll'];
            $overview->valid_poll = $cnode->properties['valid_poll'];
            $overview->no_seats = $cnode->no_seats;
            $overview->no_candidates = $cnode->no_candidates;
            $overview->no_wards = $cnode->properties['no_wards'];
            for ($i = 1; $i < count($cnode->children); $i++)   //skip element 0, which is just the container
            {
                $name = $cnode->children[$i]->icon;
                $short = $party_prefix[$name];
                $color = $party_colors[$name];
                $party = new Party($name, $short, $color);
                $party->no_seats = $cnode->children[$i]->no_seats;
                $party->no_candidates = $cnode->children[$i]->no_candidates;
                // where a party's only candidate is in an uncontested ward, no_wards will be set to zero, so it actually means CONTESTED wards in that context
                if (array_key_exists('no_wards', $cnode->children[$i]->properties))
                {
                    $party->no_wards = $cnode->children[$i]->properties['no_wards'];
                }
                else
                {
                    $party->no_wards = 0;
                }
                if (array_key_exists('first_prefs', $cnode->children[$i]->properties))
                {
                    $party->first_prefs = $cnode->children[$i]->properties['first_prefs'];
                    $party->quotas = round($cnode->children[$i]->properties['first_prefs'] / $cnode->children[$i]->properties['quotas'], 2);
                }
                else
                {
                    $party->first_prefs = 0;
                    $party->quotas = 0;
                }
                $overview->parties[] = $party;
            }
            writeJSON($overview, $dataDir . $cnode->properties['slug'] . "/overview.json");
        }
    }


//    saveTransfers($txdata, $dataDir, $party_prefix, $party_colors);

    $csv = array_values($data);  // needs to be a standard array, not associative
    for ($i=0;$i<count($csv); $i++)
    {
        // fill in a status for candidates not elected, but not excluded
        if (empty($csv[$i]['status']))
        {
            $csv[$i]['status'] = "Not elected";
        }
    }
    saveCSV($csv, $dataDir . "council17-mulvenna-org.csv");
}

// return an array of councils containing information about the parties with most seats in each council
// takes the "Explore by council" jsnode as its starting point
// assumes that there is a "slug" property in each council node
function getSummary($cnode, $party_prefix, $party_colors)
{
    $data = array();
    foreach($cnode->children as $node)
    {
        $council = $node->properties['slug'];
        $data[] = array('council'=>$council, 'no_seats' =>$node->no_seats, 'biggest_parties' => getPartiesWithMostSeats($node, $party_prefix, $party_colors));
    }
    return($data);
}

//recursive routine to apply prefix and class to party nodes
function classifyParties($root, $party_prefix)
{
    if ($root->type == "root" || $root->type == "council" || $root->type == "ward")
    {
        if (array_key_exists("total_poll", $root->properties))
        {
            $suffix =  number_format($root->no_seats) . (($root->no_seats == 1) ? " councillor" : " councillors");
            $suffix .= ", electorate: " . number_format($root->properties['electorate']) . ", turnout: " . number_format($root->properties['total_poll']) . sprintf(" (%.2f%%)", 100 * $root->properties['total_poll'] / $root->properties['electorate']);
            $suffix .= ", rejected: " . number_format($root->properties['total_poll'] - $root->properties['valid_poll']) .  sprintf(" (%.1f%%)", 100 * ($root->properties['total_poll'] - $root->properties['valid_poll']) / $root->properties['total_poll']);
        }
        else
        {
            $suffix =  number_format($root->no_seats) . (($root->no_seats == 1) ? " councillor" : " councillors");
            $suffix .= ", uncontested ward";
        }
        $root->text =  "<strong>" . $root->text . "</strong>";
        $root->text .= " <em>" . $suffix . "</em>";
    }
    if ($root->type == "root" || $root->type == "council" || $root->type == "ward")
    {
        $root->sortbyseats();
    }
    foreach ($root->children as $node)
    {
        if ($node->type == "party")
        {
            $party = stripParty($node->text);
            $node->icon = $party;        // icon property in jstree types plugin is interpreted as a class if it does not contain /
            $prefix = (array_key_exists($party, $party_prefix)) ? " " . $party_prefix[$party] . " " : " ";
            
            if (array_key_exists("first_prefs", $node->properties))
            {
                $suffix = $node->no_seats . (($node->no_seats == 1) ? " councillor" : " councillors") . sprintf(" (%.1f%%) ", 100 * $node->no_seats / $root->no_seats);
                $suffix .= " from ". number_format($node->no_candidates) . (($node->no_candidates == 1) ? " candidate" : " candidates") . sprintf(" (%.1f%% success rate), ", 100 * $node->no_seats / $node->no_candidates); 
                $suffix .= number_format($node->properties['first_prefs']) . " first prefs " . sprintf("(%.1f%%)", 100 * $node->properties['first_prefs'] / $root->properties['valid_poll']);
                if (array_key_exists("quotas", $node->properties))
                {
                    $suffix .= sprintf(", %.2f quotas per ward", $node->properties['first_prefs'] / $node->properties['quotas']);
                }
            }
            elseif ($node->no_candidates > 0) // uncontested wards will fall in here
            {
                $suffix = $node->no_seats . (($node->no_seats == 1) ? " councillor" : " councillors") . sprintf(" (%.1f%%) ", 100 * $node->no_seats / $root->no_seats);
                $suffix .= " from ". number_format($node->no_candidates) . sprintf(" candidates (%.1f%% success rate), ", 100 * $node->no_seats / $node->no_candidates); 
                $suffix .= "0 first prefs (0.0%)";
                $suffix .= ", 0.00 quotas per ward";
            }
            else
            {
                $suffix = "";
            }
            $node->text = $prefix . " " . $suffix;
        }

        if (count($node->children) > 0)
        {
            classifyParties($node, $party_prefix);
        }
    }
}

//build JSON data for the jstree with Parties as the children of the root using wardinfo and the candidate JSON for each council
function buildPTree($elections, $party_prefix, $party_colors)
{
    // get an index of ward and council info so we can build href preoperties for ward and candidate nodes
    echo "Building PARTIES data tree...<br>\n";
    // convert the candidate data to tree nodes indexed by cand_ward_code (post_id)
    foreach ($elections as $election)
    {

        if (preg_match('/^parl\.(\d\d\d\d)-\d\d-\d\d$/', $election, $matches))
  	    {
            $colors = array();
            $parties = array();
            $nations = array();
            $nation_names = array('E' => "England", "W"=>"Wales", "N" => "Northern Ireland", "S" => "Scotland");
            $id = 0;
            $root = new jstree_node(++$id,"root"," All Parties " . $matches[1]);
            $root->open();      // expand at startup

            $cdata = readJSON("../" . $matches[1] . "/" . $election . ".json");
            foreach ($cdata->wards as $ward)
            {
                if (!empty($ward->post_id))
                {
                    foreach ($ward->candidates as $candidate)
                    {
                        // for the purposes of these summary data, let's treat "Labour-and-Co-operative-Party" as the same as "Labour Party"
                        if ($candidate->party_name == "Labour and Co-operative Party")
                        {
                            $candidate->party_name = "Labour Party";
                        }
                        // create or update the party node
                        if (array_key_exists($candidate->party_name, $parties))
                        {
                            if (array_key_exists($candidate->party_name . "nation_" . substr($ward->post_id, 4, 1) , $nations))
                            {
                                $nation_node = $nations[$candidate->party_name . "nation_" . substr($ward->post_id, 4, 1)];
                                $party_node = $parties[$candidate->party_name];
                                $party_node->no_candidates += 1;
                                $nation_node->no_candidates += 1;
                            }
                            else
                            {
                                $nation_node = new jstree_node(++$id,"nation", $nation_names[substr($ward->post_id, 4, 1)]);
                                $nations[$candidate->party_name . "nation_" . substr($ward->post_id, 4, 1)] = $nation_node;
                                $party_node = $parties[$candidate->party_name];
                                $party_node->children[] = $nation_node;
                                $nation_node->no_candidates = 1;
                                $party_node->no_candidates += 1;
                            }
                        }
                        else
                        {
                            $nation_node = new jstree_node(++$id,"nation", $nation_names[substr($ward->post_id, 4, 1)]);
                            $nations[$candidate->party_name . "nation_" . substr($ward->post_id, 4, 1)] = $nation_node;
                            $party_node = new jstree_node(++$id,"party", $candidate->party_name);
                            $party_node->no_candidates = 1;
                            $nation_node->no_candidates = 1;
                            $parties[$candidate->party_name] = $party_node;
                            $party_node->children[] = $nation_node;
                            $root->children[] = $party_node;
                        }
                        $root->no_candidates += 1;
                        $name = ($candidate->elected == "True") ? '<span class="elected">' . $candidate->name . '</span>' : $candidate->name;
                        $cand_node = new jstree_node(++$id,"candidate", $ward->post_label . ", " . $name );
                        $nation_node->children[] = $cand_node;
                        $cand_node->applyProperty('href', '/map/?year=' . $matches[1] . '&wmc=' . substr($ward->post_id, 4));
                        $cand_node->applyProperty('post_id', substr($ward->post_id, 4));
                        $cand_node->no_candidates = 1;
                        if ($candidate->elected == "True")
                        {
                            if (array_key_exists(stripParty($candidate->party_name), $party_colors))
                            {
                                $colors[substr($ward->post_id, 4)] = $party_colors[stripParty($candidate->party_name)];
                            }
                            // use the elected field to keep a tally of seats won by each party
                            $nation_node->no_seats += 1;
                            $party_node->no_seats += 1;
                            $root->no_seats += 1;
                            $cand_node->no_seats = 1;
                        }
                    }
                }
            }
            // generate the scotland-level overview JSON, a summary of the party standings across all councils
            $overview = new Overview("UK GE" . $matches[1], "ge-" . $matches[1], "root");
            $overview->no_seats = $root->no_seats;
            $overview->no_candidates = $root->no_candidates;
            for ($i = 0; $i < count($root->children); $i++)   
            {
                if ($root->children[$i]->no_seats > 0)
                {
                    $name = stripParty($root->children[$i]->text);
                    $short = $party_prefix[$name];
                    $color = $party_colors[$name];
                    $party = new Party($name, $short, $color);
                    $party->no_seats = $root->children[$i]->no_seats;
                    $party->no_candidates = $root->children[$i]->no_candidates;
                    $overview->parties[] = $party;
                }
            }
            writeJSON($overview, "../" . $matches[1] . "/overview.json");

            $root->sortbycandidate();

            $rid = 5000;
            foreach ($root->children as $party_node)
            {
                $party = stripParty($party_node->text);
                $party_node->icon = $party;        // icon property in jstree types plugin is interpreted as a class if it does not contain /
                applyRegions($party_node);
            }

            extendParties($root);
            writeJSON($root, '../' . $matches[1] . "/party-tree.json");
            writeJSON($colors, '../' . $matches[1] . "/colors.json");
        }
    }
}


//build JSON data for the jstree library using wardinfo and the candidate JSON for each constituency
function buildCTree($elections, $party_prefix)
{
    global $rid;

    $nation_names = array('E' => "England", "W"=>"Wales", "N" => "Northern Ireland", "S" => "Scotland");
    // convert the candidate data to tree nodes indexed by cand_ward_code (post_id)
    echo "Building CANDIDATE data tree...<br>\n";
    foreach ($elections as $election)
    {
        if (preg_match('/^parl\.(\d\d\d\d)-\d\d-\d\d$/', $election, $matches))
  	    {
            $nations = array();
            $wards = array();
            $cwards = array();
            $id = 0;
            $ctotal = 0;
            $root = new jstree_node(++$id,"root","UK #GE" . $matches[1]);
            $root->open();      // expand at startup

            $cdata = readJSON('../' . $matches[1] . '/' . $election . ".json");
            foreach ($cdata->wards as $ward)
            {
                if (!empty($ward->post_id))
                {
                    $initial = substr($ward->post_id, 4, 1);
                    if (array_key_exists($initial, $nations))
                    {
                        $nation_node = $nations[$initial];
                    }
                    else
                    {
                        $nation_node = new jstree_node(++$id, "nation", $nation_names[$initial]);
                        $nations[$initial] = $nation_node;
                        $root->children[] = $nation_node;
                    }
                        
                    $node = new jstree_node(++$id, "constituency", $ward->post_label);
                    $node->no_candidates = count($ward->candidates);
                    $href = "/map/?year=" . $matches[1] . "&wmc=" . substr($ward->post_id, 4);
                    $node->applyProperty("href", $href);
                    $node->applyProperty("post_id", substr($ward->post_id, 4));
                    $nation_node->children[] = $node;
                    $nation_node->no_candidates += count($ward->candidates);
                    
                    $node->children = convertCandidates ($ward->candidates, $id, $party_prefix, $href);
                    $id += count($node->children);
                    $ctotal += count($node->children);    // keep track of the total candidates
                    $cwards[$ward->post_id] = $node;
                }
            }
            $root->no_candidates = $ctotal;
            $rid = 10000;
            applyRegions($root);
            extendNames($root);
            writeJSON($root, "../" . $matches[1] . "/constituency-tree.json");
        }
    }
}

//espeically for England insert regions between nation_node and constituencies
function insertRegions($node, $region_file)
{
    global $rid;

    $json = readJSON($region_file);
    $region = array();
    foreach ($json as $obj)
    {
        $region[substr($obj->post_id,4)] = $obj->region;
    }
    $children = $node->children;
    $node->children = array();
    $region_nodes = array();
    foreach ($children as $child)
    {
        $post_id = $child->properties['post_id'];
        if (in_array($post_id, array_keys($region)))
        {
            if (array_key_exists($region[$post_id], $region_nodes))
            {
                $region_node = $region_nodes[$region[$post_id]];
            }
            else
            {
                $region_node = new jstree_node(++$rid,  "region", $region[$post_id]);
                $region_nodes[$region[$post_id]] = $region_node;
                $node->children[] = $region_node;
            }
            $region_node->children[] = $child;
            $region_node->no_candidates += $child->no_candidates;
            $region_node->no_seats += $child->no_seats;
        }            
    }
}

// quick fix to show counts in party tree (recursive)
function extendParties($node)
{
    if (count($node->children))
    {
        switch ($node->type)
        {
            case "root":
                $cand = ($node->no_candidates == 1) ? "candidate" : "candidates";
                $node->text .= " (" . $node->no_candidates . " $cand from " . count($node->children). " political parties, " . $node->no_seats . " of 650 results known)";
                break;
            case "nation":
                $cand = ($node->no_candidates == 1) ? "candidate" : "candidates";
                $word = ($node->no_seats == 1) ? "seat" : "seats";
                $node->text = " " . $node->text . " (" . $node->no_seats . " " . $word . ", " . $node->no_candidates . " " . $cand . sprintf(", %.1f%% success", 100 * $node->no_seats / $node->no_candidates) . ")";
                break;
            case "region":
                $cand = ($node->no_candidates == 1) ? "candidate" : "candidates";
                $word = ($node->no_seats == 1) ? "seat" : "seats";
                $node->text = " " . $node->text . " (" . $node->no_seats . " " . $word . ", " . $node->no_candidates . " " . $cand . sprintf(", %.1f%% success", 100 * $node->no_seats / $node->no_candidates) .")";
                break;
            case "party":
                $cand = ($node->no_candidates == 1) ? "candidate" : "candidates";
                $word = ($node->no_seats == 1) ? "seat" : "seats";
                $node->text = " " . $node->text . " (" . $node->no_seats . " " . $word . ", " . $node->no_candidates . " " . $cand . sprintf(", %.1f%% success", 100 * $node->no_seats / $node->no_candidates) .")";
                break;
        }
        foreach ($node->children as $child)
        {
            extendParties($child);
        }
    }
}

// find the England node and insert the regions there
function applyRegions($node)
{
    if ($node->text == "England")
    {
        insertRegions($node, "england-regions.json");
    }
    else
    {
        foreach ($node->children as $child)
        {
            applyRegions($child);
        }
    }
}

 // quick fix to show seats and candidates for parent nodes (recursive)
 function extendNames($node)
 {
     if (count($node->children))
     {
        switch ($node->type)
        {
            case "root":
                $node->text .= " (" . $node->countType("constituency") . " constituencies, " . $node->no_candidates . " candidates)";
                break;
            case "region":
                $node->text .= " (" . $node->countType("constituency") . " constituencies, " . $node->no_candidates . " candidates)";
                break;
            case "nation":
                $node->text .= " (" . $node->countType("constituency") . " constituencies, " . $node->no_candidates . " candidates)";
                break;
            case "constituency":
                $node->text .= " (" . $node->no_candidates . " candidates)";
                break;
        }
        foreach ($node->children as $child)
        {
            extendNames($child);
        }
     }
 }


// convert an array of candidates to an array of jstree nodes
function convertCandidates($candidates, $last_id, $party_prefix, $href)
{
    $nodes = array();
    foreach ($candidates as $c)
    {
        $party = stripParty($c->party_name);
        $prefix = (array_key_exists($party, $party_prefix)) ? " (" . $party_prefix[$party] . ") " : " ";
        $name = ($c->elected == "True") ? '<span class="elected">' . $c->name . '</span>' : $c->name;

        $node = new jstree_node(++$last_id, "candidate", $prefix . $name);
        $node->icon = $party;        // icon property in jstree types plugin is interpreted as a class if it does not contain /
        $node->applyProperty("href", $href);
        $node->no_candidates = 1;
        $nodes[] = $node;
    }
    return($nodes);
}



// wards -> candidates 
function buildData($csvfiles, $fields, $required)
{
    echo "Building CANDIDATE data files...<br>\n";
    foreach ($csvfiles as $csv => $election)
    {
        $fname = "../atom/" . $election . ".json";
        if (file_exists($fname))
        {
            $atom = readJSON($fname);
            $elected = get_object_vars($atom->elected);
        }
        else
        {
            $elected = array();
        }
        if (preg_match('/^(.+)\.(\d\d\d\d)-\d\d-\d\d/', $election, $matches))
        {
            $wards = array();
            $wardIDs = array();   //used to keep track of which wards have been added
            $arrCand = getData($csv, $election);
            // remove any dud lines
            for ($i = 1; $i < count($arrCand); $i++)
            {
                if (count($arrCand[$i]) <= 1)
                {
                    unset ($arrCand[$i]);
                }
            }

            $header = array_shift($arrCand);
            array_walk($arrCand, '_combine_array', $header);

            foreach ($arrCand as $candidate)
            {
                // fudge to get surname using part after last space
                $names = splitName($candidate['name']);
                if (!empty($names))
                {
                    $candidate = array_merge($candidate, $names);
                }
                if (preg_match('/^WMC:/', $candidate['post_id']))
                {
                    $post_id = $candidate['post_id'];
                }
                else
                {
                    $post_id = 'WMC:' . $candidate['gss_code'];
                }
                if (!empty($post_id))
                {
                    $post_label = $candidate['post_label'];
                    foreach($candidate as $ident => $value)
                    {
                        // only include important fields to minimise the size of the JSON
                        if (!in_array($ident, $fields))
                        {
                            unset ($candidate[$ident]);
                        }
                        elseif (empty($value)  && !in_array($ident, $required))
                        {
                            unset ($candidate[$ident]);
                        }
                    }

                    // the array $elected has come from the results RSS feed and we assume it is more up to date than the CSV data
                    if (in_array($post_id, array_keys($elected)))
                    {
                        if ($candidate['id'] == $elected[$post_id])
                        {
                            if ($candidate['elected'] != "True")
                            {
                                echo "Marking " . $candidate['name'] . " elected in " . $post_label . " from atom feed<br>\n";
                            }
                            $candidate['elected'] = "True";
                        }
                        else
                        {
                            if ($candidate['elected'] == "True")
                            {
                                echo "Overriding " . $candidate['name'] . "'s elected status in " . $post_label . " from atom feed<br>\n";
                            }
                            $candidate['elected'] = "False";
                        }
                    }

                    $key = array_search($post_id, $wardIDs);
                    if ($key === False)
                    {
                        $wardIDs[] = $post_id;
                        $wards[] = array('post_id' => $post_id, 'post_label' => $post_label, 'election' => $election, 'candidates' => array($candidate));
                    }
                    else
                    {
                        array_push($wards[$key]['candidates'], $candidate);			   
                    }
                }
            }
            // full JSON is used in building the treeviews
            $dc = new DemoClub_Wards();
            $dc->wards = $wards;
            // $matches[2] should contain the year from the election date
            writeJSON($dc, '../'. $matches[2] . '/' . $election . ".json");

            foreach ($wards as $ward)
            {
                // $matches[2] should contain the year from the election date
                // create a small JSON for each constituency per year
                $post_id = substr($ward['post_id'],4);
                writeJSON($ward, '../'. $matches[2] . '/' . $post_id . ".json");
            }
        }
    }
}

function splitName($name)
{
  $ret = array();
  $pos = strrpos($name, " ");
	if ($pos)
	{
  	$surname = substr($name, $pos + 1);
  	$firstname = substr($name, 0, $pos);
		$ret['Surname'] = $surname;
		$ret['firstname'] = $firstname;
	}
	return ($ret);
}

// replace and remove certain characters from a party name to be consistent with the CSS form used in script.js
// party_name.replace(/\s+/g, "-").replace(/[\',()]/g,"")
function stripParty($name)
{
    $endash = html_entity_decode('&#x2013;', ENT_COMPAT, 'UTF-8');
    $eacute = html_entity_decode('&eacute;', ENT_COMPAT, 'UTF-8');
    $pattern = array('/\s+/', "/['\"&,.()]/", "/$endash/u", "/$eacute/u");
    $replacement = array('-', '', '_', 'e');
    return( preg_replace($pattern, $replacement, $name));
}

class Overview
{
    public $electorate;
    public $total_poll;
    public $valid_poll;
    public $no_seats;
    public $no_candidates;
    public $no_wards;
    public $name;
    public $slug;
    public $type;
    public $parties;

    function __construct($name, $slug, $type)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->type = $type;
        $this->parties = array();
        $this->electorate = 0;
        $this->total_poll = 0;
        $this->valid_poll = 0;
        $this->no_seats = 0;
        $this->no_candidates = 0;
        $this->no_wards = 0;
   }
}

class Party
{
    public $no_seats;
    public $no_candidates;
    public $no_wards;
    public $first_prefs;
    public $quotas;
    public $name;
    public $short;
    public $color;

    function __construct($name, $short, $color)
    {
        $this->name = $name;
        $this->short = $short;
        $this->color = $color;
        $this->no_seats = 0;
        $this->no_candidates = 0;
        $this->no_wards = 0;
        $this->first_prefs = 0;
        $this->quotas = 0;
    }
}


function _combine_array(&$row, $key, $header) {
    if (count($row) > 1 )
    {
      $row = array_combine($header, $row);
    }
}

function getData($csvURL, $election)
{
    $ch = curl_init($csvURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
    $data = curl_exec($ch);
    curl_close($ch);

    $my_file = $election .".csv";
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    fwrite($handle, $data);
    fclose($handle);

    $arr = array();
    $handle = fopen($my_file, "r");
    while ($arr[] = fgetcsv($handle));
    fclose($handle);
    return ($arr);
}

class DemoClub_Wards
{
 public $wards;

 public function __construct()
 {
 	$this->wards = array();
 } 
}

class jstree_state
{
    public $opened;
    public $disabled;
    public $selected;

    function __construct($opened, $disabled, $selected)
    {
        $this->opened = $opened;
        $this->disabled = $disabled;
        $this->selected = $selected;
    }
}

class jstree_node
{
    public $id;
    public $type;
    public $text;
    public $no_seats;
    public $no_candidates;
    public $properties;
    public $children;
    public $state;

    private $count;

    function __construct($id, $type, $text, $properties = array())
    {
        $this->id = $id;
        $this->type = $type;
        $this->text = $text;
        $this->no_seats = 0;
        $this->no_candidates = 0;
        $this->properties = $properties;
        $this->children = array();
        $this->state = new jstree_state(false, false, false);
    }

    function open()
    {
        $this->state->opened = true;
    }

    function close()
    {
        $this->state->opened = false;
    }

    function disable()
    {
        $this->state->disabled = true;
    }

    function enable()
    {
        $this->state->disabled = false;
    }

    function select()
    {
        $this->state->selected = true;
    }

    function deselect()
    {
        $this->state->selected = false;
    }


    // recursively count nodes of a given type
    function countType($type)
    {
        $this->count = 0;
        if ($this->type == $type)
        {
            $this->count = 1;
        }
        foreach ($this->children as $child)
        {
            $this->count += $child->countType($type);
        }
        return ($this->count);
    }

    function sortbytext()
    {
        $tmp = $this->children;
        usort($tmp, array($this, "cmp"));
        $this->children = $tmp;
    }

    function cmptext($a, $b)
    {
        if ($a->text == $b->text) {
            return 0;
        }
        return ($a->text < $b->text) ? -1 : 1;
    }

    // descending by no_candidates
    function sortbycandidate()
    {
        $tmp = $this->children;
        usort($tmp, array($this, "cmpcandidate"));
        $this->children = $tmp;
    }

    function cmpcandidate($a, $b)
    {
        if ($a->no_candidates == $b->no_candidates)
        {
            if ($a->text == $b->text) {
                return 0;
            }
            return ($a->text < $b->text) ? -1 : 1;
        }
        return ($a->no_candidates < $b->no_candidates) ? 1 : -1;
    }

    // descending by no_seats
    function sortbyseats()
    {
        $tmp = $this->children;
        usort($tmp, array($this, "cmpseats"));
        $this->children = $tmp;
    }

    function cmpseats($a, $b)
    {
        if ($a->type == "container") return -1;
        if ($b->type == "container") return 1;
        if ($a->no_seats == $b->no_seats)
        {
            if ($a->text == $b->text) {
                return 0;
            }
            return ($a->text < $b->text) ? -1 : 1;
        }
        return ($a->no_seats < $b->no_seats) ? 1 : -1;
    }

    function listChildren()
    {
        foreach ($this->children as $child)
        {
            echo $child->text . "<br>\n";
        }
    }

    //add a property to a node and its children
    function applyProperty($key, $value)
    {
        if (is_array($this->properties))
        {
            $this->properties[$key] = $value;
        }
        elseif (is_object($this->properties))
        {
            $this->properties->$key = $value;
        }
        foreach ($this->children as $child)
        {
            $child->applyProperty($key, $value);
        }
    }

    //assign a numeric value to a node's property
    function assignProperty($key, $value)
    {
        if (is_array($this->properties))
        {
            $this->properties[$key] = $value + 0;
        }
        elseif (is_object($this->properties))
        {
            $this->properties->$key = $value + 0;
        }
    }

    //increment a node's property
    function incrementProperty($key, $value = 1)
    {
        if (is_array($this->properties))
        {
            if (array_key_exists($key, $this->properties))
            {
                $this->properties[$key] += $value;
            }
            else
            {
                $this->properties[$key] = $value;
            }
        }
        elseif (is_object($this->properties))
        {
            if (property_exists($this->properties, $key))
            {
                $this->properties->$key += $value;
            }
            else
            {
                $this->properties->$key = $value;
            }
        }
    }

}


// fgetcsv() is more resilient than str_getcsv when fields contain EOL characters
function getCSV($my_file)
{
    $arr = array();
    $handle = fopen($my_file, "r");
    while ($row = fgetcsv($handle))
    {
        $arr[] = $row;
    }
    fclose($handle);
    return ($arr);
}

//write an array to CSV (assumes two-dimensional array with headers in first row)
function saveCSV($arr, $my_file)
{
    $header = array_keys($arr[0]);
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    fputcsv($handle, $header);
    foreach ($arr as $row)
    {
        fputcsv($handle, $row);
    }
    fclose($handle);
}

// output the data as a JSON file
function writeJSON($data, $my_file)
{
  echo "Writing $my_file<br>\n";
  $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
  fwrite($handle, json_encode($data));
  fclose($handle);
}

// input data from a JSON file
function readJSON($my_file)
{
    $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
    echo "Reading $my_file<br>\n";
    $data = json_decode(fread($handle, filesize($my_file)));
    fclose($handle);
    return ($data);
}

?>