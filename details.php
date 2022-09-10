<?php 
include_once 'connection.php';

$tpl = 'details.tpl.php';
$id = isset($_GET['id'])? $_GET['id']:"";
$data = singledata($id);

include_once 'layout/template.php';
