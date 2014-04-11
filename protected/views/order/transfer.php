<div class="pagar">
<span class="col-xs-12 margenh5">Ya casi hemos terminado, revisa y paga tu compra</span>

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
	<p>
		Deberás hacer una transferencia bancaria a la cuenta: 000-000-000-0-0-0-0-000-0-0 a nombre de Linxiu Shao.<br/>
		<b>IMPORTANTE</b> Deberás incluir la siguiente información en el <u>concepto</u>: 
		<span class="supertoken"><b><?php print $token; ?></b></span><br/><br/>
		Una vez comprobemos el pago, se procederá a añadir los créditos a tu cuenta.
	</p>	
	<a href="/" class="button-blue  button-confirm pull-right text-center bigbottom">Volver a la página principal</a>
</div>
