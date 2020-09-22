<?php
if (move_uploaded_file('http://localhost/pobox_new/pobox/public/uploads/'. $_FILES["upload"]['name'])) {
	$response = array('uploaded'=>1,'fileName'=>$_FILES["upload"]['name'],'url'=>'http://localhost/pobox_new/pobox/public/uploads/'.$_FILES["upload"]['name']);
	echo json_encode($response);
	exit();
} else {
}
?>