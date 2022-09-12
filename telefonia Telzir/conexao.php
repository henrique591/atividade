<?php

$servidor = "localhost";
$banco = "cliente";
$usuario = "root";
$senha ="";
$porta = "3306";

//criando uma conexão com o banco de dados

$conn = mysqli_connect ($servidor, $usuario, $senha, $banco, $porta);

//checando a conexão se foi bem sucedida com 

if (!$conn){
	
	die("Conexão: Podemos ver que deu erro!" .mysqli_connect_error());
	
}


?>