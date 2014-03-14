<?php $this->beginContent('//layouts/html'); ?>
    <div class="col-md-2" style="padding:0">
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
                <ul class="menu nav nav-list">
                    <?php foreach($this->categories as $c): ?>
                    <li><?php print CHtml::link($c->name,$this->createUrl("category/".$c->id)); ?></li><?php endforeach; ?>
                </ul>
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