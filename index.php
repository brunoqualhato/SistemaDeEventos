<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Semana Acadêmica</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="assets/css/vendor.css">
    <!-- Theme initialization -->
    <link rel="stylesheet" id="theme-style" href="assets/css/app.css">
    <link rel="stylesheet" id="theme-style" href="assets/css/app-green.css">


</head>

<body>
    <div class="auth">
        <div class="auth-container">
            <div class="card">
                <header class="auth-header">
                    <h1 class="auth-title">
                        <div class="logo">
                            <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span>
                        </div>
                        Semana Acadêmica
                    </h1>
                </header>
                <div class="auth-content">
                    <p class="text-center">ENTRE PARA CONTINUAR</p>

                    <form id="formulario" name="formulario" action="index.php" method="POST">

                        <div class="form-group">
                            <label for="username">Usuario:</label> <input type="email" class="form-control underlined" name="username" id="username" placeholder="email@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Senha: </label> <input type="password" class="form-control underlined" name="password" id="password" placeholder="Senha" required>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="entrar" name="entrar" class="btn btn-block btn-primary" value="login">
                        </div>

                    </form>
                    <?php
                    session_start();

                    require_once 'controller/Administrador.php';

                    if (isset($_POST['entrar'])) {
                        $login = new Administrador();
                        $verifica = $login->logar(array(
                            'login' => $_POST['username'],
                            'senha' => md5($_POST['password'])
                        ));
                        
                          if ($verifica) {
                              $_SESSION['login'] = $_POST['username'];
                              header('Location: views/index.php');
                          } else {
                              session_destroy();
                              header('Location: index.php');
                          }
                     }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Reference block for JS -->

    <div class="ref" id="ref">
        <div class="color-primary"></div>
        <div class="chart">
            <div class="color-primary"></div>
            <div class="color-secondary"></div>
        </div>
    </div>
    <script src="assets/js/vendor.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html> 