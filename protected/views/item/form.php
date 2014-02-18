
<?php
/* @var $this SiteController */
/* @var $model ItemForm */
/* @var $form CActiveForm  */
	$this->pageTitle=Yii::app()->name . ' - Nuevo Anuncio';
?>
<div class="form">
		<div class="col-xs-12 blue margenh5">
			<h5>Nuevo anuncio</h5>
		</div>
	
		<p>Please fill out the following form with your login credentials:</p>
		
		<div class="form">
		<?php $form=$this->beginWidget('CActiveForm'); ?>
		 
		    <?php echo $form->errorSummary($model); ?>
		    
			<div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'category'); ?>
			        <?php echo $form->dropDownList($model,'category',array(),array("class" => "form-control")) ?>
				</div>
		    </div>

			<div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'title'); ?>
			        <?php echo $form->textField($model,'title',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
			<div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'description'); ?>
			        <?php echo $form->textField($model,'description',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'price'); ?>
			        <?php echo $form->textField($model,'price',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'phone'); ?>
			        <?php echo $form->textField($model,'phone',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'image'); ?>
			        <?php echo $form->textField($model,'image',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'location'); ?>
			        <?php echo $form->textField($model,'location',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row">
				<div class="form-group col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-0">
			        <?php echo $form->label($model,'duration'); ?>
			        <?php echo $form->textField($model,'duration',array("class" => "form-control")) ?>
				</div>
		    </div>
		    
		    <div class="row">
				<div class="form-group col-md-offset-4 col-sm-1 col-sm-offset-5 col-xs-offset-1 bigbottom">			
					<div class="button button-register col-xs-offset-5">
						<?php echo CHtml::submitButton('Save'); ?>
					</div>
				</div>
			</div>
			
		 
		<?php $this->endWidget(); ?>
		</div><!-- form -->
				
</div>
		


	
