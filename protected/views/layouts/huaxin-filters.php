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
                	<?php //print_r($this); die(); ?>
                    <?php echo CHtml::beginForm(); ?><?php echo CHtml::errorSummary($this->filters,''); ?>

					<div class="row form-group">
                        <?php echo CHtml::activeLabel($this->filters,'category'); ?>
                        <?php echo CHtml::activeTextField($this->filters,'category',array("class" => "form-control")) ?>
                    </div>
                    
                    <div class="row form-group">
                        <?php echo CHtml::activeLabel($this->filters,'text'); ?>
                        <?php echo CHtml::activeTextField($this->filters,'text',array("class" => "form-control")) ?>
                    </div>

                    <div class="row form-group">
                        <?php echo CHtml::activeLabel($this->filters,'location'); ?>
                        <?php echo CHtml::activePasswordField($this->filters,'location',array("class" => "form-control")) ?>
                    </div>

                    <div class="row form-group submit">
                        <?php echo CHtml::submitButton('Filter',array("class"=>"form-control","title"=>"login")); ?>
                    </div>
                    
                    <?php echo CHtml::endForm(); ?>
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