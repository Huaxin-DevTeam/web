<li class="list-unstyled creditos-lista">

	<a href='<?php echo Yii::app()->request->baseUrl; ?>/order/cart/<?php print $item->id ?>'>
		<div class="text-center col-xs-12 col-sm-6">
			<div class="credit_wrapper">
				<div class="credit_name"><?php print $item->name ?></div>
				<div class="credit_num">n creditos</div>
				<div class="credit_desc">	
					<div class="credit_euros">3euro</div>
					<div class="credit_phrase">soy el ole </div>
					<div class="buy_now center-block">buy now</div>
				</div>
			</div>
		</div>

	</a>

</li>