<?php
class Tagtype extends AppModel {

	var $name = 'Tagtype';
	var $validate = array(
		'type' => VALID_NOT_EMPTY
	);


	var $hasMany = array( 
		'Tag' => array(
			'className' => 'Tag', 
			'order' => 'displayorder',
			//'foreignKey' => 'parentid' 
		), 
    );


    function maxDisplay() {
        $qry = $this->query("SELECT max(displayorder) as themax FROM tagtypes");
        return $qry[0][0]['themax'];
    }
	
}
?>