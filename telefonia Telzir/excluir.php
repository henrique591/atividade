<?php
//verifica a conexao
include "conexao.php";

$id = $_POST['id'];
// faz o metodo de deleta
$buscar_cadastros = "DELETE  FROM plano WHERE id = $id ";

$query_cadastros = mysqli_query($conn, $buscar_cadastros);
//voltar para pagina listagem
header('location: index.php');

?>
