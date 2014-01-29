<?php
class Presscover extends AppModel {

	var $name = 'Presscover';
	/*var $validate = array(
		'pagetitle' => VALID_NOT_EMPTY,
		'content' => VALID_NOT_EMPTY
	);*/



	/*var $belongsTo = array( 
        'Parent' => array(
				'className' => 'Dpage', 
                'foreignKey' => 'parentid' 
        ), 
     );*/ 


	var $hasMany = array( 
		'Presspage' => array(
			'className' => 'Presspage', 
			'order' => 'displayorder'
		), 
    );	



    function maxDisplay() {
        $qry = $this->query("SELECT max(displayorder) as themax FROM presscovers");
        return $qry[0][0]['themax'];
    }


	
}
?>