<?php
$thelist = '';
 if ($handle = opendir('/home/ed/www/fileuploader2/uploads')) {
   while (false !== ($file = readdir($handle))) {
          if ($file != "." && $file != "..") {
          	$thelist .= '<a href="#" class="delete" id="'.$file.'"><img src="delete.png" /></a>&nbsp;<a href="'.$file.'">'.$file.'</a><br />';
          }
       }
  closedir($handle);
  }
  
echo '<p>List of files:</p>';
echo '<p>'.$thelist.'</p>';
?>
