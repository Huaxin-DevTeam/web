
<?php
/* @var $this SiteController */
/* @var $model ItemForm */
/* @var $form CActiveForm  */
	$this->pageTitle=Yii::app()->name . ' - Nuevo Anuncio';
?>
<?php $form=$this->beginWidget('CActiveForm',array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )); ?>
<?php echo $form->errorSummary($model,null,null,array('class'=>"bs-callout bs-callout-danger")); ?>
<div class="col-xs-12 form bigbottom">
		<div class="col-xs-12 blue margenh5">
			<h5><?php echo Yii::t("huaxin","Nuevo anuncio")?></h5>
		</div>
		
		<div class="form col-xs-12 col-sm-9">
			<div class="form-group row hidden">
				<div class="col-sm-4 col-xs-12">
					<?php echo $form->label($model,'category'); ?>
				</div>
				<div class="col-sm-8 col-xs-12">
					<?php echo $form->dropDownList($model,'category',Helper::getCategories(),array('prompt' => '--Select--',"class" => "form-control", "options" => array($model->category => array("selected" => true)))) ?>
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
			        <?php echo $form->fileField($model,'image',array("class" => "")) ?>
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
			<div class="button col-xs-offset-5 col-sm-offset-3">
				<?php echo CHtml::submitButton(Yii::t("huaxin","Save")); ?>	
			</div>
		</div>
						
</div>