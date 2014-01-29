<?php
class Custompattern extends AppModel {

	var $name = 'Custompattern';


	var $hasMany = array('Custompatterncolor' =>
                               array('className'    => 'Custompatterncolor',
                               )
                               );
	

	
}
?>