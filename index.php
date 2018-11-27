<?php
<<<<<<< HEAD
$query = require "bootstrap.php";


$tasks = $query->selectAll('todos', 'Task');




require 'index.view.php';
=======
   require 'bootstrap.php';
?>
<ul>
    <?php
    foreach ($todos as $index => $todo) {
        if ($todo->isCompleted()) {
            ?>
            <li><strike><?php echo $todo->getTitle() ?></strike></li>
            <?php
        } else {
        ?>
        <li><?php echo $todo->getTitle() ?></li>
        <?php

        }

    }
    ?>
</ul>
>>>>>>> 58f79b4c66c33ab4e1ddfdac25fe14ba525b7c33
