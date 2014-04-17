<?php

App::uses('AppModel', 'Model');

/**
 * Page Model
 *
 * @property StaticType $staticType
 * @property Status $status
 */
class Page extends AppModel {

    /**
     * Konfigurasi plugin multi model search, agar field2 yang dilist bisa terindeks di
     * tabel search_index
     * 
     * @var array
     */
	public $actsAs = array(
		// 'MultiModelSearch.Searchable' => array(
  //           'fields' => array('title', 'content')
		// )
        'Tree'
	);
    
    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Image' => array(
            'className' => 'Image',
            'foreignKey' => 'model_id',
            'dependent' => true,
            'conditions' => array('Image.model_type' => 'Page'),
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
    );

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'title' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Title cannot be empty',
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => 'Number of characters in the title can not be more than 255.',
            ),
            'charForTitle' => array(
                'rule' => array('charForTitle'),
                'message' => 'Hanya huruf , angka, spasi, dan karakter " , ! ? & ( ) . - " yang diperbolehkan.',
            )
        ),
        'type' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Type cannot be empty',
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 100),
                'message' => 'Number of characters in the title can not be more than 100.',
            ),
            'charForTitle' => array(
                'rule' => array('charForTitle'),
                'message' => 'Tidak diperbolehkan karakter aneh.',
            )
        ),
        'slug' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Field cannot be empty',
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 255),
                'message' => 'Number of characters in the slug can not be more than 255 character.',
            ),
            'alphaNumericDashUnderscore' => array(
                'rule' => array('alphaNumericDashUnderscore'),
                'message' => 'Hanya huruf, angka, spasi, dash, dan underscore yang diperbolehkan.',
            )
        ),
        'content' => array(
            'maxLength' => array(
                'rule' => array('maxLength', 10000),
                'message' => 'Number of characters in the content can not be more than 10000 character.',
                'allowEmpty' => true,
            ),
        ),
		
    );

    public function buildParent() {
        /**
         * Page 1
         *      -page 2
         *          + page 8
         *      -page 3
         *          + page 9
         * Page 4
         *      -page5
         *      -page6
         * Page 7     
         */

        $pages = $this->find('all', array('fields' => array('id', 'parent_id','title')));
        //debug($pages);exit;
        
        if ( empty($pages) ) {
            return;
        }

        $data = '<select>';
        foreach ($pages as $key1 => $value1) {
            $id1        = $value1['Page']['id'];
            $title1     = $value1['Page']['title'];
            $parentId1  = $value1['Page']['parent_id'];
            //debug($parentId1 );exit;

            if ( $this->isHasChild($id1) ) {
                $pages2 = $this->getChildData($parentId1);

                if ( empty($pages2) ) {
                    return;
                }

                $data .= "<optgroup label='$title1'>";
                    foreach ($pages2 as $key2 => $value2) {
                        $id2        = $value2['Page']['id'];
                        $title2     = $value2['Page']['title'];
                        $parentId2  = $value2['Page']['parent_id'];

                        $data .= "<option value='$id2'>$title2</option>";

                        if ( $this->isHasChild($id2) ) {
                            $pages3 = $this->getChildData($parentId2);

                            if ( empty($pages3) ) {
                                return;
                            }

                            $data .= "<optgroup label='$title2'>";

                            $data .= "</optgroup>";
                        }
                    }
                $data .= "</optgroup>";
            } else {
                $data .= "<option value='$id1'>$title1</option>";
            }

            
        }
        $data .= '</select>';


        return $data;

    }

    public function isHasChild($id=null) {
        if ($id == null) {
            return false;
        }

        $countChild = $this->find('count',array(
                'conditions' => array(
                        'parent_id' => $id
                    ),
                'recursive' => -1
            ));

        if ($countChild <= 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getChildData($parentId) {
        // if ($parentId == null) {
        //     return false;
        // }

        $childs = $this->find('all', array(
                'conditions' => array('parent_id' => $parentId),
                'recursive' => -1,
                'fields' => array('id', 'parent_id', 'title')
            ));

        return $childs;

    }

}
