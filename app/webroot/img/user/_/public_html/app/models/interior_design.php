<?php
class InteriorDesign extends AppModel {

	var $name = 'InteriorDesign';
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
		'InteriorDesign' => array(
			'className' => 'InteriorDesign', 
			'order' => 'displayorder'
		), 
    );	



    function maxDisplay() {
        $qry = $this->query("SELECT max(displayorder) as themax FROM interiordesigns");
        return $qry[0][0]['themax'];
    }


	
}
?>