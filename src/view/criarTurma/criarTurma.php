<!DOCTYPE html>
<?php
	if($_GET['erro'] == 2){
		echo "<script> window.alert('Erro ao tentar criar classe!')</script>";
	}
?>
<html>
<head>
	<title>Criar Turma</title>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body class="bg-light">
	<?php

	include_once '../cabecalho/cabecalho.php';

	?>

	<div class="container">
		<div class="col-md-8 order-md-1">
			<h4 class="mb-3">Dados da turma</h4>
			<form class="needs-validation" method="POST" action="../../controller/XClass/CreateNewClass.php">
				<div class="row">
              		<div class="col-md-6 mb-3">
                		<label for="nomeTurma">Nome da Turma</label>
                			<input type="text" name="nomeTurma" class="form-control" id="nomeTurma" required>
              		</div>
	                <div class="col-md-6 mb-3">
	                	<label for="instituicao">Instituição</label>
	                	<input type="text" class="form-control" id="instituicao" name="instituicao" required>
	              	</div>
	              	<div class="col-md-6 mb-3">
	                	<label for="semestre">Semestre</label>
	                	<input type="number" min="1" max="2" class="form-control" id="semestre" name="semestre" required >
	              	</div>
	              	<div class="col-md-6 mb-3">
	                	<label for="ano">Ano</label>
	                	<input type="number" min="2010" max="2019" class="form-control" id="ano" name="ano" required>
	              	</div>
	              	<hr class="mb-4">
            			<input class="btn btn-primary btn-lg btn-block" type="submit" value="Criar Turma">
            	</div>
			</form>
		</div>
	</div>
</body>
</html>
