<?php
//include de sessão.
include	("validacao.php");
?>
<!-- imprime o login -->
<h1><?php echo $_SESSION['UsuarioID'];  ?></h1>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keyword" content="karlitus.gomes">

    <title>Acompanhamento da Meta 8</title>

      <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-reset.css" rel="stylesheet">
      <!--external css-->
      <link href="css/font-awesome.css" rel="stylesheet" >

      <link href="css/style.css" rel="stylesheet">
      <link href="css/style-responsive.css" rel="stylesheet" >
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
			         
			  <h3><b>Acompanhamento da Meta 9</b></h3>
			  
							</div>
                      </section>
                  </div>
				</div>
			  
			  
			  <div class="row">
                    <div class="col-lg-10">
                      <section class="panel">
                        <div class="panel-body">



                            <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m9_tri_2016.php"><b>Trimestral</b></a></font><br><br>
                            <i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="tabelas/samjf_m9_unic_2016.php"><b>Única</b></a></font><br><br>
                            <br><i class="fa fa-check-square-o fa-2x"></i> <font size="3"><a href="adm_samjf.php"><b>Voltar</b></a></font><br><br>
			  
						</div>
                      </section>
                  </div>
              </div>
			<!-- page end-->
          </section>
      </section>

      
	  
  </section>

  <!-- js placed at the end of the document so the pages load faster -->
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/respond.min.js" ></script>

  </body>
</html>
