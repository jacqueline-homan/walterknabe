<?php
class Presspage extends AppModel {

	var $name = 'Presspage';

	var $belongsTo = array( 
        'Presscover' => array(
				'className' => 'Presscover'
        ), 
     ); 



    function maxDisplay($presscover_id) {
        $qry = $this->query("SELECT max(displayorder) as themax FROM presspages where presscover_id = ".$presscover_id);
        return $qry[0][0]['themax'];
    }


	
}
?>