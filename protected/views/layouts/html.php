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

            <div class="col-md-8 col-sm-8  col-xs-12 login">
			<div class="">
			
            <?php if(Yii::app()->user->getId() !== null): ?>
					<div class="col-xs-offset-0 col-md-offset-0  col-md-6  col-sm-5 col-xs-2 text-right loginmail"> <?php print Yii::app()->user->name ?></div>
                    <div class="col-xs-3 creditos blue-text"><?php print $this->credits; ?></div>
					<div class="menuitem buycredits col-xs-1"> <?php echo CHtml::link('',array('order/select')); ?> </div>
					<div class="menuitem misanuncios col-xs-1"> <?php echo CHtml::link('',array('/myads')); ?> </div>
					<div class="menuitem logout col-xs-1"> <?php echo CHtml::link('',array('/user/logout')); ?> </div>
            <?php else: ?>
            			
                    <div class="col-md-3 col-xs-12 text-center col-md-offset-7 ">
                        <?php $this->widget('zii.widgets.CMenu',array(
						    'items'=> array_merge($this->main_menu,array(
						        array('label'=>'Register', 'url'=>array('/user/register'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array('class'=>'registrate')),
						        array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest, 'itemOptions' => array('class'=>'loginp')),
						)),
							'htmlOptions' => array("class" => "list-unstyled list-inline initialism"),
						)); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form col-xs-offset-2 col-sm-offset-0">
                        <?php echo CHtml::beginForm(); ?><?php echo CHtml::errorSummary($this->loginModel,''); ?>

                        <div class="form-group form-user col-sm-5 col-md-offset-4 col-md-3 pull-left">
                            <?php echo CHtml::activeLabel($this->loginModel,'username', array("class" => "sr-only")); ?><?php echo CHtml::activeTextField($this->loginModel,'username',array("class" => "form-control", "id" => "idUser", "placeholder" => "Username")) ?>
                        </div>

                        <div class="form-group form-pass  col-sm-5 col-md-3 pull-left">
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
        
        <div class=" wrapper">
        
        	
        	
        	<div class="row busqueda">
			    <div class="col-md-2 col-xs-2 quebuscas">
			        <p>QUE BUSCAS?</p>
			    </div>
			
			    <div class="col-md-2 col-xs-3">
			    </div>
			
			    <div class="col-md-4 col-xs-10 col-md-offset-0 col-xs-offset-1">
			       <?php echo CHtml::beginForm(); ?><?php echo CHtml::errorSummary($this->searchModel,''); ?>
			        <form class="form" role="form">
			            <div>
			                <?php echo CHtml::activeLabel($this->searchModel,'query', array("class" => "sr-only")); ?>
			                <?php echo CHtml::activeTextField($this->searchModel,'query',array("class" => "form-control", "id" => "idSearch", "placeholder" => "Habitación, Barcelona...")) ?>
			            </div>
			        <?php echo CHtml::endForm(); ?>
			    </div>
			
			    <div class="col-md-2 col-xs-3 numanuncios">
			        <?php print Helper::getCount() ." ". Yii::t("huaxin", "anuncios"); ?>
			    </div>
				
				<div class="col-md-2 col-md-offset-0 col-xs-10 col-xs-offset-1 blue publica text-center">
					<a class="bigbutton" href="/new">
					  Pon tu anuncio
	  				</a>
				</div>

			</div>
			<div class="contenido row">
	
				<?php print $content ?>
				
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
                    <li><?php echo CHtml::link(Yii::t("huaxin", "AYUDA"),array('/help')); ?></li>
                    <li><?php echo CHtml::link(Yii::t("huaxin", "CONTACTA CON NOSOTROS"),array('/contact')); ?></li>
					<li><?php echo CHtml::link(Yii::t("huaxin", "SOBRE NOSOTROS"),array('/about')); ?></li>
					<li><?php echo CHtml::link(Yii::t("huaxin", "CONDICIONES DE USO"),array('/tos')); ?></li>
                    <li><?php echo CHtml::link(Yii::t("huaxin", "POLÍTICA DE PRIVACIDAD"),array('/privacidad')); ?></li>

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
