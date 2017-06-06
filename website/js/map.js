var searchParams = getSearchParams();
var year = 2017;
if (searchParams['year'])
{
	year = searchParams['year'];
}

var jsondata = [];
var colors = [];
var currentLayer;        //global to keep track of selected constituency
var post_id;
var post_label;
var defaultStyle = {
	weight: 0.5,
	color: '#34495e',
	fillColor: 'pink',
	opacity: 1,
	fillOpacity: 0.707
	};

var nofillStyle = {
	weight: 0.5,
	fillOpacity: 0.707,
	opacity: 1
	};
		
function highlightFeature(e) {
	var layer = e.target;
		info.update(layer.feature.properties);
	}

function resetHighlight(e) {
	info.update();
}	

function clickFeature(e) {
	var layer = e.target;
	layerSelect(layer, true);
}

function layerSelect(layer, by_event)
{
	if (typeof(layer) != "undefined")
	{
		boundaries.setStyle(nofillStyle);
		currentLayer = layer;
		layer.setStyle({
				weight: 3,
				fillOpacity: 1
		});
		var currentZoom = map.getZoom();
		var maxZoom = (currentZoom <= 7) ? 7: currentZoom;
		map.fitBounds(layer, {maxZoom: maxZoom});

		if (!L.Browser.ie && !L.Browser.opera) {
			layer.bringToFront();
			}
		info.update(layer.feature.properties);
		post_id = layer.feature.properties.CODE;
		post_label = layer.feature.properties.NAME.replace(/ (Co|Burgh|Boro) Const$/g, '');
		updateCandidates();
		updateTitle(post_label);
		selectTab('#candidates-' + year);
		tips.update('<a href="#tab1">Go to information below</a>');
		if (by_event)
		{
			setParam({'wmc' : post_id, 'year' : year});
		}
	}
	else
	{
		$(".tab-content:visible").html("Select a constituency from the map");
	}
}

function onEachFeature(feature, layer) {
	layer.on({
		mouseover: highlightFeature,
		mouseout: resetHighlight,
		click: clickFeature
	});
}
		
var boundaries = new L.GeoJSON.AJAX('/2017/boundaries/uk-boundaries.geojson', {
	style: defaultStyle,
	onEachFeature: onEachFeature
	});

var map = L.map('map', {
	tap: false,
	minZoom: 5,
	maxZoom: 16
	});

map.setView([mapLat, mapLong], mapZoom);
mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

L.tileLayer(
		'https://a.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYm9iaGFycGVyIiwiYSI6ImQwOTg1YTg2MTQzYzk3Mzc5MWVjYzFkZDQzN2M1NTUzIn0.mA2WO4WAZzh-qwoqN4QVjg', {
		attribution: '&copy; ' + mapLink + ' | <a href=\"https://www.mapbox.com/about/maps/\" target=\"_blank\">&copy; Mapbox</a> | Boundaries: <a href="http://www.lgbc-scotland.gov.uk/maps/datafiles/index_1995_on.asp">LGBC</a>',
		maxZoom: 18,
		}).addTo(map);

boundaries.addTo(map);

// element to display council / ward information on map
var info = L.control();
info.onAdd = function (map) {
	this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info" inside the map
	this.update();
	return this._div;
};
// method that we will use to update the map info control based on feature properties passed
info.update = function (props) {
	var name = (props) ? props.NAME.replace(/ (Co|Burgh|Boro) Const$/g, '') : '';
	this._div.innerHTML = '<h4>Constituency</h4>' +  name;
};
info.addTo(map);

// element to display tips
var tips = L.control();
tips.onAdd = function (map) {
	this._div = L.DomUtil.create('div', 'tips'); // create a div with a class "tips" inside the map
	return this._div;
};
// display a prompt to look at candidates below on a small screen
tips.update = function (msg) {
	if ($(window).width()<792)
	{
		tips._div.style.display = "block";
		this._div.innerHTML = msg;
	}
	else
	{
		tips._div.style.display = "none";
	}
};
tips.addTo(map);


// update candidate info for all years
function updateCandidates()
{
	var years = {"2015":"2015-05-07", "2017":"2017-06-08"};
	$.each(years, function (y, electionDate) {
		findInfo(y, 'parl.' + electionDate + '.json');   //populate jsondata

		var ack = '<div id="ack"><div id="dc-caption">This full set of candidate data was collated by</div><div id="dc-logo"><a href="http://democracyclub.org.uk"><img src="https://democracyclub.org.uk/static/dc_theme/images/logo-with-text-2017.png" width="250"></a></div><div id="disclaimer">DISCLAIMER The ordering of the candidates above is a best guess. The actual ballot paper for this ward may interpret the alphabetical ordering of candidates\' names differently.</div>';
		this.innerHTML = '';
		var tw;
		var fb;
		var fbp;
		var web;
		var linkedin;
		var wiki;
		var status;
		var party;

		var cData = getObjects(jsondata, 'post_id', 'WMC:' + post_id);

		if (cData.length > 0)
		{
			$.ajax({
				'async': false,
				'global': false,
				'url': '/' + year + '/results/' + post_id + '.json?' + new Date().getTime(),
				'dataType': "json",
				'success': function (data) {
					var cinfo = data.Constituency.countInfo;
					var turnout = ((parseInt(cinfo.Total_Poll)/parseInt(cinfo.Total_Electorate)) * 100).toFixed(2);
					$("#electorate").html("<p>Electorate: " + numberWithCommas(parseInt(cinfo.Total_Electorate)) + ", Turnout: " + numberWithCommas(parseInt(cinfo.Total_Poll)) + " (" + turnout + "%), Valid votes: " + numberWithCommas(parseInt(cinfo.Valid_Poll)) + ", Quota: " + numberWithCommas(quota) + "</p>\n");
				}});

			var candidates = cData[0].candidates.sort(cmpSurnames);
			var html = '<h3><a class="cand_anchor" name="candidates">' + post_label + '</a><br><span class="seats">' + candidates.length + ' candidates in ' + y + '</span></h3>';
			for (i = 0; i < candidates.length; i++) {
				tw = (candidates[i].twitter_username) ? '<a href="http://twitter.com/' + candidates[i].twitter_username + '" target="~_blank"><i class="fa fa-twitter fa-fw" title="@' +  candidates[i].twitter_username + ' on Twitter"></i></a>' : '';
				fb = (candidates[i].facebook_page_url) ? '<a href="' + candidates[i].facebook_page_url + '" target="_blank"><i class="fa fa-facebook fa-fw"  title="Facebook page"></i></a>' : '';
				fbp = (candidates[i].facebook_personal_url) ? '<a href="' + candidates[i].facebook_personal_url + '" target="_blank"><i class="fa fa-facebook-official fa-fw" title="Personal Facebook profile"></i></a>' : '';
				web = (candidates[i].homepage_url) ? '<a href="' + candidates[i].homepage_url + '" target="_blank"><i class="fa fa-globe fa-fw" title="Homepage for this candidate"></i></a>' : '';
				linkedin = (candidates[i].linkedin_url) ? '<a href="' + candidates[i].linkedin_url + '" target="_blank"><i class="fa fa-linkedin fa-fw" title="This candidate has a LinkedIn profile"></i></a>' : '';
				wiki = (candidates[i].wikipedia_url) ? '<a href="' + candidates[i].wikipedia_url + '" target="_blank"><i class="fa fa-wikipedia-w fa-fw" title="This candidate has an entry on Wikipedia"></i></a>' : '';
				edit = '<a href="http://candidates.democracyclub.org.uk/person/' + candidates[i].id + '/" target="_blank"><i class="fa fa-check-square-o fa-fw" title="View or edit the Democracy Club details for this candidate"></i></a>';
				switch(candidates[i].elected)
				{
					case "True":
						status = "elected";
						break;
					case "False":
						status = "excluded";
						break;
					default:
						status = "unkonwn";
				}
				party = candidates[i].party_name.replace(/\s+/g, "-").replace(/[\'\"&,.()]/g,"").replace(/\u2013/g, '_').replace(/\u00e9/g, 'e');
				html += "<div class=\"votes " + party + "\"></div><div id=\"candidate " + candidates[i].id + "\" class=\"tooltip " + party + "_label\"><span class=\"tooltiptext\">" + candidates[i].party_name + "</span>" + '<span class="' + status +'">' + candidates[i].name + "</span><div class=\"cand-icons\">" + tw + fb + fbp + web  + linkedin + wiki  + edit + "</div></div><br/>";
			}
			html += ack;
			$('#candidates-' + y).html(html);
		}
	});
}


// detect if user agent is iOS and provide two-tap guidance
if ( /iPhone|iPad|iPod/.test(navigator.userAgent)) {
	tips.update('Tap once to preview<br>a second time to select');
}

// examine the boundaries object (b) for a feature with a matching property (key == val)
function getLayer(b, key, val) {
    for (var i in b._layers)
	{
		if (b._layers[i].feature.properties[key] == val)
		{
			return b._layers[i];
		}
    }
}

// cross-browser search param functions
function getSearchParams(k){
 var p={};
 location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){p[k]=v})
 return k?p[k]:p;
}

//function to record ward_code in URL search query string (assumes it is only parameter)
function setParam(params){
	var segments = [];
	$.each(params, function(key, value) {
		segments.push(key + "=" + value);
	});
	var searchString = segments.join('&');
	window.history.replaceState({}, '', location.pathname + '?' + searchString);
}

// change the title to reflect the ward selected
function updateTitle (constituency)
{
	var title = document.title;
	document.title = "Data for the UK General Election 2017, " + constituency + " constituency";
}

// request candidate info for the specified year (can use this for other request by changing filename arg)
// outputs the parse Json responseText to global var jsondata
function findInfo(year, filename) {
	$.ajax({
		'async': false,
		'global': false,
		'url': '/' + year + '/' + filename,
		'dataType': "json",
		'success': function (data) {
			jsondata = data;
		}});
}

// examine an object array (obj) for a key (key) matching a value (val) and return the matching object
function getObjects(obj, key, val) {
    var objects = [];
    for (var i in obj) {
        if (!obj.hasOwnProperty(i)) continue;
        if (typeof obj[i] == 'object') {
            objects = objects.concat(getObjects(obj[i], key, val));
        } else
        //if key matches and value matches or if key matches and value is not passed (eliminating the case where key matches but passed value does not)
        if (i == key && obj[i] == val || i == key && val == '') { //
            objects.push(obj);
        } else if (obj[i] == val && key == '') {
            //only add if the object is not already in the array
            if (objects.lastIndexOf(obj) == -1) {
                objects.push(obj);
            }
        }
    }
    return objects;
}

// used in sorting candidates
function cmpSurnames(a, b)
{
	anames = splitName(a.name);
	bnames = splitName(b.name);
	anorm = anames.Surname.toUpperCase() + " " + anames.Firstname.toUpperCase();
	bnorm = bnames.Surname.toUpperCase() + " " + bnames.Firstname.toUpperCase();
	if (anorm < bnorm) 
	{
		return -1;
	}
	if (anorm > bnorm) 
	{
		return 1;
	}
	// a must be equal to b
	return 0;
}

// return an array with firstname, surname elements
function splitName(name)
{
	var ret = [];
	var pos = strrpos(name, " ");
	if (pos)
	{
		ret['Surname'] = name.substr(pos + 1);
		ret['Firstname'] = name.substr(0, pos);
	}
	return (ret);
}

function strrpos (haystack, needle, offset) {
  //  discuss at: http://locutus.io/php/strrpos/
  // original by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Onno Marsman (https://twitter.com/onnomarsman)
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  //    input by: saulius
  //   example 1: strrpos('Kevin van Zonneveld', 'e')
  //   returns 1: 16
  //   example 2: strrpos('somepage.com', '.', false)
  //   returns 2: 8
  //   example 3: strrpos('baa', 'a', 3)
  //   returns 3: false
  //   example 4: strrpos('baa', 'a', 2)
  //   returns 4: 2
  var i = -1
  if (offset) {
    i = (haystack + '')
      .slice(offset)
      .lastIndexOf(needle) // strrpos' offset indicates starting point of range till end,
    // while lastIndexOf's optional 2nd argument indicates ending point of range from the beginning
    if (i !== -1) {
      i += offset
    }
  } else {
    i = (haystack + '')
      .lastIndexOf(needle)
  }
  return i >= 0 ? i : false
}

// straightfoward, take a number element e.g. 78521 and add thousand-separator comma to return '78,521' (n.b. this is a string)
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// handle the selection / de-selection of tab-menu
// id: selected tab-menu id including # prefix
function selectTab(id)
{
	var selector = ".tabs-menu a[href='" + id + "']";
	var link = $(selector);
	link.parent().addClass("current");
	link.parent().siblings().removeClass("current");
	var tab = $(id);
	$(".tab-content").not(tab).css("display", "none");
	tab.css('display', 'block');
}

function applyColors(y)
{
	boundaries.setStyle(defaultStyle);
	var count = 0;
	$.getJSON('/' + y + '/colors.json?' + new Date().getTime(), function (data) {
		$.each( data, function( wmc, color ) {
			var thisLayer = getLayer(boundaries, 'CODE', wmc);
			count++;
			if (thisLayer)
			{
				thisLayer.setStyle({fillColor: color, fillOpacity: 0.707});
			}
		});
		var chart = 'uk' + year + 'chart';
		var html = 'Showing ' + count + ' of 650 constituencies (' + year + ')<div id="' + chart + '"></div>';
		$('#uk-' + y).html(html);
	});
}

$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
		$(tab).css("display", "block");
//        $(tab).fadeIn(400, function(){
			var params = {};
			switch(tab)
			{
				case '#candidates-2017':
					year = "2017";
					applyColors(year);
					layerSelect(currentLayer, false);
					params['wmc'] = post_id;
					break;
				case "#uk-2017":
					year = "2017";
					applyColors(year);
					overview_by_var(year, "no_seats", "name", "seat", "seats", "no_seats", '#uk' + year + 'chart');
					break;
				case '#candidates-2015':
					year = "2015";
					applyColors(year);
					layerSelect(currentLayer, false);
					params['wmc'] = post_id;
					break;
				case "#uk-2015":
					year = "2015";
					applyColors(year);
					overview_by_var(year, "no_seats", "name", "seat", "seats", "no_seats", '#uk' + year + 'chart');
					break;
			}
			params['year'] = year;
			setParam(params);
			$(".tab-content").each(function(i, obj) {
				console.log(obj);
			});
//		});
    });
});

$(window).load(function(e) {
	applyColors(year);
	if (searchParams['wmc'])
	{
			var initlayer = getLayer (boundaries, 'CODE', searchParams['wmc']);
			if (initlayer)
			{
				layerSelect(initlayer, false);
			}
	}
	else
	{
		selectTab("#uk-2017");
	}
});

