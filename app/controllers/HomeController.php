<?php

if (!auth()) {
    header('Location:'. $app->getUrl('?view=login'));
}


$tasks = $DB->table('todos')
    ->get();
