<?php
class Custompatterncolor extends AppModel {

	var $name = 'Custompatterncolor';


	var $belongsTo = array('Custompattern' =>
                               array('className'    => 'Custompattern',
                               )
                               );
	

	
}
?>