<!DOCTYPE html>
<html>
<head>
	<title>Sample</title>

<script
  src="http://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
</head>
<body>
<div id="noti" style="display: none;">You have new wishes added to the data base</div>
<h1>SAMPLE APPLICATION</h1>

<script type="text/javascript">
	$(document).ready(function(){

setTimeout(function(){


	setInterval(notification(0),12000);
},5000);
	



	function notification(old){
		$.ajax({
url: "notification.php",
type:'GET',
success(count){
	var count=parseInt(count);
	if (count>old)
	{
		$("#noti").show(3000);
		$("#noti").hide(1000);

	old=count;	

	$.ajax({
		url:'notified.php',
		type:'GET',
		success(){
			console.log("done updating");
		}
	});


	}
}

});
		
	}



}); //end of ready	
</script>
</body>
</html>