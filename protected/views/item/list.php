<!--<pre>
<?php print_r($item); ?>
</pre>-->
<div class="blueline col-md-12 clearfix">
	<div class="imagen col-xs-4">
		<img src="<?php echo Yii::app()->request->baseUrl; ?><?php print $item->image_url; ?>" class="img-responsive" />
	</div>
	<div class="texto col-xs-8">
		<h5><a href="<?php echo Yii::app()->createUrl('view/'.$item->id) ?>">
			<?php print $item->title; ?>
		</a></h5>
		<div class="row description">
			<?php print $item->description; ?>
		</div>
		<div class="row bottom">
			<div class="col-xs-12">
				<span class="pull-left precio"><?php print $item->price; ?>€</span>
				<div class="actions pull-right">
					<ul class="anuncio list-inline list-unstyled clearfix">
						<?php if($item->user_id == Yii::app()->user->id): ?>
						<li class="editar"><a href="/edit/<?php print $item->id?>">Editar</a></li>
						<li class="eliminar"><a href="/delete/<?php print $item->id?>" class="delete confirm">Eliminar</a></li>
						<?php endif; ?>
						<li class="contactar"><a href="#">Contactar</a></li>
					</ul>
				</div>
			</div>				
		</div>
	</div>
</div>