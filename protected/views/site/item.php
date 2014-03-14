
<div class="anuncio_wrapper col-md-12">
	<h5><?php print $item->title ?></h5>
	<div class="detalle_elem">
		<div class="foto col-sm-6">
			<img class="img-responsive center-block" src="<?php echo Yii::app()->request->baseUrl; ?><?php print $item->image_url; ?>"></img>
		</div>
		<div class="detalle col-sm-6">
			<div class="det-precio">
				<span class="big-blue">Precio</span>
				<p><?php print $item->price ?>€ </p>
			</div>
			<div class="det-cat">
				<span class="big-blue">Categoría</span>
				<a href= "<?php echo Yii::app()->request->baseUrl;?>/category/<?php print $category->id; ?>"><?php print $category->name; ?></a>
			</div>
			<div class="det-telf">
				<span class="big-blue">Teléfono</span>
				<p><?php print $item->phone ?> </p>
			</div>
			<div class="det-descripcion">
				<span class="big-blue">Descripción</span>
				<p><?php print $item->description ?></p>
			</div>		
		</div>
		<ul class="bottom pull-right list-inline list-unstyled clearfix">
			<li class="editar"><a href="#">Editar</a></li>
			<li class="eliminar"><a href="#" class="delete confirm">Eliminar</a></li>
			<li class="contactar"><a href="#">Contactar</a></li>
		</ul>
	</div>
</div>