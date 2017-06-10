<?php
    $ipPlayer = $_SERVER["REMOTE_ADDR"];
	include("connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
         <title> Consylfix </title>
		 <link rel="stylesheet" href="styles/style-register.css" type="text/css"/>
	</head>
	<body>
	    <div id="container">
		     <img id="imageLogo" src="images/logo.png" alt="Imagem Logo" />
			 <div id="login">
			     <form action="" method="POST">
				    <img src="images/cadeado.png" alt="Imagem Cadeado"/>
				     <div id="input">
				        <span> Usuário </span>
						     <input name="input_User" type="text" /> <br /> 
						<span> E-mail </span>
						     <input name="input_Email" type="text" /> <br /> 	 
						<span> Senha </span>
						     <input name="input_Pass" type="password" />
						<input type="submit" name="button" value="Registrar" />	 
					</div>	
				<form/>	
                <span class="span_IP"> Por segurança seu endereço de IP	( <b> <?php echo $ipPlayer; ?> </b> ) foi registrado!</span>			
			</div>
		</div>
	</body>
</html>		  
<?php	
	if(isset($_POST["button"])) {
		$user  = mysqli_real_escape_string($mysqli, $_POST["input_User"]);
		$email = mysqli_real_escape_string($mysqli, $_POST["input_Email"]);
		$pass  = mysqli_real_escape_string($mysqli, $_POST["input_Pass"]);
		
		if($user == "" OR $pass == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='pag-register.php'</script>";
		}
		$query = $mysqli->query("SELECT * FROM usuarios WHERE Email='$email' OR Usuario='$user'");
		$row =$query->num_rows;
		if($row > 0) {
		   echo "<script> alert('Usuário ou e-mail já existente no Banco de Dados!'); </script>";
		} else {
           $query2 = $mysqli->query("INSERT INTO usuarios(Usuario, Senha, Email, Permissao) VALUES ('$user', '$pass', '$email', '0')");
		   if(query2) {
		       echo "<script> alert('Usuário registrado com sucesso!'); location.href='pag-login.php' </script>";
			} else {
               echo "<script> alert('Erro ao adicionar o usuário!'); </script>";
            }			   
		}
	}
?>