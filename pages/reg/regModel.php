<?php
	$host = '127.0.0.1';
	$user = 'root';
	$password = '';
	mysql_connect($host,$user,$password);
	mysql_select_db("bwt_practice");
	$name = $_POST['usersRealName']; 
	$surname = $_POST['usersSurname'];
	$pathronic = $_POST['usersPathronicName'];
	$login = $_POST['usersLogin'];
	$Userspass = $_POST['usersPass'];
	$usersSex = $_POST['usersSex'];
	$BDate = $_POST['BirthDate'];
	$usersEmail = $_POST['usersEmail'];
	$result = mysql_query("insert into Users(id_users,Name,Surname,Pathronic,usersLogin,usersPass,Sex,BirthDate,email) values(NULL,'".$name."','".$surname."','".$pathronic."','".$login."','".$Userspass."','".$usersSex."','".$BDate."','".$usersEmail."')");
	if (!$result){
		echo "all isn't good";
	} else{
		echo "вы были успешно зарегистрированы";
	}
?>