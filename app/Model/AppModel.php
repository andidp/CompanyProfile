<?php

/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {

    public $status = array(
                0 => 'Draft',
                1 => 'Publish'
            );

    public function alphaNumericDashUnderscore($check) {
        $value = array_values($check);
        $value = $value[0];

        return preg_match('|^[0-9a-zA-Z_-]*$|', $value);
    }

    public function charForTitle($check) {
        $value = array_values($check);
        $value = $value[0];

        return preg_match("|^[0-9a-zA-Z ,!?&()'\":.-]*$|", $value);
    }

    public function createSlug($string, $id = null) {
        $slug = Inflector::slug($string, '-');
        $slug = strtolower($slug);
        $i = 0;
        $params = array();
        $params['conditions'] = array();
        $params['conditions'][$this->name . '.slug'] = $slug;
        if (!is_null($id)) {
            $params['conditions']['not'] = array($this->name . '.id' => $id);
        }
        while (count($this->find('all', $params))) {
            if (!preg_match('/-{1}[0-9]+$/', $slug)) {
                $slug .= '-' . ++$i;
            } else {
                $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
            }
            $params['conditions'][$this->name . '.slug'] = $slug;
        }
        return $slug;
    }
}
