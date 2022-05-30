<?php
include_once 'config/Database.php';
include_once 'class/Records.php';

$database = new Database();
$db = $database->getConnection();

$record = new Records($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listRecords') {
	$record->listRecords();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addRecord') {	
	$record->nama_kue = $_POST["nama_kue"];
    $record->harga_kue = $_POST["harga_kue"];
    $record->jenis_kue = $_POST["jenis_kue"];
	$record->deskripsi = $_POST["deskripsi"];
	$record->rasa_kue = $_POST["rasa_kue"];
	$record->addRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'getRecord') {
	$record->id = $_POST["id"];
	$record->getRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'updateRecord') {
	$record->id = $_POST["id"];
	$record->nama_kue = $_POST["nama_kue"];
    $record->harga_kue = $_POST["harga_kue"];
    $record->jenis_kue = $_POST["jenis_kue"];
	$record->deskripsi = $_POST["deskripsi"];
	$record->rasa_kue = $_POST["rasa_kue"];
	$record->updateRecord();
}
if(!empty($_POST['action']) && $_POST['action'] == 'deleteRecord') {
	$record->id = $_POST["id"];
	$record->deleteRecord();
}
?>