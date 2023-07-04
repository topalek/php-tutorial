<?php

use Core\App;
use Core\Db;
use Core\Validator;

$db = App::get(Db::class);

$currentUserId = 1;
$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();


authorize($note['user_id'] === $currentUserId);
$errors = [];
if (!Validator::required($_POST['title'], 1, 255)) {
    $errors['title'] = 'Field is required and no more than 255';
}
if (!Validator::required($_POST['content'], 1, 1000)) {
    $errors['content'] = 'Field is required and no more than 1000';
}
if (count($errors)) {

    view('notes/edit', [
        'title'  => 'Note - ' . $note['title'],
        'note'   => $note,
        'errors' => $errors
    ]);
}
$db->query('update notes set title=:title, content=:content where id=:id', [
    'id'      => $_POST['id'],
    'title'   => $_POST['title'],
    'content' => $_POST['content'],
]);
header('location: /note?id=' . $_POST['id']);
exit;
