<?php
if (move_uploaded_file($_FILES['upload']['tmp_name'], 'uploads/'. $_FILES["upload"]['name'])) {
	$response = array('uploaded'=>1,'fileName'=>$_FILES["upload"]['name'],'url'=>'https://poboxfashion.com/uploads/'.$_FILES["upload"]['name']);
	echo json_encode($response);
	exit();
} else {
}
?>


