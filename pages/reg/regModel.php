<?php
	$host = '127.0.0.1';
	$user = 'root';
	$password = '';
	mysql_connect($host,$user,$password);
	mysql_select_db("bwt_practice");
	$result = mysql_query("insert into Users(id_users,Name,Surname,Pathronic,Sex,BirthDate,Date) values(NULL,'".$_POST['usersRealName']."','".$_POST['usersSurname']."','".$_POST['usersPathronicName']."','".$_POST['BirthDate']."','".$_POST['usersEmail']."')");
	if (!$result){
		echo "all isn't good";
	} else{
		echo "вы были успешно зарегистрированы";
	}
?>