<ul class="clearfix select-list">
<?php 

foreach($options as $opt)
	print $opt;
	
?>
</ul>


<table style="width: 100%;" class="table">
<tr><th colspan="3"><?php print Yii::t("huaxin","Tabla de costes"); ?></th></tr>
<tr><td> <?php print Yii::t("huaxin", "1 semana: 3 créditos")?></td><td><?php print Yii::t("huaxin", "1 mes: 9 créditos")?></td><td><?php print Yii::t("huaxin", "1 año: 30 créditos")?></td></tr>
<tr><td> <?php print Yii::t("huaxin", "2 semanas: 5 créditos")?></td><td><?php print Yii::t("huaxin", "2 meses: 15 créditos")?></td><td><b><?php print Yii::t("huaxin", "Destacar anuncio en portada: Tarifa x3")?></b></td></tr>
</table>