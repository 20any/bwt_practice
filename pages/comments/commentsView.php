<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<title>Page for comments</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<form method="post" action="pages/comments/commentsModel.php">
					<span>Your name</span>
					<input type="text" name="usersName" class="form-control">
					<span>Your mind</span>
					<textarea name="usersMind" class="form-control"></textarea><br>
					<button type="submit" class="form-control">Ответить</button>
				</form>
				<?php
					$host = '127.0.0.1';
					$user = 'root';
					$password = '';
					mysql_connect($host,$user,$password);
					mysql_select_db("bwt_practice");
					$result = mysql_query("select * from comments order by id DESC");
					while ($row=mysql_fetch_array($result)){
						echo "<b>".$row['usersName']."</b>"."<br>".$row['usersMind']."<br>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>