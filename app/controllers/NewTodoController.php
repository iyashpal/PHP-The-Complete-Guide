<?php

if (isset($_POST['new-todo'])) {
    $isCreated = $DB->create(
        // Table name
        'todos',
        // Table insert data
        array(
            'title'=> $_POST['title'],
            'description' => $_POST['description']
        )
    );
}
