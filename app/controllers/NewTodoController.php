<?php

if (isset($_POST['new-todo'])) {
    $isCreated = $DB->table('todos')->create(
        // Table insert data
        array(
            'title'=> $_POST['title'],
            'description' => $_POST['description']
        )
    );
}
