<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo $this->element('admin/breadcrum');?>
        <?php echo $this->Session->flash();?>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create('Group', array('role' => 'form'));?>
            	<?php
		echo $this->Form->input('id', array(
				'div'       => 'form-group',
				'between'   => '<label class="control-label">* Id</label>',     
				'label'     => false,		
				'class'     => 'form-control',
				'error'     => array('attributes' => array(
				'wrap'      => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('name', array(
				'div'       => 'form-group',
				'between'   => '<label class="control-label">* Name</label>',     
				'label'     => false,		
				'class'     => 'form-control',
				'error'     => array('attributes' => array(
				'wrap'      => 'span', 'class' => 'help-inline'))));
	?>
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>  
        <?php echo $this->Form->end();?>
    </div>
</div>