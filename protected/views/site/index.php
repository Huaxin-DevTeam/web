<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
	$this->pageTitle=Yii::app()->name;
	?>

<div class="row carousel">
    <div class="col-md-12">
        ANUNCIOS DESTACADOS
    </div>

    <div class="col-md-2 col-xs-2 carruflecha	">
        <a data-slide="prev" href="#myCarousel" class="carousel-control"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/left-arrow.png" class=""></a>
    </div>

    <div class="col-md-8 col-xs-8">
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="carousel slide" id="myCarousel">
                    <div class="carousel-inner text-center">
                        <div class="item active">
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke aseola ke aseola ke ase</div>
							</div>
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                        </div>

                        <div class="item">
							<div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                        </div>

                        <div class="item">
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                            <div class="col-xs-4 thumbnail"><img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                            <div class="col-xs-4 thumbnail">
								<img src="http://placehold.it/260x260" alt="">
								<div class="texto-anuncio">ola ke ase</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xs-2 carruflecha">
        <a data-slide="next" href="#myCarousel" class="carousel-control"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/right-arrow.png"></a>
    </div>
</div>

<div class="row porque-huaxin_wrapper">
    <div class="col-md-12 col-xs-12 porque-huaxin ">
        POR QUÉ HUAXIN?
    </div>

    <div class="col-sm-4 col-sm-offset-0 col-xs-11 col-xs-offset-1">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/locker-big.png" class="img-responsive center-block">

        <h6 class="text-center">信任与安全</h6>

        <p align="justify" class="small">华信软件是由华信传媒制作并管理的旅西华人华侨网上信息平台。华信传媒拥有专业、敬业、正规的软件开发和管理团队，我们本着服务旅西华人华侨、互利双赢的理念，认真负责的做好研发和管理工作，热忱的为华人社区的创业和生活做最好的服务。
本平台严禁发布任何虚假信息、垃圾信息、和一切违反中西两国法律法规、以及违反公序良俗的信息，一经发现，立即删除，并发出警告信息，二次违反，永久封帐号。同时欢迎用户朋友监督检举，我们查实后，给予奖励。
用户信息和资料，包括注册信息和银行支付信息，我们承诺不向任何第三方机构和组织、个人透露。
    做最专业、最受信任、最安全的华人社区信息平台是我们矢志不渝的目标和责任。
</p>
    </div>

    <div class="col-sm-4 col-sm-offset-0 col-xs-11 col-xs-offset-1">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/shield.png" class="img-responsive center-block">

        <h6 class="text-center">快捷、方便、实用</h6>

        <p align="justify" class="small">本着方便华人社区创业和生活的宗旨，我们为用户朋友提供最广泛，最实用的信息。一个网站两个手机系统软件，最大限度地方便用户的使用。努力打造一个方便、快捷、实用的海量信息平台。
两个手机系统软件分别为苹果系统（IOS）和安卓系统（ANDROID）,用户可以到相应的APP STORE和GOOGLE PLAY STORE去下载，也可以通过网站下载。
</p>
    </div>

    <div class="col-sm-4 col-sm-offset-0 col-xs-11 col-xs-offset-1">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/dollar.png" class="img-responsive center-block">

        <h6 class="text-center">支付安全</h6>

        <p align="justify" class="small">我们有专业的管理团队，使用美国知名公司GODADDY的知名主机服务，为用户提供最安全的支付保障。PAYPAL是最知名的第三方安全支付方式，信用卡支付和银行转账都有银行系统保障数据安全，我们承诺绝不向任何第三方组织机构和个人提供用户的支付信息。
我们努力打造信誉最好，支付最安全的用户平台，用户可以放心使用本平台的支付服务。任何问题请及时联系我们的客服。
</p>
    </div>
</div>

