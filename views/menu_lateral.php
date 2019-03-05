<?php
session_start();
require_once '../controller/conexao.php';
Conexao::sessao();
?>
<header class="header">
	<div class="header-block header-block-collapse d-lg-none d-xl-none">
		<button class="collapse-btn" id="sidebar-collapse-btn">
			<i class="fa fa-bars"></i>
		</button>
	</div>

	<div class="header-block header-block-nav">
		<ul class="nav-profile">
			<li class="profile dropdown"><a class="nav-link dropdown-toggle"
				data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
				aria-expanded="false"> <span class="name"> <?php echo $_SESSION['login'];?> </span>
			</a>
				<div class="dropdown-menu profile-dropdown-menu"
					aria-labelledby="dropdownMenu1">
					<a class="dropdown-item" href="#"> <i class="fa fa-user icon"></i>
						Profile
					</a> <a class="dropdown-item" href="#"> <i class="fa fa-bell icon"></i>
						Notifications
					</a> <a class="dropdown-item" href="#"> <i class="fa fa-gear icon"></i>
						Settings
					</a>

					<div class="dropdown-divider"></div>
								<?php

        echo "<a class='dropdown-item' href='../controller/sair.php'> <i
                        									class='fa fa-power-off icon'></i> Logout
                        								</a>";
        ?>
                        								
							</div></li>
		</ul>
	</div>
</header>
<aside class="sidebar">
	<div class="sidebar-container">
		<div class="sidebar-header">
			<div class="brand">
				<div class="logo">
					<span class="l l1"></span> <span class="l l2"></span> <span
						class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span>
				</div>
				Sistema de Eventos
			</div>
		</div>
		<nav class="menu">
			<ul class="sidebar-menu metismenu" id="sidebar-menu">
				<li class="active"><a href="index.php"> <i class="fa fa-home"></i>
						Dashboard
				</a></li>
				<li><a href=""> <i class="fa fa-th-large"></i> Gerenciar <i
						class="fa arrow"></i>
				</a>
					<ul class="sidebar-nav">
						<li><a href="adicionar_itens.php"> Adicionar Itens </a></li>
						<li><a href="index.php"> Editar Itens</a></li>
					</ul></li>
				<li><a href=""> <i class="fa fa-th-large"></i> Resultados <i
						class="fa arrow"></i>
				</a>
					<ul class="sidebar-nav">
						<li><a href="adicionar_itens.php"> Pagina de impressão </a></li>

					</ul></li>

			</ul>
		</nav>
	</div>
</aside>