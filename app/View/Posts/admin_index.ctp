<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo $this->element('admin/breadcrum');?>
        
        <div class="row pull-right">
            <div class="col-lg-4">
                <a href="<?php echo $this->Html->url(array('action' => 'add')); ?>" class="btn btn-info"><?php echo __('Add ') . Inflector::humanize( Inflector::singularize( $this->params['controller'] ) ); ?></a>
            </div>
        </div>
        <?php echo $this->Session->flash();?>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <h2>Bordered Table</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                    <tr>
                        <th><?php echo $this->Paginator->sort('id');?><i class="fa fa-sort"></i></th>
                        <th><?php echo $this->Paginator->sort('title');?><i class="fa fa-sort"></i></th>
                        <th><?php echo $this->Paginator->sort('subtitle');?><i class="fa fa-sort"></i></th>
                        <th><?php echo $this->Paginator->sort('content');?><i class="fa fa-sort"></i></th>
                        <th><?php echo $this->Paginator->sort('publication_date');?><i class="fa fa-sort"></i></th>
                        <th><?php echo $this->Paginator->sort('status');?><i class="fa fa-sort"></i></th>
                    <th class="actions"><?php echo __('Actions');?><i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $pageLimit = isset($this->params['paging']['Post']['limit']) ? $this->params['paging']['Post']['limit'] : 0;
                        $no = 1 + (( (isset($this->params['named']['page']) ? $this->params['named']['page'] - 1 : 0 ) *  ( isset($pageLimit) ? $pageLimit : $paginationLimit) ) );
                    
                    foreach ($posts as $post): ?>
                    	<tr>
                    		<td><?php echo $no; ?>&nbsp;</td>
                    		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
                    		<td><?php echo h($post['Post']['subtitle']); ?>&nbsp;</td>
                    		<td><?php echo strip_tags($this->Text->truncate($post['Post']['content'], 35, array('ellipsis' => '...','exact' => true,'html' => false))); ?>&nbsp;</td>
                    		<td><?php echo h($this->Time->nice($post['Post']['publication_date'])); ?>&nbsp;</td>

                            <td>
                                <?php if ($post['Post']['status'] == 1) : ?> 
                                    <?php echo $this->Form->postLink($status[$post['Post']['status']], array('action' => 'status', $post['Post']['id'], 0), array('escape' => false, 'title' => 'Set to draft', 'class' => 'active-status'), __('Apakah Anda yakin akan mendraftkan #%s?', $post['Post']['id'])); ?> 
                                <?php elseif ($post['Post']['status'] == 0) : ?> 
                                    <?php echo $this->Form->postLink($status[$post['Post']['status']], array('action' => 'status', $post['Post']['id'], 1), array('escape' => false, 'title' => 'Set to publish', 'class' => 'active-status'), __('Apakah Anda yakin akan mempublikasikan #%s?', $post['Post']['id'])); ?> 
                                <?php endif; ?>
                            </td>

                    		<td class="actions">
                    			<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id']), array('class' => 'btn btn-mini')); ?>
                    			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id']), array('class' => 'btn btn-mini')); ?>
                    			<?php echo $this->Form->postLink($this->Html->image('delete-icon-ios.png'), array('action' => 'delete', $post['Post']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
                    		</td>
                    	</tr>
                    <?php 
                    $no++; 
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php //echo $this->element('admin/pagination') ?>
</div>

