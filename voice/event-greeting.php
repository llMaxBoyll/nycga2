<?php

include("/var/www/nycga.net/web/env.php");

  // Get the search variable from URL

  $var = @$_GET['q'] ;
  $trimmed = trim($var); //trim whitespace from the stored variable

// rows to return
$limit=3; 


//connect to your database ** EDIT REQUIRED HERE **
mysql_connect(constant("DB_HOST"),constant("DB_USER"),constant("DB_PASSWORD")); //(host, username, password)

//specify database ** EDIT REQUIRED HERE **
mysql_select_db(constant("DB_NAME")) or die("Unable to select database"); //select which database we're using
mysql_query("set time_zone = '-5:00'");

// Build SQL Query  
$query = "SELECT wp_em_events.event_name, DATE_FORMAT(wp_em_events.event_start_time,'%l:%i%p') as StartTime, DATE_FORMAT(wp_em_events.event_end_time,'%l:%i%p') as EndTime, DATE_FORMAT(wp_em_events.event_start_date,'%W %M %D') as StartDate, wp_em_events.location_id, wp_em_locations.location_name as LocationName, wp_em_locations.location_address as LocationAddress, wp_em_events.group_id, wp_bp_groups.name as GroupName, wp_em_categories.category_name as CategoryName " .
"FROM wp_em_events LEFT JOIN wp_em_locations ON wp_em_events.location_id = wp_em_locations.location_id " .
"LEFT JOIN wp_bp_groups ON wp_em_events.group_id = wp_bp_groups.id " .
"LEFT JOIN wp_em_categories ON wp_em_events.event_category_id = wp_em_categories.category_name " .
"WHERE event_start_date = DATE( NOW( ) ) and event_end_time >= CURTIME( )";


 $numresults=mysql_query($query);
 $numrows=mysql_num_rows($numresults);
 
$gaquery = "SELECT wp_em_events.event_name, DATE_FORMAT(wp_em_events.event_start_time,'%l:%i%p') as StartTime, DATE_FORMAT(wp_em_events.event_end_time,'%l:%i%p') as EndTime, DATE_FORMAT(wp_em_events.event_start_date,'%W %M %D') as StartDate, wp_em_events.location_id, wp_em_locations.location_name as LocationName, wp_em_locations.location_address as LocationAddress, wp_em_events.group_id, wp_bp_groups.name as GroupName, wp_em_categories.category_name as CategoryName " .
"FROM wp_em_events LEFT JOIN wp_em_locations ON wp_em_events.location_id = wp_em_locations.location_id " .
"LEFT JOIN wp_bp_groups ON wp_em_events.group_id = wp_bp_groups.id " .
"LEFT JOIN wp_em_categories ON wp_em_events.event_category_id = wp_em_categories.category_name " .
"WHERE event_start_date = DATE( NOW( ) ) and event_end_time >= CURTIME( ) and (event_name like '%Spokes%' or event_name like '%General Assembly%')";
 
 $ganumresults=mysql_query($gaquery);
 $ganumrows=mysql_num_rows($ganumresults);



// next determine if s has been passed to script, if not use 0
  if (empty($s)) {
  $s=0;
  }

// get results
  $query .= " limit $s,$limit";
  $result = mysql_query($query) or die("Couldn't execute query");
  $timenow = date("h:i A");
 // echo "$timenow";
// display what the person searched for
echo "There are $numrows more scheduled events today.";




if ($numrows <= 53) {
  
 

 $gaquery3 = "SELECT wp_em_events.event_name, DATE_FORMAT(wp_em_events.event_start_time,'%l:%i%p') as StartTime, DATE_FORMAT(wp_em_events.event_end_time,'%l:%i%p') as EndTime, DATE_FORMAT(wp_em_events.event_start_date,'%W %M %D') as StartDate, wp_em_events.location_id, wp_em_locations.location_name as LocationName, wp_em_locations.location_address as LocationAddress, wp_em_events.group_id, wp_bp_groups.name as GroupName, wp_em_categories.category_name as CategoryName " .
"FROM wp_em_events LEFT JOIN wp_em_locations ON wp_em_events.location_id = wp_em_locations.location_id " .
"LEFT JOIN wp_bp_groups ON wp_em_events.group_id = wp_bp_groups.id " .
"LEFT JOIN wp_em_categories ON wp_em_events.event_category_id = wp_em_categories.category_name " .
"WHERE event_start_date = CURDATE( ) + 1";
 
 $ganumresults3=mysql_query($gaquery3);
 $ganumrows3=mysql_num_rows($ganumresults3);

  
  
  $gaquery3 .= " limit $s,$limit";
  $garesult3 = mysql_query($gaquery3) or die("Couldn't execute query");
  $gatimenow3 = date("h:i A");

  echo " . and $ganumrows3 for tomorrow.";

  
  }


  
  
  
  $gaquery .= " limit $s,$limit";
  $garesult = mysql_query($gaquery) or die("Couldn't execute query");
  $gatimenow = date("h:i A");
// display what the person searched for
// begin to show results set

$gacount = 1 + $s ;

// now you can display the results returned
  while ($row= mysql_fetch_array($garesult)) {
  $eventname = $row["event_name"];
  $startime = $row["StartTime"];
  $endtime = $row["EndTime"];
  $startdate = $row["StartDate"];
  $locationname = $row["LocationName"];
  $locationaddress = $row["LocationAddress"];
  $groupname = $row["GroupName"];

// text for ga or spokes time
  echo " . $eventname starts at . $startime at $locationaddress ." ;
  $gacount++ ;
  }

  
  
  if ($ganumrows < 1) {
  
 

 $gaquery2 = "SELECT wp_em_events.event_name, DATE_FORMAT(wp_em_events.event_start_time,'%l:%i%p') as StartTime, DATE_FORMAT(wp_em_events.event_end_time,'%l:%i%p') as EndTime, DATE_FORMAT(wp_em_events.event_start_date,'%W %M %D') as StartDate, wp_em_events.location_id, wp_em_locations.location_name as LocationName, wp_em_locations.location_address as LocationAddress, wp_em_events.group_id, wp_bp_groups.name as GroupName, wp_em_categories.category_name as CategoryName " .
"FROM wp_em_events LEFT JOIN wp_em_locations ON wp_em_events.location_id = wp_em_locations.location_id " .
"LEFT JOIN wp_bp_groups ON wp_em_events.group_id = wp_bp_groups.id " .
"LEFT JOIN wp_em_categories ON wp_em_events.event_category_id = wp_em_categories.category_name " .
"WHERE event_start_date = CURDATE( ) + 1 and (event_name like '%Spokes%' or event_name like '%General Assembly%')";
 
 $ganumresults2=mysql_query($gaquery2);
 $ganumrows2=mysql_num_rows($ganumresults2);

  
  
  $gaquery2 .= " limit $s,$limit";
  $garesult2 = mysql_query($gaquery2) or die("Couldn't execute query");
  $gatimenow2 = date("h:i A");
// display what the person searched for
// begin to show results set

$gacount2 = 1 + $s ;

// now you can display the results returned
  while ($row= mysql_fetch_array($garesult2)) {
  $eventname = $row["event_name"];
  $startime = $row["StartTime"];
  $endtime = $row["EndTime"];
  $startdate = $row["StartDate"];
  $locationname = $row["LocationName"];
  $locationaddress = $row["LocationAddress"];
  $groupname = $row["GroupName"];

// text for ga or spokes time
  echo " . Tomorrows . $eventname starts at . $startime at $locationaddress ." ;
  $gacount2++ ;
  }

  
  
  
  
  
  
  
  
  }
  
  
  
$currPage = (($s/$limit) + 1);


// calculate number of pages needing links
  $pages=intval($numrows/$limit);

// $pages now contains int of pages needed unless there is a remainder from division

  if ($numrows%$limit) {
  // has remainder so add one page
  $pages++;
  }


$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
 
  
?>