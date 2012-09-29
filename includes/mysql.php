<?php
	$aceite=null; //Confirma connexao a base de dados sem aparecer mensagem
	$host = "localhost";
	 $user = "root";
	 $pwd = "";
	 $db = "database1";
//Confirmaçao de connexao a base de dados se precisar de testar
 function  conexao ()
 {
	mysql_connect('localhost','root','database1'); 
if (!$link) { 
	die('Could not connect to MySQL: ' . mysql_error()); 
} 
echo "$aceite"; mysql_close($link); 
 
}

?>
