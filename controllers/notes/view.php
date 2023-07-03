<?php


use Core\Db;

$config = require base_path('config/db.php');
$db = new Db($config);
$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);


view('notes/view', [
    'title' => 'Note page',
    'note'  => $note
]);