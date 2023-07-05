<?php


use Core\App;
use Core\Db;

$db = App::get(Db::class);

$notes = $db->query('select * from notes where user_id=1')->getOrFail();
view('notes/index', ['title' => 'Notes page', 'notes' => $notes]);
