<?php


use Core\App;
use Core\Db;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = App::get(Db::class);
    $errors = [];
    if (strlen($_POST['title']) === 0) {
        $errors['title'] = 'A title is required';
    }

    if (strlen($_POST['content']) === 0) {
        $errors['content'] = 'A content is required';
    }
    if (strlen($_POST['title']) > 1000) {
        $errors['title'] = 'The title can not be more than 1000 chars.';
    }

    if (strlen($_POST['content']) > 1000) {
        $errors['content'] = 'The content can not be more than 1000 chars.';
    }

    if (empty($errors)){
        $db->query('insert into notes (title,content,user_id) values (:title,:content,:user_id)', ['title' => $_POST['title'], 'content' => $_POST['content'], 'user_id' => 1]);
        header('location: /notes');
        exit();
    }
}


view('notes/create',['title'=>'Create note']);