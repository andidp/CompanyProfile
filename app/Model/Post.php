<?php

App::uses('AppModel', 'Model');

/**
 * Post Model
 *
 */
class Post extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'title';
    
    /**
     * List of post type
     *
     * @var array
     */
    public $postType = array(
        'news'      => 'News',
        'article'   => 'Article',
        'event'     => 'Event'
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
                'message' => 'Tidak diperbolhkan memasukkan karakter aneh',
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
                'allowEmpty' => true
            ),
        ),
    );

}
