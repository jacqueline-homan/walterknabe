<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>

<?
$SQL = mysql_connect ("69.5.6.136", "xwalterknabe", "sTuTz200");
mysql_select_db ("xwalterknabe-main");

/*$qry = mysql_query('
CREATE TABLE `custombases` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `filepath` varchar(127) NOT NULL default '',
  `thumbpath` varchar(127) NOT NULL default '',
  `name` varchar(127) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `custombases`
--

INSERT INTO `custombases` VALUES(12, \'img/patterns/custom/OC-17_White_Dove.jpg\', \'img/patterns/custom/OC-17_White_Dove.thumb.jpg\', \'OC-17 White Dove\');
INSERT INTO `custombases` VALUES(13, \'img/patterns/custom/OC-28_Collingwood.jpg\', \'img/patterns/custom/OC-28_Collingwood.thumb.jpg\', \'OC-28 Collingwood\');

');*/

$qry = mysql_query('select * from custombases');

$row = mysql_fetch_array($qry);
print_r($row);

?>


<? //phpinfo(); ?>

</body>
</html>
