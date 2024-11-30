<?php
	if ($_REQUEST['opcion']=="recordar"){
		setcookie("mail",$_REQUEST['mailusuario'],time()+(60*60*24*365),"/");
	}else{
		setcookie("mail","",time()-1000,"/");
	}
	header('location:index.php');
?>