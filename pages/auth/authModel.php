<?php
	//if (isset($_POST['submit'])){
		$host = '127.0.0.1';
		$user = 'root';
		$password = '';
		mysql_connect($host,$user,$password);
		mysql_select_db("bwt_practice");
		$query = mysql_query("select usersLogin,usersPass from Users where usersLogin='".mysql_real_escape_string($_POST['userEmail'])."' and usersPass='".mysql_real_escape_string($_POST['usersPass'])."')");
		$data = mysql_fetch_assoc($query);
		if ($data['usersPass']==$_POST['usersPass']){
			session_start(oid);
			echo "ya tut";
			$_SESSION['my']='test';
			echo '<script>location.replace("../../index.php");</script>';
			exit;
		} else{
			echo "Такого пользователя нет и не было, зарегистрирутесь, пожалуйста";
		}
	//}
?>