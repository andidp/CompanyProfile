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
        <?php echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form'));?>\n"; ?>
            <?php
            echo "\t<?php\n";
            foreach ($fields as $field) {
                $fieldHuman = Inflector::humanize($field);
                if (strpos($action, 'add') !== false && $field == $primaryKey) {
                    continue;
                } elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                    echo "\t\techo \$this->Form->input('{$field}', array(
				'div'       => 'form-group',
				'between'   => '<label class=\"control-label\">* $fieldHuman</label>',     
				'label'     => false,		
				'class'     => 'form-control',
				'error'     => array('attributes' => array(
				'wrap'      => 'span', 'class' => 'help-inline'))));\n";
                }
            }
            if (!empty($associations['hasAndBelongsToMany'])) {
                foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                    echo "\t\techo \$this->Form->input('{$assocName}');\n";
                }
            }
            echo "\t?>\n";
            ?>
            <button type="submit" class="btn btn-default">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>  
        <?php
        echo "<?php echo \$this->Form->end();?>\n";
        ?>
    </div>
</div>