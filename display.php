<?php
include_once 'connection.php';
$tpl = 'display.tpl.php';
$row = selectdata();
include_once 'layout/template.php';