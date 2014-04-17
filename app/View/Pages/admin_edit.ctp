<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo $this->element('admin/breadcrum');?>
        <?php echo $this->Session->flash();?>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <?php echo $this->Form->create('Post', array('role' => 'form'));?>
            	<?php
		echo $this->Form->input('id', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Id</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('post_type', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Post Type</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('title', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Title</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('slug', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Slug</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('subtitle', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Subtitle</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('content', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Content</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('publication_date', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Publication Date</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
		echo $this->Form->input('status', array(
				'div' => 'form-group',
				'between' => '<label class="control-label">* Status</label>',     
				'label' => false,		
				'class' => 'form-control',
				'error' => array('attributes' => array(
				'wrap' => 'span', 'class' => 'help-inline'))));
	?>
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>  
        <?php echo $this->Form->end();?>
    </div>
</div>