<?php
class Tag extends AppModel {

	var $name = 'Tag';
	var $validate = array(
		'tag' => VALID_NOT_EMPTY
	);


	var $belongsTo = array( 
        'Tagtype' => array(
				'className' => 'Tagtype',
        ), 
     );


	/*var $hasMany = array( 
		'Child' => array(
			'className' => 'Dpage', 
			'order' => 'displayorder',
			'foreignKey' => 'parentid' 
		), 
	
		'Image' => array(
			'className' => 'Image', 
			'order' => 'displayorder',
			'foreignKey' => 'dpage_id', 
			'dependent' => true
		), 
    );*/ 	


	var $hasAndBelongsToMany = array('Pattern' =>
                               array('className'    => 'Pattern',
                                     'joinTable'    => 'patterns_tags',
                                     //'foreignKey'   => 'tag_id',
                                     //'associationForeignKey'=> 'pattern_id',
                                     //'conditions'   => '',
                                     //'order'        => '',
                                     //'limit'        => '',
                                     'unique'       => true,
                                     //'finderQuery'  => '',
                                     //'deleteQuery'  => '',
                               )
                               );
	

    function maxDisplay($tagtype_id) {
        $qry = $this->query("SELECT max(displayorder) as themax FROM tags WHERE tagtype_id = ".$tagtype_id);
        return $qry[0][0]['themax'];
    }

	
}
?>