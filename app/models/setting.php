<?php
class Setting extends AppModel {

	var $name = 'Setting';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	/*var $hasMany = array(
			'Image' => array('className'     => 'Image',
                               'conditions'    => '',
                               'order'         => '',
                               'limit'         => '',
                               'foreignKey'    => 'dpage_id',
                               'dependent'     => true,
                               'exclusive'     => false,
                               'finderQuery'   => '')
	);*/

	var $belongsTo = array(
		'Pattern' => array('className' => 'Pattern')
		);

}
?>