<?php
	$host = '127.0.0.1';
	$username='root';
	$password='';
	mysql_connect($host,$username,$password);
	mysql_select_db("bwt_practice");
	$result = mysql_query("insert into comments(id,usersName,usersMind) values(NULL,'".$_POST['usersName']."','".$_POST['usersMind']."')");
	if (!$result){
		echo "Not so good all";
	} else{
		echo "all is good";
	}
?>