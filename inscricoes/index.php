<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Semana academica</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<!-- Place favicon.ico in the root directory -->
<link rel="stylesheet" href="../assets/css/vendor.css">
<!-- Theme initialization -->
<link rel="stylesheet" id="theme-style" href="../assets/css/app.css">
<link rel="stylesheet" id="theme-style"
	href="../assets/css/app-green.css">

</head>
<body>
	<div class="main-wrapper">
		<div class="app" id="app">

			<article class="content dashboard-page">
				<section class="row sameheight-container">
					<div class="col-md-12">
						<div class="card card-block sameheight-item">
							<div class="title-block">
								<h3 class="title">Cadastro</h3>
							</div>
							<form role="form" id="form_mini_curso" name="form_mini_curso"
								action="index.php" method="POST">
								<div class="form-group has-success">
									<label class="control-label">Nome Completo</label> <input
										type="text" class="form-control" id="txt_nome"
										name="txt_nome" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">CPF:</label> <input type="text"
										class="form-control" id="txt_cpf" name="txt_cpf"
										required="true" >
								</div>
								<div class="form-group has-success">
									<label class="control-label">Matricula:</label> <input
										type="text" class="form-control" id="txt_matricula"
										name="txt_matricula" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">E-mail:</label> <input
										type="email" class="form-control" id="txt_email"
										name="txt_email" required="true">
								</div>
								
								<div class="form-group has-success">
									<label class="control-label">Período:</label> <input
										type="text" class="form-control" id="txt_periodo"
										name="txt_periodo" maxlength="2" required="true">
								</div>
								
								<?php require_once '../controller/Turmas.php';
								require_once '../controller/MiniCurso.php';
								require_once '../controller/Palestras.php';
								require_once '../controller/Instituicao.php';
								
								$oPalestras = new Palestras();
								$oMiniCurso = new MiniCursos();
								$oTurma = new Turmas();    
								$oInstituicao = new Instituicao();
								?>
								<div class="form-group has-success">
									<label class="control-label">Curso:</label>
									 <select class="form-control" id="sel-curso">
										<?php foreach ($oTurma->listar() as $listaTurmas){?>
										<option value="<?php echo $listaTurmas['idcurso']?>"><?php echo $listaTurmas['nome_curso']?></option>
										<?php }?>
									</select>
								</div>

								<div class="form-group has-success">
									<label class="control-label">Instituição:</label> 
									<select class="form-control" id="sel-curso">
										<?php foreach ($oInstituicao->listar() as $listaInstituicoes){?>
										<option value="<?php echo $listaInstituicoes['idinstituição']?>" ><?php echo $listaInstituicoes['nome_instituicao']?></option>
										<?php }?>
									</select>
								</div>

								<div class="card-block">
									<div class="card-title-block">
										<h3 class="title">Palestras e mini-cursos</h3>
									</div>
									<section class="example">
										<div class="table-responsive">
											<table id="tabela_lista_curso" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>Tema</th>
														<th>Dia</th>
														<th>Horario</th>
														<th>Palestrante</th>
														<th>Selecione</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach ($oPalestras->listar() as $listaPalestras){?>
													<?php foreach ($oMiniCurso->listar() as $listaMiniCurso){?>
													<tr>
														<td><?php echo $listaMiniCurso['nome_mini_curso']?></td>
														<td><?php echo $listaMiniCurso['data']?></td>
														<td><?php echo $listaMiniCurso['horario']?></td>
														<td><?php echo $listaMiniCurso['palestrante']?></td>
														<td><input value="<?php echo $listaMiniCurso['idcursos']?>" type="checkbox"></td>

													</tr>
													<tr>
														<td><?php echo $listaPalestras['nome_palestras']?></td>
														<td><?php echo $listaPalestras['data']?></td>
														<td><?php echo $listaPalestras['horario']?></td>
														<td><?php echo $listaPalestras['palestrante']?></td>
														<td><input value="<?php echo $listaPalestras['idpalestras']?>" type="checkbox"></td>

													</tr>
													<?php }}?>
												</tbody>
											</table>
										</div>
									</section>
								</div>

								<input type="hidden" id="valor_selecionado" name="valor_selecionado">
							</form>
							<div class="form-group">
									<button  id="cadastro_categoria"
										name="cadastro_categoria" onclick="passaValor()" class="btn btn-oval btn-primary">Salvar</button>
								</div>
						</div>
					</div>
				</section>

			</article>
			<footer class="footer">
				<div class="footer-block buttons">
					<iframe class="footer-github-btn"
						src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true"
						frameborder="0" scrolling="0" width="140px" height="20px"></iframe>
				</div>
				<div class="footer-block author">
					<ul>
						<li>created by <a href="https://github.com/modularcode">ModularCode</a>
						</li>
						<li><a
							href="https://github.com/modularcode/modular-admin-html#get-in-touch">get
								in touch</a></li>
					</ul>
				</div>
			</footer>
		</div>
		<!-- Reference block for JS -->
		<div class="ref" id="ref">
			<div class="color-primary"></div>
			<div class="chart">
				<div class="color-primary"></div>
				<div class="color-secondary"></div>
			</div>
		</div>
		
		<script src="../assets/js/vendor.js"></script>
		<script src="../assets/js/app.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../assets/jquery.mask.js"></script>
		<script src="../assets/jquery.mask.min.js"></script>
		
		
</body>
<script type="text/javascript">
function getvalue_func() {
	  return $('#tabela_lista_curso input:checked').map(function() {
	    return this.value;
	  }).get().join(', ');
	}

function passaValor() {
	document.getElementById('valor_selecionado').value = getvalue_func();
	
}

</script>
<script type="text/javascript">
$(document).ready(function(){
	$('#txt_cpf').mask('000.000.000-00', {reverse: true});
	$('#txt_periodo').mask('00', {reverse: true});
	})
	</script>
</html>