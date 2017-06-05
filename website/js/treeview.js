var searchParams = getSearchParams();
var year = 2017;
if (searchParams['year'])
{
	year = searchParams['year'];
}

// cross-browser search param functions
function getSearchParams(k){
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}



// configure the CONSTITUENCY tree
$('#constituency-tree').jstree(
{
	'core' : 
	{
		'data' : 
		{
			"url" : "/" + year + "/constituency-tree.json",
			"dataType" : "json" // needed only if you do not supply JSON headers
		}
	},
	"types" : 
	{
		"#" : 
		{
		  "max_children" : 1,
		  "max_depth" : 4,
		  "valid_children" : ["root"]
		},
		"root" : 
		{
			"icon" : "/website/image/hoc-32.png",
			"valid_children" : ["constituency"]
		},
		"constitency" : 
		{
			"icon" : "/website/image/group-16.png",
			"valid_children" : ["candidate"]
		},
		"candidate" : 
		{
			 "valid_children" : []
		}
	},
	"plugins" : ["types", "theme", "search"]
});


// search the trees
$(function () {
  $("#constituency-tree").jstree({
    "plugins" : [ "search" ]
  });
  var to = false;
  $('#constituency-tree-search').keyup(function () {
    if(to) { clearTimeout(to); }
    to = setTimeout(function () {
      var v = $('#constituency-tree-search').val();
	  if (v.length >=3)
	  {
	      $('#constituency-tree').jstree(true).search(v);
	  }
    }, 250);
  });
});


// configure the RESULTS tree
$('#results-tree').jstree(
{
	'core' : 
	{
		'data' : 
		{
			"url" : "/2017/SCO/results-tree.json",
			"dataType" : "json" // needed only if you do not supply JSON headers
		}
	},
	"types" : 
	{
		"#" : 
		{
		  "max_children" : 1,
		  "max_depth" : 7,
		  "valid_children" : ["root"]
		},
		"root" : 
		{
			"icon" : "/website/image/scotland-16.png",
			"valid_children" : ["party", "container"]
		},
		"party" : 
		{
			"valid_children" : ["candidate"]
		},
		"container" : 
		{
			"valid_children" : ["council", "ward"]
		},
		"council" : 
		{
			"icon" : "/website/image/building-16.png",
			"valid_children" : ["party", "container"]
		},
		"ward" : 
		{
		  "icon" : "/website/image/group-16.png",
		  "valid_children" : ["party"]
		},
		"candidate" : 
		{
			"icon" : "/website/image/person-16.png",
			 "valid_children" : []
		}
	},
	"plugins" : ["types", "theme", "search"]
});


// configure the PARTY tree
$('#party-tree').jstree(
{
	'core' : 
	{
		'data' : 
		{
			"url" : "/" + year + "/party-tree.json",
			"dataType" : "json" // needed only if you do not supply JSON headers
		}
	},
	"types" : 
	{
		"#" : 
		{
		  "max_children" : 1,
		  "max_depth" : 5,
		  "valid_children" : ["root"]
		},
		"root" : 
		{
			"icon" : "/website/image/hoc-32.png",
			"valid_children" : ["party"]
		},
		"party" : 
		{
			"valid_children" : ["constituency"]
		},
		"constitency" : 
		{
	   	    "icon" : "/website/image/group-16.png",
			"valid_children" : ["candidate"]
		},
		"candidate" : 
		{
			"icon" : "/website/image/person-16.png",
			 "valid_children" : []
		}
	},
	"plugins" : ["types", "theme", "search"]
});



// search the trees
$(function () {
  $("#party-tree").jstree({
    "plugins" : [ "search" ]
  });
  var to = false;
  $('#party-tree-search').keyup(function () {
    if(to) { clearTimeout(to); }
    to = setTimeout(function () {
      var v = $('#party-tree-search').val();
	  if (v.length >=3)
	  {
	      $('#party-tree').jstree(true).search(v);
	  }
    }, 250);
  });
});

$(function () {
  $("#results-tree").jstree({
    "plugins" : [ "search" ]
  });
  var to = false;
  $('#results-tree-search').keyup(function () {
    if(to) { clearTimeout(to); }
    to = setTimeout(function () {
      var v = $('#results-tree-search').val();
	  if (v.length >=3)
	  {
	      $('#results-tree').jstree(true).search(v);
	  }
    }, 250);
  });
});


// interaction and events
$('#party-tree').on("changed.jstree", function (e, data) {
  if (data.node.original.properties.hasOwnProperty('href'))
  {
	  window.location = data.node.original.properties.href;
  }
});

$('#constituency-tree').on("changed.jstree", function (e, data) {
	if (data.node.original.properties.hasOwnProperty('href'))
	{
		window.location = data.node.original.properties.href;
	}
});

