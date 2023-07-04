<?php

use Core\App;
use Core\Db;

$db = App::get(Db::class);
$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOrFail();

$currentUserId = 1;

authorize($note['user_id'] === $currentUserId);


view('notes/edit', [
    'title' => 'Note - ' . $note['title'],
    'note'  => $note
]);