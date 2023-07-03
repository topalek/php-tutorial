<?php


use Core\Db;

$config = require base_path('config/db.php');
$db = new Db($config);

$notes = $db->query('select * from notes where user_id=1')->getOrFail();
view('notes/index', ['title' => 'Notes page', 'notes' => $notes]);
