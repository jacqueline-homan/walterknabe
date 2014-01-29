<?php
class Dpage extends AppModel {

	var $name = 'Dpage';
	var $validate = array(
		'pagetitle' => VALID_NOT_EMPTY,
		'content' => VALID_NOT_EMPTY
	);



	/*var $belongsTo = array( 
        'Parent' => array(
				'className' => 'Dpage', 
                'foreignKey' => 'parentid' 
        ), 
     );*/ 


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



    function maxDisplay() {
        $qry = $this->query("SELECT max(displayorder) as themax FROM dpages");
        return $qry[0][0]['themax'];
    }


    function maxDisplayChild($parentid) {
        $qry = $this->query("SELECT max(displayorder) as themax FROM dpages WHERE parentid = ".$parentid);
        return $qry[0][0]['themax'];
    }
	
	
	function firstProductThumb($productid) {
        $qry = $this->query("SELECT thumbpath FROM images WHERE dpage_id = ".$productid." ORDER BY displayorder LIMIT 1");
		if(count($qry) == 0) { return ''; }
        return $qry[0]['images']['thumbpath'];	
	}
	
}
?>