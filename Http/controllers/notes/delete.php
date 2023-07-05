<?php


use Core\App;
use Core\Db;

$db = App::get(Db::class);

$id = $_POST['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);
$db->query('delete from notes where id = :id', ['id' => $note['id']]);

header('location: /notes');
exit();
