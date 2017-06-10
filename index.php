<?php
     include("connection.php");
	 session_start();
	 include("sairPagina.php");
	 sairPagina();
?>

<!DOCTYPE html>
<html>
    <head>
	      <title> Consulfix > - Index </title>
		  <link rel="stylesheet" href="styles/style-index.css" type="text/css" media="all" />
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
			      <div id="div_Postagem">
			        <?php
                        $verificar = $mysqli->query("SELECT * FROM postagens ORDER BY ID");
				     	$Row = $verificar->num_rows;
											  
				    	if($Row <=0) {
					        echo "Nenhuma mensagem foi postada!";
					    } else {
                            while($array = $verificar->fetch_array()) {
					           $titulo = $array['Titulo'];
						       $texto = $array['Texto'];
						       $autor = $array['Autor'];
						       $data = $array['Data'];
			    	?>
			    	<h1> <b> Titulo </b> <?php echo $titulo; ?> <br />
					<b> Data </b> <?php echo $data; ?> </h1>
			    	<span> <b> Autor </b> <?php echo $autor; ?> </span>
				    <p> <?php echo $texto; ?> </p>
				    <?php
                           }				
					   }                      					  
                    ?>	
                </div>
            </div> 				
			<div id="div_Rodape"> 
			     <span> Consulfix 2017 - Todos os direitos reservados. </span>
		</div>
    </body>
</html>	 