<?php  
require_once 'classes/usuarios.php';
$u = new Usuario;
?>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet"  href="css/estilo.css">
</head>
<body>
<div id="corpo-form-cad">
	<h1>Cadastre-se</h1>
	<form method="POST">
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="45">
		<input type="email" name="email" placeholder="Usuario" maxlength="40">
		<input type="password" name="senha" placeholder="Senha" maxlength="20">
		<input type="password" name="confSenha" placeholder="Confirmar senha">
		<input type="submit" value="CADASTRAR" class="entrar">
	</form>
</div>

<?php
//verificar se clicou no botao
if(isset($_POST['nome']))
{
	$nome = addslashes($_POST['nome']); //addslashes evita codigos maliciosos.
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);
	$confirmarSenha = addslashes($_POST['confSenha']);
	//verificando se todos os campos nao estao vazios
	if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confirmarSenha)) 
	{
		$u->conectar("mauricioluminarias","localhost","root","");  //Conectando ao banco de dados 
		if ($u->msgErro == "") //conectado normalmente;
		{
			if ($senha == $confirmarSenha) 
			{
				if ($u->cadastrar($nome, $email, sha1($senha))) 
				{
                    echo "Cadastro realizado com sucesso";
				}
				else
			 	{
                    echo "Email já cadastrado";
			 	}
			}
			else
			{
				    echo "Senhas diferentes";
			}
		}
		else 
		{
		echo "Erro: ".$u->msgErro;
		}
	}
	else
		{
			echo "Preencha todos os campos!";
		}
}
?>
</body>
</html>
