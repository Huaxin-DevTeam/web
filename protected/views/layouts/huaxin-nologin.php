<!DOCTYPE html>

<html>
<head>
    <title>Bootstrap 101 Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet" type="text/css"><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]--><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://code.jquery.com/jquery.js" type="text/javascript">
</script><!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript">
</script>
</head>

<body>
    <div class="container">
        <header class="row">
            <div class="logo col-md-3 col-sm-4 col-xs-8">
                <a title="Inicio" href="/"><img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" class="img-responsive"></a>
            </div>

            <div class="col-md-offset-6 col-md-4 col-sm-5 login">
                <div class="row">
                    <div class="col-md-12 pull-right form-group">
                        <?php $this->widget('zii.widgets.CMenu',array(
						    'items'=> array_merge($this->main_menu,array(
						        array('label'=>'Register', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest),
						        array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
						        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
						    )),
							'htmlOptions' => array("class" => "list-unstyled list-inline initialism"),
						)); ?>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="row wrapper">
        	<?php echo $content; ?>
        </div>

        <footer class="row">
            <div class="col-sm-2 col-xs-12">
                <div class="row">
                    <div class="movil">
                        <span class="col-sm-12 col-xs-3 col-xs-offset-3 col-sm-offset-0">EN TU MÓVIL O EN TABLET</span>                    
						<div class="col-lg-5 col-md-6 col-sm-8 col-xs-2"><img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/apple.png" class="pull-right"></div>
						<div class="col-lg-5 col-sm-6 col-xs-2"><img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/android.png" class="pull-left"></div>
					</div>
				</div>
            </div>

            <div class="col-sm-8 col-xs-12">
                <ul class="list-inline footer breadcrumb text-center">
                    <li><a href="#">AYUDA</a></li>

                    <li><a href="#">CONTACTA CON NOSOTROS</a></li>

                    <li><a href="#">SOBRE NOSOTROS</a></li>

                    <li><a href="#">CONDICIONES DE USO</a></li>

                    <li><a href="#">POLITICA DE PRIVACIDAD</a></li>
                </ul>
            </div>

            <div class="col-sm-2 col-sm-offset-0 col-xs-2 col-xs-offset-5">
                <div class="row">
                    <div class="col-sm-3 col-xs-3"><img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/twitter.png" class="pull-left"></div>

                    <div class="col-sm-3 col-xs-3"><img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/facebook.png" class="pull-left"></div>

                    <div class="col-sm-3 col-xs-3"><img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/youtube.png" class=""></div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
