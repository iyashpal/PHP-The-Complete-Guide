<?php

// Your controller code goes here
if (auth()) {
    header('Location:'. $app->getUrl('?view=home'));
}
if (isset($_POST['login'])) {
    $user = $DB->table('users')->where(['email'=>$_POST['email'], 'password'=>$_POST['password']])->first();
    if ($user) {
        $_SESSION['auth'] = $user;
        header('Location:'. $app->getUrl('?view=home'));
    }
}
