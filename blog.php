<?php
	include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  <link rel="shortcut icon" href="../../assets/ico/favicon.png">-->
    <title>Nekr.com</title>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
      <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
	
    <link href="dist/css/blog.css" rel="stylesheet">

  </head>

  <body >
 
 
	<header class="navbar blue_background_and_height_90 navbar-fixed-top col-xs-10 col-sm-10 col-md-10 col-md-offset-1">
        <ul class="nav navbar-nav">
            <li  >
                <a href="#" class="green_links" >Главная</a>
            </li>
            <li >
                <a href="#" class="green_links">Новости</a>
            </li>
            <li class="active" >
                <a href="#" class="green_links_active">Блог</a>
            </li>
            <li >
                <a href="#"class="green_links">О нас</a>
            </li>
			<li>
                <a href="#" class="logo"><img src="img/logo.png"></img></a>
            </li>
        </ul>
	</header>	
 
  <div class="row">
		<div class="col-md-10 col-md-offset-1 right_border content_frame">
			<div class="panel-group" id="accordion">
			<?php
				include("writing.php");
			?>
			</div>
		</div>
  </div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1 margin_left">
		<?php
			include("form_content.php");
		?>
		</div>
	</div>

	
  
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?php
		mysql_close();
	?>
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>