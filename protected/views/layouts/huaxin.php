<!DOCTYPE html>

<html>
<head>
    <title><?php echo $this->pageTitle ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Bootstrap -->
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/docs.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/start/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.tzCheckbox.css" rel="stylesheet" type="text/css">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]--><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://code.jquery.com/jquery.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tzCheckbox.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.confirm.min.js" type="text/javascript"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/scripts.js" type="text/javascript"></script>
</head>

<body>
    <div class="container">
        <header class="row">
            <div class="logo col-md-3 col-sm-4 col-xs-12">
                <a title="Inicio" href="/">
                	<img alt="Inicio" src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png" class="img-responsive">
                </a>
            </div>

            <div class="col-md-6 col-sm-8 login">
            <?php if(Yii::app()->user->getId() !== null): ?>
			<div class="row creditos-wrapper">
                    <div class="col-xs-offset-3 col-xs-4 creditos blue-text"><?php print $this->credits; ?> CREDITOS</div>
					<div class="buycredits col-xs-5"> <?php echo CHtml::link('COMPRAR CREDITOS',array('order/select')); ?> </div>
			</div>
            <?php endif; ?>
			
                <div class="row">
                    <div class="col-md-12 pull-right form-group">
                        <?php $this->widget('zii.widgets.CMenu',array(
						    'items'=> array_merge($this->main_menu,array(
						        array('label'=>'Register', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array('class'=>'registrate')),
						        array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array('class'=>'loginp')), 
						        array('label'=>'ADMINISTRAR ANUNCIOS', 'url'=>array('/myads'), 'visible'=>!Yii::app()->user->isGuest, 'itemOptions' => array('class'=>'misanuncios pull-right')),
						        array('label'=>'DESCONECTAR ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest, 'itemOptions' => array('class'=>'logout pull-right')),
						    )),
							'htmlOptions' => array("class" => "list-unstyled list-inline initialism pull-right"),
						)); ?>
                    </div>
                </div>
                   <?php if(Yii::app()->user->getId() === null): ?>
                <div class="row">
                    <div class="form">
                        <?php echo CHtml::beginForm(); ?><?php echo CHtml::errorSummary($this->loginModel,''); ?>

                        <div class="form-group form-user col-sm-5 pull-left">
                            <?php echo CHtml::activeLabel($this->loginModel,'username', array("class" => "sr-only")); ?><?php echo CHtml::activeTextField($this->loginModel,'username',array("class" => "form-control", "id" => "idUser", "placeholder" => "Username")) ?>
                        </div>

                        <div class="form-group form-pass col-sm-5 pull-left">
                            <?php echo CHtml::activeLabel($this->loginModel,'password', array("class" => "sr-only")); ?><?php echo CHtml::activePasswordField($this->loginModel,'password',array("class" => "form-control", "id" => "idPass", "placeholder" => "Password")) ?>
                        </div>

                        <div class="form-group submit col-sm-2 pull-left">
                            <?php echo CHtml::submitButton('',array("class"=>"btn-login","title"=>"login")); ?>
                        </div>
                        
                        <?php echo CHtml::endForm(); ?>
                    </div><!-- form -->
                </div>
                <?php endif; ?>
				
            </div>
        </header>
        
        <div class="row wrapper">
        
        	
        	
        	<div class="row busqueda col-xs-12">
			    <div class="col-md-2 col-xs-2">
			        <p>QUE BUSCAS?</p>
			    </div>
			
			    <div class="col-md-2 col-xs-3">
			        DONDE BUSCAS?
			    </div>
			
			    <div class="col-md-4 col-xs-4">
			        <form class="form" role="form">
			            <div>
			                <label class="sr-only" for="idSearch">Usuario</label> <input type="text" class="form-control" id="idSearch" placeholder="Madrid, Barcelona...">
			            </div>
			        </form>
			    </div>
			
			    <div class="col-md-2 col-xs-3">
			        <?php print Helper::getCount() ." ". Yii::t("huaxin", "anuncios"); ?>
			    </div>
			
			    <div class="col-md-2 col-md-offset-0 col-xs-6 col-xs-offset-1 blue publica text-center">
			        <a href="/new">Pon tu anuncio</a>
			    </div>
			</div>
			
			<div class="row contenido  col-xs-12">
			    <div class="col-md-2 col-sm-12">
			        <nav class="navbar navbar-default" role="navigation">
			            <!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
						    <span class="sr-only">Toggle navigation</span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						    <span class="icon-bar"></span>
						  </button>
						</div>
			            <!-- Collect the nav links, forms, and other content for toggling -->
			            <div class="navbar-collapse collapse" id="menu">
			                <ul class="menu nav nav-list">
			                    <?php foreach($this->categories as $c): ?>
			                    <li><?php print CHtml::link($c->name,$this->createUrl("category/".$c->id)); ?></li><?php endforeach; ?>
			                </ul>
			            </div><!-- /.navbar-collapse -->
			        </nav>
			    </div>
			
			    <div class="col-md-8">
				
				<?php
					$flashMessages = Yii::app()->user->getFlashes();
					if ($flashMessages) {
						echo '<div class="row flashes">';
						foreach($flashMessages as $key => $message) {
							echo '<div class="col-xs-12 bs-callout bs-callout-' . $key . '">' . $message . "</div>\n";
						}
						echo '</div>';
					}
				?>
				
					<?php echo $content; ?>
			    </div>
			    <div class="col-md-2 col-xs-12 text-center ads">
			    <?php foreach($this->ads as $ad){
						print $ad;
				} ?>
			    </div>
			</div>
        
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
