<?php
class Pattern extends AppModel {

	var $name = 'Pattern';
	var $validate = array(
		'material' => VALID_NOT_EMPTY
	);


	var $hasAndBelongsToMany = array('Tag' =>
                               array('className'    => 'Tag',
                                     'joinTable'    => 'patterns_tags',
                                     'foreignKey'   => 'pattern_id',
                                     'associationForeignKey'=> 'tag_id',
                                     'conditions'   => '',
                                     'order'        => '',
                                     'limit'        => '',
                                     'unique'       => true,
                                     'finderQuery'  => '',
                                     'deleteQuery'  => '',
                               )
                               );
	

	
}
?>