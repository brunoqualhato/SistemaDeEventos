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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<div class="main-wrapper">
		<div class="app" id="app">

				<?php include 'menu_lateral.php'; ?>
				
                <div class="sidebar-overlay" id="sidebar-overlay"></div>
			<div class="sidebar-mobile-menu-handle"
				id="sidebar-mobile-menu-handle"></div>
			<div class="mobile-menu-handle"></div>
			<article class="content dashboard-page">
				<section class="row">
					<div class="col-md-3">
						<div class="card card-block sameheight-item">
							<div class="title-block">
								<h3 class="title">Cadastrar Turmas</h3>
							</div>
							<form role="form" id="form_categoria" name="form_categoria" action="adicionar_itens.php" method="POST">
								<div class="form-group has-success">
									<label class="control-label">Nome da Turma:</label> 
									<input type="text" class="form-control" id="txt_turma" name="txt_turma" required="true">
								</div>

								<?php
								require_once '../controller/Turmas.php';
								require_once '../controller/Palestras.php';
								require_once '../controller/MiniCurso.php';
								require_once '../controller/Instituicao.php';
								
								$oTurma = new Turmas();
 							$verif = false;
 							if(isset($_POST['cadastro_turma'])){
 								
 							    $verif =$oTurma->add(array('curso'=>$_POST['txt_turma']));
 								
 							}
							?>
								<div class="form-group">
									<button type="submit" id="cadastro_turma" name="cadastro_turma" class="btn btn-oval btn-primary">Salvar</button>
								</div>
								<?php 
								if ($verif) {
								    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                       Salvo com Sucesso !!
                                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                      </button>
                                          </div>";
								}
								?>
							</form>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card card-block sameheight-item">
							<div class="title-block">
								<h3 class="title">Cadastrar Palestras</h3>
							</div>
							<form role="form" id="form_palestras" name="form_palestras" action="adicionar_itens.php" method="POST">
								<div class="form-group has-success">
									<label class="control-label">Tema da Palestra</label> 
									<input type="text" class="form-control" id="txt_tema" name="txt_tema" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Nome do palestrante:</label> 
									<input type="text" class="form-control" id="txt_palestrante" name="txt_palestrante" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Data:</label> 
									<input type="date" class="form-control" id="txt_data" name="txt_data" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Horario:</label> 
									<input type="time" class="form-control" id="txt_horario" name="txt_horario" required="true">
								</div>
								<div class="form-group">
									<button type="submit" id="btn_cad_palestra" name="btn_cad_palestra" class="btn btn-oval btn-primary">Salvar</button>
								</div>
							</form>
							<?php 
							$oPalestra = new Palestras();
							$verificaPlestra = false;
							
							if (isset($_POST['btn_cad_palestra'])) {
							    
							    $verificaPlestra=$oPalestra->add(array(
							        'nome' => $_POST['txt_tema'],
							        'horario' => $_POST['txt_horario'],
							        'data' => $_POST['txt_data'],
							        'palestrante' => $_POST['txt_palestrante']
							    ));
							    
							    if ($verificaPlestra) {
							        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                       Salvo com Sucesso !!
                                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                      </button>
                                          </div>";
							    }
							}
							?>
							
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="card card-block sameheight-item">
							<div class="title-block">
								<h3 class="title">Cadastrar Mini-Curso</h3>
							</div>
							<form role="form" id="form_mini_curso" name="form_mini_curso" action="adicionar_itens.php" method="POST">
								<div class="form-group has-success">
									<label class="control-label">Tema do Mini-Curso</label> 
									<input type="text" class="form-control" id="txt_nome_min" name="txt_nome_min" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Nome do palestrante:</label> 
									<input type="text" class="form-control" id="txt_nome_palestrante_min" name="txt_nome_palestrante_min" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Data:</label> 
									<input type="date" class="form-control" id="txt_data_min" name="txt_data_min" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Horario:</label> 
									<input type="time" class="form-control" id="txt_horario_min" name="txt_horario_min" required="true">
								</div>
								<div class="form-group">
									<button type="submit" id="btn_cadastro_min" name="btn_cadastro_min" class="btn btn-oval btn-primary">Salvar</button>
								</div>
							</form>
							<?php
							$oMiniCurso = new MiniCursos();
							$verificadorMin = false;
							if (isset($_POST['btn_cadastro_min'])) {
							    $verificadorMin =   $oMiniCurso->add(array(
							        'nome' => $_POST['txt_nome_min'],
							        'data' => $_POST['txt_data_min'],
							        'horario' => $_POST['txt_horario_min'],
							        'palestrante' => $_POST['txt_nome_palestrante_min']
							    ));
							    
							    if ($verificadorMin) {
							        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                       Salvo com Sucesso !!
                                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                      </button>
                                          </div>";
							    }
							} 
							?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card card-block sameheight-item">
							<div class="title-block">
								<h3 class="title">Cadastrar Instituição</h3>
							</div>
							<form role="form" id="form_categoria" name="form_categoria" action="adicionar_itens.php" method="POST">
								<div class="form-group has-success">
									<label class="control-label">Nome da Instituição:</label> 
									<input type="text" class="form-control" id="txt_nome_inst" name="txt_nome_inst" required="true">
								</div>
								<div class="form-group has-success">
									<label class="control-label">Cidade:</label> 
									<input type="text" class="form-control" id="txt_cidade_inst" name="txt_cidade_inst" required="true">
								</div>

							
								<div class="form-group">
									<button type="submit" id="btn_cad_inst" name="btn_cad_inst" class="btn btn-oval btn-primary">Salvar</button>
								</div>
							</form>
								<?php
							$oInstituicao = new Instituicao();
							$verificaInst = false;
							
							if (isset($_POST['btn_cad_inst'])) {
							    $verificaInst =   $oInstituicao->add(array(
							        'nome' => $_POST['txt_nome_inst'],
							        'cidade' => $_POST['txt_cidade_inst']
							    ));
							}
							
							if ($verificaInst) {
							    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                       Salvo com Sucesso !!
                                                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                      </button>
                                          </div>";
							}
							?>
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
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="../assets/js/vendor.js"></script>
		<script src="../assets/js/app.js"></script>

</body>
</html>