<form id="form_Postagem" action="" method="POST">
	<label> Titulo: </label> <br />
		<input type="text" name="titulo" placeholder="Digite o título" /> <br /> <br />
	<label> Texto: </label> <br />
        <textarea name="texto"> </textarea> <br /> <br />
	<input type="submit" name="button" value="Postar" />   	   
</form>

<?php
    if(isset($_POST["button"])) {
        $titulo  = $_POST["titulo"];
		$texto   = $_POST["texto"];
		
		if($titulo == "" || $texto == "") {
		    echo "<script> alert('Preencha todos os campos!'); </script>";
		}
         $autor = $_SESSION["Usuario"];
		 $data = date('d/m/Y');
		 $data .= ' - '.date('H:i:s');
		 $insert = $mysqli->query("INSERT INTO `postagens`(`Titulo`, `Texto`, `Autor`, `Data` ) VALUES ('$titulo', '$texto', '$autor', '$data')");
		 if($insert) {
		    echo "<script> alert('Postagem adicionada com sucesso!'); location.href='index.php'</script>";
		} else { 
			"<script> alert('Erro ao adicionar Postagem!'); </script>";  
		}	
	}
?>