<!DOCTYPE html> 
<html>
<head>
	<title>DGS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"> 
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta charset="utf-8" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" />
	<link rel="stylesheet" href="css/dgs.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
	<script src="js/jsrender.js"></script>
	<script src="js/fastclick.js"></script>
	<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=x&sensor=false"></script> -->
	<script src="js/dgs_app.js"></script>
	<script id="msgtmpl" type="text/x-jsrender">
		<a href="{{>href}}" class="msg">
			<div class="msg">
				<div class="title">
					<img src="{{>imgurl}}" />
					<span>{{>username}}</span>
					<span>{{>timeago}}</span>
				</div>
				<div>
					<p>{{>content}}</p>
				</div>
			</div>
		</a>
	</script>
</head>
<body>