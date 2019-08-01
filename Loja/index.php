<?php include 'cabecalho.php'; ?>

<?php 
if(isset($_GET["logout"]) && $_GET["logout"]==true)
{ ?>
		<p class="alert-success">Sessão finalizada!</a>
<?php } ?>

<?php 
if(isset($_GET["login"]) && $_GET["login"]==true)
{ ?>
		<p class="alert-success">Logado com sucesso!</a>
<?php } ?>

<?php 
if(isset($_GET["login"]) && $_GET["login"]==false)
{ ?>
		<p class="alert-danger">Usuario ou senha inválida!</a>
<?php } ?>

<?php 
if(isset($_GET["falhaDeSeguranca"]) && $_GET["falhaDeSeguranca"]==true)
{ ?>
		<p class="alert-danger">Você não tem permissão para realizar essa ação!</a>
<?php } ?>




<h1>Bem Vindo!</h1>

<?php
if(isset($_COOKIE["usuario_logado"])) {
?>
<p class="text-success">Você está logado como <?= $_COOKIE["usuario_logado"] ?>. <a href="logout.php">Deslogar</a></p>
<?php
}
else
{
?>
<h2>Login</h2>
<form action="login.php" method="post">
	<table class="table">
		<tr>
			<td>Email</td>
			<td><input class="form-control" type="email" name="email"></td>
		</tr>
		<tr>
			<td>Senha</td>
			<td><input class="form-control" type="password" name="senha"></td>
		</tr>
		<tr>
			<td><button class="btn btn-primary">Login</button></td>
		</tr>
	</table>
</form>
<?php } ?>
<?php include 'rodape.php'; ?>