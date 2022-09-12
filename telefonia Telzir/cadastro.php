
<?php
include_once "conexao.php";

$ddOrigem = $_POST['ddOrigem'];
$ddDestino = $_POST['ddDestino'];
$tempo = $_POST['tempo'];
$planoFalaMais = $_POST['planoFalaMais'];
$taxafixa = 10/100;


// CASO TUDO ESTEJA OK INSERE DADOS NA BASE DE DADOS
$sql= " insert into plano(tempo, planoFalaMais, taxafixa, ddDestino, ddOrigem)
       values ('$tempo', '$planoFalaMais', '$taxafixa', '$ddDestino', '$ddOrigem')";
	   
	   
	   
	   //CASO ESTAJA TUDO OK ADICIONA OS DADOS. SE NÃO MOSTRA O ERRO
	   if (!mysqli_query($conn,$sql))
	   {
		   die("Error:" .mysqli_error($conn));
	   }
mysqli_close($conn);

//MOSTRA MENSAGEM DE SUCESSO
echo "<center>Registro inserido com sucesso!</center>";

header('location: index.php');
?>




