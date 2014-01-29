<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet">
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->    
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6" >
				<a title="Inicio" href="/">
					<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" class=<?php echo Yii::app()->request->baseUrl; ?>"/img-responsive">
				</a>
			
			</div>
			<div class="col-md-offset-5 col-md-4 col-sm-6 red">
					<div class="row">
						<div class="col-md-12 ">
							<span class="pull-right">REGISTRATE / INICIA SESIÓN</span>
						</div>
					</div>
					<div class="row">
					<form class="form-inline" role="form">
						<div class="form-group form-user col-md-6  pull-right">
							<label class="sr-only" for="idUser">Usuario</label>
							<input type="text" class="form-control" id="idUser" placeholder="Usuario">
						</div>
						<div class="form-group form-pass col-md-6  pull-right">
							<label class="sr-only" for="idPass">Contraseña</label>
							<input type="password" class="form-control" id="idPass" placeholder="Contraseña">
						</div>
					</form>

					</div>
			</div>
		</div>
	<?php echo $content; ?>
			
			<footer class="row">
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-12 movil">
							<span>EN TU MÓVIL O EN TABLET</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/apple.png" class=<?php echo Yii::app()->request->baseUrl; ?>"/img-responsive pull-right">
						</div>
						<div class="col-md-6">
							<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/android.png" class=<?php echo Yii::app()->request->baseUrl; ?>"/img-responsive pull-left">
						</div>
					</div>
				</div>
				<div class="col-md-8">		
					<ul class="list-inline footer breadcrumb">
						<li><a href="#">AYUDA</a></li>
						<li><a href="#">CONTACTA CON NOSOTROS</a></li>
						<li><a href="#">SOBRE NOSOTROS</a></li>
						<li><a href="#">CONDICIONES DE USO</a></li>
						<li><a href="#">POLITICA DE PRIVACIDAD</a></li>
					</ul>
				</div>
				<div class="col-md-2">
					<div class="row">
						<div class="col-md-3">
							<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/twitter.png" class=<?php echo Yii::app()->request->baseUrl; ?>"/img-responsive pull-left">
						</div>
						<div class="col-md-3">
							<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/facebook.png" class=<?php echo Yii::app()->request->baseUrl; ?>"/img-responsive pull-left">
						</div>
						<div class="col-md-6">
							<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/youtube.png" class=<?php echo Yii::app()->request->baseUrl; ?>"/img-responsive">
						</div>
						
					</div>
				</div>	
			</footer>
				
			

			
	
  </body>
</html>