# UK General Election 2017
Front-end for 2017 UK General Election data

## about the project
The Democracy Club does great work collating candidate data for all elections in the UK. This project is to provide a website front-end to that candidate data and results data gathered by the website author.

## author
Find Gerry Mulvenna at @gerrymulvenna on Twitter

This site took its starting point from the work carried out by Bob Harper for the #AE17 assembly election in Northern Ireland.
* http://electionsni.org

## the candidate data
For more details on the Democracy Club data see https://candidates.democracyclub.org.uk/help/api

## the map data
Map data came primarily from the Ordnance Survey borderline package
https://www.ordnancesurvey.co.uk/business-and-government/help-and-support/products/boundary-line.html
and OpenDataNI
https://www.opendatani.gov.uk/dataset/osni-open-data-50k-admin-boundaries-parliamentary-constituencies-20081

The open source application QGIS was used to convert the shapefiles into GEOJSON format with latitute longitude coordinates (EPSG:4326)
http://www.qgis.org/en/site/forusers/download.html

The Map Shaper application was invaluable for simplifying the GEOJSON data to achieve the required level of detail for our purpose and to drastically reduce the size of the boundary
Map Shaper is a very efficient and easy to use online application at http://mapshaper.org/

