<?php
	if (isset($_POST['submit'])){
		$query = mysql_query("select usersLogin,usersPass from Users where usersLogin='".mysql_real_escape_string($_POST['userEmail'])."' and usersPass='".mysql_real_escape_string($_POST['usersPass'])."')");
		$data = mysql_fetch_assoc($query);
		if ($data['usersPass']==$_POST['usersPass']){
			echo "вы авторизованы";
		} else{
			echo "Такого пользователя нет и не было, зарегистрирутесь, пожалуйста";
		}
	}
?>