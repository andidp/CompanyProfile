<button type="submit" class="btn btn-primary">Submit</button>
<?php if( $this->params['action'] == 'admin_add') : ?>
	<button type="reset" class="btn btn-primary">Reset</button>  
<?php else : ?>
	<?php echo $this->Html->link(__('Cancel'), $referer, array("class" => "btn btn-primary")); ?>
<?php endif; ?>

