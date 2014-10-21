
<html>
<head>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<link rel="stylesheet" href="calendar.css"  />

</head>
<body>


<div style="text-align:center;">
  
  
<div class="maindiv">
<form method="post">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
  <tr>
    
    </tr>
  <tr>
    <td colspan="3" align="left" valign="middle"></td>
    </tr>
  <tr>
    <td colspan="3" align="left" valign="middle"><?php
//Draw Calendar
function draw_calendar($month,$year){

	// Draw table for Calendar 
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';

	// Draw Calendar table headings 
	$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	//days and weeks variable for now ... 
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	// row for week one 
	$calendar.= '<tr class="calendar-row">';

	// Display "blank" days until the first of the current week 
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		$days_in_this_week++;
	endfor;

	// Show days.... 
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		if($list_day==date('d') && $month==date('n'))
		{
			$currentday='currentday';
		}else
		{
			$currentday='';
		}
		$calendar.= '<td class="calendar-day '.$currentday.'">';
		
			// Add in the day number
			if($list_day<date('d') && $month==date('n'))
			{
				$showtoday='<strong class="overday">'.$list_day.'</strong>';
			}else
			{
				$showtoday=$list_day;
			}
			$calendar.= '<div class="day-number">'.$showtoday.'</div>';

		// Draw table end
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	// Finish the rest of the days in the week
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np">&nbsp;</td>';
		endfor;
	endif;

	// Draw table final row
	$calendar.= '</tr>';

	// Draw table end the table 
	$calendar.= '</table>';
	
	// Finally all done, return result 
	return $calendar;
}

echo '<h2>'.date('M').' '.date('Y').'</h2>';
echo draw_calendar(date('n'),date('Y'));
?></td>
  </tr>
  </table>
</form>
</div>

<script>

$('td.calendar-day').on('click', function() {
	console.log("success");
	$.ajax();

	//ADD IN HIGHLIGHTING
});

</script>

<script>
$.ajax({
    // the URL for the request
    url: "newEvent.php",
 
    // the data to send (will be converted to a query string)
    data: {
        time: '2014-06-21 12:59:59'
		eventID: '1'
    },
 
    // whether this is a POST or GET request
    type: "GET",
 
    // the type of data we expect back
    //dataType : "json",
 
    // code to run if the request succeeds;
    // the response is passed to the function
    /*success: function( json ) {
        $( "<h1/>" ).text( json.title ).appendTo( "body" );
        $( "<div class=\"content\"/>").html( json.html ).appendTo( "body" );
		console.log("more success");
    },
 
    // code to run if the request fails; the raw request and
    // status codes are passed to the function
    error: function( xhr, status, errorThrown ) {
        alert( "Sorry, there was a problem!" );
        console.log( "Error: " + errorThrown );
        console.log( "Status: " + status );
        console.dir( xhr );
    },
	*/
    // code to run regardless of success or failure
    complete: function( xhr, status ) {
        alert( "The request is complete!" );
    }
});
</script>

</body>
</html>
