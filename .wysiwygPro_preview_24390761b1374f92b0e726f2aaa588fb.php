<?php
if ($_GET['randomId'] != "SsjjnT0yTqdT9oW90xBrPH0eur2jvy0CFhlXjbWU7TXY4zlsw_THMqfb99z3y7e1") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
