<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Форма отзывов</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
	<style>
		
	</style>
</head>
<body>
	<div class="container">
		<form method="post" action="FeedBack/FeedbackModel.php">
			<span>Имя</span><br>
			<span class="glyphicon glyphicon-user"></span><br>
			<input type="text" name="userName" class="form-control"><br>
			<span>Фамилия</span><br>
			<span class="glyphicon glyphicon-user"></span><br>
			<input type="text" name="usersSurname" class="form-control"><br>
			<span>E-mail</span><br>
			<span class="glyphicon glyphicon-envelope"></span><br>
			<input type="text" name="usersEmail" class="form-control"><br>
			<span>Отзыв</span><br>
			<textarea name="feedback" class="form-control"></textarea><br>
			<button type="submit" class="form-control">Отправить</button>
		</form>
	</div>
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>