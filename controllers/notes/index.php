<?php


use Core\Db;

$config = require base_path('config/db.php');
$db = new Db($config);

$title = 'Notes page';
$notes = $db->query('select * from notes where user_id=1')->getOrFail();
view('notes/index');
