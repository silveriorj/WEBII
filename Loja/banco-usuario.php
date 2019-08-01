<?php 

function buscaUsuario($conexao, $email, $senha)
{
	$senhaMd5 = md5($senha);
	$query = "select * from usuario where email like '{$email}' and senha like '{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

?>