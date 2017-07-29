
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
		$(document).ready(function(){
		    $.ajax({
		    	url: "http://localhost/team-17/maw/material-master/php/charts.php",
		    	dataType:"JSON",
		    	type: "GET",

		     success: function(results){
		     	
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

         function drawChart() {


//        var data = new google.visualization.DataTable();
// data.addColumn('string', 'Topping');
//         data.addColumn('number', 'Slices');     
//           for(var i=0;i<results.length;i++)
//       {  
//       	console.log(results);
//        data.addRows([["state",2]]);
// }
//       }

console.log(typeof(results[0])+results[1]['state']+results[1]['count']);

var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        for(var i=0;i<results.length;i++)
        {
        	data.addRows([[results[i]['state'],parseInt(results[i]['count'])]]);
        }




          var options = {
          title: 'Wishes in India',
          is3D:'true'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);


  }}});


$.ajax({
		    	url: "http://localhost/team-17/maw/material-master/php/charts2.php",
		    	dataType:"JSON",
		    	type: "GET",

		     success: function(results){
		     	
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

         function drawChart() {



var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        for(var i=0;i<results.length;i++)
        {
        	data.addRows([[results[i]['year'],parseInt(results[i]['count'])]]);
        }




          var options = {
          title: 'Wishes in India',
          curveType:'function',
          legend :{position:'bottom'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);


  }}});



		});
		</script>

  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
     <div id="curve_chart" style="width: 900px; height: 500px;"></div>
  </body>
</html>