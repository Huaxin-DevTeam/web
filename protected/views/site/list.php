<div class="col-xs-12 blue margenh5">
	<h5 class=""><?php print Yii::t("huaxin", "Search result")?></h5>
</div>
<ul class="clearfix list-unstyled">

<?php 
foreach($items as $i){


	print $i;	
}
?>
</ul>
<?php $this->widget('CLinkPager', array(
'pages'=>$pages,
)); ?>

<?php if( isset($filters) && $filters === true): ?>
<script>
$(function() {
	$(document).ready(function(){		
		$('.yiiPager a').click(function(e){
			e.preventDefault(); //no click!
			var url = $(this).attr('href');
			$('.form form').attr('action',url).submit();
		});		
	});
});
</script>
<?php endif; ?>