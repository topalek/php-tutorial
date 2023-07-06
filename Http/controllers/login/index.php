<?php

use Core\Session;

view("login/index", ['title' => 'Login', 'errors' => Session::get('errors')]);