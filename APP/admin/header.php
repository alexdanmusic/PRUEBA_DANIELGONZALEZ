<?php
$servidor="http://".$_SERVER['SERVER_NAME'];
$path=dirname(dirname($servidor.$_SERVER['PHP_SELF']));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Panel Administrativo</title>

<link type="text/css" rel="stylesheet" href="<?php echo $path ?>/css/main.css" />
<link type="text/css" rel="stylesheet" href="<?php echo $path ?>/css/tablas.css" />
<link type="text/css" rel="stylesheet" href="<?php echo $path ?>/css/form.css" />
  
<script type="text/javascript" src="<?php echo $path ?>/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/js/jquery.func.js"></script>
<script type="text/javascript" src="<?php echo $path ?>/admin/tiny_mce/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
	tinyMCE.init({
		convert_urls : false,
		mode : "textareas",
		plugins : "phpimage",
		theme : "advanced",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		theme_advanced_resize_horizontal : false,
		theme_advanced_buttons1 : "bold,italic,strikethrough,separator,styleselect,formatselect,separator,bullist,numlist,outdent,indent,separator,justifyleft,justifycenter,justifyright,separator,link,unlink,phpimage,separator,code",	
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		content_css : "tiny_mce/estilo_editor.css",
	});
</script>

<link rel="stylesheet" href="http://jquery.bassistance.de/treeview/demo/screen.css" type="text/css" />
<link rel="stylesheet" href="http://jquery.bassistance.de/treeview/jquery.treeview.css" type="text/css" />
<script type="text/javascript" src="http://jquery.bassistance.de/treeview/jquery.treeview.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
    	$("#example").treeview();
  	});
</script>
</head>

<body style="background:#BFDFFF;">
<div id="cabecera">
<h1>Content Managment System</h1>
</div>