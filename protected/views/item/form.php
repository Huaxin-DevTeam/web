
<?php
/* @var $this SiteController */
/* @var $model ItemForm */
/* @var $form CActiveForm  */
	$this->pageTitle=Yii::app()->name . ' - Nuevo Anuncio';
?>
<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo $form->errorSummary($model,null,null,array('class'=>"bs-callout bs-callout-danger")); ?>
<div class="row form bigbottom">
		<div class="col-xs-12 blue margenh5">
			<h5>Nuevo anuncio</h5>
		</div>
		
		<div class="form col-xs-12 col-sm-9">
			<div class="form-group row">
				<div class="col-sm-4 col-xs-12">
					<?php echo $form->label($model,'category'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">
					<?php echo $form->dropDownList($model,'category',Helper::getCategories(),array('prompt' => '--Select--',"class" => "form-control")) ?>
				</div>
				
			</div>

			<div class="row form-group">
				<div class="col-sm-4 col-xs-12">
			        <?php echo $form->label($model,'title'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">
				    <?php echo $form->textField($model,'title',array("class" => "form-control")) ?>
				</div>	
		    </div>
		    
			<div class="row form-group">
				<div class="col-sm-4 col-xs-12">
				    <?php echo $form->label($model,'description'); ?>
				</div>
				<div class="col-sm-8 col-xs-12 form-group">
			        <?php echo $form->textField($model,'description',array("class" => "form-control")) ?>
				</div>
			</div>
		    
		    <div class="row form-group">
				<div class="col-sm-4 col-xs-12">
			        <?php echo $form->label($model,'price'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">
			        <?php echo $form->textField($model,'price',array("class" => "form-control")) ?>
				</div>	
		    </div>
		    
		    <div class="row form-group">
				<div class="col-sm-4 col-xs-12">
			        <?php echo $form->label($model,'phone'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">					
			        <?php echo $form->textField($model,'phone',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row form-group">
				<div class="col-sm-4 col-xs-12">
			        <?php echo $form->label($model,'image'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">					
			        <?php echo $form->textField($model,'image',array("class" => "form-control")) ?>
				</div>  
		   </div>
		    
		    <div class="row form-group">
				<div class="col-sm-4 col-xs-12">
			        <?php echo $form->label($model,'location'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">					
			        <?php echo $form->textField($model,'location',array("class" => "form-control")) ?>
				</div>
		   </div>
		    
		    <div class="row form-group">
				<div class="col-sm-4 col-xs-12">
			        
				</div>
				<div class="col-sm-8 col-xs-12">					
			        
				</div>
			</div>
		    
			
		 
		<?php $this->endWidget(); ?>
		</div><!-- form -->
		<div class="form-group col-sm-3 col-xs-12 sticky">			
			
			<div class="col-xs-6 col-sm-12">
				<p>
					<?php echo $form->label($model,'duration'); ?>
					<?php echo $form->textField($model,'duration',array("style" => "border:0; color:#f6931f; font-weight:bold;", "id" => "amount")) ?>
				</p>
				<div id="slider-range-min"></div>
			</div>
			
			<div class="col-xs-6 col-sm-12">
				<?php echo $form->label($model,'premium'); ?>
				<?php echo $form->checkBox($model,'premium',array("checked" => $model->premium == 1 ? "checked" : "", "id" => "promote")) ?>
			</div>
			
			<div class="col-xs-6 col-sm-12">
				<label for="ch_emails">Total credits: </label>
				<span id="total_credits">1</span>
			</div>
			
			<div class="newsave button col-xs-offset-5 col-sm-offset-3">
				<?php echo CHtml::submitButton('Save'); ?>
			</div>
		</div>
						
</div>

<script>
$(function() {
	$(document).ready(function(){
		$( "#slider-range-min" ).slider({
			range: "min",
			value: <?php echo $model->duration ? : 1; ?>,
			min: 1,
			max: 7,
			slide: function( event, ui ) {
				$( "#amount" ).val( ui.value );
				var total = ui.value + ($('#promote').attr("checked") == "checked" ? ui.value*2 : 0);
				$("#total_credits").html( total );
			}
		});
		$( "#amount" ).val( $( "#slider-range-min" ).slider( "value" ) );

		$('input[type=checkbox]').tzCheckbox({
		    labels: [ 'Yes', 'No' ]
		});
		
		$(".tzCheckBox").click( function(){
			var days = parseInt($( "#amount" ).val());
			var total = days + ($('#promote').attr("checked") == "checked" ? days*2 : 0);
			$("#total_credits").html( total );
		});
		var days = parseInt($( "#amount" ).val());
		var total = days + ($('#promote').attr("checked") == "checked" ? days*2 : 0);
		$("#total_credits").html( total );
	});
	
});
</script>		