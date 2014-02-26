<!--<pre>
<?php print_r($item); ?>
</pre>-->
<div class="item col-md-12">
	<div class="imagen col-xs-4">
		<img src="<?php print $item->image_url; ?>" />
	</div>
	<div class="texto col-xs-8">
		<div class="row">
			<h5><?php print $item->title; ?></h5>
		</div>
		<div class="row">
			<?php print $item->description; ?>
		</div>
		<div class="row">
			<?php print $item->price; ?>€
			<div class="actions">
				<ul>
					<?php if($item->user_id == Yii::app()->user->id): ?>
					<li><a href="/edit/<?php print $item->id?>">Editar</a></li>
					<li><a href="/delete/<?php print $item->id?>" class="delete confirm">Eliminar</a></li>
					<?php endif; ?>
					<li>Contactar</li>
				</ul>
			</div>			
		</div>
	</div>
</div>