<?php $this->beginContent('//layouts/html'); ?>
    <div class="col-md-2 col-sm-12">
        <nav class="navbar navbar-default" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			</div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" id="menu">
                <div class="form">
                	<h5>Filters</h5>
                	<?php //print_r($this); die(); ?>
                	<?php $form=$this->beginWidget('CActiveForm'); ?>
                	<?php echo $form->errorSummary($this->filters,null,null,array('class'=>"bs-callout bs-callout-danger")); ?>

					<div class="row form-group">
                        <?php echo $form->label($this->filters,'category'); ?>
                        <?php echo $form->dropDownList($this->filters,'category',Helper::getCategories(),array('prompt' => '--Select--',"class" => "form-control", "options" => array(Yii::app()->getRequest()->getQuery('id') => array("selected" => true)))) ?>
                    </div>
                    
                    <div class="row form-group">
                        <?php echo $form->label($this->filters,'text'); ?>
                        <?php echo $form->textField($this->filters,'text',array("class" => "form-control")) ?>
                    </div>

                    <div class="row form-group">
                        <?php echo $form->label($this->filters,'location'); ?>
                        <?php echo $form->textField($this->filters,'location',array("class" => "form-control")) ?>
                    </div>
                    
					<div class="row form-group">
                        <?php echo $form->label($this->filters,'price'); ?>
                        <?php echo $form->textField($this->filters,'price',array("class" => "form-control", "id" => "price", "readonly" => "true")) ?>
                        <?php echo $form->hiddenField($this->filters,'pricemin',array("class" => "form-control", "id" => "pricemin")) ?>
                        <?php echo $form->hiddenField($this->filters,'pricemax',array("class" => "form-control", "id" => "pricemax")) ?>
                        <div id="slider-range"></div>
                    </div>

                    <div class="row form-group submit">
                        <?php echo CHtml::submitButton('Filter',array("class"=>"form-control","title"=>"Filter")); ?>
                    </div>
                    <?php $this->endWidget(); ?>
                </div><!-- form -->
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>

    <div class="col-md-8">
	
	<?php
		$flashMessages = Yii::app()->user->getFlashes();
		if ($flashMessages) {
			echo '<div class="row flashes">';
			foreach($flashMessages as $key => $message) {
				echo '<div class="col-xs-12 bs-callout bs-callout-' . $key . '">' . $message . "</div>\n";
			}
			echo '</div>';
		}
	?>
	
		<?php echo $content; ?>
    </div>
<?php $this->endContent(); ?>

<script>
$(function() {
	$(document).ready(function(){
		var minprice = <?php echo $this->filters->pricemin ? $this->filters->pricemin : 0 ?>;
		var maxprice = <?php echo $this->filters->pricemax ? $this->filters->pricemax : $this->maxprice ?>;
		var max = <?php echo $this->maxprice ?>;
		$( "#slider-range" ).slider({
			range: true,
			values: [minprice,maxprice],
			min: 0,
			max: max,
			slide: function( event, ui ) {
				$( "#price" ).val( ui.values[0] + "€ - " + ui.values[1] + "€" );
				$( "#pricemin" ).val(ui.values[0]);
				$( "#pricemax" ).val(ui.values[1]);
			}
		});
		$( "#price" ).val( $( "#slider-range" ).slider( "values",0 ) + "€ - " + $( "#slider-range" ).slider( "values",1 ) + "€"  );
		$( "#pricemin" ).val($( "#slider-range" ).slider( "values",0 ));
		$( "#pricemax" ).val($( "#slider-range" ).slider( "values",1 ));
		
		$('#FiltersForm_category').change(function(){
			var url = "<?php print Yii::app()->getBaseUrl() . "/" . Yii::app()->controller->action->id ?>";
			url += "/"+$(this).val();
			$('.form form').attr('action',url).submit();
		});
		
	});
	
});
</script>