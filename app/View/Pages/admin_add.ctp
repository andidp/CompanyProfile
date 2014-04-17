<?php echo $this->element('admin/ckeditor_call'); ?>

<style type="text/css">
	#PagePublicationDateMonth {
		width: 7em;
		display: inline;		
	}

	#PagePublicationDateDay {
		width: 7em;
		display: inline;
	}

	#PagePublicationDateYear {
		width: 7em;
		display: inline;
		margin-right: 2em;
	}

	#PagePublicationDateHour {
		width: 7em;
		display: inline;
	}

	#PagePublicationDateMin {
		width: 7em;
		display: inline;
	}

	#PagePublicationDateMeridian {
		width: 7em;
		display: inline;
	}

	#PageStatus {
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
        <?php echo $this->Form->create('Page', array('role' => 'form'));?>
        <?php

        $parents[null] = 'Top Parent';
        ksort($parents);

		echo $this->Form->input('parent_id', array(
				'div' 		=> 'form-group',
				'between' 	=> '<label class="control-label">Parent</label>',     
				'label' 	=> false,		
				'class' 	=> 'form-control',
                'options' 	=> $parents,
				'error' 	=> array('attributes' => array(
				'wrap' 		=> 'span', 'class' => 'help-inline'))));

		echo $this->Form->input('title', array(
				'div' 		=> 'form-group',
				'between' 	=> '<label class="control-label">* Title</label>',     
				'label' 	=> false,		
				'class' 	=> 'form-control',
				'error' 	=> array('attributes' => array(
				'wrap' 		=> 'span', 'class' => 'help-inline'))));

		echo $this->Form->input('subtitle', array(
				'div' 		=> 'form-group',
				'between' 	=> '<label class="control-label">Subtitle</label>',     
				'label' 	=> false,		
				'class' 	=> 'form-control',
				'error' 	=> array('attributes' => array(
				'wrap' 		=> 'span', 'class' => 'help-inline'))));

		echo $this->Form->input('content', array(
				'div' 		=> 'form-group',
				'type'		=> 'textarea',
				'between' 	=> '<label class="control-label">* Content</label>',     
				'label' 	=> false,	
				//'style'		=> 'height:20em',
				'class' 	=> 'form-control ckeditor',
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
				'between' 	=> '<label class="control-label">* Status</label>',     
				'label' 	=> false,		
				'class' 	=> 'form-control',
				'options' 	=> $status,
				'error' 	=> array('attributes' => array(
				'wrap' 		=> 'span', 'class' => 'help-inline'))));

		?>
    	<?php echo $this->element('admin/submit') ?> 
        <?php echo $this->Form->end();?>
        <!-- <script>
			CKEDITOR.inline( 'data[Page][content]' );
		</script> -->
    </div>
</div>