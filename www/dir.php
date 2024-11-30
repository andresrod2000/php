<?php
	$rep=opendir('.');
	$noDir = false;
	while ($file = readdir($rep)){
		if($file != '..' && $file !='.' && $file !=''){ 
			if (is_dir($file)){
				$noDir = true;
				print("<div class='dir'><img src='img/carpeta.png'>&nbsp;&nbsp;");
				print("<a href='$file/'>$file</a>");
				print("<br>");
			}
		}
	}
	print("</div>");
	if ($noDir == false) {
		print("<div class='dir'>-&nbsp; NO Existen Directorios &nbsp;-</div>");
	}
	closedir($rep);
	clearstatcache();
?>