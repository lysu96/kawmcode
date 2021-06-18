<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script type="text/javascript">
		var time = 10; //How long (in seconds) to countdown
		var page = "https://www.google.com/"; //The page to redirect to
		function countDown(){
			time--;
			gett("container").innerHTML = time;
			if(time == -1){
				window.location = page;
			}
		}
		function gett(id){
			if(document.getElementById) return document.getElementById(id);
			if(document.all) return document.all.id;
			if(document.layers) return document.layers.id;
			if(window.opera) return window.opera.id;
		}
		function init(){
			if(gett('container')){
				setInterval(countDown, 1000);
				gett("container").innerHTML = time;
			}
			else{
				setTimeout(init, 50);
			}
		}
		document.onload = init();
</script>

</head>
<body>
	<h2>Chuẩn bị để được chuyển hướng sau <span id="container"></span> giây!</h2>
</body>
</html>