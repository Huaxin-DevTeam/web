<?php
    $this->pageTitle=Yii::app()->name . ' - ' . $item->title;
?>
<div class="anuncio_wrapper col-md-12">
	<h5><?php print $item->title ?></h5>
	<div class="detalle_elem">
		<div class="foto col-sm-6">
			<img class="img-responsive center-block" src="<?php echo Yii::app()->request->baseUrl; ?><?php print $item->image_url; ?>"></img>
		</div>
		<div class="detalle col-sm-6">
			<div class="det-precio">
				<span class="big-blue"><?php print Yii::t("huaxin", "Price") ?></span>
				<p><?php print $item->price ?>€ </p>
			</div>
			<div class="det-cat">
				<span class="big-blue"><?php print Yii::t("huaxin", "Category")?></span><br>
				<a href= "<?php echo Yii::app()->request->baseUrl;?>/category/<?php print $category->id; ?>"><?php print $category->name; ?></a>
			</div>
			<div class="det-telf">
				<span class="big-blue"><?php print Yii::t("huaxin", "Telephone")?></span>
				<p><?php print $item->phone ?> </p>
			</div>
			<div class="det-descripcion">
				<span class="big-blue"><?php print Yii::t("huaxin", "Description")?></span>
				<p><?php print $item->description ?></p>
			</div>		
		</div>
		<ul class="bottom pull-right list-inline list-unstyled clearfix">
			<?php if($item->user_id == Yii::app()->user->id): ?>
			<li class="editar"><a href="<?php echo Yii::app()->request->baseUrl;?>/edit/<?php print $item->id; ?>"><?php print Yii::t("huaxin", "Editar")?></a></li>
			<li class="eliminar"><a href="<?php echo Yii::app()->request->baseUrl;?>/delete/<?php print $item->id; ?>" class="delete confirm"><?php print Yii::t("huaxin", "Eliminar")?></a></li>
			<?php endif; ?>
			<!--<li class="contactar"><a href="#">Contactar</a></li>-->
		</ul>
		<span class="gray"><?php print Yii::t("huaxin", "Anuncio visto :views veces", array(":views" => $item->num_views )); ?></span>
	</div>
</div>