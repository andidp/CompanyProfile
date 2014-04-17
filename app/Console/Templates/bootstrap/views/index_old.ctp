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
<div class="<?php echo $pluralVar; ?> span9">
    <?php echo "<?php echo \$this->element('admin/title_index'); ?>"; ?>
    <table class="table table-bordered psbk-table">
        <thead>
            <tr>
                <?php foreach ($fields as $field): ?>
                    <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?></th>
                <?php endforeach; ?>
                <th class="actions"><?php echo "<?php echo __('Actions');?>"; ?></th>
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
            echo "\t\t\t<div class=\"btn-toolbar\">\n";
            echo "\t\t\t\t<div class=\"btn-group\">\n";
            echo "\t\t\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini')); ?>\n";
            echo "\t\t\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-mini')); ?>\n";
            echo "\t\t\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class' => 'btn btn-danger btn-mini'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
            echo "\t\t\t\t</div>\n";
            echo "\t\t\t</div>\n";
            echo "\t\t</td>\n";
            echo "\t</tr>\n";

            echo "<?php endforeach; ?>\n";
            ?>
        </tbody>
    </table>
    <div class="well">
        <?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>"; ?>
    </div>

    <div class="paging btn-group">
        <?php
        echo "<?php\n";
        echo "\t\techo \$this->Paginator->prev('< ' . __('previous'), array('class' => 'prev btn'), null, array('class' => 'prev disabled btn'));\n";
        echo "\t\techo \$this->Paginator->numbers(array('separator' => '', 'class' => 'btn', 'currentClass' => 'active'));\n";
        echo "\t\techo \$this->Paginator->next(__('next') . ' >', array('class' => 'next btn'), null, array('class' => 'next disabled btn'));\n";
        echo "\t?>\n";
        ?>
    </div>
</div>

