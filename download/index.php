<?php
require $_SERVER["DOCUMENT_ROOT"] . "/website/php/functions.php";

//</strong> --------- council specific variables in this section</strong> --------
// this should be the council identifier consistent with Democracy Club data, this website and to a certain extent the map data
// used in the mapName js variable, the twitter image, the breadcrumb link
$slug = 'download';
$council_name = 'Download the data';  // used in the title and breadcrumb

//</strong> ------ below here should be the same for each council (but this is the top-level, so it has different content</strong> --------


// function head($title, $mapName, $mapLat, $mapLong, $mapZoom, $mapProperty, $mapUnit, $mapWardDesc, $twimg)
head("Download the #council17 data for Scotland", $slug, 0, 0, 0, NULL, NULL, NULL, "/website/image/download.png");
navigation("Scottish Council elections 2017");

function human_filesize($fname, $decimals = 2) {
  $sz = 'BKMGTP';
  $bytes = filesize($fname);
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
}

$fname = "../2017/SCO/council17-mulvenna-org.csv";
$size = human_filesize($fname, 0);
?>

<div class="content">
<h1>Download the data</h1>
<p>The full dataset for the 2017 council elections in Scotland presented on this website is available for download as a single CSV (comma-separated values) file. It is presented in an unofficial capacity. The official results are published by each of the 32 Scottish councils with summary data published by the <a href="http://www.electionsscotland.info/">Electoral Management Board for Scotland</a>. The dataset is a combination of candidate data collated by the <a href="https://democracyclub.org.uk/">Democracy Club</a> and adapted under <a href="https://creativecommons.org/licenses/by-sa/3.0/">CC BY-SA 3.0 license</a> and results data transcribed from Scottish council websites by <a href="http://twitter.com/gerrymulvenna">@gerrymulvenna</A> with the exception of data for the Scottish Borders Council, which was transcribed by <a href="http://www.andrewteale.me.uk/leap/">Andrew Teale</a>.</p>

<p>This dataset is made available under the <a href="https://creativecommons.org/licenses/by-sa/4.0/">CC-By-SA 4.0</a> license. You should attribute authorship to <a href="http://twitter.com/gerrymulvenna">@gerrymulvenna</a>, stating that it contains data from the Democracy Club and Andrew Teale, and provide a link to the same license.</p>

<form action="/2017/SCO/council17-mulvenna-org.csv">
<button id="me" type="submil">Download CSV (<?=$size?>)</button>
</form>

<h2>Columns in the data</h2>
<p>The CSV data file has a flat structure combining ward-level fields with candidate-level fields. The following fields are included as columns in the data:</p>
<ol>
<li><strong>id</strong> - a unique numeric identifer for each candidate generated by the Democracy Club</li>
<li><strong>name</strong> - candidate name, transcribed by the Democracy Club</li>
<li><strong>party_name</strong> - the political party name transcribed by the Democracy Club</li>
<li><strong>council_id</strong> - an arbitrary human-readable unique identifier for each council</li>
<li><strong>council_name</strong> - the council name</li>
<li><strong>election</strong> - the Democracy Club identifier for the council election</li>
<li><strong>cand_ward_id</strong> - the Democracy Club identifer for the ward being contested</li>
<li><strong>map_ward_id</strong> - the unique identifier for each ward, as used by the mapping data from the Local Government Boundary Commission for Scotland</li>
<li><strong>ward_name</strong> - the name of the ward</li>
<li><strong>contested</strong> - 1 if ward was contested, 0 if not contested</li>
<li><strong>elected</strong> - 1 if candidate elected, 0 if not elected</li>
<li><strong>status</strong> - "Elected" or "Excluded" during count; can also be "Not elected" if candidate was neither elected nor excluded</li>
<li><strong>occurred_on_count</strong> - the stage of the count at which a candidate was Elected or Excluded; may be blank if candidate was neither elected nor excluded</li>
<li><strong>first_prefs</strong> - number of first preference votes for this candidate</li>
<li><strong>transfers02</strong> - transfer value accruing to this candidate at stage 2 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes02</strong> - cummulative total votes for this candidate at stage 2 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers03</strong> - transfer value accruing to this candidate at stage 3 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes03</strong> - cummulative total votes for this candidate at stage 3 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers04</strong> - transfer value accruing to this candidate at stage 4 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes04</strong> - cummulative total votes for this candidate at stage 4 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers05</strong> - transfer value accruing to this candidate at stage 5 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes05</strong> - cummulative total votes for this candidate at stage 5 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers06</strong> - transfer value accruing to this candidate at stage 6 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes06</strong> - cummulative total votes for this candidate at stage 6 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers07</strong> - transfer value accruing to this candidate at stage 7 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes07</strong> - cummulative total votes for this candidate at stage 7 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers08</strong> - transfer value accruing to this candidate at stage 8 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes08</strong> - cummulative total votes for this candidate at stage 8 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers09</strong> - transfer value accruing to this candidate at stage 9 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes09</strong> - cummulative total votes for this candidate at stage 9 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers10</strong> - transfer value accruing to this candidate at stage 10 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes10</strong> - cummulative total votes for this candidate at stage 10 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers11</strong> - transfer value accruing to this candidate at stage 11 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes11</strong> - cummulative total votes for this candidate at stage 11 of the count; may be blank if count didn't advance this far</li>
<li><strong>transfers12</strong> - transfer value accruing to this candidate at stage 12 of the count; may be blank if count didn't advance this far</li>
<li><strong>total_votes12</strong> - transfer value accruing to this candidate at stage 12 of the count; may be blank if count didn't advance this far</li>
<li><strong>electorate</strong> - the total electorate with a franchise in the ward this candidate is standing</li>
<li><strong>total_poll</strong> - total votes cast in this ward</li>
<li><strong>valid_poll</strong> - number of valid votes received in this ward</li>
<li><strong>rejected</strong> - number of votes rejected in this ward</li>
<li><strong>quota</strong> - the Single Transerable Vote quota for this ward = 1 + int(valid_poll / (seats + 1))</li>
<li><strong>seats</strong> -  the number of councillors to be elected in this ward</li>
<li><strong>candidates</strong> - the number of candidates standing in this ward</li>
</ol>



</div></div>';
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-12076032-17', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>