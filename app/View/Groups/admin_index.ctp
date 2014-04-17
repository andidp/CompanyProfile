<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo $this->element('admin/breadcrum');?>
        <?php echo $this->Session->flash();?>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <h2>Bordered Table</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                    <tr>
                                                    <th><?php echo $this->Paginator->sort('id');?><i class="fa fa-sort"></i></th>
                                                    <th><?php echo $this->Paginator->sort('name');?><i class="fa fa-sort"></i></th>
                                                <th class="actions"><?php echo __('Actions');?><i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($groups as $group): ?>
	<tr>
		<td><?php echo h($group['Group']['id']); ?>&nbsp;</td>
		<td><?php echo h($group['Group']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $group['Group']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $group['Group']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink($this->Html->image('delete-icon-ios.png'), array('action' => 'delete', $group['Group']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $group['Group']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->element('admin/pagination') ?></div>

