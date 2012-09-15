<?php
/**
 * EXAMPLE OF UPLOADING A FILE WITH JQUERY.
 * THIS EXAMPLE REQUIRES PHP 5.2 OR NEWER.
 *
 * TIP:
 * PHP 4 USERS CAN ACHIEVE THE SAME RESULT BY DOING THE FOLLOWING:
 * echo '{"status":"success","msg":"this action completed correctly.","filename":"'.$file_strip.'"}';
*/

/**
 * CONFIGURATION VARIABLES
*/
$max_filesize = 2097152; // Maximum filesize in BYTES.
$allowed_filetypes = array('.jpg','.jpeg','.gif','.png'); // These will be the types of file that will pass the validation.
$filename = $_FILES['userfile']['name']; // Get the name of the file (including file extension).
$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1); // Get the extension from the filename.
$file_strip = str_replace(" ","_",$filename); //Strip out spaces in filename
$upload_path = '/home/ed/www/fileuploader2/uploads/'; //Set upload path
//$upload_path = '/uploads/'; //Set upload path
 
/**
 * NO NEED TO MODIFY BEYOND THIS POINT UNLESS YOU ARE NOT RUNNING PHP 5.2 OR NEWER.
*/
 
// Check if the filetype is allowed, if not DIE and inform the user.
if(!in_array($ext,$allowed_filetypes)) {
	echo json_encode(array('status' => 'error', 'msg' => 'The file you attempted to upload is not allowed.', 'filename' => $file_strip));
} elseif(filesize($_FILES['userfile']['tmp_name']) > $max_filesize) {
	// Now check the filesize, if it is too large then DIE and inform the user.
    echo json_encode(array('status' => 'error', 'msg' => 'The file you attempted to upload is too large.', 'filename' => $file_strip));
} elseif(!is_writable($upload_path)) {
    // Check if we can upload to the specified path, if not DIE and inform the user.
    echo json_encode(array('status' => 'error', 'msg' => 'You cannot upload to the /uploads/ folder. The permissions must be changed.', 'filename' => $file_strip));
} else {
    // Move the file if eveything checks out.
    if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $file_strip)) {
		echo json_encode(array('status' => 'success', 'msg' => $file_strip.' uploaded successfully.', 'filename' => $file_strip));
    } else {
		echo json_encode(array('status' => 'error', 'msg' => $file_strip.' was not uploaded.  Please try again.', 'filename' => $file_strip));
    }
}
?>
