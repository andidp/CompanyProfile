<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Forms <small>Enter Your Data</small></h1>
        <?php echo "<?php echo \$this->element('admin/breadcrum');?>\n" ?>
        <?php echo "<?php echo \$this->Session->flash();?>\n" ?>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <h2>Bordered Table</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover tablesorter">
                <thead>
                    <tr>
                        <?php foreach ($fields as $field): ?>
                            <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?><i class="fa fa-sort"></i></th>
                        <?php endforeach; ?>
                        <th class="actions"><?php echo "<?php echo __('Actions');?>"; ?><i class="fa fa-sort"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo "<?php
                    foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
                    echo "\t<tr>\n";
                    foreach ($fields as $field) {
                        $isKey = false;
                        if (!empty($associations['belongsTo'])) {
                            foreach ($associations['belongsTo'] as $alias => $details) {
                                if ($field === $details['foreignKey']) {
                                    $isKey = true;
                                    echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                                    break;
                                }
                            }
                        }
                        if ($isKey !== true) {
                            echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
                        }
                    }

                    echo "\t\t<td class=\"actions\">\n";
                    echo "\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini')); ?>\n";
                    echo "\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini')); ?>\n";
                    echo "\t\t\t<?php echo \$this->Form->postLink(\$this->Html->image('delete-icon-ios.png'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('escape' => false), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
                    echo "\t\t</td>\n";
                    echo "\t</tr>\n";

                    echo "<?php endforeach; ?>\n";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo "<?php echo \$this->element('admin/pagination') ?>"; ?>
</div>

