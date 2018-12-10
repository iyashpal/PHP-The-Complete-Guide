<?php

$tasks = $DB->table('todos')
    // ->where('title', 'Wash car')
    ->select('Task');
