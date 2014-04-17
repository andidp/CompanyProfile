<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo $this->Session->flash();?>
        <?php echo $this->element('admin/breadcrum');?>
        <div class="row pull-right">
            <div class="col-lg-4">
                <a href="<?php echo $this->Html->url(array('action' => 'add')); ?>" class="btn btn-info"><?php echo __('Add ') . Inflector::humanize( Inflector::singularize( $this->params['controller'] ) ); ?></a>
            </div>
        </div>
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
                        $pageLimit = isset($this->params['paging']['Page']['limit']) ? $this->params['paging']['Page']['limit'] : 0;
                        $no = 1 + (( (isset($this->params['named']['page']) ? $this->params['named']['page'] - 1 : 0 ) *  ( isset($pageLimit) ? $pageLimit : $paginationLimit) ) );
                    
                        foreach ($pages as $page): ?>
                        	<tr>
                        		<td><?php echo $no; ?>&nbsp;</td>
                        		<td><?php echo h($page['Page']['title']); ?>&nbsp;</td>
                        		<td><?php echo h($page['Page']['subtitle']); ?>&nbsp;</td>
                        		<td><?php echo strip_tags($this->Text->truncate($page['Page']['content'], 35, array('ellipsis' => '...','exact' => true,'html' => false))); ?>&nbsp;</td>
                        		<td><?php echo h($this->Time->nice($page['Page']['publication_date'])); ?>&nbsp;</td>

                                <td>
                                    <?php if ($page['Page']['status'] == 1) : ?> 
                                        <?php echo $this->Form->postLink($status[$page['Page']['status']], array('action' => 'status', $page['Page']['id'], 0), array('escape' => false, 'title' => 'Set to draft', 'class' => 'active-status'), __('Apakah Anda yakin akan mendraftkan #%s?', $page['Page']['id'])); ?> 
                                    <?php elseif ($page['Page']['status'] == 0) : ?> 
                                        <?php echo $this->Form->postLink($status[$page['Page']['status']], array('action' => 'status', $page['Page']['id'], 1), array('escape' => false, 'title' => 'Set to publish', 'class' => 'active-status'), __('Apakah Anda yakin akan mempublikasikan #%s?', $page['Page']['id'])); ?> 
                                    <?php endif; ?>
                                </td>

                        		<td class="actions">
                        			<?php echo $this->Html->link(__('View'), array('action' => 'view', $page['Page']['id']), array('class' => 'btn btn-mini')); ?>
                        			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $page['Page']['id']), array('class' => 'btn btn-mini')); ?>
                        			<?php echo $this->Form->postLink($this->Html->image('delete-icon-ios.png'), array('action' => 'delete', $page['Page']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
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

