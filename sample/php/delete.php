<?php
/**
 * THIS IS A DEMO FOR DELETING A FILE.
 * MORE VALIDATION SHOULD BE PUT IN PLACE
 * ON A PRODUCTION SERVER.
*/

$upload_path = '/home/ed/www/fileuploader2/uploads/'; //Set upload path

if (file_exists($upload_path.$_POST['filename'])) {
	unlink($upload_path.$_POST['filename']);
} else {
	exit($upload_path.$_POST['filename'].' does not exists.');
}

?>
