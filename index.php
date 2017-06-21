<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"/>
	<!-- Latest compiled and minified JavaScript -->
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<title>My Main page</title>
</head>
<body>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<?php
		$menu = array(
			'index.php' => '<span class = "glyphicon glyphicon-home"></span>',
			'?mod=auth' => 'Auth',
			'?mod=weatherForecast' => 'weather',
			'?mod=comments' => 'comments',
			'?mod=Feedback' => 'feedback'
		);
	?>
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	  	<div class="container-fluid">
	    	<?php 
	    		foreach ($menu as $k => $v) {
					echo "<li class = 'myMenuLi'><a href = '".$k."'>".$v."</a></li>".PHP_EOL;
				}
			?>	
	    </div>
	</nav>
	<?
		switch ($_GET['mod']) {
			case 'index':
				include "index.php";
				break;
			case 'auth':
				include($_SERVER['DOCUMENT_ROOT']."/pages/auth/authView.php");
				break;
			case 'weatherForecast':
				include($_SERVER['DOCUMENT_ROOT']."/pages/weatherForecast/weatherForecastView.php");
				break;
			case 'reg':
				include($_SERVER['DOCUMENT_ROOT']."/pages/reg/regView.php");
				break;
			case 'comments':
				include($_SERVER['DOCUMENT_ROOT']."/pages/comments/commentsView.php");
				break;
			case 'Feedback':
				include($_SERVER['DOCUMENT_ROOT']."/FeedBack/FeedbackView.php");
				break;
			default:
				echo "";
				break;
		}
		echo $_SESSION['my'];
    ?>
</body>
</html>