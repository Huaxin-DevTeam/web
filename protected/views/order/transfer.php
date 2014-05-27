<div class="pagar">
<span class="col-xs-12 margenh5"><?php print Yii::t("huaxin","Ya casi hemos terminado, revisa y paga tu compra"); ?></span>

	<div class="resumen-compra col-xs-12">
		<table class="table col-xs-12">
			<tr>
				<th class="col-xs-6"><?php print Yii::t("huaxin","Resumen de compra:"); ?></th>
				<th class="col-xs-6"><?php print Yii::t("huaxin","Precio"); ?></th>
			</tr>
			<tr>
				<td class="col-xs-6"><?php print $credits . " " . Yii::t("huaxin","credits"); ?></td>
				<td class="col-xs-6"><?php print $price; ?>€</td>
			</tr>	
			
		</table>
    </div>
	<p>
		<?php print Yii::t("huaxin","Deberás hacer una transferencia bancaria a la cuenta: es61 2100 0465 7501 0108 4190 a nombre de Linxiu Shao."); ?><br/>
		<b><?php print Yii::t("huaxin","IMPORTANTE"); ?></b> <?php print Yii::t("huaxin","Deberás incluir la siguiente información en el "); ?> <u><?php print Yii::t("huaxin","concepto"); ?></u>: 
		<span class="supertoken"><b><?php print $token; ?></b></span><br/><br/>
		<?php print Yii::t("huaxin","Una vez comprobemos el pago, se procederá a añadir los créditos a tu cuenta."); ?>
	</p>	
	<a href="/" class="button-blue  button-confirm pull-right text-center bigbottom"><?php print Yii::t("huaxin","Volver a la página principal"); ?></a>
</div>
