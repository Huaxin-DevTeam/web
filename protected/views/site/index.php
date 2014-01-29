<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<ul>
<?php foreach($categories as $c): ?>
	<li><?php print CHtml::link($c->name,$this->createUrl("category/".$c->id)); ?></li>
<?php endforeach; ?>
</ul>

<div>
<?php print $ad->toHtml(); ?>
</div>

<?php if(Yii::app()->user->getId() === null): ?>
<div class="form">
<?php echo CHtml::beginForm(); ?>
 
    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'username'); ?>
        <?php echo CHtml::activeTextField($model,'username') ?>
    </div>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'password'); ?>
        <?php echo CHtml::activePasswordField($model,'password') ?>
    </div>
 
    <div class="row submit">
        <?php echo CHtml::submitButton('Login'); ?>
    </div>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->	
<?php endif; ?>