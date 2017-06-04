<?php

// avoid any scripting on public-facing website to avoid trashing any data files
if ($_SERVER['SERVER_ADDR'] == "216.92.68.138")
{
    header("Location: /"); /* Redirect browser */
    exit();
}

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
"Not-transferred" => "#000000");

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
    while ($row = fgetcsv($handle))
    {
        $arr[] = $row;
    }
    fclose($handle);
    return ($arr);
}

class DemoClub_Councils
{
 public $councils;

 public function __construct()
 {
 	$this->councils = array();
 } 
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
  $json = json_encode($data);
  $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
  fwrite($handle, $json);
  fclose($handle);
}

// input data from a JSON file
function readJSON($my_file)
{
    $handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file);
    $json = fread($handle, filesize($my_file));
    fclose($handle);
    echo "Reading $my_file<br>\n";
    $data = json_decode($json);
    return ($data);
}

class Results
{
    public $Constituency;

    function __construct($info)
    {
        $this->Constituency = new Constituency($info->Constituency_Name, $info->Constituency_Number, $info->Number_Of_Seats, $info->Voting_Age_Pop, $info->Total_Electorate, $info->Total_Poll, $info->Valid_Poll);
    }

    // go through the results and mark Elected/Excluded status where appropriate
    public function updateStatus($retain = True)
    {
        $cand_status = array();
        $cand_ids = array();
        $last_stage = 0;
        $no_elected = 0;

        if ($retain == False)  // clear existing status fields
        {
            for ($i = 0; $i < count($this->Constituency->countGroup); $i++)
            {
                $this->Constituency->countGroup[$i]->Status = "";
                $this->Constituency->countGroup[$i]->Occurred_On_Count = "";
            }
        }
        for ($i = 0; $i < count($this->Constituency->countGroup); $i++)
        {
            // get a handle on what the max count_number is
            if ($this->Constituency->countGroup[$i]->Count_Number > $last_stage)
            {
                $last_stage = $this->Constituency->countGroup[$i]->Count_Number;
            }
            // build array of candidate IDs
            if (!in_array($this->Constituency->countGroup[$i]->Candidate_Id, $cand_ids))
            {
                $cand_ids[] = $this->Constituency->countGroup[$i]->Candidate_Id;
            }

            if (empty($this->Constituency->countGroup[$i]->Status))
            {
                if ($this->Constituency->countGroup[$i]->Total_Votes >= $this->Constituency->countInfo->Quota)
                {
                    $this->markStatus('Elected', $this->Constituency->countGroup[$i]->Candidate_Id, $this->Constituency->countGroup[$i]->Count_Number);
                    $cand_status[$this->Constituency->countGroup[$i]->Candidate_Id] = 'Elected';
                }
                elseif ($this->Constituency->countGroup[$i]->Total_Votes == 0 && ($this->Constituency->countGroup[$i]->Transfers < 0))
                {
                    $this->markStatus('Excluded', $this->Constituency->countGroup[$i]->Candidate_Id, $this->Constituency->countGroup[$i]->Count_Number - 1);
                    $cand_status[$this->Constituency->countGroup[$i]->Candidate_Id] = 'Excluded';
                }
            }
            else
            {
                $cand_status[$this->Constituency->countGroup[$i]->Candidate_Id] = $this->Constituency->countGroup[$i]->Status;
            }
        }
        // get no. of elected
        foreach ($cand_status as $key => $value)
        {
            if ($value == 'Elected')
            {
                $no_elected++;
            }
        }
        if ($no_elected < $this->Constituency->countInfo->Number_Of_Seats)
        {
            // if the number of candidates without status is the same and the unmber of unfilled seats, then they must be Elected
            if (count($cand_ids) - count($cand_status) == $this->Constituency->countInfo->Number_Of_Seats - $no_elected)
            {
                foreach ($cand_ids as $id)
                {
                    if (!in_array($id, array_keys($cand_status)))
                    {
                        $this->markStatus("Elected", $id, $last_stage);
                        echo "Last candidate standing marked ELECTED ($id, stage $last_stage) in " . $this->Constituency->countInfo->Constituency_Name . "\n";
                        $no_elected++;
                    }
                }
            }
        }
    }

    // set the Status and Occurred_On_Count properties for a particular $cid in the countGroup data
    function markStatus($status, $cid, $count)
    {
        for ($i = 0; $i < count($this->Constituency->countGroup); $i++)
        {
            if (($this->Constituency->countGroup[$i]->Candidate_Id == $cid) && ($this->Constituency->countGroup[$i]->Count_Number >= $count))
            {
                $this->Constituency->countGroup[$i]->Status = $status;
                $this->Constituency->countGroup[$i]->Occurred_On_Count = $count;
            }
        }
    }

    // use this to convert a stdClass object imported from JSON
    public function set($data)
    {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }

    // returns array (with elements Status, Occurred_On_Count) if any records for a given candidate $cid have Status set
    public function currentStatus($cid)
    {
        for ($i = 0; $i < count($this->Constituency->countGroup); $i++)
        {
            if ($this->Constituency->countGroup[$i]->Candidate_Id == $cid && !empty($this->Constituency->countGroup[$i]->Status))
            {
                return (array("Status" => $this->Constituency->countGroup[$i]->Status, "Occurred_On_Count" => $this->Constituency->countGroup[$i]->Occurred_On_Count));
            }
        }   
        return (false);            
    }
        
}

class Constituency
{
    public $countInfo;
    public $countGroup;

    function __construct($name, $no, $seats, $pop, $electorate, $total, $valid)
    {
        $this->countInfo = new countInfo($name, $no, $seats, $pop, $electorate, $total, $valid);
        $this->countGroup = array();
    }
}

class countInfo
{
    public $Valid_Poll;
    public $Number_Of_Seats;
    public $Total_Poll;
    public $Voting_Age_Pop;
    public $Quota;
    public $Constituency_Name;
    public $Constituency_Number;
    public $Total_Electorate;
    public $Spoiled;

    function __construct($name, $no, $seats, $pop, $electorate, $total, $valid)
    {
        $this->Valid_Poll = $valid;
        $this->Number_Of_Seats = $seats;
        $this->Total_Poll = $total;
        $this->Voting_Age_Pop = $pop;
        $this->Quota = floor($valid/($seats+1))+1;
        $this->Constituency_Name = $name;
        $this->Constituency_Number = $no;
        $this->Total_Electorate = $electorate;
        $this->Spoiled = $total - $valid;
    }
}

class countItem
{
    public $Candidate_First_Pref_Votes;
    public $Status;
    public $Occurred_On_Count;
    public $Surname;
    public $Firstname;
    public $Constituency_Number;
    public $Party_Name;
    public $Candidate_Id;
    public $Count_Number;
    public $Transfers;
    public $id;
    public $Total_Votes;

    function __construct($id, $no, $count, $party, $candID, $fname, $sname, $firstpref, $transfers, $total, $status = "", $occurred = "")
    {
        $this->Candidate_First_Pref_Votes = $firstpref;
        $this->Status = $status;
        $this->Occurred_On_Count = $occurred;
        $this->Surname = $sname;
        $this->Firstname = $fname;
        $this->Constituency_Number = $no;
        $this->Party_Name = $party;
        $this->Candidate_Id = $candID;
        $this->Count_Number = $count;
        $this->Transfers = $transfers;
        $this->id = $id;
        $this->Total_Votes = $total;
    }
}

class Council
{
    public $Constituencies;

    //adds the first summary
    function __construct($name, $no, $code, $info)
    {
        $this->Constituencies[] = new Constituency_Summary ($name, $no, $code, $info);
    }

    // use this to convert a stdClass object imported from JSON
    public function set($data)
    {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }
}

class Constituency_Summary
{
    public $Constituency_Name;
    public $Constituency_Number;
    public $Directory;
    public $countInfo;

    function __construct($name, $no, $code, $info)
    {
        $this->Constituency_Name = $name;
        $this->Constituency_Number = $no;
        $this->Directory = $code;
        $this->countInfo = $info;
    }

}

function verify_all ($dir, $precision)
{
    echo "<pre>\n";
    $clist = scandir($dir);    // list of council folders
    foreach ($clist as $council)
    {
        if (!in_array($council,array(".","..")))
        {
            if (is_dir($dir  . "/" . $council))
            {
                verify_council($dir, $council, $precision);
            }
        }
    }
    echo "</pre>\n";
}


function verify_council($dir, $council, $precision)
{
    $fname = $dir . "/" . $council . "/all-constituency-info.json";
    if (file_exists($fname))
    {	
        $wlist = scandir($dir . "/" . $council);  // list of ward folders
        foreach ($wlist as $ward)
        {
            if (!in_array($ward,array(".","..")))
            {
                if (is_dir($dir  . "/" . $council . "/" . $ward))
                {
                    verify_ward($dir, $council, $ward, $precision);
                }
            }
        }
    }
}


function verify_ward($dir, $council, $ward, $precision)
{
    $fname = $dir . "/" . $council . "/" . $ward . "/ResultsJson.json";
    if (file_exists($fname))
    {	
        echo "\nVerifying $fname\n";
        $json = readJSON($fname);
        $transfers = array();
        $total_votes = array();
        foreach($json->Constituency->countGroup as $item)
        {
            $transfers[$item->Candidate_Id][$item->Count_Number] = $item->Transfers + 0;
            $total_votes[$item->Candidate_Id][$item->Count_Number] = $item->Total_Votes + 0;
        }
        foreach($total_votes as $id => $votes)
        {
            for ($stage = 2; $stage <= count($votes); $stage++)
            {
                $target = $votes[$stage-1] + $transfers[$id][$stage];
                $diff = abs($votes[$stage] - $target);
                if ($diff > $precision)
                {
                    echo "$council $ward $id $stage " . $votes[$stage-1] . " + " . $transfers[$id][$stage] . " <> " . $votes[$stage] . " target: " . $target . " diff: " . $diff . "\n";
                }
            }
        }
    }
}

function markStatus_all ($dir)
{
    echo "<pre>\n";
    $clist = scandir($dir);    // list of council folders
    foreach ($clist as $council)
    {
        if (!in_array($council,array(".","..")))
        {
            if (is_dir($dir  . "/" . $council))
            {
                markStatus_council($dir, $council);
            }
        }
    }
    echo "</pre>\n";
}


function markStatus_council($dir, $council)
{
    $fname = $dir . "/" . $council . "/all-constituency-info.json";
    if (file_exists($fname))
    {	
        $wlist = scandir($dir . "/" . $council);  // list of ward folders
        foreach ($wlist as $ward)
        {
            if (!in_array($ward,array(".","..")))
            {
                if (is_dir($dir  . "/" . $council . "/" . $ward))
                {
                    markStatus_ward($dir, $council, $ward);
                }
            }
        }
    }
}


function markStatus_ward($dir, $council, $ward)
{
    $fname = $dir . "/" . $council . "/" . $ward . "/ResultsJson.json";
    if (file_exists($fname))
    {	
        echo "\nRefreshing status on $fname\n";
        $json = readJSON($fname);
        $info = new countInfo($json->Constituency->countInfo->Constituency_Name, $json->Constituency->countInfo->Constituency_Number, $json->Constituency->countInfo->Number_Of_Seats, 0, $json->Constituency->countInfo->Total_Electorate, $json->Constituency->countInfo->Total_Poll, $json->Constituency->countInfo->Valid_Poll);
        $rdata = new Results($info);
        $rdata->set($json);
        $rdata->updateStatus(False);
        echo "Writing $fname<br>\n";
        writeJSON($rdata, $fname);
   }
}

// returns an array of booleans where the key is the candidate_id
function getElectedCandidates($dir, $uncontested)
{
    $elected = array();
    foreach($uncontested as $id)
    {
        $elected[$id] = 1;
    }
    $clist = scandir($dir);    // list of council folders
    foreach ($clist as $council)
    {
        if (!in_array($council,array(".","..")))
        {
            if (is_dir($dir  . "/" . $council))
            {
                $fname = $dir . "/" . $council . "/all-constituency-info.json";
                if (file_exists($fname))
                {	
                    $wlist = scandir($dir . "/" . $council);  // list of ward folders
                    foreach ($wlist as $ward)
                    {
                        if (!in_array($ward,array(".","..")))
                        {
                            if (is_dir($dir  . "/" . $council . "/" . $ward))
                            {
                                $fname = $dir . "/" . $council . "/" . $ward . "/ResultsJson.json";
                                if (file_exists($fname))
                                {	
                                    $json = readJSON($fname);
                                    $no_elected = 0;
                                    $no_seats = $json->Constituency->countInfo->Number_Of_Seats;
                                    foreach ($json->Constituency->countGroup as $item)
                                    {
                                        if (!isset($elected[$item->Candidate_Id]))
                                        {
                                            switch ($item->Status)
                                            {
                                                case "Elected":
                                                    $elected[$item->Candidate_Id] = True;
                                                    $no_elected++;
                                                    break;
                                        
                                                case "Excluded":
                                                    $elected[$item->Candidate_Id] = False;
                                                    break;
                                            }
                                        }
                                    }
                                    // in this second pass we catch all the candidates not elected, who didn't reach Excluded status (only applicable if contest is complete)
                                    if ($no_elected == $no_seats)
                                    {
                                        foreach ($json->Constituency->countGroup as $item)
                                        {
                                            if (!isset($elected[$item->Candidate_Id]))
                                            {
                                                if (empty($item->Status))
                                                {
                                                    $elected[$item->Candidate_Id] = False;
                                                }
                                            }
                                        }
                                    }
                               }

                            }
                        }
                    }
                }
            }
        }
    }
    return ($elected);
}
?>