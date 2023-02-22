<?
require_once("config_security.php");
$cssPath		= '../../../template/css/';
$css 			= base64_decode(getValue("css","str","GET","fdsfds.fsd"));
$action 		= getValue("action","str","POST","");
$content 	= getValue("content","str","POST","");
$filename 	= $cssPath . $css;
if(file_exists($filename)){
	if($action == 'save'){
	   $filename = str_replace(".bak","",$filename);
		if(!file_exists($filename . ".bak")){
			@copy($filename,$filename . ".bak");
			chmod($filename . ".bak",777);
		}
		 write_file($filename,htmlspecialchars($content));
		 redirect("editcss.php");
	}
	$content = open_file($filename);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Configuration"))?>
	<?
   if(file_exists($filename)){
	?>
      <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
      <input type="hidden" name="action" value="save">
      <table cellpadding="5" cellspacing="0" width="100%">
      	<tr>
         	<td class="bold"><?=translate_text("Edit file")?>: <?=$css?></td>
         </tr>
         <tr>
            <td><textarea class="form" id="content" name="content" style="width:99%; height:450px; color:#FF00FF"><?=$content?></textarea></td>
         </tr>
         <tr>
         	<td><input type="submit" value="<?=translate_text("Save change")?>" class="form"> | <input type="button" onclick="window.location.href='editcss.php?css=<?=base64_encode($css . '.bak')?>'" value="<?=translate_text("Restore this file")?>" class="form"></td>
         </tr>
      </table>
      </form>
   <?
	}else{
	?>
   	<table cellpadding="5" cellspacing="0" width="100%" class="table" bordercolor="#90B0E1" border="1">
      	<tr bgcolor="#f2f2f2">
         	<td class="bold"><?=translate_text("CSS Document name")?></td>
            <td class="bold" width="20"><img src="<?=$fs_imagepath?>edit.png" border="0" /></td>
         </tr>
         <?
         foreach(glob($cssPath . "*.css") as $name){
				$name = end(explode("/",$name));
			?>
         	<tr>
            	<td><a href="editcss.php?css=<?=base64_encode($name)?>"><?=$name?></a></td>
               <td><img src="<?=$fs_imagepath?>edit.png" border="0" /></td>
            </tr>
         <?
			}
			?>
      </table>
   <?
	}
	?>
<? template_bottom() ?>
</body>
</html>