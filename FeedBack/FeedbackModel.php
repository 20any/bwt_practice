<html>
<head>
	<style>
		.send{
			position:relative;
			top: 50vh;
		}
	</style>
</head>
<body>
<?php
	$host = '127.0.0.1';
	$user = 'root';
	$password = '';
	$database = 'bwt_practice';
	$connection = mysql_connect($host,$user,$password);
	if (!$connection){
		echo "всё плохо";
	}
	mysql_select_db($database);
	$username = $_POST['userName'];
	$userSurname = $_POST['usersSurname'];
	$usersEmail = $_POST['usersEmail'];
	$feedback = $_POST['feedback'];
	$result = mysql_query("insert into FeedbackTable(id,name,surname,email,feedback) values(NULL,'".$username."','".$userSurname."','".$usersEmail."','".$feedback."')");
	if (!$result){
		echo "что-то пошло не так";
	} else{
		echo "<center><h1 class='send'>отправлено</h1></center>";
	}
?>
</body>
</html>