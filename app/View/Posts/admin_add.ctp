<?php echo $this->element('admin/ckeditor_call'); ?>

<style type="text/css">
	#PostPublicationDateMonth {
		width: 7em;
		display: inline;		
	}

	#PostPublicationDateDay {
		width: 7em;
		display: inline;
	}

	#PostPublicationDateYear {
		width: 7em;
		display: inline;
		margin-right: 2em;
	}

	#PostPublicationDateHour {
		width: 7em;
		display: inline;
	}

	#PostPublicationDateMin {
		width: 7em;
		display: inline;
	}

	#PostPublicationDateMeridian {
		width: 7em;
		display: inline;
	}

	#PostStatus {
		width: 10em;
	}
</style>

<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo $this->element('admin/breadcrum');?>
        <?php echo $this->Session->flash();?>
    </div>
</div><!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Post', array('role' => 'form'));?>
    	<?php

			echo $this->Form->input('title', array(
					'div' 		=> 'form-group',
					'between' 	=> '<label class="control-label">* Title</label>',     
					'label' 	=> false,		
					'class' 	=> 'form-control',
					'error' 	=> array('attributes' => array(
					'wrap' 		=> 'span', 'class' => 'help-inline'))));

			echo $this->Form->input('subtitle', array(
					'div' 		=> 'form-group',
					'between' 	=> '<label class="control-label">* Subtitle</label>',     
					'label' 	=> false,		
					'class' 	=> 'form-control',
					'error' 	=> array('attributes' => array(
					'wrap' 		=> 'span', 'class' => 'help-inline'))));

			echo $this->Form->input('content', array(
					'div' 		=> 'form-group',
					'between' 	=> '<label class="control-label">* Content</label>',     
					'label' 	=> false,	
					'type'		=> 'textarea',
					//'style'		=> 'height:20em',	
					'class' 	=> 'ckeditor form-control',
					'error' 	=> array('attributes' => array(
					'wrap' 		=> 'span', 'class' => 'help-inline'))));

			echo $this->Form->input('publication_date', array(
					'div' 		=> 'form-group',
					'between' 	=> '<label class="control-label">* Publication Date</label><br>',     
					'label' 	=> false,		
					'class' 	=> 'form-control',
					'error' 	=> array('attributes' => array(
					'wrap' 		=> 'span', 'class' => 'help-inline'))));

			echo $this->Form->input('status', array(
					'div' 		=> 'form-group',
					'between' 	=> '<label class="control-label">* Status</label><br>',     
					'label' 	=> false,		
					'class' 	=> 'form-control',
					'options' 	=> $status,
					'error' 	=> array('attributes' => array(
					'wrap' 		=> 'span', 'class' => 'help-inline'))));

		?>
    	<?php echo $this->element('admin/submit') ?>
        <?php echo $this->Form->end();?>
        <!-- <script>
			CKEDITOR.inline( 'data[Post][content]' );
		</script> -->
    </div>
</div>