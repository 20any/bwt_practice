<div class="container">
	<div class="row">
		<div class="col-md-4">
			<form method="post" action="pages/reg/regModel.php">
				<label><span class="glyphicon glyphicon-user"></span>Имя</label>
				<input class="form-control" type="text" name="usersRealName">
				<label><span class="glyphicon glyphicon-user"></span>Фамилия</label>
				<input class="form-control" type="text" name="usersSurname">
				<label><span class="glyphicon glyphicon-user"></span>Отчество</label>
				<input class="form-control" type="text" name="usersPathronicName">
				<label><span class="glyphicon glyphicon-user"></span>Логин</label>
				<input class="form-control" type="text" name="usersLogin">
				<label><span class="glyphicon glyphicon-user"></span>Пароль</label>
				<input class="form-control" type="password" name="usersPass">
				<label>Пол</label>
				<select class="form-control" name="usersSex">
					<option>Муж</option>
					<option>Жен</option>
				</select>
				<label>Дата рождения</label>
				<input class="form-control" type="date" name="BirthDate">
				<label><span class="glyphicon glyphicon-envelope"></span> E-mail</label>
				<input class="form-control" type="text" name="usersEmail"><br>
				<button class="form-control" type="submit">Зарегистрироваться</button>
			</form>
		</div>
	</div>
</div>