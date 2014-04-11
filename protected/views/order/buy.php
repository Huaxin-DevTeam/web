
<div class="pagar">
<span class="col-xs-12 margenh5">Ya casi hemos terminado, revisa y confirma tu compra</span>

	<div class="resumen-compra col-xs-12">
		<table class="table col-xs-12">
			<tr>
				<th class="col-xs-6">Resumen de compra:</th>
				<th class="col-xs-6">Precio</th>
			</tr>
			<tr>
				<td class="col-xs-6"><?php print $credits . " " . Yii::t("huaxin","credits"); ?></td>
				<td class="col-xs-6"><?php print $price; ?>€</td>
			</tr>	
			
		</table>
    </div>
	<a href="/order/confirm/<?php print $token ?>/<?php print $payerId ?>" class="button-blue  button-confirm pull-right text-center bigbottom">Confirmar compra</a>
	
</div>
<a href="/order/cancel/<?php print $token ?>" class="col-xs-5">Cancelar la compra</a>