<?php
     session_start();
	 include("sairPagina.php");
	 sairPagina();
	 
?>
<DOCTYPE html>
<html>
    <head>
	    <title> Consulfix - Contato </title>
		<link rel="stylesheet" href="styles/style-contato.css" type="text/css" media="all" />
	</head>
	<body>
	    <div id="div_Container">
		    <div id="div_Topo">
                 <img id="imageTOPO" src="images/logo.png" alt="Imagem Logo" />
            </div>

            <div id="div_Menu"> 
                 <ul> 
				     <?php
					    if(isset($_SESSION["Usuario"])) { ?>
				     <li> <a href="index.php"> Início </a> </li>
					 <li> <a href="contato.php"> Contato </a> </li>
					 <li> <a href="panel.php"> Painel </a> </li>
					 <li> <a href="index.php?func=sairPagina"> Sair ( <?php echo $_SESSION["Usuario"]; ?> ) </a> </li>
					 <?php   } else {  ?>
					 <li> <a href="index.php"> Início </a> </li>
					 <li> <a href="contato.php"> Contato </a> </li>
					 <li> <a href="pag-register.php"> Registro </a> </li>
					 <li> <a href="pag-login.php"> Login </a> </li>
					 <?php  }  ?>
                 </ul>
            </div> 				   

             <div id="div_Conteudo">		
                  <div id="div_Contato">
				       <form action="" method="POST">
					       <h4> E-mail: contato@consulfix.com.br </h4>
						   <h4> Fone: (69) 3222-0000 </h4> 
						   <input name="iNome" id="iNome" type="text" placeholder="Seu Nome" /> <br />
						   <input name="iAssunto" id="iAssunto" type="text" placeholder="Assunto" /> <br />
						   <input name="iEmail" id="iEmail" type="text" placeholder="exemple@email.com" /> <br />
						   <textarea name="iTexto" id="iTexto" placeholder="Digite o texto aqui" /> </textarea> <br />
						   <input name="iButton" id="iButton" type="submit" value="Enviar" />
					   </form>
					</div>   
            </div>

            <div id="div_Rodape">
                 <span> Consulfix 2017 - Todos os direitos reservados. </span>
			</div> 
        </div>				
	</body>
</html> 
<?php
	if(isset($_POST["iButton"])) {
		$iNome    = $_POST["iNome"];
		$iAssunto = $_POST["iAssunto"];
		$iEmail   = $_POST["iEmail"];
		$iTexto   = $_POST["iTexto"];
		
		if($iNome == "" || $iAssunto == "" || $iEmail == "" || $iTexto == "") {
			echo "<script> alert('Preencha todos os campos'); location.href='contato.php'</script>";
		}
		
		$CorpoEMAIL = "
			E-mail: $iEmail
			Nome = $iNome
			
			
			$iTexto
		";
		$Enviar = mail("consulfix@gmail.com", $iAssunto, $CorpoEMAIL);
		echo "<script> alert('E-mail enviado com sucesso!');  location.href='contato.php'</script>";
	}
?>