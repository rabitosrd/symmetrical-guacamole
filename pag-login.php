<?php
    $ipPlayer = $_SERVER["REMOTE_ADDR"];
	include("connection.php");
?>
<!DOCTYPE html>
<html>
    <head>
         <title> Consylfix </title>
		 <link rel="stylesheet" href="styles/style.css" type="text/css"/>
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
						<span> Senha </span>
						     <input name="input_Pass" type="password" />
						<input type="submit" name="button" value="Login" />	 
					</div>	
				<form/>	
                <span class="span_IP"> Por segurança seu endereço de IP	( <b> <?php echo $ipPlayer; ?> </b> ) foi registrado!</span>			
			</div>
		</div>
	</body>
</html>		  
<?php	
	if(isset($_POST["button"])) {
		$user = mysqli_real_escape_string($mysqli, $_POST["input_User"]);
		$pass = mysqli_real_escape_string($mysqli, $_POST["input_Pass"]);
		
		if($user == "" OR $pass == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='pag-login.php'</script>";
		}
		$check = $mysqli->query("SELECT * FROM usuarios WHERE Usuario='$user' AND Senha='$pass'");
		$row   = $check->num_rows;
		if($row > 0) {
			$check2 = $mysqli->query("SELECT Permissao FROM usuarios WHERE Usuario='$user'");
			$row2 = $check2->num_rows;
			if($row2) {
				$dadosUsuario = $check2->fetch_array();
				if($dadosUsuario["Permissao"] == 1) {
					echo "<script> alert('Bem vindo ao Painel de Controle!'); location.href='panel.php'</script>";
					session_start();
					$_SESSION["Usuario"] = $user;
				} else {
					echo "<script> alert('Você não tem permissão!'); location.href='pag-login.php'</script>";
				}
			}
		} else {
			echo "<script> alert('Usuário ou Senha incorretos!'); location.href='pag-login.php'</script>";
		}
	}
?>