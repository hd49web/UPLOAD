<!DOCTYPE html>
<html>
<head>
	<title>upload</title>
</head>
<body>

<?php
if (isset($_POST['envair-formulario'])):
	$formatosPermitidos = array("png","jpg","jpeg","gif");
	$extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);

	if (in_array($extensao,$formatosPermitidos)):
		$pasta = "arquivos/";
		$temporario = $_FILES['arquivo']['tmp_name'];
		$novoNome = uniqid(). ".$extensao";

	if (move_uploaded_file($temporario,$pasta.$novoNome)):
		$mensagem = "Upload feito com sucesso!";
	else:
		$mensagem = "Erro, não foi possivel fazer o upload";
	endif;
	else:
	    $mensagem = "Formato invalido";
	endif; 

	echo $mensagem;
endif;
	
?>

<form action = "<?php echo $_SERVER['PHP_SELF'];?>" method= "POST" enctype ="multipart/form-data">
	<input type="file" name="arquivo"><br>
	<input type="submit" name="envair-formulario">
</form>
</body>
</html>