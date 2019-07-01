<head>
<meta charset=utf-8 />
<title>Morris.js Area Chart</title>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<style>
  
  </style>
</head>
<body>
<ul class="nav nav-pills ranges">
  <li class="active"><a href="#" data-range='7'>7 Days</a></li>
  <li><a href="#" data-range='30'>30 Days</a></li>
  <li><a href="#" data-range='60'>60 Days</a></li>
  <li><a href="#" data-range='90'>90 Days</a></li>
</ul>

<div id="stats-container" style="height: 250px;"></div>

<script>
$(function() {

  // Create a function that will handle AJAX requests
  function requestData(days, chart){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "./api", // This is the URL to the API
      data: { days: days }
    })
    .done(function( data ) {
      // When the response to the AJAX request comes back render the chart with new data
      chart.setData(data);
    })
    .fail(function() {
      // If there is no communication between the server, show an error
      alert( "error occured" );
    });
  }

  var chart = Morris.Bar({
    // ID of the element in which to draw the chart.
    element: 'stats-container',
    data: [0, 0], // Set initial data (ideally you would provide an array of default data)
    xkey: 'date', // Set the key for X-axis
    ykeys: ['value'], // Set the key for Y-axis
    labels: ['Orders'] // Set the label when bar is rolled over
  });

  // Request initial data for the past 7 days:
  requestData(7, chart);

  $('ul.ranges a').click(function(e){
    e.preventDefault();

    // Get the number of days from the data attribute
    var el = $(this);
    days = el.attr('data-range');

    // Request the data and render the chart using our handy function
    requestData(days, chart);
  })
});
</script>
</body>