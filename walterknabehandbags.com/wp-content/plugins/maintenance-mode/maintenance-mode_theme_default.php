<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<title><?php bloginfo('name'); ?> &raquo; <?php echo $this->g_opt['mamo_pagetitle']; ?></title>
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	
	<style type="text/css">
		<!--
		* { margin: 0; 	padding: 0; }
		body { font-family: 'MuseoSans_500', Arial, Helvetica, Sans Serif; font-size: 65.5%; }
		a { color: #08658F; }
		a:hover { color: #0092BF; }
		#header { color: #333; padding: 1.5em; text-align: center; font-size: 1.2em; border-bottom: 1px solid #08658F; }
		#content { font-size: 150%; width:100%; margin:0 auto; padding: 5% 0; text-align: center; }
		#content p { font-size: 1em; padding: .8em 0; }
		h1, h2 { color: #08658F; }
		h1 { font-size: 300%; padding: .5em 0; }
		#menu { position: absolute; font-family: Arial, Helvetica, Sans Serif; bottom: 2em; width: 100%; border-top: 1px solid #08658F; }
		#menu #pluginauthor { padding-left: .3em; }
		#menu #admin { float: right; padding-right: .3em; }
		-->
	</style>
	
</head>

<body>
	
	<div id="content">
		<?php echo $this->mamo_template_tag_message(); ?>		
	</div>

	<div id="menu" style="position:absolute;">

		<p id="admin" style="padding:0 10px"> <?php	echo $this->mamo_template_tag_login_logout(); ?></p>

		<p id="themeauthor" style="float:right;padding:0 10px">Site development - <a href="http://aligator.hr" title="Aligator Studio">Aligator Studio</a> |</p>
		
		<p id="pluginauthor"> Maintenance Mode plugin by <a title="Software Guide" href="http://sw-guide.de/">Software Guide</a>.</p>
		
		

	</div>

</body>
</html>