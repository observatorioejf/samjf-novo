<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="samoe.png" type="image/png">

    <title>SAMJF - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="css/font-awesome.css" rel="stylesheet"/>
    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet"/>

    <link href="css/indexObservatorio.css" rel="stylesheet"/>
    <link href="css/fixed_navbar.css" rel="stylesheet"/>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

    <!--[if IE]>
    <style>* {
        display: none;
    }</style>
    <meta HTTP-EQUIV="REFRESH" content="0; url=erro.php">
    <![endif]-->

</head>

<body class="full-width">

<div class="div-black"></div>

<section class="custom-section">

    <!-- Header -->
    <?php include '../../include/fixed_header.php' ?>

    <!-- End header -->

<!--###################################################################    ******-->

    <section id="container">

        <!--main content start-->
        <div class="container">
            <br><br><br><br><br>

      <form id="form-login" class="form-signin" action="controle.php" method="post" style="margin-top: 200px;">
        <h2 class="form-signin-heading">SAMJF</h2>
        <div class="login-wrap">
            <input type="text" name="login" value="" class="form-control" placeholder="Usuario" autofocus>
            <input type="password" name="senha" value="" class="form-control" placeholder="Senha">
            <label class="checkbox">
                
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit" name="enviar" value="login">Entrar</button>


        </div>

          <footer>Versão 1.1</footer>

      </form>

        </div>


        <!--footer start-->
        <footer class="site-footer" style="margin-top: 20%">
            <div class="text-center">
                <font color="ffffff">2015 &copy; Conselho de Justiça Federal - Secretaria de Estratégia e Governança -
                    observatorio@cjf.jus.br</font>
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script src="js/respond.min.js"></script>

    <script>
        //Add class active on li
        $("#sistemas").addClass('active');
    </script>
    <script>
        $('#form-login').submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: 'controle.php',
                type: 'POST',
                data: $('#form-login').serialize()+'&enviar=login',
                success: function (response) {
                    console.log(response);
                    if(response === '2')
                        window.location = 'adm_samjf.php';
                    else
                        alert('Login ou senha inválido.');
                }, error: function () {
                    console.log(response);
                    alert('Houve um erro interno.');
                }
            });
        })
    </script>
</section>
</body>
</html>
