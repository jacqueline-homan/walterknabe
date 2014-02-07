<?php
class Photo extends AppModel {

	var $name = 'Photo';


    function maxDisplay($category) {
        $qry = $this->query("SELECT max(displayorder) as themax FROM photos where category = '".$category."'");
        return $qry[0][0]['themax'];
    }


}
?>