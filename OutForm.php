<html>
	<title> Форма обратной связи</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<form id="myform" method="post" action="OutFormAction.php">
			<span>Имя</span>
			<span class="glyphicon glyphicon-user"></span><br>
			<input type="text" class="form-control" name="usersName"/><br>
			<span>Фамилия</span><br>
			<span class="glyphicon glyphicon-user"></span><br>
			<input type="text" class="form-control" name="usersSurname"/><br>
			<span>E-mail</span><br>
			<span class="glyphicon glyphicon-pencil"></span><br>
			<input type="text" class="form-control" name="usersEmail"/><br>
			<span>Info</span><br>
			<textarea class="form-control" name="usersInfo"/></textarea><br>
			<button type="submit">Отправить</button>
		</form>
	</body>
</html>