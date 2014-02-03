<div class="row busqueda">
    <div class="col-md-2">
        <p>QUE BUSCAS?</p>
    </div>

    <div class="col-md-2">
        DONDE BUSCAS?
    </div>

    <div class="col-md-4">
        <form class="form" role="form">
            <div>
                <label class="sr-only" for="idSearch">Usuario</label> <input type="text" class="form-control" id="idSearch" placeholder="Madrid, Barcelona...">
            </div>
        </form>
    </div>

    <div class="col-md-2">
        1.234.567.890 anuncios
    </div>

    <div class="col-md-2 blue publica text-center">
        <a href="#">Pon tu anuncio gratis</a>
    </div>
</div>

<div class="row contenido">
    <div class="col-md-2">
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
                <ul class="nav nav-list">
                    <?php foreach($categories as $c): ?>
                    <li><?php print CHtml::link($c->name,$this->createUrl("category/".$c->id)); ?></li><?php endforeach; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <div class="col-md-8">
        <div class="row carousel">
            <div class="col-md-12">
                ANUNCIOS DESTACADOS
            </div>

            <div class="col-xs-2">
                <a data-slide="prev" href="#myCarousel" class="carousel-control">
                	<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/left-arrow.png" class="">
                </a>
            </div>

            <div class="col-xs-8">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div class="carousel slide" id="myCarousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>
                                    <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>
                                    <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>
								</div>
		                        <div class="item">
		                        	<div class="col-xs-4 thumbnail">
		                            	<img src="http://placehold.it/260x180" alt="">
		                            </div>
		                            <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>
                                    <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>
		                        </div>
								<div class="item">
                                	<div class="col-xs-4 thumbnail">
                                    	<img src="http://placehold.it/260x180" alt="">
	                                </div>
	                                <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>
                                    <div class="col-xs-4 thumbnail">
                                        <img src="http://placehold.it/260x180" alt="">
                                    </div>                                
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-2">
                <a data-slide="next" href="#myCarousel" class="carousel-control"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/right-arrow.png"></a>
            </div>
        </div>

        <div class="row porque-huaxin">
            <div class="col-md-12">
                POR QUÉ HUAXIN?
            </div>

            <div class="col-md-4">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/locker-big.png" class="img-responsive center-block">

                <h6 class="text-center">CONFIANZA Y SEGURIDAD</h6>

                <p align="justify" class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquet leo. Morbi volutpat at massa id lobortis. Integer sed tortor vel mi vestibulum molestie non eget nisi. Quisque non ipsum at urna rhoncus commodo eu nec purus. Vivamus enim dui, varius et luctus quis, sollicitudin ut ligula.</p>
            </div>

            <div class="col-md-4">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/shield.png" class="img-responsive center-block">

                <h6 class="text-center">GARANTÍA 100%</h6>

                <p align="justify" class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquet leo. Morbi volutpat at massa id lobortis. Integer sed tortor vel mi vestibulum molestie non eget nisi. Quisque non ipsum at urna rhoncus commodo eu nec purus. Vivamus enim dui, varius et luctus quis, sollicitudin ut ligula.</p>
            </div>

            <div class="col-md-4">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/dollar.png" class="img-responsive center-block">

                <h6 class="text-center">PAGO SEGURO</h6>

                <p align="justify" class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed aliquet leo. Morbi volutpat at massa id lobortis. Integer sed tortor vel mi vestibulum molestie non eget nisi. Quisque non ipsum at urna rhoncus commodo eu nec purus. Vivamus enim dui, varius et luctus quis, sollicitudin ut ligula.</p>
            </div>
        </div>
    </div>

    <div class="col-md-2 adds">
        <?php print $ad->toHtml(); ?>
    </div>
</div>