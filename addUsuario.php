<form id="form_Usuario" action="" method="POST">
    <label> Usuário: </label> <br />
	    <input type="text" name="user" placeholder="Ex: user_teste" /> <br /> <br />
	<label> E-mail: </label> <br />
	    <input type="text" name="email"  placeholder="Ex: example@email.com" /> <br /> <br /> 
	<label> Senha: </label> <br />	
	    <input type="password" name="senha" placeholder="**********" /> <br /> <br /> 
	<input type="submit" name="button" value="Registrar" />	
</form>

<?php 
    if(isset($_POST["button"])) { 
        $usuario  = $_POST["user"];
		$email    = $_POST["email"];
        $senha    = $_POST["senha"];
		
		if($usuario == "" || $email == "" || $senha == "") {
		    echo "<script> alert('Preencha todos os campos!'); </script>";
        }
		
		$query = $mysqli->query("SELECT * FROM usuarios WHERE Email='$email' OR Usuario='$usuario'");
		$row =$query->num_rows;
		if($row > 0) {
		   echo "<script> alert('Usuário ou e-mail já existente no Banco de Dados!'); </script>";
		} else {
           $query2 = $mysqli->query("INSERT INTO usuarios(Usuario, Senha, Email, Permissao) VALUES ('$usuario', '$senha', '$email', '0')");
		   if(query2) {
		       echo "<script> alert('Usuário registrado com sucesso!'); location.href='panel.php' </script>";
			} else {
               echo "<script> alert('Erro ao adicionar o usuário!'); </script>";
            }			   
		}
	}		
?>