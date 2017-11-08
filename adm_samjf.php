<?php

//include de sessão.
include ("validacao.php");
?>
<!-- imprime o login -->
<h1> <?php echo $_SESSION['UsuarioID']; ?></h1>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "www.w3.org/TR/html4/loose.dtd">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keyword" content="observatório, estratégia, justiça, federal, dados, informação, inovação, gestão, conhecimento">

        <title>SAMJF - Sistema de Acompanhamento de Metas da Justiça Federal</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="css/font-awesome.css" rel="stylesheet" />
<!--        <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>-->
<!--        <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">-->

        <!--right slidebar-->
<!--        <link href="css/slidebars.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->

        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />

        <!-- SCROLL -->
<!---->
<!--        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>	-->
<!--        <script type = "text/javascript">-->
<!--            $(document).ready(function () {-->
<!--                $("html").niceScroll({cursorwidth: '10px', autohidemode: true, zindex: 999});-->
<!--                $("iframe").niceScroll({cursorwidth: '10px', autohidemode: true, zindex: 999});-->
<!--                $(".scrollable").niceScroll({cursorwidth: '10px', autohidemode: true, zindex: 999});-->
<!--                //$(".codecolorer-container").niceScroll({cursorwidth: '10px', autohidemode: false, zindex: 999 });-->
<!--            });-->
<!--        </script>-->



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->

        <!--[if IE]>
        <style>*{display:none;}</style>
        <meta HTTP-EQUIV="REFRESH" content="0; url=erro.html">
        <![endif]-->

    </head>

    <body>

    <section id="container" >



        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <!-- page start-->

                <div class="row">
                    <div class="col-lg-10">
                        <section class="panel">
                            <div class="panel-body">

                                <h3><b>Sistema de Acompanhamento de Metas da Justiça Federal</b></h3>

                            </div>
                        </section>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-10">
                        <section class="panel">
                            <div class="panel-body">

                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="m7-ano.php"><b>Meta 7</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="m8-ano.php"><b>Meta 8</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="m9-periodicidade.php"><b>Meta 9</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="m10-periodicidade.php"><b>Meta 10</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m11_unic_2016.php"><b>Meta 11</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m12_mag_tri_2016.php"><b>Meta 12</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m12_serv_tri_2016.php"><b>Meta 13</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m13_mag_tri_2016.php"><b>Meta 14</b></a></font><br><br>
                                <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m13_serv_tri_2016.php"><b>Meta 15</b></a></font><br><br>
                                <br><i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="logout.php"><b>Sair</b></a></font><br><br>

                            </div>
                        </section>
                    </div>
                </div>
                <font size="3" color="red" class="right">Em caso de dúvidas ou problemas, entrar em contato pelo e-mail <b>"observatorio@cjf.jus.br"</b>.</font>
                <!-- page end-->
            </section>
        </section>

        <a href="logout.php">Logout</a></p>

</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/respond.min.js" ></script>



</body>
</html>
